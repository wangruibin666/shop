<?php
	include "../lock.php";
	header("Content-type: application/json");
	$code = $_POST["code"];
	$status_id = $_POST["status_id"];

	

	
	// echo "<pre>";

	// print_r($_POST);
	// echo "</pre>";
	// exit;
	
$conn = mysql_connect("localhost","root","123456");
 	
 	//选择链接哪个库？
	mysql_select_db("wang", $conn);
	//更改数据操作字符集
	mysql_query("SET NAMES UTF8");//不是UTF-8!!!
	


	$sqlL = "UPDATE indent SET status_id = {$status_id} WHERE code='{$code}' ";
	// echo "<pre>";
	// print_r($sqlL);
	// echo "</pre>";

	// exit;

	//执行SQL语句，就把检索结果放到了$result变量中
	$result = mysql_query($sqlL);
	
	if($result == 1){
		
		echo '{"result":"ok"}';
	}else{
		echo '{"result":"wrong"}';
	}



	mysql_close($conn);
?>