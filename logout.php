<?php

session_start();
if (isset($_SESSION)) {
    unset($_SESSION);
    session_destroy();//清空session
    if (isset($_COOKIE)) {
        foreach ($_COOKIE as $k => $v) {//清空cookie
            setcookie($k, null, -1);
        }
        unset($_COOKIE);
    }
}
//TODO 其他注销操作
header("Location: index.html");
?>