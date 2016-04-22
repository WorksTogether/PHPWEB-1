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
    public  $overduedays;//逾期天数
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
    public  $position;//职务
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

    public function  setContent($contenArray)
    {
        if(count($contenArray)==59)
        {
            $this->cardHolderName=$contenArray[0];
        }
    }
}
