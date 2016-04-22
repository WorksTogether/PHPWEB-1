/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.6.17 : Database - kl_cms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kl_cms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `kl_cms`;

/*Table structure for table `credit_card_case` */

DROP TABLE IF EXISTS `credit_card_case`;

CREATE TABLE `credit_card_case` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键索引',
  `cardHolderName` varchar(50) DEFAULT NULL COMMENT '持卡人姓名',
  `gender` varchar(30) DEFAULT NULL COMMENT '性别',
  `IDNumber` varchar(50) DEFAULT NULL COMMENT '证件号码',
  `cardNumber` varchar(50) DEFAULT NULL COMMENT '卡号',
  `RMBAccount` varchar(50) DEFAULT NULL COMMENT '人民币账号',
  `USAccount` varchar(50) DEFAULT NULL COMMENT '美元账号',
  `cardDate` varchar(50) DEFAULT NULL COMMENT '开卡日期',
  `quota` varchar(50) DEFAULT NULL COMMENT '额度',
  `statementDate` varchar(50) DEFAULT NULL COMMENT '账单日期',
  `totalCommissionBalanceRMB` varchar(50) DEFAULT NULL COMMENT '总委托余额人民币',
  `commissionAmountRMB` varchar(50) DEFAULT NULL COMMENT '委托金额人民币',
  `commissionAmountUS` varchar(50) DEFAULT NULL COMMENT '委托金额美元',
  `recentRMBRepaymentDate` varchar(50) DEFAULT NULL COMMENT '最近人民币还款日期',
  `recentUSRepaymentDate` varchar(50) DEFAULT NULL COMMENT '最近美元币还款日期',
  `recentRMBRepaymentAmount` varchar(50) DEFAULT NULL COMMENT '最近人民币还款额',
  `recentUSRepaymentAmount` varchar(50) DEFAULT NULL COMMENT '最近美元币还款额',
  `cardInfoRemarks1` varchar(300) DEFAULT NULL COMMENT '最卡备注信息1',
  `cardInfoRemarks2` varchar(300) DEFAULT NULL COMMENT '最卡备注信息2',
  `cardInfoRemarks3` varchar(300) DEFAULT NULL COMMENT '最卡备注信息3',
  `cardInfoRemarks4` varchar(300) DEFAULT NULL COMMENT '最卡备注信息4',
  `city` varchar(100) DEFAULT NULL COMMENT '城市',
  `adjustCity` varchar(100) DEFAULT NULL COMMENT '调整城市',
  `subBankName` varchar(100) DEFAULT NULL COMMENT '分行名称',
  `branchBankName` varchar(100) DEFAULT NULL COMMENT '支行名称',
  `withdrawalTime` varchar(50) DEFAULT NULL COMMENT '退案时间',
  `overdueDays` varchar(50) DEFAULT NULL COMMENT '逾期天数',
  `caseLevel` varchar(50) DEFAULT NULL COMMENT '案件级别',
  `outsourceNumber` varchar(100) DEFAULT NULL COMMENT '外包序号',
  `alreadyRepaidPeriods` varchar(50) DEFAULT NULL COMMENT '已还期数',
  `totalAlreadyRepaidAmount` varchar(50) DEFAULT NULL COMMENT '总共已还金额',
  `communicateAddress` varchar(200) DEFAULT NULL COMMENT '通信地址',
  `billAddress` varchar(200) DEFAULT NULL COMMENT '账单地址',
  `billZipCode` varchar(50) DEFAULT NULL COMMENT '账单邮编',
  `companyAddress` varchar(200) DEFAULT NULL COMMENT '单位地址',
  `companyName` varchar(100) DEFAULT NULL COMMENT '单位名称',
  `companyTelephone` varchar(50) DEFAULT NULL COMMENT '单位电话',
  `companyZipCode` varchar(50) DEFAULT NULL COMMENT '单位地址邮编',
  `email` varchar(50) DEFAULT NULL COMMENT '电子邮箱',
  `homeAddress` varchar(200) DEFAULT NULL COMMENT '家庭地址',
  `homePhone` varchar(50) DEFAULT NULL COMMENT '家庭电话',
  `homeZipCode` varchar(50) DEFAULT NULL COMMENT '家庭邮编',
  `postTitle` varchar(50) DEFAULT NULL COMMENT '职务',
  `cellPhone` varchar(50) DEFAULT NULL COMMENT '手机',
  `residenceAddress` varchar(200) DEFAULT NULL COMMENT '户籍地址',
  `residenceZipCode` varchar(50) DEFAULT NULL COMMENT '户籍邮编',
  `cardHolderInfoRemarks` varchar(300) DEFAULT NULL COMMENT '持卡人信息备注',
  `telephone` varchar(50) DEFAULT NULL COMMENT '电话',
  `zipCode` varchar(50) DEFAULT NULL COMMENT '邮编',
  `contactPersonAddress` varchar(200) DEFAULT NULL COMMENT '联系人地址',
  `contactPersonPhone` varchar(50) DEFAULT NULL COMMENT '联系人手机',
  `contactPersonCompany` varchar(100) DEFAULT NULL COMMENT '联系人工作单位',
  `contactPersonEmail` varchar(50) DEFAULT NULL COMMENT '联系人邮箱',
  `contactPersonIDNumber` varchar(50) DEFAULT NULL COMMENT '联系人身份证',
  `contactPersonName` varchar(50) DEFAULT NULL COMMENT '联系人姓名',
  `contactPersonZipCode` varchar(50) DEFAULT NULL COMMENT '联系人邮编',
  `contactPersonRelationship` varchar(50) DEFAULT NULL COMMENT '联系人和持卡人关系',
  `contactPersonInfoRemarks` varchar(200) DEFAULT NULL COMMENT '联系人备注',
  `contactPersonTelephone` varchar(50) DEFAULT NULL COMMENT '联系人电话',
  `contactPersonType` varchar(50) DEFAULT NULL COMMENT '联系人类型',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `credit_card_case` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
