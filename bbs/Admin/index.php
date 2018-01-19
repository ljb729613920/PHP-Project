<?php
	include './init.php';

	if(isset($_COOKIE['username'])){
		include DIR_CORE.'mysql.php';
		$username=$_COOKIE['username'];
		$sql="select username u from userinfo where username='$username'";
		$res=my_fetchAll($dbh,$sql);
		// var_dump($row);die;
		$_SESSION['userName']=$res[0]['u'];
		redirect('./Model/index.php?md=1');
	}
	include './Templates/login.html';
