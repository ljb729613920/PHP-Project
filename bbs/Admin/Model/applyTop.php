<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	$id=$_GET['id'];
	// echo $id;exit;
	$url1='tie.php';
	$url2='tie.php';
	$sql="select a_top a from article where a_id='$id'";
	$res=catchNum($dbh,$sql,'a');
	if($res=='0'){
		header("location:$url1");
		exit;
	}
	$sql="select a_apply_top a from article where a_id='$id'";
	$res=catchNum($dbh,$sql,'a');
	// 当管理员点击置顶或者取消后，无论用户是否申请置顶，状态都会被清除为无
	$sql="update article set a_apply_top='$res' where a_id='$id'";
	my_exec($dbh,$sql,$url1,$url2,2);
