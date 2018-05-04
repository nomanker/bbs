<?php 
session_start();
include_once 'inc/vcode.php';
$_SESSION['vcode'] = vcode(120,50,30,5,2000,20);
?>