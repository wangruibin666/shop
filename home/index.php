<?php
	session_start(); 	
	include "../public/common/config.php";

	$sqlAdvert = "select * from advert ";
	$rstAdvert = mysql_query($sqlAdvert);
	while($rowAdvert = mysql_fetch_assoc($rstAdvert)){
		$rowAds[$rowAdvert["pos"]] = $rowAdvert;
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>小王电子商城</title>
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
</head>
<body>

	
		<?php
			include "header.php"; 
		?>
	<div class="main">
		<div class="nav"></div>
		<div class="ads">
			<img src="../public/uploads/<?php echo $rowAds[0]['img'] ?>" alt="">
		</div>
		<div class="nav"></div>
		<div class="content">
			<?php 
				$sqlClass = "select * from class";
				$rstClass = mysql_query($sqlClass);
				$f = 1;

				while($rowClass=mysql_fetch_assoc($rstClass)){
			?>
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span><?php echo $f ?>F</span><?php echo $rowClass['name'] ?></span>
					</div>
					<div class="right">
						<span>热销产品</span>
						
						<a href="class.php?class_id=<?php echo $rowClass['id'] ?>"><span>更多</span></a>
					</div>
				</div>
				<div class="floorFooter">

					<?php 	
						$sqlShop = "select shop.* from shop,brand,class where shop.brand_id=brand.id and brand.class_id=class.id and brand.class_id={$rowClass['id']} and shop.shelf=0 order by rand() limit 4";
						$rstShop = mysql_query($sqlShop);
						while($rowShop = mysql_fetch_assoc($rstShop)){
					?>
						
						<a href="shop.php?shop_id=<?php echo $rowShop['id'] ?>"><div class="shop">
						<div class="shopImg">
							<img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt="">
						</div>
						
						<div class="shopInfo">
							<span class="shopNmae"><?php echo $rowShop['name'] ?></span>
							<span class="shopPrice">¥ <?php echo $rowShop['price'] ?></span>
						</div>
					</div></a>
					<?php	
						}
					 ?>
					
					
					
				</div>
			</div>		

			<?php
				$f ++;		
				}
			 ?>
					
	

		</div>
		
		<div class="nav"></div>
		<div class="ads">
			<img src="../public/uploads/<?php echo $rowAds[1]['img'] ?>" alt="">
		</div>
		<div class="nav"></div>
		
		<?php 
			include "footer.php";
		?>
	</div>
	
</body>
</html>