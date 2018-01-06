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
}
