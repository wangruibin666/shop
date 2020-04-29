<?php 
	session_start();
	header("content-type:text/html;charset=utf-8");

		$username = $_POST["username"];
		$password = $_POST["password"];

		include "../public/common/config.php";

		$sql = "select * from user where username='{$username}' and password='{$password}'";
		$rst = mysql_query($sql);

		$row = mysql_fetch_assoc($rst);

		if($row){
			$_SESSION["home_username"] = $username;
			$_SESSION["home_userid"] = $row["id"];

		
			echo "<script>location='person/index.php'</script>";

		}else{
			echo "<script>alert('用户名或密码错误！')</script>";
			
			echo "<script>location='login.php'</script>";
		}



 ?>