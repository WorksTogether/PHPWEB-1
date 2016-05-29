<?php
/**
 * Created by PhpStorm.
 * User: KS
 * Date: 2016/5/14
 * Time: 21:09
 */
error_reporting(E_ERROR);
set_time_limit(0);

date_default_timezone_set('Europe/London');
include 'connect.php';
$postData=file_get_contents('php://input', true);
$jsonData=json_decode($postData,true);
$action = $jsonData['action'];
switch ($action)
{
    case 'login':
        login($jsonData);
    break;
    case 'logout':
        logout();
        break;
    default:
        break;
};

function login($jsonData)
{
    $userName=$jsonData['user_name'];
    $password=$jsonData['password'];
    if(empty($userName)|| empty($password))
    {
        $array = array(
            "msg" => "error",
            "info" => "用户名或密码不能为空！",
        );
        echo json_encode($array);
        die();
    }
    $sql = "SELECT * FROM `user_info` WHERE user_name='".$userName."' AND password='".$password."'";
    if ($result=$GLOBALS['$conn']->query($sql))
    {
        if(  $result->num_rows > 0  && $result->num_rows == 1)
        {
          $row = $result->fetch_assoc();
          storageSession($row);
            $array = array(
                "msg" => "success",
                "auth"=>$row['auth'],
            );
            echo json_encode($array);
        }
        else
        {
            $array = array(
                "msg" => "error",
                "info" => "用户名或密码错误！",
            );
            echo json_encode($array);
        }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function logout()
{
    clearSession();
    $array = array(
        "msg" => "success",
        "info" => "退出成功！",
    );
    echo json_encode($array);
}
function clearSession()
{
    //正确的注销session方法：
//1开启session
    session_start();

//2、清空session信息
    $_SESSION = array();

//3、清楚客户端sessionid
    if(isset($_COOKIE[session_name()]))
    {
        setCookie(session_name(),'',time()-3600,'/');
    }
//4、彻底销毁session
    session_destroy();

}
function storageSession($row)
{
    // 启动 Session
    session_start();
   // 声明一个名为 admin 的变量，并赋空值。
    $auth=$row[auth];
    $id=$row[id];
    $userName=$row[user_name];
    $realName=$row[real_name];
    $gender=$row[gender];
    $status=$row[status];
    $area=$row[area];
    $email=$row[email];
    $phone=$row[phone];
    $_SESSION["auth"] = $auth;
    $_SESSION["id"] = $id;
    $_SESSION["userName"] = $userName;
    $_SESSION["realName"] = $realName;
    $_SESSION["gender"] = $gender;
    $_SESSION["status"] = $status;
    $_SESSION["area"] = $area;
    $_SESSION["email"] = $email;
    $_SESSION["phone"] = $phone;
    $_SESSION["login"] = true;

}



?>