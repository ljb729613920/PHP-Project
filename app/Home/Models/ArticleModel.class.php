<?php
namespace app\home\models;

use frame\core\Model;

class ArticleModel extends Model{
	/**
	 * /获取article表中所有的置顶数据
	 * @param  integer  $limit 限制显示数据
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_top($limit=10){
		$sql="select * from blog_article where a_del=1 and a_top = 1 limit 0,$limit";
		return $this-> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获取article表中最新的文章
	 * @param  integer  $limit 限制显示数据
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_new($limit=10){
		$sql="select * from blog_article where a_del=1
		order by a_create_time desc limit 0,$limit ";
		return $this-> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获取article表中所有的数据
	 * @param  integer  $limit  限制数
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_hit($limit=10){
		$sql="select * from blog_article where a_del=1 order by a_hits desc limit 0,$limit ";
		return $this-> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获取article表中所有的数据
	 * @param  integer  $c_id 文章所在的专区id
	 * @param  integer  $offset 偏移量
	 * @param  integer  $limit  限制数
	 * @param  integer $del   删除状态
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_all($c_id,$limit,$offset,$del=1){
		$sql="select * from blog_article where c_id='$c_id' and a_del='$del' order by a_top desc limit $offset,$limit ";
		return $this-> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获取article表中所有的数据的行数
	 * @param  integer $del 删除状态
	 * @return array|false      返回所查询的行数
	 */
	public function get_total($c_id,$del=1){
		$sql="select count(*) c from blog_article where c_id='$c_id' and a_del='$del'";
		return $this-> dbh ->my_fetch($sql);
	}
	/**
	 * /获取article表一条数据
	 * @param  integer $id  获取数据的id
	 * @param  integer $del 删除状态
	 * @return   array|false          返回所查询的数组
	 */
	public function get_one($id,$del=1){
		$sql="select * from blog_article where a_id='$id' and a_del='$del'";
		return $this-> dbh ->my_fetch($sql);
	}
}
