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
$action = $_POST['action'];

switch ($action)
{
    case 'login':
        login();
    break;
};

function login()
{
    $userName=$_POST['user_name'];
    $password=$_POST['password'];
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