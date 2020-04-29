<?php
	include "../lock.php";

		header("Content-type: application/json");

	
	$id = $_GET["id"];
	$xinzhi = $_GET["xinzhi"];

	$conn = mysql_connect("localhost","root","123456");
 	
 	//选择链接哪个库？
	mysql_select_db("wang", $conn);
	//更改数据操作字符集
	mysql_query("SET NAMES UTF8");//不是UTF-8!!!
	//执行SQL语句，就把检索结果放到了$result变量中
	$result = mysql_query("UPDATE user SET password = '{$xinzhi}' WHERE id = {$id}");
	
	if($result == 1){
		echo '{"result":"ok"}';
	}else{
		echo '{"result":"wrong"}';
	}

	mysql_close($conn);
?>