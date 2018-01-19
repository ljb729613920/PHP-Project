<?php
	/**
	 * /文件上传文件，以后要封装类
	 * 错误代码为定义
	 */
	$maxsize=3* 1024 * 1024;
	if($f['size']>$maxsize){
		redirect('user_info.php','文件太大，请小于3M，3秒后跳转',3);
	}
	$mime = ['image/jpeg','image/jpg','image/pjpeg','image/png','image/gif',] ;
	if(!in_array($f['type'],$mime)){
		redirect('user_info.php','文件类型不正确，3秒后跳转',3);
	}
	switch ($f['error']) {
		case 1:
			exit('文件太大，请小于3M');
			break;
		case 2:
			exit('文件太大，请小于3M');
			break;
		case 3:
			exit('文件太大，请小于3M');
			break;
		case 4:
			exit('文件太大，请小于3M');
			break;
		case 6:
			exit('文件太大，请小于3M');
			break;
		case 7:
			exit('文件太大，请小于3M');
			break;
		default:
			break;
	}

	// echo '<pre>';
	// print_r($f);exit;

	$tmp=$f['tmp_name'];
	$filename=date('YmdHis');
	$info=pathinfo($f['name'],PATHINFO_EXTENSION);
	$basename=$filename.get_rand_name(6).'.'.$info;
	$path=DIR_ROOT.'public/images';
	$dest=$path.'/'.$basename;
	// echo $basename;exit;
	move_uploaded_file($tmp,$dest);


	function get_rand_name($i){
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
