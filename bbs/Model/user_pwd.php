<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$result='';
	if(isset($_POST['sub'])){
		$username=$_SESSION['userName'];
		$sql="select pwd from userinfo where username='$username'";
		$res=my_fetch($dbh,$sql);
		$pwd0=md5(inputstr($_POST['pwd0']));
		$pwd1=inputstr($_POST['pwd1']);
		$pwd2=inputstr($_POST['pwd2']);
		$result=2;
		if($pwd0==$res['pwd'] && $pwd1==$pwd2){
			$pwd1=md5($pwd1);
			$sql="update userinfo set pwd='$pwd1' where username='$username' ";
			$result=$dbh->exec($sql);
		}
		// var_dump($result);exit;
	}
	include '../Templates/user_pwd.html';


