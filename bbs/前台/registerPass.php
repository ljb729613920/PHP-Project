<?php
	include_once '../init.php';
	/**
	 * 密码判断模块,返回字符0~6
	 * 0:密码存在特殊字符
	 * 1:密码长度小于6
	 * 2:密码长度大于10
	 * 3:密码只包含一种类型,强度弱
	 * 4:密码包含两种类型,强度中
	 * 5:密码包含三种类型,强度强
	 */
	$userPass=inputstr($_POST['userPass']);
	$len=strlen($userPass);
	// echo $len;exit;
	// 判断有意义字符计数器
	$n=0;
	//  判断无意义字符计数器
	$s=0;
	// 使用计数器2来判断是含有特殊字符
	$s=includeVerb2($userPass,48,57,includeVerb2($userPass,65,90,includeVerb2($userPass,97,122,$s)));
	if($s!=$len){
		echo '0';
		exit;
	}
	if($len<5){
		echo '1';
		exit;
	}
	if($len>9){
		echo '2';
		exit;
	}
	// 使用计数器1来判断是含有有意义的值
	$n=includeVerb1($userPass,48,57,includeVerb1($userPass,65,90,includeVerb1($userPass,97,122,$n)));
	if($n==1){
		echo '3';
	}else if($n==2){
		echo '4';
	}else if($n==3){
		echo '5';
	}
