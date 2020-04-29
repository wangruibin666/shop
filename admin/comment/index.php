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
			<td>编号</td>
			<td>用户</td>
			<td>商品</td>
			<td>评论</td>
			<td>时间</td>
			
			<td></td>
			
		</tr>
		
	</table>
	</div>
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
		$.get("read.php",{"paixu":1},function(data){

			//返回的data是一个json，现在开始组建DOM
			//返回的data是一个json，现在开始组建DOM
			for( var i = 0 ; i < data.jieguo.length ; i++){
				var o = eval("(" + data.jieguo[i] + ")");
				$("#biaoge").append($(
					"<tr num=" + o.id + ">" + 
						"<td>" + o.id + "</td>" +
						"<td>" + o.username + "</td>" +
						"<td>" + o.name + "</td>" +
						"<td>" + o.content + "</td>" +
						"<td>" + o.time + "</td>" +
						
						
						
					

						
						
						
						"<td><a class='del' href='javascript:;' >删除</a></td>" +
					"</tr>"

					));
				// console.log("1");
			}
			//DOM组建完毕，可以给所有的a标签添加事件监听
					//事件绑定
			$("a.del").click(function(){
				
				var num = $(this).parents("tr").attr("num");

				if(!confirm("你真的要删除id为" + num + "的条目么？")){
					return;
				}
				//备份
				var $this = $(this);
				//单击事件
				$.get("delete.php",{"id" : num} , function(data){
					alert("删除成功！");
					$this.parents("tr").fadeOut();

				});
			});
			//事件绑定
			// $(".name").click(function(){
			// 	var num = $(this).parents("tr").attr("num");
			// 	$(this).hide();
			// 	$(this).after("<input type='text' class='kk' />");
			// 	//让自己的兄弟的kk（就是上一条语句添加的那个kk，里面的内容变为自己的html值
			// 	$(this).siblings(".kk").val($(this).html());
			// 	//让光标在框里面闪烁，focus 是原生js方法，所以加[0]
			// 	$(this).siblings(".kk")[0].focus();

			// 	//添加监听
			// 	$(this).siblings(".kk").keydown(function(event){
			// 		$this = $(this);

					
			// 		if(event.keyCode == 13){
			// 				update($this);
			// 		}

			// 	});

			// 	$(this).siblings(".kk").blur(function(){
			// 		update($this);
			// 	});

			// 	function update(){
			// 		//按下回车键
			// 			$.get("update.php",
			// 				{
			// 					"id" : num , 
			// 					"fenlei" : $this.val()
			// 				},
			// 				function(data){
			// 						if(data.result == "ok"){
			// 							$this.hide();
			// 							$this.siblings(".name").html($this.val()).fadeIn();
			// 						}
			// 			});
			// 	}
			// });
		});
	</script>
</body>
</html>