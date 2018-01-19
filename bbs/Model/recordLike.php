<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$id=$_POST['id'];
	$sql="update article set a_like=a_like+1 where a_id='$id' and a_del=1";
	$res=$dbh->exec($sql);
	if($res){
		echo true;
	}else{
		echo false;
	}
