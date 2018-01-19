<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$username=$_SESSION['userName'];
	$sql="select profile from userinfo where username='$username'";
	$icon=my_fetch($dbh,$sql);
	// echo '<pre>';
	// var_dump($icon);exit;
	if(isset($_POST['sub'])){
		$sql="select email e,nickname n from userinfo where username='$username'";
		$res=my_fetch($dbh,$sql);
		$email=inputstr($_POST['email'])? inputstr($_POST['email']) : $res['e']  ;
		// 没有判断用户名格式
		$nickname=inputstr($_POST['nickname']) ? inputstr($_POST['nickname']) : $res['n'];
		// 没有判断邮箱格式
		$sql="update userinfo set nickname='$nickname',email='$email' where username='$username' ";
		$result=$dbh->exec($sql);
		if(isset($_FILES['picUrl'])){
			$f=$_FILES['picUrl'];
			require DIR_MODEL.'fileUpload.php';
			$profileUpload='../Public/images/'.$basename;
			$sql="update userinfo set profile='$profileUpload' where username='$username'";
			$result=$dbh->exec($sql);
			// var_dump($result);exit;
		}
	}

	// var_dump($result);
	include '../Templates/user_info.html';


