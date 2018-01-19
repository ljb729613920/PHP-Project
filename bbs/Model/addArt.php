<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$time=time();
	$username=$_SESSION['userName'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$areaName=$_POST['areaName'];
	$sql="insert into article (a_id,a_title,a_owner,a_content,a_time,a_area) values(default,'$title','$username','$content','$time','$areaName');";
	$res=$dbh->exec($sql);
	// var_dump($res);exit;
	if($res){
		$sql="update userinfo set score=score+2 where username='$username' ";
		$dbh->exec($sql);
		redirect('index.php');
	}else{
		redirect('index.php','添加失败',2);
	}
	// var_dump($res);exit;
