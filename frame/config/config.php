<?php
return [
	//数据库相关
	'db'=>[
		'type'=>'mysql',//数据库类型
		'host'=>'127.0.0.1',//主机地址
		'port'=>'3306',//端口号
		'dbname'=>'blog',//数据库名
		'charset'=>'utf8',//字符集
		'user'=>'root',//用户名
		'pwd'=>'1111',//密码
		'prefix'=>'blog_'//数据库表前缀
	],

	// 验证码相关
	'captcha'=>[
		'width'=>100,//验证码宽度
		'height'=>40,//验证码高度
		'chars'=>4//验证码显示的字符数
	],
	// 分页相关
	// showPages：页码显示的个数
	// rows:每页显示的item数量
	'pages'=>[
		'showPages'=>5,
		'rows'=>2
	],

	// 图片上传相关保存目录
	'upload'=>[
		'path'=>'./upload/images',
		'maxsize'=>3* 1024 * 1024,
		'prefix'=>date('YmdHis'),
		'mine' => ['image/jpeg','image/jpg','image/pjpeg','image/png','image/gif'],
		'num' => 6
	],
	// 图片上传错误信息
	'uploadErrorTip' => [
		'1' =>'上传的文件超过了限制的值(3M以内)',
		'2' =>'上传的文件超过了限制的值(3M以内)',
		'3' =>'文件只有部分被上传',
		'4' =>'没有文件被上传',
		'6' =>'找不到临时文件夹',
		'7' =>'文件写入失败',
		'1001' =>'上传的文件超过了限制的值(3M以内)',
		'1008' =>'上传文件类型不匹配'
	],
	// 缩略图配置信息
	'thumb' => [
		'img_width' => 400,
		'img_height' => 200,
		'path' => './Upload/thumber',
		'prefix' => 'thumb_'
	]
];
