<?php
include "../../public/common/config.php";
 
	include "../lock.php";


$id = $_GET["id"];

$sqlBrand = "select * from brand where id={$id}";
$rstBrand = mysql_query($sqlBrand);
$rowBrand = mysql_fetch_assoc($rstBrand);


$sqlClass = "select * from class";

$rstClass = mysql_query($sqlClass);




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
		<p>品牌名称：<input type="text" id="name" value="<?php echo $rowBrand['name'] ?>" /></p> 
		
		<p>选择分类：</p>
		<p>
			<select id="class_id">
				<?php 
				while($rowClass = mysql_fetch_assoc($rstClass)){

					if($rowClass["id"]==$rowBrand["class_id"]){
						echo "<option selected value='{$rowClass['id']}'>{$rowClass['name']}</option>";
					}else{
						echo "<option value='{$rowClass['id']}'>{$rowClass['name']}</option>";
					}

					
				}

				?>
			</select>

		</p>
		<p>
			<input type="button" value="修改" id="submitbtn"/>
		</p>
	</div>
	
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
		$("#submitbtn").click(function(){

			console.log($("#name").val());
			console.log($("#class_id").val());
			console.log($ID);
			
			$.post("update.php",{
				"name" 	: $("#name").val(),
				"ID"	: $ID,
				"class_id": $("#class_id").val()
		
				
			},function(data){
				
				if(data.result == "ok"){
					alert("修改成功");
					location = "index.php";
				}else{
					alert("修改失败");
					
				}
			});

		

		});

		$ID = getQueryVariable("id");
	
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
	</script>
</body>
</html>