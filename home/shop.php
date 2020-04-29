<?php 	
	session_start(); 
	include "../public/common/config.php";

	$id = $_GET["shop_id"];
	$sqlShop = "select * from shop where id = {$id}";
	$rstShop = mysql_query($sqlShop);
	$rowShop = mysql_fetch_assoc($rstShop);

	$sqlBrand = "select brand.* from brand,shop where shop.brand_id = brand.id and shop.id = $id";
	$rstBrand = mysql_query($sqlBrand);
	$rowBrand = mysql_fetch_assoc($rstBrand);

	$class_id = $rowBrand['class_id'];
	$brand_id = $rowBrand['id'];
	$sqlClass = "select * from class where id = {$class_id}";
	$rstClass = mysql_query($sqlClass);
	$rowClass = mysql_fetch_assoc($rstClass);

	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
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
						<span><a href="class.php?class_id=<?php echo $class_id ?>&brand_id=<?php echo $brand_id ?>"><?php echo $rowBrand['name'] , $rowClass['name'] ?></a>&gt&gt<a href="javascript:;"><?php echo $rowShop['name']?></a></span>
					</div>
					<div class="right">
						
					</div>
				</div>
			
					<div class="floorFooter2">
						<table width="100%">
								<tr>
									<th>图片</th>
									<th>价格</th>
									<th>库存</th>
									<th>购物车</th>
								</tr>
								<tr>
									<th>
										<img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt="">
									</th>
									<th><?php echo $rowShop['price'] ?>元</th>
									<th><?php echo $rowShop['stock'] ?></th>
									<th>
											
									<p><img src="public/img/icons.png" alt=""></p>
										<a href="cart/write.php?id=<?php echo $rowShop['id'] ?>" class="a"><p>加入购物车</p></a>

									</th>
								</tr>

						</table>
						

					<div class="clear"></div>
				</div>
			</div>

			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>商品评论&gt&gt</span>
					</div>
					<div class="right">
						
					</div>
				</div>
			
					<div class="floorFooter2">
						<?php 	
							$sqlComment = "select comment.*, user.username from comment,user  where comment.user_id = user.id and comment.shop_id={$id}";
							$rstComment = mysql_query($sqlComment);

							while ($rowComment=mysql_fetch_assoc($rstComment)) {
								?>
								<div class="comment">
							<div class="left">
								<div class="logo">
									<img src="" alt="">
								</div>
								<div class="name"><?php echo $rowComment['username'] ?></div>
							</div>
							<div class="right">
								<span><?php echo $rowComment['content'] ?></span>
							</div>
						</div>
						<?php
							}
						 ?>
						
						

					<div class="clear"></div>
				</div>
			</div>

		<?php
			include "footer.php";
		?>


	</div>
</body>
</html>