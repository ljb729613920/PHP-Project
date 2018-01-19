<?php
	include '../init.php';
	require DIR_CORE.'mysql.php';
		// require DIR_CORE.'public.php';
	$captcha=inputstr($_POST['captcha']);
	// echo strtolower($_SESSION['captcha']);exit;
	if(strtolower($captcha)!=strtolower($_SESSION['captcha'])){
		redirect('../index.php','验证码有误',2);
	}
	// echo '1';exit;
	$userName=inputstr($_POST['userName']);
	$userPass=md5(inputstr($_POST['userPass']));
	$loginType=inputstr($_POST['loginType']);
	$sql="select pwd from userinfo where username='$userName' and user_role='$loginType';";
	$res=my_fetch($dbh,$sql);
	if($res['pwd']!=$userPass){
		redirect('../index.php','用户名及密码错误',2);
	}
	$remerber=inputstr($_POST['remerber']);
	if(isset($remerber)){
		setcookie('username',"$userName",time()+604800,'/');
	}
	// print_r($_POST);exit;
	$_SESSION['userName']=$userName;
	$_SESSION['loginType']=$loginType;
	redirect('index.php');

