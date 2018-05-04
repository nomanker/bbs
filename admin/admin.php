<?php
require_once "../inc/admin_check_session.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,use-scalable=no">
	<title>管理员 - 简单小论坛</title>
	<link href="../images/favicon.ico" rel="shortcut icon" type="image/x-icon" media="screen">
	<link href="../css/admin.css" rel="stylesheet" type="text/css"/>
    <link href="../css/table.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="../js/jquery1.7.js" type="text/javascript"></script>
</head>
<body>
<div class="header clearfix">
	<div class="logo"><a href="#">LOGO</a></div>
	<div class="nav_btn" id="nav_btn">三</div>
	<div class="search"> 
		<input type="text" class="search_text" placeholder="搜帖、找人..." id="keywords" name="keywords">
    	<button type="submit" class="search_btn" id="submit" name="submit" ></button>
    </div>
	<ul class="nav clearfix" id="nav">
		<li><a href="./index.php">首    页</a></li>
		<li><a href="#">新闻资讯</a></li>
		<li><a href="#">建议箱</a></li>
	</ul>
	<div class="operation">
		<div class="login"><a href="./index.php">主    页</a></div>
		<div class="register"><a href="../logout.php">退    出</a></div>
	</div>
</div>
<div class="container clearfix">
	<div class="content content_admin">
		<div class="content_admin-nav">
			<ul class="public-nav">
				<li><a href="javascript:;" index="0" class="reveal_nav curr_nav">帖子管理</a></li>
				<li><a href="javascript:;" index="1" class="reveal_nav">用户管理</a></li>
				<li><a href="javascript:;" index="2" class="reveal_nav">会员管理</a></li>
				<li><a href="javascript:;" index="3" class="reveal_nav">问答管理</a></li>
                <li><a href="javascript:;" index="4" class="reveal_nav">我的帖子</a></li>
                <li><a href="javascript:;" index="5" class="reveal_nav">我提出的问题</a></li>
                <li><a href="javascript:;" index="6" class="reveal_nav">修改密码</a></li>
                <li><a href="javascript:;" index="7" class="reveal_nav">回收站</a></li>
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
                            <th width="200">用户名称</th>
                            <th width="200">ID</th>
                            <th width="200">操作</th>
                        </tr>
                        </thead>
                        <tbody id="common">
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
                            <th width="200">会员名称</th>
                            <th width="200">ID</th>
                            <th width="200">操作</th>
                        </tr>
                        </thead>
                        <tbody id="members">
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
                    <table class="table-style">
                        <thead>
                        <tr class="text-c">
                            <th width="100">楼主</th>
                            <th width="500">标题</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody id="my_post">
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
                            <th width="500">标题</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody id="my_ask">
                        <!-- 数据显示区 -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="reveal_div">
                <div class="management">
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
            <div class="reveal_div">
                <div class="management">
                    <h1>此功能暂未开启！！</h1>
                </div>
            </div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
$('#submit').on('click',function(){
    var keywords = $('#keywords').val().trim();
    if(!keywords) {
    	alert("请输入需搜索的内容");
    	return;
    } else{
    	alert("此功能暂未开通，敬请期待！");
    	return;
    }
});
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
                    window.location.href = "index.php";
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
            url:"../public/operate.php?act=get_post_list",
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
                url:"../public/operate.php?act=get_common_list",
                method:"get",
                datatype:"json",
                success:function(data){
                    var result = $.parseJSON(data);
                    if (result.code!=0){
                        alert(result.msg);
                        return;
                    }
                    var common_list = $("#common");
                    var commons = result.data;
                    for( var i = 0 , j = commons.length ; i < j ; i++) {
                        var common_dom = get_user_list(commons[i]);
                        common_list.append(common_dom);
                    }
                },
                error:function(data){
                    alert('获取用户列表失败！');
                }
            });
        $.ajax({
                url:"../public/operate.php?act=get_members_list",
                method:"get",
                datatype:"json",
                success:function(data){
                    var result = $.parseJSON(data);
                    if (result.code!=0){
                        alert(result.msg);
                        return;
                    }
                    var members_list = $("#members");
                    var members = result.data;
                    for( var i = 0 , j = members.length ; i < j ; i++) {
                        var members_dom = get_members_list(members[i]);
                        members_list.append(members_dom);
                    }
                },
                error:function(data){
                    alert('获取用户列表失败！');
                }
            });
        $.ajax({
                url:"../public/operate.php?act=get_ask_list",
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
                var post_list = $("#my_post");
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
                    var ask_list = $("#my_ask");
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
        //获取列表模块
        function get_user_list(data){
                    var row_obj = $('<tr class="text-c"></tr>');
                    var old_data = ["username","id"];
                    for(var j = 1;j <3;j++){
                        var col_td = $("<td></td>");
                        old_data[0] = data.username;
                        old_data[1] = data.id;
                        col_td.text(old_data[j-1]);
                        row_obj.append(col_td);
                    }
                    //操作按钮
                    var delButton = $('<a title="删除成员" href="javascript:;" class="ml-5" style="text-decoration:none">删除</a>');
                    delButton.attr("username",data['username']);
                    delButton.click(user_del);

                    var opt_td = $('<td></td>');
                    opt_td.append(delButton);
                    row_obj.append(opt_td);
                    //返回
                    return row_obj;
                }
        //获取会员列表模块
        function get_members_list(data){
                    var row_obj = $('<tr class="text-c"></tr>');
                    var old_data = ["username","id"];
                    for(var j = 1;j <3;j++){
                        var col_td = $("<td></td>");
                        old_data[0] = data.username;
                        old_data[1] = data.id;
                        col_td.text(old_data[j-1]);
                        row_obj.append(col_td);
                    }
                    //操作按钮
                    var delButton = $('<a title="删除成员" href="javascript:;" style="text-decoration:none;">删除&nbsp;</a>');
                    delButton.attr("username",data['username']);
                    delButton.click(user_del);

                    var downButton = $('<a title="降级为成员" href="javascript:;" style="text-decoration:none;">&nbsp;降级为成员</a>');
                    downButton.attr("username",data['username']);
                    downButton.click(members_del);

                    var opt_td = $('<td></td>');
                    opt_td.append(delButton);
                    opt_td.append(downButton);
                    row_obj.append(opt_td);
                    //返回
                    return row_obj;
                }
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
                    var delButton = $('<a title="删除" href="javascript:;" class="ml-5" style="text-decoration:none">删除</a>');
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
                    var delButton = $('<a title="删除" href="javascript:;" class="ml-5" style="text-decoration:none">删除</a>');
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
        //删除成员
        function user_del(username){
            var username = $(this).attr("username");
            var meButton = $(this);
            $.ajax({
                url:"../public/operate.php?act=remove",
                method:"post",
                data: {
                    username:username,
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
        //降级为成员
        function members_del(username){
            var username = $(this).attr("username");
            var meButton = $(this);
            $.ajax({
                url:"../public/operate.php?act=remove_members",
                method:"post",
                data: {
                    username:username,
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