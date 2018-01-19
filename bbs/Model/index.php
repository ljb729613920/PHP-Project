<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	// 防翻墙
	if (isset($_SESSION['userName'])) {
		$userName=$_SESSION['userName'];
		$sql="select nickname n from userinfo where username='$userName'; ";
		$res=my_fetch($dbh,$sql);
	}

	// 帖子每日量和总量
	$sql="select a_time from article where a_del=1";
	$res=my_fetchALL($dbh,$sql);
	$sum=0;
	$t_sum=0;
	foreach ($res as $v) {
		$sum++;
		if($v['a_time']>strtotime('today')){
			$t_sum++;
		}
	}
	// 获取分页码总数的第一部分
	$rows=10;
	// 当前页
	$curPage=isset($_GET['curPage'])?$_GET['curPage']:1;
	// 数据偏移量
	$offset=($curPage-1)*$rows;


	// 获取分区
	$sql="select id,area_name name from area where area_del=1";
	$area=my_fetchALL($dbh,$sql);


	// 分区内容
	$id=isset($_GET['area'])?inputstr($_GET['area']):1;
	$sql="select area_name a from area where id='$id' and area_del=1";
	$areainfo=my_fetch($dbh,$sql);
	$areainfo=$areainfo['a'];
	$sql="select * from (select * from article where a_area='$areainfo' and a_del=1 order by a_time desc) a order by a.a_top desc limit $offset,$rows";
	$art=my_fetchAll($dbh,$sql);
	foreach ($art as $k => $v) {
		$username=$v['a_owner'];
		$art[$k]['nickname']=user_nick($dbh,$username);
		$art[$k]['a_time']=timeTranslate($v['a_time']);
	}
	// echo '<pre>';
	// var_dump($art);exit;
	//
	// 获取分页码总数的第二部分
	$sql="select count(*) c from article where a_area='$areainfo' and a_del=1";
	$res=my_fetch($dbh,$sql);
	$totalRows=$res['c'];

	$i=0;
	$sql="select username,nickname,profile,score from userinfo order by score desc";
	$userList=my_fetchALL($dbh,$sql);

	// 判断角色
	if(isset($_SESSION['userName'])){
		$username=$_SESSION['userName'];
		$sql="select user_role role from userinfo where username='$username'";
		$res=my_fetch($dbh,$sql);
		$userRole=$res['role'];
	}

	// 		echo '<pre>';
	// var_dump($userRole);exit;

	include_once DIR_TEMP.'index.html';





