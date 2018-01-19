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

	$userName=inputstr($_SESSION['userName']);
	$sql="select user_role role from userinfo where username='$userName'";
	$role=my_fetch($dbh,$sql);
	// 判断用户角色，如果是管理员显示全部帖子
	// 获取MySQL中的数据
	if($role['role']){
		$sql="select * from (select * from article where a_del='1' order by a_apply_top desc) a order by a.a_top desc limit $offset,$rows";
		$sqlc="select count(*) c from article where a_del='1'";
	}else{//如果是普通用户，只显示自己帖子
		$sql="select *,count(*) from (select * from article where a_del='1' and a_owner='$userName' order by a_apply_top desc) a order by a.a_top desc limit $offset,$rows";
		$sqlc="select count(*) c from article where a_del='1' and  a_owner='$userName'";
	}
	$art=my_fetchAll($dbh,$sql);
	$res=my_fetch($dbh,$sqlc);
	$totalRows=$res['c'];

	require DIR_TEMP.'tie.html';
