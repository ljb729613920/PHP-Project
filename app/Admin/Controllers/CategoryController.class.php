<?php
/**
 * /专区控制器
 * 根据需求，目前主要负责专区的展示、新增、修改、删除
 * 以下是各部分需求所涉及的方法
 * 展示：action_index()/get_tree()
 * 新增：action_addui()/action_add()
 * 修改：action_modify()/action_update()
 * 删除：action_del()
 */
namespace app\Admin\Controllers;

use app\Admin\Models\ArticleModel;
use app\Admin\Models\CategoryModel;
use frame\core\AdminController;
use frame\core\Pages;

class CategoryController extends AdminController{

	/**
	 * /专区主页模块
	 * @return file  返回专区主页模板文件
	 */
	public function action_index(){
		$cate=new CategoryModel();
		$arr=$cate->get_all();

		$data=$this -> get_tree($arr,0,0);
		// echo '<pre>';
		// print_r($data);exit;
		$this-> view ->assign('data',$data);
		$this-> view ->display('index.html');
	}

	/**
	 * /无线级分类分组
	 * @param  array  $arr 需要分组遍历的二维数组
	 * @param  integer $pid [description]
	 * @param  integer $lv  [description]
	 * @return [type]       [description]
	 */
	public function get_tree($arr,$pid=0,$lv=0){
		static $tree;
		// 无线级分类
		foreach ($arr as $v) {
			if($v['c_pid']==$pid){
				$v['lv']=$lv;
				$tree[]=$v;
				$this -> get_tree($arr,$v['c_id'],$lv+1);
			}
		}
		return $tree;
	}

	/**
	 * /专区主页提添加模板按钮
	 * @return file 返回addui.html
	 */
	public function action_addui(){
		$cate=new CategoryModel();
		$data=$cate->get_cate();
		$this -> view -> assign('data',$data);
		$this -> view -> display('addUi.html');
	}

	// 专区添加逻辑
	/**
	 * /
	 * @return [type] [description]
	 */
	public function action_add(){

		$arr=[];
		foreach ($_POST as $k => $v) {
			$arr[$k]=$this -> input_str($v);
		}
		$cate=new CategoryModel();
		$res= $cate -> add($arr);
		if($res){
			$mess = '添加成功，正在跳转！！！';
			$url = 'http://blog.com/index.php?g=admin&c=Category&a=index';
			$second = '3';
		      	$this -> success($mess,$url,$second);
		}else{
			$mess = '添加失败，请重新添加！！！';
			$url = 'http://blog.com/index.php?g=admin&c=Category&a=addui';
			$second = '3';
		      	$this -> error($mess,$url,$second);
		}
	}
	// 专区主页修改按钮
	public function action_modify(){
		// 获取修改id
		$id=isset($_GET['id'])? $this-> input_str($_GET['id']) : null ;
		// 获取下拉菜单
		$cate=new CategoryModel();
		$data=$cate->get_one($id);
		// echo '<pre>';
		// var_dump($data);exit;
		$this -> view -> assign('data',$data);
		$this -> view -> display('modify.html');
	}

	// 专区主页修改提交模块
	public function action_update(){
		// 获取修改id
		$arr['c_id']=isset($_POST['c_id'])? $this-> input_str($_POST['c_id']) : null ;
		$arr['c_name']=isset($_POST['c_name'])? $this-> input_str($_POST['c_name']) : ' ' ;
		$arr['c_desc']=isset($_POST['c_desc'])? $this-> input_str($_POST['c_desc']) : ' ' ;
		$arr['c_sort']=isset($_POST['c_sort'])? $this-> input_str($_POST['c_sort']) : 1 ;
		$cate=new CategoryModel();
		$res=$cate->update_one($arr);
		if($res){
			$mess = '修改成功，正在跳转！！！';
			$url = 'http://blog.com/index.php?g=admin&c=Category&a=index';
			$second = '3';
		      $this -> success($mess,$url,$second);
		      exit;
		}else{
			$mess = '修改失败，请重新修改！！！';
			$url = 'http://blog.com/index.php?g=admin&c=Category&a=update';
			$second = '3';
		      $this -> error($mess,$url,$second);
		      exit;
		}
	}
	// 专区主页删除按钮
	public function action_del(){
		$id=isset($_GET['id'])? $this-> input_str($_GET['id']) : null ;
		$cate=new CategoryModel();
		// 加判断
		$res=$cate-> update_del($id);
		$this-> redirect('index.php?g=admin&c=Category&a=index');
	}
}
