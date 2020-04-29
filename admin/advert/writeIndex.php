<?php
include "../../public/common/config.php";

	include "../lock.php";

$sql = "select * from class";
$rst = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../public/css/index.css">
	<style type="text/css">
		#submitbtn{
			width: 100px;

		}
	</style>
</head>
<body>
	<h3>添加商品</h3>
	<div class="form">

		<form action="write.php" method="post" enctype="multipart/form-data">
			<p>位置</p>
			<p>
				<select name="pos" id="">
					
					<option value="0">0</option>
					<option value="1">1</option>
				</select>

			</p>
			<p>图片</p>
			<p><input type="file" name="img" /></p>
			<p>URL：</p>
			<p><input type="text" name="url" /></p>
			<p><input type="submit" value="添加" /></p>
		</form>
	</div>
	
	
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
		// $("#submitbtn").click(function(){
			
		// 	$.post("write.php",
		// 		function(data){
		// 		if(data.result == "ok"){
		// 			alert("添加成功");
		// 			location = "index.php";
		// 		}
		// 	});

		

		// });
	</script>
</body>
</html>