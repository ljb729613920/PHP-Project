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
			if($v['r_pid']==$pid){
				$v['lv']=$lv;
				$tree[]=$v;
				$this -> get_tree($arr,$v['r_id'],$lv+1);
			}
		}
		return $tree;
	}
	public function get_count($r_a_id){
		$sql="select r_a_id,count(*) c from blog_record where r_a_id in ($r_a_id)";
		return $this -> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获得所有的回复数据
	 * 	record: r_id,r_content,r_pid,r_time,r_like,r_diss
	 * 	user:u_id,u_nickname,u_avatar
	 * @param  int $r_a_id 传入的文章的id
	 * @return array         返回一个回复 用户关联的二维数组
	 */
	public function get_all($r_a_id){
		$sql="select r.r_id,r.r_content,r.r_pid,r.r_time,r.r_like,r.r_diss,u.u_id,u.u_nickname,u.u_avatar from blog_record r join blog_user u on r.u_id = u.u_id where r.r_a_id in ($r_a_id) and r.r_del=1 order by r.r_time desc";
		$arr = $this -> dbh ->my_fetchAll($sql);
		return $this -> get_tree($arr);
	}

	public function add($arr){
		extract($arr);
		$time=time();
		$sql="insert into blog_record(u_id,r_content,r_a_id,r_pid,r_time) values('$u_id','$r_content','$r_a_id','$r_pid','$time')";
		return $this -> dbh ->my_exec($sql);
	}

}
