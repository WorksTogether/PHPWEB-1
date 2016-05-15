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
    die(0);
}
$action = $_GET['action'];
switch ($action) {
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
case 'case_close':
    case_close();
    break;
case 'list':
    case_list();
    break;
case 'request_region_wait':
    query_by_status('fin_assign');
    break;
  default:
    # code...
    break;
};

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
        echo json_encode($result->fetch_assoc());
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
    //query_by_status('fin_assign');
    //query_by_status("fin_assign' or status='wait_assign");
    query_by_status("'or '1'='1 ");//查询全部
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

    //填写表头
    $objActSheet->setCellValue('A1','持卡人姓名');
    $objActSheet->setCellValue('B1','性别');
    $objActSheet->setCellValue('C1','证件号码');
    $objActSheet->setCellValue('D1','人民币账号');
    $objActSheet->setCellValue('E1','美元账号');
    $objActSheet->setCellValue('F1','开卡日期');
    $objActSheet->setCellValue('G1','额度');
    $objActSheet->setCellValue('H1','账单日期');
    $objActSheet->setCellValue('I1','余额人民币');
    $objActSheet->setCellValue('J1','金额人民币');
    $objActSheet->setCellValue('K1','委托金额美元');
    $objActSheet->setCellValue('L1','还款日期');
    $objActSheet->setCellValue('M1','美元还款');
    $objActSheet->setCellValue('N1','人民币还款');
    $objActSheet->setCellValue('O1','区域主管');
    $objActSheet->setCellValue('P1','区域组长');

    if($result = $GLOBALS['$conn']->query($sql)) {
        if ($result->num_rows > 0) {
            $i=2;
            while ($row = $result->fetch_assoc()) {


                $objActSheet->setCellValue('A'.$i,$row['name']);
                $objActSheet->setCellValue('B'.$i,$row['sex']);
                $objActSheet->setCellValue('C'.$i,$row['id_num']);
                $objActSheet->setCellValue('D'.$i,$row['rmb_account']);
                $objActSheet->setCellValue('E'.$i,$row['us_account']);
                $objActSheet->setCellValue('F'.$i, $row['open_date']);
                $objActSheet->setCellValue('G'.$i,$row['credit_limit']);
                $objActSheet->setCellValue('H'.$i,$row['bill_date']);
                $objActSheet->setCellValue('I'.$i,$row['remain_rmb']);
                $objActSheet->setCellValue('J'.$i,$row['sum_rmb']);
                $objActSheet->setCellValue('K'.$i,$row['delegate_money']);
                $objActSheet->setCellValue('L'.$i, $row['payment_date']);
                $objActSheet->setCellValue('M'.$i, $row['us_payment']);
                $objActSheet->setCellValue('N'.$i, $row['rmb_payment']);
                $objActSheet->setCellValue('O'.$i,$row['director']);
                $objActSheet->setCellValue('P'.$i,$row['leader']);
                $i++;
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
function request_case_detail()
{
    query_by_status('fin_assign');
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
        );
        echo json_encode($array);
        die(0);
    }
    //没收数据和不存在主管但是组长存在的情况
    if((empty($param_director) && empty($param_leader)|| (empty($param_director) && !empty($param_leader))))
    {
        $array = array(
            "msg" => "error",
        );
        echo json_encode($array);
        die(0);
    }
    $sql_1 = "UPDATE `total` SET ";
    $sql_2="WHERE id IN (".$param_ids.")";

    $sql_join=" director='".$param_director."' , leader='".$param_leader."', "."status='fin_assign'";
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
    query_by_status('wait_assign');
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
                    $row['name'],
                    $row['sex'],
                    $row['id_num'],
                    $row['card_num'],
                    $row['rmb_account'],
                    $row['us_account'],
                    $row['open_date'],
                    $row['credit_limit'],
                    $row['bill_date'],
                    $row['remain_rmb'],
                    $row['sum_rmb'],
                    $row['delegate_money'],
                    $row['payment_date'],
                    $row['us_payment'],
                    $row['rmb_payment'],
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
  $sql = "SELECT COUNT(*) AS count FROM `total` WHERE status = '".$data_status."'";
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

  $sql = "SELECT * FROM `total` WHERE status = '".$data_status."' ORDER BY $sidx $sord LIMIT $start , $limit";
  if($result = $GLOBALS['$conn']->query($sql))
  {
    if ($result->num_rows > 0)
     {
      $i = 0;
      while($row = $result->fetch_assoc()) 
      {
        $responce->rows[$i]['id'] = $row['id'];
        $responce->rows[$i]['cell'] = array (
            $row['name'],
            $row['sex'],
            $row['id_num'],
            $row['card_num'],
            $row['rmb_account'],
            $row['us_account'],
            $row['open_date'],
            $row['credit_limit'],
            $row['bill_date'],
            $row['remain_rmb'],
            $row['sum_rmb'],
            $row['delegate_money'],
            $row['payment_date'],
            $row['us_payment'],
            $row['rmb_payment'],
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
function request_file()
{
    $inputFileName = './uploads/case_in.xls';
    if(file_exists($inputFileName))
    {
        $str = "";
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        $objPHPExcel->getActiveSheet()->removeRow(1);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

        for ($row = 1; $row <= $highestRow; ++$row) {
            for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                $str .= htmlspecialchars(stripslashes(trim($objWorksheet->getCellByColumnAndRow($col, $row)->getValue()))) . '\\';
            }
            $strs = explode("\\", $str);
            $sql = "INSERT INTO `total`(`name`,
                                        `sex`,
                                        `id_num`,
                                        `card_num`,
                                        `rmb_account`,
                                        `us_account`,
                                        `open_date`,
                                        `credit_limit`,
                                        `bill_date`,
                                        `remain_rmb`,
                                        `sum_rmb`,
                                        `delegate_money`,
                                        `payment_date`,
                                        `us_payment`,
                                        `rmb_payment`,
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
                                        'case_in')";
            if ($GLOBALS['$conn']->query($sql)) {

            } else {
                echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
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
if($GLOBALS['$conn']->query($sql))
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