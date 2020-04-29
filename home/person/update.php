<?php 	
	session_start();
	header("content-type:text/html;charset=utf-8");
	include "../../public/common/config.php";
	error_reporting(0);
	$id = $_POST['id'];
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	
	    	

	$sql = "update touch set name='{$name}',addr='{$addr}',tel='{$tel}',email='{$email}' where id={$id} ";
	if(mysql_query($sql)){
		echo "<script>alert('修改成功！')</script>";
		echo "<script>location='userlist.php'</script>";
	}
		
 ?>