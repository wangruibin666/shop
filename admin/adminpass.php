<?php 
	include "lock.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
	<style type="text/css">
		#submitbtn{
			width: 100px;

		}
	</style>
</head>
<body>

	<div class="form">
		
	<form action="adminupdate.php" method="post">
		<p>用户名：<input type="text" name="username" value="wang"  /></p> 
	
		<p>密&nbsp&nbsp&nbsp码：<input type="text" name="password" /></p> 
		
			
		
		<p>
			<input type="submit" value="修改" id="submitbtn"/>
		</p>
		</form>
	</div>
	
	<script type="text/javascript" src="user/jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
		// $("#submitbtn").click(function(){
			
		// 	$.post("adminupdate.php",{
		// 		"name" 	: $("#name").val(),
		// 		"password"	: $("#password").val()
		
				
		// 	},function(data){
		// 		if(data.result == "ok"){
		// 			alert("修改成功");
					
		// 			// top.location = "login.php";
		// 			// $_SESSION = array();
		// 			// session_destroy();
		// 			// setcookie("PHPSESSION","",time()-3600,"/");
					
		// 		}else{
		// 			alert("修改失败");
				
		// 		}
		// 	});

		

		// });
		
	</script>
</body>
</html>