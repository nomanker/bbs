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
        <li><a href="./admin.php" class="phone">后    台</a></li>
        <li><a href="../logout.php" class="phone">退   出</a></li>
	</ul>
	<div class="operation">
		<div class="login"><a href="./admin.php">后    台</a></div>
		<div class="register"><a href="../logout.php">退    出</a></div>
	</div>
</div>
<div class="container clearfix" id="container">
	<div class="content_top content-top public-nav">
		<div class="posts content-right_btn"><a href="javascript:;" index="0" class="reveal_nav curr_nav">最新帖</a></div>
		<div class="posting content-right_btn"><a href="javascript:;" index="1" class="reveal_nav">发    帖</a></div>
		<div class="quiz content-right_btn"><a href="javascript:;" index="2" class="reveal_nav">提    问</a></div>
	</div>
	<div class="content content-left">
		<div class="reveal_div curr_div">
			<div class="question_answer">
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
			<div class="latest_posts">
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
			<div class="form">
				<input type="text" name="posting_title" id="posting_title" class="title" placeholder="标题(20字以内)" maxlength="20">
				<textarea name="posting_main" id="posting_main" class="main" placeholder="内容....(90字以内)" maxlength="90" clos="10" rows="5" warp="virtual"></textarea>
				<input type="submit" name="submit" value="提交" class="posting_btn" id="posting">
			</div>
		</div>
		<div class="reveal_div">
			<div class="form">
				<input type="text" name="quiz_title" id="quiz_title" class="title" placeholder="概括问题(20字以内)" maxlength="20">
				<textarea name="quiz_main" id="quiz_main" class="main" placeholder="描述问题....(90字以内)" maxlength="90" clos="10" rows="5" warp="virtual"></textarea>
				<input type="submit" name="submit" value="提交" class="posting_btn" id="quiz">
			</div>
		</div>
	</div>
	<div class="content content-right public-nav">
		<div class="posts content-right_btn"><a href="javascript:;" index="0" class="reveal_nav curr_nav">最新帖</a></div>
		<div class="posting content-right_btn"><a href="javascript:;" index="1" class="reveal_nav">发    帖</a></div>
		<div class="quiz content-right_btn"><a href="javascript:;" index="2" class="reveal_nav">提    问</a></div>
	</div>
