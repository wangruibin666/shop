<?php 
	
	session_start();
	error_reporting(0);

	include "../public/common/config.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$fcode = $_POST['fcode'];
	$vcode = $_SESSION['authcode'];
	
	if($fcode==$vcode){
		if($password==$repassword){
			$sql = "insert into user(username,password) values('{$username}','{$password}')";
			if(mysql_query($sql)){
				$_SESSION['home_username']=$username;
				$_SESSION['home_userid']=mysql_insert_id();
				echo "<script>location='person/index.php'</script>";
			}	
		}else{
			echo "<script>location='register.php'</script>";
		}
	}else{
		echo "<script>location='register.php'</script>";
	}
	    	


 ?>