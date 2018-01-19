<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$userName=inputstr($_POST['userName']);
	$userPass=md5(inputstr($_POST['userPass']));
	$sql="select * from userinfo where username='$userName' and pwd='$userPass';";
	$res=my_fetch($dbh,$sql);
	$lastTime=$res['last_login_time'];
	// var_dump($lastTime);exit;
	if(!$res){
		echo false;
		exit;
	}
	$_SESSION['userName']=$userName;
	$time=time();
	// 最后登录IP功能为加入
	$sql="update userinfo set last_login_time='$time' where username='$userName' ";
	$res=$dbh->exec($sql);
	if($res){
		echo true;
	}else{
		echo false;
	}
	if(strtotime('today')-$lastTime>0){
		$sql="update userinfo set score=score+1 where username='$userName' ";
		$res=$dbh->exec($sql);
	}
