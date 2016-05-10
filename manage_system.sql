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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `batch_num` varchar(255) DEFAULT NULL COMMENT '批次号',
  `id_num` varchar(255) DEFAULT NULL COMMENT '身份证号码',
  `director` varchar(255) DEFAULT NULL COMMENT '主管',
  `leader` varchar(255) DEFAULT NULL COMMENT '组长',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2041 DEFAULT CHARSET=utf8;

/*Data for the table `total` */

insert  into `total`(`id`,`name`,`sex`,`status`,`batch_num`,`id_num`,`director`,`leader`) values (1951,'111','2222','case_close',NULL,NULL,'chengdu',''),(1952,'3333','4444','fin_assign',NULL,NULL,'chengdu',''),(1953,'5555','666','fin_assign',NULL,NULL,'chengdu',''),(1954,'7','8','fin_assign',NULL,NULL,'chengdu',''),(1955,'222','43','fin_assign',NULL,NULL,'chengdu',''),(1956,'3423','4324','fin_assign',NULL,NULL,'chengdu',''),(1957,'WER','WEWEW','fin_assign',NULL,NULL,'chengdu',''),(1958,'WQEWQ','EEEE','fin_assign',NULL,NULL,'chengdu',''),(1959,'WER','EWEWE','fin_assign',NULL,NULL,'chengdu',''),(1960,'WEW','WEWEW','fin_assign',NULL,NULL,'chengdu',''),(1961,'EWEWE','WEE','fin_assign',NULL,NULL,'chengdu',''),(1962,'SDSDS','EWEWE','fin_assign',NULL,NULL,'chengdu',''),(1963,'SDS','DSD','fin_assign',NULL,NULL,'chengdu',''),(1964,'DDSD','DSD','fin_assign',NULL,NULL,'chengdu',''),(1965,'DSDS','DSD','fin_assign',NULL,NULL,'chengdu',''),(1966,'111','2222','fin_assign',NULL,NULL,'chengdu',''),(1967,'3333','4444','fin_assign',NULL,NULL,'beijing','B'),(1968,'5555','666','fin_assign',NULL,NULL,'beijing','B'),(1969,'7','8','fin_assign',NULL,NULL,'beijing','B'),(1970,'222','43','fin_assign',NULL,NULL,'beijing','B'),(1971,'3423','4324','fin_assign',NULL,NULL,'beijing','B'),(1972,'WER','WEWEW','fin_assign',NULL,NULL,'beijing','B'),(1973,'WQEWQ','EEEE','fin_assign',NULL,NULL,'beijing','B'),(1974,'WER','EWEWE','fin_assign',NULL,NULL,'beijing','B'),(1975,'WEW','WEWEW','fin_assign',NULL,NULL,'beijing','B'),(1976,'EWEWE','WEE','fin_assign',NULL,NULL,'beijing','B'),(1977,'SDSDS','EWEWE','fin_assign',NULL,NULL,'beijing','B'),(1978,'SDS','DSD','fin_assign',NULL,NULL,'beijing','B'),(1979,'DDSD','DSD','fin_assign',NULL,NULL,'beijing','B'),(1980,'DSDS','DSD','fin_assign',NULL,NULL,'beijing','B'),(1981,'111','2222','fin_assign',NULL,NULL,'beijing','B'),(1982,'3333','4444','wait_assign',NULL,NULL,NULL,NULL),(1983,'5555','666','wait_assign',NULL,NULL,NULL,NULL),(1984,'7','8','wait_assign',NULL,NULL,NULL,NULL),(1985,'222','43','wait_assign',NULL,NULL,NULL,NULL),(1986,'3423','4324','wait_assign',NULL,NULL,NULL,NULL),(1987,'WER','WEWEW','wait_assign',NULL,NULL,NULL,NULL),(1988,'WQEWQ','EEEE','wait_assign',NULL,NULL,NULL,NULL),(1989,'WER','EWEWE','wait_assign',NULL,NULL,NULL,NULL),(1990,'WEW','WEWEW','wait_assign',NULL,NULL,NULL,NULL),(1991,'EWEWE','WEE','wait_assign',NULL,NULL,NULL,NULL),(1992,'SDSDS','EWEWE','wait_assign',NULL,NULL,NULL,NULL),(1993,'SDS','DSD','wait_assign',NULL,NULL,NULL,NULL),(1994,'DDSD','DSD','wait_assign',NULL,NULL,NULL,NULL),(1995,'DSDS','DSD','wait_assign',NULL,NULL,NULL,NULL),(1996,'111','2222','wait_assign',NULL,NULL,NULL,NULL),(1997,'3333','4444','wait_assign',NULL,NULL,NULL,NULL),(1998,'5555','666','wait_assign',NULL,NULL,NULL,NULL),(1999,'7','8','wait_assign',NULL,NULL,NULL,NULL),(2000,'222','43','wait_assign',NULL,NULL,NULL,NULL),(2001,'3423','4324','wait_assign',NULL,NULL,NULL,NULL),(2002,'WER','WEWEW','wait_assign',NULL,NULL,NULL,NULL),(2003,'WQEWQ','EEEE','wait_assign',NULL,NULL,NULL,NULL),(2004,'WER','EWEWE','wait_assign',NULL,NULL,NULL,NULL),(2005,'WEW','WEWEW','wait_assign',NULL,NULL,NULL,NULL),(2006,'EWEWE','WEE','wait_assign',NULL,NULL,NULL,NULL),(2007,'SDSDS','EWEWE','wait_assign',NULL,NULL,NULL,NULL),(2008,'SDS','DSD','wait_assign',NULL,NULL,NULL,NULL),(2009,'DDSD','DSD','wait_assign',NULL,NULL,NULL,NULL),(2010,'DSDS','DSD','wait_assign',NULL,NULL,NULL,NULL),(2011,'111','2222','wait_assign',NULL,NULL,NULL,NULL),(2012,'3333','4444','wait_assign',NULL,NULL,NULL,NULL),(2013,'5555','666','wait_assign',NULL,NULL,NULL,NULL),(2014,'7','8','case_in',NULL,NULL,NULL,NULL),(2015,'222','43','case_in',NULL,NULL,NULL,NULL),(2016,'3423','4324','case_in',NULL,NULL,NULL,NULL),(2017,'WER','WEWEW','case_in',NULL,NULL,NULL,NULL),(2018,'WQEWQ','EEEE','case_in',NULL,NULL,NULL,NULL),(2019,'WER','EWEWE','case_in',NULL,NULL,NULL,NULL),(2020,'WEW','WEWEW','case_in',NULL,NULL,NULL,NULL),(2021,'EWEWE','WEE','case_in',NULL,NULL,NULL,NULL),(2022,'SDSDS','EWEWE','case_in',NULL,NULL,NULL,NULL),(2023,'SDS','DSD','case_in',NULL,NULL,NULL,NULL),(2024,'DDSD','DSD','case_in',NULL,NULL,NULL,NULL),(2025,'DSDS','DSD','case_in',NULL,NULL,NULL,NULL),(2026,'111','2222','case_in',NULL,NULL,NULL,NULL),(2027,'3333','4444','case_in',NULL,NULL,NULL,NULL),(2028,'5555','666','case_in',NULL,NULL,NULL,NULL),(2029,'7','8','case_in',NULL,NULL,NULL,NULL),(2030,'222','43','case_in',NULL,NULL,NULL,NULL),(2031,'3423','4324','case_in',NULL,NULL,NULL,NULL),(2032,'WER','WEWEW','case_in',NULL,NULL,NULL,NULL),(2033,'WQEWQ','EEEE','case_in',NULL,NULL,NULL,NULL),(2034,'WER','EWEWE','case_in',NULL,NULL,NULL,NULL),(2035,'WEW','WEWEW','case_in',NULL,NULL,NULL,NULL),(2036,'EWEWE','WEE','case_in',NULL,NULL,NULL,NULL),(2037,'SDSDS','EWEWE','case_in',NULL,NULL,NULL,NULL),(2038,'SDS','DSD','case_in',NULL,NULL,NULL,NULL),(2039,'DDSD','DSD','case_in',NULL,NULL,NULL,NULL),(2040,'DSDS','DSD','case_in',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
