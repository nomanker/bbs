<?php
//1.调用数据库连接函数
function connect($host=DB_HOST,$user=DB_USER,$password=DB_PASSWORD,$database=DB_DATABASE,$port=DB_PORT){
    $link=@mysqli_connect($host,$user,$password,$database,$port);//屏蔽错误
    if(mysqli_connect_errno()){//返回0（连接成功）或其他数字（连接失败）
        exit(mysqli_connect_errno());//输出错误并终止执行
    }
    mysqli_set_charset($link,'utf8');
    return $link;
}
//2.执行一条sql语句，返回结果集对象或布尔值
function execute($link,$query){
    $result=mysqli_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_errno($link));
    }
}
//3.执行一条SQL语句，只会返回布尔值
function execute_bool($link,$query){
    $bool=mysqli_real_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $bool;
}
//4.一次性执行多条SQL语句
function execute_multi($link,$arr_sqls,&$error){
    $sqls=implode(';',$arr_sqls).';';
    if(mysqli_multi_query($link,$sqls)){
        $data=array();
        $i=0;//计数
        do {
            if($result=mysqli_store_result($link)){
                $data[$i]=mysqli_fetch_all($result);
                mysqli_free_result($result);
            }else{
                $data[$i]=null;
            }
            $i++;
            if(!mysqli_more_results($link)) break;
        }while (mysqli_next_result($link));
        if($i==count($arr_sqls)){
            return $data;
        }else{
            $error="sql语句执行失败：<br />&nbsp;数组下标为{$i}的语句:{$arr_sqls[$i]}执行错误<br />&nbsp;错误原因：".mysqli_error($link);
            return false;
        }
    }else{
        $error='执行失败！请检查首条语句是否正确！<br />可能的错误原因：'.mysqli_error($link);
        return false;
    }
}
//5.获取记录数
function num($link,$sql_count){
    $result=execute($link,$sql_count);
    $count=mysqli_fetch_row($result);
    return $count[0];
}
//6.数据入库之前进行转义，确保，数据能够顺利的入库,防被用单引号或双引号检查出注入点
function escape($link,$data){
    if(is_string($data)){
        return mysqli_real_escape_string($link,$data);
    }
    if(is_array($data)){ //处理数组
        foreach ($data as $key=>$val){
            $data[$key]=escape($link,$val); //递归函数
        }
    }
    return $data;
}
//7.关闭与数据库的连接
function close($link){
    mysqli_close($link);
}
?>