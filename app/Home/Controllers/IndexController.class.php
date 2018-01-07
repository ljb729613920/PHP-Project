<?php
namespace app\home\controllers;

use frame\core\Controller;
use app\home\models\ArticleModel;
use app\home\models\CategoryModel;
use app\home\models\RecordModel;

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
		$data = $art -> get_index($limit);

		// 获取对应的文章的评论数量
		$record = new RecordModel();
		$arr=[];
		foreach($data as $v){
			array_push($arr,$v['a_id']);
		}
		$id=implode(',', $arr);
		$recordNums=$record -> get_count($id);
		foreach($data as $k => $v){
			foreach($recordNums as $key => $value){
				if($v['a_id'] == $value['r_a_id']){
						$data[$k]['recordNums']=$value['c'];
						continue 2;
				}
				if(!isset($data[$k]['recordNums'])){
					$data[$k]['recordNums']=0;
				}
			}
		}
		$this-> view ->assign('data',$data);

		// 获取最新的文章
		$news = $art -> get_new($limit);
		$this-> view ->assign('news',$news);
		// 获取导航菜单数据
		$cate = new CategoryModel();
		$menu = $cate -> get_cate_top();
		$this -> view -> assign('menu',$menu);

		$this-> view ->display('index.html');
	}

}
