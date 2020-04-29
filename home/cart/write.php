<?php 	
	session_start();
	error_reporting(0);
	header("Content-type: text/html; charset=utf-8");
	include "../../public/common/config.php";
	$id = $_GET['id'];

	$sql = "select * from shop where id = {$id}";
	$rst = mysql_query($sql);
	$row = mysql_fetch_assoc($rst);
	//判断商品库存是否充足
	if($row['stock'] > 0){
		$_SESSION['shops'][$id]=$row;
    $_SESSION['shops'][$id]['num']=1;

   	echo "<script>location='index.php'</script>";
	}else{
		echo "<script>alert('库存不足！逛逛其他商品吧！')</script>";
		echo "<script>location='../index.php'</script>";
	}

    
        	
		
 ?>