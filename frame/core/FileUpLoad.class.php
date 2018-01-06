<?php
namespace frame\core;
$file;
$mime = ['image/jpeg','image/jpg','image/pjpeg','image/png','image/gif',] ;
$filename=date('YmdHis');
$path;
class FileUpLoad{

	public function upload($file,$mime,$filename,$path){
		if($file['size']>$maxsize){
			$file['error']=1;
		}
		if(!in_array($file['type'],$mime)){
			$file['error']=2;
		}
		switch ($file['error']){
			case 1:
				exit('上传的文件超过了限制的值(3M以内)');
				break;
			case 2:
				exit('上传的文件超过了限制的值(3M以内)');
				break;
			case 3:
				exit('文件只有部分被上传');
				break;
			case 4:
				exit('没有文件被上传');
				break;
			case 6:
				exit('找不到临时文件夹');
				break;
			case 7:
				exit('文件写入失败');
				break;
			default:
				break;
		}
		$tmp=$file['tmp_name'];
		$info=pathinfo($file['name'],PATHINFO_EXTENSION);
		$basename=$filename.get_rand_name(6).'.'.$info;
		$dest=$path.'/'.$basename;
		move_uploaded_file($tmp,$dest);
	}

	public function get_rand_name($i){
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
