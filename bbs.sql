-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2021-03-05 10:30:11
-- 服务器版本： 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `advice`
--

DROP TABLE IF EXISTS `advice`;
CREATE TABLE IF NOT EXISTS `advice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `main` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='建议箱';

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(9) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permissions` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='所有用户';

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `permissions`) VALUES
(1, 'bbsadmin', '7691917d91729ba546c0a7b8f95585be', 0),
(2, 'test', '7691917d91729ba546c0a7b8f95585be', 1),
(3, '123', '7691917d91729ba546c0a7b8f95585be', 2);

-- --------------------------------------------------------

--
-- 表的结构 `post_father`
--

DROP TABLE IF EXISTS `post_father`;
CREATE TABLE IF NOT EXISTS `post_father` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(9) NOT NULL,
  `title` varchar(30) NOT NULL,
  `main` varchar(150) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `category` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='帖子库';

--
-- 转存表中的数据 `post_father`
--

INSERT INTO `post_father` (`id`, `username`, `title`, `main`, `is_delete`, `category`) VALUES
(1, 'bbsadmin', '测试帖子', '测试测试', 1, 1),
(2, 'bbsadmin', '问个小问题', '1+1=？', 0, 0),
(3, 'bbsadmin', '测试1', 'successful', 0, 1),
(4, 'test', '普通用户测试', '普通用户测试', 0, 1),
(5, 'test', '普通话不普通', '是吧', 0, 1),
(6, 'test', '5x5=？', '猜猜', 0, 0),
(7, 'test', '我有一个疑问谁来帮帮我？', '骗你的，哈哈哈', 0, 1),
(8, 'test', '我升会员了', '。。。。', 0, 0),
(9, '123', '我来了', '来来来', 0, 1),
(10, '123', '测试问题', '没有疑问了', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `post_son`
--

DROP TABLE IF EXISTS `post_son`;
CREATE TABLE IF NOT EXISTS `post_son` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(9) NOT NULL,
  `title` varchar(30) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `category` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='回帖库';

--
-- 转存表中的数据 `post_son`
--

INSERT INTO `post_son` (`id`, `username`, `title`, `answer`, `category`) VALUES
(1, 'bbsadmin', '问个小问题', '2', 0),
(2, 'bbsadmin', '问个小问题', '1+1=2', 0),
(3, 'bbsadmin', '测试帖子', '测试回答', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
