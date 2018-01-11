<?php
/**
 * /主页控制器
 * 根据需求，目前主要负责主页显示模块
 * 以下是各部分需求所涉及的方法
 * 主页显示模块：action_index()
 */
namespace app\Admin\Controllers;

use app\Admin\Models\UserModel;
use app\Admin\Models\ArticleModel;
use frame\core\AdminController;

class IndexController extends AdminController{
	/**
	 * /主页显示，读取文章和用户表
	 * @return file  返回index.html
	 */
	public function action_index(){
		// 获取活跃用户数量
		$user=new UserModel();
		$activeUser=$user -> get_c(180);
		// 获取文章总数
		$art=new ArticleModel();
		$totalArticle=$art->get_total();

		$activeUser=isset($activeUser['c'])?$activeUser['c']:'暂无数据';
		$totalArticle=isset($totalArticle['c'])?$totalArticle['c']:'暂无数据';
		$totalRecord=isset($totalArticle['c'])?$totalArticle['c']:'暂无数据';

		$this-> view ->assign('activeUser',$activeUser);
		$this-> view ->assign('totalArticle',$totalArticle);
		$this-> view ->assign('totalRecord',$totalRecord);
		$this-> view ->display('index.html');
	}
}
