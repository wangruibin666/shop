
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
					<form action="loginCheck.php" method="post">
						
						<p><input type="text" name="username" placeholder="用户名"></p>
			
						<p><input type="text" name="password" placeholder="密码"></p>

						<p><input type="submit" value="登 录"></p>
						<p>还没有账号？点击 &nbsp<a href="register.php">立即注册</a></p>
					</form>
				</div>
		</div>
		<div class="nav"></div>
		<?php
			include "footer.php";
		?>


	</div>
</body>
</html>