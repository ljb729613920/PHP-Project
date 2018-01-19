<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';
	$id=isset($_GET['id'])?$_GET['id']:1;
	$sql="select * from article where a_del=1 and a_id='$id'";
	$art=my_fetch($dbh,$sql);
	// print_r($art);
	$username=$art['a_owner'];
	$sql="select * from userinfo where username='$username'";
	$user=my_fetch($dbh,$sql);
	$sql="select * from record where r_a_id='$id' and r_del=1";
	$rec=my_fetchAll($dbh,$sql);

	$i=0;
	$recUserArr=[];
	while(@$rec[$i]){
		$recUser=$rec[$i]['r_username'];
		$sql="select * from userinfo where username='$recUser'";
		$user=my_fetch($dbh,$sql);
		$recUserArr[$i]=$user;
		$i++;
	}

	$recordNums=record_nums($dbh,$id);

	// echo '<pre>';
	// print_r($art);
	// exit;
	$sql="update article set a_hits=a_hits+1 where a_id='$id'";
	$dbh->query($sql);
	//my_exec($dbh,$sql);
	include_once DIR_TEMP.'detail.html';
