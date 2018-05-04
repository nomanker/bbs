<?php
require_once "functions.php";
require_once "../configure/config.php";
require_once "../inc/mysql.php";
session_start();

//函数

/**
 * 提问
 * @return array|null
 */
function add_ask($title,$main,$username)
{
    global $conn;
    $sql = "SELECT * FROM ask_father WHERE title='{$title}'";
    $query = $conn->query($sql);
	$result = $query ? mysqli_fetch_assoc($query) : $query;
	if($result) {
		return true;
	} else {
		$sql = "INSERT INTO ask_father(`username`,`title`,`main`) VALUES('{$username}','{$title}','{$main}')";
	    $query = $conn->query($sql);
	    if(!$query) {
	    	return false;
	    } else {
	    	$sql = "SELECT * FROM ask_father WHERE title='{$title}'";
		    $query = $conn->query($sql);
		    $result = $query ? mysqli_fetch_assoc($query) : $query;
		    if (!$result) {
		        return null;
		    } else {
		    	return $result;
		    }
	    }
	}
}

/**
 * 发帖
 * @return array|null
 */
function add_post($title,$main,$username)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE title='{$title}'";
    $query = $conn->query($sql);
	$result = $query ? mysqli_fetch_assoc($query) : $query;
	if($result) {
		return true;
	} else {
		$sql = "INSERT INTO post_father(`username`,`title`,`main`) VALUES('{$username}','{$title}','{$main}')";
	    $query = $conn->query($sql);
	    if(!$query) {
	    	return false;
	    } else {
	    	$sql = "SELECT * FROM post_father WHERE title='{$title}'";
		    $query = $conn->query($sql);
		    $result = $query ? mysqli_fetch_assoc($query) : $query;
		    if (!$result) {
		        return null;
		    } else {
		    	return $result;
		    }
	    }
	}
}

/**
 * 获取所有帖子列表
 * @return array|null
 */
function get_post_list()
{
    global $conn;
    $sql = "SELECT * FROM post_father";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            $data[] = $result;
        }
        return $data;
    }
}

/**
 * 获取我的帖子列表
 * @return array|null
 */
function get_my_post($username)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE username='{$username}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            $data[] = $result;
        }
        return $data;
    }
}

/**
 * 获取我的问题列表
 * @return array|null
 */
function get_my_ask($username)
{
    global $conn;
    $sql = "SELECT * FROM ask_father WHERE username='{$username}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            $data[] = $result;
        }
        return $data;
    }
}

/**
 * 获取所有问题列表
 * @return array|null
 */
function get_ask_list()
{
    global $conn;
    $sql = "SELECT * FROM ask_father";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            $data[] = $result;
        }
        return $data;
    }
}

/**
 * 删除成员
 * @param $username
 * @return array|null
 */
function remove($username)
{
    global $conn;
    $sql = "SELECT * FROM member WHERE username='{$username}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
    	$sql = "DELETE FROM member WHERE username='{$username}'";
    	$query = $conn->query($sql);
    	$sql = "SELECT * FROM member WHERE username='{$username}'";
    	$query = $conn->query($sql);
    	$result = $query ? mysqli_fetch_assoc($query) : $query;
    	if($result){
    		return false;
    	} else {
        	return true;
    	}
    }
}

/**
 * 降级为成员
 * @param $username
 * @return array|null
 */
function remove_members($username)
{   $a= '2';
    global $conn;
    $sql = "SELECT * FROM member WHERE username='{$username}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "UPDATE member SET permissions='{$a}' WHERE username='{$username}'";
        $query = $conn->query($sql);
        if(!$query){
            return false;
        } else {
            return true;
        }
    }
}

/**
 * 修改密码
 * @param $username,$password,$newpassword
 * @return array|null
 */
function alter($username,$password,$newpassword)
{
    global $conn;
    $sql = "SELECT * FROM member WHERE username='{$username}'";
    $query = $conn->query($sql);
    $result = $query ? mysqli_fetch_assoc($query) : $query;
    if ($password == $result['password']) {
        $sql = "UPDATE member SET password='{$newpassword}' WHERE username='{$username}'";
        $query = $conn->query($sql);
        if(!$query){
            return false;
        } else {
            return true;
        } 
    } else {
        return null;  
    }
}

/**
 * 删除问题
 * @param $title
 * @return array|null
 */
