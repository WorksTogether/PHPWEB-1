<?php
/**
 * Created by PhpStorm.
 * User: KS
 * Date: 2016/5/14
 * Time: 22:19
 */
error_reporting(E_ERROR);
set_time_limit(0);

date_default_timezone_set('Europe/London');
include 'connect.php';
include 'php/Globals.php';

$action= $_GET['action'];
switch ($action)
{
    case 'manage_user_add':
        manage_user_add();
    break;
    case 'request_manage_user':
        request_manage_user();
        break;
};

function request_manage_user()
{
    $page = $_POST['page'];
    $limit = $_POST['rows'];
    $sidx = $_POST['sidx'];
    $sord = $_POST['sord'];
    if (!$sidx)
        $sidx = 1;
    // echo json_encode($sord);
    $sql = "SELECT COUNT(*) AS count FROM `user_info` WHERE auth != 0 ";
    $result = $GLOBALS['$conn']->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $count = $row['count'];
    if ($count > 0)
    {
        $total_pages = ceil($count / $limit);
    }
    else
    {
        $total_pages = 0;
    }
    if ($page > $total_pages)
        $page = $total_pages;
    $start = $limit * $page - $limit;
    if ($start < 0 )
        $start = 0;
    $responce->records = $count;
    $responce->total = $total_pages;
    if ($page > $total_pages)
        $page = $responce->total;
    $responce->page = $page;

    $sql = "SELECT * FROM `user_info` WHERE auth != 0 ORDER BY $sidx $sord LIMIT $start , $limit";
    if($result = $GLOBALS['$conn']->query($sql))
    {
        if ($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                $responce->rows[$i]['id'] = $row['id'];
                $responce->rows[$i]['cell'] = array (
                    $row['user_name'],
                    $row['password'],
                    $row['real_name'],
                    $row['gender'],
                    $row['phone'],
                    $row['email'],
                    $row['status'],
                    $row['auth'],
                    $row['area'],
                );
                $i++;
            }
            echo json_encode($responce);
        }
        else
        {
            $reponse->records = 0;
            $responce->total = 0;
            echo json_encode($reponse,JSON_UNESCAPED_UNICODE);
        }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function manage_user_add()
{
    $userName=$_POST['login'];
    $password=$_POST['pas'];
    $realName=$_POST['user_name'];
    $gender=$_POST['sex'];
    $phone=$_POST['tel'];
    $email=$_POST['eml'];
    $status=$_POST['status'];
    $area1=$_POST['hand_zone_excute'];
    $area2=$_POST['hand_leader'];
    $area=$area1;
    //0admin   1主管 2组长
    $auth=1;
    if(empty($area1))
    {
        $area=$area2;
        $auth=2;
    }
    if(empty($area2))
    {
        $area=$area1;
        $auth=1;
    }

    $sql="SELECT * FROM `user_info` WHERE user_name='".$userName."'";
    if ($result=$GLOBALS['$conn']->query($sql)) {
        if($result->num_rows>0)//用户已经存在
        {
            $array = array(
                "msg" => "error",
                "info" => "用户已存在",
            );
            die(json_encode($array,JSON_UNESCAPED_UNICODE));
        }


    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }

    $sql = "INSERT INTO `user_info`(`user_name`, `password`,`real_name`,`gender`,`phone`,`email`,`auth`,`status`,`area`) VALUES 
      ('$userName','$password','$realName','$gender','$phone','$email','$auth','$status','$area')";
    if ($GLOBALS['$conn']->query($sql)) {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);

    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
?>