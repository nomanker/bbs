-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-04 18:33:16
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
-- 表的结构 `ask_father`
--

DROP TABLE IF EXISTS `ask_father`;
CREATE TABLE IF NOT EXISTS `ask_father` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(9) NOT NULL,
  `title` varchar(30) NOT NULL,
  `main` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='问题库';

--
-- 转存表中的数据 `ask_father`
--

INSERT INTO `ask_father` (`id`, `username`, `title`, `main`) VALUES
(1, '一号', '测试一', '测试一测试一测试一测试一'),
(2, '一号', '测试二', '测试一测试一测试一测试一'),
(3, '一号', '测试三', '测试一测试一测试一测试一'),
(4, '一号', '测试四', '测试一测试一测试一测试一'),
(6, '一号', '1+1=？', '你猜吧！'),
(7, '一号', '1+1+1=？', 'as掉as'),
(18, '二号', '你是谁？？', '你是谁？？你是谁？？'),
(15, '二号', '22+1=？', '？？？？？'),
(19, '三号', '测试问题', '测试问题，测试问题，测试问题，测试问题。');

-- --------------------------------------------------------

--
-- 表的结构 `ask_son`
--

DROP TABLE IF EXISTS `ask_son`;
CREATE TABLE IF NOT EXISTS `ask_son` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(9) NOT NULL,
  `title` varchar(30) NOT NULL,
  `answer` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='答案库';

--
-- 转存表中的数据 `ask_son`
--

INSERT INTO `ask_son` (`id`, `username`, `title`, `answer`) VALUES
(101, '二号', '22+1=？', '23'),
(100, '一号', '22+1=？', '23'),
(98, '一号', '22+1=？', '23'),
(99, '一号', '22+1=？', '23'),
(97, '二号', '22+1=？', '23'),
(96, '二号', '22+1=？', '23'),
(95, '二号', '22+1=？', '23'),
(94, '二号', '22+1=？', '23'),
(93, '二号', '22+1=？', '23'),
(92, '二号', '22+1=？', '23'),
(91, '四号', '1+1=？', '2'),
(90, '四号', '测试一', '2'),
(89, '一号', '测试四', '测试一测试一测试一测试一'),
(88, '一号', '试一测试一测试一', '测试一测试一测试一测试一'),
(87, '一号', '1+1+1=？', '3'),
(86, '一号', '1+1+1=？', '3'),
(85, '一号', '1+1+1=？', '3'),
(84, '一号', '1+1=？', '3'),
(83, '一号', '1+1=？', '2'),
(82, '三号', '1+1+1=？', '3'),
(81, '三号', '1+1=？', '2'),
(80, '三号', '1+1=？', '2'),
(79, '四号', '1+1+1=？', '3'),
(78, '四号', '1+1=？', '3'),
(77, '四号', '测试一', '3'),
(76, '四号', '1+1+1=？', '3'),
(75, '四号', '1+1=？', '2'),
(74, '四号', '测试一', '3'),
(73, '四号', '1+1+1=？', '3'),
(112, '五号', '1+1=？', '好难啊。'),
(71, '四号', '测试一', '3'),
(70, '四号', '1+1=？', '2'),
(69, '四号', '1+1=？', '2'),
(126, '一号', '测试三', '123'),
(67, '四号', '测试一', '2'),
(66, '四号', '1+1=？', '2'),
(125, '一号', '测试二', '123'),
(64, '四号', '1+1=？', '2'),
(63, '四号', '测试一', '2'),
(62, '四号', '测试一', '2'),
(61, '四号', '1+1=？', '2'),
(124, '一号', '测试二', '测吧'),
(59, '二号', '1+1=？', '2'),
(58, '二号', '1+1=？', '2'),
(102, '二号', '22+1=？', '测试一测试一测试一测试一测试一测试一测试一测试一'),
(103, '二号', '测试一', '测试一测试一测试一测试一测试一测试一测试一测试一'),
(104, '二号', '测试一', '阿森擦森'),
(105, '二号', '测试一', '阿森擦森'),
(106, '二号', '测试一', '阿森擦森'),
(107, '二号', '测试一', '？？？？'),
(108, '二号', '测试一', '？？？？'),
(109, '二号', '22+1=？', '不知道'),
(110, '二号', '测试一', '？？？？'),
(111, '二号', '测试一', '？？？？'),
(113, '五号', '22+1=？', '好难啊。'),
(114, '五号', '测试四', '皮'),
(123, '一号', '测试一', '回答测试'),
(116, '二号', '测试三', 'WEFD'),
(117, '二号', '测试一', 'WEFD'),
(122, '一号', '测试二', '回答测试'),
(119, '二号', '测试四', 'WEFD'),
(120, '二号', '测试一', 'WEFD'),
(121, '二号', '测试一', '1212'),
(127, '一号', '测试四', '123'),
(128, '一号', '测试二', '123'),
(129, '一号', '测试三', '123');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='所有用户';

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `permissions`) VALUES
(1, '一号', '5588d0ce0e3ac944ba2e31dce0c6148c', 0),
(2, '二号', '5588d0ce0e3ac944ba2e31dce0c6148c', 1),
(3, '三号', '5588d0ce0e3ac944ba2e31dce0c6148c', 1),
(4, '四号', '5588d0ce0e3ac944ba2e31dce0c6148c', 2),
(6, '五号', '5588d0ce0e3ac944ba2e31dce0c6148c', 2);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='帖子库';

--
-- 转存表中的数据 `post_father`
--

INSERT INTO `post_father` (`id`, `username`, `title`, `main`) VALUES
(1, '一号', '测试一', '测试一测试一测试一'),
(2, '一号', '测试二', '测试一测试一测试一'),
(3, '一号', '测试三', '测试一测试一测试一'),
(4, '一号', '测试四', '测试一测试一测试一'),
(36, '三号', '1-1=？？', '想不到吧！！'),
(35, '二号', '测试帖子', '测试帖子测试帖子');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='回帖库';

--
-- 转存表中的数据 `post_son`
--

INSERT INTO `post_son` (`id`, `username`, `title`, `answer`) VALUES
(57, '三号', '测试一', '要多久一次'),
(56, '三号', '测试帖子', '要多久一次'),
(55, '三号', '测试帖子', '而换个如果'),
(44, '二号', '测试帖子', '测。。。。。测试'),
(54, '三号', '测试帖子', '二哥让哥如果'),
(49, '二号', '测试帖子', '嗯嗯'),
(50, '三号', '1-1=？？', '0'),
(51, '三号', '1-1=？？', '零'),
(52, '三号', '1-1=？？', '我是真没想不到！！'),
(53, '三号', '1-1=？？', '？？？？'),
(48, '二号', '测试四', '嗯嗯'),
(47, '二号', '测试三', '嗯嗯'),
(46, '二号', '测试帖子', '哦哦'),
(45, '二号', '测试四', '哦哦'),
(33, '二号', '测试一', '测吧');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
