<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	climbProtect();
	// 每页显示的数据量
	$rows=10;
	// 当前页
	$curPage=isset($_GET['curPage'])?$_GET['curPage']:1;
	// 数据偏移量
	$offset=($curPage-1)*$rows;
	$sql="select id,username,email,nickname,profile,last_login_time,user_role role,user_allowed allowed from userinfo order by role desc";
	$arr=my_fetchAll($dbh,$sql);
	// echo '<pre>';
	// print_r($arr);exit;
	$sql="select count(*) c from userinfo";
	$res=my_fetch($dbh,$sql);
	$totalRows=$res['c'];
	require DIR_TEMP.'user.html';
