<?php
namespace frame\core;

class Pages{
	// 获取每页的item数(系统定义)
	private static $rows='';
	// 当前页(传参)
	private static $curPage='';
	// 获取item总数(MySQL获取)
	private static $totalRows='';
	// 显示的页码个数(系统定义)
	private static $showPages='';
	// 路径
	private static $path='';
	public function __construct($arr){
		self::$rows=$arr['rows'];
		self::$curPage=$arr['curPage'];
		self::$totalRows=$arr['totalRows'];
		self::$showPages=$arr['showPages'];
		self::$path=$arr['path'];
	}

	public function page_block(){
		$pageNumString='';
		self::$curPage>ceil(self::$showPages/2) ? $end=self::$curPage+floor(self::$showPages/2): $end=self::$showPages;
		// 总页数
		$totalPages=ceil(self::$totalRows/self::$rows);
		// 分页的最后一位
		$end=$end<$totalPages?$end:$totalPages;
		// 分页的第一位
		$begin=$end-self::$showPages>0?$end-(self::$showPages-1):1;
		$pageNumString.="<li><a href='".self::$path."&curPage=1'>首页</a></li>";
		$prev= self::$curPage-1 <1 ? 1 : self::$curPage-1 ;
		$pageNumString.="<li><a href='".self::$path."&curPage=$prev'>&laquo;</a></li>";
		for($i=$begin;$i<=$end ;$i++){
			if($i==self::$curPage){
				$pageNumString.="<li class='active'><a href='".self::$path."&curPage=$i'>$i</a></li>";
			}else{
				$pageNumString.="<li><a href='".self::$path."&curPage=$i'>$i</a></li>";
			}
		}
		$next= self::$curPage+1 > $totalPages ? $totalPages : self::$curPage+1;
		$pageNumString.="<li><a href='".self::$path."&curPage=$next'>&raquo;</a></li>";
		$pageNumString.="<li><a href='".self::$path."&curPage=$totalPages'>尾页</a></li>";
		return $pageNumString;
	}
}


