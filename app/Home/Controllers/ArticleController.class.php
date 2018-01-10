<?php
namespace app\home\controllers;

use frame\core\Pages;
use app\home\models\ArticleModel;
use app\home\models\CategoryModel;
use app\home\models\UserModel;
use app\home\models\RecordModel;
use app\home\models\ArtArtModel;

class ArticleController extends CommonController{
	/**
	 * /前台文章模块的主页
	 * @return [type] [description]
	 */
	public function action_index(){
		// 传递顶级专区id
		$c_id=isset($_GET['c_id'])?$_GET['c_id']:0;
		$this -> view -> assign('c_id',$c_id);
		// 通过顶级专区获取其子级专区的id值，与专区名
		$cate = new CategoryModel();
		$group = $cate -> get_group($c_id);

		$this -> view -> assign('group',$group);

		// 获取一个所有专区及其子专区的 string型的值
		$a=["$c_id"];
		if(isset($group)){
			foreach ($group as $v) {
				$a[]= $v['c_id'];
			}
		}
		$groupIds=implode(',',$a);

		// 获取Pages所需要的参数
		$arr['rows']=$GLOBALS['config']['pages']['rows'];
		$arr['showPages']=$GLOBALS['config']['pages']['showPages'];
		// 获取当前页
		$arr['curPage']=isset($_GET['curPage']) ? $this-> input_str($_GET['curPage']) : '1' ;
		// $this -> view -> assign('curPage',$arr['curPage']);

		$arr['path']='index.php?g='.$_GET['g'].'&c='.$_GET['c'].'&a='.$_GET['a'].'&c_id='.$c_id;
		// 偏移量
		$offset=($arr['curPage']-1)*$arr['rows'];

		// 获取文章数据,通过专区id值$group[]['c_id']
		$art = new ArticleModel();
		$data= $art -> get_all($groupIds,$arr['rows'],$offset);
		// 通过文章的id获取所有的回复数
		$record = new RecordModel();
		foreach ($data as $k => $v) {
			$res=$record -> get_count($v['a_id']);
			$data[$k]['records']=$res[0]['c'];
		}

		$this -> view -> assign('data',$data);

		// 获取文章个数
		$res = $art -> get_total($c_id);
		$arr['totalRows']= $res['c'];
		$this -> view -> assign('totalArts',$res['c']);

		// 获取点击量最多的文章数据
		$this -> get_hit($art,10);
		// 获取推荐的文章
		$this -> get_top($art,10);
		// 获取专区数据
		// $this -> get_menu($cate);
		// 页码实例化
		$obj=new Pages($arr);
		$pages=$obj->page_block();
		$this -> view -> assign('pages',$pages);

		$this -> view -> display('index.html');
	}
	/**
	 * /显示某篇文章的内容
	 * @return [type] [description]
	 */
	public function action_show(){
		// 显示的帖子ID
		$a_id=isset($_GET['a_id'])?$_GET['a_id']:0;
		// 获取具体显示的文章数据
		$art = new ArticleModel();
		$data= $art -> get_one($a_id);
		$this -> view -> assign('data',$data);

		// 获取上一篇文章
		$pre = $art -> get_pre($a_id,$data['c_id']);

		$this -> view -> assign('pre',$pre);
		// 获取下一篇文章
		$next = $art -> get_next($a_id,$data['c_id']);
		$this -> view -> assign('next',$next);
		// 获取关联文章
		$this -> get_assoc($a_id);
		// 获取点击量最多的文章数据
		$this -> get_hit($art,10);
		// 获取推荐的文章
		$this -> get_top($art,10);

		$cate = new CategoryModel();
		// 获取专区数据
		// $this -> get_menu($cate);
		// 通过顶级专区获取其子级专区的id值，与专区名
		$group = $cate -> get_group($data['c_id']);
		$this -> view -> assign('group',$group);

		// 位置栏数据,通过上文的$data['c_id']获取显示页面的专区，反推所有父级
		$locations = $cate -> get_location($data['c_id']);

		$this -> view -> assign('locations',$locations);

		// 获取回复数据
		$obj = new RecordModel();
		$record=$obj -> get_all($a_id);
		if(isset($record)){
			foreach($record as $k => $v){
				$record[$k]['r_time'] = $this -> time_str($v['r_time']);
			}
			$this -> view -> assign('record',$record);
		}

		// 获取回复的总数
		$recordNums=count($record);

		$this -> view -> assign('recordNums',$recordNums);

		$this -> view -> display('show.html');
	}
	public function get_assoc($a_id){
		$aa = new ArtArtModel();
		$res = $aa -> get_tag($a_id);
		if(isset($res[0])){
			foreach ($res as $v) {
				$id[]= $v['t_id'];
				$tag[] = $v['t_name'];
			}
			$tag = implode(',',$tag);
			$this -> view -> assign('tag',$tag);

			$id = implode(',',$id);
			$assocArt= $aa -> get_assocArt($a_id,$id);
			$this -> view -> assign('assocArt',$assocArt);
		}
	}
	public function action_addRecord(){
		$data['u_id']=1;
		$data['r_a_id']=isset($_POST['a_id'])?$_POST['a_id']:0;
		$data['r_pid']=isset($_POST['r_pid'])?$_POST['r_pid']:0;
		$data['r_content']=isset($_POST['r_content'])?$_POST['r_content']:0;

		$record = new RecordModel();
		$return = $record -> add($data);

		if($return){
			$mess = '添加成功，正在跳转！！！';
			$url = 'http://blog.com/index.php?g=home&c=article&a=show&a_id='.$data['r_a_id'];
			$second = '3';
		      	$this -> success($mess,$url,$second);
		}else{
			$mess = '添加失败，请重新添加！！！';
			$url = 'http://blog.com/index.php?g=home&c=article&a=show&a_id='.$data['r_a_id'];
			$second = '3';
		      	$this -> error($mess,$url,$second);
		}
	}
	/**
	 * /获取顶级专区数据，可放置在任意位置
	 * @return object 返回给页面一组顶级专区的数据
	 *         	array  二维数组名为menu
	 */
	// public function get_menu($cate){
	// 	// 获取专区数据
	// 	$menu = $cate -> get_cate_top();
	// 	return $this -> view -> assign('menu',$menu);
	// }

	/**
	 * /获取点击量最多的文章
	 * @param  object  	$obj   	实例化articleModel对象
	 * @param  int  		$limit 	限制获取数据的个数
	 * @return array      返回所有数据的一个二维数组
	 */
	public function get_hit($obj,$limit){
		// 获取点击量最多的文章数据
		$artsHit = $obj -> get_hits($limit);
		return $this -> view -> assign('hit',$artsHit);
	}
	/**
	 * /获取推荐的文章
	 * @param  object  	$obj   	实例化articleModel对象
	 * @param  int  		$limit 	限制获取数据的个数
	 * @return array      返回所有数据的一个二维数组
	 */
	public function get_top($obj,$limit){
		// 获取推荐的文章
		$top = $obj -> get_tops($limit);
		return $this -> view -> assign('top',$top);
	}
}
