<?php
return [
	//数据库相关
	'db'=>[
		'type'=>'mysql',
		'host'=>'127.0.0.1',
		'port'=>'3306',
		'dbname'=>'blog',
		'charset'=>'utf8',
		'user'=>'root',
		'pwd'=>'1111',
		'prefix'=>'blog_'
	],

	// 验证码相关
	'captcha'=>[
		'width'=>100,
		'height'=>40,
		'chars'=>4
	],
	// 分页相关
	// showPages：页码显示的个数
	// rows:每页显示的item数量
	'pages'=>[
		'showPages'=>9,
		'rows'=>5
	],

	// 图片上传相关保存目录
	'images'=>'./upload/images'
];
