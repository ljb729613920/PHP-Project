<?php
	header('Content-type:text/html;chareset=utf-8');
	session_start();
	function nickname($dbh){
		if (isset($_SESSION['userName'])) {
			$userName=$_SESSION['userName'];
			$sql="select nickname n from userinfo where username='$userName'; ";
			$res=my_fetch($dbh,$sql);
		}
		return $res['n'];
	}

	/**
 * /封装PDO预处理语句
 * @param  resource 	$dbh  连接数据库
 * @param  string 		$sql    SQL语句
 * @return   f|arr     		返回一个预处理的数组结果
 */
	function my_fetchAll($dbh,$sql){
			$sth=$dbh->prepare($sql);
			$sth->execute();
			$res=$sth->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

/**
 * /封装PDO预处理语句
 * @param  resource  	$dbh  连接数据库
 * @param  string 		$sql   SQL语句
 * @return   f|arr     		返回一个预处理的数组结果
 */
	function my_fetch($dbh,$sql){
			$sth=$dbh->prepare($sql);
			$sth->execute();
			$res=$sth->fetch(PDO::FETCH_ASSOC);
		return $res;
	}



/**
 * / 跳转函数
 * @param  string 	$url  跳转地址
 * @param  string 	$tip  提示语句
 * @param  int 	$time 等待时间
 * @return
 */
	function redirect($url,$tip,$time){
		header("Refresh:{$time};url={$url}");
		echo "$tip";
		exit();
	}

	/**
	 * /通过ascii码判断字符串中是否存在某一个字段内的字符
	 * @param  string 	$str   输入的字符串
	 * @param  int 		$first ascii中某一个字段的开始值
	 * @param  int 		$end ascii中某一个字段的结束值
	 * @param  int 		$n     计数器,调用一次函数,计数器加1就退出
	 * @return int       	$n     返回计数器,表示是否存在
	 */
	function includeVerb1($str,$first,$end,$n){
		for($i=0;$i<strlen($str);$i++){
			$j=ord($str[$i]);
			if($j>=$first && $j<=$end){
				$n++;
				break;
			}
		}
		return $n;
	}
	/**
	 * /通过ascii码判断字符串中是否存在不需要的字符
	 * @param  string 	$str   输入的字符串
	 * @param  int 		$first ascii中某一个字段的开始值
	 * @param  int 		$end ascii中某一个字段的结束值
	 * @param  int 		$s     计数器,记录所有包含此字段的个数
	 * @return int       	$s     返回计数器,所有的个数
	 */
	function includeVerb2($str,$first,$end,$s){
		for($i=0;$i<strlen($str);$i++){
			$j=ord($str[$i]);
			if($j>=$first && $j<=$end){
				$s++;
			}
		}
		return $s;
	}

	/**
 * /分页函数
 * @param  [int] $curPage   [当前页]
 * @param  [int] $rows      [每页记录数]
 * @param  [int] $showPages [显示分页处的数量(1~9个数)，建议奇数个]
 * @param  [int] $totalRows [从mysql中获取的总行数]
 * @$url      string    处理页码的php文件
 * @return   f|s         [分页的H5代码，需插入H5使用]
 */
	function pageBlock($curPage,$rows,$showPages,$totalRows,$path){
		$pageNumString='';
		$curPage>ceil($showPages/2) ? $end=$curPage+floor($showPages/2): $end=$showPages;
		// 总页数
		$totalPages=ceil($totalRows/$rows);
		// 分页的最后一位
		$end=$end<$totalPages?$end:$totalPages;
		// 分页的第一位
		$begin=$end-$showPages>0?$end-($showPages-1):1;
		$pageNumString.="<li><a href='$path?curPage=1'>首页</a></li>";
		$prev= $curPage-1 <1 ? 1 : $curPage-1 ;
		$pageNumString.="<li><a href='$path?curPage=$prev'>&laquo;</a></li>";
		for($i=$begin;$i<=$end ;$i++){
			if($i==$curPage){
				$pageNumString.="<li class='active'><a href='$path?curPage=$i'>$i</a></li>";
			}else{
				$pageNumString.="<li><a href='$path?curPage=$i'>$i</a></li>";
			}
		}
		$next= $curPage+1 > $totalPages ? $totalPages : $curPage+1;
		$pageNumString.="<li><a href='$path?curPage=$next'>&raquo;</a></li>";
		$pageNumString.="<li><a href='$path?curPage=$totalPages'>尾页</a></li>";
		return $pageNumString;
	}

