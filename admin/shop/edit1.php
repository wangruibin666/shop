<?php
include "../../public/common/config.php";
 
	include "../lock.php";



$id = $_GET["id"];

$sqlShop = "select * from shop where id = {$id}";
$rstShop = mysql_query($sqlShop);
$rowShop = mysql_fetch_assoc($rstShop);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../public/css/index.css">
	<style type="text/css">
		#submitbtn{
			width: 100px;

		}
	</style>
</head>
<body>
	<h3>添加商品</h3>
	<div class="form">

	<form action="update.php" method="post" enctype="multipart/form-data">
		<p>商品名称:</p>
		<p><input type="text" name="name" value="<?php echo $rowShop['name'] ?>" /></p> 
		<p>商品价格:</p>
		<p><input type="text" name="price" value="<?php echo $rowShop['price'] ?>" /></p>
		<p>商品库存:</p>
		<p><input type="text" name="stock" value="<?php echo $rowShop['stock'] ?>" /></p>
		
		<p>货架:</p>
		<p>
			<?php
				if($rowShop['shelf']==0){
			?>
					<label>
				<input type="radio" value="0" name="shelf" checked />上架
			</label>
			<label>
				<input type="radio" value="1" name="shelf" />下架
			</label>
			<?php
		}else{
			?>
			<label>
				<input type="radio" value="0" name="shelf"  />上架
			</label>
			<label>
				<input type="radio" value="1" name="shelf" checked />下架
			</label>
		<?php
		}
		?>	
		</p>
		<p>品牌:</p>
		<p>
			<select name="brand_id" id="brand_id">
				<?php 
					$sqlClass = "select * from class";
					$rstClass = mysql_query($sqlClass);
					while($rowClass = mysql_fetch_assoc($rstClass)){

						echo "<option disabled>{$rowClass['name']}</option>";

						$sqlBrand = "select * from brand where class_id = {$rowClass['id']}";
						$rstBrand = mysql_query($sqlBrand);
						while($rowBrand = mysql_fetch_assoc($rstBrand)){

							if($rowBrand['id']==$rowShop['brand_id']){
								echo "<option value='{$rowBrand['id']}' selected>|--{$rowBrand['name']}</option>";
							}else{
								echo "<option value='{$rowBrand['id']}'>|--{$rowBrand['name']}</option>";
							}
							
						}
					}

				 ?>
			</select>

		</p>
		
		<p>原图：</p>
		<div><img src="../../public/uploads/<?php echo $rowShop['img'] ?>" alt="" width="100px" /></div>

		<p>图片:</p>
		<p><input type="file" name="img" /></p>
		<!-- 隐藏域带参数 -->
		<input type="hidden" name="id" value="<?php echo $rowShop['id'] ?>" />
		<input type="hidden" name="imgsrc" value="<?php echo $rowShop['img'] ?>" />
		<p>
			<input type="submit" value="修改" id="submitbtn"/>
		</p>
		</form>
	</div>
	
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
// 		$("#submitbtn").click(function(){
			
// 			$.post("update.php",{
				
// 				"ID"	: $ID
				
		
				
// 			},function(data){
// 				if(data.result == "ok"){
// 					alert("修改成功");
// 					location = "index.php";
// 				}else{
// 					alert("修改失败");
					
// 				}
// 			});

		

// 		});

// 		$ID = getQueryVariable("id");
// 		console.log($ID);
// 		function getQueryVariable(variable)
// {
//        var query = window.location.search.substring(1);
//        var vars = query.split("&");
//        for (var i=0;i<vars.length;i++) {
//                var pair = vars[i].split("=");
//                if(pair[0] == variable){return pair[1];}
//        }
//        return(false);
// }
	</script>
</body>
</html>