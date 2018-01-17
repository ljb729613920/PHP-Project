<?php
namespace frame\core;

class FileUpLoad{

	public function upload($file,$arr){
		extract($arr);
		if(!in_array($file['type'],$mine)){
			return [false,1008];
			exit;
		}
		if($file['size']>$maxsize){
			return [false,1001];
			exit;
		}
		if($file['error']==0){
			$tmp=$file['tmp_name'];
			$info=pathinfo($file['name'],PATHINFO_EXTENSION);
			$basename=$prefix.self::get_rand_name($num).'.'.$info;
			$dest=$path.'/'.$basename;
			move_uploaded_file($tmp,$dest);
			return [true,$basename];
		}else{
			return [false,$file['error']];
		}

	}

	private static function get_rand_name($i){
		$str='';
		$a=0;
		while($a<$i){
			$a++;
			switch (mt_rand(0,2)) {
				case 0:
					$str+=chr(mt_rand(65,90));
					break;
				case 1:
					$str+=chr(mt_rand(97,122));
					break;
				case 2:
					$str+=mt_rand(0,9);
					break;
				default:
					break;
			}
		}
		return $str;
	}
}
