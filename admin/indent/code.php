<?php 
	include "../lock.php";
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

			<td>名称</td>
			<td>图片</td>
			<td>价格</td>
			<td>数量</td>
			<td>合计</td>
			
			
			

			
		</tr>
		
	</table>
	</div>
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">


		$ID = getQueryVariable("code_id");
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

		$.get("read3.php",{"code" :$ID },function(data){


			//返回的data是一个json，现在开始组建DOM
			for( var i = 0 ; i < data.jieguo.length ; i++){

				var o = eval("(" + data.jieguo[i] + ")");
				
				$("#biaoge").append($(
					"<tr num=" + o.id + ">" + 

						"<td>" + o.name + "</td>" +
						"<td><img src='../../public/uploads/thumb_" + o.img + "' width='100px'></td>" +
						"<td>" + o.price + "</td>" +
						"<td>" + o.num + "</td>" +
						"<td>" + o.num*o.price + "元</td>" +
					
						
						
						
					

						
						
					"</tr>"

					));
				// console.log("1");
			}
			
		});



	</script>
</body>
</html>
