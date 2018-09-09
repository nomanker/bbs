<?php
require_once "../inc/common_check_session.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width,initial-scale=1,use-scalable=no">
	<title>升级会员界面</title>
	<link href="../public/css/admin.css" rel="stylesheet" type="text/css"/>
	<link href="../public/images/favicon.ico" rel="shortcut icon" type="image/x-icon" media="screen">
	<script src="../public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="../public/js/jquery1.7.js" type="text/javascript"></script>
</head>
<body>
<div class="upgrade">
	<div style="position: relative;left: 240px;"><a href="javascript:window.history.back()">返回</a></div>
	<h1>1+1=?</h1>
	<input type="text" name="upgrade" id="upgrade" placeholder="请输入会员升级码...">
	<input name="vcode"    id="vcode"    type="text" placeholder="请输入下方验证码..." style="width: 60%;" />
	<img class="vcode" src="../show_code.php"/>
	<input value="提交" style="width:100%;font-size: 16px;" type="submit" id="submit">
</div>
<script type="text/javascript">
$('#submit').on('click',function upgrade(){
	        	var upgrade = $("#upgrade").val().trim();
	        	var	vcode = $("#vcode").val().trim();
				if (!upgrade || !vcode) {
					alert("请输入答案和验证码!");
	                return;
	            } 
	            $.ajax({
	                url: "_upgrade.php",
	                type: "POST",
	                dataType: "json",
	                data: {
	                    "upgrade": upgrade,
	                    "vcode":vcode
	                },
	                success: function (data) {
	                	$("#upgrade").val('');
	        			$("#vcode").val('');
	                    if(data.msg!=''){
	                    	alert(data.msg);
	                    }
	                    if (data.code !== 0) {
	                        return;
	                    }
	                    if(data.data.permissions == 1) {
	                    	window.location.href = "../login.html";
	                    }
	                },
	                error: function (data) {
	                	$("#upgrade").val('');
						$("#vcode").val('');
	                    alert("升级失败！");
	                }
	            });
	          });  
	    </script>        	
</body>
</html>