<?php
	include "../lock.php";

	header("Content-type: application/json");

	$name = $_POST["name"];

	$conn = mysql_connect("localhost","root","123456");

	mysql_select_db("wang",$conn);

	mysql_query("SET NAMES UTF8");

	$result = mysql_query("INSERT INTO class (name) VALUES ('{$name}')");
 
	if($result == 1){
		echo '{"result":"ok"}';
	}else{
		echo '{"result":"wrong"}';
	}

	mysql_close($conn);
?>
