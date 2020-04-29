<?php

	include "../lock.php";
 
	$id = $_GET["id"];

	
	
	//链接数据库


	$conn = mysql_connect("localhost","root","123456");
	//选择数据库
	mysql_select_db("wang",$conn);
	//设置字符集
	mysql_query("SET NAMES UTF8");
	//查询得到的结果是个混沌状态，不是数组

	$sql = "select img from shop where id = {$id}";
	$rst = mysql_query($sql);
	$row = mysql_fetch_assoc($rst);//获取图片信息,以关联的形式 “img”==>"12312312312.jpg"





	$file = "../../public/uploads/{$row['img']}";
	$file2 = "../../public/uploads/thumb_{$row['img']}";


	$result = mysql_query("DELETE FROM shop WHERE id = {$id}");

	
	 
	if($result == 1){
		unlink($file);
		unlink($file2);
		echo "ok";
	}else{
		echo "wrong";
	}
	mysql_close($conn);
?>