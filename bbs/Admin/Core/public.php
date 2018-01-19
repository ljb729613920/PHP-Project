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


