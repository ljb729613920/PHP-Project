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
		return $this->dbh->my_fetchAll($sql);
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

		$res=$this -> get_tree($arr,$id);

		foreach($arr as $v){
			if($v['c_id']==$id){
				$res[]=$v;
			}
		}
		return $res;

	}
	/**
	 * /无线级分类分组
	 * 需要c_pid
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
}