function remove_ask($title)
{
    global $conn;
    $sql = "SELECT * FROM ask_father WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
    	$sql = "DELETE FROM ask_father WHERE title='{$title}'";
    	$query = $conn->query($sql);
        $sqli = "DELETE FROM ask_son WHERE title='{$title}'";
        $queryi = $conn->query($sqli);
    	$sql = "SELECT * FROM ask_father WHERE title='{$title}'";
    	$query = $conn->query($sql);
    	$result = $query ? mysqli_fetch_assoc($query) : $query;
    	if($result){
    		return false;
    	} else {
        	return true;
    	}
    }
}

/**
 * 删除帖子
 * @param $title
 * @return array|null
 */
function remove_post($title)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
    	$sql = "DELETE FROM post_father WHERE title='{$title}'";
        $sqli = "DELETE FROM post_son WHERE title='{$title}'";
    	$query = $conn->query($sql);
        $queryi = $conn->query($sqli);
    	$sql = "SELECT * FROM post_father WHERE title='{$title}'";
    	$query = $conn->query($sql);
    	$result = $query ? mysqli_fetch_assoc($query) : $query;
    	if($result){
    		return false;
    	} else {
        	return true;
    	}
    }
}

/**
 * 进入问题
 * @param $title
 * @return array|null
 */
function ask_in($title)
{
    global $conn;
    $sql = "SELECT * FROM ask_father WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        $sqli = "SELECT * FROM ask_son WHERE title='{$title}'";
        $queryi = $conn->query($sqli);
        while( $resulti = mysqli_fetch_assoc($queryi)){
            $data[]=$resulti;
        }
        return $data;
    }
}

/**
 * 进入问题
 * @param $title
 * @return array|null
 */
function advice_in($title)
{
    global $conn;
    $sql = "SELECT * FROM advice WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
}

/**
 * 进入帖子
 * @param $title
 * @return array|null
 */
function post_in($title)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        $sqli = "SELECT * FROM post_son WHERE title='{$title}'";
        $queryi = $conn->query($sqli);
        while($resulti = mysqli_fetch_assoc($queryi)){
            $data[]=$resulti;
        }
        return $data;
        
    }
}

/**
 * 回答问题
 * @param $write,$title,$username
 * @return array|null
 */
function go_ask($write,$title,$username)
{
    global $conn;
    $sql = "SELECT * FROM ask_son WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "INSERT INTO ask_son(`username`,`title`,`answer`) VALUES('{$username}','{$title}','{$write}')";
        $query = $conn->query($sql);
        if(!$query) {
            return false;
        } else {
            $sql = "SELECT * FROM ask_son WHERE title='{$title}'";
            $query = $conn->query($sql);
            while( $result = mysqli_fetch_assoc($query)){
                $data[]=$result;
            }
            return $data;
        }
    }
}

/**
 * 回复帖子
 * @param $write,$title,$username
 * @return array|null
 */
function go_post($write,$title,$username)
{
    global $conn;
    $sql = "SELECT * FROM post_son WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "INSERT INTO post_son(`username`,`title`,`answer`) VALUES('{$username}','{$title}','{$write}')";
        $query = $conn->query($sql);
        if(!$query) {
            return false;
        } else {
            $sql = "SELECT * FROM post_son WHERE title='{$title}'";
            $query = $conn->query($sql);
            while( $result = mysqli_fetch_assoc($query)){
                $data[]=$result;
            }
            return $data;
        }
    }
}

/**
 * 获取所有会员列表
 * @return array|null
 */
function get_members_list()
{
    global $conn;
    $sql = "SELECT * FROM member WHERE permissions='1'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            if($result["password"])
            {
                $result["password"] = "";

            }
            $data[] = $result;
        }
        return $data;
    }
}

/**
 * 获取所有用户列表
 * @return array|null
 */
function get_common_list()
{
    global $conn;
    $sql = "SELECT * FROM member WHERE permissions='2'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            if($result["password"])
            {
                $result["password"] = "";

            }
            $data[] = $result;
        }
        return $data;
    }
}

