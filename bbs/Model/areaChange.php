<?php
	include_once '../init.php';
	require DIR_CORE.'mysql.php';

	$rows=10;
	// 当前页
	$curPage=isset($_GET['curPage'])? inputstr($_GET['curPage']):1;
	// 数据偏移量

	$offset=($curPage-1)*$rows;

	$id=inputstr($_GET['area']);
	$sql="select area_name a from area where id='$id' and area_del=1";
	$area=my_fetch($dbh,$sql);
	$area=$area['a'];
	$sql="select * from article where a_area='$area' and a_del=1 limit $offset,$rows";
	$art=my_fetchAll($dbh,$sql);
	foreach ($art as $k => $v) {
		$username=$v['a_owner'];
		$art[$k]['nickname']=user_nick($dbh,$username);
		$art[$k]['a_time']=timeTranslate($v['a_time']);
	}
	$str='';
	$sum=0;
	foreach ($art as $v) {
		$str.='<li class="clearfix ding"><div class="hm-index-title">';
		if($v['a_top']){
			$str.='<i class="set-to-top">顶</i> ';
		}
		$str.='<a href="detail.html">'.$v['a_title'].'</a>';
		$str.='</div><div class="hm-index-con">';
		$str.= strlen($v['a_content'])>50 ? substr($v['a_content'],0,50) :  $v['a_content'];
		$str.='</div>';
		$str.='<div class="hm-index-info l"><span class="article-username">'.$v['nickname'].'</span>';
		$str.='<span class="post-time">'.$v['a_time'].'</span>	</div>';
		$str.='<div class="hm-index-fun r"><span class="icon-like"><i></i>'.$v['a_like'].'</span>';
		$str.='<span class="icon-talk"><i></i>0</span></div>';
		$str.='</li>';
	}
	echo $str;
