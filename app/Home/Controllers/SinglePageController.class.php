<?php
namespace app\home\controllers;

use frame\core\Controller;


class SinglePageController extends Controller{
	public function action_aboutMe(){
		$this-> view ->display('../common/aboutme.html');
	}
}
