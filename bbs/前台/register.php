<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';
	if(isset($_POST['regSub'])){
		// echo '<pre>';
		// var_dump($_POST);exit;
		$userName=inputstr($_POST['userName1']);
		$userPass=md5(inputstr($_POST['userPass1']));
		$email=empty($_POST['email'])?null:inputstr($_POST['email']);
		$time=time();
		$ip=$_SERVER['REMOTE_ADDR'];
		$sql="insert into userinfo(username,pwd,email,nickname,reg_time,reg_ip,last_login_time,last_login_ip) values('$userName','$userPass','$email','$userName','$time','$ip','$time','$ip');";
		$res=$dbh->query($sql);
		if($res){
			$_SESSION['userName']=$userName;
			redirect('index.php','注册成功，正在跳转',3);
		}else{
			redirect('register.php','注册失败，请检查用户名及密码',3);
		}
	}else{
		include_once '../Templates/register.html';
	}


