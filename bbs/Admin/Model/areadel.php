<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	$id=$_GET['id'];
	$url1='area.php';
	$url2='area.php';
	$sql="update area set area_del='0' where id='$id'";
	my_exec($dbh,$sql,$url1,$url2,2);
