<?php 
	include "../lock.php";
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
	<h3>添加分类</h3>
	<div class="form">
		<p>分类：<input type="text" id="name" /></p> 
		
			
		</p>
		<p>
			<input type="button" value="添加分类" id="submitbtn"/>
		</p>
	</div>
	
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
		$("#submitbtn").click(function(){
			
			$.post("write.php",{
				"name" 	: $("#name").val()
		
				
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