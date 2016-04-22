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

    //文件上传
    if (!empty ( $_FILES [$creditCardCaseFile] ['name']))
    {
        $tmp_file = $_FILES [$creditCardCaseFile] ['tmp_name'];
        $file_types = explode ( ".", $_FILES [$creditCardCaseFile]['name'] );
        $file_type = $file_types [count ( $file_types ) - 1];
        /*判别是不是.xls文件，判别是不是excel文件*/
        if (strtolower ( $file_type ) !="xls" && strtolower ( $file_type ) !="xlsx")
        {
            exit( iconv("utf-8",$showCoding,'不是Excel文件，重新上传' ));
        }
        /*设置上传路径*/
        $savePath = SITE_PATH.'upload/Excel/';
        /*以时间来命名上传的文件*/
        $str = date ( 'Ymdhis' );
        $file_name_upload = $str . "." . $file_type;
        /*是否上传成功*/
        if (! copy ( $tmp_file, $savePath . $file_name_upload ))
        {
            exit( iconv("utf-8",$showCoding,'上传失败' ));
        }
    }
    else
    {
        exit(iconv("utf-8",$showCoding,"文件上传不能为空"));
    }


    /** PHPExcel_IOFactory */
    $fileName=$savePath . $file_name_upload;
    if (!file_exists($fileName)) {
        exit("file not found \n");
    }
   // echo '<p>TEST PHPExcel 1.8.0: read xlsx file</p>';
    $objReader = PHPExcel_IOFactory::createReaderForFile($fileName);
    $objPHPExcel = $objReader->load($fileName);
    $objWorksheet = $objPHPExcel->getActiveSheet();
    $totalArrayStorage=array();
    $skip=0;
    foreach($objWorksheet->getRowIterator() as $row){
        //去掉标题行
        if($skip==0) {$skip=1;continue;}
            $subArray=array();
            $cardCase=new \nankai\CreditCardCase();
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            foreach($cellIterator as $cell){
                $subArray[]=urlencode($cell->getValue());
            }
            $cardCase->setContent($subArray);
            array_push($totalArrayStorage,$cardCase);

    }

    //插入数据库
    try {
         $dbh = new PDO('mysql:host=localhost;dbname=kl_cms', "root", "nankai");
         $dbh->exec("SET CHARACTER SET UTF8");
        foreach ($totalArrayStorage as $objCardCase) {
            $sqlStr = "INSERT INTO credit_card_case (ID,cardHolderName,gender,IDNumber,cardNumber,RMBAccount,USAccount," .
                "cardDate,quota,statementDate,totalCommissionBalanceRMB,commissionAmountRMB,commissionAmountUS,recentRMBRepaymentDate," .
                "recentUSRepaymentDate,recentRMBRepaymentAmount,recentUSRepaymentAmount,cardInfoRemarks1,cardInfoRemarks2,cardInfoRemarks3," .
                "cardInfoRemarks4,city,adjustCity,subBankName,branchBankName,withdrawalTime,overdueDays,caseLevel,outsourceNumber,alreadyRepaidPeriods," .
                "totalAlreadyRepaidAmount,communicateAddress,billAddress,billZipCode,companyAddress,companyName,companyTelephone,companyZipCode,email,homeAddress," .
                "homePhone,homeZipCode,postTitle,cellPhone,residenceAddress,residenceZipCode,cardHolderInfoRemarks,telephone,zipCode,contactPersonAddress,contactPersonPhone," .
                "contactPersonCompany,contactPersonEmail,contactPersonIDNumber,contactPersonName,contactPersonZipCode,contactPersonRelationship,contactPersonInfoRemarks,contactPersonTelephone,contactPersonType)  VALUES('" .
                urldecode( $objCardCase->id ). "','" .
                urldecode($objCardCase->cardHolderName) . "','" .
                urldecode($objCardCase->gender ). "','" .
                urldecode($objCardCase->IDNumber) . "','" .
                urldecode($objCardCase->cardNumber). "','" .
                urldecode($objCardCase->RMBAccount) . "','" .
                urldecode($objCardCase->USAccount ). "','" .
                urldecode($objCardCase->cardDate ). "','" .
                urldecode($objCardCase->quota)."','" .
                urldecode($objCardCase->statementDate)."','" .
                urldecode($objCardCase->totalCommissionBalanceRMB)."','" .
                urldecode($objCardCase->commissionAmountRMB)."','" .
                urldecode($objCardCase->commissionAmountUS)."','" .
                urldecode($objCardCase->recentRMBRepaymentDate)."','" .
                urldecode($objCardCase->recentUSRepaymentDate)."','" .
                urldecode($objCardCase->recentRMBRepaymentAmount)."','" .
                urldecode($objCardCase->recentUSRepaymentAmount)."','" .
                urldecode($objCardCase->cardInfoRemarks1)."','" .
                urldecode($objCardCase->cardInfoRemarks2)."','" .
                urldecode($objCardCase->cardInfoRemarks3)."','" .
                urldecode($objCardCase->cardInfoRemarks4)."','" .
                urldecode($objCardCase->city)."','" .
                urldecode($objCardCase->adjustCity)."','" .
                urldecode($objCardCase->subBankName)."','" .
                urldecode($objCardCase->branchBankName)."','" .
                urldecode($objCardCase->withdrawalTime)."','" .
                urldecode($objCardCase->overdueDays)."','" .
                urldecode($objCardCase->caseLevel)."','" .
                urldecode($objCardCase->outsourceNumber)."','" .
                urldecode($objCardCase->alreadyRepaidPeriods)."','" .
                urldecode($objCardCase->totalAlreadyRepaidAmount)."','" .
                urldecode($objCardCase->communicateAddress)."','" .
                urldecode($objCardCase->billAddress)."','" .
                urldecode($objCardCase->billZipCode)."','" .
                urldecode($objCardCase->companyAddress)."','" .
                urldecode($objCardCase->companyName)."','" .
                urldecode($objCardCase->companyTelephone)."','" .
                urldecode($objCardCase->companyZipCode)."','" .
                urldecode($objCardCase->email)."','" .
                urldecode($objCardCase->homeAddress)."','" .
                urldecode($objCardCase->homePhone)."','" .
                urldecode($objCardCase->homeZipCode)."','" .
                urldecode($objCardCase->postTitle)."','" .
                urldecode($objCardCase->cellPhone)."','" .
                urldecode($objCardCase->residenceAddress)."','" .
                urldecode($objCardCase->residenceZipCode)."','" .
                urldecode($objCardCase->cardHolderInfoRemarks)."','" .
                urldecode($objCardCase->telephone)."','" .
                urldecode($objCardCase->zipCode)."','" .
                urldecode($objCardCase->contactPersonAddress)."','" .
                urldecode($objCardCase->contactPersonPhone)."','" .
                urldecode($objCardCase->contactPersonCompany)."','" .
                urldecode($objCardCase->contactPersonEmail)."','" .
                urldecode($objCardCase->contactPersonIDNumber)."','" .
                urldecode($objCardCase->contactPersonName)."','" .
                urldecode($objCardCase->contactPersonZipCode)."','" .
                urldecode($objCardCase->contactPersonRelationship)."','" .
                urldecode($objCardCase->contactPersonInfoRemarks)."','" .
                urldecode($objCardCase->contactPersonTelephone)."','" .
                urldecode($objCardCase->contactPersonType)."')";

            //执行命令
            $user = $dbh->query($sqlStr);
        }

        echo  iconv("utf-8",$showCoding,urldecode(json_encode($totalArrayStorage)));
    }
    catch (PDOException $e)
    {
        echo  iconv("utf-8",$showCoding,"插入数据库错误");
        //删掉插入错误的文件
        if(file_exists($fileName))
        {
            @unlink($fileName);
        }
    }

    $dbh = null;/*关闭数据库*/

    //删掉上传的文件
    if($isDeleteFileAfterProcess && file_exists($fileName))
    {
        @unlink($fileName);
    }
    ?>

