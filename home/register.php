<?php 
	session_start(); 
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
		<div class="contentt">
			<div class="login">

			</div>
			<div class="loginForm">
					<form action="regadd.php" method="post">
						
						<p><input type="text" name="username" placeholder="用户名"></p>
						
						<p><input type="text" name="password" placeholder="密码"></p>
						
						<p><input type="text" name="repassword" placeholder="确认密码"></p>
						<p><img src="vcode.php" alt="验证码" style="cursor:pointer;" title="看不清可单击图片刷新" onclick="this.src='vcode.php?rand='+Math.random();" /></p>
						<p><input type="text" name="fcode" placeholder="验证码"></p>
							
						<p><input type="submit" value="注 册"><input type="reset"></p>
						
					</form>
				</div>
		</div>
		<div class="nav"></div>
		<?php
			include "footer.php";
		?>


	</div>
	<script type="text/javascript" src="public/js/jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
			
		
	</script>
</body>
</html>