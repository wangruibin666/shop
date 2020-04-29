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
								<li><a href="javascript:;">查看我的订单</a></li>
							</ul>
							

						</div>


						<div class="floorFooter2Right">
							<table width="100%">
								<tr>
									<th>订单号</th>
									<th>下单时间</th>
						
									<th>订单状态</th>
									<th>确认收货</th>
										
								</tr>
								<?php 	
									$user_id = $_SESSION['home_userid'];

									$sql = "select indent.*,status.name from indent,status where indent.status_id = status.id and indent.user_id = {$user_id} group by indent.code";
									$rst = mysql_query($sql);
									while($row=mysql_fetch_assoc($rst)){
										echo "<tr>";
										echo "<th><a href='code.php?code_id={$row['code']}&confirm={$row['confirm']}'>{$row['code']}</a></th>";
										echo "<th>{$row['time']}</th>";
										echo "<th>{$row['name']}</th>";

										if($row['confirm']==1){
												echo "<th><a href='confirm.php?code={$row['code']}&confirm={$row['confirm']}'>确认</a></th>";

										}else{
											echo "<th><a href='code.php?code_id={$row['code']}&confirm={$row['confirm']}'>评论</a></th>";
										}
										
												
										echo "</tr>";
									}

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