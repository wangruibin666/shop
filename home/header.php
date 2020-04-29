<?php 
	$path = $_SERVER["PHP_SELF"];
	$arr = explode("/", $path);
	$root = "/".$arr[1];
 ?>
	<div class="header">
		<div class="w">
			<div class="headerLeft">
				<a href="<?php echo $root ?>/home/index.php">
					<span><img src="<?php echo $root ?>/home/public/img/logo.jpg"alt=""></span>
					<span>小王电子商城</span>
				</a>
				
			</div>
			<div class="headerRight">
				<a href="<?php echo $root ?>/home/index.php">首页</a>
				<?php 
				error_reporting(0);
					if(!$_SESSION['home_userid']){
						echo "<a href='{$root}/home/login.php'>登录</a>";
						echo "<a href='{$root}/home/register.php'>注册</a>";
					}else{
						echo "<span>欢迎{$_SESSION['home_username']}登录！&nbsp;<sapn><a href='{$root}/home/logout.php'>退出</a>";
					}
				 ?>
			
					
				<a onclick="linkPerson();" href="javascript:;">个人中心</a>
				<a href="<?php echo $root ?>/home/cart/index.php">购物车</a>
			</div>
		</div>
	</div>
<script>
	function linkPerson() {

		var home_userid = "<?php
			if ($_SESSION['home_userid']) {
				echo "yes";
			} else {
				echo "no";
			}
		?>"

		if (home_userid === "no") {
			alert("请先登录账户！");
			location="<?php echo $root ?>/home/login.php";
			return false;
		} else {
			location="<?php echo $root ?>/home/person/index.php";
		}
	}
</script>
