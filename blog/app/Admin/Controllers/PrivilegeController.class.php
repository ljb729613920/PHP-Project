<?php
/**
 * /权限控制器
 * 根据需求，目前主要负责登录和注销
 * 以下是各部分需求所涉及的方法
 * 登录：action_login()/action_validate()/action_captcha()
 * 注销：action_logout()
 */
namespace app\Admin\Controllers;

use frame\core\Controller;
use frame\core\Captcha;
use app\Admin\Models\AdminModel;

class PrivilegeController extends Controller{
	public function action_login(){
		$this-> view ->display('login.html');
	}
	public function action_validate(){
		$captcha= $this -> input_str($_POST['passcode']);
		//判断验证码是否为空，前台以经控制，后台可以关闭
		/*if(empty($captcha)){
			$mess = '验证码错误';
	            $url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
	            $second = '3';
	            $this -> error($mess,$url,$second);
	            exit;
		}*/
		// 判断验证码是否正确,不区分大小写
		/*if(strtolower($captcha)!=strtolower($_SESSION['code'])){
			$mess = '验证码错误';
	            $url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
	            $second = '3';
	            $this -> error($mess,$url,$second);
	            exit;
		}*/
		$username= $this -> input_str($_POST['admin']);
		//判断用户名是否为空，前台以经控制，后台可以关闭
		/*if(empty($username)){
			$mess = '用户名为空';
	            $url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
	            $second = '3';
	            $this -> error($mess,$url,$second);
	            exit;
		}*/
		// 其他用户名判断信息
		if( strlen($username) <6 || strlen($username)>20 ||  strstr($username,' ',true)){
			$mess = '用户名格式有误，请检查';
		      	$url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
		      	$second = '3';
		      	$this -> error($mess,$url,$second);
	      		exit;
		}
		$pwd=$this -> input_str($_POST['password']);
		//判断密码是否为空，前台以经控制，后台可以关闭
		/*		if(empty($pwd)){
			$mess = '密码为空';
	            $url ='http://blog.com/index.php?g=admin&c=privilege&a=login';
	            $second = '3';
	            $this -> error($mess,$url,$second);
	            exit;
		}*/
		// 密码的其他信息判断
		if( strlen($pwd) < 4 || strlen($pwd)>20 ||  strstr($pwd,' ',true)){
			$mess = '密码格式有误，请检查';
		      	$url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
		      	$second = '3';
		      	$this -> error($mess,$url,$second);
	      		exit;
		}

		// 创建admin表的实例化对象
		$userInfo=new AdminModel();
		// 调取用户信息
		$res=$userInfo -> get_userinfo($username);
		// 判断是否有返回值
		if(!$res){
			$mess = '用户名不存在，请检查';
		      	$url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
		      	$second = '3';
		      	$this -> error($mess,$url,$second);
	      		exit;
		}
		// 判断返回的密码是否相等
		if($res['a_pwd']!=$pwd){
			$mess = '密码不正确，请检查';
		      	$url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
		      	$second = '3';
		      	$this -> error($mess,$url,$second);
	      		exit;
		}

		// 将用户信息存入session
		$_SESSION['userInfo']=$res;
		$_SESSION['userInfo']['a_name']=$username;

		$ip=$_SERVER['REMOTE_ADDR'];

		if(!$userInfo -> update_userinfo($res['a_id'],$ip)){
				$mess = '系统繁忙';
		      	$url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
		      	$second = '3';
		      	$this -> error($mess,$url,$second);
	      		exit;
		}

		// 登录成功跳转
		if($ip==$res['a_last_ip']){
			$time=$this-> time_str($res['a_last_time']);
			$mess = '已经离开'.$time.',欢迎回来！';
			$url = 'http://blog.com/index.php?g=admin&c=index&a=index';
			$second = '3';
		      	$this -> success($mess,$url,$second);
		}else{
			$mess = '您的登录上次登录地点为:'.$res['a_last_ip'].'(某地点，后期加),请注意账号安全';
			$url = 'http://blog.com/index.php?g=admin&c=index&a=index';
			$second = '3';
		      	$this -> success($mess,$url,$second);
		}


	}
	public function action_captcha(){
		$config=$GLOBALS['config']['captcha'];
		new Captcha($config);
	}
	public function action_logout(){
		setcookie('username',null,time()-1,'/');
		setcookie('PHPSESSID',' ',time()-1,'/');
		session_destroy();
		$mess = '成功登出';
      	$url = 'http://blog.com/index.php?g=admin&c=privilege&a=login';
      	$second = '3';
      	$this -> error($mess,$url,$second);
    		exit;
	}
}
?>
