<?php
namespace app\home\controllers;

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
		$c_id=isset($_GET['c_id'])?$_GET['c_id']:0;

		// 获取Pages所需要的参数
		$arr['rows']=$GLOBALS['config']['pages']['rows'];
		$arr['showPages']=$GLOBALS['config']['pages']['showPages'];
		// 获取当前页
		$arr['curPage']=isset($_GET['curPage'])? $this-> input_str($_GET['curPage']) : '1' ;
		$arr['path']='index.php?g='.$_GET['g'].'&c='.$_GET['c'].'&a='.$_GET['a'];
		// 偏移量
		$offset=($arr['curPage']-1)*$arr['rows'];

		// 获取文章数据
		$art = new ArticleModel();
		$data= $art -> get_all($c_id,$arr['rows'],$offset);
		// 将文章所需的专区表名和用户表名填入数据组中
		$cate = new CategoryModel();//只需要读专区名
		$user = new UserModel();//只需要读用户名
		foreach($data as $k => $v){
			$a_owner=$user -> get_one($v['a_owner']);
			$c_name=$cate -> get_one($v['c_id']);
			$data[$k]['a_owner']=$a_owner['u_name'];
			$data[$k]['c_name']=$c_name['c_name'];
		}

		// 获取文章个数
		$totalArts = $art -> get_total($c_id);

		// 获取点击量最多的文章数据
		$this -> get_hit($art,10);
		// 获取推荐的文章
		$this -> get_top($art,10);
		// 获取专区数据
		$this -> get_menu();

		$this -> view -> assign('totalArts',$totalArts['c']);
		$this -> view -> assign('data',$data);
		$this -> view -> assign('c_id',$c_id);
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
		echo '<pre>';
		var_dump($_SESSION );exit;
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
