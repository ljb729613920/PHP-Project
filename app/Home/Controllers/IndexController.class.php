<?php
namespace app\home\controllers;

use frame\core\Controller;
use app\home\models\ArticleModel;
use app\home\models\CategoryModel;

class IndexController extends Controller{
	/**
	 * /获取所有推荐的文章
	 * 调用ArticleModel里面get_top()、get_new()方法
	 * @return array 返回查到的置顶的文章
	 */
	public function action_index(){
		$art = new ArticleModel();

		$limit=10;
		// 获取推荐的文章
		$data = $art -> get_top($limit);
		// 获取最新的文章
		$news = $art -> get_new($limit);
		// 获取导航菜单数据
		$cate = new CategoryModel();
		$menu = $cate -> get_cate_top();

		$this -> view -> assign('menu',$menu);
		$this-> view ->assign('news',$news);
		$this-> view ->assign('data',$data);
		$this-> view ->display('index.html');
	}

}
