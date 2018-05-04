<?php
require_once "../configure/config.php";

if (!isset($_POST["upgrade"]) || !isset($_POST["vcode"])) {
    exit();
}
session_start();
$upgrade = $_POST["upgrade"];
$username = $_SESSION["username"];
$a = '1';
if($_POST["vcode"] != $_SESSION["vcode"]) {
	$data = [
	    "code" => -1,
	    "msg" => "验证码输入错误！"
	];
} else if($upgrade != '2'){
	$data = [
	    "code" => -1,
	    "msg" => "答案错误！"
	];
}else {
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
        if ($result['permissions']==1) {
        	if($result["password"]){
			        $result["password"] = "";
			    }
            $data["code"] = -1;
            $data["msg"] = "你已经是会员！";
            $data['data'] = $result;
		} else {
			$sql = "UPDATE member SET permissions='{$a}' WHERE username='{$username}'";
            $query = $conn->query($sql);
            if($query) {
            	$sql = "SELECT * FROM member WHERE username='{$username}'";
		        $query = $conn->query($sql);
		        $result = mysqli_fetch_assoc($query);
		        if($result["password"]){
			        $result["password"] = "";
			    }
            	$data["code"] = 0;
            	$data["msg"] = "升级会员成功！";
            	$data['data'] = $result;
            } else {
            	$data["code"] = -1;
            	$data["msg"] = "升级会员失败！";
            }
        }
    }
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
