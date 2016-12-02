<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn By Doing</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="//cdn.bootcss.com/jquery/1.5.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<script src="/Public/Home/js/bgstretcher.js"></script>
    <link href="/Public/Home/css/bgstretcher.css" rel="stylesheet" />
</head>
<body>

<!-- 导航栏 start -->
<nav class="navbar navbar-inverse" role="navigation">
</nav>
<!-- 导航栏 end -->

<div class="col-sm-12">

	<div class="col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading" style="text-align: center;font-size: 20px;">
				<i class="fa fa-user"></i>翻译的内容
			</div>
			<div class="panel-body" style="height: 300px;">
				<div id="content" class="form-control" contenteditable="true" style="width: 100%;height:100%; font-size: 20px;"  oninput="Get_translate();">
					
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading" style="text-align: center; font-size: 20px;">
				释义
			</div>
			<div class="panel-body" style="height: 300px;">
				<div id="explain" style="width: 100%;height:100%; font-size: 20px;">					
				</div>
			</div>
		</div>
	</div>	


    <div>
    	<div class="col-sm-6">
    		<button id="translate" onclick="Get_translate();"  class="btn btn-success col-sm-4 btn-lg" type="button" style="font-size: 20px;">
    			翻译
    		</button>
    	</div>
    </div> 

</div>	


<script type="text/javascript">

$(document).ready(function () {
            $("body").bgStretcher({
                images: ['/Public/Home/images/1.jpg', '/Public/Home/images/2.jpg', '/Public/Home/images/3.jpg', '/Public/Home/images/4.jpg', '/Public/Home/images/5.jpg'],
                imageWidth: 1024,
                imageHeight: 768,
                slideDirection: 'N',
                slideShowSpeed: 3500,
                transitionEffect: 'fade',
                sequenceMode: 'normal',
                buttonPrev: '#prev',
                buttonNext: '#next',
                pagination: '#nav',
                anchoring: 'left center',
                anchoringImg: 'left center'
            });
        });

	function Get_translate(){
		var content = $("#content").text();
		console.log(content);
		$.ajax({
			type:'post',
			url: '<?php echo U("Home/Translate/translate");?>',
			data:{
				'content':content,
			},
			dataType:'json',
			success:function(data){
				$("#explain").html('');
				$("#explain").append("翻译：" + data.translation + "<br/>");
				if(data.basic['explains'] != null){
					$("#explain").append("释义：" + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
					for(var i = 0;i < data.basic['explains'].length;i++){
						$("#explain").append(data.basic['explains'][i] + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
					}
				}
			}
		});
	}
</script>
</body>
</html>