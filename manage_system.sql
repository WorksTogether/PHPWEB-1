-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-07 11:22:55
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `total`
--

CREATE TABLE `total` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `total`
--

INSERT INTO `total` (`id`, `name`, `sex`, `status`) VALUES
(211, '111', '男', 'wait_assign'),
(212, '3333', '女', 'wait_assign'),
(213, '5555', '男', 'wait_assign'),
(214, '7', '男', 'wait_assign'),
(215, '222', '男', 'wait_assign'),
(216, '3423', '女', 'wait_assign'),
(217, 'WER', '女', 'wait_assign'),
(218, 'WQEWQ', '女', 'wait_assign'),
(219, 'WER', '男', 'wait_assign'),
(220, 'WEW', '女', 'wait_assign'),
(221, 'EWEWE', '男', 'wait_assign'),
(222, 'SDSDS', '女', 'wait_assign'),
(223, 'SDS', '男', 'wait_assign'),
(224, 'DDSD', '女', 'wait_assign'),
(225, 'DSDS', '男', 'wait_assign'),
(226, '111', '男', 'wait_assign'),
(227, '3333', '女', 'wait_assign'),
(228, '5555', '男', 'wait_assign'),
(229, '7', '男', 'wait_assign'),
(230, '222', '男', 'wait_assign'),
(231, '3423', '女', 'wait_assign'),
(232, 'WER', '女', 'wait_assign'),
(233, 'WQEWQ', '女', 'wait_assign'),
(234, 'WER', '男', 'wait_assign'),
(235, 'WEW', '女', 'wait_assign'),
(236, 'EWEWE', '男', 'wait_assign'),
(237, 'SDSDS', '女', 'wait_assign'),
(238, 'SDS', '男', 'wait_assign'),
(239, 'DDSD', '女', 'wait_assign'),
(240, 'DSDS', '男', 'wait_assign'),
(241, '111', '男', 'wait_assign'),
(242, '3333', '女', 'wait_assign'),
(243, '5555', '男', 'wait_assign'),
(244, '7', '男', 'wait_assign'),
(245, '222', '男', 'wait_assign'),
(246, '3423', '女', 'wait_assign'),
(247, 'WER', '女', 'wait_assign'),
(248, 'WQEWQ', '女', 'wait_assign'),
(249, 'WER', '男', 'wait_assign'),
(250, 'WEW', '女', 'wait_assign'),
(251, 'EWEWE', '男', 'wait_assign'),
(252, 'SDSDS', '女', 'wait_assign'),
(253, 'SDS', '男', 'wait_assign'),
(254, 'DDSD', '女', 'wait_assign'),
(255, 'DSDS', '男', 'wait_assign'),
(256, '111', '男', 'case_in'),
(257, '3333', '女', 'case_in'),
(258, '5555', '男', 'case_in'),
(259, '7', '男', 'case_in'),
(260, '222', '男', 'case_in'),
(261, '3423', '女', 'case_in'),
(262, 'WER', '女', 'case_in'),
(263, 'WQEWQ', '女', 'case_in'),
(264, 'WER', '男', 'case_in'),
(265, 'WEW', '女', 'case_in'),
(266, 'EWEWE', '男', 'case_in'),
(267, 'SDSDS', '女', 'case_in'),
(268, 'SDS', '男', 'case_in'),
(269, 'DDSD', '女', 'case_in'),
(270, 'DSDS', '男', 'case_in'),
(271, '111', '男', 'case_in'),
(272, '3333', '女', 'case_in'),
(273, '5555', '男', 'case_in'),
(274, '7', '男', 'case_in'),
(275, '222', '男', 'case_in'),
(276, '3423', '女', 'case_in'),
(277, 'WER', '女', 'case_in'),
(278, 'WQEWQ', '女', 'case_in'),
(279, 'WER', '男', 'case_in'),
(280, 'WEW', '女', 'case_in'),
(281, 'EWEWE', '男', 'case_in'),
(282, 'SDSDS', '女', 'case_in'),
(283, 'SDS', '男', 'case_in'),
(284, 'DDSD', '女', 'case_in'),
(285, 'DSDS', '男', 'case_in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
