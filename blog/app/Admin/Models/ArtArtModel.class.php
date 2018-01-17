<?php
namespace app\Admin\Models;

use frame\core\Model;

class ArtArtModel extends Model{
	public function store($t_id,$a_id){
		$sql= "replace into art_art(t_id,a_id) values('$t_id','$a_id')";
		return $this -> dbh ->my_exec($sql);
	}
}
