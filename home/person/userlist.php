<?php 
	session_start(); 
	include "../../public/common/config.php";
	$user_id = $_SESSION['home_userid'];
	$sql = "select * from touch where user_id = {$user_id}";
	$rst = mysql_query($sql);
	
	    	

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
								<li><a href="useradd.php">添加收货地址</a></li>
								<li><a href="orderlist.php">查看我的订单</a></li>
							</ul>
							

						</div>


						<div class="floorFooter2Right">
							<table width="100%">
								<tr>
									<th>姓名</th>
									<th>地址</th>
									<th>电话</th>
									<th>邮箱</th>
									<th>修改</th>
									<th>删除</th>	
								</tr>

								<?php 
									while($row=mysql_fetch_assoc($rst)){

									

								echo "<tr>
											<th>{$row['name']}</th> 
											<th>{$row['addr']}</th>
											<th>{$row['tel']}</th>
											<th>{$row['email']}</th>
											<th><a href='useredit.php?id={$row['id']}'>修改</a></th>
											<th><a href='userdelete.php?id={$row['id']}' onclick='return confirm('您确定退出系统吗！')'>删除</a></th>
										</tr>";
										
									}
								// echo'<pre>';
								// print_r($row);
								// echo'</pre>';	

								 ?>
								
								
								
							</table>
						</div>
					


					<div class="clear"></div>
				</div>

		<?php
			include "../footer.php";
		?>


	</div>
</body>
</html>