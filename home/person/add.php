<?php 	
	session_start();
	header("content-type:text/html;charset=utf-8");
	include "../../public/common/config.php";
	error_reporting(0);
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$user_id = $_SESSION['home_userid'];

	$sql = "insert into touch(name,addr,tel,email,user_id) value('{$name}','{$addr}','{$tel}','{$email}','{$user_id}')";
	if(mysql_query($sql)){
		echo "<script>alert('添加成功！')</script>";
		echo "<script>location='userlist.php'</script>";
	}
		
 ?>