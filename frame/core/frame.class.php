<?php
// 重复性文件放到此目录：
// 类的自动加载
// 自动开启session
// 设置编码
// 错误信息处理
// 目录常量
//
class Frame{
	private static function create_app(){
		if(!file_exists(APP_PATH.'/install.txt')){
			mkdir(APP_PATH);
			mkdir(APP_PATH.'/Admin');
			mkdir(APP_PATH.'/Admin/Controllers');
			mkdir(APP_PATH.'/Admin/Models');
			mkdir(APP_PATH.'/Admin/Views');
			mkdir(APP_PATH.'/Home');
			mkdir(APP_PATH.'/Home/Controllers');
			mkdir(APP_PATH.'/Home/Models');
			mkdir(APP_PATH.'/Home/Views');
			mkdir(APP_PATH.'/Runtime');
			mkdir(APP_PATH.'/Runtime/Template_c');
			mkdir(APP_PATH.'/Runtime/Cache');
			file_put_contents(APP_PATH.'/install.txt','true');
		}
	}
	public static function run(){
		//self::create_app();
		self::set_char();
		self::set_error();
		self::load_config();
		self::analyse_url();
		self::set_dir();
		self::autoload();
		// 开启session要放在实例化之前
		self::start_session();
		self::dispatch();
	}
	// 设置编码集
	private static function set_char(){
		header('Content-type:text/html;charset=utf-8');
	}
	// 设置错误信息处理
	private static function set_error(){
		ini_set('display_errors','on');
		ini_set('error_reporting',E_ALL);
	}
	//加载配置文件
	private static function load_config(){
		$GLOBALS['config']=include 'Frame/config/config.php';
	}
	// 解析url参数
	private static function analyse_url(){

		$g= isset($_GET['g']) ? $_GET['g'] : 'home';
		$c= isset($_GET['c']) ? $_GET['c'] : 'index';
		$a= isset($_GET['a']) ? $_GET['a'] : 'index';

		// 定义成常量在文件中的别的地方使用
		// 在本类或者其他类中
		define('G',$g);
		define('C',$c);
		define('A',$a);

	}
	private static function set_dir(){
		// 定义项目目录常量
		define('DIR_CONT',APP_PATH.'/'.G.'/controllers');
		define('DIR_MODEL',APP_PATH.'/'.G.'/models');
		define('DIR_TEMP',APP_PATH.'/'.G.'/views');
		define('DIR_RUNTIME',APP_PATH.'/Runtime');
		// 定义frame目录常量
		define('DIR_FRAME',str_replace('\\','/',dirname(__DIR__)));
		define('DIR_CORE',DIR_FRAME.'/core');
		define('DIR_CONFIG',DIR_FRAME.'/config');
		define('DIR_SMARTY',DIR_FRAME.'/smarty');
	}
	private static function autoload(){
		// echo __CLASS__;
		// 自动加载
		spl_autoload_register([__CLASS__,'load_core']);
		spl_autoload_register([__CLASS__,'load_controller']);
		spl_autoload_register([__CLASS__,'load_model']);
		spl_autoload_register([__CLASS__,'load_smarty']);
	}
	private static function dispatch(){
		$controller='app'.'\\'.G.'\\'.'controllers'.'\\'.C.'Controller';

		$action='action_'.A;
		$obj=new $controller();
		$obj->$action();
	}
	private static function load_core($cls){
		$cls=basename($cls);
		$file = DIR_CORE.'/'.$cls.'.class.php';
		if(file_exists($file)){
			include $file;
		}
	}
	private static function load_controller($cls){
		$cls=basename($cls);

		$file = DIR_CONT.'/'.$cls.'.class.php';
		if(file_exists($file)){
			include $file;
		}
	}
	private static function load_model($cls){
		$cls=basename($cls);
		$file = DIR_MODEL.'/'.$cls.'.class.php';
		if(file_exists($file)){
			include $file;
		}
	}
	private static function load_smarty($cls){
		$file = DIR_SMARTY.'/'.$cls.'.class.php';
		if(file_exists($file)){
			include $file;
		}
	}
	private static function start_session(){
		session_start();
	}
}
