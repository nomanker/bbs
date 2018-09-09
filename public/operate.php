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
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and category = 0";
    $query = $conn->query($sql);
	$result = $query ? mysqli_fetch_assoc($query) : $query;
	if($result) {
		return true;
	} else {
		$sql = "INSERT INTO post_father(`username`,`title`,`main`,`category`) VALUES('{$username}','{$title}','{$main}',0)";
	    $query = $conn->query($sql);
	    if(!$query) {
	    	return false;
	    } else {
	    	$sql = "SELECT * FROM post_father WHERE title='{$title}' and category = 0";
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
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and category = 1";
    $query = $conn->query($sql);
	$result = $query ? mysqli_fetch_assoc($query) : $query;
	if($result) {
		return true;
	} else {
		$sql = "INSERT INTO post_father(`username`,`title`,`main`,`category`) VALUES('{$username}','{$title}','{$main}',1)";
	    $query = $conn->query($sql);
	    if(!$query) {
	    	return false;
	    } else {
	    	$sql = "SELECT * FROM post_father WHERE title='{$title}' and category = 1";
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
    $sql = "SELECT * FROM post_father WHERE is_delete = 0 and category = 1 ORDER BY id";
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
    $sql = "SELECT * FROM post_father WHERE username='{$username}' AND is_delete = 0 and category = 1  ORDER BY id";
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
    $sql = "SELECT * FROM post_father WHERE username='{$username}' AND is_delete = 0 and category = 0 ORDER BY id";
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
 * 获取所有回收站列表
 * @return array|null
 */
function recycle_list()
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE is_delete = 1 ORDER BY id";
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
    $sql = "SELECT * FROM post_father WHERE is_delete = 0 and category = 0 ORDER BY id";
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
 * 清除问题
 * @param $title
 * @return array|null
 */
function recycle($title)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 1";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "DELETE FROM post_father WHERE title='{$title}' and is_delete = 1";
        $query = $conn->query($sql);
        $sqli = "DELETE FROM post_son WHERE title='{$title}'";
        $queryi = $conn->query($sqli);
        $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 1";
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
 * 恢复
 * @param $title
 * @return array|null
 */
function recycle_back($title)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 1";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "UPDATE post_father SET is_delete=0 WHERE title='{$title}'";
        $query = $conn->query($sql);
        $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0";
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
 * 删除成员
 * @param $id
 * @return array|null
 */
function remove($id)
{
    global $conn;
    $sql = "SELECT * FROM member WHERE id='{$id}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
    	$sql = "DELETE FROM member WHERE id='{$id}'";
    	$query = $conn->query($sql);
    	$sql = "SELECT * FROM member WHERE id='{$id}'";
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
 * @param $id
 * @return array|null
 */
function remove_members($id)
{   $a= '2';
    global $conn;
    $sql = "SELECT * FROM member WHERE id='{$id}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "UPDATE member SET permissions='{$a}' WHERE id='{$id}'";
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
 * @param $id,$password,$newpassword
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
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0 and category = 0";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
    	$sql = "UPDATE post_father SET is_delete=1 WHERE title='{$title}' and category = 0";
    	$query = $conn->query($sql);
    	$sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0 and category = 0";
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
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0 and category = 1";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
    	$sql = "UPDATE post_father SET is_delete=1 WHERE title='{$title}' and category = 1";
    	$query = $conn->query($sql);
    	$sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0 and category = 1";
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
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0 and category = 0";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        $sqli = "SELECT * FROM post_son WHERE title='{$title}' and category = 0";
        $queryi = $conn->query($sqli);
        while( $resulti = mysqli_fetch_assoc($queryi)){
            $data[]=$resulti;
        }
        return $data;
    }
}

/**
 * 获取建议
 * @param $title
 * @return array|null
 */
function advice_in()
{
    global $conn;
    $sql = "SELECT * FROM advice";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        return $data;
    }
}

/**
 * 获取某建议
 * @param $title
 * @return array|null
 */
function advice_on($title)
{
    global $conn;
    $sql = "SELECT * FROM advice WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        return $data;
    }
}

/**
 * 删除建议
 * @param $title
 * @return array|null
 */
function deladvice($title)
{
    global $conn;
    $sql = "DELETE FROM advice WHERE title='{$title}'";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        return true;
    }
}

/**
 * 发建议
 * @param $title
 * @return array|null
 */
function send_advice($title,$main,$username)
{
    global $conn;
    $sql = "INSERT INTO advice(`username`,`title`,`main`) VALUES('{$username}','{$title}','{$main}')";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        return true;
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
    $sql = "SELECT * FROM post_father WHERE title='{$title}' and is_delete = 0 and category = 1";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query)){
            $data[]=$result;
        }
        $sqli = "SELECT * FROM post_son WHERE title='{$title}' and category = 1";
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
    $sql = "SELECT * FROM post_son WHERE title='{$title}' and category = 0";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "INSERT INTO post_son(`username`,`title`,`answer`,`category`) VALUES('{$username}','{$title}','{$write}',0)";
        $query = $conn->query($sql);
        if(!$query) {
            return false;
        } else {
            $sql = "SELECT * FROM post_son WHERE title='{$title}' and category = 0";
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
    $sql = "SELECT * FROM post_son WHERE title='{$title}' and category = 1";
    $query = $conn->query($sql);
    if (!$query) {
        return null;
    } else {
        $sql = "INSERT INTO post_son(`username`,`title`,`answer`,`category`) VALUES('{$username}','{$title}','{$write}',1)";
        $query = $conn->query($sql);
        if(!$query) {
            return false;
        } else {
            $sql = "SELECT * FROM post_son WHERE title='{$title}' and category = 1";
            $query = $conn->query($sql);
            while( $result = mysqli_fetch_assoc($query)){
                $data[]=$result;
            }
            return $data;
        }
    }
}
/**
 * 获取搜索帖子
 * *@param $keywords
 * @return array|null
 */
