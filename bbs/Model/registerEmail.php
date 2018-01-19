<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';
	/**
	*本页返还给ajax一个参数,其意义如下:
	*1:邮件输入正确
	*2:邮件缺失部分内容
	*3.用户民已经存在
	*0.字符串包含特殊字符
	 **/
	$email=strtolower(inputstr($_POST['email']));
	$len=strlen($email);
	//  判断无意义字符计数器
	$s=0;
	// 使用计数器2来判断是含有特殊字符
	$res=includeVerb2($email,48,57,includeVerb2($email,64,90,includeVerb2($email,97,122,includeVerb2($email,46,46,$s))));
	if($res!=$len){
		echo '0';
		exit;
	}
	$sql="select email from userinfo where email='$email'";
	if(my_fetch($dbh,$sql)){
		echo '3';
		exit;
	}
	$n=0;
	// 使用计数器1来判断是含有有意义的值
	$n=includeVerb1($email,64,64,includeVerb1($email,46,46,$n));
	if($n==2){
		echo '1';
	}else{
		echo '2';
	}


