<?php 
	session_start();
	include "../public/common/config.php";
	header("content-type:text/html;charset=utf-8");
	$id = $_GET["class_id"];
	$sqlClass = "select * from class where id = {$id}";
	$rstClass = mysql_query($sqlClass);
	$rowClass = mysql_fetch_assoc($rstClass);

	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类列表页面</title>
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
	<style type="text/css">
		.floorHeader .left a{
			color: white;
		}
		.floorHeader .left a:hover{
			color: #eee;
		}
	</style>
</head>
<body>
	
		<?php
			include "header.php";
		?>
		<div class="main">
		<div class="nav"></div>
		<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span><a href="index.php">首页</a>&gt&gt<?php echo $rowClass['name'] ?></span>
					</div>
					<div class="right">
					<?php 
						$sqlBrand = "select * from brand where class_id={$id}";
						$rstBrand = mysql_query($sqlBrand);
						$firstBrand = '';
						$i = 0;

						while($rowBrand = mysql_fetch_assoc($rstBrand)){
							if($i == 0){
								$firstBrand = $rowBrand['id'];
							}
							
							echo "<a href='class.php?class_id={$id}&brand_id={$rowBrand['id']}'><span>{$rowBrand['name']}</span></a>";
					
							$i++;
						}
					 ?>
						
						
					
					</div>
				</div>
				<div class="content">
					<div class="floorFooter2">

					<?php 

						error_reporting(0);//这里有个notice，用这个去掉notice先不管！
						$brand_id = $_GET['brand_id'] ? $_GET['brand_id']:$firstBrand;
						
						
						$sqlShop = "select * from shop where brand_id={$brand_id}";
						$rstShop = mysql_query($sqlShop);
						

						while($rowShop=mysql_fetch_assoc($rstShop)){
						?>
							<a href="shop.php?shop_id=<?php echo $rowShop['id'] ?>">
							<div class="shop">
								<div class="shopImg">
									<img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt="">
								</div>
								
								<div class="shopInfo">
									<span class="shopName">MacBook</span>
									<span class="shopPrice">¥9999</span>
								</div>
							</div>
						</a>


					<?php	
						}

					 ?>
						


					<div class="clear"></div>
				</div>

		<?php
			include "footer.php";
		?>


	</div>
</body>
</html>