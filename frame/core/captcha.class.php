<?php
namespace frame\core;

class Captcha{
	private $w='';
	private $h='';
	private $n='';
	private $code='';
	/**
	 * /产生随机字符串
	 * @param  [int] $n [产生的字符串长度]
	 * @return [string]    [随机产生的字符串]
	 */
	private function rcode(){
		$str='abcdefghijkmnopqrstuvwsyzABCDEFGHJKLMNPQRSTUVWSYZ123456789';
		$str=str_shuffle($str);
		$str=substr($str,0,$this->n);
		$this->code=$str;
	}
	/**
	 * /
	 * @param  int $w   	画布宽
	 * @param  int $h  	 	画布高
	 * @param  int $n  		验证码的长度
	 * @return resource     	一个随机的图片
	 */
	public function __construct($arr){
		$this->w=isset($arr['width'])?$arr['width']:'100';
		$this->h=isset($arr['height'])?$arr['height']:'25';
		$this->n=isset($arr['chars'])?$arr['chars']:'4';

		$this->showCap();
	}
	/**
	 * /
	 * @return resource 验证码图片
	 */
	public function showCap(){
		$this->rcode();
		$_SESSION['code']=$this->code;
		return $this->img();
	}
	/**
	 * /生成随机码画布
	 * @return resource 验证码图片
	 */
	private function img(){
		// 创建画布
		$img=imagecreatetruecolor($this->w,$this->h);
		// 创建画布背景颜色
		$bg=imagecolorallocate($img,mt_rand(210,240),mt_rand(210,240),mt_rand(210,240));
		// 填充画布颜色
		imagefill($img,0,0, $bg);
		// 随机添加字符
		for ($i=0; $i <strlen($this->code) ; $i++) {
			$color=imagecolorallocate($img,mt_rand(110,200),mt_rand(110,200),mt_rand(110,200));
			imagettftext($img, mt_rand(25,30)	,mt_rand(-10,10), 14*($i+1), 25, $color, 'public/font/times.ttf', $this->code[$i]);
		}
		// 随机添加横线
		for ($i=0; $i <6 ; $i++) {
			$color=imagecolorallocate($img,mt_rand(110,200),mt_rand(110,200),mt_rand(110,200));
			imageline($img, mt_rand(0,100), mt_rand(0,30), mt_rand(0,100), mt_rand(0,30), $color);
		}
		// 输出图片
		header('Content-type:image/jpeg');
		return imagejpeg($img);
	}

}


