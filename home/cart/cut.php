<?php 	
	session_start();
		header("Content-type: text/html; charset=utf-8");
	$id = $_GET['id'];

	$_SESSION['shops'][$id]['num']--;

	if($_SESSION['shops'][$id]['num'] < 1){

		$_SESSION['shops'][$id]['num']=1;
		echo "<script>alert('不能再减啦！')</script>";
	};
	echo "<script>location='index.php'</script>";
	

 ?>