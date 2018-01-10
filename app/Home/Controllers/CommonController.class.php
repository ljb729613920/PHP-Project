<?php
namespace app\home\controllers;


use frame\core\Controller;
use app\home\models\CategoryModel;


class CommonController extends Controller{
	public function __construct(){
		// 获取专区数据
		parent::__construct();

		$this -> get_menu();
	}
	/**
	 * /获取顶级专区数据，可放置在任意位置
	 * @return object 返回给页面一组顶级专区的数据
	 *         	array  二维数组名为menu
	 */
	public function get_menu(){
		$cate = new CategoryModel();

		$menu = $cate -> get_cate_top();

		return $this -> view -> assign('menu',$menu);
	}
}
