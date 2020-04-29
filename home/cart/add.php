<?php 	
	
	session_start();
	header("Content-type: text/html; charset=utf-8");
	$id = $_GET['id'];

	$_SESSION['shops'][$id]['num']++;

	if($_SESSION['shops'][$id]['num'] > $_SESSION['shops'][$id]['stock']){
		$_SESSION['shops'][$id]['num']=$_SESSION['shops'][$id]['stock'];
		echo "<script>alert('不能再加啦！')</script>";
	}
	
	
	echo "<script>location='index.php'</script>";


 ?>