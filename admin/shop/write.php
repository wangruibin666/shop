<?php
	// header("Content-type: application/json");
	// //得到信息
	// $name = $_POST["name"];
	// $price = $_POST["price"];
	// $stock = $_POST["stock"];
	// $shelf = $_POST["shelf"];
	// $brand_id = $_POST["brand_id"];

	include "../lock.php";

	
	// //图片上传
	include "../../public/common/function.php";

    $conn = mysql_connect("localhost","root","123456");

	mysql_select_db("wang",$conn);

	mysql_query("SET NAMES UTF8");


	$sname = $_POST["name"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$shelf = $_POST["shelf"];
	$brand_id = $_POST["brand_id"];

//图片上传
	$src = $_FILES['img']['tmp_name'];
	$name = $_FILES['img']['name'];
	$ext = array_pop(explode('.', $name));
	$dst = '../../public/uploads/'.time().mt_rand().'.'.$ext;

	if(move_uploaded_file($src, $dst)){
		//进行图片缩放200x200
		thumb($dst,200,200);

		$img = basename($dst);

		$sql = "insert into shop(name,price,stock,shelf,brand_id,img) values('{$sname}','{$price}','{$stock}','{$shelf}','{$brand_id}','{$img}')";
 
	}
	if(mysql_query($sql)){
		echo "<script>alert('添加成功！');</script>";
		echo "<script>location='index.php';</script>";
	}


	
	
	mysql_close($conn);
?>