</div>
<div class="container-in clearfix hid" id="container_in">
    <div class="content-in">
        <div class="back" id="back" style="float: right; margin: 10px 8px -10px 0;"><a href="javascript:;">返回</a></div>
        <div class="topic" id="topic">
            <div class="title"></div>
            <div class="host">楼主：<span></span></div>
            <div class="main"><p style="text-indent:2em;"></p></div>
            <div class="write">
                <textarea name="write" class="write_main" id="write" placeholder="说点什么....(90字以内)" maxlength="90" clos="10" rows="5" warp="virtual"></textarea>
                <input type="submit" name="go" id="gom" style="font-size: 16px;" value="发表">
            </div>
            <div class="answer">
                <table class="table-style">
                    <thead>
                        <tr class="text-c">
                            <th width="200">用户</th>
                            <th width="800">回答</th>
                        </tr>
                    </thead>
                    <tbody id="answer">
                    <!-- 数据显示区 -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-in clearfix hid" id="container_in2">
    <div class="content-in">
        <div class="back" id="back2" style="float: right; margin: 10px 8px -10px 0;"><a href="javascript:;">返回</a></div>
        <div class="topic" id="topic2">
            <div class="title"></div>
            <div class="host">楼主：<span></span></div>
            <div class="main"><p style="text-indent:2em;"></p></div>
            <div class="write">
                <textarea name="write" class="write_main" id="write2" placeholder="说点什么....(50字以内)" maxlength="50" clos="10" rows="5" warp="virtual"></textarea>
                <input type="submit" name="go" id="go2" style="font-size: 16px;" value="发表">
            </div>
            <div class="answer">
                <table class="table-style">
                    <thead>
                        <tr class="text-c">
                            <th width="200">用户</th>
                            <th width="800">回答</th>
                        </tr>
                    </thead>
                    <tbody id="answer2">
                    <!-- 数据显示区 -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../public/js/index.js"></script>
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
	$('#posting').on('click',function(){
            var posting_title = $("#posting_title").val().trim();
        	var	posting_main = $("#posting_main").val().trim();
			if (!posting_main || !posting_title) {
				alert("请输入标题和内容!");
                return;
            } 
            $.ajax({
	            url:"../public/operate.php?act=add_post",
	            method:"post",
	            datatype:"json",
	            data:{
	            	posting_main:posting_main,
	            	posting_title:posting_title
	            },
	            success:function(data){
                    $("#posting_title").val('');
                    $("#posting_main").val('');
	                var result = $.parseJSON(data);
	                alert(result.msg);
	                var post_list = $("#post");
                    var posts = result.data;
                    var post_dom = get_post(posts);
                    post_list.append(post_dom);
	            },
	            error:function(data){
	                alert('发帖失败！');
	            }
	        });
        });
	$('#quiz').on('click',function(){
            var quiz_title = $("#quiz_title").val().trim();
        	var	quiz_main = $("#quiz_main").val().trim();
			if (!quiz_main || !quiz_title) {
				alert("请输入标题和内容!");
                return;
            } 
            $.ajax({
	            url:"../public/operate.php?act=add_ask",
	            method:"post",
	            datatype:"json",
	            data:{
	            	quiz_main:quiz_main,
	            	quiz_title:quiz_title
	            },
	            success:function(data){
                    $("#quiz_title").val('');
                    $("#quiz_main").val('');
	                var result = $.parseJSON(data);
	                alert(result.msg);
	                get_ask(result.data);
                    var ask_list = $("#ask");
                    var asks = result.data;
                    var ask_dom = get_ask(asks);
                    ask_list.append(ask_dom);
	            },
	            error:function(data){
	                alert('发帖失败！!!!');
	            }
	        });
        });
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
                                var back = $("#container_in2");
                                back.addClass('hid');
                                back.removeClass('show');
                                var come = $("#container");
                                come.removeClass('hid');
                                come.addClass('show');
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
                    var Button = $('<a title="进入话题" href="javascript:;" style="text-decoration:none">进入话题</a>');
                    Button.attr("title",data['title']);
                    Button.click(ask_in);

                    var opt_td = $('<td></td>');
                    opt_td.append(Button);
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
                    var Button = $('<a title="进入话题" href="javascript:;" style="text-decoration:none">进入话题</a>');
                    Button.attr("title",data['title']);
                    Button.click(post_in);

                    var opt_td = $('<td></td>');
                    opt_td.append(Button);
                    row_obj.append(opt_td);
                    //返回
                    return row_obj;
                }
        //进入问题
        function ask_in(title){
            var title = $(this).attr("title");
            var back = $("#container_in");
            back.removeClass('hid');
            back.addClass('show');
            var come = $("#container");
            come.addClass('hid');
            come.removeClass('show');
            $.ajax({
                url:"../public/operate.php?act=ask_in",
                method:"post",
                data: {
                    title:title,
                },
                datatype:"json",
                success:function(data){
                    var meButton = $('#answer').children().remove();
                    var result = $.parseJSON(data);
                    if (result.code!=0){
                        alert(result.msg);
                        return;
                    }
                    if (result.msg!=''){
                        alert(result.msg);
                    }
                    var answer_list = $("#answer");
                    var data = result.data;
                    if(data.length==1) {
                        alert("暂时没有人回答，快来回答吧！");
                    }
                    var father = data[0];
                    var topic_title = $("#topic .title");
                    var topic_host = $("#topic .host span");
                    var topic_main = $("#topic .main p");
                    topic_title.text(father.title);
                    topic_host.text(father.username);
                    topic_main.text(father.main);
                    for( var i = 1 , j = data.length ; i < j ; i++) {
                        var data_dom = answer(data[i]);
                        answer_list.append(data_dom);
                    }
                    $('#gom').on('click',function(){
                        var write = $("#write").val().trim();
                        var title = father.title;
                        if (!write) {
                            alert("请输入评论内容!");
                            return;
                        }
                            $.ajax({
                                url: "../public/operate.php?act=go_ask",
                                type: "post",
                                dataType: "json",
                                data: {
                                    "write": write,
                                    "title":title
                                },
                                success: function (datai) {
                                    $("#write").val('');
                                    if (datai.msg!=''){
                                        alert(datai.msg);
                                    }
                                    var meButton = $('#answer').children().remove();
                                    var data = datai.data;
                                    for( var i = 0 , j = data.length ; i < j ; i++) {
                                        var data_dom = answer(data[i]);
                                        answer_list.append(data_dom);
                                    }
                                },
                                error: function (data) {
                                    alert("发表失败！");
                                }
                            });
                      });
                },
                error:function(data){
                    alert('进入话题讨论失败！');
                }
            });
        }
        function answer(data){
            var row_obj = $('<tr class="text-c"></tr>');
                    var old_data = ["username","answer"];
                    for(var j = 0;j <2;j++){
                        var col_td = $("<td></td>");
                        old_data[0] = data.username;
                        old_data[1] = data.answer;
                        col_td.text(old_data[j]);
                        row_obj.append(col_td);
                    }
                    return row_obj;
        }
        //进入帖子
        function post_in(title){
            var title = $(this).attr("title");
            var back = $("#container_in2");
            back.removeClass('hid');
            back.addClass('show');
            var come = $("#container");
            come.addClass('hid');
            come.removeClass('show');
            $.ajax({
                url:"../public/operate.php?act=post_in",
                method:"post",
                data: {
                    title:title,
                },
                datatype:"json",
                success:function(data){
                    var meButton = $('#answer2').children().remove();
                    var result = $.parseJSON(data);
                    if (result.code!=0){
                        alert(result.msg);
                        return;
                    }
                    if (result.msg!=''){
                        alert(result.msg);
                    }
                    var answer_list = $("#answer2");
                    var data = result.data;
                    if(data.length==1) {
                        alert("暂时没有人评论，快来评论吧！");
                    }
                    var father = data[0];
                    var topic_title = $("#topic2 .title");
                    var topic_host = $("#topic2 .host span");
                    var topic_main = $("#topic2 .main p");
                    topic_title.text(father.title);
                    topic_host.text(father.username);
                    topic_main.text(father.main);
                    for( var i = 1 , j = data.length ; i < j ; i++) {
                        var data_dom = answer(data[i]);
                        answer_list.append(data_dom);
                    }
                    $('#go2').on('click',function(){
                        var write = $("#write2").val().trim();
                        var title = father.title;
                        if (!write) {
                            alert("请输入评论内容!");
                            return;
                        }
                            $.ajax({
                                url: "../public/operate.php?act=go_post",
                                type: "post",
                                dataType: "json",
                                data: {
                                    "write": write,
                                    "title":title
                                },
                                success: function (datai) {
                                    $("#write2").val('');
                                    if (datai.msg!=''){
                                        alert(datai.msg);
                                    }
                                    var meButton = $('#answer2').children().remove();
                                    var data = datai.data;
                                    for( var i = 0 , j = data.length ; i < j ; i++) {
                                        var data_dom = answer(data[i]);
                                        answer_list.append(data_dom);
                                    }
                                },
                                error: function (data) {
                                    alert("发表失败！");
                                }
                            });
                      });
                },
                error:function(data){
                    alert('进入话题讨论失败！');
                }
            });
        }
        $('#back').on('click',function(){
            var back = $("#container_in");
            back.addClass('hid');
            back.removeClass('show');
            var come = $("#container");
            come.removeClass('hid');
            come.addClass('show');
        });
         $('#back2').on('click',function(){
            var back = $("#container_in2");
            back.addClass('hid');
            back.removeClass('show');
            var come = $("#container");
            come.removeClass('hid');
            come.addClass('show');
        });
    });
</script>			
</body>
</html>