function search($keywords)
{
    global $conn;
    $sql = "SELECT * FROM post_father WHERE title like '%$keywords%'";
    $query = $conn->query($sql);
    $data=[];
    if (!$query) {
        return null;
    } else {
        while($result = mysqli_fetch_assoc($query))
        {
            $data[] = $result;
        }
        if(!$data){
            return null;
        }
        return $data;
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
	if (!isset($_GET["id"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $id = $_GET['id'];
    $result = remove($id);
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
    if (!isset($_GET["id"])) {
        $data["code"] = -1;
        $data["msg"] = "请检查提交的参数。";
        $conn->close();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }
    $id = $_GET['id'];
    $result = remove_members($id);
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
        $data["msg"] = "获取帖子列表失败！";
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
} else if ($act == "search") {//搜索帖子
    $keywords=$_GET['keywords'];
    $result = search($keywords);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "未找到，请重新输入关键词！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "advice_in") {//获取建议
    $result = advice_in();
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "还没有任何建议！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "advice_on") {//获取某建议
    $title=$_GET['title'];
    $result = advice_on($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "该建议不存在！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "deladvice") {//获取某建议
    $title=$_POST['title'];
    $result = deladvice($title);
    if ($result==null) {
        $data["code"] = -1;
        $data["msg"] = "删除失败！";
    } else {
        $data["msg"] = "删除成功！";
    }
} else if ($act == "send_advice") {//发建议
    $main=$_GET['main'];
    $title=$_GET['title'];
    $username = $_SESSION['username'];
    $result = send_advice($title,$main,$username);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "建议发送失败！";
    } else {
        $data["msg"] = "建议发送成功！";
    }
} else if ($act == "recycle_list") {//获取回收站列表
    $result = recycle_list();
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "获取回收站列表失败！";
    } else {
        $data["data"] = $result;
    }
} else if ($act == "recycle") {//清除列表
    $title=$_GET['title'];
    $result = recycle($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "清除失败！";
    } else {
       $data["msg"] = "清除成功！";
    }
} else if ($act == "recycle_back") {//恢复列表
    $title=$_GET['title'];
    $result = recycle_back($title);
    if ($result === null) {
        $data["code"] = -1;
        $data["msg"] = "恢复失败！";
    } else {
        $data["msg"] = "恢复成功！";
    }
} 
$conn->close();//关闭数据库连接，如果提前结束流程输出一定要自己$conn->close();关闭数据库连接
echo json_encode($data,JSON_UNESCAPED_UNICODE);