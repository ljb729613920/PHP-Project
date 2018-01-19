<?php
	session_start();
	$w=120;
	$h=35;
	$n=4;
	$str=rcode($n);
	captcha($w,$h,$str);
	$_SESSION['captcha']=$str;
	/**
	 * /
	 * @param  [int] $w   [画布宽]
	 * @param  [int] $h   [画布高]
	 * @param  [int] $len [验证码的长度]
	 * @return [resource]      [一个随机的图片]
	 */
	function captcha($w,$h,$code){
		// 创建画布
		$img=imagecreatetruecolor($w,$h);
		// 创建画布背景颜色
		$bg=imagecolorallocate($img,mt_rand(210,240),mt_rand(210,240),mt_rand(210,240));
		// 填充画布颜色
		imagefill($img,0,0, $bg);
		// $code=rcode($len);
		// 随机添加字符
		for ($i=0; $i <strlen($code) ; $i++) {
			$color=imagecolorallocate($img,mt_rand(110,200),mt_rand(110,200),mt_rand(110,200));
			imagettftext($img, mt_rand(15,20)	,mt_rand(-10,10), 14*($i+1), 25, $color, '../Public/font/msyh.ttf', $code[$i]);
		}
		// 随机添加横线
		for ($i=0; $i <6 ; $i++) {
			$color=imagecolorallocate($img,mt_rand(110,200),mt_rand(110,200),mt_rand(110,200));
			imageline($img, mt_rand(0,100), mt_rand(0,30), mt_rand(0,100), mt_rand(0,30), $color);
		}
		// 输出图片
		header('Content-type:image/jpeg');
		imagejpeg($img);
	}
	/**
	 * /产生随机字符串
	 * @param  [int] $n [产生的字符串长度]
	 * @return [string]    [随机产生的字符串]
	 */
	function rcode($n){
		$str='abcdefghijkmnopqrstuvwsyzABCDEFGHJKLMNPQRSTUVWSYZ123456789';
		$str=str_shuffle($str);
		$str=substr($str,0,$n);
		return $str;
	}
