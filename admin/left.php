<?php 
	include "lock.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>left</title>
	<style type="text/css">
		*{
			font-family: "微软雅黑";
			text-decoration: none;
		}
		a{
			color: #000;
		}
		h4{
			cursor: pointer;
			text-align: center;
			border-radius: 5px;
			background-color: #ccc;

		}
		h4:hover{
			color: blue;
		}
		div{
			display: none;
		}
		p{
			padding-left: 50px;
		}
		a:hover{
			color: blue;
		}
	</style>
	<script type="text/javascript" src="public/js/jquery-1.12.3.min.js"></script>
</head>

<body>
	<h4>用户管理</h4>
	<div>
	<p><a href="user/index.php" target="right">|-查看用户</a></p>
	<p><a href="user/writeIndex.php" target="right">|-添加用户</a></p>
	</div>
	<h4>广告管理</h4>
	<div>
	<p><a href="advert/index.php" target="right">|-查看广告</a></p>
	<p><a href="advert/writeIndex.php" target="right">|-添加广告</a></p>
	</div>
	<h4>分类管理</h4>
	<div>
	<p><a href="class/index.php" target="right">|-查看分类</a></p>
	<p><a href="class/writeIndex.php" target="right">|-添加分类</a></p>
	</div>
	<h4>品牌管理</h4>
	<div>
	<p><a href="brand/index.php" target="right">|-查看品牌</a></p>
	<p><a href="brand/writeIndex.php" target="right">|-添加品牌</a></p>
	</div>
	<h4>商品管理</h4>
	<div>
	<p><a href="shop/index.php" target="right">|-查看商品</a></p>
	<p><a href="shop/writeIndex.php" target="right">|-添加商品</a></p>
	</div>
	<h4>评论管理</h4>
	<div>
	<p><a href="comment/index.php" target="right">|-查看评论</a></p>
	</div>
	<h4>订单状态</h4>
	<div>
	<p><a href="status/index.php" target="right">|-查看状态</a></p>
	<p><a href="status/writeIndex.php" target="right">|-添加状态</a></p>
	</div>
	<h4>订单管理</h4>
	<div>
	<p><a href="indent/index.php" target="right">|-查看订单</a></p>

	</div>
	<h4>系统管理</h4>
	<div>
	<p><a href="adminpass.php" target="right">|-修改口令</a></p>
	<p><a href="logout.php" target="_top" onclick="return confirm('您确定退出系统吗！')">|-退出系统</a></p>
	<p><a href="../home/index.php" target="_blank">|-网站首页</a></p>
	</div>
</body>

	<script type="text/javascript">
		$("h4").click(function(){
			$(this).next().toggle(200);
			$("div").not($(this).next()).hide();
		});
	</script>
</html>