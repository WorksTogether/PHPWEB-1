<?php

error_reporting(E_ERROR);
set_time_limit(0);

date_default_timezone_set('Europe/London');
include 'connect.php';
include 'php/Globals.php';
include 'PHPExcel/IOFactory.php';

if(!isLogin())
{
    $array = array(
        "msg" => "error",
        "info" => "您未登录",
    );
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
    echo "<META HTTP-EQUIV=Refresh CONTENT=0;URL=index.html>";//跳转到首页
    die();
}
$action = $_GET['action'];
switch ($action) {
case 'auth':
    $response=array();
    $response['auth']=$_SESSION["auth"];
    echo json_encode($response,JSON_UNESCAPED_UNICODE);
    break;
  case 'norefresh':
      $reponse["records"] = 0;
    	echo json_encode($reponse,JSON_UNESCAPED_UNICODE);
    break;
  case 'uploadfile':
		handle_fileupload();
  break;
    case 'request_file':
		request_file();
  break;
  case 'del_row':
    del_row();
  break;
   case 'check_fin':
    check_fin();
  break;
  case 'first_refresh':
    query_by_status('case_in');
  break;
  case 'query_1':
      query_exist();
  break;
  case 'query_2':
      query_list();
  break;
  case 'hand_assign':
      distribution();
  break;
  case 'request_case_assign':
      request_case_assign();
  break;
case 'request_case_detail':
    request_case_detail();
    break;
case 'export_case':
    export_case();
    break;
case 'request_case_close':
    request_case_close();
    break;
case 'request_case_closed':
    request_case_closed();
break;
case 'case_close':
    case_close();
    break;
case 'list':
    case_list();
    break;
case 'request_region_wait':
    request_region_wait();
    break;
case 'request_region_fin':
    request_region_fin();
break;
case 'request_leader':
    request_leader();
    break;
/*case 'request_leader_wait':
    request_leader_wait();
    break;*/
case 'request_receive':
    request_receive();
    break;
case 'region_hand_assign':
    distribution();
    break;
case 'request_wait_handle':
    request_wait_handle();
    break;
case 'request_pay_att':
    request_pay_att();
    break;
case 'pay_att':
    pay_att();
break;
case 'cancel_att':
    cancel_att();
    break;
case 'visit_handle':
    visit_handle();
    break;
case 'phone_handle':
    phone_handle();
    break;
    case 'request_case_inprocess'://查询
        request_case_inprocess();
        break;
case 'visit_process1'://查询
    visit_process1();
    break;
case 'visit_process'://设置
    visit_process();
    break;
case 'start_handle':
    start_handle();
break;
case 'start_visit':
    start_visit();
    break;
case 'visit_fin':
    case_finish();
    break;
case 'phone_handle_fin':
    case_finish();
    break;
case 'request_case_fin':
    request_case_fin();
    break;
case 'request_handle_statistic':
    request_handle_statistic();
    break;
case 'request_visit_statistic':
    request_visit_statistic();
    break;
case 'homepage':
    homepage();
    break;
  default:
    # code...
    break;
};

