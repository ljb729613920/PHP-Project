<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	// 翻墙保护
	climbProtect();
	$id=$_GET['id'];
	$rows=10;
	// 当前页
	$curPage=isset($_GET['curPage'])?$_GET['curPage']:1;
	// 数据偏移量
	$offset=($curPage-1)*$rows;
	$sql="select * from record where r_del=1 and r_a_id='$id' limit $offset,$rows";
	$rec=my_fetchAll($dbh,$sql);
	// var_dump($rec);exit;
	$sql="select count(*) c from record where r_del=1 and r_a_id='$id'";
	$res=my_fetch($dbh,$sql);
	$totalRows=$res['c'];

	function recR($dbh,$id){
		$sql="select r_content c from record where r_del=1 and r_id=$id";
		$res=my_fetch($dbh,$sql);
		return $res['c'];
	}

	require DIR_TEMP.'record.html';
