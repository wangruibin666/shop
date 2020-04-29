<?php
			// header("Content-type: text/html; charset=utf-8");//当echo语句不解析的时候用
 
	include "lock.php";
 
session_start();
	$password = $_POST["password"];
	$name = $_POST["username"];
	// echo "<pre>";

	// print_r($_POST);
	// echo "</pre>";
	// exit;
	
$conn = mysql_connect("localhost","root","123456");
 	
 	//选择链接哪个库？
	mysql_select_db("wang", $conn);
	//更改数据操作字符集
	mysql_query("SET NAMES UTF8");//不是UTF-8!!!
	//执行SQL语句，就把检索结果放到了$result变量中
	$result = mysql_query("UPDATE user SET password = '{$password}' WHERE username ='{$name}' ");
	

	
	if($result == 1){
		$_SESSION=array();
		session_destroy();
		setcookie("PHPSESSID","",time()-3600,"/");
		echo "<script>top.location='login.php'</script>";

	}else{
		echo '...';
	}
	


	
	
?>