function homepage()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {

        $response=array();
        $response['msg']="success";
        $sql1 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'tel_collection' OR status = 'visit_collection_wait' OR status = 'visit_collection_process'";
        $result1 = $GLOBALS['$conn']->query($sql1);
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
        $count1 = $row1['count'];
        $response['case_total']=$count1;
        $response['wait_handle']=$count1;

        $sql2 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'visit_collection_process'";
        $result2 = $GLOBALS['$conn']->query($sql2);
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);
        $count2 = $row2['count'];
        $response['visit_times']=$count2;


        $sql3 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'fin_assign' AND ( director IS NOT NULL  AND  director!='')  AND  ( ISNULL(leader) OR leader='')";
        $result3 = $GLOBALS['$conn']->query($sql3);
        $row3 = $result3->fetch_array(MYSQLI_ASSOC);
        $count3 = $row3['count'];
        $response['region_wait_handle']=$count3;

        $sql4 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'fin_assign' AND ( director IS NOT NULL  AND  director!='')  AND  ( leader IS NOT NULL  AND  leader!='')";
        $result4 = $GLOBALS['$conn']->query($sql4);
        $row4 = $result4->fetch_array(MYSQLI_ASSOC);
        $count4 = $row4['count'];
        $response['salesman_wait_handle']=$count4;

        $sql5 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'visit_collection_wait'";
        $result5 = $GLOBALS['$conn']->query($sql5);
        $row5 = $result5->fetch_array(MYSQLI_ASSOC);
        $count5 = $row5['count'];
        $response['wait_visit']=$count5;
        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    if($auth==1)//主管
    {
        $response=array();
        $response['msg']="success";
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        $sql3 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'fin_assign'  AND director='".$director."' AND  ( ISNULL(leader) OR leader='')";
        $result3 = $GLOBALS['$conn']->query($sql3);
        $row3 = $result3->fetch_array(MYSQLI_ASSOC);
        $count3 = $row3['count'];
        $response['region_wait_handle']=$count3;
        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }
    if($auth==2)//组长
    {
        $response=array();
        $response['msg']="success";
        $real_name=$_SESSION["realName"];
        $sql4 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'fin_assign' AND ( director IS NOT NULL  AND  director!='')    AND leader='".$real_name."'";
        $result4 = $GLOBALS['$conn']->query($sql4);
        $row4 = $result4->fetch_array(MYSQLI_ASSOC);
        $count4 = $row4['count'];
        $response['salesman_wait_handle']=$count4;

        $sql5 = "SELECT COUNT(*) AS count FROM `total` WHERE  status = 'visit_collection_wait'  AND leader='".$real_name."'";
        $result5 = $GLOBALS['$conn']->query($sql5);
        $row5 = $result5->fetch_array(MYSQLI_ASSOC);
        $count5 = $row5['count'];
        $response['wait_visit']=$count5;

        $sql1 = "SELECT COUNT(*) AS count FROM `total` WHERE  (status = 'tel_collection' OR status = 'visit_collection_wait' OR status = 'visit_collection_process')  AND leader='".$real_name."'";
        $result1 = $GLOBALS['$conn']->query($sql1);
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
        $count1 = $row1['count'];
        $response['wait_handle']=$count1;
        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }
}
function request_visit_statistic()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("visit_collection_process" );
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("visit_collection_process' AND director='".$director );
        // query_by_status("case_close' AND director='".$director);
    }
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("visit_collection_process' AND leader='".$real_name );
    }
}
function request_handle_statistic()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("tel_collection" );
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("tel_collection' AND director='".$director );
        // query_by_status("case_close' AND director='".$director);
    }
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("tel_collection' AND leader='".$real_name );
    }
}
function request_case_detail()//全部案件明细
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("NO_DATA' OR status!='NO_DATA" );
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("NO_DATA' OR director='".$director );
        // query_by_status("case_close' AND director='".$director);
    }
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("NO_DATA' OR leader='".$real_name );
    }
}
function  request_case_fin()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("case_finish" );
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("case_finish' AND director='".$director );
        // query_by_status("case_close' AND director='".$director);
    }
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("case_finish' AND leader='".$real_name );
    }
}
function request_case_inprocess()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("tel_collection' OR status='visit_collection_wait'  OR status='visit_collection_process" );
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("NO_DATA' OR ((status='tel_collection' OR status='visit_collection_wait'  OR status='visit_collection_process') AND director='".$director."') AND '1'='1" );
       // query_by_status("case_close' AND director='".$director);
    }
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("NO_DATA' OR ((status='tel_collection' OR status='visit_collection_wait'  OR status='visit_collection_process') AND leader='".$real_name."') AND '1'='1" );

    }
}
function request_case_closed()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("case_close");
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("case_close' AND director='".$director);
    }
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("case_close' AND leader='".$real_name);
    }
}
function start_visit()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="status='visit_collection_process'";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function case_finish()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="status='case_finish'";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function start_handle()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="status='tel_collection'";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function visit_process()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="status='visit_collection_wait'";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function visit_process1()
{
    $auth=$_SESSION["auth"] ;
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status(" NO_DATA' OR status='visit_collection_process'  AND leader='".$real_name);
    }
    if($auth==1)//主管
    {
        $area=$_SESSION["area"];
        $real_name=$_SESSION["realName"];
        $director=$area."->".$real_name;
        query_by_status(" NO_DATA' OR status='visit_collection_process'  AND director='".$director);
    }
    if($auth==0)//超级管理员
    {
        query_by_status(" NO_DATA' OR status='visit_collection_process");
    }
}
function visit_handle()
{
    $auth=$_SESSION["auth"] ;
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status(" NO_DATA' OR status='visit_collection_wait'  AND leader='".$real_name);
    }
    if($auth==1)//主管
    {
        $area=$_SESSION["area"];
        $real_name=$_SESSION["realName"];
        $director=$area."->".$real_name;
        query_by_status(" NO_DATA' OR status='visit_collection_wait'  AND director='".$director);
    }
    if($auth==0)//超级管理员
    {
        query_by_status(" NO_DATA' OR status='visit_collection_wait");
    }
}

