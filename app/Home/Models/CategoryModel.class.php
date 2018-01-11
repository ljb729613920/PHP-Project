<?php
namespace app\home\Models;

use frame\core\Model;

class CategoryModel extends Model{
	/**
	 * /获取所有顶级专区的详情
	 * @return array|false     返回一个二维数组
	 */
	public function get_cate_top(){
		$sql="select * from blog_category where c_pid=0 and c_del=1";
		$arr = $this->dbh->my_fetchAll($sql);

		$sql="select c_id,c_pid,c_name from blog_category where c_del=1";
		$cates=$this->dbh->my_fetchAll($sql);
		// echo '<pre>';
		// var_dump($cates);exit;
		// $treeCate=[];
		foreach ($cates as $v) {
			if($v['c_pid']==0){
				$v['ids'][]=$v['c_id'];
				foreach($cates as $value){
					if($value['c_pid']==$v['c_id']){
						$v['ids'][]=$value['c_id'];
					}
				}
				$treeCate[]=$v;
			}
		}
		return $treeCate;
	}

	/**
	 * /无限级分类分组
	 * @param  	array  		$arr 	需要分组遍历的二维数组
	 * @param  	integer 	$pid 	可选参数，默认从顶级0开启
	 * @param  	integer 	$lv  	可选参数，用于给无限级加前缀的参数
	 * @return 	array|false      	返回遍历后数组或者false（空）
	 */
	public function get_tree($arr,$pid=0,$lv=0){
		// 用于存储遍历后新数组
		static $tree=[];
		// 无限级分类
		foreach ($arr as $k => $v) {
			if($v['c_pid']==$pid){
				$v['lv']=$lv;
				$tree[]=$v;
				$this -> get_tree($arr,$v['c_id'],$lv+1);
			}
		}

		return $tree;
	}
	/**
	 * /获取某个专区的详情
	 * @param  int $id 专区id
	 * @return array|false     返回一个数组
	 */
	public function get_one($id){
		$sql="select c_id,c_pid,c_name,c_sort,c_desc from blog_category where c_id='$id' and c_del=1";
		return $this->dbh->my_fetch($sql);
	}
	/**
	 * /获取某个专区且与其子级专区的详情
	 * 首先通过无线级分组查询所有子集，并填入父级后返回
	 * 获取的字段：c_id,c_name,c_pid
	 * @param  int $id 专区id
	 * @return array|false     返回一个二维数组
	 */
	public function get_group($id){
		$sql="select c_id,c_pid,c_name from blog_category where c_del=1";
		$arr=$this->dbh->my_fetchAll($sql);

		return $this -> get_tree_group($arr,$id);
	}
	/**
	 * /无限级分类分组
	 * @param  	array  		$arr 	需要分组遍历的二维数组
	 * @param  	integer 	$pid 	可选参数，默认从顶级0开启
	 * @param  	integer 	$lv  	可选参数，用于给无限级加前缀的参数
	 * @return 	array|false      	返回遍历后数组或者false（空）
	 */
	public function get_tree_group($arr,$pid=0,$lv=0){
		// 用于存储遍历后新数组
		static $treeGroup=[];
		// 无限级分类
		foreach ($arr as $v) {
			if($v['c_pid']==$pid){
				$v['lv']=$lv;
				$treeGroup[]=$v;
				$this -> get_tree_group($arr,$v['c_id'],$lv+1);
			}
		}
		return $treeGroup;
	}
	public function get_location($c_id){
		$sql = "select c_id,c_pid,c_name from blog_category ";

		$categorys = $this -> dbh -> my_fetchAll($sql);

		$locations = $this -> location($categorys,$c_id);

		return $this -> get_tree_loca($locations);
	}

	public function location($arr,$c_id){
		static $locations = [];
		foreach($arr as $k => $v){
			if($v['c_id']==$c_id){
				$locations[] = $v;
				if($v['c_pid']==0){
					break;
				}else{
					$this -> location($arr,$v['c_pid']);
				}
			}
		}
		return $locations;
	}
	public function get_tree_loca($arr,$pid=0,$lv=0){
		static $treeLoac=[];
		// 无线级分类
		foreach ($arr as $v) {
			if($v['c_pid']==$pid){
				$v['lv']=$lv;
				$treeLoac[]=$v;
				$this -> get_tree_loca($arr,$v['c_id'],$lv+1);
			}
		}
		return $treeLoac;
	}
}
