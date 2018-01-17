<?php
namespace frame\core;

// use frame\core\MyPDO;

class Model{
	protected $dbh=null;

	public function __construct(){
		$config=$GLOBALS['config']['db'];

		$this->dbh=new MyPDO($config);
	}
}

