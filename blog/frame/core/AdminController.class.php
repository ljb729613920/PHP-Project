<?php
namespace frame\core;

class AdminController extends Controller{
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['userInfo'])){
			$this-> error('请先登录','index.php?g=admin&c=privilege&a=login');
			exit;
		}
	}
}
