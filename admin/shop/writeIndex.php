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
		<p>商品名称:</p>
		<p><input type="text" name="name" /></p> 
		<p>商品价格:</p>
		<p><input type="text" name="price" /></p>
		<p>商品库存:</p>
		<p><input type="text" name="stock" /></p>
		
		<p>货架:</p>
		<p>
			<label>
				<input type="radio" value="0" name="shelf" checked />上架
			</label>
			<label>
				<input type="radio" value="1" name="shelf" />下架
			</label>
			
		</p>
		<p>品牌:</p>
		<p>
			<select name="brand_id" id="brand_id">
				<?php 
					$sqlClass = "select * from class";
					$rstClass = mysql_query($sqlClass);
					while($rowClass = mysql_fetch_assoc($rstClass)){

						echo "<option disabled>{$rowClass['name']}</option>";

						$sqlBrand = "select * from brand where class_id = {$rowClass['id']}";
						$rstBrand = mysql_query($sqlBrand);
						while($rowBrand = mysql_fetch_assoc($rstBrand)){
							echo "<option value='{$rowBrand['id']}'>|--{$rowBrand['name']}</option>";
						}
					}

				 ?>
			</select>

		</p>
		
		<p>图片:</p>
		<p><input type="file" name="img" /></p>
	
		<p>
			<input type="submit" value="添加" id="submitbtn"/>
		</p>
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