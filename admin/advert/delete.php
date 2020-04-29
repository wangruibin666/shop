<?php
	$id = $_GET["id"];

	
	include "../lock.php";

	
	

	

	//链接数据库
	$conn = mysql_connect("localhost","root","123456");
	//选择数据库
	mysql_select_db("wang",$conn);
	//设置字符集
	mysql_query("SET NAMES UTF8");
	//查询得到的结果是个混沌状态，不是数组


	$sql = "select img from advert where id = {$id}";
	$rst = mysql_query($sql);
	$row = mysql_fetch_assoc($rst);





	$file = "../../public/uploads/{$row['img']}";
	$file2 = "../../public/uploads/thumb_{$row['img']}";
	echo $file;
	echo $file2;




	

	 	$result = mysql_query("DELETE FROM advert WHERE id = {$id}");
	if($result == 1){
		unlink($file);
		unlink($file2);
		echo "ok";
	}else{
		echo "wrong";
	}
	mysql_close($conn);
?>