<?php
	include_once '../init.php';
	session_destroy();
	setcookie('username',null,time()-1,'/');
	setcookie('PHPSESSID',' ',time()-1,'/');
	header('location:index.php');
	// redirect('index.php','注销成功,3秒后跳转',3);


