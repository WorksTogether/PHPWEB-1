
<table id="table_id" >
    <?php
    /**
     * Created by PhpStorm.
     * User: ks
     * Date: 2016/4/21
     * Time: 21:26
     */
    require_once 'globalSettings.php';
    require_once 'CreditCardCase.php';
    require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
    error_reporting(E_ALL);
    date_default_timezone_set('Asia/ShangHai');
    /** PHPExcel_IOFactory */
    $filename="test.xls";
    if (!file_exists("test.xls")) {
        exit("not found test.xls.\n");
    }
    echo '<p>TEST PHPExcel 1.8.0: read xlsx file</p>';
    $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
    $objPHPExcel = $objReader->load($filename);

    $objWorksheet = $objPHPExcel->getActiveSheet();

//    $highestRow = $objWorksheet->getHighestRow(); // 取得总行数
//    $highestColumm =$highestColumm= PHPExcel_Cell::columnIndexFromString( $objWorksheet->getHighestColumn()); // 取得总列数
//    echo  $highestRow,$highestColumm;/** 循环读取每个单元格的数据 */
//    for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
//        for ($column = 0; $column < $highestColumm; $column++) {//列数是以第0列开始
//            $columnName = PHPExcel_Cell::stringFromColumnIndex($column);
//            echo $columnName.$row.":".$objWorksheet->getCellByColumnAndRow($column, $row)->getValue()."<br />";
//        }
//    }


    $totalArray=array();
    $subArray=array();

    $i = 0;
    foreach($objWorksheet->getRowIterator() as $row){
        ?>
        <tr >
            <?php
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            if( $i == 0 ){
                echo '<thead>';
            }
            foreach($cellIterator as $cell){

                array_push($subArray,urlencode(iconv("utf-8",$showCoding,$cell->getValue())));
                echo '<td  style="text-align: center;border:1px solid #f00;width: 100px;; height: auto">' .iconv('utf-8',$showCoding,  $cell->getValue()) . '</td>';

            }
            if( $i == 0 ){
                echo '</thead>';
            }
            $i++;
            //array_push($totalArray,$subArray);
            $cardCase=new \nankai\CreditCardCase();
            $subArray
            $subArray=array();
            ?>
        </tr>
        <?php
    }
    $cardCase=new \nankai\CreditCardCase();
    echo urldecode(json_encode($totalArray));
    echo json_encode($cardCase);
    ?>
</table>