function phone_handle()
{
    $auth=$_SESSION["auth"] ;
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status(" NO_DATA' OR status='tel_collection'  AND leader='".$real_name);
    }
    if($auth==1)//主管
    {
        $area=$_SESSION["area"];
        $real_name=$_SESSION["realName"];
        $director=$area."->".$real_name;
        query_by_status(" NO_DATA' OR status='tel_collection'  AND director='".$director);
    }
    if($auth==0)//超级管理员
    {
        query_by_status(" NO_DATA' OR status='tel_collection");
    }
}
function cancel_att()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="important='no'";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function pay_att()
{
    $auth=$_SESSION["auth"] ;
    if($auth!=2)
    {
        $array = array(
            "msg" => "error",
            "info"=>"非法请求",
        );
        echo json_encode($array);
        die(0);
    }
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="important='yes'";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
function request_pay_att()
{
    $auth=$_SESSION["auth"] ;
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status(" NO_DATA' OR status!='case_close' AND important='yes' AND leader='".$real_name);
    }
    if($auth==1)//主管
    {
        $area=$_SESSION["area"];
        $real_name=$_SESSION["realName"];
        $director=$area."->".$real_name;
        query_by_status(" NO_DATA' OR status!='case_close' AND important='yes' AND director='".$director);
    }
   if($auth==0)//超级管理员
   {
       query_by_status(" NO_DATA' OR status!='case_close' AND important='yes");
   }
}
function request_wait_handle()
{
    $auth=$_SESSION["auth"] ;
    if($auth==2)//组长
    {
        $real_name=$_SESSION["realName"];
        query_by_status("fin_assign'   AND leader='".$real_name);
    }
    else
    {
        $array = array(
            "msg" => "error",
            "info"=>"只有组长才能进行案件催收",
        );
        echo json_encode($array);
        die(0);
    }
}
function request_receive()
{
    $auth=$_SESSION["auth"] ;
    if($auth!=1)
    {
        $array = array(
            "msg" => "error",
            "info"=>"非法请求",
        );
        echo json_encode($array);
        die(0);
    }
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
            "info"=>"id不为空",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_join="leader=''";
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$ids_str.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }
}
/*function request_leader_wait()
{
    $auth=$_SESSION["auth"] ;
    if($auth==2)//组长，只列出自己的信息
    {
        $real_name=$_SESSION["realName"];
        query_by_status("fin_assign' AND (director!='' AND director IS NOT NULL)  AND leader='".$real_name."' AND '1'='1");
    }
}*/
function request_region_fin()
{
    $auth=$_SESSION["auth"] ;
    if($auth==1)//主管，列出自己的信息，beijin->real_name
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("fin_assign' AND director='".$director."'  AND ( leader IS NOT NULL  AND  leader!='') AND '1'='1");
    }

}
function request_region_wait()
{
    $auth=$_SESSION["auth"] ;
   /* if($auth==0)//超级管理员，显示出所有主管的信息
    {
        //查询出已经分配到主管，但是没有分配到组长的所有主管记录
        query_by_status("fin_assign' AND (director!='' AND director IS NOT NULL) AND ( ISNULL(leader) OR leader='') AND '1'='1");
    }*/
    if($auth==1)//主管，列出自己的信息，beijin->real_name
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status("fin_assign' AND director='".$director."'  AND ( ISNULL(leader) OR leader='') AND '1'='1");
    }
}
function request_leader()
{
    $auth=$_SESSION["auth"] ;

    if($auth==0)
    {
        $array = array();
        $array2=array();
        $sql = "SELECT * FROM `user_info` WHERE auth =1 " ;
        if($result = $GLOBALS['$conn']->query($sql)) {
            if ($result->num_rows > 0) {
                $array['msg']="success";
                while ($row = $result->fetch_assoc()) {
                    $array2[$row['user_name']] = $row['area'].htmlspecialchars("->").$row['real_name'];
                }
                $array['excutive']=$array2;
                echo json_encode($array,JSON_UNESCAPED_UNICODE);

            }
        }
    }
    else
    if($auth== 1)
    {
        $area=$_SESSION["area"];
        $array = array();
        $array2=array();
        $sql = "SELECT * FROM `user_info` WHERE auth =2  AND area='".$area."'" ;
        if($result = $GLOBALS['$conn']->query($sql)) {
            if ($result->num_rows > 0) {
                $array['msg']="success";
                while ($row = $result->fetch_assoc()) {
                    $array2[$row['user_name']] = $row['real_name'];
                }
                $array['leader']=$array2;
                echo json_encode($array,JSON_UNESCAPED_UNICODE);

            }
        }
    }
    else{

        $array = array(
            "msg" => "error",
            "info"=>"非法请求",
        );
        echo json_encode($array);
        die(0);
    }
}
function case_list()
{
    $ids = $_POST['sels'];
    if(empty($ids))
    {

        $array = array(
            "msg" => "error",
        );
        echo json_encode($array);
        die(0);
    }

    $sql = "SELECT * FROM `total` WHERE id IN (".$ids[0].")";
    if ($result=$GLOBALS['$conn']->query($sql))
    {
        //$rows[0]=$result->fetch_assoc();
        $row =$result->fetch_assoc();
        $status=$row['status'];
        $row['handle_progress']=getStatus($status);
        $row['handle_saleman']=$row['leader'];
        $row['tel_handle']=$row['leader'];
        $status_phone="未电催";
        $status_visit="未外访";

        switch ($status)
        {
            case 'wait_assign':
            case 'fin_assign':
            $status_phone="未电催";
            $status_visit="未外访";
                break;
            case 'case_close':
                $status_show="案件强制关闭";
                break;
            case 'tel_collection':
                $status_phone="正在电催";
                $status_visit="未外访";
                break;
            case 'visit_collection_wait':
                $status_phone="已电催";
                $status_visit="等待外访";
                break;
            case 'visit_collection_process':
                $status_phone="已电催";
                $status_visit="正在外访";
                break;
            case 'case_finish':
                $status_phone="已电催";
                $status_visit="已外访";
                break;

        }
        $row['tel_handle']=$status_phone;
        $row['visit_handle']=$status_visit;

        echo json_encode($row);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }


}
function case_close()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if (empty ($ids))
    {
        $array = array(
            "msg" => "error",
        );
        echo json_encode($array);
        die(0);
    }
    $sql = "UPDATE `total` SET status='case_close' WHERE id IN (".$ids_str.")";
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }

}
function request_case_close()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员
    {
        query_by_status("NO_DATA' OR status!='case_close");
    }
    if($auth==1)//主管
    {
        $real_name=$_SESSION["realName"];
        $area=$_SESSION["area"];
        $director=$area."->".$real_name;
        query_by_status(" NO_DATA' OR status!='case_close' AND director='".$director);
    }

}
function export_case()
{
    $ids = $_POST['sels'];
    $ids_str = join(',', $ids);
    if (empty ($ids))
    {
        $array = array(
            "msg" => "error",
            "url"=>"",
        );
        echo json_encode($array);
        die(0);
    }
    $sql = "SELECT * FROM `total` WHERE id IN (".$ids_str.")";
    // 创建一个处理对象实例
    $objExcel = new PHPExcel();
   // 创建文件格式写入对象实例, uncomment
    $objWriter = new PHPExcel_Writer_Excel5($objExcel);
    //设置文档基本属性
    $objProps = $objExcel->getProperties();
    $objProps->setCreator("NANKAI");
    $objProps->setLastModifiedBy("nan kai");
    $objProps->setTitle("Office XLS  Document");
    $objProps->setSubject("Office XLS  Document");
    $objProps->setDescription("XLS document, generated by PHPExcel.");
    $objProps->setKeywords("office excel PHPExcel");
    $objProps->setCategory("Document");
    //设置当前的sheet索引，用于后续的内容操作。
    //一般只有在使用多个sheet的时候才需要显示调用。
    //缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0
    $objExcel->setActiveSheetIndex(0);
    $objActSheet = $objExcel->getActiveSheet();
    //设置当前活动sheet的名称
    $objActSheet->setTitle('第一页');
    // 设置行高度
    $objActSheet->getRowDimension('1')->setRowHeight(22);

    for($start='A';$start<='Z';$start++)
    {
        $objActSheet->getColumnDimension($start)->setWidth(18);
    }

    // 字体和样式
    $objActSheet->getStyle('A1:AM1')->getFont()->setSize(12);
    $objActSheet->getStyle('A1:AM1')->getFont()->setBold(true);
    $objActSheet->getStyle('A1:AM1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $objActSheet->getStyle('A1:AM1')->getFill()->getStartColor()->setARGB("#ffbfbfbf");
    $objActSheet->getStyle('A1:AM1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $objActSheet->getStyle('A1:AM1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objActSheet->getStyle('A:AM')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objActSheet->getStyle('A:AM')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objActSheet->getStyle('A:AM')->getAlignment()->setWrapText(true);
    //填写表头
    $objActSheet->setCellValue('A1','客户名');
    $objActSheet->setCellValue('B1','身份证号');
    $objActSheet->setCellValue('C1','工作单位');
    $objActSheet->setCellValue('D1','单位地址');
    $objActSheet->setCellValue('E1','单位电话');
    $objActSheet->setCellValue('F1','职务');
    $objActSheet->setCellValue('G1','户籍地址');
    $objActSheet->setCellValue('H1','住址');
    $objActSheet->setCellValue('I1','申请人手机号');
    $objActSheet->setCellValue('J1','关系人姓名');
    $objActSheet->setCellValue('K1','关系');
    $objActSheet->setCellValue('L1','关系人电话');
    $objActSheet->setCellValue('M1','关系人单位');
    $objActSheet->setCellValue('N1','关系人职位');
    $objActSheet->setCellValue('O1','关系人详细地址');
    $objActSheet->setCellValue('P1','产品类型');
    $objActSheet->setCellValue('Q1','签约金额');
    $objActSheet->setCellValue('R1','还款期数');
    $objActSheet->setCellValue('S1','月还款金额');
    $objActSheet->setCellValue('T1','每月还款日期');
    $objActSheet->setCellValue('U1','签约日期');
    $objActSheet->setCellValue('V1','放款日期');
    $objActSheet->setCellValue('W1','还款起始日期');
    $objActSheet->setCellValue('X1','还款过期日期');
    $objActSheet->setCellValue('Y1','剩余本金');
    $objActSheet->setCellValue('Z1','委案金额');
    $objActSheet->setCellValue('AA1','本金拖欠开始日期');
    $objActSheet->setCellValue('AB1','开户银行名');
    $objActSheet->setCellValue('AC1','账户名');
    $objActSheet->setCellValue('AD1','银行卡号');
    $objActSheet->setCellValue('AE1','客户手机号');
    $objActSheet->setCellValue('AF1','还款期数');
    $objActSheet->setCellValue('AG1','已还期数');
    $objActSheet->setCellValue('AH1','未还期数');
    $objActSheet->setCellValue('AI1','M值');
    $objActSheet->setCellValue('AJ1','是否重点关注');
    $objActSheet->setCellValue('AK1','区域主管');
    $objActSheet->setCellValue('AL1','区域组长');
    $objActSheet->setCellValue('AM1','案件进展');

    if($result = $GLOBALS['$conn']->query($sql)) {
        if ($result->num_rows > 0) {
            $i=2;
            while ($row = $result->fetch_assoc()) {



                $objActSheet->setCellValue('A'.$i, $row['customer_name']);
                $objActSheet->setCellValueExplicit('B'.$i,$row['id_num']);
                $objActSheet->setCellValue('C'.$i, $row['work_company']);
                $objActSheet->setCellValue('D'.$i, $row['work_addr']);
                $objActSheet->setCellValueExplicit('E'.$i, $row['work_telephone']);
                $objActSheet->setCellValue('F'.$i, $row['work_duty']);
                $objActSheet->setCellValue('G'.$i, $row['household_addr']);
                $objActSheet->setCellValue('H'.$i, $row['home_addr']);
                $objActSheet->setCellValueExplicit('I'.$i, $row['applyer_phone']);
                $objActSheet->setCellValue('J'.$i,$row['relation_name']);
                $objActSheet->setCellValue('K'.$i, $row['relationship']);
                $objActSheet->setCellValueExplicit('L'.$i, $row['relation_phone']);
                $objActSheet->setCellValue('M'.$i, $row['relation_company']);
                $objActSheet->setCellValue('N'.$i, $row['relation_duty']);
                $objActSheet->setCellValue('O'.$i,$row['relation_addr']);
                $objActSheet->setCellValue('P'.$i,$row['product_type']);
                $objActSheet->setCellValueExplicit('Q'.$i,$row['sign_money']);
                $objActSheet->setCellValue('R'.$i,$row['repay_sum_period']);
                $objActSheet->setCellValue('S'.$i,$row['repay_month']);
                $objActSheet->setCellValue('T'.$i,$row['repay_date']);
                $objActSheet->setCellValue('U'.$i,$row['sign_date']);
                $objActSheet->setCellValue('V'.$i,$row['loan_date']);
                $objActSheet->setCellValue('W'.$i,$row['repay_start_date']);
                $objActSheet->setCellValue('X'.$i, $row['repay_expire_date']);
                $objActSheet->setCellValue('Y'.$i,$row['remain_capital']);
                $objActSheet->setCellValue('Z'.$i,$row['case_money']);
                $objActSheet->setCellValue('AA'.$i,$row['capital_delay_start_date']);
                $objActSheet->setCellValue('AB'.$i,$row['bank_name']);
                $objActSheet->setCellValue('AC'.$i, $row['account_name']);
                $objActSheet->setCellValueExplicit('AD'.$i,$row['bank_card_num']);
                $objActSheet->setCellValueExplicit('AE'.$i,$row['customer_phone']);
                $objActSheet->setCellValue('AF'.$i,$row['repay_sum_period_2']);
                $objActSheet->setCellValue('AG'.$i,$row['repay_already_period']);
                $objActSheet->setCellValue('AH'.$i,$row['repay_not_period']);
                $objActSheet->setCellValue('AI'.$i,$row['m_value']);
                $objActSheet->setCellValue('AJ'.$i,$row['important']);
                $objActSheet->setCellValue('AK'.$i,$row['director']);
                $objActSheet->setCellValue('AL'.$i,$row['leader']);
                $status=$row['status'];
                $objActSheet->setCellValue('AM'.$i,getStatus($status));

                $relation_id=$row['id'];
                $sql2 = "SELECT * FROM `relation` WHERE customer_id =".$relation_id;
                $result2 = $GLOBALS['$conn']->query($sql2);
                $relation_num=$result2->num_rows;
                $objActSheet->mergeCells('A'.$i.':A'.($i+$relation_num));
                $objActSheet->mergeCells('B'.$i.':B'.($i+$relation_num));
                $objActSheet->mergeCells('C'.$i.':C'.($i+$relation_num));
                $objActSheet->mergeCells('D'.$i.':D'.($i+$relation_num));
                $objActSheet->mergeCells('E'.$i.':E'.($i+$relation_num));
                $objActSheet->mergeCells('F'.$i.':F'.($i+$relation_num));
                $objActSheet->mergeCells('G'.$i.':G'.($i+$relation_num));
                $objActSheet->mergeCells('H'.$i.':H'.($i+$relation_num));
                $objActSheet->mergeCells('I'.$i.':I'.($i+$relation_num));
                $objActSheet->mergeCells('P'.$i.':P'.($i+$relation_num));
                $objActSheet->mergeCells('Q'.$i.':Q'.($i+$relation_num));
                $objActSheet->mergeCells('R'.$i.':R'.($i+$relation_num));
                $objActSheet->mergeCells('S'.$i.':S'.($i+$relation_num));
                $objActSheet->mergeCells('T'.$i.':T'.($i+$relation_num));
                $objActSheet->mergeCells('U'.$i.':U'.($i+$relation_num));
                $objActSheet->mergeCells('V'.$i.':V'.($i+$relation_num));
                $objActSheet->mergeCells('W'.$i.':W'.($i+$relation_num));
                $objActSheet->mergeCells('X'.$i.':X'.($i+$relation_num));
                $objActSheet->mergeCells('Y'.$i.':Y'.($i+$relation_num));
                $objActSheet->mergeCells('Z'.$i.':Z'.($i+$relation_num));
                $objActSheet->mergeCells('AA'.$i.':AA'.($i+$relation_num));
                $objActSheet->mergeCells('AB'.$i.':AB'.($i+$relation_num));
                $objActSheet->mergeCells('AC'.$i.':AC'.($i+$relation_num));
                $objActSheet->mergeCells('AD'.$i.':AD'.($i+$relation_num));
                $objActSheet->mergeCells('AE'.$i.':AE'.($i+$relation_num));
                $objActSheet->mergeCells('AF'.$i.':AF'.($i+$relation_num));
                $objActSheet->mergeCells('AG'.$i.':AG'.($i+$relation_num));
                $objActSheet->mergeCells('AH'.$i.':AH'.($i+$relation_num));
                $objActSheet->mergeCells('AI'.$i.':AI'.($i+$relation_num));
                $objActSheet->mergeCells('AJ'.$i.':AJ'.($i+$relation_num));
                $objActSheet->mergeCells('AK'.$i.':AK'.($i+$relation_num));
                $objActSheet->mergeCells('AL'.$i.':AL'.($i+$relation_num));
                $objActSheet->mergeCells('AM'.$i.':AM'.($i+$relation_num));
                $j=$i+1;
                while ($row2 = $result2->fetch_assoc()) {
                    $objActSheet->setCellValue('J'.$j,$row2['relation_name']);
                    $objActSheet->setCellValue('K'.$j, $row2['relationship']);
                    $objActSheet->setCellValueExplicit('L'.$j, $row2['relation_phone']);
                    $objActSheet->setCellValue('M'.$j, $row2['relation_company']);
                    $objActSheet->setCellValue('N'.$j, $row2['relation_duty']);
                    $objActSheet->setCellValue('O'.$j,$row2['relation_addr']);
                    $j++;
                }
                $i=$i+$relation_num+1;
            }
            $outputFileName=dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'downloads' . DIRECTORY_SEPARATOR . 'output.xls';
            $objWriter->save($outputFileName);
            $array = array(
                "msg" => "success",
                "url"=>"downloads/output.xls",
            );
            echo json_encode($array,JSON_UNESCAPED_UNICODE);

        } else {
            $array = array(
                "msg" => "error",
                "url"=>"",
            );
            echo json_encode($array, JSON_UNESCAPED_UNICODE);
        }
    }
    else
        {
            echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
        }

}
function getStatus($status)
{
    $status_show='未分配';
    switch ($status)
    {
        case 'wait_assign':
            $status_show="等待分配";
            break;
        case 'fin_assign':
            $status_show="已分配到下属";
            break;
        case 'case_close':
            $status_show="案件强制关闭";
            break;
        case 'tel_collection':
            $status_show="电话催收中";
            break;
        case 'visit_collection_wait':
            $status_show="等待外访";
            break;
        case 'visit_collection_process':
            $status_show="正在外访中";
            break;
        case 'case_finish':
            $status_show="催收完成";
            break;

    }
    return $status_show;
}
function distribution()
{
    $param_director=$_POST['zone_excute'];
    $param_leader=$_POST['leader'];
    $param_ids=$_POST['sels'];
    if (empty ($param_ids))
    {
        $array = array(
            "msg" => "error",
            "info"=>"id不能为空"
        );
        echo json_encode($array);
        die(0);
    }
    //没收数据和不存在主管但是组长存在的情况
    $auth=$_SESSION["auth"] ;
    if((empty($param_director) && empty($param_leader)) || ($auth==0 && empty($param_director)) || ($auth==1 && empty($param_leader)))
    {
        $array = array(
            "msg" => "error",
            "info"=>" 未选择分配主管或组长"
        );
        echo json_encode($array);
        die(0);
    }

if($auth==0 && !empty($param_director))
{
    $sql_join=" director='".$param_director."', status='fin_assign'";
} else
if($auth==1 && !empty($param_leader)){
    $real_name=$_SESSION["realName"];
    $area=$_SESSION["area"];
    $director=$area."->".$real_name;
    $sql_join=" director='".$director."' , leader='".$param_leader."', "."status='fin_assign'";
}
else
{
    $array = array(
        "msg" => "error",
        "info"=>" 非法请求"
    );
    echo json_encode($array);
    die(0);
}
    $sql_1 = "UPDATE `total` SET ";
    $sql_2=" WHERE id IN (".$param_ids.")";
    $sql=$sql_1.$sql_join.$sql_2;
    if ($GLOBALS['$conn']->query($sql))
    {
        $array = array(
            "msg" => "success",
        );
        echo json_encode($array);
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
    }


}

function  request_case_assign()
{
    $auth=$_SESSION["auth"] ;
    if($auth==0)//超级管理员都可以看得到
    {
        query_by_status('wait_assign');
    }
    if($auth==1)//主管只可以看得到自己的未分配的
    {
        request_region_wait();
    }

}


function query_exist()
{

        $sql = "SELECT COUNT(*) AS count FROM `total` WHERE ";
        $query_param_batch=$_POST['status'];
        $query_param_name=$_POST['name'];
        //$query_param_ID=$_POST['page'];
    if(empty($query_param_batch) && empty($query_param_name) && empty($query_param_ID))
    {
        $array = array(
            "msg" => "error",
        );
        echo json_encode($array);
        die(0);
    }
    if(!empty($query_param_batch))
    {
        $sql.="status='".$query_param_batch."' AND ";
    }
    if(!empty($query_param_name))
    {
        $sql.="name='".$query_param_name."' AND ";
    }
    if(!empty($query_param_ID))
    {
        $sql.="id_num='".$query_param_ID."' AND ";
    }
        $sql.=" 1=1 ";
        $result = $GLOBALS['$conn']->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $count = $row['count'];
        if($count>0)
        {
            $array = array(
                "msg" => "success",
            );
            echo json_encode($array);
        }
        else
        {
            $array = array(
                "msg" => "error",
            );
            echo json_encode($array);
        }
}
function query_list()
{
    $page = $_POST['page'];
    $limit = $_POST['rows'];
    $sidx = $_POST['sidx'];
    $sord = $_POST['sord'];
    if (!$sidx)
        $sidx = 1;

    $sql = "SELECT COUNT(*) AS count FROM `total` WHERE ";
    $sql_add=" ";
    $query_param_batch=$_POST['status'];
    $query_param_name=$_POST['name'];
    //$query_param_ID=$_POST['page'];
    if(empty($query_param_batch) && empty($query_param_name) && empty($query_param_ID))
    {
        echo json_encode("error");
        die(0);
    }
    if(!empty($query_param_batch))
    {
        $sql_add.="status='".$query_param_batch."' AND ";
    }
    if(!empty($query_param_name))
    {
        $sql_add.="name='".$query_param_name."' AND ";
    }
    if(!empty($query_param_ID))
    {
        $sql_add.="id_num='".$query_param_ID."' AND ";
    }
    $sql_add.=" 1=1 ";
    $sql.=$sql_add;
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

    $sql = "SELECT * FROM `total` WHERE".$sql_add."ORDER BY $sidx $sord LIMIT $start , $limit";
    if($result = $GLOBALS['$conn']->query($sql))
    {
        if ($result->num_rows > 0)
        {
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                $responce->rows[$i]['id'] = $row['id'];
                $responce->rows[$i]['cell'] = array (
                    $row['customer_name'],
                    $row['id_num'],
                    $row['work_company'],
                    $row['work_addr'],
                    $row['work_telephone'],
                    $row['work_duty'],
                    $row['household_addr'],
                    $row['home_addr'],
                    $row['applyer_phone'],
                    $row['relation_name'],
                    $row['relationship'],
                    $row['relation_phone'],
                    $row['relation_company'],
                    $row['relation_duty'],
                    $row['relation_addr'],
                    $row['product_type'],
                    $row['sign_money'],
                    $row['repay_sum_period'],
                    $row['repay_month'],
                    $row['repay_date'],
                    $row['sign_date'],
                    $row['loan_date'],
                    $row['repay_start_date'],
                    $row['repay_expire_date'],
                    $row['remain_capital'],
                    $row['case_money'],
                    $row['capital_delay_start_date'],
                    $row['bank_name'],
                    $row['account_name'],
                    $row['bank_card_num'],
                    $row['customer_phone'],
                    $row['repay_sum_period_2'],
                    $row['repay_already_period'],
                    $row['repay_not_period'],
                    $row['m_value'],
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


function  query_by_status($data_status){
  $page = $_POST['page'];  
  $limit = $_POST['rows']; 
  $sidx = $_POST['sidx'];
  $sord = $_POST['sord'];
   if (!$sidx) 
  $sidx = 1; 
  // echo json_encode($sord);
  $sql = "SELECT COUNT(*) AS count FROM `total` WHERE  status = '".$data_status."'";
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

  $sql = "SELECT * FROM `total` WHERE  status = '".$data_status."' ORDER BY $sidx $sord LIMIT $start , $limit";
  if($result = $GLOBALS['$conn']->query($sql))
  {
    if ($result->num_rows > 0)
     {
      $i = 0;
      while($row = $result->fetch_assoc()) 
      {
        $responce->rows[$i]['id'] = $row['id'];
        $responce->rows[$i]['cell'] = array (
            $row['customer_name'],
            $row['id_num'],
            $row['work_company'],
            $row['work_addr'],
            $row['work_telephone'],
            $row['work_duty'],
            $row['household_addr'],
            $row['home_addr'],
            $row['applyer_phone'],
            $row['relation_name'],
            $row['relationship'],
            $row['relation_phone'],
            $row['relation_company'],
            $row['relation_duty'],
            $row['relation_addr'],
            $row['product_type'],
            $row['sign_money'],
            $row['repay_sum_period'],
            $row['repay_month'],
            $row['repay_date'],
            $row['sign_date'],
            $row['loan_date'],
            $row['repay_start_date'],
            $row['repay_expire_date'],
            $row['remain_capital'],
            $row['case_money'],
            $row['capital_delay_start_date'],
            $row['bank_name'],
            $row['account_name'],
            $row['bank_card_num'],
            $row['customer_phone'],
            $row['repay_sum_period_2'],
            $row['repay_already_period'],
            $row['repay_not_period'],
            $row['m_value'],
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
function handle_fileupload()
{
  $dir = "./uploads";
   $dh=opendir($dir);
   while($file=readdir($dh))
   {
    if($file!="." && $file!="..")
    {
      $fullpath=$dir."/".$file;
       unlink($fullpath);
    }
   }
if ( !empty( $_FILES ) ) {
	$_files = $_FILES;
	if (($_files["file"]["type"] == "application/vnd.ms-excel"))
  	{
  		if ($_files["file"]["error"] > 0)
    	{
    		echo "error: " . $_files["file"]["error"] . "";
    	}
  		else
   		{
   			$tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
            $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'case_in.xls';
    		move_uploaded_file( $tempPath, $uploadPath );
    		echo "upload: " . $_files["file"]["name"] . "";
    		echo "type: " . $_files["file"]["type"] . "";
    		echo "size: " . ($_files["file"]["size"] / 1024) . " kb";
    		echo "stored in: " . $uploadPath;
    	}
   }
	else
   {
  	echo "invalid file";
   }
}
}

function isBlank($name,$id_num,$phone)
{
    if(empty($name)&&empty($id_num)&&empty($phone))
        return true;

    return false;
}

function excelTime($date, $time=false){
    if(is_numeric($date)){
        $jd = GregorianToJD(1, 1, 1970);
        $gregorian = JDToGregorian($jd+intval($date)-25569);
        $date = explode('/',$gregorian);
        $date_str = str_pad($date[2],4,'0', STR_PAD_LEFT)
            ."-".str_pad($date[0],2,'0', STR_PAD_LEFT)
            ."-".str_pad($date[1],2,'0', STR_PAD_LEFT)
            .($time?" 00:00:00":'');
        return $date_str;
    }
    return $date;
}
function request_file()
{
    $auth=$_SESSION["auth"] ;
    if($auth!=0)
    {
        $array = array(
            "msg" => "error",
            "info"=>"只有管理员才能导入",
        );
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
        die();
    }

    $inputFileName = './uploads/case_in.xls';
    if(file_exists($inputFileName))
    {
        $str = "";
        $lastNewId =-1;
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        $objPHPExcel->getActiveSheet()->removeRow(1);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

        for ($row = 1; $row <= $highestRow; ++$row) {
            for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                $valueInCell=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                if($col==19 || $col==20 || $col==21 || $col==22 || $col==23 || $col==26)//日期
                {
                        if(is_numeric($valueInCell))
                         $valueInCell=excelTime((int)$valueInCell);
                }
                $str .= htmlspecialchars(stripslashes(trim($valueInCell))) . '<##>';
            }
            $strs = explode("<##>", $str);
            if(!isBlank($strs[0],$strs[1],$strs[30])) {
                $sql = "INSERT INTO `total`(`customer_name`,
                                        `id_num`,
                                        `work_company`,
                                        `work_addr`,
                                        `work_telephone`,
                                        `work_duty`,
                                        `household_addr`,
                                        `home_addr`,
                                        `applyer_phone`,
                                        `relation_name`,
                                        `relationship`,
                                        `relation_phone`,
                                        `relation_company`,
                                        `relation_duty`,
                                        `relation_addr`,
                                        `product_type`,
                                        `sign_money`,
                                        `repay_sum_period`,
                                        `repay_month`,
                                        `repay_date`,
                                        `sign_date`,
                                        `loan_date`,
                                        `repay_start_date`,
                                        `repay_expire_date`,
                                        `remain_capital`,
                                        `case_money`,
                                        `capital_delay_start_date`,
                                        `bank_name`,
                                        `account_name`,
                                        `bank_card_num`,
                                        `customer_phone`,
                                        `repay_sum_period_2`,
                                        `repay_already_period`,
                                        `repay_not_period`,
                                        `m_value`,
                                        `status`)
                                VALUES ('$strs[0]',
                                        '$strs[1]',
                                        '$strs[2]',
                                        '$strs[3]',
                                        '$strs[4]',
                                        '$strs[5]',
                                        '$strs[6]',
                                        '$strs[7]',
                                        '$strs[8]',
                                        '$strs[9]',
                                        '$strs[10]',
                                        '$strs[11]',
                                        '$strs[12]',
                                        '$strs[13]',
                                        '$strs[14]',
                                        '$strs[15]',
                                        '$strs[16]',
                                        '$strs[17]',
                                        '$strs[18]',
                                        '$strs[19]',
                                        '$strs[20]',
                                        '$strs[21]',
                                        '$strs[22]',
                                        '$strs[23]',
                                        '$strs[24]',
                                        '$strs[25]',
                                        '$strs[26]',
                                        '$strs[27]',
                                        '$strs[28]',
                                        '$strs[29]',
                                        '$strs[30]',
                                        '$strs[31]',
                                        '$strs[32]',
                                        '$strs[33]',
                                        '$strs[34]',
                                        'case_in')";
                if ($GLOBALS['$conn']->query($sql)) {
                    $lastNewId = $GLOBALS['$conn']->insert_id;
                } else {
                    echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
                }

            }
            else
            {

                $sql = "INSERT INTO `relation`(`customer_id`,
                                        `relation_name`,
                                        `relationship`,
                                        `relation_phone`,
                                        `relation_company`,
                                        `relation_duty`,
                                        `relation_addr`)
                                VALUES ($lastNewId,
                                        '$strs[9]',
                                        '$strs[10]',
                                        '$strs[11]',
                                        '$strs[12]',
                                        '$strs[13]',
                                        '$strs[14]'
                                        )";
                if ($GLOBALS['$conn']->query($sql)) {

                } else {
                    echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
                }
            }

            $str = "";
        }
        unlink($inputFileName);

    }
    query_by_status("case_in");

}
function del_row(){
  $ids = $_POST['sels'];
  if (empty ($ids)) 
  {
     die("0");
  }     
  $ids_str = join(',', $ids); 
  $sql = "DELETE FROM `total` WHERE id IN ($ids_str)";
  $sql2 = "DELETE FROM `relation` WHERE customer_id IN ($ids_str)";
if($GLOBALS['$conn']->query($sql) && $GLOBALS['$conn']->query($sql2))
  {
   echo json_encode("success");

  }
  else
  {
    echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
  }

}
function check_fin(){
  $ids = $_POST['sels'];
  $ids_str = join(',', $ids);
  if (empty ($ids)) 
  {
     die("0");
  }  
$sql = "UPDATE `total` SET `status`='wait_assign' WHERE id IN ($ids_str)";
if($GLOBALS['$conn']->query($sql))
{
echo json_encode("success");
}
else
{
   echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
 }
}
?>