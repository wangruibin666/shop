<?php 
	session_start(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类列表页面</title>
	<link rel="stylesheet" type="text/css" href="../public/css/index.css">
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
			include "../header.php";
		?>
	<div class="main">
		<div class="nav"></div>
		
				<div class="floorHeader">
					<div class="left">
						<span><a href="">个人中心&gt&gt</a></span>
					</div>
					
				</div>
				
					<div class="floorFooter2">
						<div class="floorFooter2Left">
							<ul>
								<li><a href="userlist.php">查看收货地址</a></li>
								<li><a href="javascript:;">添加收货地址</a></li>
								<li><a href="orderlist.php">查看我的订单</a></li>
							</ul>
							

						</div>


						<div class="floorFooter2Right">

							<div class="personUseraddLeft">
								<img src="../public/img/welcom.jpg" alt="">

							</div>
							<div class="personUseradd">

							<form action="add.php" method="post">
								<p>姓名</p>
								<p><input type="text" name="name"></p>
								<p>地址</p>
								<p><input type="text" name="addr"></p>
								<p>电话</p>
								<p><input type="text" name="tel"></p>
								<p>邮箱</p>
								<p><input type="text" name="email"></p>
								<p><input type="submit" value="添加"></p>

							</form>		
							</div>
						</div>
					


					<div class="clear"></div>
				</div>

		<?php
			include "../footer.php";
		?>


	</div>
</body>
</html>