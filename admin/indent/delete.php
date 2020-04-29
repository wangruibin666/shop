<?php
	$code=$_GET['code'];
	
	 
	include "../lock.php";
	//链接数据库
	$conn = mysql_connect("localhost","root","123456");
	//选择数据库
	mysql_select_db("wang",$conn);
	//设置字符集
	mysql_query("SET NAMES UTF8");
	//查询得到的结果是个混沌状态，不是数组

	$result = mysql_query("DELETE FROM indent WHERE code = '{$code}'");

	
	 
	if($result == 1){
		
		echo "<script>alert('删除成功！')</script>";
		echo "<script>location='index.php'</script>";
	}else{
		echo "wrong";
	}
	mysql_close($conn);
?>