<?php
include "../lock.php";

	header("Content-type: application/json");
	//得到信息
	$name = $_POST["name"];



	//正则验证
	if(preg_match("/[\<\>\@\$\&\*\%]/",$name)){
		echo '{"result":"wrong"}';
		exit;
	}
	
	
	
	//设置时区
	date_default_timezone_set('Asia/Shanghai'); 
	$shijian = date('y-m-d H:i:s',time());
	//创建一个连接。连接哪个数据库服务器、用户名、密码
	$conn = mysql_connect("localhost","root","123456");
	//选择一个数据库
	mysql_select_db("wang",$conn);

	//设置一下字符集 mysql_query就是执行SQL的意思
	mysql_query("SET NAMES UTF8");

	//执行一条SQL语句，SQL语句操作数据库的语句。SQL是独立的语言，PHP、JavaEE、.net、pethon都在用SQL语句
	$result = mysql_query("INSERT INTO class (name) VALUES ('{$name}')");
 
	if($result == 1){
		echo '{"result":"ok"}';
	}else{
		echo '{"result":"wrong"}';
	}
	//关闭数据库
	mysql_close($conn);
?>