<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';
	/**
	*本页返还给ajax一个参数,其意义如下:
	*1:字符串包含数字字母和下划线
	*2:字符串只包含部分字母下划线
	*3.用户民已经存在
	*0.字符串包含特殊字符
	 **/
	$userName=strtolower(inputstr($_POST['userName']));
	$len=strlen($userName);
	//  判断无意义字符计数器
	$s=0;
	// 使用计数器2来判断是含有特殊字符
	$res=includeVerb2($userName,48,57,includeVerb2($userName,65,90,includeVerb2($userName,97,122,includeVerb2($userName,95,95,$s))));
	if($res!=$len){
		echo '0';
		exit;
	}
	$sql="select username from userinfo where username='$userName'";
	if(my_fetch($dbh,$sql)){
		echo '3';
		exit;
	}
	$n=0;
	// 使用计数器1来判断是含有有意义的值
	$n=includeVerb1($userName,48,57,includeVerb1($userName,95,95,includeVerb1($userName,97,122,$n)));
	if($n==3){
		echo '1';
	}else{
		echo '2';
	}


