<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$time=time();
	$username=$_SESSION['userName'];
	$maxFloor=$_POST['maxFloor']+1;
	// echo $maxFloor;exit;
	$floorNum=$_POST['floorNum'];
	$content=$_POST['content'];
	$artId=$_POST['artId'];
	$sql="insert into record(r_a_id,r_content,r_username,r_time,r_num,r_r_id) values('$artId','$content','$username','$time','$maxFloor','$floorNum')";
	$res=$dbh->query($sql);
	redirect("detail.php?id=$artId");
