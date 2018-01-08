<?php
namespace app\home\controllers;

use frame\core\Pages;
use frame\core\Controller;
use app\home\models\ArticleModel;
use app\home\models\CategoryModel;
use app\home\models\UserModel;
use app\home\models\RecordModel;

class ArticleController extends Controller{
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
		$group=$cate -> get_group($c_id);
		$groupId=implode(',',$group['c_id']);
		echo '<pre>';
		var_dump($group);exit;
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
		$data= $art -> get_all($c_id,$arr['rows'],$offset);
		// 将文章所需的专区表名和用户表名填入数据组中
		$cate = new CategoryModel();//只需要读专区名
		$c_name=$cate -> get_group($c_id);

		echo '<pre>';
		var_dump($data);
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
		$this -> get_menu();
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
		// 获取点击量最多的文章数据
		$this -> get_hit($art,10);
		// 获取推荐的文章
		$this -> get_top($art,10);
		// 获取专区数据
		$this -> get_menu();

		// 获取回复数据
		$obj = new RecordModel();
		$record=$obj -> get_all($a_id);
		// 获取回复的用户名
		$user = new UserModel();//只需要读用户名
		foreach($record as $k => $v){
			// 返回一个用户的数组
			$u_name=$user -> get_one($v['u_id']);
			$record[$k]['u_nickname']=$u_name['u_nickname'];
			$record[$k]['u_avatar']=$u_name['u_avatar'];
			$record[$k]['r_time']=$this -> time_str($record[$k]['r_time']);
		}
		$this -> view -> assign('record',$record);
		// 获取回复的总数
		$recordNums=count($record);
		$this -> view -> assign('recordNums',$recordNums);

		$this -> view -> display('show.html');
	}
	public function action_addRecord(){

		$r_id=isset($_GET['a_id'])?$_GET['a_id']:0;
	}
	/**
	 * /获取顶级专区数据，可放置在任意位置
	 * @return object 返回给页面一组顶级专区的数据
	 *         	array  二维数组名为menu
	 */
	public function get_menu(){
		// 获取专区数据
		$cate = new CategoryModel();
		$menu = $cate -> get_cate_top();
		return $this -> view -> assign('menu',$menu);
	}
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
