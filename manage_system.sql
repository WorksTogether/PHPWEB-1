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

/*Table structure for table `relation` */

DROP TABLE IF EXISTS `relation`;

CREATE TABLE `relation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `customer_id` varchar(255) DEFAULT NULL COMMENT '映射到total的客户id',
  `relation_name` varchar(255) DEFAULT NULL COMMENT '关系人姓名',
  `relationship` varchar(255) DEFAULT NULL COMMENT '与客户的关系',
  `relation_phone` varchar(255) DEFAULT NULL COMMENT '与申请人的关系',
  `relation_company` varchar(255) DEFAULT NULL COMMENT '工作单位',
  `relation_duty` varchar(255) DEFAULT NULL COMMENT '职位',
  `relation_addr` varchar(255) DEFAULT NULL COMMENT '详细地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

/*Data for the table `relation` */

insert  into `relation`(`id`,`customer_id`,`relation_name`,`relationship`,`relation_phone`,`relation_company`,`relation_duty`,`relation_addr`) values (81,'65','艾绍锋','兄弟','13630248538','个体','宝塔区马家湾居民一区51号',''),(82,'65','杨瑞奇','同事','13772296882','员工','同本人',''),(83,'65','马刚','同事','13892117511','员工','同本人',''),(84,'65','高晓琴','配偶','15009116998','个体','同本人',''),(85,'65','郭延军','朋友','15909249059','技术员','宝塔区区党校',''),(86,'66','刘学珍','母亲','13484974401','无','吴起县新寨乡齐湾子村郑掌组',''),(87,'66','张万荣','同事','13689214877','员工','同本人',''),(88,'66','常延旗','朋友','15399266744','职工','吴起县城',''),(89,'66','白万狮','弟弟','15829994441','员工','吴起县吴起镇陈蒿湾石油小区21号楼104房间',''),(90,'66','马永权','同事','15991915673','员工','同本人',''),(91,'67','宗定林','同事','13636865518','科员','同本人',''),(92,'67','朱刚','朋友','13892133211','员工','延安市吴起白保供电街',''),(93,'67','蔺广森','朋友','13909116213','员工','吴起县二厂家属楼',''),(94,'67','陈静','夫妻','15829992800','员工','延安市吴起县长征街邮政局',''),(95,'67','白杰','堂兄','15991427330','员工','延安市吴起县居宁花园',''),(96,'68','张伟','同事','13772293706/65558','员工','同本人',''),(97,'68','程国民','朋友','13892156736/63830','员工','安塞县县城',''),(98,'68','袁队娃','同事','13992124454/66678','员工','同本人',''),(99,'68','刘华华','配偶','15229816899','教师','同本人',''),(100,'68','白雪挣','兄弟','15891188338/68338','老板','个体','');

/*Table structure for table `total` */

DROP TABLE IF EXISTS `total`;

CREATE TABLE `total` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `customer_name` varchar(255) DEFAULT NULL COMMENT '客户名',
  `id_num` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `work_company` varchar(255) DEFAULT NULL COMMENT '工作单位',
  `work_addr` varchar(255) DEFAULT NULL COMMENT '单位地址',
  `work_telephone` varchar(255) DEFAULT NULL COMMENT '单位电话',
  `work_duty` varchar(255) DEFAULT NULL COMMENT '职务',
  `household_addr` varchar(255) DEFAULT NULL COMMENT '户籍地址',
  `home_addr` varchar(255) DEFAULT NULL COMMENT '住址',
  `applyer_phone` varchar(255) DEFAULT NULL COMMENT '申请人手机号',
  `relation_name` varchar(255) DEFAULT NULL COMMENT '关系人姓名',
  `relationship` varchar(255) DEFAULT NULL COMMENT '关系',
  `relation_phone` varchar(255) DEFAULT NULL COMMENT '关系人电话',
  `relation_company` varchar(255) DEFAULT NULL COMMENT '关系人单位',
  `relation_duty` varchar(255) DEFAULT NULL COMMENT '关系人职位',
  `relation_addr` varchar(255) DEFAULT NULL COMMENT '关系人详细地址',
  `product_type` varchar(255) DEFAULT NULL COMMENT '产品类型',
  `sign_money` varchar(255) DEFAULT NULL COMMENT '签约金额',
  `repay_sum_period` varchar(255) DEFAULT NULL COMMENT '还款期数',
  `repay_month` varchar(255) DEFAULT NULL COMMENT '月还款金额',
  `repay_date` varchar(255) DEFAULT NULL COMMENT '每月还款日期',
  `sign_date` varchar(255) DEFAULT NULL COMMENT '签约日期',
  `loan_date` varchar(255) DEFAULT NULL COMMENT '放款日期',
  `repay_start_date` varchar(255) DEFAULT NULL COMMENT '还款起始日期',
  `repay_expire_date` varchar(255) DEFAULT NULL COMMENT '还款过期日期',
  `remain_capital` varchar(255) DEFAULT NULL COMMENT '剩余本金',
  `case_money` varchar(255) DEFAULT NULL COMMENT '委案金额',
  `capital_delay_start_date` varchar(255) DEFAULT NULL COMMENT '本金拖欠开始日期',
  `bank_name` varchar(255) DEFAULT NULL COMMENT '开户银行名',
  `account_name` varchar(255) DEFAULT NULL COMMENT '账户名',
  `bank_card_num` varchar(255) DEFAULT NULL COMMENT '银行卡号',
  `customer_phone` varchar(255) DEFAULT NULL COMMENT '客户手机号',
  `repay_sum_period_2` varchar(255) DEFAULT NULL COMMENT '还款期数',
  `repay_already_period` varchar(255) DEFAULT NULL COMMENT '已还期数',
  `repay_not_period` varchar(255) DEFAULT NULL COMMENT '未还期数',
  `m_value` varchar(255) DEFAULT NULL COMMENT 'M值',
  `status` varchar(255) DEFAULT NULL COMMENT '状态',
  `director` varchar(255) DEFAULT NULL COMMENT '区域主管',
  `leader` varchar(255) DEFAULT NULL COMMENT '区域组长',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

/*Data for the table `total` */

insert  into `total`(`id`,`customer_name`,`id_num`,`work_company`,`work_addr`,`work_telephone`,`work_duty`,`household_addr`,`home_addr`,`applyer_phone`,`relation_name`,`relationship`,`relation_phone`,`relation_company`,`relation_duty`,`relation_addr`,`product_type`,`sign_money`,`repay_sum_period`,`repay_month`,`repay_date`,`sign_date`,`loan_date`,`repay_start_date`,`repay_expire_date`,`remain_capital`,`case_money`,`capital_delay_start_date`,`bank_name`,`account_name`,`bank_card_num`,`customer_phone`,`repay_sum_period_2`,`repay_already_period`,`repay_not_period`,`m_value`,`status`,`director`,`leader`) values (65,'艾绍辉','6.1060219770626E+17','延安革命纪念馆','陕西省延安市宝塔区王家坪纪念馆','0911-8213661','正式职工','陕西省延安市宝塔区王家坪纪念馆家属楼','','13892119577','乔平','朋友','13038568896','','宝塔区二庄科','','信优贷','38298.65','24','1790','1','41883','41883','41913','42614','10395.37','10811.1848','42461','中国农业银行延安南区支行','艾绍辉','6.2284829280632E+18','13892119577','24','18','6','2','fin_assign','beijing',''),(66,'白万虎','6.106261979061E+17','吴起县水务局','陕西省延安市吴起县农林水木科技楼','0911-8390855','科员','陕西省延安市吴起县农林水木科技楼1203室','','13571104557','李杰','朋友','13309113395','员工','吴起县吴起镇','','信优贷','38298.65','24','1790','16','41835','41836','41867','42567','33968.23','46196.7928','41959','建设银行吴起县长征街支行营业室','白万虎','6.2270041851E+18','13571104557','24','3','21','18','case_in',NULL,NULL),(67,'白雪','6.1062619850921E+17','延长油田股份有限公司吴起采油厂','陕西省延安市吴起县陈蒿湾吴起采油厂','0911-8399075','副科长','陕西省延安市吴起县石油小区15楼1401室','','13772253330','蔺怀鱼','同事','13379313950','科员','同本人','','信优贷','44681.76','24','2088.33','1','41801','41801','41821','42522','8687.14','9382.1112','42401','建设银行吴起县长征街支行营业室','白雪','6.2170041800007E+18','13772253330','24','19','5','4','case_in',NULL,NULL),(68,'白雪峰','6.1062419861207E+17','延长油田集团杏子川采油厂','陕西省延安市安塞县城北区','0911-6422798','采油班长','陕西省延安市安塞县建华镇郝家坪政村郝家坪村080号','','18700109295','王鹏','朋友','13379553425/63791','员工','安塞县县城','','信优贷','38298.65','24','1790','1','41920','41921','41944','42644','18623.3','20858.096','42339','中国工商银行','白雪峰','6.2172326090001E+18','18700109295','24','13','11','6','case_in',NULL,NULL);

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
