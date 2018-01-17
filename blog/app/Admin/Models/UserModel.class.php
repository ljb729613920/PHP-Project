<?php
namespace app\Admin\Models;

use frame\core\Model;

class UserModel extends Model{
	/**
	 * /获取活跃用户，$days内有登录记录的为活跃
	 * @param  integer $days  判定为活跃的最长未登录时间 单位：天
	 * @return int       活跃的用户数量
	 */
	public function get_c($days=180){
		$time=time()-$days*24*60*60;
		$sql="select count(*) c from blog_user where u_last_time > '$time'";
		return $this-> dbh ->my_fetch($sql);
	}
}
