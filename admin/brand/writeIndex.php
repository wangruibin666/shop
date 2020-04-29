<?php
include "../../public/common/config.php";

	include "../lock.php";

$sql = "select * from class";
$rst = mysql_query($sql);
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
	<h3>添加名称</h3>
	<div class="form">
		<p>品牌名称：<input type="text" id="name" /></p> 
		
		<p>选择分类：</p>
		<p>
			<select id="class_id">
				<?php 
				while($row = mysql_fetch_assoc($rst)){

					echo "<option value='{$row['id']}'>{$row['name']}</option>";
				}

				?>
			</select>

		</p>
		<p>
			<input type="button" value="添加" id="submitbtn"/>
		</p>
	</div>
	
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
		$("#submitbtn").click(function(){
			
			$.post("write.php",{
				"name" 	: $("#name").val(),
				"class_id": $("#class_id").val()
		
				
			},function(data){
				if(data.result == "ok"){
					alert("添加成功");
					location = "index.php";
				}else{
					alert("添加失败");
					
				}
			});

		

		});
	</script>
</body>
</html>