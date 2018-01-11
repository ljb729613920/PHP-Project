<?php
namespace app\home\models;

use frame\core\Model;

class ArticleModel extends Model{
	/**
	 * /获取article表中所有的置顶数据
	 * @param  integer  $limit 限制显示数据
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_tops($limit=10){
		$sql="select * from blog_article where a_del=1 and a_top=1 limit 0,$limit";
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
	public function get_hits($limit=10){
		$sql="select * from blog_article where a_del=1 order by a_hits desc limit 0,$limit ";
		return $this-> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获取article表中所有的数据
	 * 并且关联category表 user表中联合查询
	 *article:a_id,a_title,a_desc,a_last_time,a_like,a_hits,a_thumb
	 *category:c_id,c_name
	 *user:u_id,u_name,u_nickname
	 * @param  integer  $c_id 文章所在的专区id
	 * @param  integer  $offset 偏移量
	 * @param  integer  $limit  限制数
	 * @param  integer $del   删除状态
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_all($c_id,$limit,$offset,$del=1){
		$sql="select a.a_id,a.a_title,a.a_desc,a.a_last_time,a.a_like,a.a_hits,a.a_thumb,c.c_id,c.c_name,u.u_id,u.u_name,u.u_nickname from blog_article a join blog_user u on a.u_owner = u.u_id join blog_category c on a.c_id = c.c_id where a.c_id in ($c_id) and a.a_del='$del' order by a.a_top desc limit $offset,$limit ";
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
	 * /获取前台首页所有展示的
	 * article表:a_id/a_title/a_last_time/a_hits/a_content/c_id
	 * user表:u_name,u_nickname
	 * category表:c_name
	 * @param  integer  $limit 限制显示数据
	 * @return   array|false          返回所查询的数组
	 */
	public function get_index($limit=20){
		// where a.a_id='$id' and a_del='$del'
		$sql="select a.a_id,a.a_title,a.a_desc,a.a_last_time,a.a_hits,a.a_content,a.c_id,a.a_thumb,u.u_name,u.u_nickname,c.c_name from blog_article a join blog_user u on a.u_owner = u.u_id join blog_category c on a.c_id = c.c_id where a.a_del = 1 and  a.a_top = 1 order by a.a_last_time desc limit 0,$limit ";
		return $this-> dbh ->my_fetchAll($sql);
	}
	/**
	 * /获取article表一条数据
	 * article表:a_id/a_title/a_last_time/a_hits/a_content/c_id
	 * user表:u_name
	 * @param  integer $id  获取数据的id
	 * @return   array|false          返回所查询的数组
	 */
	public function get_one($id){
		// where a.a_id='$id' and a_del='$del'
		$sql="select a.a_id,a.a_title,a.a_last_time,a.a_hits,a.a_content,a.c_id,u.u_name from blog_article a join blog_user u on a.u_owner = u.u_id where a.a_del = 1 and  a.a_id='$id'";
		return $this-> dbh ->my_fetch($sql);
	}
	public function get_pre($a_id){
		$sql="select a_id,a_title from blog_article where a_id<$a_id and a_del =1  order by a_id desc limit 1";
		return $this -> dbh -> my_fetch($sql);
	}
	public function get_next($a_id){
		$sql="select a_id,a_title from blog_article where a_id>$a_id and a_del =1  order by a_id asc limit 1";
		return $this -> dbh -> my_fetch($sql);
	}

}
