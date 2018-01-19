<?php
	// header('Content-type:text/html;chareset=utf-8');
	// session_start();

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
