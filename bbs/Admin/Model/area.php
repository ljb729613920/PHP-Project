<?php
	include_once '../init.php';
	include DIR_CORE.'mysql.php';
	// 翻墙保护
	climbProtect();
	// 每页显示的数据量
	$rows=10;
	// 当前页
	$curPage=isset($_GET['curPage'])?$_GET['curPage']:1;
	// 数据偏移量
	$offset=($curPage-1)*$rows;
	$sql="select id,area_name name,area_role role,area_create_time time from area where area_del=1 limit $offset,$rows";
	$area=my_fetchAll($dbh,$sql);

	function areaRec($dbh,$area_name){
		$sql="select count(*) c from article where a_del=1 and a_area='$area_name' ";
		$res=my_fetch($dbh,$sql);
		return $res;
	}
	// echo '<pre>';
	// var_dump(areaRec($dbh,'综合交流区'));exit;
	$sql="select count(*) c from area where area_del=1";
	$res=my_fetch($dbh,$sql);
	$totalRows=$res['c'];
	// echo '<pre>';
	// print_r($area);exit;
	require DIR_TEMP.'area.html';

// echo '<pre>';
	// var_dump($v);exit;
