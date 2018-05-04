<?php
require_once "public/functions.php";
require_once "configure/config.php";

if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    exit();
}
session_start();
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
        if (!$result) {
            $data["code"] = -1;
            $data["msg"] = "用户不存在，请注册！";
		} else {
			if ($password != $result["password"]) {
				$data["code"] = -1;
                $data["msg"] = "密码错误！";
			} else {
				//登录成功
				$_SESSION["id"] = $result["id"];//用户id
                $_SESSION["username"] = $result["username"];//用户名
                $_SESSION["permissions"] = $result["permissions"];//权限级别.0-管理员，1-会员，2-用户，浏览者无
				$data["data"] = $_SESSION;
                foreach ($_SESSION as $k => $v) {
                    setcookie($k, $v);
                }
			}
		}
		$conn->close();
	} else {
        $data["code"] = -1;
        $data["msg"] = "连接数据库失败！";
    }
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>