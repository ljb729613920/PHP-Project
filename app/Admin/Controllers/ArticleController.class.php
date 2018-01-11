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
use app\Admin\Models\AdminModel;
use app\Admin\Models\ArtArtModel;
use app\Admin\Models\TagModel;
use frame\core\AdminController;
use frame\core\Pages;
use frame\core\FileUpLoad;
use frame\core\Thumb;

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
		$this -> view -> assign('curPage',$arr['curPage']);

		$arr['path']='index.php?g='.$_GET['g'].'&c='.$_GET['c'].'&a='.$_GET['a'];

		// 实例化article模型
		$art=new ArticleModel();

		// 偏移量
		$offset=($arr['curPage']-1)*$arr['rows'];
		// 获取article中的所有数据
		$data=$art->get_all($offset,$arr['rows']);
		// 将文章所需的专区表名和用户表名填入数据组中
		$cate = new CategoryModel();//只需要读专区名
		$admin = new AdminModel();//只需要读用户名
		foreach($data as $k => $v){
			$a_owner=$admin -> get_one($v['a_owner']);
			$c_name=$cate -> get_one($v['c_id']);
			$data[$k]['a_owner']=$a_owner['a_name'];
			$data[$k]['c_name']=$c_name['c_name'];
		}

		// 获取article中总数
		$res = $art -> get_total();
		$arr['totalRows']= $res['c'];

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
		$data=$cate->get_all();
		$this -> view -> assign('data',$data);
		$this -> view -> display('addUi.html');
	}

	/**
	 * /添加文章模块
	 * @return int|bool   0|1|false  跳转
	 */
	public function action_add(){

		$arr['a_title']=$this -> input_str($_POST['a_title']);
		$arr['c_id']=$this -> input_str($_POST['c_id']);
		$arr['a_desc']=$this -> input_str($_POST['a_desc']);
		$arr['a_content']=$this -> input_str($_POST['a_content']);
		$tag=$this -> input_str($_POST['tag']);

		// 判断是否上传文件
		if(is_uploaded_file($_FILES['MyFile']['tmp_name'])){
			$upload=new FileUpLoad();
			$file=$_FILES['MyFile'];
			// 获取配置文件中的关于上传图片报错的配置信息
			$filename =  $upload ->upload($file,$GLOBALS['config']['upload']);
			// 判断是否上传成功
			if(!$filename[0]){
				// 获取配置文件中的关于上传图片报错的配置信息
				foreach ($GLOBALS['config']['uploadErrorTip'] as $k => $v) {
					if($filename[1]==$k){
						$mess=$v;
					}
				}
				$url = 'http://blog.com/index.php?g=admin&c=article&a=index';
				$second = '3';
			      	$this -> error($mess,$url,$second);
			      	exit;
			}
			$arr['a_img']=$filename[1];
			// 获取文件的路径，为缩略图做准备
			$src = './Upload/images/'.$filename[1];

			// 获取配置文件中的关于缩略图的配置信息
			// 调用缩略图核心文件
			$thumb = new Thumb();
			$res = $thumb -> thumb($src,$GLOBALS['config']['thumb']);
			if($res){
				$arr['a_thumb']=$res;
			}else{
				$arr['a_thumb']='thumb_default_img.jpeg';
			}
		}else{
			$arr['a_img']='default_img.jpeg';
			$arr['a_thumb']='thumb_default_img.jpeg';
		}

		// 调用article模型，实现添加
		$art=new ArticleModel();
		$return =$art->add($arr);

		if(!$return){
			// 写日志
			exit;
		}
		$keyword=new TagModel();
		$artArt=new ArtArtModel();

		$key = explode('，', $tag);
		foreach($key as $v){
			$t_id = $keyword -> store($v);
			$artArt -> store($t_id,$return);
		}


		if($return){
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
		$menu=$cate->get_all();

		$this -> view -> assign('menu',$menu);
		// 添加文章内容
		$art=new ArticleModel();

		$data=$art -> get_one($id);

		$this -> view -> assign('data',$data);

		$this -> view -> display('modify.html');
	}
	public function action_update(){
		// 获取修改id
		$arr['a_id']=isset($_POST['a_id'])? $this-> input_str($_POST['a_id']) : null ;
		$arr['a_title']=isset($_POST['a_title'])? $this-> input_str($_POST['a_title']) : ' ' ;
		$arr['c_id']=isset($_POST['c_id'])? $this-> input_str($_POST['c_id']) : ' ' ;
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
		// 处理从前台获取的id值中，多了一个`,`的问题
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
