<?php 

	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";;
	// exit;
	session_start();
	//����Ա��ˡ�
	

		$username = $_POST["username"];
		$password = $_POST["password"];

		include "../public/common/config.php";

		$sql = "select * from user where username='{$username}' and password='{$password}' and isadmin = 1";
		$rst = mysql_query($sql);

		$row = mysql_fetch_assoc($rst);

		if($row){
			$_SESSION["admin_username"] = $username;
			$_SESSION["admin_userid"] = $row["id"];

		
			echo "<script>location='index.php'</script>";

		}else{
			echo "<script>alert('�û������������')</script>";
			
			echo "<script>location='login.php'</script>";
		}



 ?>