<?php 	
	session_start();
	error_reporting(0);
  	
	include "../../public/common/config.php";
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
		<div class="content">
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>我的购物车&gt&gt</span>
					</div>
					<div class="right">
						
					</div>
				</div>
			
					<div class="floorFooter2">
						<table width="100%">
								<tr>
									<th>商品</th>
									<th>图片</th>
									<th>价格</th>
									<th>库存</th>
									<th>数量</th>
									<th>合计</th>
									<th>删除</th>
								</tr>

								<?php
									$and = 0;
									if(!$_SESSION['shops']){
											echo "您还未购买任何商品，快去<a href='../index.php' class='index'>首页</a>购买商品吧";
									}else{
										foreach($_SESSION['shops'] as $shop){
										$and += $shop['price']*$shop['num'];
								
								?>
								<tr>
									<th><?php echo $shop['name'] ?></th>
									<th>
										<img src="../../public/uploads/thumb_<?php echo $shop['img'] ?>" width="100px">
									</th>
									<th><?php echo $shop['price'] ?>元</th>
									<th><?php echo $shop['stock'] ?></th>
									<th><a href="cut.php?id=<?php echo $shop['id'] ?>" class="cartNum">-</a><span><?php echo $shop['num'] ?></span><a href="add.php?id=<?php echo $shop['id'] ?>" class="cartNum">+</a></th>
									<th><?php echo $shop['price']*$shop['num'] ?>元</th>
									<th><a href="delete.php?id=<?php echo $shop['id'] ?>" onclick="return confirm('您确定删除宝贝吗！')">删除</a></th>
								</tr>	

								<?php
									}

								?>
								<tr>
									<th>总计：</th>
									<th><?php  echo $and ?>元</th>
									<th>&nbsp;</th>
									<th></th>
									<th></th>
									<th><a href="clear.php" onclick="return confirm('您确定删除宝贝吗！')">清空购物车</a></th>
									<th><a href="../index.php">继续购物</a></th>
								
								
									
								</tr>

								
						</table>
					<?php 
								}
							 ?>
						

					<div class="clear"></div>
				</div>
				<div class="nav"></div>
				<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>收货地址&gt&gt</span>
					</div>
					<div class="right">
						
					</div>
				</div>
			
					<div class="floorFooter2">
					<?php 
						if($_SESSION['home_userid']){

							?>

							<form action="commit.php" method="post">
								
								<table width="100%" >
								<tr>
									<th>选择</th>
									<th>姓名</th>
									<th>地址</th>
									<th>电话</th>
									<th>邮箱</th>


								</tr>
								<?php 	
									  
									$user_id = $_SESSION['home_userid'];
									$sql = "select * from touch where user_id = {$user_id}";

									$rst = mysql_query($sql);
										
									$i = 0;    	
									while($row = mysql_fetch_assoc($rst)){
									
										if($i == 0){
											echo "<tr>
											<th><input type='radio' checked name='touch_id' value='{$row['id']}'></th>
											<th>
												{$row['name']}
											</th>
											<th>{$row['addr']}</th>
											<th>{$row['tel']}</th>
											<th>{$row['email']}</th>


										</tr>";

										}else{
											echo "<tr>
											<th><input type='radio' name='touch_id' value='{$row['id']}'></th>
											<th>
												{$row['name']}
											</th>
											<th>{$row['addr']}</th>
											<th>{$row['tel']}</th>
											<th>{$row['email']}</th>


										</tr>";
										}
									

										$i++;


								

									}

								 ?>
								
								
								

								</table>
							
								

						<?php
						}else{

							echo "您还未登陆！请先&nbsp;<a href='../login.php' class='aLogin'>登 录</a> ！";
						}
					 ?>
						
						

					<div class="clear"></div>
				</div>

				<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>提交我的订单&gt&gt</span>
					</div>
					
				</div>
			
					<div class="floorFooter2">
					<p class="commit"><input type="submit" value="提交订单"></p>
					</div>
				</div>
				</form>
			</div>

		<?php
			include "../footer.php";
		?>


	</div>
</body>
</html>