<?php
require_once "../inc/members_check_session.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,use-scalable=no">
	<title>会员 - 简单小论坛</title>
	<link href="../public/images/favicon.ico" rel="shortcut icon" type="image/x-icon" media="screen">
	<link href="../public/css/admin.css" rel="stylesheet" type="text/css"/>
    <link href="../public/css/table.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="../public/js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="../public/js/jquery1.7.js" type="text/javascript"></script>
</head>
<body>
<div class="header clearfix">
	<div class="logo"><a href="/">LOGO</a></div>
	<div class="nav_btn" id="nav_btn">三</div>
	<div class="search"> 
		<input type="text" class="search_text" placeholder="搜帖、找人..." id="keywords" name="keywords">
    	<button type="submit" class="search_btn" id="submit" name="submit" ></button>
    </div>
	<ul class="nav clearfix" id="nav">
		<li><a href="./members.php">首    页</a></li>
		<li><a href="http://www.cnnic.net.cn/">新闻资讯</a></li>
		<li><a href="./advice.php">写建议</a></li>
        <li><a href="./members.php" class="phone">后   台</a></li>
        <li><a href="../logout.php" class="phone">退   出</a></li>
	</ul>
	<div class="operation">
		<div class="login"><a href="./members.php">主    页</a></div>
		<div class="register"><a href="../logout.php">退    出</a></div>
	</div>
</div>
<div class="container clearfix">
	<div class="content content_admin">
		<div class="content_admin-nav">
			<ul class="public-nav">
				<li><a href="javascript:;" index="0" class="reveal_nav curr_nav">我的帖子</a></li>
                <li><a href="javascript:;" index="1" class="reveal_nav">我提出的问题</a></li>
				<li><a href="javascript:;" index="2" class="reveal_nav">修改密码</a></li>
			</ul>
		</div>
		<div class="content_admin-show">
			<div class="reveal_div curr_div">
                <div class="management">
                    <table class="table-style">
                        <thead>
                        <tr class="text-c">
                            <th width="100">楼主</th>
                            <th width="500">标题</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody id="post">
                        <!-- 数据显示区 -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="reveal_div">
                <div class="management">
                    <table class="table-style">
                        <thead>
                        <tr class="text-c">
                            <th width="100">楼主</th>
                            <th width="500">问题</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody id="ask">
                        <!-- 数据显示区 -->
                        </tbody>
                    </table>
                </div>
            </div>
			<div class="reveal_div">
                <div class="management">
                    <div class="alter">
                        <input type="text" name="password" id="password" placeholder="请输入旧密码">
                        <input name="newpassword" id="newpassword" type="password" placeholder="请输入新密码">
                        <input name="pwd"      id="pwd"      type="password" placeholder="请再次输入新密码">
                        <input type="submit" name="submit" id="push" value="确定">
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../public/js/index.js"></script>
<script type="text/javascript">
$('#push').on('click',function(){
            var password = $("#password").val().trim();
            var newpassword = $("#newpassword").val().trim();
            var pwd = $("#pwd").val().trim();
            if (!password || !newpassword) {
                alert("请输入旧密码和新密码!");
                return;
            } else if (!pwd) {
                alert("请再次输入密码!");
                return;
            } else if (newpassword != pwd) {
                alert("两次密码不同，请重新输入!");
                return;
            } 
            $.ajax({
                url:"../public/operate.php?act=alter",
                type: "POST",
                dataType: "json",
                data: {
                    "newpassword": newpassword,
                    "password": password,
                },
                success: function(data) {
                    if(data.msg!=''){
                        alert(data.msg);
                    }
                    window.location.href = "members.php";
                },
                error: function(data) {
                    alert("修改失败！！！");
                }
            });
        });
</script>
<script>
    function getClass(className) { //className指class值
        var tagname = document.getElementsByTagName("*");  //获取指定元素
        var tagnameAll = [];     //数组用于存储所符合条件元素
            for (var i = 0; i < tagname.length; i++) {     //遍历获元素
                if (tagname[i].className.indexOf(className)>=0){     //获元素class值等于指定类名赋值给tagnameAll
                    tagnameAll[tagnameAll.length] = tagname[i];
                }
            }
            return tagnameAll;           
        }
    window.onload=function(){//载入事件
        var btn=getClass("reveal_nav");//获取按钮数组
        var div=getClass("reveal_div");//获取div数组
            for(i=0;i<btn.length;i++){
                btn[i].onclick=function(){//按钮点击事件
                    var index=(this.getAttribute("index")-0);//获取第几按钮按
                    if(btn[index].className.indexOf("curr_nav")>=0) return;//按按钮前选按钮则反应
                    for(i=0;i<btn.length;i++){
                        if(index==i){
                            btn[i].className="reveal_nav curr_nav";
                            div[i].className="reveal_div curr_div";
                        }else{
                            btn[i].className="reveal_nav";
                            div[i].className="reveal_div";
                        }
                    }
                }
            }
    }
