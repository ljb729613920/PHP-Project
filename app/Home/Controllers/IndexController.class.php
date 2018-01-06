<?php
namespace app\home\controllers;

use frame\core\Controller;
use app\home\models\ArticleModel;
use app\home\models\CategoryModel;
use app\home\models\UserModel;

class IndexController extends Controller{
	/**
	 * /获取所有推荐的文章
	 * 调用ArticleModel里面get_top()、get_new()方法
	 * @return array 返回查到的置顶的文章
	 */
	public function action_index(){
		// 获取推荐的文章
		$art = new ArticleModel();
		$limit=10;
		$data = $art -> get_top($limit);

		// 将文章所需的专区表名和用户表名填入数据组中
		$cate = new CategoryModel();//只需要读专区名
		$user = new UserModel();//只需要读用户名
		foreach($data as $k => $v){
			$a_owner=$user -> get_one($v['a_owner']);
			$c_name=$cate -> get_one($v['c_id']);
			$data[$k]['a_owner']=$a_owner['u_name'];
			$data[$k]['c_name']=$c_name['c_name'];
		}
		$this-> view ->assign('data',$data);

		// 获取最新的文章
		$news = $art -> get_new($limit);
		$this-> view ->assign('news',$news);
		// 获取导航菜单数据
		$menu = $cate -> get_cate_top();
		$this -> view -> assign('menu',$menu);

		$this-> view ->display('index.html');
	}

}
