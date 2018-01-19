<?php
	//1、设置编码集
	header('Content-type:text/html;charset=utf-8');
	session_start();

	//echo __DIR__; //D:\itcast\wamp\virtual\kfgbbs\Admin
	//2、设置目录常量
	define("DIR_ROOT", str_replace('\\', '/', __DIR__).'/');

	//设置配置文件目录常量
	define("DIR_CONFIG",DIR_ROOT.'Config/');
	//设置核心文件目录常量
	define("DIR_CORE",DIR_ROOT.'Core/');
	//设置逻辑处理文件目录常量
	define("DIR_MODEL",DIR_ROOT.'Model/');
	//设置展示模板文件常量
	define("DIR_TEMP",DIR_ROOT.'Templates/');
	// echo DIR_TEMP;

	    //翻墙保护函数
	function climbProtect(){
		$url=DIR_ROOT.'index.php';
		if(!isset($_SESSION['userName'])){
			header("location:$url");
			exit;
		}
		// $userName=$_SESSION['userName'];
	}

	/**
	 * / 跳转函数
	 * @param  string 	$url  跳转地址
	 * @param  string 	$tip  提示语句
	 * @param  int 	$time 等待时间
	 * @return
	 */
	function redirect($url,$tip=null,$time=0){
		if($tip){
			header("Refresh:{$time};url={$url}");
			echo "$tip";
			exit();
		}else{
			header("location:$url");
			exit;
		}
	}
	/**
	 * /
	 * @param  string $str  sql查询字符串
	 * @return string     返回转义后的本身
	 */
	function inputstr($str){
		return strip_tags(trim($str));
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

	/**
	 * /转化时间函数
	 * @param  stirng $time 转化时间的时间戳字符串
	 * @return string       转化成我们需要的时间
	 */
	function timeTranslate($time){
		$tTime=time()-$time;
		if($tTime<60){
			$time="{$tTime}秒前";
		}else if ($tTime<3600) {
			$tTime=floor($tTime/60);
			$time="{$tTime}分钟前";
		}else if ($tTime<86400) {
			$tTime=floor($tTime/3600);
			$time="{$tTime}小时前";
		}else if ($tTime<2592000) {
			$tTime=floor($tTime/86400);
			$time="{$tTime}天前";
		}else{
			$time=date('Y-m-d',$time);
		}
		return $time;
	}
	/**
	 * /判断等级段位
	 * @param  [type] $score [description]
	 * @return [type]        [description]
	 */
	function level($score){
		if($score>10000){
			$str='最强王者';
		}else if($score>8000){
			$str='星耀王者';
		}else if($score>5000){
			$str='大师';
		}else if($score>3200){
			$str='钻石';
		}else if($score>2000){
			$str='铂金';
		}else if($score>1000){
			$str='黄金';
		}else if($score>500){
			$str='白银';
		}else if($score>200){
			$str='青铜';
		}else{
			$str='菜鸟';
		}
		return $str;
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
