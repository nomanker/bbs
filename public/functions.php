<?php
//密码加密函数
function encrypt($pwd){
    return md5($pwd . SALT);
}

?>