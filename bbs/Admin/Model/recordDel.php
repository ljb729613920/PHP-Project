<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	// 翻墙保护
	climbProtect();
	$id=$_GET['id'];
	$aid=$_GET['aid'];
	$url1="recordShow.php?id=$aid";
	// var_dump($url1);exit;
	$url2="recordShow.php?id=$aid";
	$sql="update record set r_del='0' where r_id='$id'";
	my_exec($dbh,$sql,$url1,$url2,2);
