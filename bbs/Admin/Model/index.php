<?php
	include '../init.php';
	include DIR_CORE.'mysql.php';
	climbProtect();
	$userName=inputstr($_SESSION['userName']);
	$sql="select user_role role from userinfo where username='$userName'";
	$role=my_fetch($dbh,$sql);
	require DIR_TEMP.'index.html';
