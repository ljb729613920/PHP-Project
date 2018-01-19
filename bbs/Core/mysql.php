<?php
	$a=include_once DIR_CONFIG.'config.php';
	$arr=$a['db'];
	// echo '<pre>';
	$dsn="mysql:host:{$arr['host']};port:{$arr['port']};dbname:{$arr['dbname']};";
	try{
		$dbh=new PDO($dsn,$arr['user'],$arr['password']);
	}catch(PDOException $e){
		echo '连接失败：'.$e->getMessage();
	}
	$sql="set names {$arr['charset']};use {$arr['database']};";
	$dbh->query($sql);
	/**
	 * /封装通过id获取评论数量的函数
	 * @param  [type] $dbh 数据库连接
	 * @param  [type] $id  待查找的评论id
	 * @return [type]      [description]
	 */
	function record_nums($dbh,$id){
		$sql="select count(*) c from record where r_del=1 and r_a_id='$id' ";
		$res=my_fetch($dbh,$sql);
		$re=$res['c'];
		return $re;
	}

	/**
	 * /封装通过ID查找评论的函数
	 * @param  [type] $dbh 数据库连接
	 * @param  [type] $id  待查找的评论id
	 * @return [type]      该评论的全部内容
	 */
	function search_rec($dbh,$id){
		$res=[];
		$sql="select * from record where r_id='$id' and r_del=1";
		$res[]=my_fetch($dbh,$sql);
		$username=$res[0]['r_username'];
		$sql="select * from userinfo where username='$username'";
		$res[]=my_fetch($dbh,$sql);
		return $res;
	}

	/**
	 * /通过user查找nickname
	 * @param  string  $user 传入用户名
	 * @return string      返回用户昵称
	 */
	function user_nick($dbh,$user){
		$sql="select nickname n from userinfo where username='$user' ";
		$nickname=my_fetch($dbh,$sql);
		return $nickname['n'];
	}
	/**
	 * /封装获取用户昵称的
	 * @param  object $dbh 数据库的链接
	 * @return stirng      用户昵称
	 */
	function nickname($dbh){
		if (isset($_SESSION['userName'])) {
			$userName=$_SESSION['userName'];
			$sql="select nickname n from userinfo where username='$userName'; ";
			$res=my_fetch($dbh,$sql);
		}
		return $res['n'];
	}
	/**
	 * /封装PDO预处理返回值为多行的语句
	 * @param  resource 	$dbh  连接数据库
	 * @param  string 		$sql    SQL语句
	 * @return   f|arr     		返回一个预处理的数组结果
	 */
	function my_fetchAll($dbh,$sql){
			$sth=$dbh->prepare($sql);
			$sth->execute();
			$res=$sth->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	/**
	 * /封装PDO预处理返回值为一行的语句
	 * @param  resource  	$dbh  连接数据库
	 * @param  string 		$sql   SQL语句
	 * @return   f|arr     		返回一个预处理的数组结果
	 */
	function my_fetch($dbh,$sql){
			$sth=$dbh->prepare($sql);
			$sth->execute();
			$res=$sth->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	/**
	 * /对两种状态切换的操作
	 * @param  resource $dbh  数据库连接
	 * @param  resource $table 更改表名
	 * @param  string $pri   表主键字段
	 * @param  string $id    所更改数据的主键
	 * @param  string $item  所更改表的字段
	 * @param  string $url1  成功跳转的地址
	 * @param  string $url2  失败跳转的地址
	 */
	// function changeA($dbh,$table,$pri='id',$id,$item,$url1,$url2){
	// 	$sql="select $item a from $table where $pri='$id'";
	// 	$res=my_fetch($dbh,$sql);
	// 	$res=($res['a']+1)%2;
	// 	$sql="update $table set $item='$res' where $pri='$id'";
	// 	$res=$dbh->exec($sql);
	// 	if($res){
	// 		header("location:$url1");
	// 	}else{
	// 		redirect("$url2",'系统错误',2);
	// 	}
	// }

	/**
	 * /执行一个SQL语句，点击对1个字段进行0和1之间进行转换
	 * @dbh  resource   数据库连接
	 * @sql  string  需要被执行的sql语句
	 * @a  string   字段名称
	 * @return [type]      [description]
	 */
	function catchNum($dbh,$sql,$a){
		$res=my_fetch($dbh,$sql);
		$res=($res[$a]+1)%2;
		return $res;
	}
/**
 * /执行一个sql语句，查看是否有行数受到影响
 * @param  resource $dbh  数据库连接
 * @param  string $sql  需要被执行的sql语句
 * @param  string $url1  成功跳转的地址
 * @param  string $url2  失败跳转的地址
 * @param  int $time 等待时间
 * @return       F|T      失败|成功    提示，跳转|跳转
 */
	function my_exec($dbh,$sql,$url1='#',$url2='#',$time=0){
		$res=$dbh->exec($sql);
		if($res){
			header("location:$url1");
			exit;
		}else{
			redirect("$url2",'系统错误',$time);
			exit;
		}
	}
