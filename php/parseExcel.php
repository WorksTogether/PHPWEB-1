<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 2016/4/21
 * Time: 21:26
 */
/*
error_reporting(E_ALL);

date_default_timezone_set('Asia/ShangHai');
*/
/** PHPExcel_IOFactory */
//require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

/*
// Check prerequisites
if (!file_exists("test.xls")) {
    exit("not found test.xls.\n");
}

$reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
$PHPExcel = $reader->load("test.xls"); // 载入excel文件
$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
$highestRow = $sheet->getHighestRow(); // 取得总行数
$highestColumm = $sheet->getHighestColumn(); // 取得总列数

echo $highestRow,$highestColumm ;
echo "</br>";*/
/** 循环读取每个单元格的数据 */
/*
for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
    for ($column = 'A'; $column <= $highestColumm; $column++) {//列数是以A列开始
        $dataset[] = $sheet->getCell($column.$row)->getValue();
        echo $column.$row.":".$sheet->getCell($column.$row)->getValue()."<br />";
    }
}*/
?>
<table id="table_id" >
    <?php
    require_once 'globalSettings.php';
    error_reporting(E_ALL);

    date_default_timezone_set('Asia/ShangHai');
    /** PHPExcel_IOFactory */
    require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
    $filename="test.xls";
    if (!file_exists("test.xls")) {
        exit("not found test.xls.\n");
    }
    echo '<p>TEST PHPExcel 1.8.0: read xlsx file</p>';
    $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
    $objPHPExcel = $objReader->load($filename);

    $objWorksheet = $objPHPExcel->getActiveSheet();
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

                echo '<td  style="text-align: center;border:1px solid #f00;width: 100px;; height: auto">' .iconv('utf-8',$showCoding,  $cell->getValue()) . '</td>';

            }
            if( $i == 0 ){
                echo '</thead>';
            }
            $i++;
            ?>
        </tr>
        <?php
    }
    ?>
</table>
