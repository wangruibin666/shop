<?php 
	include "../../public/common/config.php";

	include "../lock.php";
 
	$touch_id= $_GET['touch_id'];

	$sql = "select * from where id={$touch_id}";
	$rst = mysql_query($sql);

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../public/css/index.css" />
	<style type="text/css">
	
		.kk{
			width: 200px;
		}
	</style>
</head>
<body>
	<div class="main">

	<table id="biaoge" width="1000px">
		<tr>

			<td>ID</td>
			<td>姓名</td>
			<td>地址</td>
			<td>电话</td>
			<td>邮箱</td>
			
			

			
		</tr>
		
	</table>
	</div>
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">


		$ID = getQueryVariable("touch_id");
	console.log($ID);
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

		$.get("read2.php",{"touch_id" :$ID },function(data){


			//返回的data是一个json，现在开始组建DOM
			for( var i = 0 ; i < data.jieguo.length ; i++){

				var o = eval("(" + data.jieguo[i] + ")");
				
				$("#biaoge").append($(
					"<tr num=" + o.id + ">" + 

						"<td>" + o.id + "</td>" +
						"<td>" + o.name + "</td>" +
						"<td>" + o.addr + "</td>" +
						"<td>" + o.tel + "</td>" +
						"<td>"+o.email+"</td>" +
						
						
						
						
					

						
						
					"</tr>"

					));
				// console.log("1");
			}
			
		});



	</script>
</body>
</html>
