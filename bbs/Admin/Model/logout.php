<?php
	include '../init.php';
	setcookie('username',null,time()-1,'/');
	setcookie('PHPSESSID',' ',time()-1,'/');
	// print_r($_COOKIE);exit;
	// setcookie('PHP',' ',0);
	session_destroy();
	redirect('../index.php');
