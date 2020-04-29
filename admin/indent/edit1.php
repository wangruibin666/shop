<?php
include "../../public/common/config.php";

include "../lock.php";

$code = $_GET["code"];
$status_id = $_GET["status_id"];

$sql = "select * from status";
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
	<h3>修改订单</h3>
	<div class="form">
		<p>订单号：<input type="text" id="code" value="<?php echo $code ?>" /></p> 
		
		<p>选择状态：</p>
		<p>
			<select id="status_id">
				<?php 
				while($row = mysql_fetch_assoc($rst)){

					if($status_id==$row["id"]){
						echo "<option selected value='{$row['id']}'>{$row['name']}</option>";
					}else{
						echo "<option value='{$row['id']}'>{$row['name']}</option>";
					}

					
				}

				?>
			</select>

		</p>
		
	<input type="hidden" name="code" />
		<p>
			<input type="button" value="修改" id="submitbtn"/>
		</p>
		</div>

	
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">


		$status_id = getQueryVariable("status_id");


		$code = getQueryVariable("code");

		function getQueryVariable(variable)
		{
	        var query = window.location.search.substring(1)
	        var vars = query.split("&");
	        for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
	        }
	        return false;
		}



		$("#submitbtn").click(function(){
			
			$status_id = $('#status_id').val()

			$.post("update.php",{
				"status_id": $status_id,
				"code"     : $code
			},function(data){

				if(data.result === "ok"){
					alert("修改成功");
					location="index.php";
					
				}else{
					alert("修改失败");
					
				}
			});

		

		});


		




		

		
	</script>
</body>
</html>