</script>
<script type="text/javascript">
$(function (){
         $.ajax({
            url:"../public/operate.php?act=get_my_post",
            method:"get",
            datatype:"json",
            success:function(data){
                var result = $.parseJSON(data);
                if (result.code!=0){
                    alert(result.msg);
                    return;
                }
                var post_list = $("#post");
                var posts = result.data;
                for( var i = 0 , j = posts.length ; i < j ; i++) {
                    var post_dom = get_post(posts[i]);
                    post_list.append(post_dom);
                }
            },
            error:function(data){
                alert('获取帖子列表失败！');
            }
        });
        $.ajax({
                url:"../public/operate.php?act=get_my_ask",
                method:"get",
                datatype:"json",
                success:function(data){
                    var result = $.parseJSON(data);
                    if (result.code!=0){
                        alert(result.msg);
                        return;
                    }
                    var ask_list = $("#ask");
                    var asks = result.data;
                    for( var i = 0 , j = asks.length ; i < j ; i++) {
                        var ask_dom = get_ask(asks[i]);
                        ask_list.append(ask_dom);
                    }
                },
                error:function(data){
                    alert('获取问题列表失败！');
                }
            });
        $('#submit').on('click',function(){
            var keywords = $('#keywords').val().trim();
            if(!keywords) {
                alert("请输入需搜索的内容");
                return;
            } else{
                $.ajax({
                        url:"../public/operate.php?act=search",
                        method:"POST",
                        datatype:"json",
                        data:{
                            keywords:keywords
                        },
                        success:function(data){
                            $("#keywords").val('');
                            var result = $.parseJSON(data);
                            if (result.code!=0){
                                alert(result.msg);
                                return;
                            }
                            $("#post").children("tr").remove();
                            $("#ask").children("tr").remove();
                            var post_list = $("#post");
                            var ask_list = $("#ask");
                            var posts = result.data;
                            var a=0;
                            var b=0;
                            for( var i = 0 , j = posts.length ; i < j ; i++) {
                                if (posts[i].category==1) {
                                    ++a;
                                    var post_dom = get_post(posts[i]);
                                    post_list.append(post_dom);
                                }
                                if (posts[i].category==0) {
                                    ++b;
                                    var ask_dom = get_ask(posts[i]);
                                    ask_list.append(ask_dom);
                                }
                            }
                            if (a==0&&b==0) {
                                        alert('未找到相关帖子和问题，请重新输入关键词！');
                                    }else if (b!=0&&a!=0) {
                                        alert('内容如下！');
                                    } else {

                                    if (b==0){
                                                alert('未找到相关问题!');
                                            } 
                                    if (a==0){
                                                alert('未找到相关帖子!');
                                            } 
                                    if (b!=0){
                                                alert('相关问题内容如下！');
                                            } 
                                    if (a!=0){
                                                alert('相关帖子内容如下！');
                                            }
                                }
                        },
                        error:function(data){
                            alert('搜索的内容失败!!!');
                        }
                    });
            }
        });
        //获取问题模块
        function get_ask(data){
                    var row_obj = $('<tr class="text-c"></tr>');
                    var old_data = ["username","title"];
                    for(var j = 1;j <3;j++){
                        var col_td = $("<td></td>");
                        old_data[0] = data.username;
                        old_data[1] = data.title;
                        col_td.text(old_data[j-1]);
                        row_obj.append(col_td);
                    }
                    //操作按钮
                    var delButton = $('<a title="删除成员" href="javascript:;" class="ml-5" style="text-decoration:none">删除</a></td>');
                    delButton.attr("title",data['title']);
                    delButton.click(ask_del);

                    var opt_td = $('<td></td>');
                    opt_td.append(delButton);
                    row_obj.append(opt_td);
                    //返回
                    return row_obj;
                }
                //获取问题模块
        function get_post(data){
                    var row_obj = $('<tr class="text-c"></tr>');
                    var old_data = ["username","title"];
                    for(var j = 1;j <3;j++){
                        var col_td = $("<td></td>");
                        old_data[0] = data.username;
                        old_data[1] = data.title;
                        col_td.text(old_data[j-1]);
                        row_obj.append(col_td);
                    }
                    //操作按钮
                    var delButton = $('<a title="删除成员" href="javascript:;" class="ml-5" style="text-decoration:none">删除</a></td>');
                    delButton.attr("title",data['title']);
                    delButton.click(post_del);

                    var opt_td = $('<td></td>');
                    opt_td.append(delButton);
                    row_obj.append(opt_td);
                    //返回
                    return row_obj;
                }
        //删除问题
        function ask_del(title){
            var title = $(this).attr("title");
            var meButton = $(this);
            $.ajax({
                url:"../public/operate.php?act=remove_ask",
                method:"post",
                data: {
                    title:title,
                },
                datatype:"json",
                success:function(data){
                    var result = $.parseJSON(data);
                    alert(result.msg);
                    $(meButton).parent().parent().remove();
                },
                error:function(data){
                    alert('删除失败！');
                }
            });
        }
        //删除帖子
        function post_del(title){
            var title = $(this).attr("title");
            var meButton = $(this);
            $.ajax({
                url:"../public/operate.php?act=remove_post",
                method:"post",
                data: {
                    title:title,
                },
                datatype:"json",
                success:function(data){
                    var result = $.parseJSON(data);
                    alert(result.msg);
                    $(meButton).parent().parent().remove();
                },
                error:function(data){
                    alert('删除失败！');
                }
            });
        }
    });
</script>
</body>
</html>