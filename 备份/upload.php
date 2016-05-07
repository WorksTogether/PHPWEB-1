<?php

// if ( !empty( $_FILES ) ) {

//     $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
//     $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];

//     move_uploaded_file( $tempPath, $uploadPath );

//     $answer = array( 'answer' => 'File transfer completed' );
//     $json = json_encode( $answer );

//     echo $json;

// } else {

//     echo 'No files';

// }
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
// $action = $_GET['action']; 
// switch ($action) {
//   case 'noreFresh':
//     break;
  
//   default:
//     break;
// }
?>