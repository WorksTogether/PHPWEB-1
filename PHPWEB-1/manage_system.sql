/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.6.17 : Database - manage_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`manage_system` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `manage_system`;

/*Table structure for table `total` */

DROP TABLE IF EXISTS `total`;

CREATE TABLE `total` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id主键',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `card_num` varchar(255) DEFAULT NULL COMMENT '卡号',
  `rmb_account` varchar(255) DEFAULT NULL COMMENT '人民币账号',
  `us_account` varchar(255) DEFAULT NULL COMMENT '美元账号',
  `open_date` varchar(255) DEFAULT NULL COMMENT '开卡日期',
  `credit_limit` varchar(255) DEFAULT NULL COMMENT '额度',
  `bill_date` varchar(255) DEFAULT NULL COMMENT '账单日期',
  `remain_rmb` varchar(255) DEFAULT NULL COMMENT '余额人民币',
  `sum_rmb` varchar(255) DEFAULT NULL COMMENT '总金额',
  `delegate_money` varchar(255) DEFAULT NULL COMMENT '委托金额',
  `payment_date` varchar(255) DEFAULT NULL COMMENT '还款日期',
  `us_payment` varchar(255) DEFAULT NULL COMMENT '美元还款',
  `rmb_payment` varchar(255) DEFAULT NULL COMMENT '人民币还款',
  `status` varchar(255) DEFAULT NULL COMMENT '状态',
  `batch_num` varchar(255) DEFAULT NULL COMMENT '批次号',
  `id_num` varchar(255) DEFAULT NULL COMMENT '身份证号码',
  `director` varchar(255) DEFAULT NULL COMMENT '主管',
  `leader` varchar(255) DEFAULT NULL COMMENT '组长',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2119 DEFAULT CHARSET=utf8;

/*Data for the table `total` */

insert  into `total`(`id`,`name`,`sex`,`card_num`,`rmb_account`,`us_account`,`open_date`,`credit_limit`,`bill_date`,`remain_rmb`,`sum_rmb`,`delegate_money`,`payment_date`,`us_payment`,`rmb_payment`,`status`,`batch_num`,`id_num`,`director`,`leader`) values (1951,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'case_close',NULL,NULL,'chengdu',''),(1952,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1953,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'case_close',NULL,NULL,'chengdu',''),(1954,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1955,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1956,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1957,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1958,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'case_close',NULL,NULL,'chengdu',''),(1959,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1960,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1961,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1962,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1963,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1964,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1965,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1966,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1967,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1968,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1969,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1970,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1971,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1972,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1973,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1974,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1975,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1976,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1977,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'case_close',NULL,NULL,'beijing','B'),(1978,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1979,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1980,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1981,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'beijing','B'),(1982,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1983,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1984,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1985,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1986,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1987,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1988,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1989,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1990,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fin_assign',NULL,NULL,'chengdu',''),(1991,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1992,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'case_close',NULL,NULL,NULL,NULL),(1993,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1994,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1995,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1996,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1997,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1998,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(1999,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2000,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2001,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2002,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2003,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2004,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2005,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2006,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2007,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2008,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2009,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2010,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2011,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2012,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2013,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2014,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2015,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2016,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2017,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2018,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2019,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2020,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2021,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2022,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2023,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2024,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2025,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2026,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2027,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2028,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2029,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2030,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2031,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2032,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2033,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2034,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2035,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2036,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2037,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2038,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2039,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2040,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2041,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2042,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2043,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2044,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2045,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2046,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2047,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2048,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2049,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2050,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2051,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2052,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2053,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2054,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2055,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2056,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2057,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2058,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2059,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2060,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2061,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2062,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2063,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2064,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2065,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2066,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2067,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2068,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2069,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2070,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2071,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2072,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2073,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2074,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2075,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2076,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2077,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2078,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2079,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2080,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2081,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2082,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2083,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2084,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2085,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2086,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2087,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2088,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2089,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2090,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2091,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2092,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2093,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2094,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2095,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2097,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2098,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2099,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2100,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2101,'111','2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2102,'3333','4444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2103,'5555','666',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2104,'7','8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2105,'222','43',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2106,'3423','4324',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2107,'WER','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2108,'WQEWQ','EEEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2109,'WER','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2110,'WEW','WEWEW',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2111,'EWEWE','WEE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2112,'SDSDS','EWEWE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'case_in',NULL,NULL,NULL,NULL),(2113,'SDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2114,'DDSD','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2115,'DSDS','DSD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wait_assign',NULL,NULL,NULL,NULL),(2116,'张三1','男','6.20000101121E+14','700125451001','800125451001','2007/03/01','10001','1','11203','11203','','2015/10/01','','1001','fin_assign',NULL,'4.524512545121E+15','beijing',''),(2117,'张三1','男','6.20000101121E+14','700125451001','800125451001','2007/03/01','10001','1','11203','11203','','2015/10/01','','1001','wait_assign',NULL,'4.524512545121E+15',NULL,NULL),(2118,'张三1','男','6.20000101121E+14','700125451001','800125451001','2007/03/01','10001','1','11203','11203','','2015/10/01','','1001','wait_assign',NULL,'4.524512545121E+15',NULL,NULL);

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户主键',
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `real_name` varchar(255) DEFAULT NULL COMMENT '真实名字',
  `gender` varchar(50) DEFAULT NULL COMMENT '性别',
  `phone` varchar(50) DEFAULT NULL COMMENT '电话',
  `email` varchar(255) DEFAULT NULL COMMENT 'email',
  `auth` int(50) NOT NULL COMMENT '用户权限',
  `status` varchar(255) NOT NULL DEFAULT 'on' COMMENT '用户状态，启用或锁死',
  `area` varchar(255) DEFAULT NULL COMMENT '所属区域',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `user_info` */

insert  into `user_info`(`id`,`user_name`,`password`,`real_name`,`gender`,`phone`,`email`,`auth`,`status`,`area`) values (1,'admin','123456','未知','未知',NULL,NULL,0,'on',NULL),(2,'test','123456','test','男','12345678911','111@121.com',1,'on','beijing'),(3,' test2','123456','托尔斯泰','女','1111111111','111@111.com',2,'on','B');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;