if (!isset($_GET["act"])) {
    exit();
}
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE,DB_PORT);
mysqli_query($conn,'set names utf8');
$data = [
    "code" => 0,
    "msg" => "",
];
if (!$conn) {
    $data["code"] = -1;
    $data["msg"] = "无法连接数据库！";
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}
//接口
$act = $_GET["act"];
if ($act == "get_common_list") {//获取用户列表
    $result = get_common_list();
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取用户列表失败";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "get_members_list") {//获取会员列表
    $result = get_members_list();
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取会员列表失败";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "remove") {//删除成员
	if (!isset($_GET["username"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $username = $_GET['username'];
    $result = remove($username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "删除失败，该成员不存在！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "删除失败！";
    } else if ($result === true)  {
    	$data["code"] = 0;
        $data["msg"] = "删除成功！";
    }
} else if ($act == "remove_members") {//降级为成员
    if (!isset($_GET["username"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $username = $_GET['username'];
    $result = remove_members($username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "降级失败，该会员不存在！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "降级失败！";
    } else if ($result === true)  {
        $data["code"] = 0;
        $data["msg"] = "降级成功！";
    }
} else if ($act == "remove_ask") {//删除问题
	if (!isset($_GET["title"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $title = $_GET['title'];
    $result = remove_ask($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "删除失败，该问题不存在！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "删除失败！";
    } else if ($result === true)  {
    	$data["code"] = 0;
        $data["msg"] = "删除成功！";
    }
} else if ($act == "remove_post") {//删除帖子
	if (!isset($_GET["title"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $title = $_GET['title'];
    $result = remove_post($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "删除失败，该问题不存在！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "删除失败！";
    } else if ($result === true)  {
    	$data["code"] = 0;
        $data["msg"] = "删除成功！";
    }
} else if ($act == "get_post_list") {//获取帖子列表
	$result = get_post_list();
	if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取用户列表失败！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "get_my_post") {//获取我的帖子列表
    $username=$_SESSION['username'];
    $result = get_my_post($username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取用户列表失败！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "get_my_ask") {//获取我的问题列表
    $username=$_SESSION['username'];
    $result = get_my_ask($username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取用户列表失败！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "get_ask_list") {//获取问题列表
    $result = get_ask_list();
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取问题列表失败！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "add_ask") {//发问题
	if (!isset($_GET["quiz_title"]) || !isset($_GET["quiz_main"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $username = $_SESSION['username'];
    $title=escape($conn,$_GET["quiz_title"]);
    $main=escape($conn,$_GET["quiz_main"]);
    $result = add_ask($title,$main,$username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "发问题失败！";
    } else if ($result === true) {
        $data["code"] = -1;
        $data["msg"] = "该问题已存在！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "插入问题失败！";
    } else {
    	$data["code"] = 0;
        $data["msg"] = "发问题成功！";
        $data["data"] = $result;
    }
} else if ($act == "add_post") {//发帖
	if (!isset($_GET["posting_title"]) || !isset($_GET["posting_main"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $username = $_SESSION['username'];
    $title=escape($conn,$_GET["posting_title"]);
    $main=escape($conn,$_GET["posting_main"]);
    $result = add_post($title,$main,$username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "发帖失败！";
    } else if ($result === true) {
        $data["code"] = -1;
        $data["msg"] = "该帖子已存在！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "插入帖子失败！";
    } else {
    	$data["code"] = 0;
        $data["msg"] = "发帖成功！";
        $data["data"] = $result;
    }
} else if ($act == "alter") {//修改密码
    if (!isset($_POST["newpassword"]) || !isset($_POST["password"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $password=encrypt($_POST['password']);
    $newpassword=encrypt($_POST['newpassword']);
    $username=$_SESSION['username'];
    $result = alter($username,$password,$newpassword);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "密码错误！";
    } else if ($result === false) {
        $data["code"] = -1;
        $data["msg"] = "修改密码失败！";
    } else if ($result === true) {
        $data["code"] = 0;
        $data["msg"] = "修改密码成功！";
    }
} else if ($act == "ask_in") {//进入问题
    $title=$_GET['title'];
    $result = ask_in($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "该问题不存在！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "post_in") {//进入帖子
    $title=$_GET['title'];
    $result = post_in($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "该帖子不存在！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "go_ask") {//回答问题
    $write=$_POST['write'];
    $title=$_POST['title'];
    $username = $_SESSION['username'];
    $result = go_ask($write,$title,$username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "该问题不存在！";
    } else if($result === false){
        $data["code"] = -1;
        $data["msg"] = "回答失败！";
    } else {
        $data["msg"] = "回答成功！";
        $data["data"] = $result;
    }
} else if ($act == "go_post") {//回复帖子
    $write=$_POST['write'];
    $title=$_POST['title'];
    $username = $_SESSION['username'];
    $result = go_post($write,$title,$username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "该帖子不存在！";
    } else if($result === false){
        $data["code"] = -1;
        $data["msg"] = "回复失败！";
    } else {
        $data["msg"] = "回复成功！";
        $data["data"] = $result;
    }
} 
$conn->close();//关闭数据库连接，如果提前结束流程输出一定要自己$conn->close();关闭数据库连接
echo json_encode($data,JSON_UNESCAPED_UNICODE);