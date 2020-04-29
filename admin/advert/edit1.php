<?php
include "../../public/common/config.php";
 
	include "../lock.php";


$id = $_GET["id"];

$sql = "select * from advert where id = {$id}";
$rst = mysql_query($sql);
$row = mysql_fetch_assoc($rst);




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
			<p>位置</p>
			<p>
				<select name="pos" id="">
					<?php 
						switch ($row['pos']) {
							case 0:
							?>
								<option value="o" selected>0</option>
								<option value="1">1</option>
								<?php
								break;
							case 1:
							?>
								<option value="o">0</option>
								<option value="1" selected>1</option>
								<?php
								break;
								
							
						
						}
					 ?>
					
				</select>

			</p>
			<p>原图：</p>
			<div><img src="../../public/uploads/<?php echo $row['img']?>" width="200px" /></div>
			<p>图片</p>
			<p><input type="file" name="img" /></p>
			<p>URL：</p>
			<p><input type="text" name="url" value="<?php echo $row['url'] ?>" /></p>

			<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
		<input type="hidden" name="imgsrc" value="<?php echo $row['img'] ?>" />
			<p><input type="submit" value="修改" /></p>
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