<?php
require_once "public/functions.php";
require_once "configure/config.php";
if(!empty($_GET)) {
    exit();
}
if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    exit();
}
session_start();
$_GET = _addslashes($_GET);
$_POST = _addslashes($_POST);
$_SESSION = _addslashes($_SESSION);
$username = $_POST["username"];
$password = encrypt($_POST["password"]);
if($_POST["vcode"] != $_SESSION["vcode"]) {
	$data = [
	    "code" => -1,
	    "msg" => "验证码输入错误！"
	];
} else {
	$data = [
	    "code" => 0,
	    "msg" => ""
	];
	//链接数据库
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE,DB_PORT);
mysqli_query($conn,'set names utf8');
    if ($conn) {
        $conn->query("set names utf8");
        $sql = "SELECT * FROM member WHERE username='{$username}'";
        $query = $conn->query($sql);
        $result = $query ? mysqli_fetch_assoc($query) : $query;
        if($result){
            $data["code"] = -1;
            $data["msg"] = "用户名已存在，请重新输入！";
        } else {
            $sql = "INSERT INTO member(`username`,`password`) VALUES('{$username}','{$password}')";
            $query = $conn->query($sql);
            if(!$query) {
                $data["code"] = -1;
                $data["msg"] = "注册失败！";
            } else {
                $sql = "SELECT * FROM member WHERE username='{$username}'";
                $query = $conn->query($sql);
                $result = $query ? mysqli_fetch_assoc($query) : $query;
                if($result){
                	if($result["password"]){
			                $result["password"] = "";
			        }
                    $data["code"] = 0;
                    $data["msg"] = "注册成功！";
                    $data["data"] = $result;
                }
                
            }
        
        }
    }
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>