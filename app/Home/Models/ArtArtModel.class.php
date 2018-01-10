<?php
namespace app\home\models;

use frame\core\Model;

class ArtArtModel extends Model{
	public function get_tag($a_id){
		$sql = "select aa.a_id,t.t_id,t.t_name from art_art aa join tag t  on aa.t_id = t.t_id where a_id='$a_id'";
		return $this ->dbh -> my_fetchAll($sql);
	}
	//
	public function get_assocArt($a_id,$id){
		// 随机获取相关文章
		// 获取相关文章总数

		$sql = "select count(distinct a_id) c from art_art where t_id in ($id) and a_id != $a_id ";
		$res =  $this ->dbh -> my_fetch($sql);

		$offset = mt_rand(0,$res['c']-5 >0 ? $res['c']-5 : 0);

		$sql = "select distinct a.a_id,a_title from art_art aa join blog_article a on aa.a_id = a.a_id where aa.t_id in ($id) and a.a_id != $a_id limit $offset,5";
		return  $this ->dbh -> my_fetchAll($sql);
	}
}
