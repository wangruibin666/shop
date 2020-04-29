<?php 
	session_start();
	error_reporting(0);
	include "../../public/common/config.php";
	header("Content-type: text/html; charset=utf-8");
	$shop_id = $_POST['shop_id'];
	$content = $_POST['content'];
	$user_id = $_SESSION['home_userid'];
	date_default_timezone_set('Asia/Shanghai'); 
	$time = date('Y-m-d H:i:s',time());
	
	$sql = "insert into comment(user_id,content,shop_id,time) values('{$user_id}','{$content}','{$shop_id}','{$time}')";
	
	if(mysql_query($sql)){

	
		echo "<script>location='../shop.php?shop_id={$shop_id}'</script>";
	}





 ?>