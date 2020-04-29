<?php
	header("content-type:text/html;charset=utf-8");

	include "../../public/common/config.php";

	$id = $_GET['id'];

	$sql = "delete from touch where id = {$id}";
	if(mysql_query($sql)){

		echo "<script>alert('删除成功！')</script>";
		echo "<script>location='userlist.php'</script>";
	}



 ?>