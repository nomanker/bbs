<?php
require_once "../public/functions.php";
require_once "../configure/config.php";

session_start();
if (!isset($_SESSION["username"]) || ($_SESSION["permissions"])!=2) {
    header("Location: ../login.html");
    exit();
}