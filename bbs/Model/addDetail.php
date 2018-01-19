<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$time=time();
	$username=$_SESSION['userName'];
	$maxFloor=$_POST['maxFloor']+1;
	$content=$_POST['content'];
	$artId=$_POST['artId'];
	$sql="insert into record(r_a_id,r_content,r_username,r_time,r_num) values('$artId','$content','$username','$time','$maxFloor')";
	$res=$dbh->query($sql);
	redirect("detail.php?id=$artId");
