<?php
namespace frame\core;

class Controller{
	protected $view=null;
	protected $pages=null;
	public function __construct(){
		$this-> view = new View();
	}
	public function success($mess,$url,$second='3'){
		$this -> view -> assign('mess',$mess);
		$this -> view -> assign('url',$url);
		$this -> view -> assign('second',$second);
		$this -> view -> display('./frame/common/success.html');
	}
	public function error($mess,$url,$second='3'){
		$this -> view -> assign('mess',$mess);
		$this -> view -> assign('url',$url);
		$this -> view -> assign('second',$second);
		$this -> view -> display('./frame/common/error.html');
	}
	/**
	 * / 跳转函数
	 * @param  string 	$url  跳转地址
	 * @param  string 	$tip  提示语句
	 * @param  int 	$time 等待时间
	 * @return
	 */
	public function redirect($url,$tip=null,$time=0){
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
	 * /防注入
	 * @param 		string  $str 输入的字符串
	 * @return 		string      输出纯净的字符串
	 */
	public function input_str($str){
		return strip_tags(trim($str));
	}
		/**
	 * /转化时间函数
	 * @param  stirng $time 转化时间的时间戳字符串
	 * @return string       转化成我们需要的时间
	 */
	public function time_str($time){
		$tTime=time()-$time;
		if($tTime<60){
			$time="{$tTime}秒前";
		}else if ($tTime<3600) {
			$tTime=floor($tTime/60);
			$time="{$tTime}分钟前";
		}else if ($tTime<86400) {
			$tTime=floor($tTime/3600);
			$time="{$tTime}小时前";
		}else {
			$tTime=floor($tTime/86400);
			$time="{$tTime}天前";
		}
		return $time;
	}
}
