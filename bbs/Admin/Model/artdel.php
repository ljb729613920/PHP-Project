<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	$id=$_GET['id'];
	// echo $id;exit;
	$url1='tie.php';
	$url2='tie.php';
	// 当管理员删除后，帖子的状态归零
	$sql="update article set a_del='0',a_top='0',a_apply_top='0' where a_id='$id'";
	my_exec($dbh,$sql,$url1,$url2,2);
