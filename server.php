<?php

error_reporting(E_ALL);
set_time_limit(0);

date_default_timezone_set('Europe/London');

include 'PHPExcel/IOFactory.php';


// $inputFileName = './sampleData/example1.xls';
// $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
// $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
// $output["page"] = 1;
// $output["total"] = 1;
// $output["records"] = 1;
// foreach ($sheetData as $key => $value) {
// 	$output["rows"][$key-1]["id"] = $key-1;
// 	$output["rows"][$key-1]["cell"] = $value;
// };
// $output = '';
// echo json_encode($output, JSON_UNESCAPED_UNICODE);
$uploadfile_path = "";
// $file_name = "";
$GLOBALS['file_name'] = "";
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
		request_file($GLOBALS['file_name']);
  break;
  default:
    # code...
    break;
};
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
    		$uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];
    		$uploadfile_path = $uploadPath;
    		$GLOBALS['file_name'] = $_files["file"]["name"];
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
function request_file($filename){
// $inputFileName = "./uploads/" . $_FILES["file"]["name"];
$inputFileName = './uploads/example1.xls';
// $excel_obj = new PHPExcel();
// $objWriter = new PHPExcel_Writer_Excel5($excel_obj);
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$objPHPExcel->getActiveSheet()->removeRow(1);
// $objWriter->save($inputFileName);  
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$output["page"] = 1;
$output["total"] = 1;
$output["records"] = 1;
foreach ($sheetData as $key => $value) {
	$output["rows"][$key-1]["id"] = $key-1;
	$output["rows"][$key-1]["cell"] = $value;
};
// $output = '';
echo json_encode($output, JSON_UNESCAPED_UNICODE);
}
?>