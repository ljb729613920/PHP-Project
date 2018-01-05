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

use app\Admin\Models\CategoryModel;
use app\Admin\Models\ArticleModel;
use frame\core\AdminController;
use frame\core\Pages;

class ArticleController extends AdminController{
	/**
	 * /文章主页模块
	 * @return flie 文章的index.html模板
	 */
	public function action_index(){
		// 获取Pages所需要的参数
		$arr['rows']=$GLOBALS['config']['pages']['rows'];
		$arr['showPages']=$GLOBALS['config']['pages']['showPages'];
		// 获取当前页
		$arr['curPage']=isset($_GET['curPage'])? $this-> input_str($_GET['curPage']) : '1' ;
		$arr['path']='index.php?g='.$_GET['g'].'&c='.$_GET['c'].'&a='.$_GET['a'];

		// 实例化article模型
		$art=new ArticleModel();

		// 偏移量
		$offset=($arr['curPage']-1)*$arr['rows'];
		// 获取article中的所有数据
		$data=$art->get_all($offset,$arr['rows']);

		// 获取article中总数
		$res=$art->get_total();
		$arr['totalRows']=$res['c'];

		// 页码实例化
		$obj=new Pages($arr);
		$pages=$obj->page_block();

		$this -> view -> assign('pages',$pages);
		$this -> view -> assign('data',$data);
		$this -> view -> display('index.html');
	}

	/**
	 * /添加文章界面模块
	 * @return flie 文章的addui.html模板
	 */
	public function action_addui(){
		// 获取分区详情并添加
		$cate=new CategoryModel();
		$data=$cate->get_cate();
		$this -> view -> assign('data',$data);
		$this -> view -> display('addUi.html');
	}

	/**
	 * /添加文章模块
	 * @return int|bool   0|1|false  跳转
	 */
	public function action_add(){
		$arr['a_title']=$this -> input_str($_POST['a_title']);
		$arr['a_category']=$this -> input_str($_POST['a_category']);
		$arr['a_desc']=$this -> input_str($_POST['a_desc']);
		$arr['a_content']=$this -> input_str($_POST['a_content']);
		$art=new ArticleModel();
		$res=$art->add($arr);
		if($res){
			$mess = '添加成功，正在跳转！！！';
			$url = 'http://blog.com/index.php?g=admin&c=article&a=index';
			$second = '3';
		      	$this -> success($mess,$url,$second);
		}else{
			$mess = '添加失败，请重新添加！！！';
			$url = 'http://blog.com/index.php?g=admin&c=article&a=addui';
			$second = '3';
		      	$this -> error($mess,$url,$second);
		}
	}

	/**
	 * /文章推荐(置顶)模块
	 * @return [type] [description]
	 */
	public function action_recommend(){
		$id=isset($_GET['id'])? $this-> input_str($_GET['id']) : null ;
		$curPage=isset($_GET['curPage'])? $this-> input_str($_GET['curPage']) : '1' ;
		$art=new ArticleModel();
		$res=$art-> update_top($id);
		$this-> redirect('index.php?g=admin&c=Article&a=index&curPage='.$curPage);
	}
	// 文章修改按钮
	public function action_modify(){
		// 获取修改id
		$id=isset($_GET['id'])? $this-> input_str($_GET['id']) : null ;

		// 获取下拉菜单
		$cate=new CategoryModel();
		$arr=$cate->get_cate();
		// 获取无线级分类
		$menu=$this -> get_tree($arr);

		$this -> view -> assign('menu',$menu);
		// 添加文章内容
		$art=new ArticleModel();

		$data=$art -> get_one($id);

		$this -> view -> assign('data',$data);

		$this -> view -> display('modify.html');
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
	public function action_update(){
		// 获取修改id
		$arr['a_id']=isset($_POST['a_id'])? $this-> input_str($_POST['a_id']) : null ;
		$arr['a_title']=isset($_POST['a_title'])? $this-> input_str($_POST['a_title']) : ' ' ;
		$arr['a_category']=isset($_POST['a_category'])? $this-> input_str($_POST['a_category']) : ' ' ;
		$arr['a_desc']=isset($_POST['a_desc'])? $this-> input_str($_POST['a_desc']) : ' ' ;
		$arr['a_content']=isset($_POST['a_content'])? $this-> input_str($_POST['a_content']) : ' ' ;
		$art=new ArticleModel();
		$res=$art->update_one($arr);
		if($res){
			$mess = '修改成功，正在跳转！！！';
			$url = 'http://blog.com/index.php?g=admin&c=article&a=index';
			$second = '3';
		      $this -> success($mess,$url,$second);
		      exit;
		}else{
			$mess = '修改失败，请重新修改！！！';
			$url = 'http://blog.com/index.php?g=admin&c=article&a=update';
			$second = '3';
		      $this -> error($mess,$url,$second);
		      exit;
		}
	}
	// 删除文章模块
	public function action_del(){
		$id=isset($_GET['id'])? $this-> input_str($_GET['id']) : null ;
		if($id[strlen($id)-1]==','){
			$id=substr($id,0,strlen($id)-1);
		}
		$curPage=isset($_GET['curPage'])? $this-> input_str($_GET['curPage']) : '1' ;
		$art=new ArticleModel();
		$res=$art-> update_del($id);
		//以后要判断是否删除成功
		/*if($res){
		}*/
		$this-> redirect('index.php?g=admin&c=Article&a=index&curPage='.$curPage);
	}

	// 垃圾桶模块
	public function action_trash(){
		$arr['rows']=$GLOBALS['config']['pages']['rows'];
		$arr['showPages']=$GLOBALS['config']['pages']['showPages'];
		// 获取当前页
		$arr['curPage']=isset($_GET['curPage'])? $this-> input_str($_GET['curPage']) : '1' ;
		$arr['path']='index.php?g='.$_GET['g'].'&c='.$_GET['c'].'&a='.$_GET['a'];
		// 偏移量
		$offset=($arr['curPage']-1)*$arr['rows'];

		$art=new ArticleModel();
		$res=$art->get_total(0);
		$arr['totalRows']=$res['c'];

		$obj=new Pages($arr);
		$pages=$obj->page_block();
		$data=$art-> get_all($offset,$arr['rows'],0);
		// echo '<pre>';
		// print_r($data);exit;
		$this -> view -> assign('pages',$pages);
		$this -> view -> assign('data',$data);
		$this -> view -> display('trash.html');
	}
}
