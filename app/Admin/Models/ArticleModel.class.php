<?php
namespace app\Admin\Models;

use frame\core\Model;

class ArticleModel extends Model{
	/**
	 * /获取article表中所有的数据
	 * @param  integer  $offset 偏移量
	 * @param  integer  $limit  限制数
	 * @param  integer $del   删除状态
	 * @return array|false          返回所查询的二维数组(通过置顶排序后)
	 */
	public function get_all($offset,$limit,$del=1){
		$sql="select * from blog_article where a_del='$del' order by a_top desc limit $offset,$limit ";
		return $this-> dbh ->my_fetchAll($sql);
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

	/**
	 * /获取article表中所有的数据的行数
	 * @param  integer $del 删除状态
	 * @return array|false      返回所查询的行数
	 */
	public function get_total($del=1){
		$sql="select count(*) c from blog_article where a_del='$del'";
		return $this-> dbh ->my_fetch($sql);
	}

	/**
	 * /置顶的状态改变
	 * @param   integer $id  获取数据的id
	 * @return  0|1|false     未作修改|更新成功|更新失败
	 */
	public function update_top($id){
		$sql="update blog_article set a_top=a_top^1 where a_id='$id' and a_del=1";
		return $this-> dbh ->my_exec($sql);
	}

	/**
	 * /删除状态改变
	 * @param  [type] $id 获取数据的id
	 * @return  0|1|false     未作修改|更新成功|更新失败
	 */
	public function update_del($id){
		$time=time();
		$sql="update blog_article set a_del=a_del^1,a_del_time='$time',a_top=0 where a_id in ($id)";
		return $this-> dbh ->my_exec($sql);
	}

	/**
	 * /插入文章数据
	 * @param array $arr 插入数据的数组
	 * @return  0|1|false     未作修改|更新成功|更新失败
	 */
	public function add($arr){
		extract($arr);
		$user=$_SESSION['userInfo']['a_name'];
		$time=time();
		$sql="insert into blog_article(a_title,a_owner,a_desc,a_content,c_id,a_create_time,a_last_time,a_img,a_thumb) values('$a_title','$user','$a_desc','$a_content','$c_id','$time','$time','$a_img','$a_thumb')";
		return $this-> dbh ->my_exec($sql);
	}
	/**
	 * /更新文章内容
	 * @param  array $arr  更新的文章内容
	 * @return  0|1|false     未作修改|更新成功|更新失败
	 */
	public function update_one($arr){
		extract($arr);
		$time=time();
		$sql="update blog_article set a_title='$a_title',a_desc='$a_desc',c_id='$c_id',a_content='$a_content',a_last_time='$time' where a_id='$a_id' and a_del=1";
		return $this-> dbh ->my_exec($sql);
	}
}
