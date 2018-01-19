<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	$id=$_GET['id'];
	$url1='userinfo.php';
	$url2='userinfo.php';
	$sql="select user_role r from userinfo where id='$id'";
	$res=my_fetch($dbh,$sql);
	if($res['r']==1){
		header("location:$url2");
		exit;
	}
	$sql="select user_allowed a from userinfo where id='$id'";
	$res=catchNum($dbh,$sql,'a');
	$sql="update userinfo set user_allowed='$res' where id='$id'";
	my_exec($dbh,$sql,$url1,$url2,2);
	// var_dump($res);exit;


