<?php
/**
 * Created by PhpStorm.
 * User: KS
 * Date: 2016/4/21
 * Time: 23:40
 */

namespace nankai;


class CreditCardCase
{
    /** 数据库加上ID和confirm一共61个字段*/
    public  $id;//主键索引
    public  $cardHolderName;//持卡人姓名
    public  $gender;//性别
    public  $IDNumber;//证件号码
    public  $cardNumber;//卡号
    public  $RMBAccount;//人民币账号
    public  $USAccount;//美元账号
    public  $cardDate;//开卡日期
    public  $quota;//额度
    public  $statementDate;//账单日期
    public  $totalCommissionBalanceRMB;//总委托余额人民币
    public  $commissionAmountRMB;//委托金额人民币
    public  $commissionAmountUS;//委托金额美元
    public  $recentRMBRepaymentDate;//最近人民币还款日期
    public  $recentUSRepaymentDate;//最近美元币还款日期
    public  $recentRMBRepaymentAmount;//最近人民币还款额
    public  $recentUSRepaymentAmount;//最近美元币还款额
    public  $cardInfoRemarks1;//最卡备注信息1
    public  $cardInfoRemarks2;//最卡备注信息2
    public  $cardInfoRemarks3;//最卡备注信息3
    public  $cardInfoRemarks4;//最卡备注信息4
    public  $city;//城市
    public  $adjustCity;//调整城市
    public  $subBankName;//分行名称
    public  $branchBankName;//支行名称
    public  $withdrawalTime;//退案时间
    public  $overdueDays;//逾期天数
    public  $caseLevel;//案件级别
    public  $outsourceNumber;//外包序号
    public  $alreadyRepaidPeriods;//已还期数
    public  $totalAlreadyRepaidAmount;//总共已还金额
    public  $communicateAddress;//通信地址
    public  $billAddress;//通信地址
    public  $billZipCode;//账单邮编
    public  $companyAddress;//单位地址
    public  $companyName;//单位名称
    public  $companyTelephone;//单位电话
    public  $companyZipCode;//单位地址邮编
    public  $email;//电子邮箱
    public  $homeAddress;//家庭地址
    public  $homePhone;//家庭电话
    public  $homeZipCode;//家庭邮编
    public  $postTitle;//职务
    public  $cellPhone;//手机
    public  $residenceAddress;//户籍地址
    public  $residenceZipCode;//户籍邮编
    public  $cardHolderInfoRemarks;//持卡人信息备注
    public  $telephone;//电话
    public  $zipCode;//邮编
    public  $contactPersonAddress;//联系人地址
    public  $contactPersonPhone;//联系人手机
    public  $contactPersonCompany;//联系人工作单位
    public  $contactPersonEmail;//联系人邮箱
    public  $contactPersonIDNumber;//联系人身份证
    public  $contactPersonName;//联系人姓名
    public  $contactPersonZipCode;//联系人邮编
    public  $contactPersonRelationship;//联系人和持卡人关系
    public  $contactPersonInfoRemarks;//联系人备注
    public  $contactPersonTelephone;//联系人电话
    public  $contactPersonType;//联系人类型
    public  $confirm='no';//临时数据还是确定存储

    public  $caseLength=59;

    public function  setContent($contenArray)
    {
        if(is_array($contenArray) &&count($contenArray)==$this->caseLength)
        {
            $this->cardHolderName=$contenArray[0];//持卡人姓名
            $this->gender=$contenArray[1];//性别
            $this->IDNumber=$contenArray[2];//证件号码
            $this->cardNumber=$contenArray[3];//卡号
            $this->RMBAccount=$contenArray[4];//人民币账号
            $this->USAccount=$contenArray[5];//美元账号
            $this->cardDate=$contenArray[6];//开卡日期
            $this->quota=$contenArray[7];//额度
            $this->statementDate=$contenArray[8];//账单日期
            $this->totalCommissionBalanceRMB=$contenArray[9];//总委托余额人民币
            $this->commissionAmountRMB=$contenArray[10];//委托金额人民币
            $this->commissionAmountUS=$contenArray[11];//委托金额美元
            $this->recentRMBRepaymentDate=$contenArray[12];//最近人民币还款日期
            $this->recentUSRepaymentDate=$contenArray[13];//最近美元币还款日期
            $this->recentRMBRepaymentAmount=$contenArray[14];//最近人民币还款额
            $this->recentUSRepaymentAmount=$contenArray[15];//最近美元币还款额
            $this->cardInfoRemarks1=$contenArray[16];//最卡备注信息1
            $this->cardInfoRemarks2=$contenArray[17];//最卡备注信息2
            $this->cardInfoRemarks3=$contenArray[18];//最卡备注信息3
            $this->cardInfoRemarks4=$contenArray[19];//最卡备注信息4
            $this->city=$contenArray[20];//城市
            $this->adjustCity=$contenArray[21];//调整城市
            $this->subBankName=$contenArray[22];//分行名称
            $this->branchBankName=$contenArray[23];//支行名称
            $this->withdrawalTime=$contenArray[24];//退案时间
            $this->overdueDays=$contenArray[25];//逾期天数
            $this->caseLevel=$contenArray[26];//案件级别
            $this->outsourceNumber=$contenArray[27];//外包序号
            $this->alreadyRepaidPeriods=$contenArray[28];//已还期数
            $this->totalAlreadyRepaidAmount=$contenArray[29];//总共已还金额
            $this->communicateAddress=$contenArray[30];//通信地址
            $this->billAddress=$contenArray[31];//通信地址
            $this->billZipCode=$contenArray[32];//账单邮编
            $this->companyAddress=$contenArray[33];//单位地址
            $this->companyName=$contenArray[34];//单位名称
            $this->companyTelephone=$contenArray[35];//单位电话
            $this->companyZipCode=$contenArray[36];//单位地址邮编
            $this->email=$contenArray[37];//电子邮箱
            $this->homeAddress=$contenArray[38];//家庭地址
            $this->homePhone=$contenArray[39];//家庭电话
            $this->homeZipCode=$contenArray[40];//家庭邮编
            $this->postTitle=$contenArray[41];//职务
            $this->cellPhone=$contenArray[42];//手机
            $this->residenceAddress=$contenArray[43];//户籍地址
            $this->residenceZipCode=$contenArray[44];//户籍邮编
            $this->cardHolderInfoRemarks=$contenArray[45];//持卡人信息备注
            $this->telephone=$contenArray[46];//电话
            $this->zipCode=$contenArray[47];//邮编
            $this->contactPersonAddress=$contenArray[48];//联系人地址
            $this->contactPersonPhone=$contenArray[49];//联系人手机
            $this->contactPersonCompany=$contenArray[50];//联系人工作单位
            $this->contactPersonEmail=$contenArray[51];//联系人邮箱
            $this->contactPersonIDNumber=$contenArray[52];//联系人身份证
            $this->contactPersonName=$contenArray[53];//联系人姓名
            $this->contactPersonZipCode=$contenArray[54];//联系人邮编
            $this->contactPersonRelationship=$contenArray[55];//联系人和持卡人关系
            $this->contactPersonInfoRemarks=$contenArray[56];//联系人备注
            $this->contactPersonTelephone=$contenArray[57];//联系人电话
            $this->contactPersonType=$contenArray[58];//联系人类型

            return true;
        }
        else
            return false;
    }
}
