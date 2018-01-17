<?php
namespace frame\core;

use Smarty;

class View extends Smarty{
	public function __construct(){
		parent::__construct();
		// 初始化模板
		$this -> setTemplateDir(DIR_TEMP.'/'.C);
		$this -> setCompileDir(DIR_RUNTIME.'/Template_c');
		$this -> setCacheDir(DIR_RUNTIME.'/Cache');
		$this -> setLeftDelimiter('<{');
		$this -> setRightDelimiter('}>');
	}
}
