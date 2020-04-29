<?php

	 header("Content-type: text/html; charset=utf-8");//当echo语句不解析的时候用
	include "../../public/common/function.php";
	mysql_connect("localhost","root","123456");
	mysql_query("set names utf8");
	mysql_select_db("wang");

	include "../lock.php";
 
	

	$id = $_POST["id"];
	$name = $_POST["name"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$shelf = $_POST["shelf"];
	$brand_id = $_POST["brand_id"];
	$imgsrc = $_POST["imgsrc"];


	$imgerror = $_FILES['img']['error'];

	if($imgerror===0){
		//图片上传
		$src = $_FILES['img']['tmp_name'];
		$name = $_FILES['img']['name'];
		$ext = array_pop(explode('.', $name));
		$dst = '../../public/uploads/'.time().mt_rand().'.'.$ext;

		if(move_uploaded_file($src, $dst)){
			//进行图片缩放200x200
			thumb($dst,200,200);
	
			//删除原图
			$oldfile = "../../public/uploads/{$imgsrc}";
			$oldfile2 = "../../public/uploads/thumb_{$imgsrc}";
	
			unlink($oldfile);
			unlink($oldfile2);
			$img = basename($dst);
	
			$sql="update shop set name='{$name}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}',img='{$img}' where id={$id}";
			if(mysql_query($sql)){
				echo "<script>location='index.php';</script>";
			}
 
		}
		// if(mysql_query($sql)){
		// 	echo "<script>alert('添加成功！');</script>";
		// 	echo "<script>location='index.php';</script>";
		// }
	
		}else{
			$sql="update shop set name='{$name}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}' where id={$id}";
			if(mysql_query($sql)){
				echo "<script>location='index.php';</script>";
			}
	}




?>