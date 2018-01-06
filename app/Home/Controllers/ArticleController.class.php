<?php
namespace app\home\controllers;

use frame\core\Controller;
use app\home\models\ArticleModel;
use app\home\models\CategoryModel;
use app\home\models\UserModel;

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
		$this -> hit($art,10);
		// 获取推荐的文章
		$this -> top($art,10);
		// 获取专区数据
		$this -> get_menu();

		$this -> view -> assign('totalArts',$totalArts['c']);
		$this -> view -> assign('data',$data);
		$this -> view -> assign('c_id',$c_id);
		$this -> view -> display('index.html');
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
	public function hit($obj,$limit){
		// 获取点击量最多的文章数据
		$artsHit = $obj -> get_hit($limit);
		return $this -> view -> assign('hit',$artsHit);
	}
	public function top($obj,$limit){
		// 获取推荐的文章
		$top = $obj -> get_top($limit);
		return $this -> view -> assign('top',$top);
	}
	/**
	 * /显示某篇文章的内容
	 * @return [type] [description]
	 */
	public function action_show(){
		$a_id=isset($_GET['a_id'])?$_GET['a_id']:0;
		// 获取具体显示的文章数据
		$art = new ArticleModel();
		$data= $art -> get_one($a_id);
		$this -> view -> assign('data',$data);
		// 获取点击量最多的文章数据
		$this -> hit($art,10);
		// 获取推荐的文章
		$this -> top($art,10);
		// 获取专区数据
		$this -> get_menu();

		$this -> view -> display('show.html');
	}

}
