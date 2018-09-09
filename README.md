# bbs
个人学习 - 简单论坛小系统 
 
1.登录后可通过session(后端)或cookie(前端与后端)取得的信息  

    $_SESSION["id"];//用户id  
    $_SESSION["username"];//用户名  
    $_SESSION["permissions"];//权限级别.0-管理员，1-会员，2-用户  

2.pubilc目录为公用目录，存放静态资源文件、公共函数(functions.php)、数据库(*.sql)等  

3.configure目录放置配置文件config.php

4.数据库bbs.sql直接导入(数据库名bbs)。   
    
   已有5个测试账号  
   
    一号 - 管理员  
    二号 - 会员  
    三号 - 会员
    四号 - 普通用户
    五号 - 普通用户 
      
    密码均为：2018


2018-02-26（完成）