
<?php 	
	session_start();
	// error_reporting(0);
	// include "../../public/common/config.php";
	// $code = $_GET['code'];

	// $sql = "select indent.price,indent.num,shop.name,shop.img from indent,shop where indent.shop_id=shop.id and indent.code='{$code}'";

	// $rst = mysql_query($sql);
	

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
							<table id="biaoge" width="1000px">

								
								<tr>

									<td>名称</td>
									<td>图片</td>
									<td>价格</td>
									<td>数量</td>
									<td>合计</td>
									<td>评论</td>
									
									

									
								</tr>
							
							</table>
						</div>
					


					<div class="clear"></div>
				</div>

		<?php
			include "../footer.php";
		?>


	</div>

	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">


		$ID = getQueryVariable("code_id");
		$confirm = getQueryVariable("confirm");

		function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

		$.get("read.php",{"code" :$ID },function(data){


			//返回的data是一个json，现在开始组建DOM
			for( var i = 0 ; i < data.jieguo.length ; i++){

				var o = eval("(" + data.jieguo[i] + ")");
			
				if($confirm==0){
					$("#biaoge").append($(
					"<tr num=" + o.id + ">" + 

						"<td>" + o.name + "</td>" +
						"<td><img src='../../public/uploads/thumb_" + o.img + "' width='100px'></td>" +
						"<td>" + o.price + "</td>" +
						"<td>" + o.num + "</td>" +
						"<td>" + o.num*o.price + "元</td>" +
						"<td><a href='comment.php?shop_id="+o.id+"'>评论</a></td>" +
						
						
						
					

						
						
					"</tr>"

					));

				}else{
					$("#biaoge").append($(
					"<tr num=" + o.id + ">" + 

						"<td>" + o.name + "</td>" +
						"<td><img src='../../public/uploads/thumb_" + o.img + "' width='100px'></td>" +
						"<td>" + o.price + "</td>" +
						"<td>" + o.num + "</td>" +
						"<td>" + o.num*o.price + "元</td>" +
						"<td><a href='orderlist.php' class='notCon' onclick='alert(\"请确认收货后再评论哦\")'>评论</a></td>" +
						
						
						
					

						
						
					"</tr>"

					));
					// alert("确认收货之后才可以评论哦！");

				}
				
				// console.log("1");
			}
			
		});

	

	</script>
</body>
</html>