<?php

error_reporting(E_ERROR);
set_time_limit(0);

date_default_timezone_set('Europe/London');
include 'connect.php';
include 'PHPExcel/IOFactory.php';

$uploadfile_path = "";
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
    first_refresh();
  break;
  case 'query_1':
      query_exist();
  break;
  case 'query_2':
      query_list();
  break;
  case 'query_2':
      distribution();
  break;
  default:
    # code...
    break;
};

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
                    $row['id'],
                    $row['name'],
                    $row['sex'],
                    $row['status'],
                    $row['batch_num'],
                    $row['id_num'],
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


function  first_refresh(){
  $page = $_POST['page'];  
  $limit = $_POST['rows']; 
  $sidx = $_POST['sidx'];
  $sord = $_POST['sord'];
   if (!$sidx) 
  $sidx = 1; 
  // echo json_encode($sord);
  $sql = "SELECT COUNT(*) AS count FROM `total` WHERE status = 'case_in'";
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

  $sql = "SELECT * FROM `total` WHERE status = 'case_in' ORDER BY $sidx $sord LIMIT $start , $limit";
  if($result = $GLOBALS['$conn']->query($sql))
  {
    if ($result->num_rows > 0)
     {
      $i = 0;
      while($row = $result->fetch_assoc()) 
      {
        $responce->rows[$i]['id'] = $row['id'];
        $responce->rows[$i]['cell'] = array ( 
                $row['id'],
                $row['name'], 
                $row['sex'], 
                $row['status'], 
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
            $sql = "INSERT INTO `total`(`name`, `sex`,`status`) VALUES ('$strs[0]','$strs[1]','case_in')";
            if ($GLOBALS['$conn']->query($sql)) {

            } else {
                echo "Error: " . $sql . "<br>" . $GLOBALS['$conn']->error;
            }
            $str = "";
        }
        unlink($inputFileName);

    }
    first_refresh();

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