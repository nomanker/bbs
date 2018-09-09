<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,use-scalable=no">
    <title>写建议 - 简单小论坛</title>
    <link href="../public/images/favicon.ico" rel="shortcut icon" type="image/x-icon" media="screen">
    <script src="../public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="../public/js/jquery1.7.js" type="text/javascript"></script>
</head>
<body>
    <style type="text/css">
        body {
            background-image: url('../public/images/bg.png');
            font-size: 24px;
            font-family: 'MicroSoft YaHei';
        }
        div{
            width:100%;
        }
    </style>
</head>
<body style="position: relative;width:100%">
<div>
    <h3 style="position: relative;left:100px;color:#fff;">写建议给我们(200字以内)</h3><a href="javascript:window.history.back()" style="position: relative;top:0px;left: 100px;text-decoration: none;font-size: 20px;background-color: #FFF371;">返回</a>
    <div style="position: relative;top:0px;left: 150px;"><input type="text" id="title" name="title" placeholder="标题..." style="padding-left: 8px;"></div>
    <div style="position: relative;top:20px;left: 150px;"><textarea style="width:60%;height:150px;" id="main" placeholder="内容...(100字以内)"></textarea></div>
</div>
<div style="width:80%;margin: 30px 0 0 150px;height:20px;">
    <input type="submit" name="submit" id="submit" value="发送" style="height:20px;height:40px;color:#000;background: #ccc;">
</div>
<script type="text/javascript">
$('#submit').on('click',function(){
            var title = $("#title").val().trim();
            var main = $("#main").val().trim();
            if (!title || !main) {
                alert("请输入标题和内容!");
                return;
            } 
            $.ajax({
                url:"../public/operate.php?act=send_advice",
                method:"post",
                datatype:"json",
                data:{
                    title:title,
                    main:main
                },
                success:function(data){
                    $("#title").val('');
                    $("#main").val('');
                    var result = $.parseJSON(data);
                    alert(result.msg);
                },
                error:function(data){
                    alert('发建议失败！');
                }
            });
    }); 
</script>
</body>
</html>