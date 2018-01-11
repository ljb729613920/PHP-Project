<?php
namespace app\Admin\Models;

use frame\core\Model;

class AdminModel extends Model{

	/**
	 * /获取登录用户的信息，通过用户名
	 * @param  string   $var  用户名
	 * @return array   返回登录用户信息的数组
	 */
	public function get_userinfo($var){
		$sql="select a_id,a_pwd,a_truename,a_last_time,a_last_ip from blog_admin where a_name='$var'";
		return $this -> dbh ->my_fetch($sql);
	}

	/**
	 * /登录更新ip及时间
	 * @param  int $id 用户登录的id
	 * @param  string $ip 用户登录的ip
	 * @return  0|1|false     未作修改|更新成功|更新失败
	 */
	public function update_userinfo($id,$ip){
		// 更新最新登录ip
		$time=time();
		$sql="update blog_admin set a_last_ip='$ip',a_last_time='$time' where a_id='$id'";
		return $this -> dbh ->my_exec($sql);
	}
	/**
	 * /获取用户的一条记录
	 * @param  int $id 用户ID
	 * @return array     返回用户信息
	 */
	public function get_one($id){
		$sql = "select a_name from blog_admin where a_id = '$id' ";
		return $this -> dbh ->my_fetch($sql);
	}
}
