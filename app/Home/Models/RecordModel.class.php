<?php
namespace app\home\Models;

use frame\core\Model;

class RecordModel extends Model{
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
	public function get_count($r_a_id){
		$sql="select r_a_id,count(*) c from blog_record where r_a_id in ($r_a_id)";
		return $this -> dbh ->my_fetchAll($sql);
	}
	public function get_all($r_a_id){
		$sql="select * from blog_record where r_a_id in ($r_a_id)";
		return $this -> dbh ->my_fetchAll($sql);
	}
}
