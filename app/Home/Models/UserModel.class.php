<?php
namespace app\home\Models;

use frame\core\Model;

class UserModel extends Model{
	/**
	 * /获取用户的一条记录
	 * @param  int $id 用户ID
	 * @return array     返回用户信息
	 */
	public function get_one($id){
		$sql = "select * from blog_user where u_id = '$id' ";
		return $this -> dbh ->my_fetch($sql);
	}
}
