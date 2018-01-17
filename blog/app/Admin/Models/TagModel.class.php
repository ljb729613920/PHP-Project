<?php
namespace app\Admin\Models;

use frame\core\Model;

class TagModel extends Model{
	public function store($name){
		$sql = "insert into tag(t_name) values('$name') on duplicate key update t_flag=t_flag+1";
		$this -> dbh -> my_exec($sql);
		return $this -> dbh -> my_last_id();
	}
}
