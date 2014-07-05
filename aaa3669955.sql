-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 23 日 21:59
-- 服务器版本: 5.1.69
-- PHP 版本: 5.2.17p1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `aaa3669955`
--

-- --------------------------------------------------------

--
-- 表的结构 `wx_my_answer`
--

CREATE TABLE IF NOT EXISTS `wx_my_answer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL COMMENT '问题',
  `answer` varchar(1023) DEFAULT NULL COMMENT '回答',
  PRIMARY KEY (`id`),
  KEY `wid_index` (`token`) USING BTREE,
  KEY `question_index` (`question`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wx_my_answer`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_access`
--

CREATE TABLE IF NOT EXISTS `wy_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_access`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ad`
--

CREATE TABLE IF NOT EXISTS `wy_ad` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `wxid` int(10) unsigned NOT NULL DEFAULT '0',
  `board_id` smallint(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `extimg` varchar(255) NOT NULL,
  `extval` varchar(200) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `clicks` int(10) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ad`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_adboard`
--

CREATE TABLE IF NOT EXISTS `wy_adboard` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tpl` varchar(20) NOT NULL,
  `width` smallint(5) NOT NULL,
  `height` smallint(5) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `wxid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_adboard`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_address`
--

CREATE TABLE IF NOT EXISTS `wy_address` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `contacts` varchar(100) DEFAULT '联系人',
  `Province` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `postcode` varchar(30) DEFAULT NULL COMMENT '邮编',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `phone` varchar(50) DEFAULT NULL COMMENT '电话号码',
  `name` varchar(50) NOT NULL COMMENT '公司名称',
  `isno` varchar(10) DEFAULT '0' COMMENT '0:否 1:是',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_address`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_adma`
--

CREATE TABLE IF NOT EXISTS `wy_adma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `url` varchar(100) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `info` varchar(120) NOT NULL,
  `title` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_adma`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_admin`
--

CREATE TABLE IF NOT EXISTS `wy_admin` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` smallint(5) NOT NULL,
  `last_ip` varchar(15) NOT NULL,
  `last_time` int(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_admin`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_admin_auth`
--

CREATE TABLE IF NOT EXISTS `wy_admin_auth` (
  `role_id` tinyint(3) NOT NULL,
  `menu_id` smallint(6) NOT NULL,
  KEY `role_id` (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_admin_auth`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_admin_role`
--

CREATE TABLE IF NOT EXISTS `wy_admin_role` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `ordid` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_admin_role`
--

INSERT INTO `wy_admin_role` (`id`, `name`, `remark`, `ordid`, `status`) VALUES
(1, '超级管理员', '超级管理员', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_album`
--

CREATE TABLE IF NOT EXISTS `wy_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(4) unsigned NOT NULL DEFAULT '0',
  `wxid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `cover_cache` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `likes` int(10) NOT NULL,
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `follows` int(10) unsigned NOT NULL DEFAULT '0',
  `is_index` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_album`
--

INSERT INTO `wy_album` (`id`, `cate_id`, `wxid`, `uname`, `title`, `intro`, `banner`, `cover_cache`, `status`, `ordid`, `likes`, `items`, `follows`, `is_index`, `add_time`) VALUES
(3, 1, 0, 's350350', '默认专辑', NULL, NULL, 'a:4:{i:0;a:2:{s:3:"img";s:25:"1405/14/5372d631e86c6.jpg";s:5:"intro";s:7:"sadaasx";}i:1;a:2:{s:3:"img";s:25:"1405/14/5372d61875c89.jpg";s:5:"intro";s:6:"11w1w1";}i:2;a:2:{s:3:"img";s:25:"1405/13/53718cd8c3dbb.jpg";s:5:"intro";s:36:"测试商城测试商城测试商城";}i:3;a:2:{s:3:"img";s:25:"1405/12/536fb6b05523e.jpg";s:5:"intro";s:3:"林";}}', 1, 255, 0, 4, 0, 0, 1399812569);

-- --------------------------------------------------------

--
-- 表的结构 `wy_album_cate`
--

CREATE TABLE IF NOT EXISTS `wy_album_cate` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `albums` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_album_cate`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_album_comment`
--

CREATE TABLE IF NOT EXISTS `wy_album_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `info` text NOT NULL,
  `add_time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_album_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_album_follow`
--

CREATE TABLE IF NOT EXISTS `wy_album_follow` (
  `uid` int(10) NOT NULL,
  `album_id` int(10) NOT NULL,
  `add_time` int(10) NOT NULL,
  UNIQUE KEY `uid` (`uid`,`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_album_follow`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_album_item`
--

CREATE TABLE IF NOT EXISTS `wy_album_item` (
  `album_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `intro` varchar(255) NOT NULL,
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`album_id`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_album_item`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_alipay_config`
--

CREATE TABLE IF NOT EXISTS `wy_alipay_config` (
  `token` varchar(60) NOT NULL,
  `paytype` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `pid` varchar(40) NOT NULL DEFAULT '',
  `key` varchar(200) NOT NULL DEFAULT '',
  `partnerkey` varchar(100) NOT NULL,
  `appsecret` varchar(200) NOT NULL,
  `appid` varchar(60) NOT NULL,
  `paysignkey` varchar(200) NOT NULL,
  `partnerid` varchar(200) NOT NULL,
  `open` tinyint(1) NOT NULL DEFAULT '0',
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_alipay_config`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_api`
--

CREATE TABLE IF NOT EXISTS `wy_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `url` varchar(100) NOT NULL,
  `number` tinyint(1) NOT NULL,
  `order` tinyint(1) NOT NULL,
  `is_colation` tinyint(1) NOT NULL,
  `colation_keyword` text NOT NULL,
  `time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_api`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ap_authcode`
--

CREATE TABLE IF NOT EXISTS `wy_ap_authcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authcode` int(4) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ap_authcode`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ap_nodes`
--

CREATE TABLE IF NOT EXISTS `wy_ap_nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `mac` varchar(30) DEFAULT NULL,
  `addr` varchar(30) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `usernum` int(11) NOT NULL,
  `deploy_status` tinyint(4) NOT NULL,
  `device_location` varchar(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT NULL,
  `conntime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_ap_nodes`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ap_policy`
--

CREATE TABLE IF NOT EXISTS `wy_ap_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `hotspot_whiteip` varchar(600) DEFAULT NULL,
  `forcetimeout` int(11) DEFAULT NULL,
  `timeout` int(11) DEFAULT NULL,
  `authtype` varchar(30) DEFAULT NULL,
  `hotspot_whiteurl` varchar(600) DEFAULT NULL,
  `hotspot_whitemac` varchar(255) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ap_policy`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ap_users`
--

CREATE TABLE IF NOT EXISTS `wy_ap_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('offlline','online') DEFAULT NULL,
  `mac` varchar(30) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `apnode_id` int(11) DEFAULT NULL,
  `uiid` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `auth_type` enum('weixin','sms','sina','qq') DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `nick` varchar(30) DEFAULT NULL,
  `head` varchar(200) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ap_users`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_areply`
--

CREATE TABLE IF NOT EXISTS `wy_areply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `token` char(30) NOT NULL,
  `home` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_areply`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_article`
--

CREATE TABLE IF NOT EXISTS `wy_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(90) NOT NULL,
  `description` char(255) NOT NULL,
  `author` varchar(15) NOT NULL,
  `form` varchar(30) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `content` text NOT NULL,
  `imgs` char(40) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_article`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_article_cate`
--

CREATE TABLE IF NOT EXISTS `wy_article_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `spid` varchar(50) NOT NULL,
  `ordid` smallint(4) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `wxid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_article_cate`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_article_page`
--

CREATE TABLE IF NOT EXISTS `wy_article_page` (
  `cate_id` smallint(4) unsigned NOT NULL DEFAULT '0',
  `title` varchar(120) NOT NULL,
  `info` text NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `wxid` int(10) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_article_page`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_attribute`
--

CREATE TABLE IF NOT EXISTS `wy_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `catid` int(10) unsigned NOT NULL COMMENT '分类ID',
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`catid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wy_attribute`
--

INSERT INTO `wy_attribute` (`id`, `token`, `catid`, `name`, `value`) VALUES
(1, 'uvezwy1400243429', 24, '尺码', '35　|　36　|　37'),
(2, 'uvezwy1400243429', 24, '颜色', '红　|　黄　|　蓝　|　绿');

-- --------------------------------------------------------

--
-- 表的结构 `wy_auto_user`
--

CREATE TABLE IF NOT EXISTS `wy_auto_user` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `users` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_auto_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_badword`
--

CREATE TABLE IF NOT EXISTS `wy_badword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1：禁用；2：替换；3：审核',
  `badword` varchar(100) NOT NULL,
  `replaceword` varchar(100) NOT NULL,
  `add_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_badword`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_behavior`
--

CREATE TABLE IF NOT EXISTS `wy_behavior` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `openid` varchar(60) NOT NULL,
  `date` varchar(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `model` varchar(60) NOT NULL,
  `num` int(11) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `wy_behavior`
--

INSERT INTO `wy_behavior` (`id`, `fid`, `token`, `openid`, `date`, `enddate`, `model`, `num`, `keyword`, `type`) VALUES
(1, 2, 'nsnyem1400838500', 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', '2014-05-23', 1400838721, 'Shake', 1, 'y', 0),
(2, 5, 'nsnyem1400838500', 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', '2014-05-23', 1400838855, 'Wall', 2, 'q', 0),
(3, 0, 'jyccid1400850497', 'o6Txvt3Dj3MVUFLWQWXogOqs83sA', '2014-05-23', 1400853368, 'chat', 9, '1', 0),
(4, 0, 'jyccid1400850497', 'o6Txvt3Dj3MVUFLWQWXogOqs83sA', '2014-05-23', 1400853404, 'chat', 8, '2', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_brandlist`
--

CREATE TABLE IF NOT EXISTS `wy_brandlist` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `uid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_brandlist`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_call`
--

CREATE TABLE IF NOT EXISTS `wy_call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) CHARACTER SET latin1 NOT NULL,
  `phone_account` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_call`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_canyu`
--

CREATE TABLE IF NOT EXISTS `wy_canyu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xid` int(11) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `token` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_canyu`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_car`
--

CREATE TABLE IF NOT EXISTS `wy_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `www` varchar(50) NOT NULL DEFAULT '',
  `logo` varchar(200) NOT NULL DEFAULT '',
  `sort` int(11) DEFAULT NULL,
  `info` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_car`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_carmodel`
--

CREATE TABLE IF NOT EXISTS `wy_carmodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand_serise` varchar(50) NOT NULL,
  `model_year` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `panorama_id` int(11) NOT NULL,
  `guide_price` decimal(10,3) NOT NULL,
  `dealer_price` decimal(10,3) NOT NULL,
  `emission` double NOT NULL,
  `stalls` tinyint(4) NOT NULL,
  `box` varchar(20) NOT NULL,
  `pic_url` varchar(200) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_carmodel`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_carnews`
--

CREATE TABLE IF NOT EXISTS `wy_carnews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `news_id` int(11) NOT NULL,
  `pre_id` int(11) NOT NULL,
  `usedcar_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_carnews`
--

INSERT INTO `wy_carnews` (`id`, `token`, `news_id`, `pre_id`, `usedcar_id`, `album_id`, `company_id`) VALUES
(1, 'wjjnxm1399082112', 721, 721, 721, 28, 80);

-- --------------------------------------------------------

--
-- 表的结构 `wy_carowner`
--

CREATE TABLE IF NOT EXISTS `wy_carowner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '''''',
  `head_url` varchar(200) NOT NULL DEFAULT '''''',
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_carowner`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_carsaler`
--

CREATE TABLE IF NOT EXISTS `wy_carsaler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `mobile` char(13) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `salestype` tinyint(4) NOT NULL,
  `info` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_carsaler`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_carseries`
--

CREATE TABLE IF NOT EXISTS `wy_carseries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `shortname` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `sort` int(11) NOT NULL,
  `info` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_carseries`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_carset`
--

CREATE TABLE IF NOT EXISTS `wy_carset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `head_url` varchar(200) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL,
  `title1` varchar(50) NOT NULL DEFAULT '',
  `title2` varchar(50) NOT NULL DEFAULT '',
  `title3` varchar(50) NOT NULL DEFAULT '',
  `title4` varchar(50) NOT NULL DEFAULT '',
  `title5` varchar(50) NOT NULL DEFAULT '',
  `title6` varchar(50) NOT NULL DEFAULT '',
  `head_url_1` varchar(200) NOT NULL DEFAULT '',
  `head_url_2` varchar(200) NOT NULL DEFAULT '',
  `head_url_3` varchar(200) NOT NULL DEFAULT '',
  `head_url_4` varchar(200) NOT NULL DEFAULT '',
  `head_url_5` varchar(200) NOT NULL DEFAULT '',
  `head_url_6` varchar(200) NOT NULL DEFAULT '',
  `url1` varchar(200) NOT NULL DEFAULT '',
  `url2` varchar(200) NOT NULL DEFAULT '',
  `url3` varchar(200) NOT NULL DEFAULT '',
  `url4` varchar(200) NOT NULL DEFAULT '',
  `url5` varchar(200) NOT NULL DEFAULT '',
  `url6` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_carset`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_caruser`
--

CREATE TABLE IF NOT EXISTS `wy_caruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `brand_serise` varchar(50) NOT NULL,
  `car_no` varchar(20) NOT NULL,
  `car_userName` varchar(50) NOT NULL,
  `car_startTime` varchar(50) NOT NULL,
  `car_insurance_lastDate` varchar(50) NOT NULL,
  `car_insurance_lastCost` decimal(10,2) NOT NULL,
  `car_care_mileage` int(11) NOT NULL,
  `user_tel` char(11) NOT NULL,
  `car_care_lastDate` varchar(50) NOT NULL,
  `car_care_lastCost` decimal(10,2) NOT NULL,
  `kfinfo` varchar(200) NOT NULL DEFAULT '',
  `insurance_Date` varchar(50) DEFAULT NULL,
  `insurance_Cost` decimal(10,2) DEFAULT NULL,
  `care_mileage` int(11) DEFAULT NULL,
  `car_care_Date` varchar(50) DEFAULT NULL,
  `car_care_Cost` decimal(10,2) DEFAULT NULL,
  `car_buyTime` varchar(50) NOT NULL DEFAULT '',
  `car_care_inspection` varchar(50) NOT NULL DEFAULT '',
  `care_next_mileage` int(11) NOT NULL DEFAULT '0',
  `next_care_inspection` varchar(50) NOT NULL DEFAULT '',
  `next_insurance_Date` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_caruser`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_car_utility`
--

CREATE TABLE IF NOT EXISTS `wy_car_utility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_car_utility`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_case`
--

CREATE TABLE IF NOT EXISTS `wy_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `url` char(255) NOT NULL,
  `img` char(200) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_case`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_catemenu`
--

CREATE TABLE IF NOT EXISTS `wy_catemenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  `orderss` varchar(100) NOT NULL DEFAULT '0',
  `url` varchar(1000) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `RadioGroup1` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_catemenu`
--

INSERT INTO `wy_catemenu` (`id`, `fid`, `name`, `picurl`, `status`, `orderss`, `url`, `token`, `RadioGroup1`) VALUES
(1, 0, '11', 'http://wx.0724s.com/tpl/User/default/common/images/photo/plugmenu41.png', 1, '0', 'tel:13888888888', 'pxhsnk1400821588', '0'),
(2, 0, '2', 'http://wx.0724s.com/tpl/User/default/common/images/photo/plugmenu142.png', 1, '2', '{siteUrl}/index.php?g=Wap&m=Panorama&a=index&token=pxhsnk1400821588&wecha_id={wechat_id}', 'pxhsnk1400821588', '0'),
(3, 0, '3', 'http://wx.0724s.com/tpl/User/default/common/images/photo/plugmenu180.png', 1, '0', '{siteUrl}/index.php?g=Wap&m=Card&a=index&token=pxhsnk1400821588&wecha_id={wechat_id}', 'pxhsnk1400821588', '0');

-- --------------------------------------------------------

--
-- 表的结构 `wy_classify`
--

CREATE TABLE IF NOT EXISTS `wy_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `info` varchar(90) NOT NULL COMMENT '分类描述',
  `sorts` varchar(6) NOT NULL COMMENT '显示顺序',
  `img` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  `token` varchar(30) NOT NULL,
  `icon` char(200) NOT NULL,
  `yanse` char(100) NOT NULL,
  `conttpid` tinyint(4) NOT NULL DEFAULT '1',
  `tpid` tinyint(4) NOT NULL DEFAULT '1',
  `path` varchar(3000) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `wy_classify`
--

INSERT INTO `wy_classify` (`id`, `fid`, `name`, `info`, `sorts`, `img`, `url`, `status`, `token`, `icon`, `yanse`, `conttpid`, `tpid`, `path`) VALUES
(1, 0, 'rtwe ew', 'ertwery', '1', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/backpack-2.png', '', '1', 'pgtepl1400696466', 'icon-comments-alt', '#FFFFFF', 8, 127, '0'),
(2, 0, '1', '1', '1', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/chalkboard.png', '', '1', 'pxhsnk1400821588', '', '#FFFFFF', 5, 127, '0'),
(3, 0, '2', '2', '1', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/backpack-2.png', 'http://api.map.baidu.com/marker?location=28.003659,120.698987&title=fdgdfgsdfgsdfgsdfg&content=浙江省温州市鹿城区绣山路1号&output=html', '1', 'pxhsnk1400821588', '', '#FFFFFF', 0, 0, '0'),
(4, 0, '大抽奖', '活动', '1', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/glasses.png', '{siteUrl}/index.php?g=Wap&m=Lottery&a=index&token=pxhsnk1400821588&wecha_id={wechat_id}&id=1', '1', 'pxhsnk1400821588', 'icon-heart', '#FFFFFF', 0, 0, '0');

-- --------------------------------------------------------

--
-- 表的结构 `wy_company`
--

CREATE TABLE IF NOT EXISTS `wy_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `display` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `shortname` varchar(50) NOT NULL DEFAULT '',
  `mp` varchar(11) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `intro` text NOT NULL,
  `catid` mediumint(3) NOT NULL DEFAULT '0',
  `taxis` int(10) NOT NULL DEFAULT '0',
  `isbranch` tinyint(1) NOT NULL DEFAULT '0',
  `logourl` varchar(180) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_company`
--

INSERT INTO `wy_company` (`id`, `display`, `token`, `name`, `username`, `password`, `shortname`, `mp`, `tel`, `address`, `email`, `latitude`, `longitude`, `intro`, `catid`, `taxis`, `isbranch`, `logourl`) VALUES
(1, 1, 'pgtepl1400696466', '测试', '', '', '测试', '13279205004', '13279205004', 'we阿萨德', '', 234, 234, '34', 0, 0, 0, 'http://wx.0724s.com/tpl/static/attachment/background/view/3.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `wy_company_staff`
--

CREATE TABLE IF NOT EXISTS `wy_company_staff` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `companyid` int(10) NOT NULL,
  `token` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `tel` varchar(11) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyid` (`companyid`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_company_staff`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_customer_service`
--

CREATE TABLE IF NOT EXISTS `wy_customer_service` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `name` varchar(255) DEFAULT 'gardennet' COMMENT 'type=0时的 名称',
  `state` tinyint(1) DEFAULT '1' COMMENT '0：客服小佳1：专属客服2：单一回复客服',
  `autoans` tinyint(1) DEFAULT '1' COMMENT '智能回答',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_customer_service`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_custom_menu`
--

CREATE TABLE IF NOT EXISTS `wy_custom_menu` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL,
  `spid` varchar(50) NOT NULL,
  `fcolor` varchar(10) NOT NULL,
  `remark` text NOT NULL,
  `add_time` int(10) NOT NULL,
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `likes` int(10) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:商品分类 1:标签分类',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL,
  `is_index` tinyint(1) NOT NULL DEFAULT '0',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `key` varchar(255) DEFAULT NULL COMMENT 'key值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_custom_menu`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_delivery`
--

CREATE TABLE IF NOT EXISTS `wy_delivery` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_delivery`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_diaoyan`
--

CREATE TABLE IF NOT EXISTS `wy_diaoyan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `stime` date DEFAULT NULL,
  `etime` date DEFAULT NULL,
  `stat` tinyint(2) DEFAULT '0',
  `pic` varchar(200) DEFAULT NULL,
  `sinfo` varchar(500) DEFAULT NULL,
  `einfo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_diaoyan`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_diaoyan_timu`
--

CREATE TABLE IF NOT EXISTS `wy_diaoyan_timu` (
  `tid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `optia` varchar(200) DEFAULT NULL,
  `optib` varchar(200) DEFAULT NULL,
  `optic` varchar(200) DEFAULT NULL,
  `optid` varchar(200) DEFAULT NULL,
  `optie` varchar(200) DEFAULT NULL,
  `max` smallint(2) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `perca` int(11) DEFAULT '0',
  `percb` int(11) DEFAULT '0',
  `percc` int(11) DEFAULT '0',
  `percd` int(11) DEFAULT '0',
  `perce` int(11) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_diaoyan_timu`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_diaoyan_user`
--

CREATE TABLE IF NOT EXISTS `wy_diaoyan_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `diaoyan_id` int(11) DEFAULT NULL,
  `wecha_id` varchar(100) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ans` varchar(20) DEFAULT NULL,
  `jianyi` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_diaoyan_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_dining`
--

CREATE TABLE IF NOT EXISTS `wy_dining` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` mediumint(4) NOT NULL DEFAULT '0',
  `storeid` mediumint(4) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `oprice` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '10',
  `intro` text NOT NULL,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `salecount` mediumint(4) NOT NULL DEFAULT '0',
  `logourl` varchar(150) NOT NULL DEFAULT '',
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `groupon` tinyint(1) NOT NULL DEFAULT '0',
  `endtime` int(10) NOT NULL DEFAULT '0',
  `fakemembercount` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`storeid`),
  KEY `catid_2` (`catid`),
  KEY `storeid` (`storeid`),
  KEY `token` (`token`),
  KEY `price` (`price`),
  KEY `oprice` (`oprice`),
  KEY `discount` (`discount`),
  KEY `dining` (`dining`),
  KEY `groupon` (`groupon`,`endtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_dining`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_dining_cat`
--

CREATE TABLE IF NOT EXISTS `wy_dining_cat` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL DEFAULT '',
  `dicompanyid` int(11) NOT NULL,
  `parentid` mediumint(4) NOT NULL,
  `logourl` varchar(100) NOT NULL,
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `token` (`token`),
  KEY `dining` (`dining`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_dining_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_dining_company`
--

CREATE TABLE IF NOT EXISTS `wy_dining_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `catid` mediumint(3) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL COMMENT '店铺状态',
  `category` varchar(10) NOT NULL COMMENT '店铺分类',
  `time` varchar(12) NOT NULL COMMENT '营业时间',
  `money` double(10,2) NOT NULL COMMENT '起送价格',
  `radius` varchar(10) NOT NULL COMMENT '服务半径',
  `scope` varchar(100) NOT NULL COMMENT '配送范围',
  `bulletin` text NOT NULL COMMENT '店铺公告',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_dining_company`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_dining_diningtable`
--

CREATE TABLE IF NOT EXISTS `wy_dining_diningtable` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `intro` varchar(500) NOT NULL DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_dining_diningtable`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_dining_table`
--

CREATE TABLE IF NOT EXISTS `wy_dining_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `image` varchar(200) NOT NULL,
  `isbox` tinyint(1) unsigned NOT NULL,
  `isorder` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `isbox` (`isbox`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_dining_table`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_dish`
--

CREATE TABLE IF NOT EXISTS `wy_dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `price` float NOT NULL,
  `ishot` tinyint(1) unsigned NOT NULL,
  `isopen` tinyint(1) unsigned NOT NULL,
  `image` varchar(200) NOT NULL COMMENT '片',
  `des` varchar(500) NOT NULL,
  `creattime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `isopen` (`isopen`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_dish`
--

INSERT INTO `wy_dish` (`id`, `cid`, `sid`, `name`, `unit`, `price`, `ishot`, `isopen`, `image`, `des`, `creattime`) VALUES
(1, 108, 1, '猪肉', '份', 12, 1, 1, 'http://demo.pigcms.cn/tpl/static/attachment/focus/default/4.jpg', '', 1400426902);

-- --------------------------------------------------------

--
-- 表的结构 `wy_dish_company`
--

CREATE TABLE IF NOT EXISTS `wy_dish_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `istakeaway` tinyint(1) unsigned NOT NULL,
  `price` float NOT NULL,
  `payonline` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_dish_company`
--

INSERT INTO `wy_dish_company` (`id`, `cid`, `istakeaway`, `price`, `payonline`) VALUES
(1, 108, 1, 22, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_dish_like`
--

CREATE TABLE IF NOT EXISTS `wy_dish_like` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `did` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `wecha_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `wecha_id` (`wecha_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_dish_like`
--

INSERT INTO `wy_dish_like` (`id`, `did`, `cid`, `wecha_id`) VALUES
(1, 1, 108, 'oYFa5jl53BKArLZiwHG34W-rq1KI');

-- --------------------------------------------------------

--
-- 表的结构 `wy_dish_order`
--

CREATE TABLE IF NOT EXISTS `wy_dish_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `wecha_id` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `price` float NOT NULL,
  `nums` smallint(3) unsigned NOT NULL,
  `info` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tableid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `reservetime` int(11) NOT NULL,
  `isuse` tinyint(1) NOT NULL,
  `paid` tinyint(1) unsigned NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `printed` tinyint(1) unsigned NOT NULL,
  `des` varchar(500) NOT NULL,
  `takeaway` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`,`wecha_id`),
  KEY `token` (`token`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wy_dish_order`
--

INSERT INTO `wy_dish_order` (`id`, `cid`, `wecha_id`, `token`, `total`, `price`, `nums`, `info`, `name`, `sex`, `tel`, `address`, `tableid`, `time`, `reservetime`, `isuse`, `paid`, `orderid`, `printed`, `des`, `takeaway`) VALUES
(1, 108, 'oYFa5jl53BKArLZiwHG34W-rq1KI', 'uvezwy1400243429', 1, 34, 1, 'a:2:{s:13:"takeAwayPrice";s:2:"22";s:4:"list";a:1:{i:1;a:4:{s:5:"price";s:2:"12";s:3:"num";i:1;s:4:"name";s:6:"猪肉";s:3:"des";s:0:"";}}}', '王国亮', 0, '13011158579', '', 0, 1400426956, 1400515200, 0, 0, 'I20140518232916', 0, '', 1),
(2, 108, 'oYFa5jl53BKArLZiwHG34W-rq1KI', 'uvezwy1400243429', 1, 12, 1, 'a:2:{s:13:"takeAwayPrice";i:0;s:4:"list";a:1:{i:1;a:4:{s:5:"price";s:2:"12";s:3:"num";i:1;s:4:"name";s:6:"猪肉";s:3:"des";s:0:"";}}}', '', 1, '', '', 0, 1400426996, 1400427586, 0, 0, 'I20140518232956', 0, '', 2);

-- --------------------------------------------------------

--
-- 表的结构 `wy_dish_sort`
--

CREATE TABLE IF NOT EXISTS `wy_dish_sort` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `num` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_dish_sort`
--

INSERT INTO `wy_dish_sort` (`id`, `cid`, `name`, `des`, `image`, `num`) VALUES
(1, 108, '东北菜', '333', 'http://demo.pigcms.cn/tpl/static/attachment/focus/default/4.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_dish_table`
--

CREATE TABLE IF NOT EXISTS `wy_dish_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `tableid` int(10) unsigned NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `reservetime` int(10) unsigned NOT NULL,
  `creattime` int(10) unsigned NOT NULL,
  `orderid` int(10) unsigned NOT NULL,
  `isuse` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `wecha_id` (`wecha_id`,`reservetime`),
  KEY `tableid` (`tableid`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_dish_table`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_diymen_class`
--

CREATE TABLE IF NOT EXISTS `wy_diymen_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `url` varchar(250) NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_diymen_class`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_diymen_set`
--

CREATE TABLE IF NOT EXISTS `wy_diymen_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `appid` varchar(18) NOT NULL,
  `yxappid` varchar(18) NOT NULL,
  `appsecret` varchar(32) NOT NULL,
  `yxappsecret` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `wy_diymen_set`
--

INSERT INTO `wy_diymen_set` (`id`, `token`, `appid`, `yxappid`, `appsecret`, `yxappsecret`) VALUES
(1, 'pgtepl1400696466', '', '', '', ''),
(2, 'pxhsnk1400821588', '', '', '', ''),
(3, 'nsnyem1400838500', '', '', '', ''),
(4, 'fucuac1400841542', '', '', '', ''),
(5, 'lseyvg1400848442', '', '', '', ''),
(6, 'jyccid1400850497', '', '', '', ''),
(7, 'pbnnog1400853333', 'wxd0fda22d88b7edc6', '', 'a82137513a16cd860f6e84a3cb93e880', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_dream`
--

CREATE TABLE IF NOT EXISTS `wy_dream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- 转存表中的数据 `wy_dream`
--

INSERT INTO `wy_dream` (`id`, `title`, `content`) VALUES
(1, '梦见父母', '梦见自己成了幼儿与父母相处  幸运的事情即将发生。可以尝到美昧可口的咖啡、得到电影招待券等等。你将不觉莞尔一笑。梦见和父母快乐地有说有笑  家中将起波澜。对父母将感觉厌烦，会有离家出走的行为。你还未成年，不要因轻率急躁而遗恨终身，要多多自重。梦见父母离婚  朋友运不如意。你无心的一句话，将引起误解。如果置之不理，朋友将离你而去，要设法解释清楚才好。梦见受母亲疼爱  在爱情方面将有乐事。约会的地方最好尽量选择幽静的地方，诸如图书馆、博物馆、黄昏的公园等等。梦见被父亲大骂一顿  健康方面有不良征兆。尤其要注意的是意外事故，在上下车、横穿车道时要特别小心哪。梦见离开父母而成孤苦伶仃  爱情方面将有很大的幸运。如果有意中人，不必迟疑可以进攻，绝对不会被封杀出局。因为这是梦中注定的'),
(2, '梦见护士', ' 已婚女子梦见护士  不久会怀孕，得贵子。 少女梦见有一群美貌的护士  很快要出嫁。 少女梦见和护士争吵  婚事不顺利，迟迟不能出嫁。 病人梦见护士  痛苦很快要过去。'),
(3, '梦见老师', ' 梦见受老师称赞  在学业方面乌云密布。由于连日的熬夜，在课堂上竟开始打陀结果受到老师批评。这就是所谓反梦。 梦见受老师责骂  家人关系极佳。对双亲能克尽孝道，你将令人刮目相看。也许每个月的零用钱会大幅度增加呢。 梦见到老师家里拜访  人际关系的运势衰退的预兆。头顶上有一颗争执之星，要注意你的言行举止，防止争执，尤其脾气不可暴躁。 梦见正在上课  读书运渐入佳境。将有指点迷津的同学出现，以此为契机，你的读书欲将大增。也就是说，你将会有很大的干劲。要努力喔! 梦见遇见校长  这是上学恐惧症。不要一天到晚抱着书本，过分拘泥于成绩，有时也要放松心情，尽量参加其他活动。否则你的神经将很快衰弱。 梦见异性老师向你亲密攀谈  爱情运将下降，情人之间的感情开始变得索然无味，最好改变一下约会的方式'),
(4, '梦见男孩', '梦见男孩，是祥兆。女人梦见男孩，会生病。梦见漂亮的男孩，朋友会忘恩负义。梦见生男孩，生活会幸福、恬适。梦见男孩夭亡，大难将降临。女人梦见自己将要生一个男孩，意味着会过上幸福舒畅的生活'),
(5, '梦见皇后', ' 男人梦见皇后  会经济受损。 女人梦见皇后  丈夫会心情愉快。 囚犯梦见皇后  很快能恢复自由。 叛国者梦见皇后  不久会成为国家领导人的宠儿。 商人梦见皇后  出国做生意能发大财。 已婚女人梦见自己成了皇后  很快会与丈夫分离，或孩子生病，或者由于丈夫失业，左支右绌。 未婚女子梦见自己当了皇后  嫁到一个有名望富有的家庭。 男人梦见同皇后握手  会受到国家尊重，官运亨通。 男人梦见同皇后握手  会娶富人家的小姐为妻。 已婚女人梦见和皇后握手  会身居高位。 未婚女子梦见和皇后握手  想与意中人结为伴侣，但却会遭到父母的阻拦。 梦见和皇后争吵  能发大财'),
(6, '梦见朋友', ' 梦见大伙儿一起去旅行  最近，很可能发生快乐的事。如亲友参加电视猜谜得奖；老师临时有事，自习时间增加等等。 梦见与朋友一起挨老师责骂  考试运极度好转。考试前所看的复习题，全部出现在试卷中，必将获得近于满分的成绩。 梦见与朋友一起旷课到处游荡  在健康方面乌云密布。放学途中买东西吃，将食物中毒；咬紧牙关熬夜，眼睛将出毛病、只好去看医生，不料医生临时休业真是霉运当头! 梦见有朋友来玩  异性运上升。将有新的浪漫史产生。爱情战的武器，不外乎是电话。最幸运的黄金时段将是晚上八点到九点。 梦见与朋友一起又吃又喝  在金钱方面要多加小心。不要花无谓的钱，搞得囊空如洗。 梦见与朋友并排读书  进行新尝试的最好时机。参加社团、练技习艺，只要是日常想做的事，立刻开始行动吧。 梦见与朋友一起工作  人际关系好。没有钱的时候；有事情必须要别人帮忙时候，朋友一定会伸出援助的手。 梦见朋友与异性很要好  爱情运将停滞。与情人之间总是格格不入，波折迭起。选一处喝咖啡的地方，也争执不休。 梦见与朋友玩笑嬉戏  在异性方面将有问题出现。对性的诱惑千万要小心，要保持清醒与理智。 梦见一群好友反目而分裂  人际关系将不如意。无意间发觉最信赖的朋友在背后说你，因此受到莫大的打击。要治愈这心里的创伤，要一段很长的时间'),
(7, '梦见守财奴', ' 梦见一毛不拔的人  朋友会吵嘴。 梦见与吝啬鬼交朋友  要遭不幸。 男人梦见自己成了铁公鸡  一毛不拔，生意能赚大钱。 已婚女人梦见自己小气  婆婆家的处境会很令人担忧。 梦见和吝啬人吵架  预示要交新朋友。 梦见偷拿守财奴的东西  会身居高位。 梦见铁公鸡送钱给自己家  会被偷窃'),
(8, '梦见尼姑', ' 男人梦见女出家人  无数的灾难会临头。 女人梦见与出家人交谈  丈夫家的人能和睦相处，生活愉快。 少女梦见与女出家人发生争吵  是凶兆，亲人会受辱。'),
(9, '梦见小孩', ' 梦见抱起婴儿  财运相当顺利的象征。你的存款将大幅度增加，但绝对不可借给别人，因为要不回来的可能性很大。 梦见欺负小孩儿  人际关系有阴影。你的隐私将被周围的人发觉。必须小心加以防范，别忘了隔墙有耳! 梦见与儿童一起游戏  学校里将发生快乐的事。新近成为会员的后生小辈，竟是英俊无比的异性每天都盼望快点下课'),
(10, '梦见人群', ' 梦见许多穿着华贵服装的人聚集在一起  未婚者将会喜结良缘。 梦到穿脏衣服的人聚集在一起  做梦人的亲属会有人与世长辞'),
(11, '梦见疯子', ' 少女梦见与女出家人发生争吵  是凶兆，亲人会受辱。 姑娘梦见疯子  会嫁给一个富有、如意的男子。 跛子梦见疯子  会找到忠诚的仆人。 梦见妻子疯了  她会把家安排得井井有条'),
(12, '梦见兄弟姊妹', ' 梦见受兄或姊欺负而心有不甘  兄弟运蕴酿着波折。仅仅为了一支铅笔、或一块橡皮，就要起一场争执。这时，最好由父母出面做公道人。 梦见兄弟或妹妹将出去游玩  在人际关系中将有幸运来临。可能由于趣味相投，将结识新朋友。只要坦诚相待，必然可以成为心腹之交。 梦见兄弟吵架  比赛运衰减。围棋、象棋、电视娱乐比赛不管参加任何一种比赛，准输无疑。这种状态将持续半年，要有心理准备! 梦见与兄弟姊妹合力做些事情  学业方面将有进步。以往难缠的科目，也将全部都有好分数。有可能得到老师当众表扬，使你神采飞扬。 梦见与兄弟或姊妹远离  在异性方面将有幸运。可能接到某同学写的热情洋溢的情书。这时将如何应付?这是你个人的事。 梦见与兄弟姊妹同盖一床被子  雨过天睛，健康运上升。今后一个月，虽然有一点不如意，但过后将精力充沛，可以过一段无病无痛的日子'),
(13, '梦见军队', '梦见军队开来或军队处于立定姿势，这是好的征兆。梦见军队离去，意味着将遭不幸。梦见军队打败了，倒霉的日子将要到来。梦见军队胜利了，寓意着要交好运。'),
(14, '梦见清道夫', ' 梦见清洁夫  要遭厄运。 女人梦见清扫人  会忍受丈夫分离的痛苦。 梦见当了清道夫  前途无量。 商人梦见做清道夫的工作  生意会兴旺，能发大财。 梦见与清扫工吵架  会臭名远扬。 梦见和清洁工交朋友  会名声大噪，得财进宝'),
(15, '梦见祖父母', ' 梦见祖父母给你零用钱  将有极佳的金钱运。但仍有浪费的倾向，所以出去逛街购物时要有节制。 梦见祖父母责骂母亲  健康方面亮起红灯。虽有强健的身体，也不可过信自己的体力。 必须保持良好的生活规律，要经常运动，加上充分的营养及休息才可保持健康。 梦见帮祖父母捶背  技能方面将进步。这将是练习弹奏吉他的良机，每天加紧练习吧! 梦见祖父母躺在病床上  家中可能发生纠葛。你与双亲及兄弟强能发生争执，注意不要任性。'),
(16, '梦见婴儿', ' 孕妇梦见婴儿，则无象征意义。 梦见抱着婴儿，象征着梦者将会有所收获，不久之后将会得到对于来说很重要的东西。 梦见婴儿笑，象征着人际关系的良好，您能以诚待人，且身边会有很多。 梦见婴儿长牙，象征着计划的顺利实施，您能得到贵人的帮助，不久之后就会有好消息。 梦见婴儿说话，可能是在提醒您最近您会遇到麻烦，总有人从中做怪，也就是犯小人。 梦见婴儿死了，是不详之梦，表明自己计划和希望的破灭，您已经或者将要失去对自己来说很重要的东西。 梦见婴儿哭，表示当前有些压抑的情绪，使得自己心烦意乱，这时候最好静下心来，不要主动出击，做事低调些。'),
(17, '梦见野蛮人', '男人梦见野蛮人，小心啊女人梦见野蛮人，丈夫家里会发生吵架。梦见与野蛮人打斗，是不祥之兆，灾祸会降临。商人梦见会见未开化的人，不久要出国，能发大财。受指控的人梦见未开化的人，会被驱逐出境。旅游者梦见野蛮人，旅行会愉快'),
(18, '梦见邻居', '梦见邻人出现，有火难之灾。火灾固然要小心，也要注意开水、火柴等烫伤。但所梦见的如果是隔壁的邻居，就不会有危险，尽可放心。梦见与邻居同辈的异性，爱情将有新局面。表示你对爱情已有美好憧憬，一定会对某一个人产生爱情。'),
(19, '梦见王子公主', ' 一般梦中的王子、公主多代表着自己或兄弟姐妹。而梦中的国王、女王则代表你的双亲。 梦见王子或公主，则象征着这些日子，也许会与善意的人吵架'),
(20, '梦见小贩', ' 男人梦见小贩  会与朋友分道扬镳。 已婚女人梦见小贩  会与丈夫家的人分开另过，独自操持家务。 梦见与小贩交谈  是好的征兆，丈夫会勤俭持家。 女人梦见与小贩交谈  会有一个装饰豪华具有现代化的住宅、华贵的服装、舒适的生活，一切应有尽有。 梦见与小贩吵架  陌生人会骗走自己的财产。 梦见和小贩交朋友  生意会好转，发大财。 官员梦见自己成了小贩  会被降职，最后只好提出辞职。 商人梦见自己成了小贩  生意会萧条，有可能倒闭。 病人梦见自己成了小贩  要遭厄运，尽管请西医大夫和中医治疗，但病情仍不见好转。 大学教师梦见自己成了小贩  是祥兆，会扬名天下，世界许多国家会邀请他发表演说。失业者梦见自己成了小贩  会接到好几个机构的聘书，但是都难以胜任'),
(21, '梦见医生', ' 梦见医生  亲人会卧床不起。 病人和久病痊愈的人梦见医生  病情会加重，或突然病倒。 梦见与医生交谈，或向医生咨询  会身体健康，延年益寿。 病人梦见和医生谈话，或请教医生  不久病情会好转。 梦见与医生争吵，是不祥之兆  要遭受重大损失。 梦见自己当了医生或西医大夫  不久会被辞退，或生意受到冲击。 梦见去请医生  会与德高望众、受人民尊重的人建立友好关系。 梦见与医生交朋友  不用求人送礼，就能发财。 女人梦见丈夫当了医生  会患子宫病。 梦见侍候医护人员  生意会起伏不定，生活动荡不安'),
(22, '梦见丈夫', ' 梦见担心丈夫头发掉落变成秃顶，这是用梦境体现了对 丈夫 的无能、软弱的嫌恶和怨恨。 梦见丈夫有第三者,可能是你对你们的婚姻在潜意识中总觉得有压力。也许是你的丈夫很优秀，也许是你总是看低自己的魅力，所以你在内心深处总会有危机感，总有着隐隐约约的压力和担心。梦仅仅是现实在我们脑海中扭曲的反映，梦反映什么不重要，重要的是通过梦境我们可以更多地了解自己的内心，更好的改进自己心理状况。 梦见丈夫睡在别人的床上,有这样的梦,实质上说明的情况是你爱老公的程度比不了他爱你的程度. 另外,你已经很习惯有他的日子了,但有的时候,他说不定比你还喜欢吃醋.......呵呵.既然这样,梦见这个,就不是坏事,好好珍惜这份感情吧.'),
(23, '梦见烈士', ' 梦见烈士  会受到人们的尊重，不断进步。 梦见女烈士  要发大财。 梦见受到烈士的责骂  处境对自己极为不利。 梦见自己成了烈士  会灾难临头'),
(24, '梦见警察', ' 梦见警察站着  是危险的兆头。 梦见自己被逮捕  会成为政府官员所喜欢的人物。 惯犯梦见警察抓人  多次作案，能发大财。梦见与警察交谈  会被提升。 女人梦见与警察交谈  丈夫的保镖会受伤。 囚犯梦见与警察谈话  很快会被释放。 商人梦见与警察交谈  要提防竞争对手。 领导人梦见与警察交谈  政府和警察会非常尊重自己。 梦见与警察吵架  是凶兆，预示仇人和强盗在威胁着自己。 未婚男子梦见与警察争吵  会带着自己的情侣逃跑。 男人梦见请求援助  作梦人会幸福安全。 女人梦见求助于警察帮助  很快要出狱。 梦见挨警察的打  会贪污公款，损失惨重。 梦见自己当了警察  会威信扫地。梦见自己穿着警服  会受到刑事案件的牵连'),
(25, '梦见导师', ' 男人梦见自己的 导师 ，一切都会顺心如意。 女人梦见自己的 导师 ，要遭欺辱。梦见新的 导师 ，会遭受损失。 老叟梦见与自己的 导师 交谈，不久要与世长辞。 商人梦见和自己的 导师 谈话，吸收新的合股人，能发大财。 梦见与 导师 吵架，会家破人亡。 学生梦见和 导师 交谈，会因生活困难。中途辍学'),
(26, '梦见队伍', ' 梦见迎亲的队伍  家里要死人。 女人梦见迎亲队伍  丈夫家里要吵架。 已婚男人梦见参加迎亲队伍  会身居高位，人们都有求于自己。 已婚女人梦见参加迎亲队伍  不久会怀孕，能生一个漂亮的男孩。 未婚男女梦见迎亲队伍  会喜结良缘。 未婚男子梦见参加迎亲队伍  会与恋人各奔东西。 囚犯梦见加入迎亲队伍  很快会获得自由。 病人梦见参加迎亲队伍  病情会恶化。 梦见参加政治或宗教游行  会有好消息。 政治领导人梦见加入政治或宗教游行  会受到国家领导人的尊重。旅游者梦见参加政治或宗教游行  会发生车祸'),
(27, '梦见名人', ' 梦见接到喜欢的朋友来信  在异性关系上，将有快乐事发生。在朋友的生日派对中，被介绍认识几个异性，其中也许有上个喜欢你的人。爱情可能就此萌芽 梦见受著名的运动选手指导  健康方面将有不韦。尤其社团活动时，发生事故或受伤的可能性很大。 这个时候，最好避免练球练得太晚。 梦见与最喜欢的明星亲密相处  财运将大幅度好转。多余的支出减少，零用钱到了月底还有很多。借给朋友的钱，也一定可以收回。 梦见与外国电影明星交谈  朋友运上升的前兆。这时可以和几个要好的朋友计划郊游。这段快乐的时光将可以增强你与朋友之间的友谊。 梦见与首相握手  遭受意外事故的可能性极大。譬如向摇着尾巴走来的狗伸出友谊的手，却被咬等倒霉到了极点。 梦见与历史上的名人会见  亲友将遭受病难的预兆。要给予病痛缠身或体弱多病的朋友婉转的安慰'),
(28, '梦见同学', ' 梦见同性的同学反映你现在人际关系上出现了问题。 梦见异性同学则表示你对朋友有不满的态度，反映了你现在被孤立而寂寞的心态。 梦见与同学打架，人际关系运上升。你跟任何人都可以大胆而积极地交往，周围的人对你也必然坦诚相待，绝不会发生冲突'),
(29, '梦见英雄', ' 中年人梦见自己成了英雄  是身强力壮的兆头。 老年人梦见自己成英雄  会溘然而逝。应该尽早立遗嘱，分家产。 病人梦见自己成了英雄  病情会恶化，如果他的八字好，会得救'),
(30, '梦见上司', '梦见上司，现实生活中想发挥自己的能力但受到阻挠。梦到这个梦时还要注意工作上可能将会惹麻烦梦见上司不批准自已请求，预示工作或工作环境有小麻烦。梦见与上司同行就是与麻烦同行。梦见上司生病，预示麻烦会没有。梦见上司来访，表示缺乏自信。'),
(31, '梦见同事', '梦见和工作伙伴商讨事情，暗示计画可能受到阻挠或是会停滞不前。梦见商讨或交涉成功的话，表示你现实生活中将遭遇困难'),
(32, '梦见小偷', '原版周公解梦内与小偷相关的内容：赶贼入市不出凶；强贼入宅主家破；与贼同行大吉利；赶贼行见者大吉。现代释梦：梦见小偷，暗示你最近情绪不太稳定，财运有起落。但是商人梦见小偷，预示生意兴隆。梦见自己成了小偷，预示有财运，钱财上会有意想不到的收获。梦见发现小偷偷东西，表示你可能正一步步制订某项计划，接近某个目标。另外，梦见小偷，还可能表示你有不正当的性行为。梦见自己和小偷同行，预示你将发财。梦见你是个小偷并被警察追赶，预示你进行的事业将陷入困境，你开展的社交关系也将陷入僵局。梦见你追赶或抓获一个小偷，意味着你将最终在较量中赢得对手的尊重。梦见自己认识的某个人成了小偷，则表示潜意识中你不信任那个人，虽然在生活中，你可能并未家常到这一点。梦见有小偷到自己家入室行窃，提醒你近期一定要小心谨慎，家里可能有会遇到祸事。梦见小偷入室窥视，环视屋内，表示你对性的好奇心很重，有偷窥欲。如果小偷没有发现你就离开了，表示你曾有一段不为人知的秘密性关系。如果小偷发现了你并攻击你，则暗示你最近有强烈的欲望。'),
(33, '梦见孤儿', '梦中的孤儿，是人性脆弱一面的代表，往往表示你内心孤独渴望被关爱。如果梦见自己变成了孤儿，这是提醒做梦人必须要摆脱内心的依赖，独立自主，自力更生。如果梦见自己在照顾孤儿，预示你可能会得到他人的帮助。如果梦里看见街边的流浪儿，意味着工作上会有困难。梦见慰问孤儿，预示他人的忧虑将触动你的同情心，并将最终促使你牺牲掉个人的享乐。梦见与你有关的孤儿，预示你的生活将增添新的责任，并将由此导致你与某个朋友或某个爱好相同的人之间产生疏远。'),
(34, '梦见妻子', '梦见拥抱妻子，是不祥之兆，会与妻子分居。梦见与妻子拌嘴，夫妻恩爱，生活幸福、美满。囚犯梦见与妻吵架，很快能见到妻子。梦见和妻分离，会更加宠爱妻子。梦见找了一位好吵闹的妻子，生活会幸福、舒适。梦见妻子疯了，寓意着妻子会把家安排得井井有条。梦见妻子十分疲乏，会与妻子分离。丈夫梦见妻子年青了许多，预示家庭幸福、美满。丈夫梦见援助妻子，夫妻生活会很幸福美满。梦见受到妻子的表扬，妻子会行为不轨，令人厌恶。'),
(35, '梦见和尚', '梦见僧人或和尚，吉兆，会有好运。梦见僧侣念经，是死亡的暗示。梦到自己出家，表示重生或疾病可好转。遇高僧说教，表示将开拓人生大道。梦见出家人的画，生活富裕安逸。梦见听和尚或僧人说教，自己的事业会走上正轨。'),
(36, '梦见军人', '梦见自己成为军人，预示梦者生活会出现新的转机。梦见别人成为军人，意味着梦者事业征途上一切井然有序。梦见军人在站岗，意味着梦者在未来的工作中需要提高警惕，防止小人捣乱。梦见军人休假，表示梦者已完全处于一种安全和谐的环境之中。女人梦见军人，表示潜意识内对婚姻的担忧。'),
(37, '梦见病人', '梦见自己成了病人，预示计划被延迟，或你会得到别人的帮助。梦见别人是病人，表示你会有机会寻求朋友、长辈的帮助。梦见家里有麻疯病病人来访，意味着将会有人登门拜访贵府，向你进行宣传。梦见自己成为精病患者，将跨过障碍和难关，生活越来越安定、富裕的征兆。梦见病人逐渐恢复健康，暗示梦者进行中的事情或计划的事情一帆顺的祥梦。梦见病人在歌唱，这是家里发生等不吉利的事情的征兆。梦见患上传染病的人吃后痊愈，这是将脱离某种组织或团体的意思。梦见精神病病人查看自己的，这是患病或诸事不顺的征兆。梦见病人出院回家，这是暗示梦者祈求一切安好，身体健康的梦。梦见去探望某个病人，梦中的病人即将获得痊愈的征兆。'),
(38, '梦见婴儿', '梦见婴儿，一方面，暗示了你自己内心中脆弱、渴望被爱的一面；另一方面，则预示你的自我发展，生活进展中将会转运，得到新机会和好运，之前的辛勤有回报等等。梦见漂亮可爱的婴儿，预示你会有好运气。梦见非常难看的婴儿，则象征可能会有信任的人捣鬼欺骗你。梦见自己抱起婴儿，象征着梦者将会有所收获，不久之后将会得到对于自己来说很重要的东西。梦见婴儿笑，象征着人际关系的良好，您能以诚待人，且身边会有很多。梦见婴儿长牙，象征着计划的顺利实施，您能得到贵人的帮助，不久之后就会有好消息。梦见婴儿说话，可能是在提醒您最近您会遇到麻烦，总有人从中做怪，也就是犯小人.梦见婴儿死亡的梦境，是不详之梦，表明自己计划和希望的破灭，您已经或者将要失去对自己来说很重要的东西。梦见婴儿哭，表示当前有些压抑的情绪，使得自己心烦意乱，这时候最好静下心来，不要主动出击，做事低调些。梦见婴儿哭，并且导致梦者心烦意乱，则预示将有不愉快的事情发生，也可能是你最近身体欠佳。梦见刚出生的孩子就开始直立行走，预示你的工作成绩，将得到赞誉好评。梦见生病的婴儿，表示你在工作或恋爱中可能会遭受挫折。如果梦见小孩丢失，则表示你现在遇到的麻烦或者担心，将会消除，心绪将重获安定，走上逐渐发展的正轨。梦见刚出生的婴儿在大小便，预示可能会遇到不吉利的事，也可能你信赖的人，会令你陷入尴尬境地。已婚但还没有孩子的人来说，梦见婴儿，有时则可能仅仅是表示心中想要孩子的愿望。初为父母的人，梦见婴儿要窒息或在危险中，通常表示了对孩子的强烈关心。孕妇梦见婴儿，则无象征意义。梦见自己的孩子出生，是将要怀孕，或发财、有丰厚进项的预兆。梦见有陌生人抚摩婴儿，暗示你近期运气不佳，会遇到倒霉事儿。'),
(39, '梦见姐姐', '男人梦见自己的姐姐，是祥兆，能长寿；女人梦见未婚的姐姐，额外开销会突然增多。女人梦见已婚的姐姐，会与丈夫家的一个女性发生争吵。梦见给姐姐礼物，侵吞公款，会破财。梦见与姐姐吵嘴，会越来越富。梦见去姐姐的家，贵客会登门。梦见与姐姐交谈，会有好消息。梦见姐姐去世，她会长寿。梦见死去的姐姐，会有好运气，家庭和睦。'),
(40, '梦见陌生人', '梦见陌生人或者不认识的人是一种好的暗示，如果你梦到从未见过的人的话，这暗示着在最近的将来，你将有恋爱的机会。(但是婴儿则例外)梦见陌生小男孩，或许会有一见钟情发生，但可惜的是和他似乎无法顺利发展。梦见陌生小女孩，会有你喜欢的人已有恋人的传言。但单纯为误传的可能性很高，所以请仔细去确认两者事实上的关系。梦见陌生年轻男孩，会有花花公子型的男孩接近你。但是如果你答应的话，将来可能会后悔。梦见陌生年轻女孩，似乎会在街上巧遇喜欢的男孩。外出时，请打扮得漂亮一点。梦见陌生男性中年，经由朋友的介绍，似乎会有发展成美丽恋情的机遇。梦见陌生女性中年，会得到自己所喜欢的男孩的消息。若能把握机会展开攻势的话，会有好结果产生。梦见陌生男性老年，似乎会得到从未和他讲过话、意想不到的男孩的青睐。梦见陌生女性老年，和不怎么样的男孩的关系，似乎会引起谣传。要控制自己容易招惹误会的言行举止。梦见请求陌生人原谅，预示将经历悲伤，遭受挫折。梦见陌生人表扬自己，寓意着会受到侮辱。梦见陌生人皱眉，预示你可能会结交新朋友。梦见躺在陌生人的床上，夫妻将要离婚。'),
(41, '梦见舅舅', '梦见舅舅，会受到人们的尊重。女孩梦见舅舅，会陷入困境。犯人梦见舅舅，很快会获得自由'),
(42, '梦见裁缝', '裁缝代表了辛勤劳作与生活转机，是好的预示，梦见裁缝通常表示前一段的时间的努力会有所回报或者有好事即将发生。男人梦见裁缝，预示将发财致富，事业会上个新台阶。女人梦见裁缝，预示娘家或夫家会有大办婚礼这样的喜事。梦见自己成了裁缝，预示收入增加，经济条件转好。梦见请裁缝做新衬衣，预示家里可能将举行婚礼。梦见把裁缝叫到家里，预示子女将独立，长大成人，成家立业。梦见和裁缝交朋友，预示家里会增加额外的开销。梦见自己和裁缝吵架，预示经济上可能会承担损失。梦见与裁缝发生误会，表示你将对某项计划的结果感到不满与失望。梦见裁缝给你量尺寸，预示你将会因某事与他人发生争吵，从而使你们的关系趋于紧张。'),
(43, '梦见双胞胎', '梦见双胞胎，反映做梦人互相对立的个性以及矛盾的心理；梦见双胞胎在打架，表示内心中有强烈对立的自我。梦见双胞胎一起快乐地玩耍，表示你的内心中，虽然有不同的自我，但不同自我之间相处都很和谐。梦中的双胞胎身体瘦弱，表示你将亲临失望和痛苦的第一线。梦见四胞胎，则预示你可能要承受困难，但依然充满希望。男子梦见双胞胎，通常表示经过思虑和内心的斗争后，成家立业，事业成功。商人梦见双胞胎，预示最终会财源广进。病人梦见双胞胎，预示身体正慢慢恢复健康。'),
(44, '梦见寡妇', '梦见寡妇，通常预示你会有损失或内心悲伤。女人梦见寡妇，暗示自己对目前的生活状况表示担忧，对未来没有信心。男人梦见寡妇，表现了对女性的渴望，同时又想得到一位独立自主的女性青睐，能在事业上帮助自己。男子梦见和寡妇交谈，要小心有人造谣中伤你。梦见自己给寡妇钱，或帮助寡妇，预示你会有好运气，或者得到意外的回报。梦见和寡妇吵架，预示你会倒霉。如果梦见了披麻戴孝的寡妇，则象征你自己心中对死亡的恐惧。'),
(45, '梦见警察', '警察是具有典型男性特征的形象，有权威、规范、良心的含义。梦见警察站着，是危险的兆头。梦见与警察吵架，要多加小心，预示你会有强盗或仇人威胁你。梦见挨警察的打，预示你可能会发生营私舞弊，贪污渎职的事情，造成严重损失。梦见自己当了警察，或是当侦探去调查案件，预示你在人际关系方面将遇到挫折，可能会受到别人的造谣中伤，名誉受损，或威信扫地，陷入困境，要细致冷静地应付。梦见自己穿着警服，会受到刑事案件的牵连梦见被警察追捕，表示你可能有有些想法和冲动，在内心深处感觉是道德准则或社会规范所反对的，会受到责备，因此感到不安。这个时候的警察是超我的象征，也就是良心的化身。也有可能表示你内心中一直压抑的，少年时代对生活中那个独裁专制的父亲的怨恨。梦见和警察交谈，暗示你会得到重视和提升。梦见接受警察的盘问或问讯，提醒你要提防自己的身体健康，你可能会患病。尤其要注意饮食，对食物中毒、痢疾、便秘等消化疾病更要格外当心。梦见向警察求助，预示你会安全幸福，克服困难。梦见自己被警察抓住，预示工作将取得显着成绩，或是学习成绩进步惊人，会受到领导、上司、老师的重视，令人刮目相看。梦见犯了罪被警察抓住，读书运最好的时刻。在全班的成绩普遍低的情况下，只有你一个人是九十分以上的好成绩，必能一鸣惊人。未婚男子梦见与警察争吵，会带着自己的情侣逃跑。男人梦见请求援助，作梦人会幸福安全。女人梦见求助于警察帮助，很快要出狱。女人梦见与警察交谈，丈夫的保镖会受伤。妻子梦见和警察谈话，可能表示丈夫将遇到危险。商人梦见和警察谈话，警告你要小心提防竞争对手。官员梦见和警察谈话，预示会得到政府和警察的尊重。囚犯梦见与警察谈话，很快会被释放。惯犯梦见警察抓人，多次作案，能发大财。'),
(46, '梦见哑巴', '梦见自己成为哑巴，不祥之兆，要提防小人。梦见自己突然变成哑巴，想要张嘴却说不出话来，暗示可能有小人中伤你，你却找不出原因，让你举步艰难。梦见自己成为哑巴然后又好了，预示着自己最终战胜小人。'),
(47, '梦见明星', '名歌星出现于梦中时，则暗示与朋友有口角之争，人际关系亦将有麻烦产生。要多留意朋友嫉妒、吃醋的心理。'),
(48, '梦见弓箭手', '梦中的弓箭手，是恋爱与婚姻的代表。梦见弓弩手/弓箭手，预示你即将找到生命中的另一半，要好好珍惜。已婚人士梦见弓箭手，预示你的婚姻幸福美满，将与你的伴侣携手走过人生。'),
(49, '梦见孕妇', '预示着梦者所进行的事情非常顺利，而且金钱上会有好的运气。 　　未婚女人梦见孕妇，预示难以出嫁，或出嫁后婚姻会出现问题，如争吵分歧等，让家庭不和。'),
(50, '梦见妓女', '梦见自己是妓女，预示你将因自己表现恶劣，让正直的朋友看不起你。年轻女子梦见妓女，预示她会欺骗她心爱的人，让其相信自己是纯洁的，坦诚的。对于已婚女人，此梦过后，她将开始怀疑丈夫，因此不断地争吵。梦见与妓女相殴，梦主得情助势，门户昌荣气象之兆。技艺之人争长夺色。老者梦此，主有虚症，不祥。梦见与妓女为夫妻，大吉，梦此者夫妻昌吉也。未配者主得技艺美色之妻。如素爱烟花之人，为与妓女合心。梦见与妓女相别，吉，此梦阴事之非远离之象。凡事得理，疾病脱身。其占为浪子回头，花凋蝶散。'),
(51, '梦见已故的祖父母', '梦见已故的祖父带着农具去种地，父亲或家里的其他人会调动工作岗位或搬家。梦见已故的祖父赶着一头母牛来到院里或将牛栓在牛棚，预示即将迎来儿媳、家庭主妇或妻子，或者得到意外的财物。梦见已故的祖父抚摸孙子，在现实中里的孙子会患病。梦见已故的祖父背着孙子或领到屋外，预示近期内孙子会死亡。梦见已故的祖父母欲向自己说什么话，这是预示有事情将发生，需要倍加小心。梦见已故的祖父母再世后准备带着自己外出，这是警告你有可能由于意外的事故或疾病而死亡，又或者面临严重的忧患。'),
(52, '梦见坏人', '梦见坏人预示者你似乎正向往着危险的恋爱。例如想抢夺朋友的男友，或是想和有妇之夫的他度过危险偷情的一夜等等。如果你已有男朋友的话，梦见坏人预示着是否浮动的心正开始萌芽。'),
(53, '梦见犯人', '梦见与犯人交谈，要遭厄运，要提高警惕，避免灾祸。梦见与犯人交朋友，暗示你可能会结交品行不良的朋友，给你造成严重损失。梦见与囚犯吵架，烦恼和灾祸会过去，将要过上称心如意的日子。梦见犯人逃走，病患即将好转。犯人梦见获得大赦或无罪释放，家里的房屋有危险'),
(54, '梦见帅哥', '梦见一帅哥被我打了，这是你潜意识的作用，在现实上，你可能比较在意这样的帅哥，有想接近的冲动，但你把这种冲动压抑在内心深处它，然后在梦中把压抑释放了出来，成一个暴力动作。梦中知道对方是个帅哥，但模模糊糊地看不清样子，好幸福的感觉。代表你的内心深处已经厌倦了你男朋友。哎！解铃还需系铃人，是因为你的男朋友和你太少的接触，所以你会在梦里面梦不到他。你们要是天天都在一起做一些有意义的事。做一些比较开心的事。我想你晚上也能梦到他的。女人若梦见帅哥的话一般意味着以后可能会被人追求或代表着你希望有人来爱你，真诚对待你。'),
(55, '梦见日本人', '梦见日本人，预示能从敌人的魔爪中逃跑出来。未婚者梦见日本人，预兆您的爱情可成功。但双方不可我行我素。待业者梦见日本人，说明您的财运不顺，需待时机。'),
(56, '梦见处女', '梦见处女，预示你的事业将会福星高照。已婚女人梦见自己仍是处女，表示她会对自己曾经做过的某些事情感到羞愧和后悔，但悔过的心并不会给她带来好运。一个年轻女子梦见自己已不再是处女，预示她与男性之间行为的不失检点会损及自己的名誉。男人梦见和一个处女保持不正当关系，预示他不管如何努力也将无法完成原定的某项计划，别人的行为倒会给他带来很多麻烦；或预示他的理想会由于合作缺乏保障而无法实现。'),
(57, '梦见老情人', '很多人都会梦到老情人，(即过去的男女朋友或自己曾爱慕的对象)首先说明你在心中还留有他的位置，不管这个位置是好是坏，至少他还占着一点分量。梦见老情人，表示一些消极的态度，和令你困扰的人际关系。梦见和对方关系很差，代表你的人际关系会转好，还有你和对方的关系有可能以另一种形式出现。梦见和对方关系很好、相处得很开心，是反映了你现在寂寞的心态。梦见和对方结婚，则代表你和他的关系已经划清界线，你是完全决绝的了。已有伴侣的朋友梦见老情人，往往显示梦者对身边伴侣有所不满，而伴侣无意作出迁就。梦者在现实生活中已有异心，但未找到可以取代伴侣的人，因而令脑海产生找寻旧档案的讯息。一些从前曾经爱慕而无结果的爱情，成为暂代品。但这却不足以表示你们即将分手，相反等你醒来好好考虑一下现实情况，会更加珍惜身边人，为对方做出改变。经常梦见老情人，这时就该检讨与爱侣的感情，若让情况持续，梦者一旦在现实生活遇到投缘的异性，多会不能自制，出现三角关系。梦见老情人再次伤害或背叛你，让你在梦中痛不欲生，这或许则是在提醒你，不要在感情上再犯相同的愚蠢错误，小心审视身边伴侣。单身的朋友梦见老情人，或许你真的觉得寂寞了，很想渴望爱情的到来。而在没有具体想象对象的时候，老情人就出现在梦中。这时候你就该好好调整下自己的状态，时刻准备着，抓住任何爱情的机会哦。'),
(58, '梦见第三者', '梦见第三者，吉兆，预示着爱情会很甜蜜。'),
(59, '梦见白马王子', '女人梦见白马王子，说明心里极度缺乏爱的感觉，有滥交的可能性。少女梦见白马王子，即将要交到男朋友，但一定不是自己称心如意或者能过一辈子的那种。未婚女子梦见白马王子，将和男朋友分手，婚姻大事将会无限期拖延。已婚女子梦见白马王子，家庭关系要出现危机，和丈夫将有离婚的危险，有外遇的可能性大于百分之六十。'),
(60, '梦见仇人', '梦见仇人，预示你将取得成就，困难将过去，未来会有好运，值得期待。梦见和仇人交朋友，预示你将结交很多新朋友，帮助你获得成功。梦见和仇人争吵，则预示你会遭受损失。梦见仇人难过，预示你会打赢官司，或是战胜敌手。梦见收到了仇人死亡的消息，预示你会有宽容又忠实可靠的朋友。商人梦见仇人，预示你能打败对手占领市场。商人梦见仇人攻击自己，预示生意上会遇到挫折。女人梦见丈夫的情妇，预示你将赢得丈夫。'),
(61, '梦见美女', '梦见与美貌女子交往，为破财之兆。 　　梦见跟一个陌生的同龄美女长成了好朋友，说明交朋友，希望自己的快乐苦恼能和别人分享和承担，可能现实中缺少这种朋友关系，有什么事情都是自己扛。'),
(62, '梦见喜欢的人', ''),
(63, '梦见外星人', '梦见外星人就在自己眼前，预示你有好运气，可能会有意想不到的收获。梦见外星人可能暗示着生活被某种外来因素所左右，或者对自己所处的环境还不太了解。'),
(64, '梦见毛主席', '梦见毛主席，朋友运好转。与朋友将有顺利的交往；与双亲和兄弟之间的关系也将非常好。梦见和毛主席握手，表示健康良好，将会变得越来越健康。二，三天连续熬夜看手也无所谓，加油吧!未婚的人梦见和毛主席握手，您的恋情性急则不成，耐心则成功。未婚男女梦见毛主席，您的恋情问题会有，但要主动去解决，好运才会来。老人梦见毛主席预示出远门，佳，可获得利益。生意人梦见毛主席，说明您的财运可聚财。求学者梦见和毛主席握手，说明考试成绩一般。病人梦见和毛主席握手，说明这段时间您的运气：外表美观而内在空虚，所以要先充实内在，才有好运气。要提防小人诽谤。'),
(65, '梦见陆军 ', '梦见整齐的陆军队列向你开来或立在原地，暗示你有勇往直前积极进取的精神，并会踏踏实实，稳步追求事业的发展。梦见壮观的陆军队列，或挺拔的陆军战士，有时也可能仅仅表示你对军人阳刚气质的向往，或是过去有过参军的愿望。男人梦见陆军，预示事业要大步向前，稳定发展。女人梦见陆军，预示生活舒适，生活质量稳步提高。'),
(66, '梦见风骚女子', '梦见看到一位风骚的女子，表示你有狡猾的敌人需要你去征服。梦见你杀死一名风骚女子，意味着你的欲望会实现。年轻女性梦见风骚女人，梦到她的行径快要比得上风骚女子的行径了，意味着她需要男人的保护。'),
(67, '梦见久未见面的人', '梦见久未见面的人时，寓意着此人将会很快归来。'),
(68, '梦见工人', '通常来说梦中的男建筑工人，有父亲的意味，充满力量，搭建遮风避雨的房屋。梦见有一个建筑工或维修工修理你的房子，预示你将反思出你生活中的问题，并对它加以解决。梦中的房子象征自我。梦见一个工人在疏通管道，预示你将解决情感积郁的问题。梦见技工，或技工面对着一堆拆零的零件，象征自己面对着生活中一摊乱麻般的局面，并为要理清头绪，解决现状，感到异常苦恼。梦见井下作业的矿工，则有可能暗示你正在探索自己幽暗的内心深处。梦见管道工，则表示你对内心精神或情感的摸索。孕妇梦见管道工，还有可能是妇道医生的形象在梦里的显现。'),
(69, '梦见厨师', '梦见厨师在准备宴会，喜庆的日子将要到来。梦见厨师教你烹调，在金钱方面有暗影出现。 这时很容在路上或公共汽车上遗失钱财，小心不要带太多的钱出门。'),
(70, '梦见陆军', '梦见整齐的陆军队列向你开来或立在原地，暗示你有勇往直前积极进取的精神，并会踏踏实实，稳步追求事业的发展。梦见壮观的陆军队列，或挺拔的陆军战士，有时也可能仅仅表示你对军人阳刚气质的向往，或是过去有过参军的愿望。男人梦见陆军，预示事业要大步向前，稳定发展。女人梦见陆军，预示生活舒适，生活质量稳步提高。'),
(71, '梦见烧香的人', '梦见烧香的人，表示你的感情已经成熟，你的另一半也很优秀，很受到肯定，在不久之后你们就能共结礼堂。'),
(72, '梦见神秘人', '梦中你看见很神秘的人，则意味着你的运气会变好或变坏，而这也要看个人的长相是不是好看或难看，有没有畸形而定。'),
(73, '梦见亿万富豪', '梦见成为亿万富豪，则近日营业将会损失惨重。'),
(74, '梦见跛子', '梦见跛子，在遇到困境时你不会知道求助于朋友。梦见自己成了跛子，会遇到难以克服的困难。梦见爬墙时摔跛了腿，会取得成功。'),
(75, '梦见虐待狂', '虐待狂象征着被误导的生命力，也暗示着清醒状态下的受虐天性。梦见自己变成虐待狂，人际上将出现大的问题，须学会自我反顾。梦见自己被虐待狂虐待，暗示着梦者在现实心里上渴望被虐待。'),
(76, '梦见贵人', '梦见贵人表示你能够出人头地的机会很大，未来有一番作为。梦见领袖，则表示心灵上得到安详;如果梦见领袖在行事，则会受到赏识。一般人梦见自己在贵人面前，表示将会出人头地;但若梦中与贵人为对等地位，则有忧事将至。'),
(77, '梦见窃贼', '梦见窃贼进入梦境，表示梦者经历着个人氛围的损害。产生的原因可能在外部，可是造成了愈来愈大的内心恐惧和困难的感觉。梦见窃贼在搜你的身，你将遇到强劲的竞争对手，在和陌生人交往时要万分小心，否则你将被对手打垮。梦见家或公司被人室盗窃。你在社会上和事业上的名望会受到质疑，但你直面困难的勇气将保护你。此梦后，可能由于疏忽而发生事故。'),
(78, '梦见赤裸的男人', '梦见赤裸的男人，将会感到忧愁和悲伤。梦到男人浑身赤裸，在清清的水中游泳，预示将有许多人爱(羡)慕她；如果水很浑浊，仰慕者将因为嫉妒而恶意造谣。'),
(79, '梦见两性人', '梦见两性人或雌雄同体的生物表示梦者对自己的性别角色存在疑问或者不满意。此外，如果梦者希望对本身有进一步的了解，他就必须努力在自己理性的一面和感性的一面作出平衡，而这种心理状态会在他的梦中以两性人的形式表现出来。梦中出现的两性人表示一种完全的平衡。'),
(80, '梦见嫂子', '经常梦见我嫂子，有可能和植物神经功能紊乱有关。建议注意休息，避免精神紧张，放松心情，药物方面可以给与谷维素片口服治疗。梦见跟嫂子发生关系，亲情缺乏和渴望的表现。梦见怀孕的嫂子遇难，梦中的死亡多与新生有关。你的嫂子和她的宝宝会平安无事，不久之后你将会听到宝宝出世的消息。'),
(81, '梦见工人', '通常来说梦中的男建筑工人，有父亲的意味，充满力量，搭建遮风避雨的房屋。梦见有一个建筑工或维修工修理你的房子，预示你将反思出你生活中的问题，并对它加以解决。梦中的房子象征自我。梦见一个工作在疏通管道，预示你将解决情感积郁的问题。梦见技工，或技工面对着一堆拆零的零件，象征自己面对着生活中一摊乱麻般的局面，并为要理清头绪，解决现状，感到异常苦恼。梦见井下作业的矿工，则有可能暗示你正在探索自己幽暗的内心深处。梦见管道工，则表示你对内心精神或情感的摸索。孕妇梦见管道工，还有可能是妇道医生的形象在梦里的显现。'),
(82, '梦见国王', '国王是统帅全国，为民排忧解难的形象。梦见国王，预示你将有机会面对富贵荣耀，但同时也意味着你会有忧愁烦闷，承担责任，为此你将奋力与现实博斗，并需要保持充足的自信心。梦见自己和国王对话，预示你勇于承担责任，不畏惧矛盾或痛苦，最终必将功成名就。'),
(83, '梦见老太太', '梦见个老太太送小孩给我，非孕妇的梦中可能表过潜意识中想要个孩子的愿望。梦见和老太太结婚，会得到遗产。'),
(84, '梦见皇帝', '梦中的皇帝，按照心理分析的观点，象征父权。通常来说，男人梦见如在电视剧中的情景一般，在金碧辉煌的房间里，看见黄袍加身的皇帝，预示会加官晋爵，发财兴旺。梦见被皇帝召见，对官场中人预示要升官。除此之外，做这个梦还可能预示工作中可能会遇到风波，尤其是要注意涉及大宗财务支出方面的事情。梦见被皇帝责罚，象征家业昌盛，人丁兴旺，子孙满堂。梦见与帝王对话、交谈，则暗示你凭借长辈指点或贵人相助，将走上荣身之路，梦想总有一天能够实现，将来定会功成名就。梦见自己是皇帝，则是在提醒你做事要多听各方面的意见，顾全大局，切忌独断专行。女人梦见皇帝，预示生活幸福，衣食无忧。商人梦见皇帝，预示财源广进，生意兴隆。'),
(85, '梦见陌生男人', '梦见男性老年 似乎会得到从未和他讲过话、意想不到的男孩的青睐。'),
(86, '梦见老伯伯', '梦见一位老伯伯变成小孩子，要小心提防，比你年长的人会陷害你。'),
(87, '梦见小人', '梦见小人，预示身边有人正隐瞒一些对于你很重要的事情，可能会有不顺利的事情发生。也意味着要调动工作，财源会旺盛。女性梦见小人预兆有机会旅行，一路平安，有友相伴。待业者梦见小人主钱财方面：佳，但防投资错误。老人梦见小人则您的运气平平，安守本份，可保平安，否则会招致坏运。'),
(88, '梦见木匠', '梦见木匠，寓意创造奇迹，生活美好。梦见和木匠吵架，是提示你某项预算花销太大，要开源节流。梦见木匠盖新房子，表示你会在政绩、学术或艺术领域等方面取得杰出成绩。梦见自己家请木匠做工，并且木匠手艺高超，做工精致，表示你是个很会享受生活的人，日子安逸舒适。梦见木匠在干木工活，预示你将从事正当诚实的劳动，排斥自私的消遣和娱乐活动，踏踏实实地改变自己的生活。男人梦见木匠，预示不久会收到好消息。女人梦见木匠，会成为精明能干的持家能手。'),
(89, '梦见故人', '梦见故人，孩子要成亲。梦见故人死亡，朋友运下降。因为你的竞争意识太强，所以让别人敬而远之。尤其在考试之后，这种现象特别明显，实在有反省的必要。梦见故人哭，服刑期间会做苦力待业者梦见故人哭主财运：初运佳，但防后运衰退。梦见故人借钱，人际关系方面运气上升的可能性很大。你与亲友的交情将更加深厚，有什么困难，都可以与之商量，对方一定可以替你分忧已婚者梦见故人借钱要出远门，最好不要立刻出发，等待好时机吧!梦见故人被追打，努力拼搏能赚钱。同时，在异性方面也会有所收获。将会有一次新的交际，相逢的地方是朋友家。但这次交往是否会发展成为恋爱，要看以后的进展情况。老人梦见故人则近期运势运程，运气不通，诸事不如意，避免与人发生纠纷，及家庭不和。老人梦见故人被追打则您的运势，万事如意。如果不谦虚，反而骄傲横行，则容易招到祸害。病人梦见故人死亡则近期运程，困难多，万事不如意。有小人加害，须小心谨慎。但不要悲观，要退一步想，以待好运来。未婚的人梦见故人哭预兆您的爱情：成功。待业者梦见故人被追打说明您的财运佳。未婚男女梦见故人被追打解释：最近爱情方面耐心则成功。'),
(90, '梦见小朋友', '梦见一位很可爱、趣致的小朋友，你会收到年终的奖金、双薪。');

-- --------------------------------------------------------

--
-- 表的结构 `wy_estate`
--

CREATE TABLE IF NOT EXISTS `wy_estate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `matchtype` tinyint(11) NOT NULL,
  `cover` varchar(200) NOT NULL,
  `panorama_id` int(11) NOT NULL,
  `classify_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `banner` varchar(200) NOT NULL,
  `banner1` varchar(200) NOT NULL,
  `banner2` varchar(200) NOT NULL,
  `banner3` varchar(200) NOT NULL,
  `banner4` varchar(200) NOT NULL,
  `banner5` varchar(200) NOT NULL,
  `house_banner` varchar(200) NOT NULL,
  `place` varchar(11) NOT NULL,
  `lng` varchar(15) NOT NULL,
  `lat` varchar(15) NOT NULL,
  `estate_desc` text NOT NULL,
  `project_brief` text NOT NULL,
  `traffic_desc` text NOT NULL,
  `video` varchar(300) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `token_2` (`token`),
  FULLTEXT KEY `token` (`token`),
  FULLTEXT KEY `title` (`title`),
  FULLTEXT KEY `keyword` (`keyword`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_estate_album`
--

CREATE TABLE IF NOT EXISTS `wy_estate_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `poid` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate_album`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_estate_expert`
--

CREATE TABLE IF NOT EXISTS `wy_estate_expert` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `face` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate_expert`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_estate_housetype`
--

CREATE TABLE IF NOT EXISTS `wy_estate_housetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panorama_id` int(10) NOT NULL DEFAULT '0',
  `son_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `floor_num` varchar(20) NOT NULL,
  `area` varchar(50) NOT NULL,
  `fang` int(11) NOT NULL,
  `ting` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `abid` varchar(200) NOT NULL,
  `type1` varchar(200) NOT NULL,
  `type2` varchar(200) NOT NULL,
  `type3` varchar(200) NOT NULL,
  `type4` varchar(200) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate_housetype`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_estate_impress`
--

CREATE TABLE IF NOT EXISTS `wy_estate_impress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `is_show` int(11) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate_impress`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_estate_impress_add`
--

CREATE TABLE IF NOT EXISTS `wy_estate_impress_add` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imp_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate_impress_add`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_estate_son`
--

CREATE TABLE IF NOT EXISTS `wy_estate_son` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `description` varchar(200) NOT NULL,
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_estate_son`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ext_printer`
--

CREATE TABLE IF NOT EXISTS `wy_ext_printer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `print_count` int(10) NOT NULL DEFAULT '1',
  `template` varchar(20) NOT NULL,
  `deal_order` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` varchar(13) NOT NULL,
  `product_cart_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ext_printer`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ext_printer_task`
--

CREATE TABLE IF NOT EXISTS `wy_ext_printer_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `print_status` varchar(11) NOT NULL,
  `deal_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ext_printer_task`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_feiyin`
--

CREATE TABLE IF NOT EXISTS `wy_feiyin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `member_code` varchar(100) NOT NULL,
  `feyin_key` varchar(100) NOT NULL,
  `device_no` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_feiyin`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_files`
--

CREATE TABLE IF NOT EXISTS `wy_files` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `size` int(10) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_files`
--

INSERT INTO `wy_files` (`id`, `token`, `url`, `size`, `type`, `time`) VALUES
(1, 'pgtepl1400696466', 'http://wx.0724s.com/uploads/p/pgtepl1400696466/1/4/4/f/thumb_537ec5b81a88b.jpg', 5101, 'jpg', 1400817080),
(2, 'pgtepl1400696466', 'http://wx.0724s.com/uploads/p/pgtepl1400696466/d/4/9/b/thumb_537ec6251f8b8.jpg', 5101, 'jpg', 1400817189),
(3, 'pgtepl1400696466', 'http://wx.0724s.com/uploads/p/pgtepl1400696466/c/9/5/b/thumb_537ec78ab929c.jpg', 5132, 'jpg', 1400817546);

-- --------------------------------------------------------

--
-- 表的结构 `wy_flash`
--

CREATE TABLE IF NOT EXISTS `wy_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `img` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `info` varchar(90) NOT NULL,
  `tip` smallint(2) NOT NULL DEFAULT '1',
  `sorts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_flash`
--

INSERT INTO `wy_flash` (`id`, `token`, `img`, `url`, `info`, `tip`, `sorts`) VALUES
(1, 'pxhsnk1400821588', 'http://wx.0724s.com/tpl/static/attachment/focus/default/4.jpg', 'http://api.map.baidu.com/marker?location=28.003659,120.698987&amp;title=fdgdfgsdfgsdfgsdfg&amp;content=浙江省温州市鹿城区绣山路1号&amp;output=html', 'fvcf', 1, 3),
(2, 'pxhsnk1400821588', 'http://wx.0724s.com/tpl/static/attachment/focus/default/6.jpg', 'http://api.map.baidu.com/marker?location=28.003659,120.698987&amp;title=fdgdfgsdfgsdfgsdfg&amp;content=浙江省温州市鹿城区绣山路1号&amp;output=html', '2', 1, 6),
(3, 'pxhsnk1400821588', 'http://wx.0724s.com/tpl/static/attachment/background/view/34.jpg', '', '', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_follow`
--

CREATE TABLE IF NOT EXISTS `wy_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_form_id` varchar(100) NOT NULL,
  `follow_to_id` varchar(100) NOT NULL,
  `follow_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_follow`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_forum_comment`
--

CREATE TABLE IF NOT EXISTS `wy_forum_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `content` varchar(3000) NOT NULL,
  `createtime` int(11) NOT NULL,
  `favourid` varchar(3000) DEFAULT NULL,
  `replyid` varchar(3000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_forum_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_forum_config`
--

CREATE TABLE IF NOT EXISTS `wy_forum_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bgurl` varchar(200) NOT NULL DEFAULT '',
  `picurl` varchar(200) NOT NULL DEFAULT '',
  `comcheck` varchar(4) NOT NULL DEFAULT '',
  `intro` varchar(600) NOT NULL DEFAULT '',
  `ischeck` tinyint(4) NOT NULL DEFAULT '0',
  `pv` float NOT NULL DEFAULT '0',
  `forumname` char(60) DEFAULT NULL,
  `qlogo` varchar(200) DEFAULT NULL,
  `token` varchar(50) NOT NULL,
  `isopen` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_forum_config`
--

INSERT INTO `wy_forum_config` (`id`, `bgurl`, `picurl`, `comcheck`, `intro`, `ischeck`, `pv`, `forumname`, `qlogo`, `token`, `isopen`) VALUES
(1, '', '', '0', '', 0, 0, '东风浩荡绥芬河市官方粉丝社区', NULL, 'pxhsnk1400821588', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_forum_message`
--

CREATE TABLE IF NOT EXISTS `wy_forum_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(3000) NOT NULL,
  `createtime` int(11) NOT NULL,
  `fromuid` varchar(50) NOT NULL,
  `touid` varchar(40) NOT NULL,
  `fromuname` varchar(60) DEFAULT NULL,
  `touname` varchar(60) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `isread` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_forum_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_forum_topics`
--

CREATE TABLE IF NOT EXISTS `wy_forum_topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `content` varchar(1500) NOT NULL,
  `likeid` varchar(3000) DEFAULT NULL,
  `commentid` varchar(3000) DEFAULT NULL,
  `favourid` varchar(3000) DEFAULT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `photos` varchar(300) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_forum_topics`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_function`
--

CREATE TABLE IF NOT EXISTS `wy_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` tinyint(3) NOT NULL,
  `usenum` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `funname` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `isserve` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- 转存表中的数据 `wy_function`
--

INSERT INTO `wy_function` (`id`, `gid`, `usenum`, `name`, `funname`, `info`, `isserve`, `status`) VALUES
(1, 1, 0, '天气查询', 'tianqi', '天气查询服务:例  城市名+天气', 1, 1),
(2, 1, 0, '糗事', 'qiushi', '糗事　直接发送糗事', 1, 1),
(3, 1, 0, '计算器', 'jishuan', '计算器使用方法　例：计算50-50　，计算100*100', 1, 1),
(4, 4, 0, '朗读', 'langdu', '朗读＋关键词　例：朗读宏宏CMS', 1, 1),
(5, 3, 0, '健康指数查询', 'jiankang', '健康指数查询　健康＋高，＋重　例：健康170,65', 1, 1),
(6, 1, 0, '快递查询', 'kuaidi', '快递＋快递名＋快递号　例：快递顺丰117215889174', 1, 1),
(7, 1, 0, '笑话', 'xiaohua', '笑话　直接发送笑话', 1, 1),
(8, 2, 0, '藏头诗', 'changtoushi', ' 藏头诗+关键词　例：藏头诗我爱你', 1, 1),
(9, 1, 0, '陪聊', 'peiliao', '聊天　直接输入聊天关键词即可', 1, 0),
(10, 4, 0, '聊天', 'liaotian', '聊天　直接输入聊天关键词即可', 1, 1),
(11, 3, 0, '周公解梦', 'mengjian', '周公解梦　梦见+关键词　例如:梦见父母', 1, 1),
(12, 2, 0, '语音翻译', 'yuyinfanyi', '翻译＋关键词 例：翻译你好', 1, 1),
(13, 2, 0, '火车查询', 'huoche', '火车查询　火车＋城市＋目的地　例火车上海南京', 1, 1),
(14, 2, 0, '公交查询', 'gongjiao', '公交＋城市＋公交编号　例：上海公交774', 1, 1),
(15, 2, 0, '身份证查询', 'shenfenzheng', '身份证＋号码　　例：身份证342423198803015568', 1, 1),
(16, 1, 0, '手机归属地查询', 'shouji', '手机归属地查询(吉凶 运势) 手机＋手机号码　例：手机13917778912', 1, 1),
(17, 3, 0, '音乐查询', 'yinle', '音乐＋音乐名  例：音乐爱你一万年', 1, 1),
(18, 1, 0, '附近周边信息查询', 'fujin', '附近周边信息查询(ＬＢＳ）', 1, 1),
(19, 4, 0, '幸运大转盘', 'choujiang', '输入抽奖　即可参加幸运大转盘抽奖活动', 2, 1),
(20, 3, 0, '淘宝店铺', 'taobao', '输入淘宝＋关键词　即可访问淘宝3g手机店铺', 2, 1),
(21, 4, 0, '会员资料管理', 'userinfo', '会员资料管理　输入会员　即可参与', 2, 1),
(22, 1, 0, '翻译', 'fanyi', '翻译＋关键词 例：翻译你好', 1, 1),
(23, 4, 0, '第三方接口', 'api', '第三方接口整合模块，请在管理平台下载接口文件并配置接口信息，', 1, 1),
(24, 1, 0, '姓名算命', 'suanming', '姓名算命 算命＋关键词　例：算命李白', 1, 1),
(25, 3, 0, '百度百科', 'baike', '百度百科　使用方法：百科＋关键词　例：百科北京', 2, 1),
(26, 2, 0, '彩票查询', 'caipiao', '回复内容:彩票+彩种即可查询彩票中奖信息,例：彩票双色球', 1, 1),
(27, 4, 0, '抽奖', 'choujiang', '抽奖,输入抽奖即可参加幸运大转盘', 1, 1),
(28, 4, 0, '刮刮卡', 'gua2', '刮刮卡抽奖活动', 1, 1),
(29, 1, 0, '3G首页', 'shouye', '输入首页,访问微3g 网站', 1, 1),
(30, 1, 0, 'DIY宣传页', 'adma', 'DIY宣传页,用于创建二维码宣传页权限开启', 1, 1),
(31, 4, 0, '会员卡', 'huiyuanka', '尊贵享受vip会员卡,回复会员卡即可领取会员卡', 1, 1),
(33, 4, 0, '官网帐号审核', 'shenhe', '官网帐号审核', 1, 1),
(34, 1, 0, '歌词查询', 'geci', '歌词查询 回复歌词＋歌名即可查询一首歌曲的歌词,例：歌词醉清风', 1, 1),
(35, 2, 0, '域名whois查询', '', '域名whois查询　回复域名＋域名 可查询网站备案信息,域名whois注册时间等等\r\n 例：域名138wo.com', 1, 1),
(36, 4, 0, '通用预订系统', 'host_kev', '通用预订系统 可用于酒店预订，ktv订房，旅游预订等。', 2, 1),
(55, 4, 0, '水果机', 'LuckyFruit', '水果机', 1, 1),
(56, 4, 0, '微汽车', 'car', '微汽车', 1, 1),
(57, 4, 0, '留言板', 'message', '留言板', 1, 1),
(38, 4, 0, '自定义表单', 'diyform', '自定义表单(用于报名，预约,留言)等', 1, 1),
(39, 2, 0, '无线网络订餐', 'dx', '无线网络订餐', 1, 1),
(40, 2, 0, '在线商城', 'shop', '在线商城,购买系统', 1, 1),
(41, 2, 0, '在线团购系统', 'etuan', '在线团购系统', 1, 1),
(42, 4, 0, '自定义菜单', 'diymen_set', '自定义菜单,一键生成轻app', 1, 1),
(43, 4, 0, '360全景', 'Panorama', '360全景', 2, 1),
(44, 4, 0, '微喜帖', 'wedding', '微喜帖', 1, 1),
(45, 4, 0, '预约', 'Yuyue', '预约', 2, 1),
(47, 4, 0, '微医疗', 'Yiliao', '微医疗提供挂号预约服务', 2, 1),
(48, 4, 0, '微贺卡', 'Greeting_card', '微贺卡', 2, 1),
(49, 4, 0, '微酒店', 'Jiudian', '微酒店', 2, 1),
(50, 4, 0, '微调研', 'Diaoyan', '微调研', 2, 1),
(51, 4, 0, '微房产', 'estate', '微房产', 1, 1),
(58, 4, 0, '砸金蛋', 'GoldenEgg', '砸金蛋', 1, 1),
(53, 4, 0, '会员资料管理', 'userinfo', '会员资料管理　输入会员　即可参与', 2, 1),
(59, 4, 0, '投票', 'vote', '', 1, 1),
(60, 4, 0, '3G相册', 'album', '', 1, 1),
(61, 4, 0, '优惠券', 'Coupon', '', 1, 1),
(63, 4, 0, '微论坛', 'forum', '微论坛', 1, 1),
(64, 4, 0, '微医疗', 'medical', '', 1, 1),
(65, 4, 0, '群发消息', 'message', '', 1, 1),
(66, 4, 0, '分享统计', 'share', '', 1, 1),
(67, 4, 0, '酒店宾馆', 'hotel', '', 1, 1),
(68, 4, 0, '微教育', 'school', '', 1, 1),
(69, 4, 0, '摇一摇', 'shake', '', 1, 1),
(70, 4, 0, '微信墙高级版', 'wall', '', 1, 1),
(71, 4, 0, '微路由', 'wifi', '', 1, 1),
(72, 4, 0, '人工客服', 'kefu', '', 1, 1),
(74, 4, 0, '粉丝行为分析', 'behavior', '', 1, 1),
(75, 4, 0, '大转盘', 'lottery', '', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_greeting_card`
--

CREATE TABLE IF NOT EXISTS `wy_greeting_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `num` int(11) NOT NULL,
  `click` int(11) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  `bakcground_url` varchar(200) NOT NULL,
  `mp3` varchar(200) NOT NULL,
  `type` smallint(2) NOT NULL,
  `style` tinyint(2) NOT NULL,
  `name` varchar(60) NOT NULL,
  `zfname` varchar(60) NOT NULL,
  `copy` varchar(200) NOT NULL,
  `info` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_greeting_card`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_heka`
--

CREATE TABLE IF NOT EXISTS `wy_heka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `bg_topic` varchar(100) DEFAULT NULL,
  `bg_music` varchar(100) DEFAULT NULL,
  `bg_action` int(2) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `sub` varchar(20) DEFAULT NULL,
  `show` int(1) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `banquan` varchar(100) DEFAULT NULL COMMENT '版权',
  `see` int(20) DEFAULT '0' COMMENT '查看次数',
  `forwards` int(20) DEFAULT '0' COMMENT '转发次数',
  `keyword` varchar(50) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_heka`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_home`
--

CREATE TABLE IF NOT EXISTS `wy_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(30) NOT NULL,
  `picurl` varchar(120) NOT NULL,
  `homeurl` varchar(150) NOT NULL DEFAULT '',
  `apiurl` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `info` varchar(120) NOT NULL,
  `plugmenucolor` varchar(10) NOT NULL DEFAULT '',
  `copyright` varchar(200) NOT NULL DEFAULT '',
  `advancetpl` tinyint(1) NOT NULL DEFAULT '0',
  `bjdh` int(11) NOT NULL,
  `dianhua` char(200) NOT NULL,
  `musicurl` varchar(200) NOT NULL,
  `tongji` varchar(1000) NOT NULL,
  `play_img` varchar(10) NOT NULL DEFAULT 'on',
  `play_audio` varchar(10) NOT NULL DEFAULT 'on',
  `play_wifi` varchar(10) NOT NULL DEFAULT 'off',
  `radiogroup` mediumint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wy_home`
--

INSERT INTO `wy_home` (`id`, `token`, `title`, `picurl`, `homeurl`, `apiurl`, `logo`, `info`, `plugmenucolor`, `copyright`, `advancetpl`, `bjdh`, `dianhua`, `musicurl`, `tongji`, `play_img`, `play_audio`, `play_wifi`, `radiogroup`) VALUES
(1, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 'on', 'on', 'off', 9),
(2, 'pxhsnk1400821588', '中华人民共和国', 'http://wx.0724s.com/tpl/static/attachment/background/view/2.jpg', 'http://wx.0724s.com/tpl/static/attachment/background/view/34.jpg', '', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/clock.png', 'cvgdfghfghfdghdfghdfghdfghdfghdfhfg', '', '', 0, 1, '', 'http://wx.0724s.com/tpl/static/attachment/music/default/1.mp3', '', 'on', 'on', 'off', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_host`
--

CREATE TABLE IF NOT EXISTS `wy_host` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL COMMENT '关键词',
  `title` varchar(50) NOT NULL COMMENT '商家名称',
  `address` varchar(50) NOT NULL COMMENT '商家地',
  `tel` varchar(13) NOT NULL COMMENT '商家电话',
  `tel2` varchar(13) NOT NULL COMMENT '手机号',
  `ppicurl` varchar(250) NOT NULL COMMENT '订房封面图片',
  `headpic` varchar(250) NOT NULL COMMENT '订单页头部图片',
  `name` varchar(50) NOT NULL COMMENT '文字描述',
  `sort` int(11) NOT NULL COMMENT '排序',
  `picurl` varchar(100) NOT NULL COMMENT '图片地址',
  `url` varchar(50) NOT NULL COMMENT '图片跳转地址以http',
  `info` text NOT NULL COMMENT '商家介绍：',
  `info2` text NOT NULL COMMENT '订房说明u',
  `creattime` int(11) NOT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_host`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_host_list_add`
--

CREATE TABLE IF NOT EXISTS `wy_host_list_add` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL COMMENT '商家id',
  `token` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT '房间类型',
  `typeinfo` varchar(100) NOT NULL COMMENT '简要说明',
  `price` decimal(10,2) NOT NULL COMMENT '原价：',
  `yhprice` decimal(10,2) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '文字描述',
  `picurl` varchar(110) NOT NULL COMMENT '图片地址',
  `url` varchar(100) NOT NULL COMMENT '图片跳转地址以http',
  `info` text NOT NULL COMMENT '配套设施',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_host_list_add`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_host_order`
--

CREATE TABLE IF NOT EXISTS `wy_host_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `book_people` varchar(50) NOT NULL COMMENT '预订人',
  `tel` varchar(13) NOT NULL COMMENT '电话',
  `check_in` int(11) NOT NULL COMMENT '入住时间',
  `check_out` int(11) NOT NULL COMMENT '离开时间',
  `room_type` varchar(50) NOT NULL COMMENT '房间类型',
  `book_time` int(11) NOT NULL COMMENT '预订时间',
  `book_num` int(11) NOT NULL COMMENT '预订数量',
  `price` decimal(10,2) NOT NULL COMMENT ' 价格',
  `order_status` int(11) NOT NULL COMMENT '订单状态 1 成功,2 失败,3 未处理',
  `hid` int(11) NOT NULL COMMENT '订房商家id',
  `remarks` varchar(250) NOT NULL COMMENT '留言备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_host_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_hotels_house`
--

CREATE TABLE IF NOT EXISTS `wy_hotels_house` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `token` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `note` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `sid` (`sid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_hotels_house`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_hotels_house_sort`
--

CREATE TABLE IF NOT EXISTS `wy_hotels_house_sort` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `token` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `vprice` float NOT NULL,
  `note` varchar(500) NOT NULL,
  `num` tinyint(1) unsigned NOT NULL,
  `houses` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_hotels_house_sort`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_hotels_order`
--

CREATE TABLE IF NOT EXISTS `wy_hotels_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `wecha_id` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `nums` smallint(3) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `time` int(11) NOT NULL,
  `startdate` int(8) unsigned NOT NULL,
  `enddate` int(8) unsigned NOT NULL,
  `paid` tinyint(1) unsigned NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `printed` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`,`wecha_id`),
  KEY `token` (`token`),
  KEY `orderid` (`orderid`),
  KEY `enddate` (`enddate`),
  KEY `sid` (`sid`),
  KEY `stardate` (`startdate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_hotels_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_img`
--

CREATE TABLE IF NOT EXISTS `wy_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `keyword` char(255) NOT NULL,
  `type` varchar(1) NOT NULL COMMENT '关键词匹配类型',
  `text` text NOT NULL COMMENT '简介',
  `classid` int(11) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `pic` char(255) NOT NULL COMMENT '封面图片',
  `showpic` varchar(1) NOT NULL COMMENT '图片是否显示封面',
  `info` text NOT NULL COMMENT '图文详细内容',
  `url` char(255) NOT NULL COMMENT '图文外链地址',
  `createtime` varchar(13) NOT NULL,
  `uptatetime` varchar(13) NOT NULL,
  `click` int(11) NOT NULL,
  `sorts` int(11) NOT NULL,
  `token` char(30) NOT NULL,
  `title` varchar(60) NOT NULL,
  `usort` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_img`
--

INSERT INTO `wy_img` (`id`, `uid`, `uname`, `keyword`, `type`, `text`, `classid`, `classname`, `pic`, `showpic`, `info`, `url`, `createtime`, `uptatetime`, `click`, `sorts`, `token`, `title`, `usort`) VALUES
(1, 1, '123', '1', '2', '1', 2, '1', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/eye.png', '1', '<p><a href="http://api.map.baidu.com/marker?location=28.003659,120.698987&title=fdgdfgsdfgsdfgsdfg&content=浙江省温州市鹿城区绣山路1号&output=html" target="_self">dfgdsfgdsfgdsfgdfgsdfg</a></p>', '', '1400822240', '1400822240', 8, 0, 'pxhsnk1400821588', '1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_indent`
--

CREATE TABLE IF NOT EXISTS `wy_indent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `gid` tinyint(2) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `info` int(11) NOT NULL,
  `indent_id` char(20) NOT NULL,
  `widtrade_no` int(20) NOT NULL,
  `price` float NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_indent`
--

INSERT INTO `wy_indent` (`id`, `uid`, `gid`, `uname`, `title`, `info`, `indent_id`, `widtrade_no`, `price`, `create_time`, `status`) VALUES
(1, 1, 5, '123', '充值vip会员1个月', 0, '1231400840546', 0, 300, 1400840546, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_ipban`
--

CREATE TABLE IF NOT EXISTS `wy_ipban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `expires_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ipban`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item`
--

CREATE TABLE IF NOT EXISTS `wy_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id` smallint(4) unsigned DEFAULT NULL,
  `orig_id` smallint(6) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `intro` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rates` float(8,2) NOT NULL COMMENT '佣金比率xxx.xx%',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:商品,2:图片',
  `comments` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `cmt_taobao_time` int(10) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `info` text,
  `news` tinyint(4) DEFAULT '0',
  `tuijian` tinyint(4) DEFAULT '0',
  `goods_stock` int(11) DEFAULT '50' COMMENT '库存',
  `buy_num` int(11) DEFAULT '0' COMMENT '卖出数量',
  `brand` int(11) DEFAULT '1' COMMENT '品牌',
  `pingyou` decimal(10,2) DEFAULT '0.00',
  `kuaidi` decimal(10,2) DEFAULT '0.00',
  `ems` decimal(10,2) DEFAULT '0.00',
  `free` int(11) DEFAULT '1',
  `color` varchar(255) DEFAULT NULL COMMENT '颜色',
  `size` varchar(255) DEFAULT NULL COMMENT '尺寸',
  `is_xiangou` char(1) NOT NULL DEFAULT '0',
  `xiangou_num` int(11) NOT NULL DEFAULT '0' COMMENT '限购数量',
  `tag_cache` text NOT NULL,
  `comments_cache` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_attr`
--

CREATE TABLE IF NOT EXISTS `wy_item_attr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) NOT NULL,
  `attr_name` varchar(50) NOT NULL,
  `attr_value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `wy_item_attr`
--

INSERT INTO `wy_item_attr` (`id`, `item_id`, `attr_name`, `attr_value`) VALUES
(6, 198, '颜色', '红色|白色'),
(7, 198, '码数', 'XL');

-- --------------------------------------------------------

--
-- 表的结构 `wy_item_cate`
--

CREATE TABLE IF NOT EXISTS `wy_item_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL,
  `spid` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fcolor` varchar(10) NOT NULL,
  `remark` text NOT NULL,
  `add_time` int(10) NOT NULL,
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `likes` int(10) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:商品分类 1:标签分类',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL,
  `is_index` tinyint(1) NOT NULL DEFAULT '0',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item_cate`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_cate_tag`
--

CREATE TABLE IF NOT EXISTS `wy_item_cate_tag` (
  `cate_id` smallint(4) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `weight` tinyint(3) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `cate_id` (`cate_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_item_cate_tag`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_comment`
--

CREATE TABLE IF NOT EXISTS `wy_item_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `info` text NOT NULL,
  `add_time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_img`
--

CREATE TABLE IF NOT EXISTS `wy_item_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=599 ;

--
-- 转存表中的数据 `wy_item_img`
--

INSERT INTO `wy_item_img` (`id`, `item_id`, `url`, `add_time`, `ordid`, `status`) VALUES
(594, 198, '1405/11/536f71d8e0735.jpg', 1399812569, 255, 1),
(595, 199, '1405/12/536fb6b05523e.jpg', 1399830193, 255, 1),
(596, 200, '1405/13/53718cd8c3dbb.jpg', 1399950553, 255, 1),
(597, 201, '1405/14/5372d61875c89.jpg', 1400034840, 255, 1),
(598, 202, '1405/14/5372d631e86c6.jpg', 1400034866, 255, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_item_like`
--

CREATE TABLE IF NOT EXISTS `wy_item_like` (
  `item_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `add_time` int(10) NOT NULL,
  PRIMARY KEY (`item_id`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_item_like`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_order`
--

CREATE TABLE IF NOT EXISTS `wy_item_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(50) NOT NULL COMMENT '订单号',
  `add_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `goods_sumPrice` decimal(10,2) NOT NULL COMMENT '商品总额',
  `order_sumPrice` decimal(10,2) NOT NULL COMMENT '订单总额',
  `note` text COMMENT '客服备注',
  `userId` int(11) NOT NULL COMMENT '用户ID',
  `userName` varchar(50) NOT NULL COMMENT '用户名',
  `address_name` varchar(255) DEFAULT NULL COMMENT '收货人',
  `mobile` varchar(30) DEFAULT NULL COMMENT '联系手机',
  `address` varchar(255) DEFAULT NULL COMMENT '收货地址',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '订单状态 1:待付款 2：待发货  3:待收货 4:完成 5:关闭',
  `supportmetho` tinyint(5) DEFAULT NULL COMMENT '支付方式 1:支付宝 2:货到付款',
  `freetype` int(11) DEFAULT NULL COMMENT '用户快递方式  1:平邮 2:快递 3:ems 0:卖家包邮',
  `freeprice` decimal(10,2) DEFAULT '0.00' COMMENT '快递费用',
  `closemsg` varchar(255) DEFAULT NULL COMMENT '关闭原因',
  `support_time` int(11) DEFAULT NULL COMMENT '支付时间',
  `sellerRemark` text COMMENT '客服备注',
  `userfree` varchar(50) DEFAULT '' COMMENT '给用户配送快递方式 0:无需快递',
  `freecode` varchar(100) DEFAULT NULL COMMENT '快递编号',
  `fahuoaddress` int(11) DEFAULT NULL COMMENT '发货地址',
  `fahuo_time` int(11) DEFAULT NULL COMMENT '发货时间',
  `paytype` varchar(11) DEFAULT NULL COMMENT '支付方式',
  `payorder` text COMMENT '支付方订单详情',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_orig`
--

CREATE TABLE IF NOT EXISTS `wy_item_orig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item_orig`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_site`
--

CREATE TABLE IF NOT EXISTS `wy_item_site` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item_site`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_item_tag`
--

CREATE TABLE IF NOT EXISTS `wy_item_tag` (
  `item_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `item_id` (`item_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_item_tag`
--

INSERT INTO `wy_item_tag` (`item_id`, `tag_id`) VALUES
(198, 635),
(199, 636),
(200, 637),
(200, 638),
(201, 639),
(202, 640);

-- --------------------------------------------------------

--
-- 表的结构 `wy_item_userprice`
--

CREATE TABLE IF NOT EXISTS `wy_item_userprice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) NOT NULL COMMENT '商品id',
  `cate_id` int(10) NOT NULL COMMENT '会员组id',
  `user_price` decimal(10,2) DEFAULT NULL COMMENT '会员组价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_item_userprice`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_keyword`
--

CREATE TABLE IF NOT EXISTS `wy_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` char(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `module` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `wy_keyword`
--

INSERT INTO `wy_keyword` (`id`, `keyword`, `pid`, `token`, `module`) VALUES
(1, '1', 1, 'pxhsnk1400821588', 'Img'),
(2, '大转盘', 1, 'pxhsnk1400821588', 'Lottery'),
(3, '1', 4, 'pxhsnk1400821588', 'Wall'),
(4, '3', 1, 'pxhsnk1400821588', 'Shake'),
(5, 'y', 2, 'nsnyem1400838500', 'Shake'),
(6, 'q', 5, 'nsnyem1400838500', 'Wall'),
(7, '活动', 2, 'fucuac1400841542', 'Lottery');

-- --------------------------------------------------------

--
-- 表的结构 `wy_leave`
--

CREATE TABLE IF NOT EXISTS `wy_leave` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wecha_id` varchar(60) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `token` varchar(60) NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `wy_leave`
--

INSERT INTO `wy_leave` (`id`, `wecha_id`, `checked`, `name`, `message`, `token`, `time`) VALUES
(1, 'o-oeYjvRUtiiRHW8k5Yw_LgElbJo', 1, '我', '我爱你', '1d2e1b640424480', '1395152217'),
(2, 'oFdesjp8cnIFwd4Z3GEnvBNM9fyQ', 1, '是卫星', '好吧', 'frcgdx1395379235', '1395474194'),
(3, 'oFdesjp8cnIFwd4Z3GEnvBNM9fyQ', 1, '是做', '！！！过', 'frcgdx1395379235', '1395621830'),
(4, 'o7lN_uPr7YBkciYXko2BJ-oybqUQ', 1, '美国', '色魔', 'pzyjnr1396616671', '1396624722'),
(5, 'owzQCt0jc2rN6OoAzm1QkxaRXTVA', 1, '般配', '你好', 'kxofnz1396788966', '1396801116'),
(7, 'o-oeYjgG6yoc4lwJa830xJTopDQA', 0, 'g', 'ij', '1d2e1b640424480', '1398699860'),
(8, 'odusAj8OmREKyC9-CsyIQoyLrZ6g', 1, '拉锯', '将军距离卢超', 'mbuiub1398764517', '1398856203'),
(9, 'oDWmKuA7HCJIjnpt5koEm4nkD6Tc', 1, '老九', '老九锦绣', 'apjrth1399088853', '1399090558'),
(10, '{wechat_id}', 1, '健康快乐', '模具卡路里好吧满足的路上了态度大数据太多太多太多太多太多了你弟弟他就那么久家里都说了把握住的话费了。', 'etwrim1399211617', '1399257749'),
(11, 'o-oeYjuOamexFBwnhU1XyL7JOfEY', 0, '空间', '了8他咯啦咯了', '1d2e1b640424480', '1399891451');

-- --------------------------------------------------------

--
-- 表的结构 `wy_links`
--

CREATE TABLE IF NOT EXISTS `wy_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `url` char(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_links`
--

INSERT INTO `wy_links` (`id`, `name`, `url`, `status`) VALUES
(1, '微我网', 'http://www.138wo.com', '1');

-- --------------------------------------------------------

--
-- 表的结构 `wy_liuyan`
--

CREATE TABLE IF NOT EXISTS `wy_liuyan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `createtime` int(20) DEFAULT NULL,
  `uptatetime` int(20) DEFAULT NULL,
  `token` varchar(30) NOT NULL,
  `re` varchar(500) DEFAULT NULL,
  `wecha_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_liuyan`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lottery`
--

CREATE TABLE IF NOT EXISTS `wy_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joinnum` int(11) NOT NULL COMMENT '参与人数',
  `click` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  `keyword` varchar(10) NOT NULL,
  `starpicurl` varchar(100) NOT NULL COMMENT '填写活动开始图片网址',
  `title` varchar(60) NOT NULL COMMENT '活动名称',
  `txt` varchar(60) NOT NULL COMMENT '用户输入兑奖时候的显示信息',
  `sttxt` varchar(200) NOT NULL COMMENT '简介',
  `statdate` int(11) NOT NULL COMMENT '活动开始时间',
  `enddate` int(11) NOT NULL COMMENT '活动结束时间',
  `info` varchar(200) NOT NULL COMMENT '活动说明',
  `aginfo` varchar(200) NOT NULL COMMENT '重复抽奖回复',
  `endtite` varchar(60) NOT NULL COMMENT '活动结束公告主题',
  `endpicurl` varchar(100) NOT NULL,
  `endinfo` varchar(60) NOT NULL,
  `fist` varchar(50) NOT NULL COMMENT '一等奖奖品设置',
  `fistnums` int(4) NOT NULL COMMENT '一等奖奖品数量',
  `fistlucknums` int(1) NOT NULL COMMENT '一等奖中奖号码',
  `second` varchar(50) NOT NULL COMMENT '二等奖奖品设置',
  `type` tinyint(1) NOT NULL,
  `secondnums` int(4) NOT NULL,
  `secondlucknums` int(1) NOT NULL,
  `third` varchar(50) NOT NULL,
  `thirdnums` int(4) NOT NULL,
  `thirdlucknums` int(1) NOT NULL,
  `allpeople` int(11) NOT NULL,
  `canrqnums` int(2) NOT NULL COMMENT '个人限制抽奖次数',
  `daynums` int(2) NOT NULL DEFAULT '0',
  `parssword` int(15) NOT NULL,
  `renamesn` varchar(50) NOT NULL DEFAULT '',
  `renametel` varchar(60) NOT NULL,
  `displayjpnums` int(1) NOT NULL,
  `createtime` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `four` varchar(50) NOT NULL,
  `fournums` int(11) NOT NULL,
  `fourlucknums` int(11) NOT NULL,
  `five` varchar(50) NOT NULL,
  `fivenums` int(11) NOT NULL,
  `fivelucknums` int(11) NOT NULL,
  `six` varchar(50) NOT NULL COMMENT '六等奖',
  `sixnums` int(11) NOT NULL,
  `sixlucknums` int(11) NOT NULL,
  `zjpic` varchar(150) NOT NULL DEFAULT '',
  `maxgetprizenum` mediumint(4) NOT NULL DEFAULT '1',
  `needreg` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wy_lottery`
--

INSERT INTO `wy_lottery` (`id`, `joinnum`, `click`, `token`, `keyword`, `starpicurl`, `title`, `txt`, `sttxt`, `statdate`, `enddate`, `info`, `aginfo`, `endtite`, `endpicurl`, `endinfo`, `fist`, `fistnums`, `fistlucknums`, `second`, `type`, `secondnums`, `secondlucknums`, `third`, `thirdnums`, `thirdlucknums`, `allpeople`, `canrqnums`, `daynums`, `parssword`, `renamesn`, `renametel`, `displayjpnums`, `createtime`, `status`, `four`, `fournums`, `fourlucknums`, `five`, `fivenums`, `fivelucknums`, `six`, `sixnums`, `sixlucknums`, `zjpic`, `maxgetprizenum`, `needreg`) VALUES
(1, 0, 0, 'pxhsnk1400821588', '大转盘', 'http://wx.0724s.com/tpl/Wap/default/common/css/guajiang/images/activity-lottery-start.jpg', '幸运大转盘活动开始了', '兑奖请联系我们，电话138********', '', 1400823063, 1403415063, '亲，请点击进入大转盘抽奖活动页面，祝您好运哦！', '亲，继续努力哦！', '幸运大转盘活动已经结束了', 'http://wx.0724s.com/tpl/Wap/default/common/css/guajiang/images/activity-lottery-end.jpg', '亲，活动已经结束，请继续关注我们的后续活动哦。', '高档随身化妆镜', 45, 0, '便携式伸缩笔', 1, 455, 0, '转运手链', 46464, 0, 34444, 3, 0, 0, '', '', 1, 0, 1, '', 0, 0, '', 0, 0, '', 0, 0, '', 1, 0),
(2, 0, 0, 'fucuac1400841542', '活动', 'http://wx.0724s.com/tpl/Wap/default/common/css/guajiang/images/activity-lottery-start.jpg', '幸运大转盘活动开始了', '兑奖请联系活动现场客服', '恭喜您中奖了！', 1400841844, 1403433844, '亲，请点击进入大转盘抽奖活动页面，祝您好运哦！', '亲，继续努力哦！', '幸运大转盘活动已经结束了', 'http://wx.0724s.com/tpl/Wap/default/common/css/guajiang/images/activity-lottery-end.jpg', '亲，活动已经结束，请继续关注我们的后续活动哦。', '高档随身化妆镜', 50, 0, '卡通伸缩笔', 1, 300, 0, '幸运手链', 800, 0, 1500, 3, 0, 0, '', '', 1, 0, 1, '', 0, 0, '', 0, 0, '', 0, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_lottery_cheat`
--

CREATE TABLE IF NOT EXISTS `wy_lottery_cheat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `mp` varchar(11) NOT NULL,
  `prizetype` mediumint(9) NOT NULL,
  `intro` varchar(60) NOT NULL,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lottery_cheat`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lottery_record`
--

CREATE TABLE IF NOT EXISTS `wy_lottery_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `usenums` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户使用次数',
  `wecha_id` varchar(60) NOT NULL COMMENT '微信唯一识别码',
  `token` varchar(30) NOT NULL,
  `islottery` int(1) NOT NULL COMMENT '是否中奖',
  `wecha_name` varchar(60) NOT NULL COMMENT '微信号',
  `phone` varchar(15) NOT NULL,
  `sn` varchar(13) NOT NULL COMMENT '中奖后序列号',
  `time` int(11) NOT NULL,
  `prize` varchar(50) NOT NULL DEFAULT '' COMMENT '已中奖项',
  `sendstutas` int(11) NOT NULL DEFAULT '0',
  `sendtime` int(11) NOT NULL,
  PRIMARY KEY (`id`,`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lottery_record`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lvyou`
--

CREATE TABLE IF NOT EXISTS `wy_lvyou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(31) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `toppicurl` varchar(200) NOT NULL,
  `roompicurl` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL,
  `contentt` varchar(2000) NOT NULL,
  `xmcontent` varchar(2000) NOT NULL,
  `jtcontent` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lvyou`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lvyoucom`
--

CREATE TABLE IF NOT EXISTS `wy_lvyoucom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(31) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sort` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `zw` varchar(100) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  `contentt` varchar(2000) NOT NULL,
  `dpcontent` varchar(2000) NOT NULL,
  `subestatename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lvyoucom`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lvyouphoto`
--

CREATE TABLE IF NOT EXISTS `wy_lvyouphoto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(31) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sort` varchar(3) NOT NULL,
  `contentt` varchar(2000) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  `namephoto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lvyouphoto`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lvyouposter`
--

CREATE TABLE IF NOT EXISTS `wy_lvyouposter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(31) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picurl1` varchar(100) NOT NULL,
  `picurl2` varchar(200) NOT NULL,
  `picurl3` varchar(200) NOT NULL,
  `picurl4` varchar(200) NOT NULL,
  `subestatename` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lvyouposter`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lvyousub`
--

CREATE TABLE IF NOT EXISTS `wy_lvyousub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `token` varchar(31) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sort` varchar(3) NOT NULL,
  `contentt` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lvyousub`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_lvyouunits`
--

CREATE TABLE IF NOT EXISTS `wy_lvyouunits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(31) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sub` varchar(30) NOT NULL,
  `lc` varchar(30) NOT NULL,
  `area` varchar(50) NOT NULL,
  `shi` varchar(30) NOT NULL,
  `ting` varchar(100) NOT NULL,
  `sort` varchar(3) NOT NULL,
  `contentt` varchar(2000) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_lvyouunits`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_medical_set`
--

CREATE TABLE IF NOT EXISTS `wy_medical_set` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `token` varchar(50) NOT NULL DEFAULT '',
  `head_url` varchar(200) NOT NULL DEFAULT '',
  `album_id` int(11) DEFAULT NULL,
  `menu1` varchar(20) NOT NULL DEFAULT '',
  `menu2` varchar(20) NOT NULL DEFAULT '',
  `menu3` varchar(20) NOT NULL DEFAULT '',
  `menu4` varchar(20) NOT NULL DEFAULT '',
  `menu5` varchar(20) NOT NULL DEFAULT '',
  `menu6` varchar(20) NOT NULL DEFAULT '',
  `menu7` varchar(20) NOT NULL DEFAULT '',
  `menu8` varchar(20) NOT NULL DEFAULT '',
  `hotfocus_id` int(11) NOT NULL,
  `experts_id` int(11) NOT NULL,
  `ceem_id` int(11) NOT NULL,
  `Rcase_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `evants_id` int(11) NOT NULL,
  `video` text NOT NULL,
  `symptoms_id` int(11) NOT NULL,
  `info` char(200) NOT NULL DEFAULT '',
  `path` varchar(3000) DEFAULT '0',
  `tpid` tinyint(4) DEFAULT '1',
  `conttpid` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `keyword` (`keyword`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_medical_set`
--

INSERT INTO `wy_medical_set` (`id`, `keyword`, `title`, `token`, `head_url`, `album_id`, `menu1`, `menu2`, `menu3`, `menu4`, `menu5`, `menu6`, `menu7`, `menu8`, `hotfocus_id`, `experts_id`, `ceem_id`, `Rcase_id`, `technology_id`, `drug_id`, `evants_id`, `video`, `symptoms_id`, `info`, `path`, `tpid`, `conttpid`) VALUES
(2, '微医疗', '微医疗', '1d2e1b640424480', '', 0, '医院简介', '热点聚焦', '医院专家', '尖端设备', '康复案例', '先进技术', '研发药物', '就医指南', 0, 0, 0, 0, 0, 0, 0, '', 0, '微医疗', '0', 1, 1),
(3, '233', '教师个人介绍', 'uvezwy1400243429', 'http://demo.138wo.com/uploads/u/uvezwy1400243429/3/d/e/4/thumb_5378afd4ecad2.jpg', 36, '医院简介', '热点聚焦', '医院专家', '尖端设备', '康复案例', '先进技术', '研发药物', '就医指南', 890, 890, 890, 890, 890, 890, 890, 'http://v.youku.com/v_show/id_XNjI4MjM1Njk2.html', 890, '大在', '0', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_medical_user`
--

CREATE TABLE IF NOT EXISTS `wy_medical_user` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `wecha_id` varchar(50) NOT NULL DEFAULT '',
  `rid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '',
  `truename` varchar(50) NOT NULL DEFAULT '',
  `utel` char(13) NOT NULL,
  `dateline` varchar(50) NOT NULL,
  `sex` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `txt33` varchar(50) NOT NULL DEFAULT '',
  `txt44` varchar(50) NOT NULL DEFAULT '',
  `txt55` varchar(50) NOT NULL DEFAULT '',
  `yyks` varchar(50) NOT NULL DEFAULT '',
  `yyzj` varchar(50) NOT NULL DEFAULT '',
  `yybz` varchar(50) NOT NULL DEFAULT '',
  `yy4` varchar(50) NOT NULL DEFAULT '',
  `yy5` varchar(50) NOT NULL DEFAULT '',
  `uinfo` varchar(50) NOT NULL DEFAULT '',
  `kfinfo` varchar(100) NOT NULL DEFAULT '',
  `remate` int(10) NOT NULL DEFAULT '0',
  `booktime` int(11) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_medical_user`
--

INSERT INTO `wy_medical_user` (`iid`, `token`, `wecha_id`, `rid`, `type`, `truename`, `utel`, `dateline`, `sex`, `age`, `txt33`, `txt44`, `txt55`, `yyks`, `yyzj`, `yybz`, `yy4`, `yy5`, `uinfo`, `kfinfo`, `remate`, `booktime`) VALUES
(1, 'uvezwy1400243429', 'oYFa5jl53BKArLZiwHG34W-rq1KI', 61, 'medical', '王国亮', '13011158579', '2014-05-23', 1, 13, '', '', '', '', '', '', '', '', '', '好的', 1, 1400303013);

-- --------------------------------------------------------

--
-- 表的结构 `wy_member`
--

CREATE TABLE IF NOT EXISTS `wy_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `isopen` int(1) NOT NULL,
  `homepic` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_contact`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `info` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_contact`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_coupon`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `group` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `people` int(3) NOT NULL,
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `usetime` int(10) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_coupon`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_create`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_create` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `number` varchar(20) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_create`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_exchange`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardid` mediumint(8) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `everyday` tinyint(4) NOT NULL,
  `continuation` tinyint(4) NOT NULL,
  `reward` tinyint(4) NOT NULL,
  `cardinfo` varchar(200) NOT NULL,
  `cardinfo2` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_exchange`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_info`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `info` varchar(200) NOT NULL,
  `clogo` varchar(300) NOT NULL,
  `description` varchar(12) NOT NULL,
  `class` tinyint(1) NOT NULL,
  `password` varchar(11) NOT NULL,
  `crate_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_integral`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_integral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `integral` int(8) NOT NULL,
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `usetime` int(10) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_integral`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_notice`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_notice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cardid` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `endtime` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_notice`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_set`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `cardname` varchar(60) NOT NULL,
  `miniscore` int(10) NOT NULL DEFAULT '0',
  `clogo` varchar(200) NOT NULL,
  `bg` varchar(100) NOT NULL,
  `diybg` varchar(200) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `numbercolor` varchar(10) NOT NULL,
  `vipnamecolor` varchar(10) NOT NULL,
  `Lastmsg` varchar(100) NOT NULL,
  `vip` varchar(100) NOT NULL,
  `qiandao` varchar(100) NOT NULL,
  `shopping` varchar(100) NOT NULL,
  `memberinfo` varchar(100) NOT NULL,
  `membermsg` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `miniscore` (`miniscore`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_set`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_sign`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_sign` (
  `id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `sign_time` int(11) NOT NULL,
  `is_sign` int(11) NOT NULL,
  `score_type` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `sell_expense` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_member_card_sign`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_use_record`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_use_record` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `itemid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(30) NOT NULL DEFAULT '',
  `wecha_id` varchar(50) NOT NULL DEFAULT '',
  `staffid` int(10) NOT NULL DEFAULT '0',
  `cat` smallint(4) NOT NULL DEFAULT '0',
  `expense` mediumint(4) NOT NULL DEFAULT '0',
  `score` mediumint(4) NOT NULL DEFAULT '0',
  `usecount` mediumint(4) NOT NULL DEFAULT '1',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `itemid` (`itemid`,`cat`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_use_record`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_member_card_vip`
--

CREATE TABLE IF NOT EXISTS `wy_member_card_vip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `group` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `info` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  `usetime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_member_card_vip`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_menu`
--

CREATE TABLE IF NOT EXISTS `wy_menu` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module_name` varchar(20) NOT NULL,
  `action_name` varchar(20) NOT NULL,
  `data` varchar(120) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `often` tinyint(1) NOT NULL DEFAULT '0',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=326 ;

--
-- 转存表中的数据 `wy_menu`
--

INSERT INTO `wy_menu` (`id`, `name`, `pid`, `module_name`, `action_name`, `data`, `remark`, `often`, `ordid`, `display`) VALUES
(1, '全局', 0, 'setting', 'index', '', '', 0, 0, 1),
(2, '核心设置', 1, 'setting', 'index', '', '', 0, 0, 1),
(3, '全局参数', 148, 'setting', 'index', '&type=site', '', 0, 2, 1),
(4, '邮件设置', 148, 'setting', 'index', '&type=mail', '', 0, 5, 1),
(172, '专辑管理', 285, 'album', 'index', '', '', 0, 4, 1),
(6, '菜单管理', 2, 'menu', 'index', '', '', 0, 7, 0),
(7, '新增', 6, 'menu', 'add', '', '', 0, 0, 0),
(8, '编辑', 6, 'menu', 'edit', '', '', 0, 0, 0),
(9, '删除', 6, 'menu', 'delete', '', '', 0, 0, 0),
(10, '运营', 0, 'operate', 'index', '', '', 0, 4, 1),
(11, '广告管理', 10, 'advert', 'index', '', '', 0, 2, 1),
(12, '广告管理', 11, 'ad', 'index', '', '', 5, 0, 1),
(13, '广告位管理', 11, 'adboard', 'index', '', '', 0, 0, 1),
(14, '友情链接', 10, 'flink', 'index', '', '', 0, 3, 0),
(15, '友情链接', 14, 'flink', 'index', '', '', 0, 0, 1),
(16, '链接分类', 14, 'flink_cate', 'index', '', '', 0, 0, 1),
(17, '新增', 15, 'flink', 'add', '', '', 0, 0, 0),
(18, '编辑', 15, 'flink', 'edit', '', '', 0, 0, 0),
(19, '删除', 15, 'flink', 'delete', '', '', 0, 0, 0),
(20, '新增', 16, 'flink_cate', 'add', '', '', 0, 0, 0),
(21, '编辑', 16, 'flink_cate', 'edit', '', '', 0, 0, 0),
(22, '删除', 16, 'flink_cate', 'del', '', '', 0, 0, 0),
(23, '新增', 12, 'ad', 'add', '', '', 0, 0, 0),
(24, '编辑', 12, 'ad', 'edit', '', '', 0, 0, 0),
(25, '删除', 12, 'ad', 'delete', '', '', 0, 0, 0),
(26, '新增', 13, 'adboard', 'add', '', '', 0, 0, 0),
(27, '编辑', 13, 'adboard', 'edit', '', '', 0, 0, 0),
(28, '删除', 13, 'adboard', 'delete', '', '', 0, 0, 0),
(29, '数据', 0, 'data', 'index', '', '', 0, 5, 1),
(258, '商品分类', 256, 'score_item_cate', 'index', '', '', 0, 255, 1),
(31, '数据库管理', 29, 'backup', 'index', '', '', 0, 2, 1),
(32, '数据备份', 31, 'backup', 'index', '', '', 0, 0, 1),
(33, '数据恢复', 31, 'backup', 'restore', '', '', 0, 0, 1),
(34, '缓存管理', 254, 'cache', 'index', '', '', 0, 0, 1),
(195, '登陆接口', 245, 'oauth', 'index', '', '', 0, 2, 1),
(36, '黑名单管理', 117, 'ipban', 'index', '', '', 0, 3, 0),
(37, '新增', 36, 'ipban', 'add', '', '', 0, 0, 0),
(38, '编辑', 36, 'ipban', 'edit', '', '', 0, 0, 0),
(50, '商品', 0, 'content', 'index', '', '', 0, 1, 1),
(51, '商品管理', 50, 'article', 'index', '', '', 0, 1, 1),
(52, '商品管理', 51, 'item', 'index', '', '', 1, 1, 1),
(54, '编辑', 52, 'article', 'edit', '', '', 0, 3, 0),
(190, '删除', 52, 'item', 'delete', '', '', 0, 4, 0),
(56, '商品分类', 51, 'item_cate', 'index', '', '', 1, 6, 1),
(57, '新增', 56, 'article_cate', 'add', '', '', 0, 0, 0),
(58, '编辑', 56, 'article_cate', 'edit', '', '', 0, 0, 0),
(59, '删除', 56, 'article_cate', 'delete', '', '', 0, 0, 0),
(60, '管理员管理', 1, 'admin', 'index', '', '', 0, 4, 1),
(61, '管理员管理', 60, 'admin', 'index', '', '', 7, 0, 1),
(62, '新增', 61, 'admin', 'add', '', '', 0, 0, 0),
(63, '编辑', 61, 'admin', 'edit', '', '', 0, 0, 0),
(64, '删除', 61, 'admin', 'delete', '', '', 0, 0, 0),
(65, '角色管理', 60, 'admin_role', 'index', '', '', 7, 0, 1),
(66, '新增', 65, 'admin_role', 'add', '', '', 0, 0, 0),
(192, '淘宝采集', 164, 'collect_alimama', 'index', '', '', 0, 0, 0),
(70, '用户', 0, 'user', 'index', '', '', 0, 3, 1),
(119, '新增', 149, 'user', 'add', '', '', 0, 3, 0),
(118, '编辑', 149, 'user', 'edit', '', '', 0, 4, 0),
(117, '会员管理', 70, 'user', 'index', '', '', 0, 0, 1),
(156, '文章分类', 154, 'article_cate', 'index', '', '', 0, 3, 1),
(151, '导航设置', 216, 'nav', 'index', '', '', 0, 1, 0),
(149, '会员管理', 117, 'user', 'index', '', '', 0, 1, 1),
(150, '删除', 149, 'user', 'delete', '', '', 0, 5, 0),
(152, '主导航', 151, 'nav', 'index', '&type=main', '', 0, 1, 1),
(153, '底部导航', 151, 'nav', 'index', '&type=bottom', '', 0, 2, 1),
(154, '文章管理', 10, 'article', 'index', '', '', 0, 1, 1),
(155, '文章管理', 154, 'article', 'index', '', '', 0, 1, 1),
(148, '站点设置', 2, 'setting', 'index', '', '', 0, 0, 1),
(157, '添加文章', 155, 'article', 'add', '', '', 0, 2, 1),
(158, '编辑', 155, 'article', 'edit', '', '', 0, 3, 0),
(159, '删除', 155, 'article', 'delete', '', '', 0, 4, 0),
(160, '新增', 156, 'article_cate', 'add', '', '', 0, 0, 0),
(161, '编辑', 156, 'article_cate', '编辑', '', '', 0, 0, 0),
(162, '删除', 156, 'article_cate', 'delete', '', '', 0, 0, 0),
(164, '商品采集', 50, 'item_collect', 'index', '', '', 0, 2, 0),
(173, '专辑管理', 172, 'album', 'index', '', '', 0, 1, 1),
(174, '专辑分类', 172, 'album_cate', 'index', '', '', 0, 3, 1),
(175, '新增', 174, 'album_cate', 'add', '', '', 0, 0, 0),
(176, '编辑', 174, 'album_cate', 'edit', '', '', 0, 0, 0),
(177, '删除', 174, 'album_cate', 'delete', '', '', 0, 0, 0),
(178, '敏感词管理', 254, 'badword', 'index', '', '', 0, 4, 1),
(179, '新增', 178, 'badword', 'add', '', '', 0, 0, 0),
(180, '编辑', 178, 'badword', 'edit', '', '', 0, 0, 0),
(181, '删除', 36, 'ipban', 'delete', '', '', 0, 0, 0),
(182, '删除', 178, 'badword', 'delete', '', '', 0, 0, 0),
(255, '采集马甲', 117, 'auto_user', 'index', '', '', 0, 2, 0),
(184, '标签管理', 254, 'tag', 'index', '', '', 0, 3, 1),
(185, '商品接口', 245, 'item_site', 'index', '', '', 0, 1, 1),
(186, '商品评论', 51, 'item_comment', 'index', '', '', 0, 7, 0),
(187, '删除', 186, 'item_comment', 'delete', '', '', 0, 0, 0),
(265, '删除', 257, 'score_item', 'edit', '', '', 0, 4, 0),
(250, '一键删除', 51, 'item', 'delete_search', '', '', 0, 5, 0),
(198, '新增', 196, 'message', 'add', '', '', 0, 0, 1),
(199, '商品来源', 51, 'item_orig', 'index', '', '', 0, 6, 0),
(200, '新增', 199, 'item_orig', 'add', '', '', 0, 0, 0),
(201, '编辑', 199, 'item_orig', 'edit', '', '', 0, 0, 0),
(202, '删除', 199, 'item_orig', 'delete', '', '', 0, 0, 0),
(203, '商品审核', 51, 'item', 'check', '', '', 0, 5, 0),
(249, '添加商品', 51, 'item', 'add', '', '', 1, 3, 1),
(259, '新增', 258, 'score_item_cate', 'add', '', '', 0, 255, 0),
(268, '批量添加', 164, 'collect_batch', 'index', '', '', 0, 255, 0),
(269, '积分设置', 2, 'score', 'setting', '', '', 0, 3, 0),
(210, '专辑审核', 172, 'album', 'check', '', '', 0, 2, 1),
(257, '积分商品', 256, 'score_item', 'index', '', '', 0, 255, 1),
(212, '日志管理', 29, 'log', 'index', '', '', 0, 3, 0),
(213, '管理员日志', 212, 'log', 'index', '', '', 0, 0, 0),
(214, '用户日志', 212, 'log', 'user', '', '', 0, 0, 0),
(215, '积分日志', 212, 'log', 'score', '', '', 0, 0, 0),
(216, '界面设置', 1, 'setting', 'index', '&type=show', '', 0, 2, 1),
(256, '积分商城', 70, 'score_item', 'index', '', '', 0, 255, 0),
(254, '系统数据', 29, 'tag', 'index', '', '', 0, 1, 1),
(264, '编辑', 257, 'score_item', 'edit', '', '', 0, 3, 0),
(263, '添加商品', 257, 'score_item', 'add', '', '', 0, 2, 0),
(262, '积分订单', 256, 'score_order', 'index', '', '', 0, 255, 0),
(261, '删除', 258, 'score_item_cate', 'delete', '', '', 0, 255, 0),
(260, '编辑', 258, 'score_item_cate', 'edit', '', '', 0, 255, 0),
(232, '站内信管理', 70, 'message', 'index', '', '', 0, 0, 0),
(233, '系统通知', 232, 'message', 'index', '&type=1', '', 0, 0, 0),
(234, '用户私信', 232, 'message', 'index', '&type=2', '', 0, 0, 0),
(235, '通知模版', 2, 'message_tpl', 'index', '&type=msg', '', 0, 4, 0),
(236, '添加模版', 235, 'message_tpl', 'add', '', '', 0, 7, 0),
(237, '编辑', 235, 'message_tpl', 'edit', '', '', 0, 255, 0),
(238, '删除', 235, 'message_tpl', 'delete', '', '', 0, 255, 0),
(240, '单页管理', 154, 'article', 'page', '', '', 0, 2, 1),
(242, '积分记录', 269, 'score', 'logs', '', '', 0, 2, 0),
(244, '应用', 0, 'plugin', 'index', '', '', 0, 6, 0),
(245, '系统接口', 244, 'apis', 'index', '', '', 0, 1, 0),
(246, '应用管理', 244, 'plugin', 'index', '', '', 0, 3, 0),
(247, '应用中心', 246, 'plugin', 'index', '', '', 0, 0, 0),
(248, '已安装应用', 246, 'plugin', 'list', '', '', 0, 0, 0),
(252, '用户整合', 245, 'integrate', 'index', '', '', 0, 255, 0),
(253, '图片模式', 52, 'item', 'index', '&sm=image', '', 0, 2, 1),
(267, '批量注册', 149, 'user', 'add_users', '', '', 0, 2, 1),
(270, '邮件模板', 235, 'message_tpl', 'index', '&type=mail', '', 0, 6, 0),
(271, '短消息模板', 235, 'message_tpl', 'index', '&type=msg', '', 0, 5, 0),
(272, '附件设置', 148, 'setting', 'index', '&type=attachment', '', 0, 4, 1),
(273, '显示设置', 216, 'setting', 'index', '&type=style', '', 0, 2, 0),
(274, '模板管理', 216, 'template', 'index', '', '', 0, 3, 1),
(275, '站点设置', 148, 'setting', 'index', '', '', 6, 1, 1),
(276, '积分设置', 269, 'score', 'setting', '', '', 0, 1, 0),
(277, '商品管理', 52, 'item', 'index', '', '', 0, 1, 1),
(278, '文章管理', 155, 'article', 'index', '', '', 0, 1, 1),
(279, '会员管理', 149, 'user', 'index', '', '', 3, 1, 1),
(280, '积分商品', 257, 'score_item', 'index', '', '', 0, 1, 0),
(281, '淘宝评论', 164, 'cmt_taobao', 'index', '', '', 0, 255, 0),
(282, 'SEO设置', 2, 'seo', 'url', '', '', 0, 5, 0),
(283, 'UR静态化', 282, 'seo', 'url', '', '', 0, 255, 1),
(284, '页面SEO', 282, 'seo', 'page', '', '', 0, 255, 1),
(285, '专辑', 0, 'album', 'index', '', '', 0, 2, 0),
(286, '注册登陆', 2, 'setting', 'user', '', '', 6, 2, 0),
(293, '编辑', 291, 'brandlist', ' edit', '', '', 0, 255, 0),
(292, '新增', 291, 'brandlist', 'add', '', '', 0, 255, 0),
(291, '品牌管理', 51, 'brandlist', 'index', '', '', 1, 1, 1),
(294, '删除', 291, 'brandlist', 'delete', '', '', 0, 255, 0),
(295, '交易管理', 50, 'item_order', 'index', '', '', 0, 255, 1),
(296, '订单管理', 295, 'item_order', 'index', '', '', 2, 255, 1),
(297, '快递方式管理', 295, 'delivery', 'index', '', '', 2, 255, 1),
(298, '发货地址管理', 295, 'address', 'index', '', '', 2, 255, 1),
(299, '微信回复', 0, 'keyword', 'index', '', '', 0, 2, 1),
(300, '回复设置', 299, 'keyword', 'index', '', '', 0, 255, 1),
(301, '关键词自动回复', 300, 'keyword', 'addkeyword', '', '', 4, 255, 1),
(302, '消息自动回复', 300, 'keyword', 'addmess', '', '', 4, 255, 1),
(303, '关注自动回复', 300, 'keyword', 'addfollow', '', '', 4, 255, 1),
(304, '支付宝设置', 295, 'alipay', 'index', '', '', 2, 255, 1),
(305, '自定义菜单', 300, 'custom_menu', 'index', '', '', 4, 255, 1),
(306, '添加', 305, 'custom_menu', 'add', '', '', 0, 255, 0),
(307, '编辑', 305, 'custom_menu', 'edit', '', '', 0, 255, 0),
(308, '删除', 305, 'custom_menu', 'delete', '', '', 0, 255, 0),
(310, '管理', 302, 'keyword', 'showmess', '', '', 0, 255, 0),
(309, '编辑', 301, 'keyword', 'addkeyword_ajax', '', '', 0, 255, 0),
(311, '管理', 303, 'keyword', 'showfollow', '', '', 0, 255, 0),
(312, '图片选择', 301, 'keyword', 'allimages', '', '', 0, 255, 0),
(313, '图片上传', 301, 'keyword', 'ajaxupload', '', '', 0, 255, 0),
(314, '图片删除', 301, 'keyword', 'delimg', '', '', 0, 255, 0),
(315, '单页编辑', 240, 'article', 'page_edit', '', '', 0, 255, 0),
(316, '微信支付设置', 295, 'wxpay', 'index', '', '', 0, 255, 1),
(318, '会员组管理', 117, 'user_category', 'index', '', '会员组管理', 0, 255, 1),
(319, '营销互动', 10, 'yingxiao', 'index', '', '营销互动功能', 0, 255, 1),
(320, '大转盘', 319, 'zhuanpan', 'index', '', '大转盘', 0, 255, 1),
(321, '大转盘设置', 320, 'zhuanpan', 'index', '', '设置', 0, 255, 1),
(322, '中奖记录', 320, 'zhuanpan', 'log', '', '中奖记录', 0, 255, 1),
(323, '会员账户', 117, 'account', 'index', '', '账户', 0, 255, 1),
(324, '会员账户', 321, 'account', 'index', '', '会员账户', 0, 255, 1),
(325, '充值记录', 321, 'account', 'log', '', '充值记录', 0, 255, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_message`
--

CREATE TABLE IF NOT EXISTS `wy_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_message_tpl`
--

CREATE TABLE IF NOT EXISTS `wy_message_tpl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `is_sys` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL COMMENT '别名',
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_message_tpl`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_article`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) NOT NULL,
  `token` varchar(50) NOT NULL,
  `site` int(4) NOT NULL DEFAULT '1',
  `title` varchar(200) NOT NULL,
  `titles` varchar(400) NOT NULL DEFAULT '',
  `subtitle` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `externallink` tinyint(1) NOT NULL DEFAULT '0',
  `thumb` varchar(100) DEFAULT NULL,
  `content` longtext,
  `intro` varchar(2000) NOT NULL,
  `author` varchar(20) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `uid` varchar(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  `last_update` int(10) NOT NULL,
  `viewcount` int(10) NOT NULL DEFAULT '0',
  `template` varchar(50) DEFAULT NULL,
  `pagecount` tinyint(2) NOT NULL DEFAULT '1',
  `disagree` int(10) NOT NULL DEFAULT '0',
  `cancomment` tinyint(1) NOT NULL DEFAULT '1',
  `commentcount` int(10) NOT NULL DEFAULT '0',
  `agree` int(10) NOT NULL DEFAULT '0',
  `taxis` int(10) NOT NULL DEFAULT '0',
  `lastcreate` int(10) NOT NULL DEFAULT '1400000000',
  `sourcetype` smallint(2) NOT NULL DEFAULT '0',
  `ex` tinyint(1) DEFAULT '0',
  `pubed` tinyint(1) NOT NULL DEFAULT '1',
  `geoid` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `channel_id` (`channel_id`),
  KEY `channel_id_2` (`channel_id`,`thumb`),
  KEY `time` (`time`),
  KEY `taxis` (`taxis`),
  KEY `ex` (`ex`),
  KEY `geoid` (`geoid`),
  KEY `uid` (`uid`),
  KEY `keywords` (`keywords`),
  KEY `sourcetype` (`sourcetype`),
  KEY `pubed` (`pubed`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `wy_moopha_article`
--

INSERT INTO `wy_moopha_article` (`id`, `channel_id`, `token`, `site`, `title`, `titles`, `subtitle`, `link`, `externallink`, `thumb`, `content`, `intro`, `author`, `source`, `keywords`, `uid`, `time`, `last_update`, `viewcount`, `template`, `pagecount`, `disagree`, `cancomment`, `commentcount`, `agree`, `taxis`, `lastcreate`, `sourcetype`, `ex`, `pubed`, `geoid`) VALUES
(32, 110, '1d2e1b640424480', 6, '微我网提供运营服务', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/1.jpg', '微我网提供运营服务', '', NULL, NULL, NULL, '0', 1397980697, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(33, 110, '1d2e1b640424480', 6, '多种互动营销活动', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/2.jpg', '多种互动营销活动', '', NULL, NULL, NULL, '0', 1397980697, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(34, 110, '1d2e1b640424480', 6, '测试2', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/5.jpg', '测试2', '', NULL, NULL, NULL, '0', 1397980697, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(35, 110, '1d2e1b640424480', 6, '房产', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/background/view/9.jpg', '房产', '', NULL, NULL, NULL, '0', 1397980697, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(36, 110, '1d2e1b640424480', 6, '测试', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/background/view/8.jpg', '测试', '', NULL, NULL, NULL, '0', 1397980697, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(37, 117, '1d2e1b640424480', 7, '微我网提供运营服务', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/1.jpg', '微我网提供运营服务', '', NULL, NULL, NULL, '0', 1397983179, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(38, 117, '1d2e1b640424480', 7, '多种互动营销活动', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/2.jpg', '多种互动营销活动', '', NULL, NULL, NULL, '0', 1397983179, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(39, 117, '1d2e1b640424480', 7, '测试2', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/5.jpg', '测试2', '', NULL, NULL, NULL, '0', 1397983179, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(40, 117, '1d2e1b640424480', 7, '房产', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/background/view/9.jpg', '房产', '', NULL, NULL, NULL, '0', 1397983179, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(41, 117, '1d2e1b640424480', 7, '测试', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/background/view/8.jpg', '测试', '', NULL, NULL, NULL, '0', 1397983179, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(42, 138, 'tskkuc1398353166', 10, '', '', NULL, '', 0, 'http://www.wdtyx.com/tpl/static/attachment/background/view/2.jpg', '', '', NULL, NULL, NULL, '0', 1398353346, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(43, 145, 'kmtyvy1398324920', 11, '', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/default/4.jpg', '', '', NULL, NULL, NULL, '0', 1398400005, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(44, 145, 'kmtyvy1398324920', 11, '', '', NULL, '', 0, 'http://www.138wo.com/tpl/static/attachment/focus/default/6.jpg', '', '', NULL, NULL, NULL, '0', 1398400005, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(45, 145, 'kmtyvy1398324920', 11, '', '', NULL, '', 0, 'dddddddddd', '', '', NULL, NULL, NULL, '0', 1398400005, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(46, 147, '', 12, '国大太阳都市', '', '国大太阳都市', '?m=site&c=home&a=content&contentid=46', 0, 'http://t3.qpic.cn/mblogpic/4419de670baaab60fc80/2000', ' 国大•太阳都市花园项目由山东国大置业有限公司倾力开发，山东国大置业有限公司拥有多年房地产开发经验，曾经打造过济南长途汽车站核心商圈知名楼盘——泉星小区温州城，该项目已经成为济南机电市场的聚集之地，项目价值成爆炸式上升。同时公司在济南核心商业区泉城路商圈及济南市场拥有多个项目储备，是一家全心注重为客户创造价值的品质开发企业。\r\n国大都市阳光项目位于济南市槐荫区核心位置，黄金交通主线——经十路路北，纬七路以东，岔路街以西，周边交通便利，四通八达，有多达9条公交线路，未来建成的地铁将直达项目。（2、27、33、42、81、117、202、K109、K56路）距银座和谐广场商业中心仅五分钟路程，八一商圈十分钟路程，非常便利到达华联、西市场，商业配套设施齐备，能最大限度满足您生活购物需求。\r\n', '国大•太阳都市花园项目由山东国大置业有限公司倾力开发，山东国大置业有限公司拥有多年房地产开发经验，曾经打造过济南长途汽车站核心商圈知名楼盘——泉星小区温州城，该项目已经成为济南机电市场的聚集之地，项目价值成爆炸式上升。同时公司在济南核心商业区泉城路商圈及济南市场拥有多个项目储备，是一家全心注重为客户创造价值的品质开发企业。\r\n国大都市阳光项目位于济南市槐荫区核心位置，黄金交通主线——经十路路北，纬七路以东，岔路街以西，周边交通便利，四通八达，有多达9条公交线路，未来建成的地铁将直达项目。（2、27、33、42、81、117、202、K109、K56路）距银座和谐广场商业中心仅五分钟路程，八一商圈十分钟路程，非常便利到达华联、西市场，商业配套设施齐备，能最大限度满足您生活购物需求。\r\n', '', '', ',国大', '', 1399363908, 1399363908, 0, NULL, 1, 0, 1, 0, 0, 46, 1400000000, 1, 0, 1, 0),
(47, 148, '', 12, '国大太阳都市1', '', '国大太阳都市1', '?m=site&c=home&a=content&contentid=47', 0, 'http://t3.qpic.cn/mblogpic/1fbe09e1226ef754ea68/2000', ' 项目紧邻槐荫区工商局、国税局等市政重点单位，省立医院、市立五院、儿童医院能为您提供最优的医疗保障服务。拥有槐荫区最优质的教育资源，经七路小学和二十中，能为您的孩子提供最优质的教育配套体系，项目周边学校众多，济南市九中、十四中等，学区人文氛围浓厚，是最佳的理想居住之地。\r\n项目总用地面积为10081㎡，地上总建筑面积38098.0㎡，地下总建筑面积7129.2㎡。由一幢二十一层板式住宅及裙房组成，一，二层为配套商业，三至二十一层为住宅，商业街呈半围合布置，沿三面道路均设有商业，未来将为业主提供生活配套，丰富业主生活。\r\n项目整体由浙江省工业设计研究院全心设计，借鉴南方成熟的设计经验并融合北方的居住理念，将打造出一个极具特色的社区，未来必将成为城市形象的最佳代言。项目设计为人车分流，平时车辆不允许进入内院，车辆可直接从小区西北侧的地下室出入口进入地下停车，整体设计交通流线清晰，功能分区明确。地下停车位采用现国内最先进的立体停车系统，共计283个停车位，能最大限度的满足业主的停车需求。\r\n', '项目紧邻槐荫区工商局、国税局等市政重点单位，省立医院、市立五院、儿童医院能为您提供最优的医疗保障服务。拥有槐荫区最优质的教育资源，经七路小学和二十中，能为您的孩子提供最优质的教育配套体系，项目周边学校众多，济南市九中、十四中等，学区人文氛围浓厚，是最佳的理想居住之地。\r\n项目总用地面积为10081㎡，地上总建筑面积38098.0㎡，地下总建筑面积7129.2㎡。由一幢二十一层板式住宅及裙房组成，一，二层为配套商业，三至二十一层为住宅，商业街呈半围合布置，沿三面道路均设有商业，未来将为业主提供生活配套，丰富业主生活。\r\n项目整体由浙江省工业设计研究院全心设计，借鉴南方成熟的设计经验并融合北方的居住理念，将打造出一个极具特色的社区，未来必将成为城市形象的最佳代言。项目设计为人车分流，平时车辆不允许进入内院，车辆可直接从小区西北侧的地下室出入口进入地下停车，整体设计交通流线清晰，功能分区明确。地下停车位采用现国内最先进的立体停车系统，共计283个停车位，能最大限度的满足业主的停车需求。\r\n', '', '', ',吧', '', 1399364107, 1399364107, 0, NULL, 1, 0, 1, 0, 0, 47, 1400000000, 1, 0, 1, 0),
(48, 149, '', 12, '楼盘介绍', '', '楼盘介绍', '?m=site&c=home&a=content&contentid=48', 0, 'http://t3.qpic.cn/mblogpic/97a3d6caa9952abd3d86/2000', ' 建筑造型采用简欧风格，整体外立面以简洁为美，突显欧式建筑精神，使建筑立面光影错动、丰富生动；色彩采用协调的色系互相搭配，建筑天际轮廓线变化起伏，使建筑形象充满阳光都市的格调，极富浪漫气息。\r\n项目施工由国内知名建筑企业——济南港基建设集团承建，该公司拥有多年的建筑经验，承建过济南市多个知名房产项目，工程质量一致受到业主好评。\r\n', '建筑造型采用简欧风格，整体外立面以简洁为美，突显欧式建筑精神，使建筑立面光影错动、丰富生动；色彩采用协调的色系互相搭配，建筑天际轮廓线变化起伏，使建筑形象充满阳光都市的格调，极富浪漫气息。\r\n项目施工由国内知名建筑企业——济南港基建设集团承建，该公司拥有多年的建筑经验，承建过济南市多个知名房产项目，工程质量一致受到业主好评。\r\n', '', '', ',0', '', 1399364224, 1399364224, 0, NULL, 1, 0, 1, 0, 0, 48, 1400000000, 1, 0, 1, 0),
(49, 151, '', 12, '联系我们', '', '联系我们', '?m=site&c=home&a=content&contentid=49', 0, 'http://t3.qpic.cn/mblogpic/be2548d984cbf96814e0/2000', ' 项目地址：济南市槐荫区经十纬七路口北（加油站东临）\r\n销售热线：0531-86937777\r\n', '项目地址：济南市槐荫区经十纬七路口北（加油站东临）\r\n销售热线：0531-86937777\r\n', '', '', ',2', '', 1399364334, 1399364334, 0, NULL, 1, 0, 1, 0, 0, 49, 1400000000, 1, 0, 1, 0),
(50, 181, 'pxhsnk1400821588', 16, 'fvcf', '', NULL, 'http://api.map.baidu.com/marker?location=28.003659,120.698987&amp;title=fdgdfgsdfgsdfgsdfg&amp;content=浙江省温州市鹿城区绣山路1号&amp;output=html', 0, 'http://wx.0724s.com/tpl/static/attachment/focus/default/4.jpg', 'fvcf', '', NULL, NULL, NULL, '0', 1400849960, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(51, 181, 'pxhsnk1400821588', 16, '2', '', NULL, 'http://api.map.baidu.com/marker?location=28.003659,120.698987&amp;title=fdgdfgsdfgsdfgsdfg&amp;content=浙江省温州市鹿城区绣山路1号&amp;output=html', 0, 'http://wx.0724s.com/tpl/static/attachment/focus/default/6.jpg', '2', '', NULL, NULL, NULL, '0', 1400849960, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0),
(52, 181, 'pxhsnk1400821588', 16, '', '', NULL, '', 0, 'http://wx.0724s.com/tpl/static/attachment/background/view/34.jpg', '', '', NULL, NULL, NULL, '0', 1400849960, 0, 0, NULL, 1, 0, 1, 0, 0, 0, 1400000000, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_attachement`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_attachement` (
  `url` varchar(150) NOT NULL DEFAULT '',
  `pubid` smallint(3) NOT NULL DEFAULT '1',
  `filetype` varchar(10) NOT NULL DEFAULT 'picture',
  `cat` varchar(20) NOT NULL DEFAULT '',
  `catid` int(10) NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  KEY `cat` (`cat`,`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_moopha_attachement`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_channel`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_channel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `shortname` varchar(50) NOT NULL DEFAULT '',
  `isnav` tinyint(1) NOT NULL DEFAULT '1',
  `channeltype` tinyint(1) NOT NULL DEFAULT '1',
  `cindex` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL,
  `externallink` tinyint(1) NOT NULL DEFAULT '0',
  `des` mediumtext NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `metatitle` varchar(100) DEFAULT NULL,
  `metakeyword` varchar(100) DEFAULT NULL,
  `metades` varchar(200) DEFAULT NULL,
  `thumbwidth` int(4) NOT NULL,
  `thumbheight` int(4) NOT NULL,
  `thumb2width` mediumint(4) NOT NULL DEFAULT '0',
  `thumb2height` mediumint(4) NOT NULL DEFAULT '0',
  `thumb3width` mediumint(4) NOT NULL DEFAULT '0',
  `thumb3height` mediumint(4) NOT NULL DEFAULT '0',
  `thumb4width` mediumint(4) NOT NULL DEFAULT '0',
  `thumb4height` mediumint(4) NOT NULL DEFAULT '0',
  `parentid` int(10) NOT NULL DEFAULT '0',
  `channeltemplate` int(10) DEFAULT '1',
  `contenttemplate` int(10) DEFAULT '1',
  `autotype` varchar(10) NOT NULL DEFAULT '',
  `ex` tinyint(1) NOT NULL DEFAULT '0',
  `iscity` tinyint(1) NOT NULL DEFAULT '0',
  `site` int(4) NOT NULL DEFAULT '0',
  `taxis` int(10) NOT NULL DEFAULT '0',
  `lastcreate` int(10) NOT NULL DEFAULT '1400000000',
  `pagesize` smallint(3) NOT NULL DEFAULT '30',
  `specialid` mediumint(4) NOT NULL DEFAULT '0',
  `homepicturechannel` tinyint(1) NOT NULL DEFAULT '0',
  `hometextchannel` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `site` (`site`),
  KEY `taxis` (`taxis`),
  KEY `time` (`time`),
  KEY `specialid` (`specialid`),
  KEY `token` (`token`),
  KEY `isnav` (`isnav`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=182 ;

--
-- 转存表中的数据 `wy_moopha_channel`
--

INSERT INTO `wy_moopha_channel` (`id`, `name`, `shortname`, `isnav`, `channeltype`, `cindex`, `token`, `link`, `externallink`, `des`, `thumb`, `metatitle`, `metakeyword`, `metades`, `thumbwidth`, `thumbheight`, `thumb2width`, `thumb2height`, `thumb3width`, `thumb3height`, `thumb4width`, `thumb4height`, `parentid`, `channeltemplate`, `contenttemplate`, `autotype`, `ex`, `iscity`, `site`, `taxis`, `lastcreate`, `pagesize`, `specialid`, `homepicturechannel`, `hometextchannel`, `time`) VALUES
(104, '首页', '首页', 0, 1, 'homepage', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=104', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 429, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(105, '关于我们', '简介', 1, 1, 'aboutus', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=105', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 104, 429, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(106, '最新动态', '动态', 1, 1, 'news', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=106', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 104, 429, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(107, '产品展示', '产品', 1, 1, 'products', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=107', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 104, 430, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(108, '精彩案例', '案例', 1, 1, 'case', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=108', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 104, 429, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(109, '联系我们', '联系', 1, 1, 'contact', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=109', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 104, 429, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(110, '幻灯片', '幻灯片', 0, 1, 'focus', '1d2e1b640424480', '?m=site&c=home&a=channel&channelid=110', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 104, 429, 431, '', 0, 0, 6, 0, 1400000000, 30, 0, 0, 0, 1397980697),
(111, '首页', '首页', 0, 1, 'homepage', '1d2e1b640424480', '', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(112, '关于我们', '简介', 1, 1, 'aboutus', '1d2e1b640424480', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 111, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(113, '最新动态', '动态', 1, 1, 'news', '1d2e1b640424480', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 111, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(114, '产品展示', '产品', 1, 1, 'products', '1d2e1b640424480', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 111, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(115, '精彩案例', '案例', 1, 1, 'case', '1d2e1b640424480', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 111, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(116, '联系我们', '联系', 1, 1, 'contact', '1d2e1b640424480', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 111, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(117, '幻灯片', '幻灯片', 0, 1, 'focus', '1d2e1b640424480', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 111, 1, 1, '', 0, 0, 7, 0, 1400000000, 30, 0, 0, 0, 1397983179),
(118, '首页', '首页', 0, 1, 'homepage', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=118', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 443, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(119, '关于我们', '简介', 1, 1, 'aboutus', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=119', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 118, 443, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(120, '最新动态', '动态', 1, 1, 'news', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=120', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 118, 443, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(121, '产品展示', '产品', 1, 1, 'products', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=121', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 118, 444, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(122, '精彩案例', '案例', 1, 1, 'case', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=122', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 118, 443, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(123, '联系我们', '联系', 1, 1, 'contact', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=123', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 118, 443, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(124, '幻灯片', '幻灯片', 0, 1, 'focus', 'ekmgbj1398346568', '?m=site&c=home&a=channel&channelid=124', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 118, 443, 445, '', 0, 0, 8, 0, 1400000000, 30, 0, 0, 0, 1398349707),
(125, '首页', '首页', 0, 1, 'homepage', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=125', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 457, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(126, '关于我们', '简介', 1, 1, 'aboutus', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=126', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 125, 457, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(127, '最新动态', '动态', 1, 1, 'news', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=127', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 125, 457, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(128, '产品展示', '产品', 1, 1, 'products', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=128', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 125, 458, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(129, '精彩案例', '案例', 1, 1, 'case', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=129', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 125, 457, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(130, '联系我们', '联系', 1, 1, 'contact', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=130', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 125, 457, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(131, '幻灯片', '幻灯片', 0, 1, 'focus', 'wjgtki1398347469', '?m=site&c=home&a=channel&channelid=131', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 125, 457, 459, '', 0, 0, 9, 0, 1400000000, 30, 0, 0, 0, 1398350927),
(132, '首页', '首页', 0, 1, 'homepage', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=132', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 492, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(133, '关于我们', '简介', 1, 1, 'aboutus', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=133', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 132, 492, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(134, '最新动态', '动态', 1, 1, 'news', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=134', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 132, 492, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(135, '产品展示', '产品', 1, 1, 'products', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=135', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 132, 493, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(136, '精彩案例', '案例', 1, 1, 'case', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=136', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 132, 492, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(137, '联系我们', '联系', 1, 1, 'contact', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=137', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 132, 492, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(138, '幻灯片', '幻灯片', 0, 1, 'focus', 'tskkuc1398353166', '?m=site&c=home&a=channel&channelid=138', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 132, 492, 494, '', 0, 0, 10, 0, 1400000000, 30, 0, 0, 0, 1398353346),
(139, '首页', '首页', 0, 1, 'homepage', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=139', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 499, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(140, '关于我们', '简介', 1, 1, 'aboutus', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=140', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 139, 499, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(141, '最新动态', '动态', 1, 1, 'news', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=141', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 139, 499, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(142, '产品展示', '产品', 1, 1, 'products', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=142', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 139, 500, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(143, '精彩案例', '案例', 1, 1, 'case', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=143', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 139, 499, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(144, '联系我们', '联系', 1, 1, 'contact', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=144', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 139, 499, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(145, '幻灯片', '幻灯片', 0, 1, 'focus', 'kmtyvy1398324920', '?m=site&c=home&a=channel&channelid=145', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 139, 499, 501, '', 0, 0, 11, 0, 1400000000, 30, 0, 0, 0, 1398400005),
(146, '首页', '首页', 0, 1, 'homepage', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=146', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 520, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 0, 0, 1399363294),
(147, '关于我们', '简介', 1, 1, 'aboutus', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=147', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 146, 520, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 0, 0, 1399363294),
(148, '最新动态', '动态', 1, 1, 'news', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=148', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 146, 520, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 0, 0, 1399363294),
(149, '产品展示', '产品', 1, 1, 'products', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=149', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 146, 521, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 0, 0, 1399363294),
(150, '精彩案例', '案例', 1, 1, 'case', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=150', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 146, 520, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 0, 0, 1399363294),
(151, '联系我们', '联系', 1, 1, 'contact', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=151', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 146, 520, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 0, 0, 1399363294),
(152, '幻灯片', '幻灯片', 1, 1, 'focus', 'sqzwkk1399363211', '?m=site&c=home&a=channel&channelid=152', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 146, 520, 522, '', 0, 0, 12, 0, 1400000000, 30, 0, 1, 1, 1399363294),
(153, '联系我们', '联系我们', 1, 1, '联系我们', 'sqzwkk1399363211', '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 146, 520, 522, '', 0, 0, 12, 153, 1400000000, 20, 0, 1, 1, 1399364790),
(154, '首页', '首页', 0, 1, 'homepage', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=154', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 548, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(155, '关于我们', '简介', 1, 1, 'aboutus', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=155', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 154, 548, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(156, '最新动态', '动态', 1, 1, 'news', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=156', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 154, 548, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(157, '产品展示', '产品', 1, 1, 'products', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=157', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 154, 549, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(158, '精彩案例', '案例', 1, 1, 'case', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=158', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 154, 548, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(159, '联系我们', '联系', 1, 1, 'contact', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=159', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 154, 548, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(160, '幻灯片', '幻灯片', 0, 1, 'focus', 'jyxmuo1397787030', '?m=site&c=home&a=channel&channelid=160', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 154, 548, 550, '', 0, 0, 13, 0, 1400000000, 30, 0, 0, 0, 1399454903),
(161, '首页', '首页', 0, 1, 'homepage', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=161', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 555, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(162, '关于我们', '简介', 1, 1, 'aboutus', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=162', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 161, 555, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(163, '最新动态', '动态', 1, 1, 'news', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=163', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 161, 555, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(164, '产品展示', '产品', 1, 1, 'products', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=164', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 161, 556, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(165, '精彩案例', '案例', 1, 1, 'case', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=165', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 161, 555, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(166, '联系我们', '联系', 1, 1, 'contact', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=166', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 161, 555, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(167, '幻灯片', '幻灯片', 0, 1, 'focus', 'ugofuq1399431811', '?m=site&c=home&a=channel&channelid=167', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 161, 555, 557, '', 0, 0, 14, 0, 1400000000, 30, 0, 0, 0, 1400128337),
(168, '首页', '首页', 0, 1, 'homepage', 'pgtepl1400696466', '', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(169, '关于我们', '简介', 1, 1, 'aboutus', 'pgtepl1400696466', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 168, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(170, '最新动态', '动态', 1, 1, 'news', 'pgtepl1400696466', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 168, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(171, '产品展示', '产品', 1, 1, 'products', 'pgtepl1400696466', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 168, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(172, '精彩案例', '案例', 1, 1, 'case', 'pgtepl1400696466', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 168, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(173, '联系我们', '联系', 1, 1, 'contact', 'pgtepl1400696466', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 168, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(174, '幻灯片', '幻灯片', 0, 1, 'focus', 'pgtepl1400696466', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 168, 1, 1, '', 0, 0, 15, 0, 1400000000, 30, 0, 0, 0, 1400842442),
(175, '首页', '首页', 0, 1, 'homepage', 'pxhsnk1400821588', '', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960),
(176, '关于我们', '简介', 1, 1, 'aboutus', 'pxhsnk1400821588', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 175, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960),
(177, '最新动态', '动态', 1, 1, 'news', 'pxhsnk1400821588', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 175, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960),
(178, '产品展示', '产品', 1, 1, 'products', 'pxhsnk1400821588', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 175, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960),
(179, '精彩案例', '案例', 1, 1, 'case', 'pxhsnk1400821588', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 175, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960),
(180, '联系我们', '联系', 1, 1, 'contact', 'pxhsnk1400821588', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 175, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960),
(181, '幻灯片', '幻灯片', 0, 1, 'focus', 'pxhsnk1400821588', '/', 0, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 175, 1, 1, '', 0, 0, 16, 0, 1400000000, 30, 0, 0, 0, 1400849960);

-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_channel_contentattribute`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_channel_contentattribute` (
  `channelid` int(4) NOT NULL,
  `attributeid` int(4) NOT NULL,
  `taxis` int(4) NOT NULL DEFAULT '0',
  KEY `channelid` (`channelid`),
  KEY `taxis` (`taxis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_moopha_channel_contentattribute`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_keywords`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_keywords` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(60) NOT NULL DEFAULT '',
  `link` varchar(150) NOT NULL DEFAULT '',
  `title` varchar(150) NOT NULL DEFAULT '',
  `target` varchar(15) NOT NULL DEFAULT '_blank',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_moopha_keywords`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_picture`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_picture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contentid` int(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `intro` text NOT NULL,
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contentid` (`contentid`),
  KEY `taxis` (`taxis`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_moopha_picture`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_site`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_site` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `intro` varchar(600) NOT NULL DEFAULT '',
  `picurl` varchar(120) NOT NULL DEFAULT '',
  `token` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(40) NOT NULL DEFAULT '',
  `logourl` varchar(120) NOT NULL DEFAULT '',
  `siteindex` varchar(50) NOT NULL,
  `taxis` int(4) NOT NULL,
  `main` int(1) NOT NULL,
  `abspath` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  `statisticcode` varchar(600) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `siteindex` (`siteindex`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `wy_moopha_site`
--

INSERT INTO `wy_moopha_site` (`id`, `name`, `intro`, `picurl`, `token`, `template`, `logourl`, `siteindex`, `taxis`, `main`, `abspath`, `url`, `statisticcode`, `time`) VALUES
(6, '欢迎访问微我网', '全新的水果机、砸金蛋、微客服。3G网站底部导航系统、CRM管理系统上线，欢迎体验！特别申明：我们没有在淘宝卖任何源码，除了www.138wo.com 网站以外，其他一律是骗子，请小心。', 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/1.jpg', '1d2e1b640424480', 'v16', 'http://127.0.0.1/138mb/upload/images/2014/04/20/1397980689erjn.jpg', '', 0, 0, 0, 'http://127.0.0.1/', '', 0),
(7, '欢迎访问微我网', '全新的水果机、砸金蛋、微客服。3G网站底部导航系统、CRM管理系统上线，欢迎体验！特别申明：我们没有在淘宝卖任何源码，除了www.138wo.com 网站以外，其他一律是骗子，请小心。', 'http://www.138wo.com/tpl/static/attachment/focus/ceshi/1.jpg', '1d2e1b640424480', 'v16', 'http://www.138wo.com/138mb/upload/images/2014/04/20/1397983174zubs.jpg', '', 0, 0, 0, '', '', 0),
(8, '还真艺术学生装精选', '还真艺术学生装精选', 'http://www.138wo.com/tpl/static/attachment/focus/default/2.jpg', 'ekmgbj1398346568', 'zongse', 'http://www.138wo.com/138mb/upload/images/2014/04/24/1398349689JPqU.jpg', '', 0, 0, 0, 'www.goudbao.com', '', 0),
(9, '', '', '', 'wjgtki1398347469', 'zongse', 'http://138wo.com/138mb/upload/images/2014/04/24/1398350911ZgNt.jpg', '', 0, 0, 0, 'www.wxwdt.com', '', 0),
(10, '微道通：3G微官网', '111', 'http://www.wdtyx.com/uploads/l/lbdpsn1397005288/5/4/d/2/thumb_53449d1909317.png', 'tskkuc1398353166', 'v_33', 'http://138wo.com/138mb/upload/images/2014/04/24/1398353335narR.png', '', 0, 0, 0, 'www.wxwdt.com/a', '', 0),
(11, 'dddd', 'ddddddddddddddd', 'dddddddddd', 'kmtyvy1398324920', 'zongse', 'http://www.138wo.com/138mb/upload/images/2014/04/24/1398349689JPqU.jpg', '', 0, 0, 0, '', '', 0),
(12, '首页', '首页', 'http://t3.qpic.cn/mblogpic/4419de670baaab60fc80/2000', 'sqzwkk1399363211', 'tianlan', 'http://www.138wo.com/138mb/upload/images/2014/05/06/1399363280cZMy.jpg', '', 0, 0, 0, '', '', 0),
(13, '', '', '', 'jyxmuo1397787030', 'ertonglipin', 'http://www.138wo.com/138mb/upload/images/2014/05/07/1399454891jMxN.png', '', 0, 0, 0, 'www.baidu.com', '', 0),
(14, '000', '00000000000000000', 'http://www.138wo.com/uploads/u/ugofuq1399431811/2/1/5/f/thumb_5369a5c334395.JPG', 'ugofuq1399431811', 'danhui', 'adsfasd', '', 0, 0, 0, 'asdf', 'YXNkZnNhZGY=', 0),
(15, '', '', '', 'pgtepl1400696466', '', 'http://wx.0724s.com/138mb/upload/images/2014/05/23/1400842437mgbW.png', '', 0, 0, 0, '', '', 0),
(16, '中华人民共和国', 'cvgdfghfghfdghdfghdfghdfghdfghdfhfg', 'http://wx.0724s.com/tpl/static/attachment/background/view/2.jpg', 'pxhsnk1400821588', '', '', '', 0, 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_template`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_template` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `generate_path` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-index,2-channel,3-template,4-singlepage',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `createhtml` tinyint(1) NOT NULL DEFAULT '1',
  `site` int(4) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isdefault` (`isdefault`),
  KEY `site` (`site`),
  KEY `time` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=561 ;

--
-- 转存表中的数据 `wy_moopha_template`
--

INSERT INTO `wy_moopha_template` (`id`, `name`, `path`, `generate_path`, `type`, `isdefault`, `createhtml`, `site`, `time`) VALUES
(433, '顶部', '@/smarty/templates/6/1d2e1b640424480/header.html', '', 4, 0, 0, 6, 1397983197),
(432, '样式css', '@/smarty/templates/6/1d2e1b640424480/style.css', '', 4, 0, 0, 6, 1397983197),
(431, '内容', '@/smarty/templates/6/1d2e1b640424480/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 6, 1397983197),
(430, '图片列表', '@/smarty/templates/6/1d2e1b640424480/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 6, 1397983197),
(429, '文字列表', '@/smarty/templates/6/1d2e1b640424480/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 6, 1397983197),
(428, '首页', '@/smarty/templates/6/1d2e1b640424480/index.html', '', 1, 0, 0, 6, 1397983197),
(434, '底部', '@/smarty/templates/6/1d2e1b640424480/footer.html', '', 4, 0, 0, 6, 1397983197),
(460, '样式css', '@/smarty/templates/9/wjgtki1398347469/style.css', '', 4, 0, 0, 9, 1398353097),
(461, '顶部', '@/smarty/templates/9/wjgtki1398347469/header.html', '', 4, 0, 0, 9, 1398353097),
(459, '内容', '@/smarty/templates/9/wjgtki1398347469/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 9, 1398353097),
(458, '图片列表', '@/smarty/templates/9/wjgtki1398347469/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 9, 1398353097),
(457, '文字列表', '@/smarty/templates/9/wjgtki1398347469/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 9, 1398353097),
(442, '首页', '@/smarty/templates/8/ekmgbj1398346568/index.html', '', 1, 1, 0, 8, 1398351058),
(443, '文字列表', '@/smarty/templates/8/ekmgbj1398346568/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 8, 1398351058),
(444, '图片列表', '@/smarty/templates/8/ekmgbj1398346568/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 8, 1398351058),
(445, '内容', '@/smarty/templates/8/ekmgbj1398346568/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 8, 1398351058),
(446, '样式css', '@/smarty/templates/8/ekmgbj1398346568/style.css', '', 4, 0, 0, 8, 1398351058),
(447, '顶部', '@/smarty/templates/8/ekmgbj1398346568/header.html', '', 4, 0, 0, 8, 1398351058),
(448, '底部', '@/smarty/templates/8/ekmgbj1398346568/footer.html', '', 4, 0, 0, 8, 1398351058),
(456, '首页', '@/smarty/templates/9/wjgtki1398347469/index.html', '', 1, 1, 0, 9, 1398353097),
(462, '底部', '@/smarty/templates/9/wjgtki1398347469/footer.html', '', 4, 0, 0, 9, 1398353097),
(497, '底部', '@/smarty/templates/0/tskkuc1398353166/footer.html', '', 4, 0, 0, 10, 1398353597),
(496, '顶部', '@/smarty/templates/0/tskkuc1398353166/header.html', '', 4, 0, 0, 10, 1398353597),
(495, '样式css', '@/smarty/templates/0/tskkuc1398353166/style.css', '', 4, 0, 0, 10, 1398353597),
(494, '内容', '@/smarty/templates/0/tskkuc1398353166/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 10, 1398353597),
(492, '文字列表', '@/smarty/templates/0/tskkuc1398353166/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 10, 1398353597),
(493, '图片列表', '@/smarty/templates/0/tskkuc1398353166/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 10, 1398353597),
(491, '首页', '@/smarty/templates/0/tskkuc1398353166/index.html', '', 1, 1, 0, 10, 1398353597),
(498, '首页', '@/smarty/templates/1/kmtyvy1398324920/index.html', '', 1, 1, 0, 11, 1398400788),
(499, '文字列表', '@/smarty/templates/1/kmtyvy1398324920/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 11, 1398400788),
(500, '图片列表', '@/smarty/templates/1/kmtyvy1398324920/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 11, 1398400788),
(501, '内容', '@/smarty/templates/1/kmtyvy1398324920/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 11, 1398400788),
(502, '样式css', '@/smarty/templates/1/kmtyvy1398324920/style.css', '', 4, 0, 0, 11, 1398400788),
(503, '顶部', '@/smarty/templates/1/kmtyvy1398324920/header.html', '', 4, 0, 0, 11, 1398400788),
(504, '底部', '@/smarty/templates/1/kmtyvy1398324920/footer.html', '', 4, 0, 0, 11, 1398400788),
(523, '样式css', '@/smarty/templates/2/sqzwkk1399363211/style.css', '', 4, 0, 0, 12, 1399364875),
(524, '顶部', '@/smarty/templates/2/sqzwkk1399363211/header.html', '', 4, 0, 0, 12, 1399364875),
(522, '内容', '@/smarty/templates/2/sqzwkk1399363211/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 12, 1399364875),
(521, '图片列表', '@/smarty/templates/2/sqzwkk1399363211/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 12, 1399364875),
(520, '文字列表', '@/smarty/templates/2/sqzwkk1399363211/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 12, 1399364875),
(519, '首页', '@/smarty/templates/2/sqzwkk1399363211/index.html', '', 1, 1, 0, 12, 1399364875),
(525, '底部', '@/smarty/templates/2/sqzwkk1399363211/footer.html', '', 4, 0, 0, 12, 1399364875),
(552, '顶部', '@/smarty/templates/3/jyxmuo1397787030/header.html', '', 4, 0, 0, 13, 1399464717),
(553, '底部', '@/smarty/templates/3/jyxmuo1397787030/footer.html', '', 4, 0, 0, 13, 1399464717),
(550, '内容', '@/smarty/templates/3/jyxmuo1397787030/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 13, 1399464717),
(551, '样式css', '@/smarty/templates/3/jyxmuo1397787030/style.css', '', 4, 0, 0, 13, 1399464717),
(549, '图片列表', '@/smarty/templates/3/jyxmuo1397787030/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 13, 1399464717),
(548, '文字列表', '@/smarty/templates/3/jyxmuo1397787030/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 13, 1399464717),
(547, '首页', '@/smarty/templates/3/jyxmuo1397787030/index.html', '', 1, 1, 0, 13, 1399464717),
(554, '首页', '@/smarty/templates/4/ugofuq1399431811/index.html', '', 1, 1, 0, 14, 1400128372),
(555, '文字列表', '@/smarty/templates/4/ugofuq1399431811/channel_text.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 1, 0, 14, 1400128372),
(556, '图片列表', '@/smarty/templates/4/ugofuq1399431811/channel_picture.html', '?m=site&c=home&a=channel&channelid={channelID}', 2, 0, 0, 14, 1400128372),
(557, '内容', '@/smarty/templates/4/ugofuq1399431811/content.html', '?m=site&c=home&a=content&contentid={contentID}', 3, 1, 0, 14, 1400128372),
(558, '样式css', '@/smarty/templates/4/ugofuq1399431811/style.css', '', 4, 0, 0, 14, 1400128372),
(559, '顶部', '@/smarty/templates/4/ugofuq1399431811/header.html', '', 4, 0, 0, 14, 1400128372),
(560, '底部', '@/smarty/templates/4/ugofuq1399431811/footer.html', '', 4, 0, 0, 14, 1400128372);

-- --------------------------------------------------------

--
-- 表的结构 `wy_moopha_user`
--

CREATE TABLE IF NOT EXISTS `wy_moopha_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` char(6) NOT NULL,
  `mp` char(11) DEFAULT NULL,
  `qq` varchar(15) DEFAULT '',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `regip` varchar(30) DEFAULT NULL,
  `regtime` int(10) DEFAULT NULL,
  `lastloginip` varchar(30) DEFAULT NULL,
  `lastlogintime` int(10) DEFAULT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_moopha_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_my_answer`
--

CREATE TABLE IF NOT EXISTS `wy_my_answer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL COMMENT '问题',
  `answer` varchar(1023) DEFAULT NULL COMMENT '回答',
  PRIMARY KEY (`id`),
  KEY `wid_index` (`token`) USING BTREE,
  KEY `question_index` (`question`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_my_answer`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_nav`
--

CREATE TABLE IF NOT EXISTS `wy_nav` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `mod` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_nav`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_nearby_user`
--

CREATE TABLE IF NOT EXISTS `wy_nearby_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_nearby_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_node`
--

CREATE TABLE IF NOT EXISTS `wy_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '节点名称',
  `title` varchar(50) NOT NULL COMMENT '菜单名称',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1：是 2：否',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(1) unsigned NOT NULL COMMENT '节点等级',
  `data` varchar(255) DEFAULT NULL COMMENT '附加参数',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '菜单显示类型 0:不显示 1:导航菜单 2:左侧菜单',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- 转存表中的数据 `wy_node`
--

INSERT INTO `wy_node` (`id`, `name`, `title`, `status`, `remark`, `pid`, `level`, `data`, `sort`, `display`) VALUES
(1, 'cms', '根节点', 1, '', 0, 1, NULL, 0, 0),
(2, 'Site', '站点管理', 1, '', 1, 0, NULL, 0, 1),
(3, 'User', '用户管理', 1, '', 1, 0, NULL, 0, 1),
(4, 'extent', '扩展管理', 1, '', 1, 0, NULL, 10, 1),
(5, 'article', '内容管理', 1, '', 1, 0, NULL, 0, 1),
(6, 'Site', '站点设置', 1, '', 2, 2, NULL, 0, 2),
(7, 'index', '基本信息设置', 1, '', 6, 3, NULL, 0, 2),
(8, 'safe', '安全设置', 1, '', 6, 3, NULL, 0, 2),
(9, 'email', '邮箱设置', 1, '', 6, 3, NULL, 0, 2),
(10, 'upfile', '附件设置', 1, '', 6, 3, NULL, 0, 2),
(11, 'Node', '节点管理', 1, NULL, 2, 2, NULL, 0, 2),
(12, 'add', '添加节点', 1, '', 11, 3, NULL, 0, 2),
(13, 'index', '节点列表', 1, '', 11, 3, NULL, 0, 2),
(14, 'insert', '写入', 1, '0', 11, 3, NULL, 0, 0),
(15, 'edit', '编辑节点', 1, '0', 11, 3, NULL, 0, 0),
(16, 'update', '更新节点', 1, '0', 11, 3, NULL, 0, 0),
(17, 'del', '删除节点', 1, '0', 11, 3, NULL, 0, 0),
(18, 'User', '用户中心', 1, '0', 3, 2, NULL, 0, 2),
(19, 'add', '添加用户', 1, '0', 18, 3, NULL, 0, 2),
(20, 'index', '用户列表', 1, '0', 18, 3, NULL, 0, 2),
(21, 'edit', '编辑用户', 1, '0', 18, 3, NULL, 0, 0),
(22, 'insert', '写入数据库', 1, '0', 18, 3, NULL, 0, 0),
(23, 'update', '更新用户', 1, '0', 18, 3, NULL, 0, 0),
(24, 'del', '删除用户', 1, '0', 18, 3, NULL, 0, 0),
(25, 'Group', '管理组', 1, '0', 3, 2, NULL, 0, 2),
(26, 'add', '创建用户组', 1, '0', 25, 3, NULL, 0, 2),
(27, 'index', '用户组列表', 1, '0', 25, 3, NULL, 0, 2),
(28, 'edit', '编辑用户组', 1, '0', 25, 3, NULL, 0, 0),
(29, 'del', '删除用户组', 1, '0', 25, 3, NULL, 0, 0),
(30, 'insert', '写入数据库', 1, '0', 25, 3, NULL, 0, 0),
(31, 'update', '更新用户组', 1, '0', 25, 3, NULL, 0, 0),
(32, 'insert', '保存测试', 1, '0', 6, 3, NULL, 0, 0),
(36, 'menu', '左侧栏', 1, '0', 35, 3, NULL, 0, 0),
(35, 'System', '首页', 1, '0', 2, 2, NULL, 0, 0),
(37, 'main', '右侧栏目', 1, '0', 35, 3, NULL, 0, 0),
(38, 'Article', '微信图文', 1, '0', 5, 2, NULL, 0, 2),
(39, 'index', '图文列表', 1, '0', 38, 3, NULL, 0, 2),
(40, 'add', '图文添加', 1, '0', 38, 3, NULL, 0, 2),
(41, 'edit', '微信图文编辑', 1, '0', 38, 3, NULL, 0, 0),
(42, 'del', '微信图文删除', 1, '0', 38, 3, NULL, 0, 0),
(80, 'token', '公众号管理', 1, '0', 1, 2, NULL, 0, 1),
(45, 'Function', '功能模块', 1, '0', 1, 0, NULL, 0, 1),
(46, 'Function', '功能模块', 1, '0', 45, 2, NULL, 0, 2),
(47, 'add', '添加模块', 1, '0', 46, 3, NULL, 0, 2),
(48, 'User_group', '会员组', 1, '0', 3, 2, NULL, 0, 2),
(49, 'add', '添加会员组', 1, '0', 48, 3, NULL, 0, 2),
(50, 'Users', '前台用户', 1, '0', 3, 2, NULL, 0, 2),
(51, 'index', '用户列表', 1, '0', 50, 3, NULL, 0, 0),
(52, 'add', '添加用户', 1, '0', 50, 3, NULL, 0, 2),
(53, 'edit', '编辑用户', 1, '0', 50, 3, NULL, 0, 0),
(54, 'del', '删除用户', 1, '0', 50, 3, NULL, 0, 0),
(55, 'insert', '写入数据库', 1, '0', 50, 3, NULL, 0, 0),
(56, 'upsave', '更新用户', 1, '0', 50, 3, NULL, 0, 0),
(57, 'Text', '微信文本', 1, '0', 5, 2, NULL, 0, 2),
(58, 'index', '文本列表', 1, '0', 57, 3, NULL, 0, 2),
(59, 'del', '删除', 1, '0', 57, 3, NULL, 0, 0),
(60, 'Custom', '自定义页面', 1, '0', 5, 2, NULL, 0, 2),
(61, 'index', '列表', 1, '0', 60, 3, NULL, 0, 2),
(62, 'edit', '编辑', 1, '0', 60, 3, NULL, 0, 0),
(63, 'del', '删除', 1, '0', 60, 3, NULL, 0, 0),
(64, 'Records', '充值记录', 1, '0', 4, 2, NULL, 0, 2),
(65, 'index', '充值列表', 1, '0', 64, 3, NULL, 0, 2),
(66, 'Case', '用户案例', 1, '0', 4, 2, NULL, 0, 2),
(67, 'index', '案例列表', 1, '0', 66, 3, NULL, 0, 2),
(68, 'add', '添加案例', 1, '0', 66, 3, NULL, 0, 2),
(69, 'edit', '编辑案例', 1, '0', 66, 3, NULL, 0, 0),
(70, 'del', '删除案例', 1, '0', 66, 3, NULL, 0, 0),
(71, 'insert', '写入数据库', 1, '0', 66, 3, NULL, 0, 0),
(72, 'upsave', '更新数据库', 1, '0', 66, 3, NULL, 0, 0),
(73, 'Links', '友情链接', 1, '0', 4, 2, NULL, 0, 2),
(74, 'index', '友情链接', 1, '0', 73, 3, NULL, 0, 2),
(75, 'add', '添加链接', 1, '0', 73, 3, NULL, 0, 2),
(76, 'edit', '编辑链接', 1, '0', 73, 3, NULL, 0, 0),
(77, 'insert', '插入数据库', 1, '0', 73, 3, NULL, 0, 0),
(78, 'upsave', '更新数据库', 1, '0', 73, 3, NULL, 0, 0),
(79, 'del', '删除友情链接', 1, '0', 73, 3, NULL, 0, 0),
(81, 'Token', '公众号管理', 1, '0', 80, 2, NULL, 0, 2),
(83, 'alipay', '在线支付接口', 1, '0', 6, 3, NULL, 0, 2),
(84, 'AP', '设备管理', 1, '0', 1, 0, NULL, 0, 1),
(85, 'Terminal', '终端管理', 1, '0', 84, 2, NULL, 0, 2),
(86, 'AP', '设备管理', 1, '0', 84, 2, NULL, 0, 2),
(88, 'Heartbeat', '心跳设置', 1, '0', 6, 3, NULL, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `wy_norms`
--

CREATE TABLE IF NOT EXISTS `wy_norms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL,
  `catid` int(10) unsigned NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wy_norms`
--

INSERT INTO `wy_norms` (`id`, `type`, `catid`, `value`) VALUES
(4, 1, 24, '黄'),
(2, 1, 24, '红'),
(3, 0, 24, '170'),
(5, 0, 24, '175');

-- --------------------------------------------------------

--
-- 表的结构 `wy_oauth`
--

CREATE TABLE IF NOT EXISTS `wy_oauth` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `config` text NOT NULL,
  `desc` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_oauth`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ordering_class`
--

CREATE TABLE IF NOT EXISTS `wy_ordering_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sort` tinyint(2) NOT NULL,
  `info` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ordering_class`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_ordering_set`
--

CREATE TABLE IF NOT EXISTS `wy_ordering_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `keyword` varchar(10) NOT NULL,
  `title` varchar(60) NOT NULL,
  `info` varchar(120) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `flash` text NOT NULL,
  `create_time` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_ordering_set`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_order_detail`
--

CREATE TABLE IF NOT EXISTS `wy_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(50) NOT NULL COMMENT '订单编号',
  `itemId` int(11) NOT NULL COMMENT '商品ID',
  `title` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `img` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '单价',
  `quantity` int(11) NOT NULL COMMENT '购买数量',
  `item_attr` varchar(255) DEFAULT NULL COMMENT '商品属性',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_order_detail`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_other`
--

CREATE TABLE IF NOT EXISTS `wy_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `info` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `wy_other`
--

INSERT INTO `wy_other` (`id`, `token`, `keyword`, `info`) VALUES
(1, 'cirzxd1395130461', '2323', '1213213'),
(2, 'frcgdx1395379235', '', 'fsdfsdf'),
(3, '1d2e1b640424480', '功能介绍', ''),
(4, 'pzyjnr1396616671', '', '我很嗨，嘎嘎嘎'),
(5, 'kmdivh1396891840', '', '[玫瑰][玫瑰][玫瑰]HI~您好，美在黛颜莉，欢迎关注黛颜莉美容SPA连锁！小微每天在线时间是：8:00-17:30不在线时间请留言！！\r\n小微会在第一时间回复您！   想了解信息，如回复数字\r\n1、非本店会员请回复1+您所在城市\r\n2、本店会员请回复2+您所在城市\r\n3、本店员工请回复3+您所在城市\r\n	 赶紧运动运动你的手指头，开始您的美丽之旅吧！——[OK]回复“首页”可返回主菜单————'),
(6, 'kpublj1397561596', '首页', ''),
(7, 'rhwqjq1398136971', '小黄鸡', '当小黄鸡聊天系统关闭后，客户回复无回答的时候将会触发此回复'),
(8, 'icfqbw1398234753', '1', '1'),
(9, 'mbuiub1398764517', '', '请回复官网'),
(10, 'wjjnxm1399082112', '', '亲你的问题暂时我们无法解答哦'),
(11, 'nieynx1399196814', '', '关键词无效...警告！系统出错！警告！系统出错！ 5分钟后自爆手机，请尽快备份然后将手机扔到垃圾桶！！！'),
(12, 'emnaty1399451201', '', 'Oh no ！你能说点我听得懂的不？'),
(13, 'aeeioq1399254193', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_panorama`
--

CREATE TABLE IF NOT EXISTS `wy_panorama` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(300) NOT NULL DEFAULT '',
  `music` varchar(100) NOT NULL DEFAULT '',
  `frontpic` varchar(100) NOT NULL DEFAULT '',
  `rightpic` varchar(100) NOT NULL DEFAULT '',
  `backpic` varchar(100) NOT NULL DEFAULT '',
  `leftpic` varchar(100) NOT NULL DEFAULT '',
  `toppic` varchar(100) NOT NULL DEFAULT '',
  `bottompic` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(60) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  `taxis` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `wy_panorama`
--

INSERT INTO `wy_panorama` (`id`, `token`, `name`, `intro`, `music`, `frontpic`, `rightpic`, `backpic`, `leftpic`, `toppic`, `bottompic`, `keyword`, `time`, `taxis`) VALUES
(1, '1d2e1b640424480', '测试图片', '', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '测试图片', 0, 0),
(2, 'a8a83dcf154f3fe', '1111', '111', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '全景', 0, 1),
(3, 'd0a4cda1548af46', '房产全景', '描述信息描述信息描述信息描述信息描述信息描述信息描述信息', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '房产全景', 0, 0),
(4, 'd0a4cda1548af46', '汽车全景', '描述信息描述信息描述信息描述信息描述信息描述信息', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '12', 0, 0),
(5, 'mxktut1396253905', '户型1', '', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '户型', 0, 0),
(6, 'pzyjnr1396616671', '全景', '', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '全景', 0, 0),
(7, 'kxofnz1396788966', '1', 'qq', 'http://bcs.duapp.com/king0902/mp3/13828033531704349684.mp3', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '', 0, 1),
(8, 'kxofnz1396788966', '2', '2', 'http://bcs.duapp.com/king0902/mp3/13828033531704349684.mp3', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '', 0, 2),
(9, 'jlebuj1397125772', '321', '', '', 'http://www.138wo.com/Uploads/image/20140412/5348b60e6f282.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '360', 0, 123456),
(10, 'kpublj1397561596', '207两厢', '描述信息', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '207', 0, 1),
(11, 'mfesfx1397632991', '1', '11111111', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '1', 0, 1),
(12, 'wlpmih1397801081', '360', '发的撒个傻大个', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '360', 0, 1),
(13, 'paelcf1398240869', '360全景户型', '', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '360全景户型', 0, 1),
(15, 'ajoazr1398910358', '全景泰蓝', '', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '全景', 0, 0),
(16, 'ftifos1398957899', '360全景', '', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '360全景', 0, 0),
(17, 'wjjnxm1399082112', '360全景', '123', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '全景', 0, 1),
(18, 'paebkl1399911275', '别墅', '别墅360全景', '', '/tpl/User/default/common/images/panorama/0.jpg', '/tpl/User/default/common/images/panorama/1.jpg', '/tpl/User/default/common/images/panorama/2.jpg', '/tpl/User/default/common/images/panorama/3.jpg', '/tpl/User/default/common/images/panorama/4.jpg', '/tpl/User/default/common/images/panorama/5.jpg', '别墅', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_pay`
--

CREATE TABLE IF NOT EXISTS `wy_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '支付方式名称',
  `pay_type` varchar(100) DEFAULT NULL COMMENT '支付类型',
  `config` text COMMENT '支付参数配置',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_pay`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_photo`
--

CREATE TABLE IF NOT EXISTS `wy_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(20) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `isshoinfo` tinyint(1) NOT NULL,
  `num` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `info` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_photo`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_photo_list`
--

CREATE TABLE IF NOT EXISTS `wy_photo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `info` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_photo_list`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product`
--

CREATE TABLE IF NOT EXISTS `wy_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sort` int(10) NOT NULL DEFAULT '0',
  `catid` mediumint(4) NOT NULL DEFAULT '0',
  `storeid` mediumint(4) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `vprice` float NOT NULL,
  `oprice` float NOT NULL DEFAULT '0',
  `mailprice` float NOT NULL,
  `discount` float NOT NULL DEFAULT '10',
  `intro` text NOT NULL,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `salecount` mediumint(4) NOT NULL DEFAULT '0',
  `logourl` varchar(150) NOT NULL DEFAULT '',
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `groupon` tinyint(1) NOT NULL DEFAULT '0',
  `endtime` int(10) NOT NULL DEFAULT '0',
  `fakemembercount` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  `num` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`storeid`),
  KEY `catid_2` (`catid`),
  KEY `storeid` (`storeid`),
  KEY `token` (`token`),
  KEY `price` (`price`),
  KEY `oprice` (`oprice`),
  KEY `discount` (`discount`),
  KEY `dining` (`dining`),
  KEY `groupon` (`groupon`,`endtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_attribute`
--

CREATE TABLE IF NOT EXISTS `wy_product_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_attribute`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_cart`
--

CREATE TABLE IF NOT EXISTS `wy_product_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transactionid` varchar(100) NOT NULL DEFAULT '',
  `paytype` varchar(30) NOT NULL DEFAULT '',
  `productid` int(10) NOT NULL DEFAULT '0',
  `code` varchar(50) NOT NULL DEFAULT '',
  `token` varchar(50) NOT NULL DEFAULT '',
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `diningtype` mediumint(2) NOT NULL DEFAULT '0',
  `info` text NOT NULL,
  `total` mediumint(4) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `tel` varchar(14) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `ordertype` mediumint(2) NOT NULL DEFAULT '0',
  `tableid` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  `buytime` varchar(100) NOT NULL DEFAULT '',
  `groupon` tinyint(1) NOT NULL DEFAULT '0',
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `year` mediumint(4) NOT NULL DEFAULT '0',
  `month` mediumint(4) NOT NULL DEFAULT '0',
  `day` mediumint(4) NOT NULL DEFAULT '0',
  `hour` smallint(4) NOT NULL DEFAULT '0',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `orderid` varchar(40) NOT NULL DEFAULT '',
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `logistics` varchar(70) NOT NULL DEFAULT '',
  `logisticsid` varchar(50) NOT NULL DEFAULT '',
  `printed` tinyint(1) NOT NULL DEFAULT '0',
  `handled` tinyint(1) NOT NULL DEFAULT '0',
  `handledtime` int(10) NOT NULL DEFAULT '0',
  `handleduid` int(10) NOT NULL DEFAULT '0',
  `score` int(10) unsigned NOT NULL,
  `paymode` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`time`),
  KEY `groupon` (`groupon`),
  KEY `dining` (`dining`),
  KEY `printed` (`printed`),
  KEY `year` (`year`,`month`,`day`,`hour`),
  KEY `diningtype` (`diningtype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_cart`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_cart_list`
--

CREATE TABLE IF NOT EXISTS `wy_product_cart_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cartid` int(10) NOT NULL DEFAULT '0',
  `productid` int(10) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `total` mediumint(4) NOT NULL DEFAULT '0',
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `token` varchar(50) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cartid` (`cartid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `wy_product_cart_list`
--

INSERT INTO `wy_product_cart_list` (`id`, `cartid`, `productid`, `price`, `total`, `wecha_id`, `token`, `time`) VALUES
(1, 2, 26, 1, 1, 'o-oeYjmDmgDtyYpeSHN7mpJq-xFw', '1d2e1b640424480', 1400309972),
(2, 3, 26, 1, 1, 'o-oeYjmDmgDtyYpeSHN7mpJq-xFw', '1d2e1b640424480', 1400311680),
(3, 4, 12, 28, 1, 'o-oeYjpoITosjf56gKxTop8ZZIag', '1d2e1b640424480', 1400325719),
(4, 4, 13, 18, 1, 'o-oeYjpoITosjf56gKxTop8ZZIag', '1d2e1b640424480', 1400325719),
(5, 4, 15, 15, 1, 'o-oeYjpoITosjf56gKxTop8ZZIag', '1d2e1b640424480', 1400325719),
(6, 5, 26, 100, 1, 'o-oeYjrLq2V4O4CcRNLFQeIMC-yA', '1d2e1b640424480', 1400379111),
(7, 6, 26, 100, 1, 'o-oeYjpWXtc0KQ1gNvdxV-Ltn8n8', '1d2e1b640424480', 1400397612),
(8, 7, 26, 100, 1, 'o-oeYjpWXtc0KQ1gNvdxV-Ltn8n8', '1d2e1b640424480', 1400397657),
(9, 8, 26, 100, 1, 'o-oeYjpWXtc0KQ1gNvdxV-Ltn8n8', '1d2e1b640424480', 1400397695),
(10, 9, 28, 4, 1, 'oYFa5jl53BKArLZiwHG34W-rq1KI', 'uvezwy1400243429', 1400411596),
(11, 10, 28, 2, 1, 'oYFa5jl53BKArLZiwHG34W-rq1KI', 'uvezwy1400243429', 1400411659),
(12, 12, 8, 20, 4, 'o-oeYjuNYJia0TQvDj2M4EAmKQRs', '1d2e1b640424480', 1400484500),
(13, 13, 14, 35, 1, 'o-oeYjoFiUmXE3JqtLyRalYjXkP8', '1d2e1b640424480', 1400490853),
(14, 13, 17, 35, 1, 'o-oeYjoFiUmXE3JqtLyRalYjXkP8', '1d2e1b640424480', 1400490853),
(15, 14, 26, 200, 2, 'o-oeYjrTW3xWIPaOiiAVW-J1MiCE', '1d2e1b640424480', 1400569026),
(16, 15, 26, 100, 1, 'o-oeYjg-I2ZYUprffoUm264Discg', '1d2e1b640424480', 1400596182);

-- --------------------------------------------------------

--
-- 表的结构 `wy_product_cat`
--

CREATE TABLE IF NOT EXISTS `wy_product_cat` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL DEFAULT '',
  `parentid` mediumint(4) NOT NULL,
  `logourl` varchar(100) NOT NULL,
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  `norms` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `token` (`token`),
  KEY `dining` (`dining`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_detail`
--

CREATE TABLE IF NOT EXISTS `wy_product_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `format` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `price` float NOT NULL,
  `vprice` float NOT NULL,
  `logo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_detail`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_diningtable`
--

CREATE TABLE IF NOT EXISTS `wy_product_diningtable` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `intro` varchar(500) NOT NULL DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_diningtable`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_image`
--

CREATE TABLE IF NOT EXISTS `wy_product_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_image`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_mail_price`
--

CREATE TABLE IF NOT EXISTS `wy_product_mail_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_mail_price`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_product_setting`
--

CREATE TABLE IF NOT EXISTS `wy_product_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `score` float NOT NULL,
  `paymode` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_product_setting`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_recipe`
--

CREATE TABLE IF NOT EXISTS `wy_recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `begintime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL,
  `ishow` int(1) NOT NULL DEFAULT '1' COMMENT '1:显示,2隐藏,默认1',
  `sort` int(11) NOT NULL DEFAULT '1',
  `type` char(15) NOT NULL DEFAULT '',
  `headpic` varchar(200) NOT NULL,
  `infos` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_recipe`
--

INSERT INTO `wy_recipe` (`id`, `token`, `keyword`, `title`, `begintime`, `endtime`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `ishow`, `sort`, `type`, `headpic`, `infos`) VALUES
(1, 'uvezwy1400243429', '食谱', '一周食谱', 1400342400, 1401379200, 'a:10:{s:6:"mon_zc";s:35:"松子大米粥,煮鸡蛋,豆沙包";s:6:"zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"mon_zjc";s:6:"牛奶";s:11:"mon_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"mon_wc";s:51:"米饭,珍珠鱼丸,木耳园白菜,冬瓜丸子汤";s:10:"mon_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"mon_wjc";s:6:"苹果";s:11:"mon_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"mon_wwc";s:45:"发糕,肉炒三丁,熏干芹菜,玉米面粥";s:11:"mon_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 'a:10:{s:6:"tus_zc";s:41:"青菜肉丝柳叶面,摊鸡蛋,菊花卷";s:10:"tus_zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"tus_zjc";s:6:"牛奶";s:11:"tus_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"tus_wc";s:48:"米饭,鸡丁黄瓜,蕃茄菜花,鸡蛋紫菜汤";s:10:"tus_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"tus_wjc";s:6:"香蕉";s:11:"tus_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"tus_wwc";s:22:"小笼包子,小米粥";s:11:"tus_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 'a:10:{s:6:"wed_zc";s:35:"松子大米粥,煮鸡蛋,豆沙包";s:10:"wed_zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"wed_zjc";s:6:"牛奶";s:11:"wed_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"wed_wc";s:51:"米饭,珍珠鱼丸,木耳园白菜,冬瓜丸子汤";s:10:"wed_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"wed_wjc";s:6:"苹果";s:11:"wed_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"wed_wwc";s:45:"发糕,肉炒三丁,熏干芹菜,玉米面粥";s:11:"wed_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 'a:10:{s:6:"thu_zc";s:41:"青菜肉丝柳叶面,摊鸡蛋,菊花卷";s:10:"thu_zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"thu_zjc";s:6:"牛奶";s:11:"thu_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"thu_wc";s:48:"米饭,鸡丁黄瓜,蕃茄菜花,鸡蛋紫菜汤";s:10:"thu_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"thu_wjc";s:6:"香蕉";s:11:"thu_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"thu_wwc";s:22:"小笼包子,小米粥";s:11:"thu_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 'a:10:{s:6:"fri_zc";s:35:"松子大米粥,煮鸡蛋,豆沙包";s:10:"fri_zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"fri_zjc";s:6:"牛奶";s:11:"fri_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"fri_wc";s:51:"米饭,珍珠鱼丸,木耳园白菜,冬瓜丸子汤";s:10:"fri_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"fri_wjc";s:6:"苹果";s:11:"fri_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"fri_wwc";s:45:"发糕,肉炒三丁,熏干芹菜,玉米面粥";s:11:"fri_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 'a:10:{s:6:"sat_zc";s:41:"青菜肉丝柳叶面,摊鸡蛋,菊花卷";s:10:"sat_zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"sat_zjc";s:6:"牛奶";s:11:"sat_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"sat_wc";s:48:"米饭,鸡丁黄瓜,蕃茄菜花,鸡蛋紫菜汤";s:10:"sat_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"sat_wjc";s:6:"香蕉";s:11:"sat_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"sat_wwc";s:22:"小笼包子,小米粥";s:11:"sat_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 'a:10:{s:6:"sun_zc";s:35:"松子大米粥,煮鸡蛋,豆沙包";s:10:"sun_zc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/zc.jpg";s:7:"sun_zjc";s:6:"牛奶";s:11:"sun_zjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/zjc.jpg";s:6:"sun_wc";s:51:"米饭,珍珠鱼丸,木耳园白菜,冬瓜丸子汤";s:10:"sun_wc_pic";s:46:"http://demo.138wo.com/tpl/static/recipe/wc.jpg";s:7:"sun_wjc";s:6:"苹果";s:11:"sun_wjc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wjc.jpg";s:7:"sun_wwc";s:46:"发糕,,肉炒三丁,熏干芹菜,玉米面粥";s:11:"sun_wwc_pic";s:47:"http://demo.138wo.com/tpl/static/recipe/wwc.jpg";}', 1, 1, 'school', 'http://demo.138wo.com/tpl/static/attachment/focus/default/6.jpg', '太好吃了');

-- --------------------------------------------------------

--
-- 表的结构 `wy_recognition`
--

CREATE TABLE IF NOT EXISTS `wy_recognition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `attention_num` int(5) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `code_url` varchar(200) NOT NULL,
  `scene_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `wy_recognition`
--

INSERT INTO `wy_recognition` (`id`, `token`, `title`, `attention_num`, `keyword`, `code_url`, `scene_id`, `status`) VALUES
(2, 'ygojzx1396002773', 'sd', 0, 'sd', '', 0, 0),
(3, 'gwnyxz1396154763', '22', 0, '歌曲', '', 0, 0),
(4, 'alkmti1395216191', '123', 0, '123', '', 0, 0),
(5, 'gwnyxz1396154763', '让人', 0, '让人', '', 0, 0),
(6, 'gwnyxz1396154763', '日日日', 0, '让人', '', 0, 0),
(7, 'jxwcvs1395158492', '水电费', 0, '3', '', 0, 0),
(8, '1d2e1b640424480', '密码', 0, '密码', 'gQEO8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL25reUx0dy1tRUlWcHlXaEJsR0FIAAIENIVGUwMEAAAAAA==', 0, 0),
(9, 'kxofnz1396788966', '密码', 0, '密码', '', 0, 0),
(10, 'qlzbag1396749816', '0000', 0, '首页', '', 0, 0),
(11, 'kzmqjf1396932473', 'rwer', 0, '11', '', 0, 0),
(13, 'kmdivh1396891840', 'qq', 0, 'qq', '', 0, 0),
(14, 'qlzbag1396749816', '员工一', 0, '一', '', 0, 0),
(15, 'xtyszz1396519155', '1', 0, '1', '', 0, 0),
(16, 'qlzbag1396749816', '测试签到', 0, '么么三', '', 0, 0),
(18, 'jlebuj1397125772', '1', 1, '12', 'gQEi8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL2JFUDhDQWpsdjlQR3hxODZrMjlrAAIE4YpGUwMEAAAAAA==', 0, 0),
(19, 'jlebuj1397125772', 'cesi', 0, 'ceshi', 'gQHZ8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL1ZFTzM5bFBsOGRPSVc1ZkIyRzlrAAIEtGNHUwMEAAAAAA==', 0, -1),
(20, 'ixfwzt1397211854', '西北企业网', 0, '西北', '', 0, 0),
(21, 'nwbxfy1396588424', '西北企业网', 0, '西北', '', 0, 0),
(22, 'dbxuql1397498445', 'VIP', 0, 'd', '', 0, 0),
(23, 'aqzqfq1397495433', '25', 0, '25', '', 0, 0),
(24, 'aqzqfq1397495433', '111', 0, '222', '', 0, 0),
(25, 'wwkuzi1398775443', '移民部推荐', 0, '移民部', '', 0, 0),
(26, 'aeeioq1399254193', '测试', 3, '才', 'gQG/7zoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL0xreG9sWC1sVmdndkpobEd1MkJMAAIEQ6FoUwMEAAAAAA==', 0, -1),
(27, 'unpvzc1399101846', '46562', 0, '111', '', 0, 0),
(28, 'nvripe1400600403', '车辆违章', 5, '违章', 'gQE17zoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL0ZrTjdtZXpsUlJvOEh2VEk0bV9NAAIEL3p7UwMEAAAAAA==', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_reply`
--

CREATE TABLE IF NOT EXISTS `wy_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wecha_id` varchar(60) NOT NULL,
  `differ` tinyint(4) NOT NULL DEFAULT '0',
  `checked` tinyint(4) NOT NULL DEFAULT '0',
  `message_id` int(11) NOT NULL,
  `reply` varchar(1000) NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_reply`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_reply_info`
--

CREATE TABLE IF NOT EXISTS `wy_reply_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `picurl` varchar(120) NOT NULL DEFAULT '',
  `info` varchar(120) NOT NULL DEFAULT '',
  `infotype` varchar(20) NOT NULL DEFAULT '',
  `diningyuding` tinyint(1) NOT NULL DEFAULT '1',
  `diningwaimai` tinyint(1) NOT NULL DEFAULT '1',
  `config` text NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `apiurl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_reply_info`
--

INSERT INTO `wy_reply_info` (`id`, `token`, `title`, `picurl`, `info`, `infotype`, `diningyuding`, `diningwaimai`, `config`, `keyword`, `apiurl`) VALUES
(1, 'pgtepl1400696466', '相册', '/tpl/Wap/default/common/css/Photo/banner.jpg', '', 'album', 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_requestdata`
--

CREATE TABLE IF NOT EXISTS `wy_requestdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `time` int(11) NOT NULL,
  `textnum` int(5) NOT NULL,
  `imgnum` int(5) NOT NULL,
  `videonum` int(5) NOT NULL,
  `other` int(5) NOT NULL,
  `follownum` int(5) NOT NULL,
  `unfollownum` int(5) NOT NULL,
  `3g` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_requestdata`
--

INSERT INTO `wy_requestdata` (`id`, `token`, `year`, `month`, `day`, `time`, `textnum`, `imgnum`, `videonum`, `other`, `follownum`, `unfollownum`, `3g`) VALUES
(1, 'jyccid1400850497', 2014, 5, 23, 1400853368, 17, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_reservation`
--

CREATE TABLE IF NOT EXISTS `wy_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `picurl` varchar(200) NOT NULL,
  `addtype` varchar(20) NOT NULL DEFAULT 'house_book',
  `address` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `lng` varchar(13) NOT NULL,
  `lat` varchar(13) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `headpic` varchar(200) NOT NULL,
  `info` varchar(200) NOT NULL,
  `typename` varchar(50) NOT NULL,
  `typename2` varchar(50) NOT NULL,
  `typename3` varchar(50) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `date` varchar(50) NOT NULL,
  `allnums` varchar(50) NOT NULL,
  `name_show` tinyint(4) NOT NULL DEFAULT '1',
  `time_show` tinyint(4) NOT NULL DEFAULT '1',
  `txt1` varchar(50) NOT NULL,
  `value1` varchar(50) NOT NULL,
  `txt2` varchar(50) NOT NULL,
  `value2` varchar(50) NOT NULL,
  `txt3` varchar(50) NOT NULL,
  `value3` varchar(50) NOT NULL,
  `txt4` varchar(50) NOT NULL,
  `value4` varchar(50) NOT NULL,
  `txt5` varchar(50) NOT NULL,
  `value5` varchar(50) NOT NULL,
  `select1` varchar(50) NOT NULL,
  `svalue1` varchar(100) NOT NULL,
  `select2` varchar(50) NOT NULL,
  `svalue2` varchar(100) NOT NULL,
  `select3` varchar(50) NOT NULL,
  `svalue3` varchar(100) NOT NULL,
  `select4` varchar(50) NOT NULL,
  `svalue4` varchar(100) NOT NULL,
  `select5` varchar(50) NOT NULL,
  `svalue5` varchar(100) NOT NULL,
  `datename` varchar(100) NOT NULL,
  `take` int(11) NOT NULL DEFAULT '1',
  `email` varchar(30) NOT NULL,
  `open_email` tinyint(4) NOT NULL DEFAULT '0',
  `sms` varchar(13) NOT NULL,
  `open_sms` tinyint(4) NOT NULL DEFAULT '0',
  `thetype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_reservation`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_reservebook`
--

CREATE TABLE IF NOT EXISTS `wy_reservebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(50) NOT NULL,
  `truename` varchar(50) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `housetype` varchar(50) NOT NULL,
  `dateline` varchar(50) NOT NULL,
  `timepart` varchar(50) NOT NULL,
  `info` varchar(100) NOT NULL,
  `type` char(15) NOT NULL,
  `booktime` int(11) NOT NULL,
  `remate` tinyint(3) NOT NULL DEFAULT '0',
  `kfinfo` varchar(100) NOT NULL,
  `thetype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `wecha_id` (`wecha_id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_reservebook`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_role`
--

CREATE TABLE IF NOT EXISTS `wy_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '后台组名',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '是否激活 1：是 0：否',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `wy_role`
--

INSERT INTO `wy_role` (`id`, `name`, `pid`, `status`, `sort`, `remark`) VALUES
(5, '超级管理员', 0, 1, 0, ''),
(6, '演示组', 0, 1, 0, ''),
(9, '普通会员', 0, 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_role_user`
--

CREATE TABLE IF NOT EXISTS `wy_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` smallint(6) unsigned NOT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_role_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_school_classify`
--

CREATE TABLE IF NOT EXISTS `wy_school_classify` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(50) NOT NULL,
  `ssort` int(5) NOT NULL,
  `token` varchar(50) NOT NULL,
  `type` char(20) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `type` (`type`),
  FULLTEXT KEY `type_2` (`type`),
  FULLTEXT KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_school_classify`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_school_score`
--

CREATE TABLE IF NOT EXISTS `wy_school_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `xq_id` int(11) NOT NULL,
  `qh_id` int(11) NOT NULL,
  `km_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `my_score` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_school_score`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_school_set_index`
--

CREATE TABLE IF NOT EXISTS `wy_school_set_index` (
  `setid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `head_url` varchar(200) NOT NULL,
  `info` varchar(100) NOT NULL,
  `album_id` int(11) NOT NULL,
  `musicurl` varchar(200) NOT NULL DEFAULT '',
  `menu1` varchar(50) NOT NULL,
  `menu1_id` int(11) NOT NULL,
  `menu2` char(15) NOT NULL,
  `menu3` char(15) NOT NULL,
  `menu4` char(15) NOT NULL,
  `menu5` char(15) NOT NULL,
  `menu6` char(15) NOT NULL,
  `menu7` char(15) NOT NULL,
  `menu8` char(15) NOT NULL,
  `menu2_id` int(11) NOT NULL,
  `menu3_id` int(11) NOT NULL,
  `menu4_id` int(11) NOT NULL,
  `menu5_id` int(11) NOT NULL,
  `menu6_id` int(11) NOT NULL,
  PRIMARY KEY (`setid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_school_set_index`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_school_students`
--

CREATE TABLE IF NOT EXISTS `wy_school_students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `xq_id` int(11) NOT NULL,
  `area_addr` varchar(60) NOT NULL DEFAULT '',
  `bj_id` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` int(1) NOT NULL,
  `createdate` int(11) NOT NULL,
  `seffectivetime` date DEFAULT NULL,
  `stheendtime` date DEFAULT NULL,
  `jf_statu` int(11) DEFAULT NULL,
  `mobile` char(11) NOT NULL,
  `homephone` char(16) NOT NULL,
  `s_name` char(50) NOT NULL,
  `localdate_id` char(20) NOT NULL DEFAULT '',
  `note` varchar(50) NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_school_students`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_school_tcourse`
--

CREATE TABLE IF NOT EXISTS `wy_school_tcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `tid` int(11) NOT NULL,
  `km_id` int(11) NOT NULL,
  `bj_id` int(11) NOT NULL,
  `xq_id` int(11) NOT NULL,
  `sd_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_school_tcourse`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_school_teachers`
--

CREATE TABLE IF NOT EXISTS `wy_school_teachers` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tname` char(50) NOT NULL,
  `birthdate` date NOT NULL,
  `createtime` int(11) NOT NULL,
  `homephone` char(12) NOT NULL,
  `mobile` char(11) NOT NULL,
  `email` char(50) NOT NULL,
  `sex` int(1) NOT NULL,
  `token` varchar(50) NOT NULL,
  `jiontime` date DEFAULT NULL,
  `info` text NOT NULL,
  `faceimg` varchar(200) NOT NULL DEFAULT '',
  `headinfo` varchar(600) NOT NULL DEFAULT '',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_school_teachers`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_score_item`
--

CREATE TABLE IF NOT EXISTS `wy_score_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(4) unsigned NOT NULL,
  `title` varchar(120) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0：实物；1：虚拟',
  `img` varchar(255) NOT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `stock` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_num` mediumint(8) unsigned NOT NULL DEFAULT '1',
  `buy_num` mediumint(8) NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_score_item`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_score_item_cate`
--

CREATE TABLE IF NOT EXISTS `wy_score_item_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_score_item_cate`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_score_log`
--

CREATE TABLE IF NOT EXISTS `wy_score_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `score` int(10) NOT NULL,
  `add_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_score_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_score_order`
--

CREATE TABLE IF NOT EXISTS `wy_score_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(100) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `item_name` varchar(120) NOT NULL,
  `item_num` mediumint(8) NOT NULL,
  `consignee` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `order_score` int(10) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_score_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_selfform`
--

CREATE TABLE IF NOT EXISTS `wy_selfform` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(400) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `successtip` varchar(60) NOT NULL DEFAULT '',
  `failtip` varchar(60) NOT NULL DEFAULT '',
  `endtime` int(10) NOT NULL DEFAULT '0',
  `logourl` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `endtime` (`endtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `wy_selfform`
--

INSERT INTO `wy_selfform` (`id`, `token`, `name`, `keyword`, `intro`, `content`, `time`, `successtip`, `failtip`, `endtime`, `logourl`) VALUES
(1, 'hezyct1390699264', '1111', '1111111111', '111111111', '11111111111111', 1390742403, '', '', 1392911999, 'http://suetec.sudongting.cn/Uploads/image/20140126/52e50b78ec835.jpg'),
(2, 'empzvn1391796526', '册', '册', '册', '才是', 1391964486, '', '', 1392911999, 'http://sucai.sudongting.cn/uploads/e/empzvn1391796526/c/d/8/9/thumb_52f79b27a3b9c.png'),
(3, 'jzcwqc1394072569', '111', '11', '111', '1', 1394547931, '', '', 1395417599, 'http://www.138wo.com/uploads/j/jzcwqc1394072569/a/6/6/5/thumb_531f1cd5ad97a.jpg'),
(4, 'ygojzx1396002773', '1123', '1', '11111', '1', 1396007079, '1', '1', 1396886399, 'http://www.138wo.com/uploads/y/ygojzx1396002773/6/5/5/a/thumb_533560a025f9b.jpg'),
(5, '1d2e1b640424480', '万能表单', '万能表单', '万能表单', '万能表单', 1396372856, '成功', '失败', 1397318399, 'http://www.138wo.com/uploads/1/1d2e1b640424480/1/a/9/1/thumb_533789c1a46f5.jpg'),
(6, 'cfxuoc1396505145', 'hhhdhdhd', 'dhdhdhd', 'dhhdhd', 'hdhdhdhdhd', 1396537191, '', '', 1397404799, 'http://www.138wo.com/uploads/c/cfxuoc1396505145/f/5/e/3/thumb_533d027653568.png'),
(7, 'xtyszz1396519155', '预约', '预约', '', '叮好', 1396595350, '', '', 1397491199, ''),
(8, 'stmxkt1396619399', '123123', '123123123', '', '', 1396619484, '', '', 1397491199, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/1.png'),
(9, 'tjbynz1396663229', '看房团', '看房团', '4月4日鞍山房产网看房团即将出发，楼盘有地方水电费 ！', '<p>\r\n	药店速度发生的发顺丰水电费速度发生的\r\n</p>\r\n<p>\r\n	水电费速度粉丝地方\r\n</p>\r\n<p>\r\n	时代发生的发生地方水电费sdsdfsd\r\n</p>\r\n<p>\r\n	所发生的发生的发生的分手发\r\n</p>\r\n<p>\r\n	收费所发生的发生发生的f水电费时代发生的f\r\n</p>', 1396710691, '恭喜报名成功', '人满了', 1397577599, 'http://www.138wo.com/uploads/t/tjbynz1396663229/e/c/e/6/thumb_53401eae52a51.jpg'),
(10, 'nwbxfy1396588424', '在线预约服务', '预约', '欢迎使用在线预约', '欢迎使用在线预约功能！', 1396710763, '预约成功', '预约失败', 1398873599, 'http://www.138wo.com/uploads/n/nwbxfy1396588424/e/6/3/3/thumb_53401cf8f3f1c.jpg'),
(12, 'kmdivh1396891840', '.在线预约', '在线预约', '', '', 1396898721, '', '', 1415894399, 'http://www.138wo.com/uploads/k/kmdivh1396891840/f/6/c/7/thumb_5342fb0441f01.jpg'),
(13, 'qlzbag1396749816', '1111', '11111', '', '', 1396949802, '', '', 1397836799, 'http://www.138wo.com/tpl/static/attachment/background/view/2.jpg'),
(14, 'jbqeab1397279457', '111', '111', '', '', 1397279741, '', '', 1398182399, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/1.png'),
(15, 'kxofnz1396788966', '关于我们', '33', '33', '33', 1397306841, '', '', 1398182399, 'http://www.138wo.com/uploads/k/kxofnz1396788966/1/9/d/1/thumb_534935cde63c2.png'),
(16, 'ujxhsl1397123749', '11111111111111', '1111111111111111111111111111111111111', '111111111111111111111111111', '', 1397720736, '1111111111111111111111', '2222222222222222222222222222222222222', 1398614399, ''),
(17, 'fhgakm1398046087', 'dfdf', 'dfdfdf', 'dfdfd', '', 1398047731, '', '', 1398959999, ''),
(18, 'rhwqjq1398136971', '游泳报名', '游泳报名', '游泳报名游泳报名游泳报名游泳报名游泳报名', '游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名游泳报名', 1398436922, '', '', 1399305599, 'http://www.138wo.com/uploads/r/rhwqjq1398136971/c/1/3/b/thumb_535a742f54835.jpg'),
(19, 'wjjnxm1399082112', '表单', '万能表单', '????!!!!', '测试', 1399102045, '', '', 1400169599, 'http://www.138wo.com/tpl/static/attachment/icon/line/note.png'),
(20, 'fkaarf1399104599', 'aaaa', 'aaaaaa', '', '', 1399104645, '', '', 1399996799, 'http://www.138wo.com/uploads/f/fkaarf1399104599/b/0/4/7/thumb_5364a481e7b48.jpg'),
(21, 'ibczsl1399137955', '青同琦士', 'VIP', '', '', 1399138115, '', '', 1400083199, 'http://www.138wo.com/uploads/i/ibczsl1399137955/0/0/5/0/thumb_5365273a42e2b.png'),
(22, 'unpvzc1399101846', '123', '123', '123', '123', 1399367198, '123', '123', 1400255999, ''),
(23, 'cofkdj1399562547', '阿斯蒂芬', '爱的色放', '', '阿斯顿发送到', 1399586136, '', '', 1400515199, 'http://www.138wo.com/uploads/c/cofkdj1399562547/0/2/d/8/thumb_536bf09629ed6.jpg'),
(24, 'tauone1399622209', '在线预约', '22', '1111111', '对方的委屈委屈委屈的委屈的', 1399624115, '', '', 1400515199, 'http://www.138wo.com/tpl/static/attachment/hdbg/view/8.jpg'),
(25, 'gjudfz1399863049', '水疗', '水疗', '深圳汇邦大班水疗——深圳市首家顶级健康水疗，坐落于深圳市风景秀丽的福田景田社区，毗邻深圳市有名的莲花山公园，优美的风景，清新的环境缔造了大班水疗健康独特的养生理念，大班水疗摒弃了传统的中、港、泰式按摩手法，独创了“御”式按摩手法，我们特别针对现代社会各界人士共同的亚健康状态，大胆的融合了中国古代医学原理和后现代按摩技术，通过专业人士的精湛手法，让您在轻松舒适的心情下慢慢远离亚健康人群。', '<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	<strong>&nbsp; 深圳汇邦大班水疗</strong><span style="font-size:14px;line-height:1.5;">——您人生起步及发展的舞台。这里有众多的岗位供您学习，供您施展，为您的人生事业打下稳健的基础。这里还能丰富您的阅历，增长您的见识。您还可以在这里广结善友，这里的每个人都会真心相待。这里将给您第二次生命，创建属于您另一个美丽幸福的家。</span>\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　按摩价目表\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　御医古法 ( 中式 ) = 208 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　御式保健 ( 泰式 ) = 208 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　御医理疗 ( 中医 ) = 238 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　御用香薰 ( 香薰 ) = 238 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　以下项目还未推出\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　御龙归元 = 268 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　御凤还巢 = 268 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　帝国风情 = 298 元\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　大堂项目不详 列了 ，68 元一项。\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　VIP 小房 58 元一小时\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　VIP 大房 68 元一小时\r\n</p>\r\n<p style="font-family:Helvetica, Arial, sans-serif;color:#333333;font-size:14px;background-color:#F7FCFF;">\r\n	　　多功能房 238 元一小时 / 最低消费2888元 用12小时\r\n</p>', 1399884844, '', '', 1400774399, 'http://www.138wo.com/uploads/g/gjudfz1399863049/9/c/2/2/thumb_53708c252e8b2.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `wy_selfform_input`
--

CREATE TABLE IF NOT EXISTS `wy_selfform_input` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `formid` int(10) NOT NULL DEFAULT '0',
  `displayname` varchar(30) NOT NULL DEFAULT '',
  `fieldname` varchar(30) NOT NULL DEFAULT '',
  `inputtype` varchar(20) NOT NULL DEFAULT '',
  `options` varchar(200) NOT NULL DEFAULT '',
  `require` tinyint(1) NOT NULL DEFAULT '0',
  `regex` varchar(100) NOT NULL DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  `errortip` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `formid` (`formid`,`taxis`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `wy_selfform_input`
--

INSERT INTO `wy_selfform_input` (`id`, `formid`, `displayname`, `fieldname`, `inputtype`, `options`, `require`, `regex`, `taxis`, `errortip`) VALUES
(1, 5, '多大', '1', 'text', '', 1, '/^[A-Za-z]+$/', 1, ''),
(2, 9, '选择户型', '选择户型', 'select', '80以下|80-100|100-155', 1, '/^[0-9]{1,30}$/', 2, '请填写户型面积'),
(3, 9, '预约时间', '预约时间', 'text', '', 1, '/^[0-9]{1,30}$/', 5, '预约时间错误'),
(4, 10, '在线预约', 'Please', 'textarea', '', 1, '/^[1-9]d*|0$/', 1, '输入错误，请重新输入！'),
(5, 9, '预约人数', '预约人数', 'text', '', 1, '/^[0-9]{1,30}$/', 4, '预约人数必须填写哦'),
(6, 11, 'vv', 'vv', 'text', '', 1, '/^[A-Za-z]+$/', 1, ''),
(7, 11, '11', 'ff', 'text', '', 1, '/w+([-+.]w+)*@w+([-.]w+)*.w+([-.]w+)*/', 2, ''),
(8, 11, 'ff', 'gf', 'select', '1|2|3|4|5', 1, '/^[1-9]d*|0$/', 3, ''),
(9, 12, '您的电话', '手机号码', 'text', '', 0, '/^13[0-9]{9}$|^15[0-9]{9}$|^18[0-9]{9}$/', 0, ''),
(10, 12, '预约时间', '9:00', 'select', '9:30|10:00|10:30', 1, '', 2, ''),
(11, 12, '预约备注', '', 'textarea', '', 0, '', 3, ''),
(12, 15, '姓名', 'nn', 'text', '', 1, '/^[A-Za-z]+$/', 1, ''),
(13, 18, '姓名', '请填写您的姓名', 'text', '', 1, '', 0, ''),
(14, 18, '手机号码', '请填写你的手机号码', 'text', '', 1, '/^13[0-9]{9}$|^15[0-9]{9}$|^18[0-9]{9}$/', 1, ''),
(15, 18, '报名人数', '报名人数', 'text', '', 1, '', 2, ''),
(16, 18, '预约时间', '预约时间', 'text', '', 1, '/^[-+]?d+(.d+)?$/', 3, ''),
(17, 19, '123', '321', 'text', '', 0, '', 1, '错误'),
(18, 19, '22222', '33333', 'select', '1|2|3|8', 0, '', 2, ''),
(19, 22, '12313', '12313', 'select', '1123', 0, '/^13[0-9]{9}$|^15[0-9]{9}$|^18[0-9]{9}$/', 1, '请填写姓名！'),
(20, 23, '阿斯蒂芬', '阿斯蒂芬', 'text', '', 0, '阿斯蒂芬', 0, ''),
(21, 24, '预约项目', '预约项目', 'text', '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_selfform_value`
--

CREATE TABLE IF NOT EXISTS `wy_selfform_value` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `formid` int(10) NOT NULL DEFAULT '0',
  `wecha_id` varchar(50) NOT NULL DEFAULT '',
  `values` varchar(2000) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `formid` (`formid`,`wecha_id`,`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `wy_selfform_value`
--

INSERT INTO `wy_selfform_value` (`id`, `formid`, `wecha_id`, `values`, `time`) VALUES
(1, 5, 'o-oeYjmDmgDtyYpeSHN7mpJq-xFw', 'a:1:{i:1;s:2:"21";}', 1396629346),
(2, 12, 'oXv3Cjq-73W0CPiU7Z6cTv-JJNz8', 'a:3:{s:12:"手机号码";s:10:"1856855555";s:4:"9:00";s:5:"10:30";s:0:"";N;}', 1396901507),
(3, 19, 'ogE7Ity2nOF5dqSo4L2mp16ZHjEU', 'a:2:{i:321;s:3:"555";i:33333;s:1:"3";}', 1399102250),
(4, 24, 'o-EB1jmrueGcGmLFlxz4s4lp474w', 'a:1:{s:12:"预约项目";s:6:"工具";}', 1399629502);

-- --------------------------------------------------------

--
-- 表的结构 `wy_send_message`
--

CREATE TABLE IF NOT EXISTS `wy_send_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_id` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `token` varchar(30) NOT NULL DEFAULT '',
  `msgtype` varchar(30) NOT NULL DEFAULT '',
  `text` varchar(800) NOT NULL DEFAULT '',
  `imgids` varchar(200) NOT NULL DEFAULT '',
  `mediasrc` varchar(200) NOT NULL DEFAULT '',
  `mediaid` varchar(100) NOT NULL DEFAULT '',
  `reachcount` int(10) NOT NULL DEFAULT '0',
  `groupid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`time`),
  KEY `msg_id` (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_send_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_service_logs`
--

CREATE TABLE IF NOT EXISTS `wy_service_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `openid` varchar(60) NOT NULL,
  `enddate` int(11) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_service_logs`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_service_user`
--

CREATE TABLE IF NOT EXISTS `wy_service_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `token` varchar(60) NOT NULL,
  `userName` varchar(60) NOT NULL,
  `userPwd` varchar(32) NOT NULL,
  `endJoinDate` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_service_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_setinfo`
--

CREATE TABLE IF NOT EXISTS `wy_setinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `kind` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_setinfo`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_setting`
--

CREATE TABLE IF NOT EXISTS `wy_setting` (
  `name` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_setting`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shake`
--

CREATE TABLE IF NOT EXISTS `wy_shake` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `isact` int(1) NOT NULL DEFAULT '0',
  `title` varchar(40) NOT NULL,
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `intro` varchar(400) NOT NULL DEFAULT '',
  `thumb` varchar(200) NOT NULL DEFAULT '',
  `shownum` int(11) NOT NULL DEFAULT '10',
  `joinnum` int(11) DEFAULT NULL,
  `shaketype` int(11) NOT NULL DEFAULT '1',
  `token` varchar(40) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `isopen` int(1) NOT NULL DEFAULT '0',
  `clienttime` int(11) NOT NULL DEFAULT '3',
  `showtime` int(10) NOT NULL DEFAULT '3',
  `endtime` varchar(13) DEFAULT NULL,
  `background` varchar(150) DEFAULT NULL,
  `backgroundmusic` varchar(150) DEFAULT NULL,
  `music` varchar(150) DEFAULT NULL,
  `usetime` int(10) NOT NULL DEFAULT '0',
  `rule` varchar(600) NOT NULL DEFAULT '',
  `info` varchar(600) NOT NULL DEFAULT '',
  `starttime` int(11) NOT NULL,
  `endshake` int(11) NOT NULL,
  `qrcode` varchar(150) DEFAULT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wy_shake`
--

INSERT INTO `wy_shake` (`id`, `isact`, `title`, `keyword`, `intro`, `thumb`, `shownum`, `joinnum`, `shaketype`, `token`, `createtime`, `isopen`, `clienttime`, `showtime`, `endtime`, `background`, `backgroundmusic`, `music`, `usetime`, `rule`, `info`, `starttime`, `endshake`, `qrcode`, `time`) VALUES
(1, 1, '234234234', '3', '', '', 10, NULL, 1, 'pxhsnk1400821588', '', 1, 3, 3, NULL, '', '', '', 5, '', '', 3, 600, '', 1400829650),
(2, 1, '摇一摇', 'y', '摇一摇摇一摇摇一摇摇一摇摇一摇摇一摇摇一摇摇一摇摇一摇', 'http://wx.0724s.com/tpl/static/attachment/background/view/4.jpg', 10, NULL, 1, 'nsnyem1400838500', '', 1, 3, 3, NULL, 'http://wx.0724s.com/tpl/static/attachment/background/view/8.jpg', '', '', 12, '规则说明：', '规则说活动介绍', 3, 600, '', 1400838692);

-- --------------------------------------------------------

--
-- 表的结构 `wy_shake_rt`
--

CREATE TABLE IF NOT EXISTS `wy_shake_rt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `token` varchar(30) NOT NULL DEFAULT '',
  `phone` varchar(12) NOT NULL DEFAULT '',
  `count` int(10) NOT NULL DEFAULT '0',
  `shakeid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `shakeid` (`shakeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_shake_rt`
--

INSERT INTO `wy_shake_rt` (`id`, `wecha_id`, `token`, `phone`, `count`, `shakeid`) VALUES
(1, 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', 'nsnyem1400838500', '13893616497', 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `wy_share`
--

CREATE TABLE IF NOT EXISTS `wy_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL DEFAULT '',
  `moduleid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(30) NOT NULL DEFAULT '',
  `wecha_id` varchar(80) NOT NULL DEFAULT '',
  `to` varchar(30) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `url` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`moduleid`,`token`,`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_share`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_share_set`
--

CREATE TABLE IF NOT EXISTS `wy_share_set` (
  `token` varchar(40) NOT NULL DEFAULT '',
  `score` int(5) NOT NULL DEFAULT '0',
  `daylimit` int(5) NOT NULL DEFAULT '1',
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_share_set`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shopclassify`
--

CREATE TABLE IF NOT EXISTS `wy_shopclassify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `info` varchar(90) NOT NULL COMMENT '分类描述',
  `sorts` varchar(6) NOT NULL COMMENT '显示顺序',
  `img` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  `token` varchar(30) NOT NULL,
  `icon` char(200) NOT NULL,
  `yanse` char(100) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shopclassify`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shopflash`
--

CREATE TABLE IF NOT EXISTS `wy_shopflash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `img` char(255) NOT NULL,
  `url` char(255) NOT NULL,
  `info` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shopflash`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shopstore`
--

CREATE TABLE IF NOT EXISTS `wy_shopstore` (
  `store_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(64) NOT NULL DEFAULT '',
  `store_name` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(256) NOT NULL DEFAULT '',
  `zipcode` varchar(20) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `sgrade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `store_logo` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`store_id`),
  KEY `store_name` (`store_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shopstore`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shop_article`
--

CREATE TABLE IF NOT EXISTS `wy_shop_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `colors` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `comments` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序值',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shop_article`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shop_keyword`
--

CREATE TABLE IF NOT EXISTS `wy_shop_keyword` (
  `kid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kename` varchar(300) DEFAULT NULL,
  `kecontent` varchar(500) DEFAULT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1:文本 2：图文',
  `kyword` varchar(255) DEFAULT NULL,
  `titles` varchar(1000) DEFAULT NULL,
  `imageinfo` varchar(1000) DEFAULT NULL,
  `linkinfo` varchar(1000) DEFAULT NULL,
  `ismess` tinyint(1) DEFAULT NULL,
  `isfollow` tinyint(1) DEFAULT NULL,
  `iskey` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shop_keyword`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shop_set`
--

CREATE TABLE IF NOT EXISTS `wy_shop_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `shop_name` varchar(200) NOT NULL,
  `head_bg` varchar(200) NOT NULL,
  `head_info` varchar(255) NOT NULL,
  `head_pic` varchar(200) NOT NULL,
  `weixin_number` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shop_set`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shop_setting`
--

CREATE TABLE IF NOT EXISTS `wy_shop_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` int(10) unsigned NOT NULL DEFAULT '0',
  `site_name` varchar(32) NOT NULL DEFAULT '',
  `site_title` varchar(64) NOT NULL DEFAULT '',
  `site_keyword` varchar(64) NOT NULL DEFAULT '',
  `site_description` varchar(256) NOT NULL DEFAULT '',
  `site_status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `closed_reason` varchar(256) NOT NULL DEFAULT '',
  `template` varchar(25) NOT NULL DEFAULT 'default' COMMENT '模板编号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_shop_setting`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_shop_user`
--

CREATE TABLE IF NOT EXISTS `wy_shop_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uc_uid` int(10) unsigned NOT NULL DEFAULT '0',
  `wxid` int(10) NOT NULL COMMENT '会员组',
  `wechatid` varchar(100) NOT NULL DEFAULT '0' COMMENT '微信id',
  `username` varchar(100) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '0',
  `tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1男，0女',
  `tags` varchar(50) NOT NULL COMMENT '个人标签',
  `intro` varchar(500) NOT NULL,
  `byear` smallint(4) unsigned NOT NULL,
  `bmonth` tinyint(2) unsigned NOT NULL,
  `bday` tinyint(2) unsigned NOT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `score_level` int(10) unsigned NOT NULL DEFAULT '0',
  `cover` varchar(255) NOT NULL,
  `reg_ip` varchar(15) NOT NULL,
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(15) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `shares` int(10) unsigned DEFAULT '0',
  `likes` int(10) unsigned DEFAULT '0',
  `follows` int(10) unsigned DEFAULT '0',
  `fans` int(10) unsigned DEFAULT '0',
  `albums` int(10) unsigned DEFAULT '0',
  `daren` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `nickname` varchar(100) DEFAULT NULL COMMENT '昵称',
  `isedit` int(2) NOT NULL DEFAULT '0',
  `user_account` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `wy_shop_user`
--

INSERT INTO `wy_shop_user` (`id`, `uc_uid`, `wxid`, `wechatid`, `username`, `password`, `tel`, `email`, `gender`, `tags`, `intro`, `byear`, `bmonth`, `bday`, `province`, `city`, `score`, `score_level`, `cover`, `reg_ip`, `reg_time`, `last_time`, `last_ip`, `status`, `shares`, `likes`, `follows`, `fans`, `albums`, `daren`, `nickname`, `isedit`, `user_account`) VALUES
(6, 0, 1017, '0', '122533539', 'e10adc3949ba59abbe56e057f20f883e', NULL, '236363662@qq.com', 0, '', '', 0, 0, 0, '', '', 30, 30, '', '113.218.42.5', 1400039066, 1400039066, '113.218.42.5', 1, 0, 0, 0, 0, 0, 0, NULL, 0, 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `wy_site_plugmenu`
--

CREATE TABLE IF NOT EXISTS `wy_site_plugmenu` (
  `token` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  `display` tinyint(1) NOT NULL DEFAULT '0',
  KEY `token` (`token`,`taxis`,`display`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_site_plugmenu`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_snccode`
--

CREATE TABLE IF NOT EXISTS `wy_snccode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `wechaname` varchar(60) NOT NULL,
  `caeatetime` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_snccode`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_styleset`
--

CREATE TABLE IF NOT EXISTS `wy_styleset` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `RadioGroup` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_styleset`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_system_info`
--

CREATE TABLE IF NOT EXISTS `wy_system_info` (
  `lastsqlupdate` int(10) NOT NULL,
  `version` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_system_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_tag`
--

CREATE TABLE IF NOT EXISTS `wy_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=641 ;

--
-- 转存表中的数据 `wy_tag`
--

INSERT INTO `wy_tag` (`id`, `name`) VALUES
(635, 'ASD'),
(636, '微云'),
(637, '测试'),
(638, '商城'),
(639, '1w1'),
(640, 'sd');

-- --------------------------------------------------------

--
-- 表的结构 `wy_taobao`
--

CREATE TABLE IF NOT EXISTS `wy_taobao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(64) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `homeurl` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keyword` (`keyword`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_taobao`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_template_details`
--

CREATE TABLE IF NOT EXISTS `wy_template_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT '1首页2产品3新闻4关于我们5联系我们100自定义栏目页101自定义详情页',
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(20) NOT NULL,
  `template_path` varchar(150) NOT NULL COMMENT '模板所在路径',
  `img_url` varchar(150) NOT NULL COMMENT '预览图所在路径',
  `isvalid` bit(1) NOT NULL,
  `isV1` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否适应于第一版本1是',
  `isV2` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是第二版本的模板1是',
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `templatedetail_template` (`template_id`),
  KEY `templatedetail_column` (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_template_details`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_text`
--

CREATE TABLE IF NOT EXISTS `wy_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `keyword` char(255) NOT NULL,
  `type` varchar(1) NOT NULL,
  `text` text NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `click` int(11) NOT NULL,
  `token` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_text`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_token_open`
--

CREATE TABLE IF NOT EXISTS `wy_token_open` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `queryname` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `wy_token_open`
--

INSERT INTO `wy_token_open` (`id`, `uid`, `token`, `queryname`) VALUES
(1, 1, 'pgtepl1400696466', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,school,shake,wall,kefu,behavior,lottery,geci,wifi'),
(2, 1, 'pxhsnk1400821588', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,geci,,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,hotel,school,shake,wall,wifi,kefu,behavior,lottery'),
(3, 1, 'nsnyem1400838500', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,geci,,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,hotel,school,shake,wall,wifi,kefu,behavior,lottery'),
(4, 2, 'fucuac1400841542', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,geci,,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,hotel,school,shake,wall,wifi,kefu,behavior,lottery'),
(5, 4, 'lseyvg1400848442', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,geci,,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,hotel,school,shake,wall,wifi,kefu,behavior,lottery'),
(6, 1, 'jyccid1400850497', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,geci,,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,hotel,school,shake,wall,wifi,kefu,behavior,lottery'),
(7, 1, 'pbnnog1400853333', 'tianqi,qiushi,jishuan,langdu,jiankang,kuaidi,xiaohua,changtoushi,peiliao,liaotian,mengjian,yuyinfanyi,huoche,gongjiao,shenfenzheng,shouji,yinle,fujin,choujiang,taobao,userinfo,fanyi,api,suanming,baike,caipiao,choujiang,gua2,shouye,adma,huiyuanka,shenhe,geci,,host_kev,LuckyFruit,car,message,diyform,dx,shop,etuan,diymen_set,Panorama,wedding,Yuyue,Yiliao,Greeting_card,Jiudian,Diaoyan,estate,GoldenEgg,userinfo,vote,album,Coupon,forum,medical,message,share,hotel,school,shake,wall,wifi,kefu,behavior,lottery');

-- --------------------------------------------------------

--
-- 表的结构 `wy_topic`
--

CREATE TABLE IF NOT EXISTS `wy_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `extra` text NOT NULL,
  `src_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '引用内容类型',
  `src_id` int(10) unsigned NOT NULL COMMENT '引用内容ID',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0，原创；1，转发；',
  `comments` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数量',
  `forwards` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '转发数量',
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_topic`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_topic_at`
--

CREATE TABLE IF NOT EXISTS `wy_topic_at` (
  `uid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uid`,`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_topic_at`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_topic_comment`
--

CREATE TABLE IF NOT EXISTS `wy_topic_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `author_uid` int(10) unsigned NOT NULL,
  `content` varchar(255) NOT NULL,
  `add_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_topic_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_topic_index`
--

CREATE TABLE IF NOT EXISTS `wy_topic_index` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `tid` int(10) unsigned NOT NULL COMMENT '信息ID',
  `author_id` int(10) unsigned NOT NULL COMMENT '发布者ID',
  `add_time` int(10) unsigned NOT NULL,
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_topic_index`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_topic_relation`
--

CREATE TABLE IF NOT EXISTS `wy_topic_relation` (
  `tid` int(10) unsigned NOT NULL COMMENT '信息ID',
  `src_tid` int(10) unsigned NOT NULL COMMENT '被引用信息ID',
  `author_uid` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '操作类型(1,转发)',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_topic_relation`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_update_record`
--

CREATE TABLE IF NOT EXISTS `wy_update_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(600) NOT NULL,
  `type` varchar(20) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_update_record`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_upyun_attachement`
--

CREATE TABLE IF NOT EXISTS `wy_upyun_attachement` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `url` varchar(160) NOT NULL,
  `code` varchar(10) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_upyun_attachement`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_user`
--

CREATE TABLE IF NOT EXISTS `wy_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `role` smallint(6) unsigned NOT NULL COMMENT '组ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 1:启用 0:禁止',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `last_login_time` int(11) unsigned NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(15) DEFAULT NULL COMMENT '最后登录IP',
  `last_location` varchar(100) DEFAULT NULL COMMENT '最后登录位置',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_user`
--

INSERT INTO `wy_user` (`id`, `username`, `password`, `role`, `status`, `remark`, `last_login_time`, `last_login_ip`, `last_location`) VALUES
(1, 'admin', '9cbf8a4dcb8e30682b927f352d6559a0', 5, 1, '', 1400839661, '106.120.187.55', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_userinfo`
--

CREATE TABLE IF NOT EXISTS `wy_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portrait` varchar(200) NOT NULL,
  `wallopen` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(60) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `wechaname` varchar(60) NOT NULL,
  `truename` varchar(60) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `bornday` varchar(4) NOT NULL,
  `bornmonth` varchar(4) NOT NULL,
  `bornyear` varchar(4) NOT NULL,
  `adnew` varchar(250) NOT NULL,
  `qq` int(11) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL,
  `total_score` int(11) NOT NULL,
  `sign_score` int(11) NOT NULL,
  `expend_score` int(11) NOT NULL,
  `continuous` int(11) NOT NULL,
  `add_expend` int(11) NOT NULL,
  `add_expend_time` int(11) NOT NULL,
  `live_time` int(11) NOT NULL,
  `expensetotal` varchar(100) NOT NULL,
  `getcardtime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_userinfo`
--

INSERT INTO `wy_userinfo` (`id`, `portrait`, `wallopen`, `token`, `wecha_id`, `wechaname`, `truename`, `tel`, `bornday`, `bornmonth`, `bornyear`, `adnew`, `qq`, `sex`, `age`, `birthday`, `address`, `info`, `total_score`, `sign_score`, `expend_score`, `continuous`, `add_expend`, `add_expend_time`, `live_time`, `expensetotal`, `getcardtime`) VALUES
(1, 'http://wx.0724s.com/tpl/static/portrait/3.jpg', 1, 'nsnyem1400838500', 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', '财神', '', '13888888888', '8', '5', '1990', '', 0, 1, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_users`
--

CREATE TABLE IF NOT EXISTS `wy_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inviter` int(10) NOT NULL,
  `gid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `mp` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(90) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `lasttime` varchar(13) NOT NULL,
  `status` varchar(1) NOT NULL,
  `apenable` tinyint(4) NOT NULL DEFAULT '0',
  `createip` varchar(30) NOT NULL,
  `mpenable` tinyint(4) NOT NULL DEFAULT '0',
  `lastip` varchar(30) NOT NULL,
  `diynum` int(11) NOT NULL,
  `activitynum` int(11) NOT NULL,
  `gongzhongnumgon` tinyint(2) NOT NULL,
  `card_num` int(11) NOT NULL,
  `card_create_status` tinyint(1) NOT NULL,
  `wechat_card_num` tinyint(3) NOT NULL,
  `money` int(11) NOT NULL,
  `moneybalance` int(10) NOT NULL DEFAULT '0',
  `spend` int(5) NOT NULL DEFAULT '0',
  `viptime` varchar(13) NOT NULL,
  `connectnum` int(11) NOT NULL DEFAULT '0',
  `lastloginmonth` smallint(2) NOT NULL DEFAULT '0',
  `attachmentsize` int(10) NOT NULL DEFAULT '0',
  `serviceUserNum` tinyint(3) NOT NULL,
  `invitecode` varchar(6) NOT NULL,
  `sp` tinyint(2) NOT NULL DEFAULT '0',
  `ly` tinyint(2) NOT NULL DEFAULT '0',
  `js` tinyint(2) NOT NULL DEFAULT '0',
  `zw` tinyint(2) NOT NULL DEFAULT '0',
  `hd` tinyint(2) NOT NULL DEFAULT '0',
  `jy` tinyint(2) NOT NULL DEFAULT '0',
  `jb` tinyint(2) NOT NULL DEFAULT '0',
  `mr` tinyint(2) NOT NULL DEFAULT '0',
  `dy` tinyint(2) NOT NULL DEFAULT '0',
  `qc` tinyint(2) NOT NULL DEFAULT '0',
  `yl` tinyint(2) NOT NULL DEFAULT '0',
  `jd` tinyint(2) NOT NULL DEFAULT '0',
  `fc` tinyint(2) NOT NULL DEFAULT '0',
  `yy` tinyint(2) NOT NULL DEFAULT '0',
  `wy` tinyint(2) NOT NULL DEFAULT '0',
  `cy` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `wy_users`
--

INSERT INTO `wy_users` (`id`, `inviter`, `gid`, `username`, `mp`, `password`, `email`, `createtime`, `lasttime`, `status`, `apenable`, `createip`, `mpenable`, `lastip`, `diynum`, `activitynum`, `gongzhongnumgon`, `card_num`, `card_create_status`, `wechat_card_num`, `money`, `moneybalance`, `spend`, `viptime`, `connectnum`, `lastloginmonth`, `attachmentsize`, `serviceUserNum`, `invitecode`, `sp`, `ly`, `js`, `zw`, `hd`, `jy`, `jb`, `mr`, `dy`, `qc`, `yl`, `jd`, `fc`, `yy`, `wy`, `cy`) VALUES
(1, 0, 5, '123', '', '202cb962ac59075b964b07152d234b70', '123@qq.com', '1400696412', '1400853286', '1', 1, '182.246.239.197', 1, '112.25.60.15', 2, 2, 0, 0, 0, 5, 0, 0, 0, '1432137600', 37, 5, 15334, 0, 'ffvnrh', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 0, 5, '营口生活', '', 'ade99dfa5f272771c9ddcac060648603', '1292893799@qq.com', '1400841508', '1400841508', '1', 0, '60.22.25.148', 0, '60.22.25.148', 0, 1, 0, 0, 0, 1, 0, 0, 0, '1403433508', 0, 0, 0, 0, 'adywtw', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 5, 'nianli', '', '073ba25613a2a9fc26522f1194ee920d', '2059@qq.com', '1400843376', '1400843376', '1', 0, '61.142.177.222', 0, '61.142.177.222', 0, 0, 0, 0, 0, 0, 0, 0, 0, '1403435376', 0, 0, 0, 0, 'vpzpnf', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 5, 'qwqeqeq', '', 'b626c38313ea10b23ed7e1657b741435', 'qwqeqeq@qq.com', '1400848434', '1400848434', '1', 0, '123.112.112.9', 0, '123.112.112.9', 0, 0, 0, 0, 0, 1, 0, 0, 0, '1403440434', 0, 0, 0, 0, 'xeevmc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_user_acclog`
--

CREATE TABLE IF NOT EXISTS `wy_user_acclog` (
  `logid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fl` char(1) NOT NULL COMMENT '1为消费 2为充值 3为人工充值',
  `userid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jiner` decimal(10,2) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `info` varchar(255) NOT NULL,
  `orderid` varchar(30) NOT NULL COMMENT '//订单ID',
  `status` varchar(200) NOT NULL COMMENT '//状态',
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_user_acclog`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_user_bind`
--

CREATE TABLE IF NOT EXISTS `wy_user_bind` (
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(60) NOT NULL,
  `keyid` varchar(100) NOT NULL,
  `info` text NOT NULL,
  KEY `uid` (`uid`),
  KEY `uid_type` (`uid`,`type`),
  KEY `type_keyid` (`type`,`keyid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_user_bind`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_user_category`
--

CREATE TABLE IF NOT EXISTS `wy_user_category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '会员组',
  `discount` int(3) DEFAULT '100' COMMENT '折扣率%',
  `score` int(3) DEFAULT '100' COMMENT '积分率',
  `ordid` tinyint(3) unsigned DEFAULT '255',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `wxid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_user_category`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_user_follow`
--

CREATE TABLE IF NOT EXISTS `wy_user_follow` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `follow_uid` int(10) unsigned NOT NULL COMMENT '被关注者ID',
  `add_time` int(10) unsigned NOT NULL,
  `mutually` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`follow_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_user_follow`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_user_group`
--

CREATE TABLE IF NOT EXISTS `wy_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxisid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `diynum` int(11) NOT NULL,
  `connectnum` int(11) NOT NULL,
  `iscopyright` tinyint(1) NOT NULL,
  `activitynum` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  `statistics_user` int(11) NOT NULL,
  `create_card_num` int(4) NOT NULL,
  `wechat_card_num` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wy_user_group`
--

INSERT INTO `wy_user_group` (`id`, `taxisid`, `name`, `diynum`, `connectnum`, `iscopyright`, `activitynum`, `price`, `statistics_user`, `create_card_num`, `wechat_card_num`, `status`) VALUES
(1, 1, 'vip0', 2000, 1000, 1, 0, 0, 0, 10, 1, 1),
(2, 2, 'VIP1', 3000, 3000, 1, 2, 50, 0, 50, 1, 1),
(3, 3, 'vip2', 40000, 40000, 1, 4, 100, 0, 80, 1, 1),
(4, 4, 'vip3', 50000, 50000, 1, 10, 200, 0, 100, 3, 1),
(5, 5, 'vip4', 50000, 50000, 1, 50000, 300, 0, 100, 127, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_user_msgtip`
--

CREATE TABLE IF NOT EXISTS `wy_user_msgtip` (
  `uid` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1:关注，2:提到，3:私信，4:通知',
  `num` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_user_msgtip`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_user_request`
--

CREATE TABLE IF NOT EXISTS `wy_user_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `msgtype` varchar(15) NOT NULL DEFAULT 'text',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `msgtype` (`msgtype`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `wy_user_request`
--

INSERT INTO `wy_user_request` (`id`, `token`, `uid`, `keyword`, `msgtype`, `time`) VALUES
(1, '1d2e1b640424480', 'o-oeYjmDmgDtyYpeSHN7mpJq-xFw', '附近', 'text', 1397385363),
(2, '1d2e1b640424480', 'o-oeYjmDmgDtyYpeSHN7mpJq-xFw', '120.706224,27.989358', 'location', 1400311786),
(8, '1d2e1b640424480', 'o-oeYjkxpVk4gMEWePI2oj6V3Zqo', '112.758884,32.124327', 'location', 1396108804),
(3, '1d2e1b640424480', 'o-oeYjvRUtiiRHW8k5Yw_LgElbJo', '附近的', 'text', 1395152583),
(4, '1d2e1b640424480', 'o-oeYjvRUtiiRHW8k5Yw_LgElbJo', '120.707512,27.989082', 'location', 1397385400),
(5, '1d2e1b640424480', 'wz159577', '19.00000,19.00000', 'location', 1394517431),
(6, 'nbblrp1394556896', 'oRoRcuPiw8GaNwPJQQon8jYrBgy0', '113.099319,22.588612', 'location', 1394879891),
(7, 'nbblrp1394556896', 'oRoRcuBDxn62YXGiwi6cFYyrx88Y', '113.099312,22.588497', 'location', 1394597360),
(9, '1d2e1b640424480', 'o-oeYjr4kdYvJFDUzUtL-Vszctbw', '附近酒店', 'text', 1396287765),
(10, '1d2e1b640424480', 'o-oeYjr4kdYvJFDUzUtL-Vszctbw', '112.758801,32.124325', 'location', 1396287793),
(11, 'hmsvph1396513895', 'ob2qxjgbC8wTmFfmJdS14O-So_jg', '附近酒店', 'text', 1396514038),
(12, 'hmsvph1396513895', 'ob2qxjgbC8wTmFfmJdS14O-So_jg', '120.691792,27.918257', 'location', 1396514042),
(13, 'pzyjnr1396616671', 'o7lN_uPr7YBkciYXko2BJ-oybqUQ', '113.746841,34.401714', 'location', 1396618814),
(14, 'kxofnz1396788966', 'owzQCt0jc2rN6OoAzm1QkxaRXTVA', '附近银行', 'text', 1396802993),
(15, 'kxofnz1396788966', 'owzQCt0jc2rN6OoAzm1QkxaRXTVA', '116.304420,40.117943', 'location', 1396803002),
(16, 'kmdivh1396891840', 'oXv3Cjq-73W0CPiU7Z6cTv-JJNz8', '103.520615,30.572613', 'location', 1397245624),
(17, 'kxofnz1396788966', 'oSMKSjnpJOVumwBb5x6LiR5ZwDgM', '附近北京银行', 'text', 1396943799),
(18, 'kxofnz1396788966', 'oSMKSjnpJOVumwBb5x6LiR5ZwDgM', '116.454437,39.904770', 'location', 1396943869),
(19, 'vycmru1397280408', 'ou_uxjgXdnlTDzvSsTacT_gfDo9Y', '附近八桂快捷酒店8', 'text', 1397280581),
(20, 'lmnzdq1397285211', 'o24XDjh3WV4m_2oWwgS1gPQ47i6g', '118.157600,39.661793', 'location', 1397379683),
(21, 'kpublj1397561596', 'oyHD4jtlpIXfoG3YdfiAVEUMme5I', '111.524399,36.079956', 'location', 1397563134),
(22, '1d2e1b640424480', 'o-oeYjuKJBO4DjP08lamSoHH773I', '114.268326,22.725830', 'location', 1398308054),
(23, 'tskkuc1398353166', 'oYFa5jgYy7ciqVWmh7RoXLqdxMgs', '附近银行', 'text', 1398358526),
(24, 'tskkuc1398353166', 'oYFa5jgYy7ciqVWmh7RoXLqdxMgs', '116.304405,40.117874', 'location', 1398358548),
(25, 'ibczsl1399137955', 'oXZeGtymnxl16Bqk9hcfBj8gXE_o', '107.501656,31.208217', 'location', 1399141876),
(26, '1d2e1b640424480', 'o-oeYjuOamexFBwnhU1XyL7JOfEY', '附近厕所', 'text', 1399311818),
(27, '1d2e1b640424480', 'o-oeYjomlgjX186fnqDSL93A4sG8', '110.358986,20.009201', 'location', 1399343056),
(28, 'zmbrhg1399526271', 'oaO6TjgFvbeEu3094tUjSg6qY6LY', '附近 酒店', 'text', 1399526386),
(29, 'zmbrhg1399526271', 'oaO6TjgFvbeEu3094tUjSg6qY6LY', '110.548660,29.333740', 'location', 1399526395);

-- --------------------------------------------------------

--
-- 表的结构 `wy_user_stat`
--

CREATE TABLE IF NOT EXISTS `wy_user_stat` (
  `uid` int(10) unsigned NOT NULL,
  `action` varchar(20) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `last_time` int(10) unsigned NOT NULL,
  UNIQUE KEY `uid_type` (`uid`,`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_user_stat`
--

INSERT INTO `wy_user_stat` (`uid`, `action`, `num`, `last_time`) VALUES
(6, 'register', 1, 1400039066),
(6, 'login', 1, 1400039066);

-- --------------------------------------------------------

--
-- 表的结构 `wy_voiceresponse`
--

CREATE TABLE IF NOT EXISTS `wy_voiceresponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(90) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `uptatetime` varchar(13) NOT NULL,
  `keyword` char(255) NOT NULL,
  `title` varchar(60) NOT NULL,
  `musicurl` char(255) NOT NULL,
  `hqmusicurl` char(255) NOT NULL,
  `description` char(255) NOT NULL,
  `token` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_voiceresponse`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_vote`
--

CREATE TABLE IF NOT EXISTS `wy_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `token` varchar(50) NOT NULL,
  `type` char(5) NOT NULL COMMENT 'text/img 文本/图片',
  `picurl` varchar(500) NOT NULL,
  `showpic` tinyint(4) NOT NULL COMMENT '是否显示图片',
  `info` varchar(500) NOT NULL COMMENT '投票说明',
  `statdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL COMMENT '1投票前0投票后2投票结束',
  `cknums` tinyint(3) NOT NULL DEFAULT '1' COMMENT '最多可选择，默认1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`),
  FULLTEXT KEY `keyword` (`keyword`),
  FULLTEXT KEY `token` (`token`),
  FULLTEXT KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `wy_vote`
--

INSERT INTO `wy_vote` (`id`, `title`, `keyword`, `token`, `type`, `picurl`, `showpic`, `info`, `statdate`, `enddate`, `display`, `cknums`, `status`) VALUES
(1, '投票', '文字投票', '1d2e1b640424480', 'text', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '投票', 1396022400, 1398441600, 0, 1, 1),
(2, '图片投票', '图片投票', '1d2e1b640424480', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '图片投票', 1394812800, 1400169600, 0, 1, 0),
(3, 'asdf', '投票', 'niftlo1396097617', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, 'asdf', 1396022400, 1396627200, 0, 1, 1),
(4, '上购物33', '投票', 'gfsnlb1395552210', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '333', 1397664000, 1398873600, 0, 1, 0),
(5, '网吧投票', '投票', 'jxwcvs1395158492', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '网吧投票网吧投票网吧投票网吧投票网吧投票', 1396368000, 1396454400, 0, 1, 0),
(7, '给我投票吧', '投票', 'kxofnz1396788966', 'text', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '只有在线人参与', 1396713600, 1396886400, 0, 1, 0),
(8, '幸运大转盘活动开始了', '6', 'kxofnz1396788966', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '奇才', 1396713600, 1396886400, 0, 1, 0),
(9, '投票投票投票投票', '投票', 'lmnzdq1397285211', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '投票投票投票投票投票投票投票投票投票投票', 1396800000, 1398787200, 0, 1, 1),
(10, '测试投票', '投票', 'wjjnxm1399082112', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '测试', 1399046400, 1399737600, 0, 1, 1),
(11, '文字投票测试', '文字投票', 'etwrim1399211617', 'text', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '00000000000000000000000000000000000', 1399219200, 1400601600, 0, 2, 0),
(12, '2014最美新娘评选', '图片投票', 'etwrim1399211617', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '&lt;span style=&quot;color:#666666;font-family:Simsun;line-height:24px;background-color:#FFFFFF;&quot;&gt;新浪房产联合情之门婚纱摄影“石家庄最美丽的新娘评选”4月评选开始啦！欢迎广大热心网友参评照片，给自己喜欢的新娘投票。感谢大家的的爱心和对新浪房产和情之门婚纱摄影的支持，所有参加评选的新娘都将获得由情之门婚纱摄影提供的纪念奖品一份。&lt;/span&gt;&lt;br /&gt;\r\n&lt;span style=&quot;color:#666666;font-family:Simsun;line-height:24px;background-color:#FFFFFF;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;本期每位新娘在新浪网上接受的投票时间为15天，到期后新娘的照片可以继续浏览但是不能在继续投票，届时评选委员会将对投票的成绩进行记录，第二批新娘照片上传的时间是5月18号，网上接受投票的时间仍然是15天，待所有新娘', 1399219200, 1412438400, 0, 1, 0),
(13, '投票', '投票', 'unpvzc1399101846', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '投票', 1399219200, 1401379200, 2, 2, 0),
(14, '123', '投票', 'tauone1399622209', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '11111111', 1399392000, 1401292800, 1, 1, 0),
(15, '我们的服务', '投票', 'lghttg1400048999', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '我们的服务', 1399824000, 1401292800, 0, 2, 1),
(18, '投票开始啦321321321123', '投票321321312123', 'lghttg1400048999', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '投票开始啦', 1399824000, 1401292800, 1, 1, 0),
(19, '发热热隔热', '投票', 'rhwqjq1398136971', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '放儿歌如果人', 1400342400, 1401379200, 0, 1, 0),
(20, '非高峰', '微投票', 'wezgqi1399868235', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, '额凡人歌', 1400342400, 1401292800, 0, 1, 1),
(21, 'fefergrgtrt', '投票', 'rlyqwj1400477095', 'img', 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', 1, 'dewfergrthythtyjy', 1400428800, 1401379200, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_vote_item`
--

CREATE TABLE IF NOT EXISTS `wy_vote_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL COMMENT 'vote_id',
  `item` varchar(50) NOT NULL,
  `vcount` int(11) NOT NULL,
  `startpicurl` varchar(200) NOT NULL DEFAULT '',
  `tourl` varchar(200) NOT NULL DEFAULT '',
  `rank` tinyint(4) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `wy_vote_item`
--

INSERT INTO `wy_vote_item` (`id`, `vid`, `item`, `vcount`, `startpicurl`, `tourl`, `rank`) VALUES
(7, 4, 'dffdf', 3, 'http://wei.0798lele.com/uploads/z/ztuljb1395939259/f/c/9/f/thumb_53399872cac09.jpg', '#', 1),
(3, 1, '投票1', 0, '', '', 1),
(4, 1, '投票2', 0, '', '', 1),
(5, 2, '图片投票', 1, 'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png', '#', 1),
(6, 2, '图片投票2', 1, 'http://www.138wo.com/uploads/1/1d2e1b640424480/7/9/f/c/thumb_5320641c9302b.jpg', '#', 1),
(9, 7, '对', 0, '', '', 1),
(10, 7, '不对', 1, '', '', 1),
(11, 8, '好', 0, 'http://www.138wo.com/uploads/k/kxofnz1396788966/f/4/4/7/thumb_53416ac7935a7.jpg', '#', 1),
(12, 8, '有', 1, 'http://www.138wo.com/uploads/k/kxofnz1396788966/a/6/d/a/thumb_53416ad83cd5c.jpg', '#', 1),
(13, 9, '标题', 10, 'http://www.138wo.com/tpl/static/attachment/focus/default/2.jpg', '#', 1),
(14, 9, '标题', 11, 'http://www.138wo.com/tpl/static/attachment/focus/default/2.jpg', '#', 1),
(15, 10, '123', 21, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/bookmark.png', '#', 1),
(16, 11, 'AAAAA', 1, '', '', 1),
(17, 11, 'BBBB', 1, '', '', 1),
(18, 11, 'CCCC', 101, '', '', 1),
(19, 11, 'DDDD', 1, '', '', 1),
(20, 12, '郭德纲', 1, 'http://tupian.hbrc.com/joke/UpFilesnew/2012/6/23/201262303147971.jpg', 'http://www.56.com/u57/v_MTEwMDk2Njcw.html/1030_qq-qiopfyolfo.html', 1),
(21, 12, '刻录机', 0, 'http://img.pconline.com.cn/images/upload/upc/tx/wallpaper/1210/30/c3/14787562_1351575714518_320x480.jpg', 'http://www.56.com/u53/v_MTEwMTk5Mjc0.html/1030_qq-qiopfyolfo.html', 1),
(22, 12, '风格的', 0, 'http://g3.hexunimg.cn/2012-03-09/139134106.jpg', 'http://www.56.com/u70/v_MTEwMjU0Mzc5.html/1030_qq-qiopfyolfo.html', 1),
(23, 12, '加工费', 0, 'http://h.hiphotos.baidu.com/image/w%3D2048%3Bq%3D90/sign=1a2099f300087bf47dec50e9c6eb6c5d/9825bc315c6034a8596a1e39c9134954082376f9.jpg', 'http://www.56.com/u17/v_MTEwMjc3MTE4.html/1030_qq-qiopfyolfo.html', 1),
(24, 12, '忽悠就', 0, 'http://b.hiphotos.baidu.com/image/w%3D2048%3Bq%3D90/sign=ae61df27a2ec08fa260014a76dd6061c/b2de9c82d158ccbf35e3cea21bd8bc3eb03541ce.jpg', 'http://www.56.com/u20/v_MTEzMDcwMDY1.html/1030_qq-qiopfyolfo.html', 1),
(25, 12, '笳鼓动', 0, 'http://www.yangshengzhidao.net/uploads/allimg/120419/1-12041Z120344C.jpg', 'http://www.56.com/u61/v_MTEzMTIxNDk4.html', 1),
(26, 13, 'a', 1, 'http://www.138wo.com/tpl/static/attachment/background/view/2.jpg', '#', 1),
(27, 13, 'b', 2, 'http://www.138wo.com/tpl/static/attachment/background/view/8.jpg', '#', 1),
(28, 13, 'C', 3, 'http://www.138wo.com/tpl/static/attachment/background/view/7.jpg', '#', 1),
(29, 14, '1', 10, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/cloud-check.png', '#', 1),
(30, 14, '2', 10, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/donut.png', '#', 2),
(31, 14, '3', 11, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/cloud-error.png', '#', 3),
(35, 19, '放儿歌', 0, 'http://demo.138wo.com/uploads/r/rhwqjq1398136971/8/9/a/8/thumb_5378c3e14fbd3.png', '#', 1),
(36, 19, '的我发热沟通', 0, 'http://demo.138wo.com/uploads/r/rhwqjq1398136971/6/3/c/7/thumb_5378c3edc60da.JPG', '#', 1),
(37, 20, '额度', 0, 'http://demo.138wo.com/uploads/w/wezgqi1399868235/6/7/1/5/thumb_53798ff259b81.png', '#', 1),
(38, 20, '违法', 0, 'http://demo.138wo.com/uploads/w/wezgqi1399868235/1/2/a/2/thumb_53799001c0c9c.jpg', '#', 1),
(39, 21, '1', 1, 'http://demo.138wo.com/uploads/r/rlyqwj1400477095/f/5/7/4/thumb_537997519bc93.jpg', '#', 1),
(40, 21, '2', 0, 'http://demo.138wo.com/uploads/r/rlyqwj1400477095/7/7/c/d/thumb_5379975ebe2e0.jpg', '#', 1),
(41, 21, '3', 0, 'http://demo.138wo.com/uploads/r/rlyqwj1400477095/4/4/7/5/thumb_5379976a4bcaf.png', '#', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wy_vote_record`
--

CREATE TABLE IF NOT EXISTS `wy_vote_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(50) NOT NULL COMMENT '投票项 1,2,3,',
  `vid` int(11) NOT NULL,
  `wecha_id` varchar(100) NOT NULL,
  `touched` tinyint(4) NOT NULL,
  `touch_time` int(11) NOT NULL COMMENT '投票日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `wy_vote_record`
--

INSERT INTO `wy_vote_record` (`id`, `item_id`, `vid`, `wecha_id`, `touched`, `touch_time`) VALUES
(1, '5', 2, 'o-oeYjmDmgDtyYpeSHN7mpJq-xFw', 1, 1396073448),
(2, '10', 7, 'owzQCt0jc2rN6OoAzm1QkxaRXTVA', 1, 1396796543),
(3, '12', 8, 'owzQCt0jc2rN6OoAzm1QkxaRXTVA', 1, 1396796599),
(4, '14', 9, 'o24XDjh3WV4m_2oWwgS1gPQ47i6g', 1, 1397381918),
(5, '15', 10, 'ogE7Ity2nOF5dqSo4L2mp16ZHjEU', 1, 1399100395),
(6, '20', 12, 'on_THt_UX41RbrRVM8m7XclqVtYE', 1, 1399256723),
(7, '16,17,18,19', 11, 'on_THt_UX41RbrRVM8m7XclqVtYE', 1, 1399256754),
(8, '31', 14, 'o-EB1jmrueGcGmLFlxz4s4lp474w', 1, 1399623809),
(9, '6', 2, 'o-oeYjomlgjX186fnqDSL93A4sG8', 1, 1400052873),
(10, '39', 21, 'o1AmSjpkmfzdSxYRp4zE9T7JgEfc', 1, 1400477594);

-- --------------------------------------------------------

--
-- 表的结构 `wy_waimai`
--

CREATE TABLE IF NOT EXISTS `wy_waimai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` mediumint(4) NOT NULL DEFAULT '0',
  `storeid` mediumint(4) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `oprice` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '10',
  `intro` text NOT NULL,
  `token` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `salecount` mediumint(4) NOT NULL DEFAULT '0',
  `logourl` varchar(150) NOT NULL DEFAULT '',
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `groupon` tinyint(1) NOT NULL DEFAULT '0',
  `endtime` int(10) NOT NULL DEFAULT '0',
  `fakemembercount` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`storeid`),
  KEY `catid_2` (`catid`),
  KEY `storeid` (`storeid`),
  KEY `token` (`token`),
  KEY `price` (`price`),
  KEY `oprice` (`oprice`),
  KEY `discount` (`discount`),
  KEY `dining` (`dining`),
  KEY `groupon` (`groupon`,`endtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `wy_waimai`
--

INSERT INTO `wy_waimai` (`id`, `catid`, `storeid`, `name`, `price`, `oprice`, `discount`, `intro`, `token`, `keyword`, `salecount`, `logourl`, `dining`, `groupon`, `endtime`, `fakemembercount`, `time`) VALUES
(7, 7, 1, '剁椒鱼头', 55, 60, 9.2, '', '1d2e1b640424480', '剁椒鱼头', 0, '', 0, 0, 0, 0, 1396638253),
(9, 7, 1, '中式料理', 50, 36, 13.9, '<p>中式料理</p>', '1d2e1b640424480', '中式料理', 0, '', 0, 0, 0, 0, 1396715062),
(10, 7, 2, '34', 44, 55, 8, '<p>44</p>', '', '', 0, '', 0, 0, 0, 0, 0),
(11, 7, 1, '豆腐', 10, 10, 10, '<p>豆腐</p>', '1d2e1b640424480', '豆腐', 0, '', 0, 0, 0, 0, 0),
(14, 14, 42, '干锅土豆片', 16, 16, 10, '<p>这道菜土豆片外焦里嫩，配上腊肉、红绿辣椒，焦香下饭，香辣过瘾，别有一番风味。不知不觉米饭就被扫光光，绝对是丰富家庭餐桌的一道美菜。</p>', 'aazzho1397651418', '干锅 土豆片', 0, 'http://images.meishij.net/p/20100909/a80da82d150808ee75b96e6ae8a69579_150x150.jpg', 0, 0, 0, 0, 1397716709),
(15, 17, 37, 'www', 12, 45, 2.7, '<p>dd</p>', 'aqzqfq1397495433', 'huac', 0, 'http://www.138wo.com/uploads/a/aqzqfq1397495433/c/e/2/8/thumb_534c16c2638ab.jpg', 0, 0, 0, 0, 1397760145),
(16, 18, 49, '咖喱牛肉盖浇饭', 12, 15, 8, '<p>【7858咖喱牛肉盖浇饭】</p><p><img src="http://www.138wo.com/tpl/static/ueditor/php/../../../../uploads/138wo/20140422/1398136582916275.jpg" title="咖喱牛肉盖浇饭.jpg"/></p>', 'wvrtzr1398133472', '7858盖浇饭', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/f/2/f/2/thumb_5355dec97ed67.jpg', 0, 0, 0, 0, 1398136590),
(17, 18, 49, '麻辣豆腐盖浇饭', 8, 10, 8, '<p>【麻辣豆腐盖浇饭】</p><p><img src="http://www.138wo.com/tpl/static/ueditor/php/../../../../uploads/138wo/20140422/1398136707129228.jpg" title="麻辣豆腐盖浇饭.jpg"/></p>', 'wvrtzr1398133472', '7858盖浇饭', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/3/b/8/a/thumb_5355df71b95f6.jpg', 0, 0, 0, 0, 1398136710),
(18, 19, 49, '每日便当（15）', 14.25, 15, 9.5, '<p>【每日便当（15）】</p><p><img src="http://www.138wo.com/tpl/static/ueditor/php/../../../../uploads/138wo/20140422/1398136816114894.jpg" title="盒饭15.jpg"/></p>', 'wvrtzr1398133472', '7858盖浇饭', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/5/e/7/6/thumb_5355dfd31619d.jpg', 0, 0, 0, 0, 1398136818),
(19, 19, 49, '每日便当（10）', 9.5, 10, 9.5, '<p>【每日便当（10）】</p><p><img src="http://www.138wo.com/tpl/static/ueditor/php/../../../../uploads/138wo/20140422/1398136907453727.jpg" title="盒饭10.jpg"/></p>', 'wvrtzr1398133472', '7858盖浇饭', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/a/8/8/e/thumb_5355e0391e870.jpg', 0, 0, 0, 0, 1398136909),
(20, 21, 52, '外卖2233232', 13, 134, 1, '<p>标杆&nbsp;</p>', 'rbtdnj1398179513', '外卖22332322233232', 0, 'http://www.138wo.com/uploads/c/cfxuoc1396505145/f/5/e/3/thumb_533d027653568.png', 0, 0, 0, 0, 1398181442),
(21, 24, 70, '客房预订', 10, 15, 6.7, '<p>内容<br/></p>', 'iauoio1398652456', '官网', 0, 'http://www.138wo.com/uploads/i/iauoio1398652456/8/f/a/8/thumb_535dc07026caa.jpg', 0, 0, 0, 0, 1398655142),
(22, 25, 80, '测试菜品1', 25, 50, 5, '<p>sdasdasdas</p>', 'wjjnxm1399082112', '外卖111', 0, '', 0, 0, 0, 0, 1399104257),
(23, 0, 81, '1111', 11, 11, 10, '', 'etazth1399172771', '11', 0, '11', 0, 0, 0, 0, 1399188828),
(24, 27, 88, '外卖商品1', 12, 1212, 0.1, '', 'iscaqj1399370070', '外卖商品', 0, '', 0, 0, 0, 0, 1399370417),
(25, 0, 93, '11', 11, 11, 10, '<p>111</p>', 'cwbqlh1399554846', '111', 0, '1111', 0, 0, 0, 0, 1399554982);

-- --------------------------------------------------------

--
-- 表的结构 `wy_waimai_cat`
--

CREATE TABLE IF NOT EXISTS `wy_waimai_cat` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL DEFAULT '',
  `parentid` mediumint(4) NOT NULL,
  `logourl` varchar(100) NOT NULL,
  `dining` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentid` (`parentid`),
  KEY `token` (`token`),
  KEY `dining` (`dining`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `wy_waimai_cat`
--

INSERT INTO `wy_waimai_cat` (`id`, `token`, `name`, `des`, `parentid`, `logourl`, `dining`, `time`) VALUES
(7, '1d2e1b640424480', '中餐', '中餐', 0, '', 0, 1396638218),
(8, '1d2e1b640424480', '西餐', '西餐', 0, '', 0, 1396638225),
(9, '', '火锅', '', 0, 'http://www.138wo.com/uploads/w/waktkw1396522333/0/4/2/4/thumb_533e419a90cd9.jpg', 0, 0),
(10, '', '混沌', '混沌', 0, 'http://www.138wo.com/uploads/t/tjbynz1396663229/b/f/1/a/thumb_534020c300750.jpg', 0, 0),
(11, '', '馄饨', '馄饨馄饨馄饨馄饨', 0, 'http://www.138wo.com/uploads/t/tjbynz1396663229/b/f/1/a/thumb_534020c300750.jpg', 0, 0),
(12, '', '555', '55', 0, '55', 0, 0),
(13, '', '555', '555', 0, '55', 0, 0),
(14, 'aazzho1397651418', '炒菜', '', 0, '', 0, 1397716095),
(15, 'aazzho1397651418', '盖饭', '', 0, '', 0, 1397716107),
(16, 'aazzho1397651418', '主食', '', 0, '', 0, 1397716116),
(17, 'aqzqfq1397495433', 'www', 'w', 0, 'http://www.138wo.com/uploads/a/aqzqfq1397495433/e/f/5/d/thumb_534c252fe4630.jpg', 0, 1397760117),
(18, 'wvrtzr1398133472', '7858盖浇饭', '盖浇饭系列', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/8/a/d/9/thumb_5355dafdbfb9c.png', 0, 1398135568),
(19, 'wvrtzr1398133472', '7858便当', '多种选择，多种生活，一种品质', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/f/0/e/b/thumb_5355db2ca5639.png', 0, 1398135641),
(20, 'wvrtzr1398133472', '7858多人套餐', '7858多人餐，有乐齐分享', 0, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/d/0/0/f/thumb_5355db7109854.jpg', 0, 1398135682),
(21, 'rbtdnj1398179513', '外卖分类1', '外卖分类1', 0, 'http://www.138wo.com/uploads/c/cfxuoc1396505145/f/5/e/3/thumb_533d027653568.png', 0, 1398181359),
(22, 'wvrtzr1398133472', '蔬菜', '好吃不贵~', 18, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/3/3/d/5/thumb_5358bfd89e39d.jpg', 0, 1398325216),
(23, 'wvrtzr1398133472', '牛肉饭', '好吃', 18, 'http://www.138wo.com/uploads/w/wvrtzr1398133472/7/e/9/9/thumb_5358bff3e6e03.jpg', 0, 1398325244),
(24, 'iauoio1398652456', '公司简介', '', 0, 'http://www.138wo.com/uploads/i/iauoio1398652456/a/f/d/8/thumb_535dc86b22e6e.jpg', 0, 1398655087),
(25, 'wjjnxm1399082112', '外卖分类1', 'dasdasdasdasdasdsadasdas', 0, 'http://www.138wo.com/tpl/static/attachment/icon/lovely/bill.png', 0, 1399104209),
(26, 'etazth1399172771', '111', '', 0, '11', 0, 1399188819),
(27, 'iscaqj1399370070', '外卖分类1', '', 0, '', 0, 1399370391),
(28, 'cwbqlh1399554846', '1', '', 0, '', 0, 1399554962);

-- --------------------------------------------------------

--
-- 表的结构 `wy_waimai_company`
--

CREATE TABLE IF NOT EXISTS `wy_waimai_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `catid` mediumint(3) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL COMMENT '店铺状态',
  `category` varchar(10) NOT NULL COMMENT '店铺分类',
  `time` varchar(12) NOT NULL COMMENT '营业时间',
  `money` double(10,2) NOT NULL COMMENT '起送价格',
  `radius` varchar(10) NOT NULL COMMENT '服务半径',
  `scope` varchar(100) NOT NULL COMMENT '配送范围',
  `bulletin` text NOT NULL COMMENT '店铺公告',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `wy_waimai_company`
--

INSERT INTO `wy_waimai_company` (`id`, `token`, `catid`, `status`, `category`, `time`, `money`, `radius`, `scope`, `bulletin`) VALUES
(6, '1d2e1b640424480', 1, 0, '外卖', '8:00~22:00', 50.00, '3公里', '温州市区', '买10元 送一元'),
(7, 'tjbynz1396663229', 19, 0, '水电费', '80:0-21:00', 50.00, '3公里', '铁西，铁东', '舒服舒服'),
(8, 'aazzho1397651418', 42, 0, '炒菜、盖饭、主食', '8：00—21：00', 20.00, '3公里', '东贸国际、东方御景、潮白人家、燕灵小区、圣得花园', '兄弟快餐为您提供最优质的服务，只需一个电话美味送到您身边，亲：您还在等什么！赶快拨打电话订购吧！'),
(9, 'wvrtzr1398133472', 49, 1, '快餐', '8：00~12：00', 8.00, '2.5', '（暂定）东营东城写字楼、商务聚集区、居民小区', '店铺开张，全部优惠8折哦~'),
(10, 'rbtdnj1398179513', 52, 0, 'gdgddggdg', '1970-01-01', 100.00, 'gdgdgddg', 'gdgddgdg', 'gddgdgg'),
(11, 'wvrtzr1398133472', 49, 0, '', '', 0.00, '', '', '订餐优惠~'),
(12, 'ulbcxj1398353232', 60, 0, '', '', 0.00, '', '', ''),
(13, 'cunsuc1398440362', 64, 0, '新鲜水果', '8：00-18：00', 50.00, '2公里', '常阳花园为中心', '满50送新奇士柠檬'),
(14, 'iauoio1398652456', 70, 0, '小吃，快餐', '8:00~20:00', 20.00, '3公里', '呈贡大学城', '店铺最新优惠满10元送1元'),
(15, 'wjjnxm1399082112', 80, 0, '', '', 0.00, '', '', ''),
(16, 'etazth1399172771', 81, 0, '11', '11', 11.00, '11', '11', '1111'),
(17, 'iscaqj1399370070', 88, 0, '', '', 0.00, '', '', ''),
(18, 'cwbqlh1399554846', 93, 0, '', '', 0.00, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_waimai_diningtable`
--

CREATE TABLE IF NOT EXISTS `wy_waimai_diningtable` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `intro` varchar(500) NOT NULL DEFAULT '',
  `taxis` mediumint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `wy_waimai_diningtable`
--

INSERT INTO `wy_waimai_diningtable` (`id`, `token`, `name`, `intro`, `taxis`) VALUES
(3, '1d2e1b640424480', '大厅', '环境优雅', 1),
(4, '1d2e1b640424480', '包厢', '环境私密', 2);

-- --------------------------------------------------------

--
-- 表的结构 `wy_wall`
--

CREATE TABLE IF NOT EXISTS `wy_wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(20) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `startbackground` varchar(100) NOT NULL DEFAULT '',
  `background` varchar(100) NOT NULL DEFAULT '',
  `endbackground` varchar(100) NOT NULL DEFAULT '',
  `isopen` tinyint(1) NOT NULL DEFAULT '1',
  `firstprizename` varchar(50) NOT NULL DEFAULT '',
  `firstprizepic` varchar(100) NOT NULL DEFAULT '',
  `firstprizecount` mediumint(5) NOT NULL DEFAULT '0',
  `secondprizename` varchar(50) NOT NULL DEFAULT '',
  `secondprizecount` mediumint(4) NOT NULL DEFAULT '0',
  `secondprizepic` varchar(50) NOT NULL DEFAULT '',
  `thirdprizename` varchar(50) NOT NULL DEFAULT '',
  `thirdprizepic` varchar(100) NOT NULL DEFAULT '',
  `thirdprizecount` mediumint(4) NOT NULL DEFAULT '0',
  `fourthprizename` varchar(50) NOT NULL DEFAULT '',
  `fourthprizecount` mediumint(4) NOT NULL DEFAULT '0',
  `fourthprizepic` varchar(100) NOT NULL DEFAULT '',
  `fifthprizename` varchar(50) NOT NULL DEFAULT '',
  `fifthprizecount` mediumint(5) NOT NULL DEFAULT '0',
  `fifthprizepic` varchar(100) NOT NULL DEFAULT '',
  `sixthprizename` varchar(50) NOT NULL DEFAULT '',
  `sixthprizecount` mediumint(4) NOT NULL DEFAULT '0',
  `sixthprizepic` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(60) NOT NULL DEFAULT '',
  `qrcode` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wy_wall`
--

INSERT INTO `wy_wall` (`id`, `token`, `time`, `logo`, `title`, `startbackground`, `background`, `endbackground`, `isopen`, `firstprizename`, `firstprizepic`, `firstprizecount`, `secondprizename`, `secondprizecount`, `secondprizepic`, `thirdprizename`, `thirdprizepic`, `thirdprizecount`, `fourthprizename`, `fourthprizecount`, `fourthprizepic`, `fifthprizename`, `fifthprizecount`, `fifthprizepic`, `sixthprizename`, `sixthprizecount`, `sixthprizepic`, `keyword`, `qrcode`) VALUES
(1, '1d2e1b640424480', 1400314551, '', '微信墙测试哦', 'http://www.138wo.com/uploads/1/1d2e1b640424480/a/1/6/e/thumb_536082654f1ec.jpg', 'http://www.138wo.com/uploads/1/1d2e1b640424480/a/1/6/e/thumb_536082654f1ec.jpg', 'http://www.138wo.com/uploads/1/1d2e1b640424480/a/1/6/e/thumb_536082654f1ec.jpg', 1, '汽车', 'http://www.138wo.com/uploads/1/1d2e1b640424480/b/d/7/a/thumb_5360829e3c504.png', 1, '房子', 2, 'http://www.138wo.com/uploads/1/1d2e1b640424480/b/d', '手机', 'http://www.138wo.com/uploads/1/1d2e1b640424480/b/d/7/a/thumb_5360829e3c504.png', 3, '', 0, '', '', 0, '', '', 0, '', '微信墙', 'http://www.138wo.com/uploads/1/1d2e1b640424480/a/1/0/4/thumb_536082037c702.jpg'),
(2, 'dxawnf1400484087', 1400486390, '', 'ccc', 'http://demo.138wo.com/tpl/static/attachment/background/view/4.jpg', 'http://demo.138wo.com/tpl/static/attachment/background/view/2.jpg', 'http://demo.138wo.com/tpl/static/attachment/background/view/3.jpg', 1, 'cvc', 'http://demo.138wo.com/uploads/d/dxawnf1400484087/6/d/9/6/thumb_5379b9dece7e0.jpg', 12, '', 0, '', '', '', 0, '', 0, '', '', 0, '', '', 0, '', '不过', ''),
(3, 'syoahf1400555431', 1400557265, '', 'e', '', '', '', 1, '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', 0, '', '', 0, '', 'ww', ''),
(4, 'pxhsnk1400821588', 1400829579, '', '123123123', '', '', '', 1, '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', 0, '', '', 0, '', '1', ''),
(5, 'nsnyem1400838500', 1400838843, 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/backpack-2.png', '微信墙', 'http://wx.0724s.com/tpl/static/attachment/background/view/6.jpg', 'http://wx.0724s.com/tpl/static/attachment/background/view/12.jpg', '', 1, '100', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/briefcase.png', 1, '50', 2, 'http://wx.0724s.com/tpl/static/attachment/icon/lov', '10', 'http://wx.0724s.com/tpl/static/attachment/icon/lovely/flag.png', 3, '', 0, '', '', 0, '', '', 0, '', 'q', '');

-- --------------------------------------------------------

--
-- 表的结构 `wy_wall_member`
--

CREATE TABLE IF NOT EXISTS `wy_wall_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(20) NOT NULL DEFAULT '',
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `portrait` varchar(150) NOT NULL DEFAULT '',
  `nickname` varchar(60) NOT NULL DEFAULT '',
  `mp` varchar(11) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  `wallid` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `token` (`token`,`wallid`),
  KEY `wecha_id` (`wecha_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_wall_member`
--

INSERT INTO `wy_wall_member` (`id`, `token`, `wecha_id`, `portrait`, `nickname`, `mp`, `time`, `wallid`, `status`, `sex`) VALUES
(1, 'nsnyem1400838500', 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', 'http://wx.0724s.com/tpl/static/portrait/3.jpg', '', '13888888888', 1400838905, 5, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_wall_message`
--

CREATE TABLE IF NOT EXISTS `wy_wall_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `wallid` int(10) NOT NULL DEFAULT '0',
  `token` varchar(20) NOT NULL DEFAULT '',
  `wecha_id` varchar(60) NOT NULL DEFAULT '',
  `content` varchar(500) NOT NULL DEFAULT '',
  `picture` varchar(150) NOT NULL DEFAULT '',
  `time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `wallid` (`wallid`,`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wy_wall_message`
--

INSERT INTO `wy_wall_message` (`id`, `uid`, `wallid`, `token`, `wecha_id`, `content`, `picture`, `time`) VALUES
(1, 1, 5, 'nsnyem1400838500', 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', '健健康康咯莫', '', 1400838954);

-- --------------------------------------------------------

--
-- 表的结构 `wy_wall_prize_record`
--

CREATE TABLE IF NOT EXISTS `wy_wall_prize_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `wallid` int(11) NOT NULL DEFAULT '0',
  `prize` mediumint(4) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wallid` (`wallid`,`prize`,`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `wy_wall_prize_record`
--

INSERT INTO `wy_wall_prize_record` (`id`, `uid`, `wallid`, `prize`, `time`) VALUES
(2, 5, 1, 3, 1400315708),
(3, 1, 5, 3, 1400838976);

-- --------------------------------------------------------

--
-- 表的结构 `wy_weather`
--

CREATE TABLE IF NOT EXISTS `wy_weather` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `code` char(9) NOT NULL,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2502 ;

--
-- 转存表中的数据 `wy_weather`
--

INSERT INTO `wy_weather` (`id`, `code`, `name`) VALUES
(1, '101010100', '北京'),
(2, '101010200', '海淀'),
(3, '101010400', '顺义'),
(4, '101010500', '怀柔'),
(5, '101010600', '通州'),
(6, '101010700', '昌平'),
(7, '101010800', '延庆'),
(8, '101010900', '丰台'),
(9, '101011000', '石景山'),
(10, '101011100', '大兴'),
(11, '101011200', '房山'),
(12, '101011300', '密云'),
(13, '101011400', '门头沟'),
(14, '101011500', '平谷'),
(15, '101020100', '上海'),
(16, '101020200', '闵行'),
(17, '101020300', '宝山'),
(18, '101020500', '嘉定'),
(19, '101020600', '浦东南汇'),
(20, '101020700', '金山'),
(21, '101020800', '青浦'),
(22, '101020900', '松江'),
(23, '101021000', '奉贤'),
(24, '101021100', '崇明'),
(25, '101021300', '浦东'),
(26, '101030200', '武清'),
(27, '101030300', '宝坻'),
(28, '101030400', '东丽'),
(29, '101030500', '西青'),
(30, '101030600', '北辰'),
(31, '101030700', '宁河'),
(32, '101030800', '汉沽'),
(33, '101030900', '静海'),
(34, '101031000', '津南'),
(35, '101031100', '塘沽'),
(36, '101031200', '大港'),
(37, '101031400', '蓟县'),
(38, '101040100', '重庆'),
(39, '101040200', '永川'),
(40, '101040300', '合川'),
(41, '101040400', '南川'),
(42, '101040500', '江津'),
(43, '101040600', '万盛'),
(44, '101040700', '渝北'),
(45, '101040800', '北碚'),
(46, '101041000', '长寿'),
(47, '101041100', '黔江'),
(48, '101041300', '万州'),
(49, '101041400', '涪陵'),
(50, '101041500', '开县'),
(51, '101041600', '城口'),
(52, '101041700', '云阳'),
(53, '101041800', '巫溪'),
(54, '101041900', '奉节'),
(55, '101042000', '巫山'),
(56, '101042100', '潼南'),
(57, '101042200', '垫江'),
(58, '101042300', '梁平'),
(59, '101042400', '忠县'),
(60, '101042500', '石柱'),
(61, '101042600', '大足'),
(62, '101042700', '荣昌'),
(63, '101042800', '铜梁'),
(64, '101042900', '璧山'),
(65, '101043000', '丰都'),
(66, '101043100', '武隆'),
(67, '101043200', '彭水'),
(68, '101043300', '綦江'),
(69, '101043400', '酉阳'),
(70, '101043600', '秀山'),
(71, '101050101', '哈尔滨'),
(72, '101050102', '双城'),
(73, '101050103', '呼兰'),
(74, '101050104', '阿城'),
(75, '101050105', '宾县'),
(76, '101050106', '依兰'),
(77, '101050107', '巴彦'),
(78, '101050108', '通河'),
(79, '101050109', '方正'),
(80, '101050110', '延寿'),
(81, '101050111', '尚志'),
(82, '101050112', '五常'),
(83, '101050113', '木兰'),
(84, '101050201', '齐齐哈尔'),
(85, '101050202', '讷河'),
(86, '101050203', '龙江'),
(87, '101050204', '甘南'),
(88, '101050205', '富裕'),
(89, '101050206', '依安'),
(90, '101050207', '拜泉'),
(91, '101050208', '克山'),
(92, '101050209', '克东'),
(93, '101050210', '泰来'),
(94, '101050301', '牡丹江'),
(95, '101050302', '海林'),
(96, '101050303', '穆棱'),
(97, '101050304', '林口'),
(98, '101050305', '绥芬河'),
(99, '101050306', '宁安'),
(100, '101050307', '东宁'),
(101, '101050401', '佳木斯'),
(102, '101050402', '汤原'),
(103, '101050403', '抚远'),
(104, '101050404', '桦川'),
(105, '101050405', '桦南'),
(106, '101050406', '同江'),
(107, '101050407', '富锦'),
(108, '101050501', '绥化'),
(109, '101050502', '肇东'),
(110, '101050503', '安达'),
(111, '101050504', '海伦'),
(112, '101050505', '明水'),
(113, '101050506', '望奎'),
(114, '101050507', '兰西'),
(115, '101050508', '青冈'),
(116, '101050509', '庆安'),
(117, '101050510', '绥棱'),
(118, '101050601', '黑河'),
(119, '101050602', '嫩江'),
(120, '101050603', '孙吴'),
(121, '101050604', '逊克'),
(122, '101050605', '五大连池'),
(123, '101050606', '北安'),
(124, '101050701', '大兴安岭'),
(125, '101050702', '塔河'),
(126, '101050703', '漠河'),
(127, '101050704', '呼玛'),
(128, '101050801', '伊春'),
(129, '101050804', '铁力'),
(130, '101050805', '嘉荫'),
(131, '101050901', '大庆'),
(132, '101050902', '林甸'),
(133, '101050903', '肇州'),
(134, '101050904', '肇源'),
(135, '101050905', '杜蒙'),
(136, '101051002', '七台河'),
(137, '101051003', '勃利'),
(138, '101051101', '鸡西'),
(139, '101051102', '虎林'),
(140, '101051103', '密山'),
(141, '101051104', '鸡东'),
(142, '101051201', '鹤岗'),
(143, '101051202', '绥滨'),
(144, '101051203', '萝北'),
(145, '101051301', '双鸭山'),
(146, '101051302', '集贤'),
(147, '101051303', '宝清'),
(148, '101051304', '饶河'),
(149, '101051305', '友谊'),
(150, '101060101', '长春'),
(151, '101060102', '农安'),
(152, '101060103', '德惠'),
(153, '101060104', '九台'),
(154, '101060105', '榆树'),
(155, '101060201', '吉林'),
(156, '101060202', '舒兰'),
(157, '101060203', '永吉'),
(158, '101060204', '蛟河'),
(159, '101060205', '磐石'),
(160, '101060206', '桦甸'),
(161, '101060302', '敦化'),
(162, '101060303', '安图'),
(163, '101060304', '汪清'),
(164, '101060305', '和龙'),
(165, '101060307', '龙井'),
(166, '101060308', '珲春'),
(167, '101060309', '图们'),
(168, '101060312', '延吉'),
(169, '101060401', '四平'),
(170, '101060402', '双辽'),
(171, '101060403', '梨树'),
(172, '101060404', '公主岭'),
(173, '101060405', '伊通'),
(174, '101060501', '通化'),
(175, '101060502', '梅河口'),
(176, '101060503', '柳河'),
(177, '101060504', '辉南'),
(178, '101060505', '集安'),
(179, '101060601', '白城'),
(180, '101060602', '洮南'),
(181, '101060603', '大安'),
(182, '101060604', '镇赉'),
(183, '101060605', '通榆'),
(184, '101060701', '辽源'),
(185, '101060702', '东丰'),
(186, '101060703', '东辽'),
(187, '101060801', '松原'),
(188, '101060802', '乾安'),
(189, '101060803', '前郭'),
(190, '101060804', '长岭'),
(191, '101060805', '扶余'),
(192, '101060901', '白山'),
(193, '101060902', '靖宇'),
(194, '101060903', '临江'),
(195, '101060905', '长白'),
(196, '101060906', '抚松'),
(197, '101060907', '江源'),
(198, '101070101', '沈阳'),
(199, '101070103', '辽中'),
(200, '101070104', '康平'),
(201, '101070105', '法库'),
(202, '101070106', '新民'),
(203, '101070201', '大连'),
(204, '101070202', '瓦房店'),
(205, '101070204', '普兰店'),
(206, '101070206', '长海'),
(207, '101070207', '庄河'),
(208, '101070301', '鞍山'),
(209, '101070302', '台安'),
(210, '101070303', '岫岩'),
(211, '101070304', '海城'),
(212, '101070401', '抚顺'),
(213, '101070402', '新宾'),
(214, '101070403', '清原'),
(215, '101070501', '本溪'),
(216, '101070504', '桓仁'),
(217, '101070601', '丹东'),
(218, '101070602', '凤城'),
(219, '101070603', '宽甸'),
(220, '101070604', '东港'),
(221, '101070701', '锦州'),
(222, '101070702', '凌海'),
(223, '101070704', '义县'),
(224, '101070705', '黑山'),
(225, '101070706', '北镇'),
(226, '101070801', '营口'),
(227, '101070802', '大石桥'),
(228, '101070803', '盖州'),
(229, '101070901', '阜新'),
(230, '101070902', '彰武'),
(231, '101071001', '辽阳'),
(232, '101071003', '灯塔'),
(233, '101071004', '弓长岭'),
(234, '101071101', '铁岭'),
(235, '101071102', '开原'),
(236, '101071103', '昌图'),
(237, '101071104', '西丰'),
(238, '101071105', '调兵山'),
(239, '101071201', '朝阳'),
(240, '101071203', '凌源'),
(241, '101071204', '喀左'),
(242, '101071205', '北票'),
(243, '101071207', '建平'),
(244, '101071301', '盘锦'),
(245, '101071302', '大洼'),
(246, '101071303', '盘山'),
(247, '101071401', '葫芦岛'),
(248, '101071402', '建昌'),
(249, '101071403', '绥中'),
(250, '101071404', '兴城'),
(251, '101080101', '呼和浩特'),
(252, '101080102', '土左'),
(253, '101080103', '托克托'),
(254, '101080104', '和林格尔'),
(255, '101080105', '清水河'),
(256, '101080107', '武川'),
(257, '101080201', '包头'),
(258, '101080202', '白云鄂博'),
(259, '101080204', '土右'),
(260, '101080205', '固阳'),
(261, '101080206', '达茂'),
(262, '101080301', '乌海'),
(263, '101080401', '乌兰察布'),
(264, '101080402', '卓资'),
(265, '101080403', '化德'),
(266, '101080404', '商都'),
(267, '101080406', '兴和'),
(268, '101080407', '凉城'),
(269, '101080408', '察右前'),
(270, '101080409', '察右中'),
(271, '101080410', '察右后'),
(272, '101080411', '四子王'),
(273, '101080412', '丰镇'),
(274, '101080501', '通辽'),
(275, '101080503', '科左中'),
(276, '101080504', '科左后'),
(277, '101080506', '开鲁'),
(278, '101080507', '库伦'),
(279, '101080508', '奈曼'),
(280, '101080509', '扎鲁特'),
(281, '101080601', '赤峰'),
(282, '101080603', '阿鲁'),
(283, '101080605', '巴林左'),
(284, '101080606', '巴林右'),
(285, '101080607', '林西'),
(286, '101080608', '克什'),
(287, '101080609', '翁牛特'),
(288, '101080611', '喀喇沁'),
(289, '101080613', '宁城'),
(290, '101080614', '敖汉'),
(291, '101080701', '鄂尔多斯'),
(292, '101080703', '达拉特'),
(293, '101080704', '准格尔'),
(294, '101080706', '河南'),
(295, '101080708', '鄂托克'),
(296, '101080709', '杭锦'),
(297, '101080710', '乌审'),
(298, '101080711', '伊金霍洛'),
(299, '101080801', '巴彦淖尔'),
(300, '101080802', '五原'),
(301, '101080803', '磴口'),
(302, '101080804', '乌前'),
(303, '101080806', '乌中'),
(304, '101080807', '乌后'),
(305, '101080810', '杭锦后'),
(306, '101080901', '锡林浩特'),
(307, '101080903', '二连浩特'),
(308, '101080904', '阿巴嘎'),
(309, '101080906', '苏左'),
(310, '101080907', '苏右'),
(311, '101080909', '东乌'),
(312, '101080910', '西乌'),
(313, '101080911', '太仆寺'),
(314, '101080912', '镶黄'),
(315, '101080913', '正镶白'),
(316, '101080914', '正蓝'),
(317, '101080915', '多伦'),
(318, '101081000', '呼伦贝尔'),
(319, '101081001', '海拉尔'),
(320, '101081003', '阿荣'),
(321, '101081004', '莫力达瓦'),
(322, '101081005', '鄂伦春'),
(323, '101081006', '鄂温克'),
(324, '101081007', '陈巴尔虎'),
(325, '101081008', '新左'),
(326, '101081009', '新右'),
(327, '101081010', '满洲里'),
(328, '101081011', '牙克石'),
(329, '101081012', '扎兰屯'),
(330, '101081014', '额尔古纳'),
(331, '101081015', '根河'),
(332, '101081101', '乌兰浩特'),
(333, '101081102', '阿尔山'),
(334, '101081103', '科右中'),
(335, '101081105', '扎赉特'),
(336, '101081107', '突泉'),
(337, '101081108', '霍林郭勒'),
(338, '101081109', '科右前'),
(339, '101081201', '阿拉善'),
(340, '101081202', '阿右'),
(341, '101081203', '额济纳'),
(342, '101090101', '石家庄'),
(343, '101090102', '井陉'),
(344, '101090103', '正定'),
(345, '101090104', '栾城'),
(346, '101090105', '行唐'),
(347, '101090106', '灵寿'),
(348, '101090107', '高邑'),
(349, '101090108', '深泽'),
(350, '101090109', '赞皇'),
(351, '101090110', '无极'),
(352, '101090111', '平山'),
(353, '101090112', '元氏'),
(354, '101090113', '赵县'),
(355, '101090114', '辛集'),
(356, '101090115', '藁城'),
(357, '101090116', '晋州'),
(358, '101090117', '新乐'),
(359, '101090118', '鹿泉'),
(360, '101090201', '保定'),
(361, '101090202', '满城'),
(362, '101090203', '阜平'),
(363, '101090204', '徐水'),
(364, '101090205', '唐县'),
(365, '101090206', '高阳'),
(366, '101090207', '容城'),
(367, '101090209', '涞源'),
(368, '101090210', '望都'),
(369, '101090211', '安新'),
(370, '101090212', '易县'),
(371, '101090214', '曲阳'),
(372, '101090215', '蠡县'),
(373, '101090216', '顺平'),
(374, '101090217', '雄县'),
(375, '101090218', '涿州'),
(376, '101090219', '定州'),
(377, '101090220', '安国'),
(378, '101090221', '高碑店'),
(379, '101090222', '涞水'),
(380, '101090223', '定兴'),
(381, '101090224', '清苑'),
(382, '101090225', '博野'),
(383, '101090301', '张家口'),
(384, '101090302', '宣化'),
(385, '101090303', '张北'),
(386, '101090304', '康保'),
(387, '101090305', '沽源'),
(388, '101090306', '尚义'),
(389, '101090307', '蔚县'),
(390, '101090308', '阳原'),
(391, '101090309', '怀安'),
(392, '101090310', '万全'),
(393, '101090311', '怀来'),
(394, '101090312', '涿鹿'),
(395, '101090313', '赤城'),
(396, '101090314', '崇礼'),
(397, '101090402', '承德'),
(398, '101090404', '兴隆'),
(399, '101090405', '平泉'),
(400, '101090406', '滦平'),
(401, '101090407', '隆化'),
(402, '101090408', '丰宁'),
(403, '101090409', '宽城'),
(404, '101090410', '围场'),
(405, '101090501', '唐山'),
(406, '101090502', '丰南'),
(407, '101090503', '丰润'),
(408, '101090504', '滦县'),
(409, '101090505', '滦南'),
(410, '101090506', '乐亭'),
(411, '101090507', '迁西'),
(412, '101090508', '玉田'),
(413, '101090509', '唐海'),
(414, '101090510', '遵化'),
(415, '101090511', '迁安'),
(416, '101090512', '曹妃甸'),
(417, '101090601', '廊坊'),
(418, '101090602', '固安'),
(419, '101090603', '永清'),
(420, '101090604', '香河'),
(421, '101090605', '大城'),
(422, '101090606', '文安'),
(423, '101090607', '大厂'),
(424, '101090608', '霸州'),
(425, '101090609', '三河'),
(426, '101090701', '沧州'),
(427, '101090702', '青县'),
(428, '101090703', '东光'),
(429, '101090704', '海兴'),
(430, '101090705', '盐山'),
(431, '101090706', '肃宁'),
(432, '101090707', '南皮'),
(433, '101090708', '吴桥'),
(434, '101090709', '献县'),
(435, '101090710', '孟村'),
(436, '101090711', '泊头'),
(437, '101090712', '任丘'),
(438, '101090713', '黄骅'),
(439, '101090714', '河间'),
(440, '101090716', '沧县'),
(441, '101090801', '衡水'),
(442, '101090802', '枣强'),
(443, '101090803', '武邑'),
(444, '101090804', '武强'),
(445, '101090805', '饶阳'),
(446, '101090806', '安平'),
(447, '101090807', '故城'),
(448, '101090808', '景县'),
(449, '101090809', '阜城'),
(450, '101090810', '冀州'),
(451, '101090811', '深州'),
(452, '101090901', '邢台'),
(453, '101090902', '临城'),
(454, '101090905', '柏乡'),
(455, '101090906', '隆尧'),
(456, '101090907', '南和'),
(457, '101090908', '宁晋'),
(458, '101090909', '巨鹿'),
(459, '101090910', '新河'),
(460, '101090911', '广宗'),
(461, '101090912', '平乡'),
(462, '101090913', '威县'),
(463, '101090914', '清河'),
(464, '101090915', '临西'),
(465, '101090916', '南宫'),
(466, '101090917', '沙河'),
(467, '101090918', '任县'),
(468, '101090919', '内丘'),
(469, '101091001', '邯郸'),
(470, '101091002', '峰峰矿'),
(471, '101091003', '临漳'),
(472, '101091004', '成安'),
(473, '101091005', '大名'),
(474, '101091006', '涉县'),
(475, '101091007', '磁县'),
(476, '101091008', '肥乡'),
(477, '101091009', '永年'),
(478, '101091010', '邱县'),
(479, '101091011', '鸡泽'),
(480, '101091012', '广平'),
(481, '101091013', '馆陶'),
(482, '101091014', '魏县'),
(483, '101091015', '曲周'),
(484, '101091016', '武安'),
(485, '101091101', '秦皇岛'),
(486, '101091102', '青龙'),
(487, '101091103', '昌黎'),
(488, '101091104', '抚宁'),
(489, '101091105', '卢龙'),
(490, '101100101', '太原'),
(491, '101100102', '清徐'),
(492, '101100103', '阳曲'),
(493, '101100104', '娄烦'),
(494, '101100105', '古交'),
(495, '101100201', '大同'),
(496, '101100202', '阳高'),
(497, '101100204', '天镇'),
(498, '101100205', '广灵'),
(499, '101100206', '灵丘'),
(500, '101100207', '浑源'),
(501, '101100208', '左云'),
(502, '101100301', '阳泉'),
(503, '101100302', '盂县'),
(504, '101100303', '平定'),
(505, '101100401', '晋中'),
(506, '101100403', '榆社'),
(507, '101100404', '左权'),
(508, '101100405', '和顺'),
(509, '101100406', '昔阳'),
(510, '101100407', '寿阳'),
(511, '101100408', '太谷'),
(512, '101100409', '祁县'),
(513, '101100410', '平遥'),
(514, '101100411', '灵石'),
(515, '101100412', '介休'),
(516, '101100501', '长治'),
(517, '101100502', '黎城'),
(518, '101100503', '屯留'),
(519, '101100504', '潞城'),
(520, '101100505', '襄垣'),
(521, '101100506', '平顺'),
(522, '101100507', '武乡'),
(523, '101100508', '沁县'),
(524, '101100509', '长子'),
(525, '101100510', '沁源'),
(526, '101100511', '壶关'),
(527, '101100601', '晋城'),
(528, '101100602', '沁水'),
(529, '101100603', '阳城'),
(530, '101100604', '陵川'),
(531, '101100605', '高平'),
(532, '101100606', '泽州'),
(533, '101100701', '临汾'),
(534, '101100702', '曲沃'),
(535, '101100703', '永和'),
(536, '101100704', '隰县'),
(537, '101100705', '大宁'),
(538, '101100706', '吉县'),
(539, '101100707', '襄汾'),
(540, '101100708', '蒲县'),
(541, '101100709', '汾西'),
(542, '101100710', '洪洞'),
(543, '101100711', '霍州'),
(544, '101100712', '乡宁'),
(545, '101100713', '翼城'),
(546, '101100714', '侯马'),
(547, '101100715', '浮山'),
(548, '101100716', '安泽'),
(549, '101100717', '古县'),
(550, '101100801', '运城'),
(551, '101100802', '临猗'),
(552, '101100803', '稷山'),
(553, '101100804', '万荣'),
(554, '101100805', '河津'),
(555, '101100806', '新绛'),
(556, '101100807', '绛县'),
(557, '101100808', '闻喜'),
(558, '101100809', '垣曲'),
(559, '101100810', '永济'),
(560, '101100811', '芮城'),
(561, '101100812', '夏县'),
(562, '101100813', '平陆'),
(563, '101100901', '朔州'),
(564, '101100903', '山阴'),
(565, '101100904', '右玉'),
(566, '101100905', '应县'),
(567, '101100906', '怀仁'),
(568, '101101001', '忻州'),
(569, '101101002', '定襄'),
(570, '101101003', '五台'),
(571, '101101004', '河曲'),
(572, '101101005', '偏关'),
(573, '101101006', '神池'),
(574, '101101007', '宁武'),
(575, '101101008', '代县'),
(576, '101101009', '繁峙'),
(577, '101101011', '保德'),
(578, '101101012', '静乐'),
(579, '101101013', '岢岚'),
(580, '101101014', '五寨'),
(581, '101101015', '原平'),
(582, '101101100', '吕梁'),
(583, '101101101', '离石'),
(584, '101101102', '临县'),
(585, '101101103', '兴县'),
(586, '101101104', '岚县'),
(587, '101101105', '柳林'),
(588, '101101106', '石楼'),
(589, '101101107', '方山'),
(590, '101101108', '交口'),
(591, '101101109', '中阳'),
(592, '101101110', '孝义'),
(593, '101101111', '汾阳'),
(594, '101101112', '文水'),
(595, '101101113', '交城'),
(596, '101110101', '西安'),
(597, '101110102', '长安'),
(598, '101110104', '蓝田'),
(599, '101110105', '周至'),
(600, '101110106', '户县'),
(601, '101110107', '高陵'),
(602, '101110200', '咸阳'),
(603, '101110201', '三原'),
(604, '101110202', '礼泉'),
(605, '101110203', '永寿'),
(606, '101110204', '淳化'),
(607, '101110205', '泾阳'),
(608, '101110206', '武功'),
(609, '101110207', '乾县'),
(610, '101110208', '彬县'),
(611, '101110209', '长武'),
(612, '101110210', '旬邑'),
(613, '101110211', '兴平'),
(614, '101110300', '延安'),
(615, '101110401', '榆林'),
(616, '101110402', '府谷'),
(617, '101110403', '神木'),
(618, '101110404', '佳县'),
(619, '101110405', '定边'),
(620, '101110406', '靖边'),
(621, '101110407', '横山'),
(622, '101110408', '米脂'),
(623, '101110409', '子洲'),
(624, '101110410', '绥德'),
(625, '101110411', '吴堡'),
(626, '101110412', '清涧'),
(627, '101110501', '渭南'),
(628, '101110502', '华县'),
(629, '101110503', '潼关'),
(630, '101110504', '大荔'),
(631, '101110505', '白水'),
(632, '101110506', '富平'),
(633, '101110507', '蒲城'),
(634, '101110508', '澄城'),
(635, '101110509', '合阳'),
(636, '101110510', '韩城'),
(637, '101110511', '华阴'),
(638, '101110601', '商洛'),
(639, '101110602', '洛南'),
(640, '101110603', '柞水'),
(641, '101110604', '商州'),
(642, '101110605', '镇安'),
(643, '101110606', '丹凤'),
(644, '101110607', '商南'),
(645, '101110608', '山阳'),
(646, '101110701', '安康'),
(647, '101110702', '紫阳'),
(648, '101110703', '石泉'),
(649, '101110704', '汉阴'),
(650, '101110705', '旬阳'),
(651, '101110706', '岚皋'),
(652, '101110707', '平利'),
(653, '101110708', '白河'),
(654, '101110709', '镇坪'),
(655, '101110710', '宁陕'),
(656, '101110801', '汉中'),
(657, '101110802', '略阳'),
(658, '101110803', '勉县'),
(659, '101110804', '留坝'),
(660, '101110805', '洋县'),
(661, '101110806', '城固'),
(662, '101110807', '西乡'),
(663, '101110808', '佛坪'),
(664, '101110809', '宁强'),
(665, '101110810', '南郑'),
(666, '101110811', '镇巴'),
(667, '101110901', '宝鸡'),
(668, '101110903', '千阳'),
(669, '101110904', '麟游'),
(670, '101110905', '岐山'),
(671, '101110906', '凤翔'),
(672, '101110907', '扶风'),
(673, '101110908', '眉县'),
(674, '101110909', '太白'),
(675, '101110910', '凤县'),
(676, '101110911', '陇县'),
(677, '101111001', '铜川'),
(678, '101111003', '宜君'),
(679, '101111101', '杨凌'),
(680, '101120101', '济南'),
(681, '101120103', '商河'),
(682, '101120104', '章丘'),
(683, '101120105', '平阴'),
(684, '101120106', '济阳'),
(685, '101120201', '青岛'),
(686, '101120204', '即墨'),
(687, '101120205', '胶州'),
(688, '101120206', '胶南'),
(689, '101120207', '莱西'),
(690, '101120208', '平度'),
(691, '101120301', '淄博'),
(692, '101120304', '高青'),
(693, '101120306', '沂源'),
(694, '101120307', '桓台'),
(695, '101120401', '德州'),
(696, '101120402', '武城'),
(697, '101120403', '临邑'),
(698, '101120404', '陵县'),
(699, '101120405', '齐河'),
(700, '101120406', '乐陵'),
(701, '101120407', '庆云'),
(702, '101120408', '平原'),
(703, '101120409', '宁津'),
(704, '101120410', '夏津'),
(705, '101120411', '禹城'),
(706, '101120501', '烟台'),
(707, '101120502', '莱州'),
(708, '101120503', '长岛'),
(709, '101120504', '蓬莱'),
(710, '101120505', '龙口'),
(711, '101120506', '招远'),
(712, '101120507', '栖霞'),
(713, '101120510', '莱阳'),
(714, '101120511', '海阳'),
(715, '101120601', '潍坊'),
(716, '101120602', '青州'),
(717, '101120603', '寿光'),
(718, '101120604', '临朐'),
(719, '101120605', '昌乐'),
(720, '101120606', '昌邑'),
(721, '101120607', '安丘'),
(722, '101120608', '高密'),
(723, '101120609', '诸城'),
(724, '101120701', '济宁'),
(725, '101120702', '嘉祥'),
(726, '101120703', '微山'),
(727, '101120704', '鱼台'),
(728, '101120705', '兖州'),
(729, '101120706', '金乡'),
(730, '101120707', '汶上'),
(731, '101120708', '泗水'),
(732, '101120709', '梁山'),
(733, '101120710', '曲阜'),
(734, '101120711', '邹城'),
(735, '101120801', '泰安'),
(736, '101120802', '新泰'),
(737, '101120804', '肥城'),
(738, '101120805', '东平'),
(739, '101120806', '宁阳'),
(740, '101120901', '临沂'),
(741, '101120902', '莒南'),
(742, '101120903', '沂南'),
(743, '101120904', '苍山'),
(744, '101120905', '临沭'),
(745, '101120906', '郯城'),
(746, '101120907', '蒙阴'),
(747, '101120908', '平邑'),
(748, '101120909', '费县'),
(749, '101120910', '沂水'),
(750, '101121001', '菏泽'),
(751, '101121002', '鄄城'),
(752, '101121003', '郓城'),
(753, '101121004', '东明'),
(754, '101121005', '定陶'),
(755, '101121006', '巨野'),
(756, '101121007', '曹县'),
(757, '101121008', '成武'),
(758, '101121009', '单县'),
(759, '101121101', '滨州'),
(760, '101121102', '博兴'),
(761, '101121103', '无棣'),
(762, '101121104', '阳信'),
(763, '101121105', '惠民'),
(764, '101121106', '沾化'),
(765, '101121107', '邹平'),
(766, '101121201', '东营'),
(767, '101121203', '垦利'),
(768, '101121204', '利津'),
(769, '101121205', '广饶'),
(770, '101121301', '威海'),
(771, '101121302', '文登'),
(772, '101121303', '荣成'),
(773, '101121304', '乳山'),
(774, '101121401', '枣庄'),
(775, '101121405', '滕州'),
(776, '101121501', '日照'),
(777, '101121502', '五莲'),
(778, '101121503', '莒县'),
(779, '101121601', '莱芜'),
(780, '101121701', '聊城'),
(781, '101121702', '冠县'),
(782, '101121703', '阳谷'),
(783, '101121704', '高唐'),
(784, '101121705', '茌平'),
(785, '101121706', '东阿'),
(786, '101121707', '临清'),
(787, '101121709', '莘县'),
(788, '101130101', '乌鲁木齐'),
(789, '101130105', '达坂城'),
(790, '101130201', '克拉玛依'),
(791, '101130202', '乌尔禾'),
(792, '101130203', '白碱滩'),
(793, '101130301', '石河子'),
(794, '101130401', '昌吉'),
(795, '101130402', '呼图壁'),
(796, '101130403', '米泉'),
(797, '101130404', '阜康'),
(798, '101130405', '吉木萨尔'),
(799, '101130406', '奇台'),
(800, '101130407', '玛纳斯'),
(801, '101130408', '木垒'),
(802, '101130501', '吐鲁番'),
(803, '101130503', '克州'),
(804, '101130504', '鄯善'),
(805, '101130601', '库尔勒'),
(806, '101130602', '轮台'),
(807, '101130603', '尉犁'),
(808, '101130604', '若羌'),
(809, '101130605', '且末'),
(810, '101130606', '和静'),
(811, '101130607', '焉耆'),
(812, '101130608', '和硕'),
(813, '101130612', '博湖'),
(814, '101130701', '阿拉尔'),
(815, '101130801', '阿克苏'),
(816, '101130802', '乌什'),
(817, '101130803', '温宿'),
(818, '101130804', '拜城'),
(819, '101130805', '新和'),
(820, '101130806', '沙雅'),
(821, '101130807', '库车'),
(822, '101130808', '柯坪'),
(823, '101130809', '阿瓦提'),
(824, '101130901', '喀什'),
(825, '101130902', '英吉沙'),
(826, '101130903', '塔什库尔干'),
(827, '101130904', '麦盖提'),
(828, '101130905', '莎车'),
(829, '101130906', '叶城'),
(830, '101130907', '泽普'),
(831, '101130908', '巴楚'),
(832, '101130909', '岳普湖'),
(833, '101130910', '伽师'),
(834, '101130911', '疏附'),
(835, '101130912', '疏勒'),
(836, '101131001', '伊宁'),
(837, '101131002', '察布查尔'),
(838, '101131003', '尼勒克'),
(839, '101131005', '巩留'),
(840, '101131006', '新源'),
(841, '101131007', '昭苏'),
(842, '101131008', '特克斯'),
(843, '101131009', '霍城'),
(844, '101131011', '奎屯'),
(845, '101131101', '塔城'),
(846, '101131102', '裕民'),
(847, '101131103', '额敏'),
(848, '101131104', '和布克赛尔'),
(849, '101131105', '托里'),
(850, '101131106', '乌苏'),
(851, '101131107', '沙湾'),
(852, '101131201', '哈密'),
(853, '101131203', '巴里坤'),
(854, '101131204', '伊吾'),
(855, '101131301', '和田'),
(856, '101131302', '皮山'),
(857, '101131303', '策勒'),
(858, '101131304', '墨玉'),
(859, '101131305', '洛浦'),
(860, '101131306', '民丰'),
(861, '101131307', '于田'),
(862, '101131401', '阿勒泰'),
(863, '101131402', '哈巴河'),
(864, '101131405', '吉木乃'),
(865, '101131406', '布尔津'),
(866, '101131407', '福海'),
(867, '101131408', '富蕴'),
(868, '101131409', '青河'),
(869, '101131501', '阿图什'),
(870, '101131502', '乌恰'),
(871, '101131503', '阿克陶'),
(872, '101131504', '阿合奇'),
(873, '101131601', '博乐'),
(874, '101131602', '温泉'),
(875, '101131603', '精河'),
(876, '101140101', '拉萨'),
(877, '101140102', '当雄'),
(878, '101140103', '尼木'),
(879, '101140104', '林周'),
(880, '101140105', '堆龙德庆'),
(881, '101140106', '曲水'),
(882, '101140107', '达孜'),
(883, '101140108', '墨竹工卡'),
(884, '101140201', '日喀则'),
(885, '101140202', '拉孜'),
(886, '101140204', '聂拉木'),
(887, '101140205', '定日'),
(888, '101140206', '江孜'),
(889, '101140208', '仲巴'),
(890, '101140209', '萨嘎'),
(891, '101140210', '吉隆'),
(892, '101140211', '昂仁'),
(893, '101140212', '定结'),
(894, '101140213', '萨迦'),
(895, '101140214', '谢通门'),
(896, '101140215', '楠木林'),
(897, '101140216', '岗巴'),
(898, '101140217', '白朗'),
(899, '101140218', '亚东'),
(900, '101140219', '康马'),
(901, '101140220', '仁布'),
(902, '101140301', '山南'),
(903, '101140302', '贡嘎'),
(904, '101140303', '札囊'),
(905, '101140304', '加查'),
(906, '101140305', '浪卡子'),
(907, '101140306', '错那'),
(908, '101140307', '隆子'),
(909, '101140309', '乃东'),
(910, '101140310', '桑日'),
(911, '101140311', '洛扎'),
(912, '101140312', '措美'),
(913, '101140313', '琼结'),
(914, '101140314', '曲松'),
(915, '101140401', '林芝'),
(916, '101140402', '波密'),
(917, '101140403', '米林'),
(918, '101140404', '察隅'),
(919, '101140405', '工布江达'),
(920, '101140406', '朗县'),
(921, '101140407', '墨脱'),
(922, '101140501', '昌都'),
(923, '101140502', '丁青'),
(924, '101140503', '边坝'),
(925, '101140504', '洛隆'),
(926, '101140505', '左贡'),
(927, '101140506', '芒康'),
(928, '101140507', '类乌齐'),
(929, '101140508', '八宿'),
(930, '101140509', '江达'),
(931, '101140510', '察雅'),
(932, '101140511', '贡觉'),
(933, '101140601', '那曲'),
(934, '101140602', '尼玛'),
(935, '101140603', '嘉黎'),
(936, '101140604', '班戈'),
(937, '101140605', '安多'),
(938, '101140606', '索县'),
(939, '101140607', '聂荣'),
(940, '101140608', '巴青'),
(941, '101140609', '比如'),
(942, '101140610', '双湖'),
(943, '101140701', '阿里'),
(944, '101140702', '改则'),
(945, '101140703', '申扎'),
(946, '101140705', '普兰'),
(947, '101140706', '札达'),
(948, '101140707', '噶尔'),
(949, '101140708', '日土'),
(950, '101140709', '革吉'),
(951, '101140710', '措勤'),
(952, '101150101', '西宁'),
(953, '101150102', '大通'),
(954, '101150103', '湟源'),
(955, '101150104', '湟中'),
(956, '101150201', '海东'),
(957, '101150202', '乐都'),
(958, '101150203', '民和'),
(959, '101150204', '互助'),
(960, '101150205', '化隆'),
(961, '101150206', '循化'),
(962, '101150208', '平安'),
(963, '101150301', '黄南'),
(964, '101150302', '尖扎'),
(965, '101150303', '泽库'),
(966, '101150305', '同仁'),
(967, '101150401', '海南'),
(968, '101150404', '贵德'),
(969, '101150406', '兴海'),
(970, '101150407', '贵南'),
(971, '101150408', '同德'),
(972, '101150409', '共和'),
(973, '101150501', '果洛'),
(974, '101150502', '班玛'),
(975, '101150503', '甘德'),
(976, '101150504', '达日'),
(977, '101150505', '久治'),
(978, '101150506', '玛多'),
(979, '101150508', '玛沁'),
(980, '101150601', '玉树'),
(981, '101150602', '称多'),
(982, '101150603', '治多'),
(983, '101150604', '杂多'),
(984, '101150605', '囊谦'),
(985, '101150606', '曲麻莱'),
(986, '101150701', '海西'),
(987, '101150708', '天峻'),
(988, '101150709', '乌兰'),
(989, '101150716', '德令哈'),
(990, '101150801', '海北'),
(991, '101150802', '门源'),
(992, '101150803', '祁连'),
(993, '101150804', '海晏'),
(994, '101150806', '刚察'),
(995, '101150901', '格尔木'),
(996, '101150902', '都兰'),
(997, '101160101', '兰州'),
(998, '101160102', '皋兰'),
(999, '101160103', '永登'),
(1000, '101160104', '榆中'),
(1001, '101160201', '定西'),
(1002, '101160202', '通渭'),
(1003, '101160203', '陇西'),
(1004, '101160204', '渭源'),
(1005, '101160205', '临洮'),
(1006, '101160206', '漳县'),
(1007, '101160207', '岷县'),
(1008, '101160301', '平凉'),
(1009, '101160302', '泾川'),
(1010, '101160303', '灵台'),
(1011, '101160304', '崇信'),
(1012, '101160305', '华亭'),
(1013, '101160306', '庄浪'),
(1014, '101160307', '静宁'),
(1015, '101160401', '庆阳'),
(1016, '101160402', '西峰'),
(1017, '101160403', '环县'),
(1018, '101160404', '华池'),
(1019, '101160405', '合水'),
(1020, '101160406', '正宁'),
(1021, '101160407', '宁县'),
(1022, '101160408', '镇原'),
(1023, '101160409', '庆城'),
(1024, '101160501', '武威'),
(1025, '101160502', '民勤'),
(1026, '101160503', '古浪'),
(1027, '101160505', '天祝'),
(1028, '101160601', '金昌'),
(1029, '101160602', '永昌'),
(1030, '101160701', '张掖'),
(1031, '101160702', '肃南'),
(1032, '101160703', '民乐'),
(1033, '101160704', '临泽'),
(1034, '101160705', '高台'),
(1035, '101160706', '山丹'),
(1036, '101160801', '酒泉'),
(1037, '101160803', '金塔'),
(1038, '101160804', '阿克塞'),
(1039, '101160805', '瓜州'),
(1040, '101160806', '肃北'),
(1041, '101160807', '玉门'),
(1042, '101160808', '敦煌'),
(1043, '101160901', '天水'),
(1044, '101160903', '清水'),
(1045, '101160904', '秦安'),
(1046, '101160905', '甘谷'),
(1047, '101160906', '武山'),
(1048, '101160907', '张家川'),
(1049, '101161001', '陇南'),
(1050, '101161002', '成县'),
(1051, '101161003', '文县'),
(1052, '101161004', '宕昌'),
(1053, '101161005', '康县'),
(1054, '101161006', '西和'),
(1055, '101161007', '礼县'),
(1056, '101161008', '徽县'),
(1057, '101161009', '两当'),
(1058, '101161101', '临夏'),
(1059, '101161102', '康乐'),
(1060, '101161103', '永靖'),
(1061, '101161104', '广河'),
(1062, '101161105', '和政'),
(1063, '101161107', '积石山'),
(1064, '101161201', '合作'),
(1065, '101161202', '临潭'),
(1066, '101161203', '卓尼'),
(1067, '101161204', '舟曲'),
(1068, '101161205', '迭部'),
(1069, '101161206', '玛曲'),
(1070, '101161207', '碌曲'),
(1071, '101161208', '夏河'),
(1072, '101161301', '白银'),
(1073, '101161302', '靖远'),
(1074, '101161303', '会宁'),
(1075, '101161304', '平川'),
(1076, '101161305', '景泰'),
(1077, '101161401', '嘉峪关'),
(1078, '101170101', '银川'),
(1079, '101170102', '永宁'),
(1080, '101170103', '灵武'),
(1081, '101170104', '贺兰'),
(1082, '101170201', '石嘴山'),
(1083, '101170203', '平罗'),
(1084, '101170301', '吴忠'),
(1085, '101170302', '同心'),
(1086, '101170303', '盐池'),
(1087, '101170306', '青铜峡'),
(1088, '101170401', '固原'),
(1089, '101170402', '西吉'),
(1090, '101170403', '隆德'),
(1091, '101170404', '泾源'),
(1092, '101170406', '彭阳'),
(1093, '101170501', '中卫'),
(1094, '101170502', '中宁'),
(1095, '101170504', '海原'),
(1096, '101180101', '郑州'),
(1097, '101180102', '巩义'),
(1098, '101180103', '荥阳'),
(1099, '101180104', '登封'),
(1100, '101180105', '新密'),
(1101, '101180106', '新郑'),
(1102, '101180107', '中牟'),
(1103, '101180108', '上街'),
(1104, '101180201', '安阳'),
(1105, '101180202', '汤阴'),
(1106, '101180203', '滑县'),
(1107, '101180204', '内黄'),
(1108, '101180205', '林州'),
(1109, '101180301', '新乡'),
(1110, '101180302', '获嘉'),
(1111, '101180303', '原阳'),
(1112, '101180304', '辉县'),
(1113, '101180305', '卫辉'),
(1114, '101180306', '延津'),
(1115, '101180307', '封丘'),
(1116, '101180308', '长垣'),
(1117, '101180401', '许昌'),
(1118, '101180402', '鄢陵'),
(1119, '101180403', '襄城'),
(1120, '101180404', '长葛'),
(1121, '101180405', '禹州'),
(1122, '101180501', '平顶山'),
(1123, '101180502', '郏县'),
(1124, '101180503', '宝丰'),
(1125, '101180504', '汝州'),
(1126, '101180505', '叶县'),
(1127, '101180506', '舞钢'),
(1128, '101180507', '鲁山'),
(1129, '101180508', '石龙'),
(1130, '101180601', '信阳'),
(1131, '101180602', '息县'),
(1132, '101180603', '罗山'),
(1133, '101180604', '光山'),
(1134, '101180605', '新县'),
(1135, '101180606', '淮滨'),
(1136, '101180607', '潢川'),
(1137, '101180608', '固始'),
(1138, '101180609', '商城'),
(1139, '101180701', '南阳'),
(1140, '101180702', '南召'),
(1141, '101180703', '方城'),
(1142, '101180704', '社旗'),
(1143, '101180705', '西峡'),
(1144, '101180706', '内乡'),
(1145, '101180707', '镇平'),
(1146, '101180708', '淅川'),
(1147, '101180709', '新野'),
(1148, '101180710', '唐河'),
(1149, '101180711', '邓州'),
(1150, '101180712', '桐柏'),
(1151, '101180801', '开封'),
(1152, '101180802', '杞县'),
(1153, '101180803', '尉氏'),
(1154, '101180804', '通许'),
(1155, '101180805', '兰考'),
(1156, '101180901', '洛阳'),
(1157, '101180902', '新安'),
(1158, '101180903', '孟津'),
(1159, '101180904', '宜阳'),
(1160, '101180905', '洛宁'),
(1161, '101180906', '伊川'),
(1162, '101180907', '嵩县'),
(1163, '101180908', '偃师'),
(1164, '101180909', '栾川'),
(1165, '101180910', '汝阳'),
(1166, '101180911', '吉利'),
(1167, '101181001', '商丘'),
(1168, '101181003', '睢县'),
(1169, '101181004', '民权'),
(1170, '101181005', '虞城'),
(1171, '101181006', '柘城'),
(1172, '101181007', '宁陵'),
(1173, '101181008', '夏邑'),
(1174, '101181009', '永城'),
(1175, '101181101', '焦作'),
(1176, '101181102', '修武'),
(1177, '101181103', '武陟'),
(1178, '101181104', '沁阳'),
(1179, '101181106', '博爱'),
(1180, '101181107', '温县'),
(1181, '101181108', '孟州'),
(1182, '101181201', '鹤壁'),
(1183, '101181202', '浚县'),
(1184, '101181203', '淇县'),
(1185, '101181301', '濮阳'),
(1186, '101181302', '台前'),
(1187, '101181303', '南乐'),
(1188, '101181304', '清丰'),
(1189, '101181305', '范县'),
(1190, '101181401', '周口'),
(1191, '101181402', '扶沟'),
(1192, '101181403', '太康'),
(1193, '101181404', '淮阳'),
(1194, '101181405', '西华'),
(1195, '101181406', '商水'),
(1196, '101181407', '项城'),
(1197, '101181408', '郸城'),
(1198, '101181409', '鹿邑'),
(1199, '101181410', '沈丘'),
(1200, '101181501', '漯河'),
(1201, '101181502', '临颍'),
(1202, '101181503', '舞阳'),
(1203, '101181504', '临颖'),
(1204, '101181601', '驻马店'),
(1205, '101181602', '西平'),
(1206, '101181603', '遂平'),
(1207, '101181604', '上蔡'),
(1208, '101181605', '汝南'),
(1209, '101181606', '泌阳'),
(1210, '101181607', '平舆'),
(1211, '101181608', '新蔡'),
(1212, '101181609', '确山'),
(1213, '101181610', '正阳'),
(1214, '101181701', '三门峡'),
(1215, '101181702', '灵宝'),
(1216, '101181703', '渑池'),
(1217, '101181704', '卢氏'),
(1218, '101181705', '义马'),
(1219, '101181706', '陕县'),
(1220, '101181801', '济源'),
(1221, '101190101', '南京'),
(1222, '101190102', '溧水'),
(1223, '101190103', '高淳'),
(1224, '101190104', '江宁'),
(1225, '101190105', '六合'),
(1226, '101190107', '浦口'),
(1227, '101190201', '无锡'),
(1228, '101190202', '江阴'),
(1229, '101190203', '宜兴'),
(1230, '101190204', '锡山'),
(1231, '101190301', '镇江'),
(1232, '101190302', '丹阳'),
(1233, '101190303', '扬中'),
(1234, '101190304', '句容'),
(1235, '101190305', '丹徒'),
(1236, '101190401', '苏州'),
(1237, '101190402', '常熟'),
(1238, '101190403', '张家港'),
(1239, '101190404', '昆山'),
(1240, '101190405', '吴中'),
(1241, '101190407', '吴江'),
(1242, '101190408', '太仓'),
(1243, '101190501', '南通'),
(1244, '101190502', '海安'),
(1245, '101190503', '如皋'),
(1246, '101190504', '如东'),
(1247, '101190507', '启东'),
(1248, '101190508', '海门'),
(1249, '101190601', '扬州'),
(1250, '101190602', '宝应'),
(1251, '101190603', '仪征'),
(1252, '101190604', '高邮'),
(1253, '101190605', '江都'),
(1254, '101190606', '邗江'),
(1255, '101190701', '盐城'),
(1256, '101190702', '响水'),
(1257, '101190703', '滨海'),
(1258, '101190704', '阜宁'),
(1259, '101190705', '射阳'),
(1260, '101190706', '建湖'),
(1261, '101190707', '东台'),
(1262, '101190708', '大丰'),
(1263, '101190709', '盐都'),
(1264, '101190801', '徐州'),
(1265, '101190802', '铜山'),
(1266, '101190803', '丰县'),
(1267, '101190804', '沛县'),
(1268, '101190805', '邳州'),
(1269, '101190806', '睢宁'),
(1270, '101190807', '新沂'),
(1271, '101190901', '淮安'),
(1272, '101190902', '金湖'),
(1273, '101190903', '盱眙'),
(1274, '101190904', '洪泽'),
(1275, '101190905', '涟水'),
(1276, '101191001', '连云港'),
(1277, '101191002', '东海'),
(1278, '101191003', '赣榆'),
(1279, '101191004', '灌云'),
(1280, '101191005', '灌南'),
(1281, '101191101', '常州'),
(1282, '101191102', '溧阳'),
(1283, '101191103', '金坛'),
(1284, '101191104', '武进'),
(1285, '101191201', '泰州'),
(1286, '101191202', '兴化'),
(1287, '101191203', '泰兴'),
(1288, '101191204', '姜堰'),
(1289, '101191205', '靖江'),
(1290, '101191301', '宿迁'),
(1291, '101191302', '沭阳'),
(1292, '101191303', '泗阳'),
(1293, '101191304', '泗洪'),
(1294, '101191305', '宿豫'),
(1295, '101200101', '武汉'),
(1296, '101200102', '蔡甸'),
(1297, '101200103', '黄陂'),
(1298, '101200104', '新洲'),
(1299, '101200105', '江夏'),
(1300, '101200106', '东西湖'),
(1301, '101200201', '襄阳'),
(1302, '101200202', '襄州'),
(1303, '101200203', '保康'),
(1304, '101200204', '南漳'),
(1305, '101200205', '宜城'),
(1306, '101200206', '老河口'),
(1307, '101200207', '谷城'),
(1308, '101200208', '枣阳'),
(1309, '101200301', '鄂州'),
(1310, '101200302', '梁子湖'),
(1311, '101200401', '孝感'),
(1312, '101200402', '安陆'),
(1313, '101200403', '云梦'),
(1314, '101200404', '大悟'),
(1315, '101200405', '应城'),
(1316, '101200406', '汉川'),
(1317, '101200407', '孝昌'),
(1318, '101200501', '黄冈'),
(1319, '101200502', '红安'),
(1320, '101200503', '麻城'),
(1321, '101200504', '罗田'),
(1322, '101200505', '英山'),
(1323, '101200506', '浠水'),
(1324, '101200507', '蕲春'),
(1325, '101200508', '黄梅'),
(1326, '101200509', '武穴'),
(1327, '101200510', '团风'),
(1328, '101200601', '黄石'),
(1329, '101200602', '大冶'),
(1330, '101200603', '阳新'),
(1331, '101200604', '铁山'),
(1332, '101200605', '下陆'),
(1333, '101200606', '西塞山'),
(1334, '101200701', '咸宁'),
(1335, '101200702', '赤壁'),
(1336, '101200703', '嘉鱼'),
(1337, '101200704', '崇阳'),
(1338, '101200705', '通城'),
(1339, '101200706', '通山'),
(1340, '101200801', '荆州'),
(1341, '101200802', '江陵'),
(1342, '101200803', '公安'),
(1343, '101200804', '石首'),
(1344, '101200805', '监利'),
(1345, '101200806', '洪湖'),
(1346, '101200807', '松滋'),
(1347, '101200901', '宜昌'),
(1348, '101200902', '远安'),
(1349, '101200903', '秭归'),
(1350, '101200904', '兴山'),
(1351, '101200906', '五峰'),
(1352, '101200907', '当阳'),
(1353, '101200908', '长阳'),
(1354, '101200909', '宜都'),
(1355, '101200910', '枝江'),
(1356, '101201001', '恩施'),
(1357, '101201002', '利川'),
(1358, '101201003', '建始'),
(1359, '101201004', '咸丰'),
(1360, '101201005', '宣恩'),
(1361, '101201006', '鹤峰'),
(1362, '101201007', '来凤'),
(1363, '101201008', '巴东'),
(1364, '101201101', '十堰'),
(1365, '101201102', '竹溪'),
(1366, '101201103', '郧西'),
(1367, '101201104', '郧县'),
(1368, '101201105', '竹山'),
(1369, '101201106', '房县'),
(1370, '101201107', '丹江口'),
(1371, '101201108', '茅箭'),
(1372, '101201109', '张湾'),
(1373, '101201201', '神农架'),
(1374, '101201301', '随州'),
(1375, '101201302', '广水'),
(1376, '101201401', '荆门'),
(1377, '101201402', '钟祥'),
(1378, '101201403', '京山'),
(1379, '101201404', '掇刀'),
(1380, '101201405', '沙洋'),
(1381, '101201406', '沙市'),
(1382, '101201501', '天门'),
(1383, '101201601', '仙桃'),
(1384, '101201701', '潜江'),
(1385, '101210101', '杭州'),
(1386, '101210102', '萧山'),
(1387, '101210103', '桐庐'),
(1388, '101210104', '淳安'),
(1389, '101210105', '建德'),
(1390, '101210106', '余杭'),
(1391, '101210107', '临安'),
(1392, '101210108', '富阳'),
(1393, '101210201', '湖州'),
(1394, '101210202', '长兴'),
(1395, '101210203', '安吉'),
(1396, '101210204', '德清'),
(1397, '101210301', '嘉兴'),
(1398, '101210302', '嘉善'),
(1399, '101210303', '海宁'),
(1400, '101210304', '桐乡'),
(1401, '101210305', '平湖'),
(1402, '101210306', '海盐'),
(1403, '101210401', '宁波'),
(1404, '101210403', '慈溪'),
(1405, '101210404', '余姚'),
(1406, '101210405', '奉化'),
(1407, '101210406', '象山'),
(1408, '101210408', '宁海'),
(1409, '101210410', '北仑'),
(1410, '101210411', '鄞州'),
(1411, '101210501', '绍兴'),
(1412, '101210502', '诸暨'),
(1413, '101210503', '上虞'),
(1414, '101210504', '新昌'),
(1415, '101210505', '嵊州'),
(1416, '101210601', '台州'),
(1417, '101210603', '玉环'),
(1418, '101210604', '三门'),
(1419, '101210605', '天台'),
(1420, '101210606', '仙居'),
(1421, '101210607', '温岭'),
(1422, '101210610', '临海'),
(1423, '101210701', '温州'),
(1424, '101210702', '泰顺'),
(1425, '101210703', '文成'),
(1426, '101210704', '平阳'),
(1427, '101210705', '瑞安'),
(1428, '101210706', '洞头'),
(1429, '101210707', '乐清'),
(1430, '101210708', '永嘉'),
(1431, '101210709', '苍南'),
(1432, '101210801', '丽水'),
(1433, '101210802', '遂昌'),
(1434, '101210803', '龙泉'),
(1435, '101210804', '缙云'),
(1436, '101210805', '青田'),
(1437, '101210806', '云和'),
(1438, '101210807', '庆元'),
(1439, '101210808', '松阳'),
(1440, '101210809', '景宁'),
(1441, '101210901', '金华'),
(1442, '101210902', '浦江'),
(1443, '101210903', '兰溪'),
(1444, '101210904', '义乌'),
(1445, '101210905', '东阳'),
(1446, '101210906', '武义'),
(1447, '101210907', '永康'),
(1448, '101210908', '磐安'),
(1449, '101211001', '衢州'),
(1450, '101211002', '常山'),
(1451, '101211003', '开化'),
(1452, '101211004', '龙游'),
(1453, '101211005', '江山'),
(1454, '101211101', '舟山'),
(1455, '101211102', '嵊泗'),
(1456, '101211104', '岱山'),
(1457, '101220101', '合肥'),
(1458, '101220102', '长丰'),
(1459, '101220103', '肥东'),
(1460, '101220104', '肥西'),
(1461, '101220201', '蚌埠'),
(1462, '101220202', '怀远'),
(1463, '101220203', '固镇'),
(1464, '101220204', '五河'),
(1465, '101220301', '芜湖'),
(1466, '101220302', '繁昌'),
(1467, '101220304', '南陵'),
(1468, '101220401', '淮南'),
(1469, '101220402', '凤台'),
(1470, '101220403', '潘集'),
(1471, '101220501', '马鞍山'),
(1472, '101220502', '当涂'),
(1473, '101220601', '安庆'),
(1474, '101220602', '枞阳'),
(1475, '101220603', '太湖'),
(1476, '101220604', '潜山'),
(1477, '101220605', '怀宁'),
(1478, '101220606', '宿松'),
(1479, '101220607', '望江'),
(1480, '101220608', '岳西'),
(1481, '101220609', '桐城'),
(1482, '101220701', '宿州'),
(1483, '101220702', '砀山'),
(1484, '101220703', '灵璧'),
(1485, '101220704', '泗县'),
(1486, '101220705', '萧县'),
(1487, '101220801', '阜阳'),
(1488, '101220802', '阜南'),
(1489, '101220803', '颍上'),
(1490, '101220804', '临泉'),
(1491, '101220805', '界首'),
(1492, '101220806', '太和'),
(1493, '101220901', '亳州'),
(1494, '101220902', '涡阳'),
(1495, '101220903', '利辛'),
(1496, '101220904', '蒙城'),
(1497, '101221001', '黄山'),
(1498, '101221004', '祁门'),
(1499, '101221005', '黟县'),
(1500, '101221006', '歙县'),
(1501, '101221007', '休宁'),
(1502, '101221101', '滁州'),
(1503, '101221102', '凤阳'),
(1504, '101221103', '明光'),
(1505, '101221104', '定远'),
(1506, '101221105', '全椒'),
(1507, '101221106', '来安'),
(1508, '101221107', '天长'),
(1509, '101221201', '淮北'),
(1510, '101221202', '濉溪'),
(1511, '101221301', '铜陵'),
(1512, '101221401', '宣城'),
(1513, '101221402', '泾县'),
(1514, '101221403', '旌德'),
(1515, '101221404', '宁国'),
(1516, '101221405', '绩溪'),
(1517, '101221406', '广德'),
(1518, '101221407', '郎溪'),
(1519, '101221501', '六安'),
(1520, '101221502', '霍邱'),
(1521, '101221503', '寿县'),
(1522, '101221505', '金寨'),
(1523, '101221506', '霍山'),
(1524, '101221507', '舒城'),
(1525, '101221601', '巢湖'),
(1526, '101221602', '庐江'),
(1527, '101221603', '无为'),
(1528, '101221604', '含山'),
(1529, '101221605', '和县'),
(1530, '101221701', '池州'),
(1531, '101221702', '东至'),
(1532, '101221703', '青阳'),
(1533, '101221705', '石台'),
(1534, '101230101', '福州'),
(1535, '101230102', '闽清'),
(1536, '101230103', '闽侯'),
(1537, '101230104', '罗源'),
(1538, '101230105', '连江'),
(1539, '101230107', '永泰'),
(1540, '101230108', '平潭'),
(1541, '101230110', '长乐'),
(1542, '101230111', '福清'),
(1543, '101230201', '厦门'),
(1544, '101230301', '宁德'),
(1545, '101230302', '古田'),
(1546, '101230303', '霞浦'),
(1547, '101230304', '寿宁'),
(1548, '101230305', '周宁'),
(1549, '101230306', '福安'),
(1550, '101230307', '柘荣'),
(1551, '101230308', '福鼎'),
(1552, '101230309', '屏南'),
(1553, '101230401', '莆田'),
(1554, '101230402', '仙游'),
(1555, '101230404', '涵江'),
(1556, '101230405', '秀屿'),
(1557, '101230406', '荔城'),
(1558, '101230407', '城厢'),
(1559, '101230501', '泉州'),
(1560, '101230502', '安溪'),
(1561, '101230504', '永春'),
(1562, '101230505', '德化'),
(1563, '101230506', '南安'),
(1564, '101230508', '惠安'),
(1565, '101230509', '晋江'),
(1566, '101230510', '石狮'),
(1567, '101230601', '漳州'),
(1568, '101230602', '长泰'),
(1569, '101230603', '南靖'),
(1570, '101230604', '平和'),
(1571, '101230605', '龙海'),
(1572, '101230606', '漳浦'),
(1573, '101230607', '诏安'),
(1574, '101230609', '云霄'),
(1575, '101230610', '华安'),
(1576, '101230701', '龙岩'),
(1577, '101230702', '长汀'),
(1578, '101230703', '连城'),
(1579, '101230704', '武平'),
(1580, '101230705', '上杭'),
(1581, '101230706', '永定'),
(1582, '101230707', '漳平'),
(1583, '101230801', '三明'),
(1584, '101230802', '宁化'),
(1585, '101230803', '清流'),
(1586, '101230804', '泰宁'),
(1587, '101230805', '将乐'),
(1588, '101230806', '建宁'),
(1589, '101230807', '明溪'),
(1590, '101230808', '沙县'),
(1591, '101230809', '尤溪'),
(1592, '101230810', '永安'),
(1593, '101230811', '大田'),
(1594, '101230901', '南平'),
(1595, '101230902', '顺昌'),
(1596, '101230903', '光泽'),
(1597, '101230904', '邵武'),
(1598, '101230905', '武夷山'),
(1599, '101230906', '浦城'),
(1600, '101230907', '建阳'),
(1601, '101230908', '松溪'),
(1602, '101230909', '政和'),
(1603, '101230910', '建瓯'),
(1604, '101231001', '钓鱼岛'),
(1605, '101240101', '南昌'),
(1606, '101240102', '新建'),
(1607, '101240104', '安义'),
(1608, '101240105', '进贤'),
(1609, '101240201', '九江'),
(1610, '101240202', '瑞昌'),
(1611, '101240204', '武宁'),
(1612, '101240205', '德安'),
(1613, '101240206', '永修'),
(1614, '101240207', '湖口'),
(1615, '101240208', '彭泽'),
(1616, '101240209', '星子'),
(1617, '101240210', '都昌'),
(1618, '101240212', '修水'),
(1619, '101240301', '上饶'),
(1620, '101240302', '鄱阳'),
(1621, '101240303', '婺源'),
(1622, '101240305', '余干'),
(1623, '101240306', '万年'),
(1624, '101240307', '德兴'),
(1625, '101240309', '弋阳'),
(1626, '101240310', '横峰'),
(1627, '101240311', '铅山'),
(1628, '101240312', '玉山'),
(1629, '101240313', '广丰'),
(1630, '101240401', '抚州'),
(1631, '101240402', '广昌'),
(1632, '101240403', '乐安'),
(1633, '101240404', '崇仁'),
(1634, '101240405', '金溪'),
(1635, '101240406', '资溪'),
(1636, '101240407', '宜黄'),
(1637, '101240408', '南城'),
(1638, '101240409', '南丰'),
(1639, '101240410', '黎川'),
(1640, '101240411', '东乡'),
(1641, '101240501', '宜春'),
(1642, '101240502', '铜鼓'),
(1643, '101240503', '宜丰'),
(1644, '101240504', '万载'),
(1645, '101240505', '上高'),
(1646, '101240506', '靖安'),
(1647, '101240507', '奉新'),
(1648, '101240508', '高安'),
(1649, '101240509', '樟树'),
(1650, '101240510', '丰城'),
(1651, '101240601', '吉安'),
(1652, '101240603', '吉水'),
(1653, '101240604', '新干'),
(1654, '101240605', '峡江'),
(1655, '101240606', '永丰'),
(1656, '101240607', '永新'),
(1657, '101240608', '井冈山'),
(1658, '101240609', '万安'),
(1659, '101240610', '遂川'),
(1660, '101240611', '泰和'),
(1661, '101240612', '安福'),
(1662, '101240701', '赣州'),
(1663, '101240702', '崇义'),
(1664, '101240703', '上犹'),
(1665, '101240704', '南康'),
(1666, '101240705', '大余'),
(1667, '101240706', '信丰'),
(1668, '101240707', '宁都'),
(1669, '101240708', '石城'),
(1670, '101240709', '瑞金'),
(1671, '101240710', '于都'),
(1672, '101240711', '会昌'),
(1673, '101240712', '安远'),
(1674, '101240713', '全南'),
(1675, '101240714', '龙南'),
(1676, '101240715', '定南'),
(1677, '101240716', '寻乌'),
(1678, '101240717', '兴国'),
(1679, '101240718', '赣县'),
(1680, '101240801', '景德镇'),
(1681, '101240802', '乐平'),
(1682, '101240803', '浮梁'),
(1683, '101240901', '萍乡'),
(1684, '101240902', '莲花'),
(1685, '101240903', '上栗'),
(1686, '101240905', '芦溪'),
(1687, '101240906', '湘东'),
(1688, '101241001', '新余'),
(1689, '101241002', '分宜'),
(1690, '101241101', '鹰潭'),
(1691, '101241102', '余江'),
(1692, '101241103', '贵溪'),
(1693, '101250101', '长沙'),
(1694, '101250102', '宁乡'),
(1695, '101250103', '浏阳'),
(1696, '101250105', '望城'),
(1697, '101250201', '湘潭'),
(1698, '101250202', '韶山'),
(1699, '101250203', '湘乡'),
(1700, '101250301', '株洲'),
(1701, '101250302', '攸县'),
(1702, '101250303', '醴陵'),
(1703, '101250305', '茶陵'),
(1704, '101250306', '炎陵'),
(1705, '101250401', '衡阳'),
(1706, '101250402', '衡山'),
(1707, '101250403', '衡东'),
(1708, '101250404', '祁东'),
(1709, '101250406', '常宁'),
(1710, '101250407', '衡南'),
(1711, '101250408', '耒阳'),
(1712, '101250501', '郴州'),
(1713, '101250502', '桂阳'),
(1714, '101250503', '嘉禾'),
(1715, '101250504', '宜章'),
(1716, '101250505', '临武'),
(1717, '101250507', '资兴'),
(1718, '101250508', '汝城'),
(1719, '101250509', '安仁'),
(1720, '101250510', '永兴'),
(1721, '101250511', '桂东'),
(1722, '101250512', '苏仙'),
(1723, '101250601', '常德'),
(1724, '101250602', '安乡'),
(1725, '101250603', '桃源'),
(1726, '101250604', '汉寿'),
(1727, '101250605', '澧县'),
(1728, '101250606', '临澧'),
(1729, '101250607', '石门'),
(1730, '101250608', '津市'),
(1731, '101250700', '益阳'),
(1732, '101250702', '南县'),
(1733, '101250703', '桃江'),
(1734, '101250704', '安化'),
(1735, '101250705', '沅江'),
(1736, '101250801', '娄底'),
(1737, '101250802', '双峰'),
(1738, '101250803', '冷水江'),
(1739, '101250805', '新化'),
(1740, '101250806', '涟源'),
(1741, '101250901', '邵阳'),
(1742, '101250902', '隆回'),
(1743, '101250903', '洞口');
INSERT INTO `wy_weather` (`id`, `code`, `name`) VALUES
(1744, '101250904', '新邵'),
(1745, '101250905', '邵东'),
(1746, '101250906', '绥宁'),
(1747, '101250907', '新宁'),
(1748, '101250908', '武冈'),
(1749, '101250909', '城步'),
(1750, '101251001', '岳阳'),
(1751, '101251002', '华容'),
(1752, '101251003', '湘阴'),
(1753, '101251004', '汨罗'),
(1754, '101251005', '平江'),
(1755, '101251006', '临湘'),
(1756, '101251101', '张家界'),
(1757, '101251102', '桑植'),
(1758, '101251103', '慈利'),
(1759, '101251104', '武陵源'),
(1760, '101251201', '怀化'),
(1761, '101251203', '沅陵'),
(1762, '101251204', '辰溪'),
(1763, '101251205', '靖州'),
(1764, '101251206', '会同'),
(1765, '101251207', '通道'),
(1766, '101251208', '麻阳'),
(1767, '101251209', '新晃'),
(1768, '101251210', '芷江'),
(1769, '101251211', '溆浦'),
(1770, '101251212', '中方'),
(1771, '101251213', '洪江'),
(1772, '101251401', '永州'),
(1773, '101251402', '祁阳'),
(1774, '101251403', '东安'),
(1775, '101251404', '双牌'),
(1776, '101251405', '道县'),
(1777, '101251406', '宁远'),
(1778, '101251407', '江永'),
(1779, '101251408', '蓝山'),
(1780, '101251409', '新田'),
(1781, '101251410', '江华'),
(1782, '101251501', '吉首'),
(1783, '101251502', '保靖'),
(1784, '101251503', '永顺'),
(1785, '101251504', '古丈'),
(1786, '101251505', '凤凰'),
(1787, '101251506', '泸溪'),
(1788, '101251507', '龙山'),
(1789, '101251508', '花垣'),
(1790, '101260101', '贵阳'),
(1791, '101260102', '白云'),
(1792, '101260103', '花溪'),
(1793, '101260104', '乌当'),
(1794, '101260105', '息烽'),
(1795, '101260106', '开阳'),
(1796, '101260107', '修文'),
(1797, '101260108', '清镇'),
(1798, '101260109', '小河'),
(1799, '101260110', '云岩'),
(1800, '101260111', '南明'),
(1801, '101260201', '遵义'),
(1802, '101260203', '仁怀'),
(1803, '101260204', '绥阳'),
(1804, '101260205', '湄潭'),
(1805, '101260206', '凤冈'),
(1806, '101260207', '桐梓'),
(1807, '101260208', '赤水'),
(1808, '101260209', '习水'),
(1809, '101260210', '道真'),
(1810, '101260211', '正安'),
(1811, '101260212', '务川'),
(1812, '101260213', '余庆'),
(1813, '101260214', '汇川'),
(1814, '101260215', '红花岗'),
(1815, '101260301', '安顺'),
(1816, '101260302', '普定'),
(1817, '101260303', '镇宁'),
(1818, '101260304', '平坝'),
(1819, '101260305', '紫云'),
(1820, '101260306', '关岭'),
(1821, '101260401', '都匀'),
(1822, '101260402', '贵定'),
(1823, '101260403', '瓮安'),
(1824, '101260404', '长顺'),
(1825, '101260405', '福泉'),
(1826, '101260406', '惠水'),
(1827, '101260407', '龙里'),
(1828, '101260408', '罗甸'),
(1829, '101260409', '平塘'),
(1830, '101260410', '独山'),
(1831, '101260411', '三都'),
(1832, '101260412', '荔波'),
(1833, '101260501', '凯里'),
(1834, '101260502', '岑巩'),
(1835, '101260503', '施秉'),
(1836, '101260504', '镇远'),
(1837, '101260505', '黄平'),
(1838, '101260507', '麻江'),
(1839, '101260508', '丹寨'),
(1840, '101260509', '三穗'),
(1841, '101260510', '台江'),
(1842, '101260511', '剑河'),
(1843, '101260512', '雷山'),
(1844, '101260513', '黎平'),
(1845, '101260514', '天柱'),
(1846, '101260515', '锦屏'),
(1847, '101260516', '榕江'),
(1848, '101260517', '从江'),
(1849, '101260601', '铜仁'),
(1850, '101260602', '江口'),
(1851, '101260603', '玉屏'),
(1852, '101260604', '万山特'),
(1853, '101260605', '思南'),
(1854, '101260607', '印江'),
(1855, '101260608', '石阡'),
(1856, '101260609', '沿河'),
(1857, '101260610', '德江'),
(1858, '101260611', '松桃'),
(1859, '101260701', '毕节'),
(1860, '101260702', '赫章'),
(1861, '101260703', '金沙'),
(1862, '101260704', '威宁'),
(1863, '101260705', '大方'),
(1864, '101260706', '纳雍'),
(1865, '101260707', '织金'),
(1866, '101260708', '黔西'),
(1867, '101260801', '水城'),
(1868, '101260802', '六枝特'),
(1869, '101260804', '盘县'),
(1870, '101260901', '兴义'),
(1871, '101260902', '晴隆'),
(1872, '101260903', '兴仁'),
(1873, '101260904', '贞丰'),
(1874, '101260905', '望谟'),
(1875, '101260907', '安龙'),
(1876, '101260908', '册亨'),
(1877, '101260909', '普安'),
(1878, '101270101', '成都'),
(1879, '101270103', '新都'),
(1880, '101270104', '温江'),
(1881, '101270105', '金堂'),
(1882, '101270106', '双流'),
(1883, '101270107', '郫县'),
(1884, '101270108', '大邑'),
(1885, '101270109', '蒲江'),
(1886, '101270110', '新津'),
(1887, '101270111', '都江堰'),
(1888, '101270112', '彭州'),
(1889, '101270113', '邛崃'),
(1890, '101270114', '崇州'),
(1891, '101270201', '攀枝花'),
(1892, '101270203', '米易'),
(1893, '101270204', '盐边'),
(1894, '101270301', '自贡'),
(1895, '101270302', '富顺'),
(1896, '101270303', '荣县'),
(1897, '101270401', '绵阳'),
(1898, '101270402', '三台'),
(1899, '101270403', '盐亭'),
(1900, '101270404', '安县'),
(1901, '101270405', '梓潼'),
(1902, '101270406', '北川'),
(1903, '101270407', '平武'),
(1904, '101270408', '江油'),
(1905, '101270501', '南充'),
(1906, '101270502', '南部'),
(1907, '101270503', '营山'),
(1908, '101270504', '蓬安'),
(1909, '101270505', '仪陇'),
(1910, '101270506', '西充'),
(1911, '101270507', '阆中'),
(1912, '101270601', '达州'),
(1913, '101270602', '宣汉'),
(1914, '101270603', '开江'),
(1915, '101270604', '大竹'),
(1916, '101270605', '渠县'),
(1917, '101270606', '万源'),
(1918, '101270608', '达县'),
(1919, '101270701', '遂宁'),
(1920, '101270702', '蓬溪'),
(1921, '101270703', '射洪'),
(1922, '101270801', '广安'),
(1923, '101270802', '岳池'),
(1924, '101270803', '武胜'),
(1925, '101270804', '邻水'),
(1926, '101270805', '华蓥'),
(1927, '101270901', '巴中'),
(1928, '101270902', '通江'),
(1929, '101270903', '南江'),
(1930, '101270904', '平昌'),
(1931, '101271001', '泸州'),
(1932, '101271003', '泸县'),
(1933, '101271004', '合江'),
(1934, '101271005', '叙永'),
(1935, '101271006', '古蔺'),
(1936, '101271101', '宜宾'),
(1937, '101271104', '南溪'),
(1938, '101271105', '江安'),
(1939, '101271106', '长宁'),
(1940, '101271107', '高县'),
(1941, '101271108', '珙县'),
(1942, '101271109', '筠连'),
(1943, '101271110', '兴文'),
(1944, '101271111', '屏山'),
(1945, '101271201', '内江'),
(1946, '101271203', '威远'),
(1947, '101271204', '资中'),
(1948, '101271205', '隆昌'),
(1949, '101271301', '资阳'),
(1950, '101271302', '安岳'),
(1951, '101271303', '乐至'),
(1952, '101271304', '简阳'),
(1953, '101271401', '乐山'),
(1954, '101271402', '犍为'),
(1955, '101271403', '井研'),
(1956, '101271404', '夹江'),
(1957, '101271405', '沐川'),
(1958, '101271406', '峨边'),
(1959, '101271407', '马边'),
(1960, '101271409', '峨眉山'),
(1961, '101271501', '眉山'),
(1962, '101271502', '仁寿'),
(1963, '101271503', '彭山'),
(1964, '101271504', '洪雅'),
(1965, '101271505', '丹棱'),
(1966, '101271506', '青神'),
(1967, '101271601', '凉山'),
(1968, '101271603', '木里'),
(1969, '101271604', '盐源'),
(1970, '101271605', '德昌'),
(1971, '101271606', '会理'),
(1972, '101271607', '会东'),
(1973, '101271608', '宁南'),
(1974, '101271609', '普格'),
(1975, '101271610', '西昌'),
(1976, '101271611', '金阳'),
(1977, '101271612', '昭觉'),
(1978, '101271613', '喜德'),
(1979, '101271614', '冕宁'),
(1980, '101271615', '越西'),
(1981, '101271616', '甘洛'),
(1982, '101271617', '雷波'),
(1983, '101271618', '美姑'),
(1984, '101271619', '布拖'),
(1985, '101271701', '雅安'),
(1986, '101271702', '名山'),
(1987, '101271703', '荥经'),
(1988, '101271704', '汉源'),
(1989, '101271705', '石棉'),
(1990, '101271706', '天全'),
(1991, '101271707', '芦山'),
(1992, '101271708', '宝兴'),
(1993, '101271801', '甘孜'),
(1994, '101271802', '康定'),
(1995, '101271803', '泸定'),
(1996, '101271804', '丹巴'),
(1997, '101271805', '九龙'),
(1998, '101271806', '雅江'),
(1999, '101271807', '道孚'),
(2000, '101271808', '炉霍'),
(2001, '101271809', '新龙'),
(2002, '101271810', '德格'),
(2003, '101271811', '白玉'),
(2004, '101271812', '石渠'),
(2005, '101271813', '色达'),
(2006, '101271814', '理塘'),
(2007, '101271815', '巴塘'),
(2008, '101271816', '乡城'),
(2009, '101271817', '稻城'),
(2010, '101271818', '得荣'),
(2011, '101271901', '阿坝'),
(2012, '101271902', '汶川'),
(2013, '101271903', '理县'),
(2014, '101271904', '茂县'),
(2015, '101271905', '松潘'),
(2016, '101271906', '九寨沟'),
(2017, '101271907', '金川'),
(2018, '101271908', '小金'),
(2019, '101271909', '黑水'),
(2020, '101271910', '马尔康'),
(2021, '101271911', '壤塘'),
(2022, '101271912', '若尔盖'),
(2023, '101271913', '红原'),
(2024, '101272001', '德阳'),
(2025, '101272002', '中江'),
(2026, '101272003', '广汉'),
(2027, '101272004', '什邡'),
(2028, '101272005', '绵竹'),
(2029, '101272006', '罗江'),
(2030, '101272101', '广元'),
(2031, '101272102', '旺苍'),
(2032, '101272103', '青川'),
(2033, '101272104', '剑阁'),
(2034, '101272105', '苍溪'),
(2035, '101280101', '广州'),
(2036, '101280102', '番禺'),
(2037, '101280103', '从化'),
(2038, '101280104', '增城'),
(2039, '101280105', '花都'),
(2040, '101280201', '韶关'),
(2041, '101280202', '乳源'),
(2042, '101280203', '始兴'),
(2043, '101280204', '翁源'),
(2044, '101280205', '乐昌'),
(2045, '101280206', '仁化'),
(2046, '101280207', '南雄'),
(2047, '101280208', '新丰'),
(2048, '101280209', '曲江'),
(2049, '101280210', '浈江'),
(2050, '101280211', '武江'),
(2051, '101280301', '惠州'),
(2052, '101280302', '博罗'),
(2053, '101280303', '惠阳'),
(2054, '101280304', '惠东'),
(2055, '101280305', '龙门'),
(2056, '101280401', '梅州'),
(2057, '101280402', '兴宁'),
(2058, '101280403', '蕉岭'),
(2059, '101280404', '大埔'),
(2060, '101280406', '丰顺'),
(2061, '101280407', '平远'),
(2062, '101280408', '五华'),
(2063, '101280409', '梅县'),
(2064, '101280501', '汕头'),
(2065, '101280502', '潮阳'),
(2066, '101280503', '澄海'),
(2067, '101280504', '南澳'),
(2068, '101280601', '深圳'),
(2069, '101280701', '珠海'),
(2070, '101280702', '斗门'),
(2071, '101280703', '金湾'),
(2072, '101280800', '佛山'),
(2073, '101280801', '顺德'),
(2074, '101280802', '三水'),
(2075, '101280803', '南海'),
(2076, '101280804', '高明'),
(2077, '101280901', '肇庆'),
(2078, '101280902', '广宁'),
(2079, '101280903', '四会'),
(2080, '101280905', '德庆'),
(2081, '101280906', '怀集'),
(2082, '101280907', '封开'),
(2083, '101280908', '高要'),
(2084, '101281001', '湛江'),
(2085, '101281002', '吴川'),
(2086, '101281003', '雷州'),
(2087, '101281004', '徐闻'),
(2088, '101281005', '廉江'),
(2089, '101281006', '赤坎'),
(2090, '101281007', '遂溪'),
(2091, '101281008', '坡头'),
(2092, '101281009', '霞山'),
(2093, '101281010', '麻章'),
(2094, '101281101', '江门'),
(2095, '101281103', '开平'),
(2096, '101281104', '新会'),
(2097, '101281105', '恩平'),
(2098, '101281106', '台山'),
(2099, '101281108', '鹤山'),
(2100, '101281109', '江海'),
(2101, '101281201', '河源'),
(2102, '101281202', '紫金'),
(2103, '101281203', '连平'),
(2104, '101281204', '和平'),
(2105, '101281205', '龙川'),
(2106, '101281206', '东源'),
(2107, '101281301', '清远'),
(2108, '101281302', '连南'),
(2109, '101281303', '连州'),
(2110, '101281304', '连山'),
(2111, '101281305', '阳山'),
(2112, '101281306', '佛冈'),
(2113, '101281307', '英德'),
(2114, '101281308', '清新'),
(2115, '101281401', '云浮'),
(2116, '101281402', '罗定'),
(2117, '101281403', '新兴'),
(2118, '101281404', '郁南'),
(2119, '101281406', '云安'),
(2120, '101281501', '潮州'),
(2121, '101281502', '饶平'),
(2122, '101281503', '潮安'),
(2123, '101281601', '东莞'),
(2124, '101281701', '中山'),
(2125, '101281801', '阳江'),
(2126, '101281802', '阳春'),
(2127, '101281803', '阳东'),
(2128, '101281804', '阳西'),
(2129, '101281901', '揭阳'),
(2130, '101281902', '揭西'),
(2131, '101281903', '普宁'),
(2132, '101281904', '惠来'),
(2133, '101281905', '揭东'),
(2134, '101282001', '茂名'),
(2135, '101282002', '高州'),
(2136, '101282003', '化州'),
(2137, '101282004', '电白'),
(2138, '101282005', '信宜'),
(2139, '101282006', '茂港'),
(2140, '101282101', '汕尾'),
(2141, '101282102', '海丰'),
(2142, '101282103', '陆丰'),
(2143, '101282104', '陆河'),
(2144, '101290101', '昆明'),
(2145, '101290103', '东川'),
(2146, '101290104', '寻甸'),
(2147, '101290105', '晋宁'),
(2148, '101290106', '宜良'),
(2149, '101290107', '石林'),
(2150, '101290108', '呈贡'),
(2151, '101290109', '富民'),
(2152, '101290110', '嵩明'),
(2153, '101290111', '禄劝'),
(2154, '101290112', '安宁'),
(2155, '101290201', '大理'),
(2156, '101290202', '云龙'),
(2157, '101290203', '漾濞'),
(2158, '101290204', '永平'),
(2159, '101290205', '宾川'),
(2160, '101290206', '弥渡'),
(2161, '101290207', '祥云'),
(2162, '101290208', '巍山'),
(2163, '101290209', '剑川'),
(2164, '101290210', '洱源'),
(2165, '101290211', '鹤庆'),
(2166, '101290212', '南涧'),
(2167, '101290301', '红河'),
(2168, '101290302', '石屏'),
(2169, '101290303', '建水'),
(2170, '101290304', '弥勒'),
(2171, '101290305', '元阳'),
(2172, '101290306', '绿春'),
(2173, '101290307', '开远'),
(2174, '101290308', '个旧'),
(2175, '101290309', '蒙自'),
(2176, '101290310', '屏边'),
(2177, '101290311', '泸西'),
(2178, '101290312', '金平'),
(2179, '101290313', '河口'),
(2180, '101290401', '曲靖'),
(2181, '101290402', '沾益'),
(2182, '101290403', '陆良'),
(2183, '101290404', '富源'),
(2184, '101290405', '马龙'),
(2185, '101290406', '师宗'),
(2186, '101290407', '罗平'),
(2187, '101290408', '会泽'),
(2188, '101290409', '宣威'),
(2189, '101290501', '保山'),
(2190, '101290503', '龙陵'),
(2191, '101290504', '施甸'),
(2192, '101290505', '昌宁'),
(2193, '101290506', '腾冲'),
(2194, '101290601', '文山'),
(2195, '101290602', '西畴'),
(2196, '101290603', '马关'),
(2197, '101290604', '麻栗坡'),
(2198, '101290605', '砚山'),
(2199, '101290606', '丘北'),
(2200, '101290607', '广南'),
(2201, '101290608', '富宁'),
(2202, '101290701', '玉溪'),
(2203, '101290702', '澄江'),
(2204, '101290703', '江川'),
(2205, '101290704', '通海'),
(2206, '101290705', '华宁'),
(2207, '101290706', '新平'),
(2208, '101290707', '易门'),
(2209, '101290708', '峨山'),
(2210, '101290709', '元江'),
(2211, '101290801', '楚雄'),
(2212, '101290802', '大姚'),
(2213, '101290803', '元谋'),
(2214, '101290804', '姚安'),
(2215, '101290805', '牟定'),
(2216, '101290806', '南华'),
(2217, '101290807', '武定'),
(2218, '101290808', '禄丰'),
(2219, '101290809', '双柏'),
(2220, '101290810', '永仁'),
(2221, '101290901', '普洱'),
(2222, '101290902', '景谷'),
(2223, '101290903', '景东'),
(2224, '101290904', '澜沧'),
(2225, '101290906', '墨江'),
(2226, '101290907', '江城'),
(2227, '101290908', '孟连'),
(2228, '101290909', '西盟'),
(2229, '101290911', '镇沅'),
(2230, '101290912', '宁洱'),
(2231, '101291001', '昭通'),
(2232, '101291002', '鲁甸'),
(2233, '101291003', '彝良'),
(2234, '101291004', '镇雄'),
(2235, '101291005', '威信'),
(2236, '101291006', '巧家'),
(2237, '101291007', '绥江'),
(2238, '101291008', '永善'),
(2239, '101291009', '盐津'),
(2240, '101291010', '大关'),
(2241, '101291011', '水富'),
(2242, '101291101', '临沧'),
(2243, '101291102', '沧源'),
(2244, '101291103', '耿马'),
(2245, '101291104', '双江'),
(2246, '101291105', '凤庆'),
(2247, '101291106', '永德'),
(2248, '101291107', '云县'),
(2249, '101291108', '镇康'),
(2250, '101291201', '怒江'),
(2251, '101291203', '福贡'),
(2252, '101291204', '兰坪'),
(2253, '101291205', '泸水'),
(2254, '101291207', '贡山'),
(2255, '101291301', '迪庆'),
(2256, '101291302', '德钦'),
(2257, '101291303', '维西'),
(2258, '101291401', '丽江'),
(2259, '101291402', '永胜'),
(2260, '101291403', '华坪'),
(2261, '101291404', '宁蒗'),
(2262, '101291501', '德宏'),
(2263, '101291503', '陇川'),
(2264, '101291504', '盈江'),
(2265, '101291506', '瑞丽'),
(2266, '101291507', '梁河'),
(2267, '101291508', '潞西'),
(2268, '101291601', '西双版纳'),
(2269, '101291603', '勐海'),
(2270, '101291605', '勐腊'),
(2271, '101300101', '南宁'),
(2272, '101300103', '邕宁'),
(2273, '101300104', '横县'),
(2274, '101300105', '隆安'),
(2275, '101300106', '马山'),
(2276, '101300107', '上林'),
(2277, '101300108', '武鸣'),
(2278, '101300109', '宾阳'),
(2279, '101300201', '崇左'),
(2280, '101300202', '天等'),
(2281, '101300203', '龙州'),
(2282, '101300204', '凭祥'),
(2283, '101300205', '大新'),
(2284, '101300206', '扶绥'),
(2285, '101300207', '宁明'),
(2286, '101300301', '柳州'),
(2287, '101300302', '柳城'),
(2288, '101300304', '鹿寨'),
(2289, '101300305', '柳江'),
(2290, '101300306', '融安'),
(2291, '101300307', '融水'),
(2292, '101300308', '三江'),
(2293, '101300401', '来宾'),
(2294, '101300402', '忻城'),
(2295, '101300403', '金秀'),
(2296, '101300404', '象州'),
(2297, '101300405', '武宣'),
(2298, '101300406', '合山'),
(2299, '101300501', '桂林'),
(2300, '101300503', '龙胜'),
(2301, '101300504', '永福'),
(2302, '101300505', '临桂'),
(2303, '101300506', '兴安'),
(2304, '101300507', '灵川'),
(2305, '101300508', '全州'),
(2306, '101300509', '灌阳'),
(2307, '101300510', '阳朔'),
(2308, '101300511', '恭城'),
(2309, '101300512', '平乐'),
(2310, '101300513', '荔浦'),
(2311, '101300514', '资源'),
(2312, '101300601', '梧州'),
(2313, '101300602', '藤县'),
(2314, '101300604', '苍梧'),
(2315, '101300605', '蒙山'),
(2316, '101300606', '岑溪'),
(2317, '101300701', '贺州'),
(2318, '101300702', '昭平'),
(2319, '101300703', '富川'),
(2320, '101300704', '钟山'),
(2321, '101300801', '贵港'),
(2322, '101300802', '桂平'),
(2323, '101300803', '平南'),
(2324, '101300901', '玉林'),
(2325, '101300902', '博白'),
(2326, '101300903', '北流'),
(2327, '101300904', '容县'),
(2328, '101300905', '陆川'),
(2329, '101300906', '兴业'),
(2330, '101301001', '百色'),
(2331, '101301002', '那坡'),
(2332, '101301003', '田阳'),
(2333, '101301004', '德保'),
(2334, '101301005', '靖西'),
(2335, '101301006', '田东'),
(2336, '101301007', '平果'),
(2337, '101301008', '隆林'),
(2338, '101301009', '西林'),
(2339, '101301010', '乐业'),
(2340, '101301011', '凌云'),
(2341, '101301012', '田林'),
(2342, '101301101', '钦州'),
(2343, '101301102', '浦北'),
(2344, '101301103', '灵山'),
(2345, '101301201', '河池'),
(2346, '101301202', '天峨'),
(2347, '101301203', '东兰'),
(2348, '101301204', '巴马'),
(2349, '101301205', '环江'),
(2350, '101301206', '罗城'),
(2351, '101301207', '宜州'),
(2352, '101301208', '凤山'),
(2353, '101301209', '南丹'),
(2354, '101301210', '都安'),
(2355, '101301211', '大化'),
(2356, '101301301', '北海'),
(2357, '101301302', '合浦'),
(2358, '101301303', '涠洲岛'),
(2359, '101301401', '防城港'),
(2360, '101301402', '上思'),
(2361, '101301403', '东兴'),
(2362, '101301405', '防城'),
(2363, '101310101', '海口'),
(2364, '101310201', '三亚'),
(2365, '101310202', '东方'),
(2366, '101310203', '临高'),
(2367, '101310204', '澄迈'),
(2368, '101310205', '儋州'),
(2369, '101310206', '昌江'),
(2370, '101310207', '白沙'),
(2371, '101310208', '琼中'),
(2372, '101310209', '定安'),
(2373, '101310210', '屯昌'),
(2374, '101310211', '琼海'),
(2375, '101310212', '文昌'),
(2376, '101310214', '保亭'),
(2377, '101310215', '万宁'),
(2378, '101310216', '陵水'),
(2379, '101310221', '乐东'),
(2380, '101310222', '五指山'),
(2381, '101320101', '香港'),
(2382, '101330101', '澳门'),
(2383, '101340101', '台北'),
(2384, '101340102', '桃园'),
(2385, '101340103', '新竹'),
(2386, '101340104', '宜兰'),
(2387, '101340201', '高雄'),
(2388, '101340202', '嘉义'),
(2389, '101340203', '台南'),
(2390, '101340204', '台东'),
(2391, '101340205', '屏东'),
(2392, '101340401', '台中'),
(2393, '101340402', '苗栗'),
(2394, '101340403', '彰化'),
(2395, '101340404', '南投'),
(2396, '101340405', '花莲'),
(2397, '101340406', '云林'),
(2398, '102010100', '首尔'),
(2399, '103010100', '东京'),
(2400, '103020100', '大阪'),
(2401, '103040100', '札幌'),
(2402, '103050100', '福冈'),
(2403, '103090100', '京都'),
(2404, '104010100', '新加坡'),
(2405, '105010100', '吉隆坡'),
(2406, '106010100', '曼谷'),
(2407, '107010100', '河内'),
(2408, '107020100', '胡志明市'),
(2409, '108010100', '仰光'),
(2410, '109010100', '万象'),
(2411, '111010100', '雅加达'),
(2412, '111080100', '登巴萨'),
(2413, '112010100', '德黑兰'),
(2414, '113010100', '新德里'),
(2415, '113030100', '孟买'),
(2416, '113090100', '斯利那加'),
(2417, '114010100', '伊斯兰堡'),
(2418, '114030100', '卡拉奇'),
(2419, '114040100', '白沙瓦'),
(2420, '115010100', '塔什干'),
(2421, '117010100', '科伦坡'),
(2422, '118010100', '喀布尔'),
(2423, '118030100', '坎大哈'),
(2424, '120010100', '斯里巴加湾'),
(2425, '121010100', '巴林'),
(2426, '124010100', '阿布扎比'),
(2427, '124020100', '迪拜'),
(2428, '127010100', '平壤'),
(2429, '130010100', '阿斯塔纳'),
(2430, '132010100', '乌兰巴托'),
(2431, '136010100', '马尼拉'),
(2432, '138010100', '利雅得'),
(2433, '139010100', '大马士革'),
(2434, '201010100', '伦敦'),
(2435, '201050100', '曼彻斯特'),
(2436, '202010100', '巴黎'),
(2437, '202100100', '马赛'),
(2438, '203010100', '柏林'),
(2439, '203020100', '法兰克福'),
(2440, '203050100', '汉堡'),
(2441, '204010100', '罗马'),
(2442, '204040100', '米兰'),
(2443, '205010100', '阿姆斯特丹'),
(2444, '206010100', '马德里'),
(2445, '206020100', '巴塞罗那'),
(2446, '207010100', '哥本哈根'),
(2447, '208010100', '莫斯科'),
(2448, '210020100', '日内瓦'),
(2449, '210030100', '苏黎世'),
(2450, '211010100', '斯德哥尔摩'),
(2451, '214010100', '里斯本'),
(2452, '215020100', '伊斯坦布尔'),
(2453, '216010100', '布鲁塞尔'),
(2454, '217010100', '维也纳'),
(2455, '218010100', '雅典'),
(2456, '222010100', '赫尔辛基'),
(2457, '301010100', '开罗'),
(2458, '302010100', '开普敦'),
(2459, '302020100', '约翰内斯堡'),
(2460, '303010100', '突尼斯'),
(2461, '304020100', '拉各斯'),
(2462, '305010100', '阿尔及尔'),
(2463, '311010100', '亚的斯亚贝巴'),
(2464, '317010100', '内罗毕'),
(2465, '321020100', '卡萨布兰卡'),
(2466, '327010100', '达喀尔'),
(2467, '332010100', '达累斯萨拉姆'),
(2468, '334010100', '卢萨卡'),
(2469, '401010100', '华盛顿'),
(2470, '401020101', '迈阿密'),
(2471, '401020104', '奥兰多'),
(2472, '401030101', '亚特兰大'),
(2473, '401040101', '洛杉矶'),
(2474, '401040102', '圣弗朗西斯科'),
(2475, '401060100', '波士顿'),
(2476, '401070101', '芝加哥'),
(2477, '401100101', '西雅图'),
(2478, '401110101', '纽约'),
(2479, '401120108', '休斯敦'),
(2480, '401370100', '拉斯维加斯'),
(2481, '401480100', '火奴鲁鲁'),
(2482, '404010100', '渥太华'),
(2483, '404030100', '温哥华'),
(2484, '404040100', '多伦多'),
(2485, '404130100', '埃德蒙顿'),
(2486, '404140100', '卡尔加里'),
(2487, '404220100', '温尼伯'),
(2488, '404230100', '魁北克'),
(2489, '404240100', '蒙特利尔'),
(2490, '406010100', '哈瓦那'),
(2491, '411010100', '墨西哥城'),
(2492, '416010100', '加拉加斯'),
(2493, '601020101', '悉尼'),
(2494, '601030101', '布里斯班'),
(2495, '601040101', '阿德来德'),
(2496, '601060101', '墨尔本'),
(2497, '601070101', '珀斯'),
(2498, '606010100', '惠灵顿'),
(2499, '606020100', '奥克兰'),
(2500, '606030100', '克莱斯特彻奇'),
(2501, '101030100', '天津');

-- --------------------------------------------------------

--
-- 表的结构 `wy_wechat_group`
--

CREATE TABLE IF NOT EXISTS `wy_wechat_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `wechatgroupid` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `intro` varchar(200) NOT NULL DEFAULT '',
  `token` varchar(30) NOT NULL DEFAULT '',
  `fanscount` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `wechatgroupid` (`wechatgroupid`,`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wechat_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wechat_group_list`
--

CREATE TABLE IF NOT EXISTS `wy_wechat_group_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(60) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `province` varchar(20) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL,
  `headimgurl` varchar(200) NOT NULL,
  `subscribe_time` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  `openid` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wechat_group_list`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wecha_user`
--

CREATE TABLE IF NOT EXISTS `wy_wecha_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  PRIMARY KEY (`token`,`wecha_id`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wecha_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wedding`
--

CREATE TABLE IF NOT EXISTS `wy_wedding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `keyword` varchar(60) NOT NULL,
  `title` varchar(150) NOT NULL,
  `picurl` varchar(150) NOT NULL,
  `openpic` varchar(200) NOT NULL,
  `coverurl` varchar(200) NOT NULL,
  `woman` varchar(30) NOT NULL,
  `man` varchar(30) NOT NULL,
  `who_first` tinyint(1) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `time` int(11) NOT NULL,
  `place` varchar(200) NOT NULL,
  `lng` varchar(16) NOT NULL,
  `lat` varchar(16) NOT NULL,
  `video` varchar(200) NOT NULL,
  `mp3url` varchar(200) NOT NULL,
  `passowrd` int(20) NOT NULL,
  `word` varchar(200) NOT NULL,
  `qr_code` varchar(200) NOT NULL,
  `copyrite` varchar(150) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wedding`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wedding_info`
--

CREATE TABLE IF NOT EXISTS `wy_wedding_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `num` tinyint(2) NOT NULL,
  `info` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wedding_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wehcat_member_enddate`
--

CREATE TABLE IF NOT EXISTS `wy_wehcat_member_enddate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(60) NOT NULL,
  `enddate` int(11) NOT NULL,
  `joinUpDate` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wy_wehcat_member_enddate`
--

INSERT INTO `wy_wehcat_member_enddate` (`id`, `openid`, `enddate`, `joinUpDate`, `uid`, `token`) VALUES
(1, 'oATEfuOusYgQ8UJ8yHtEqLJtKppI', 1400838924, 0, 0, 'nsnyem1400838500'),
(2, 'o6Txvt3Dj3MVUFLWQWXogOqs83sA', 1400853452, 0, 0, 'jyccid1400850497');

-- --------------------------------------------------------

--
-- 表的结构 `wy_weiwoemail`
--

CREATE TABLE IF NOT EXISTS `wy_weiwoemail` (
  `token` varchar(60) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `smtpserver` varchar(40) NOT NULL DEFAULT '',
  `port` varchar(40) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `receive` varchar(60) NOT NULL DEFAULT '',
  `shangcheng` tinyint(1) NOT NULL DEFAULT '0',
  `yuyue` tinyint(1) NOT NULL DEFAULT '0',
  `dingdan` tinyint(1) NOT NULL DEFAULT '0',
  `biaodan` tinyint(1) NOT NULL DEFAULT '0',
  `toupiao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`token`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_weiwoemail`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_weiwosms`
--

CREATE TABLE IF NOT EXISTS `wy_weiwosms` (
  `token` varchar(60) NOT NULL,
  `phone` varchar(40) NOT NULL DEFAULT '',
  `name` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `shangcheng` tinyint(1) NOT NULL DEFAULT '0',
  `yuyue` tinyint(1) NOT NULL DEFAULT '0',
  `dingdan` tinyint(1) NOT NULL DEFAULT '0',
  `biaodan` tinyint(1) NOT NULL DEFAULT '0',
  `toupiao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`token`),
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wy_weiwosms`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wewall`
--

CREATE TABLE IF NOT EXISTS `wy_wewall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acttitle` varchar(40) NOT NULL COMMENT '活动标题',
  `isact` int(1) NOT NULL DEFAULT '0' COMMENT '活动开关',
  `ifcheck` int(1) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `iflottery` int(1) NOT NULL DEFAULT '1',
  `showtime` int(11) NOT NULL COMMENT '前台页面刷新间隔',
  `background` varchar(300) DEFAULT NULL COMMENT '前台页面背景',
  `marklog` varchar(100) DEFAULT NULL COMMENT '成绩记录',
  `createtime` int(20) NOT NULL COMMENT '创建时间',
  `endtime` int(20) DEFAULT NULL COMMENT '结束时间',
  `token` varchar(40) NOT NULL,
  `bonu1` int(11) DEFAULT NULL COMMENT '一等奖数量',
  `bonu2` int(11) DEFAULT NULL COMMENT '二等奖数量',
  `bonu3` int(11) DEFAULT NULL COMMENT '三等奖数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wewall`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wewalllog`
--

CREATE TABLE IF NOT EXISTS `wy_wewalllog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(30) NOT NULL,
  `content` varchar(200) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `token` varchar(30) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sncode` varchar(20) DEFAULT NULL,
  `ifcheck` int(1) DEFAULT '0',
  `ifsent` int(1) DEFAULT '0',
  `ifscheck` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wewalllog`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wxq`
--

CREATE TABLE IF NOT EXISTS `wy_wxq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '活动名称',
  `keyword` varchar(255) NOT NULL COMMENT '关键字',
  `enter_tips` varchar(300) NOT NULL DEFAULT '' COMMENT '进入提示',
  `quit_tips` varchar(300) NOT NULL DEFAULT '' COMMENT '退出提示',
  `send_tips` varchar(300) NOT NULL DEFAULT '' COMMENT '发表提示',
  `quit_command` varchar(10) NOT NULL DEFAULT '' COMMENT '退出指令',
  `description` text NOT NULL COMMENT '描述',
  `timeout` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '超时时间',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否需要审核',
  `createtime` varchar(13) NOT NULL,
  `updatetime` varchar(13) NOT NULL,
  `qrcode` char(100) NOT NULL COMMENT '二维码',
  `background` char(100) NOT NULL COMMENT '墻背景',
  `showtime` int(11) NOT NULL COMMENT '每张墻轮换时间',
  `logourl` char(250) NOT NULL COMMENT 'logo',
  `bgmp3` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wxq`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wxuser`
--

CREATE TABLE IF NOT EXISTS `wy_wxuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `routerid` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `wxname` varchar(60) NOT NULL COMMENT '公众号名称',
  `winxintype` smallint(2) NOT NULL DEFAULT '1',
  `appid` varchar(50) NOT NULL,
  `appsecret` varchar(50) NOT NULL,
  `wxid` varchar(20) NOT NULL COMMENT '公众号原始ID',
  `yxid` varchar(20) NOT NULL,
  `weixin` char(20) NOT NULL COMMENT '微信号',
  `headerpic` char(255) NOT NULL COMMENT '头像地址',
  `token` char(255) NOT NULL,
  `province` varchar(30) NOT NULL COMMENT '省',
  `color_id` int(2) NOT NULL,
  `city` varchar(60) NOT NULL COMMENT '市',
  `qq` char(25) NOT NULL COMMENT '公众号邮箱',
  `wxfans` int(11) NOT NULL COMMENT '微信粉丝',
  `typeid` int(11) NOT NULL COMMENT '分类ID',
  `typename` varchar(90) NOT NULL DEFAULT '0' COMMENT '分类名',
  `tongji` text NOT NULL,
  `allcardnum` int(11) NOT NULL,
  `cardisok` int(11) NOT NULL,
  `yetcardnum` int(11) NOT NULL,
  `totalcardnum` int(11) NOT NULL,
  `createtime` varchar(13) NOT NULL,
  `tpltypeid` varchar(3) NOT NULL DEFAULT '1' COMMENT '默认首页模版ID',
  `updatetime` varchar(13) NOT NULL,
  `tpltypename` varchar(20) NOT NULL COMMENT '首页模版名',
  `tpllistid` varchar(2) NOT NULL COMMENT '列表模版ID',
  `tpllistname` varchar(20) NOT NULL COMMENT '列表模版名',
  `tplcontentid` varchar(2) NOT NULL COMMENT '内容模版ID',
  `tplcontentname` varchar(20) NOT NULL COMMENT '内容模版名',
  `phone` text NOT NULL,
  `smsstatus` text NOT NULL,
  `smsuser` text NOT NULL,
  `smspassword` text NOT NULL,
  `email` text NOT NULL,
  `emailstatus` text NOT NULL,
  `emailuser` text NOT NULL,
  `emailpassword` text NOT NULL,
  `qrcode` varchar(128) NOT NULL,
  `plat_type` varchar(16) NOT NULL,
  `transfer_customer_service` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `wy_wxuser`
--

INSERT INTO `wy_wxuser` (`id`, `routerid`, `uid`, `wxname`, `winxintype`, `appid`, `appsecret`, `wxid`, `yxid`, `weixin`, `headerpic`, `token`, `province`, `color_id`, `city`, `qq`, `wxfans`, `typeid`, `typename`, `tongji`, `allcardnum`, `cardisok`, `yetcardnum`, `totalcardnum`, `createtime`, `tpltypeid`, `updatetime`, `tpltypename`, `tpllistid`, `tpllistname`, `tplcontentid`, `tplcontentname`, `phone`, `smsstatus`, `smsuser`, `smspassword`, `email`, `emailstatus`, `emailuser`, `emailpassword`, `qrcode`, `plat_type`, `transfer_customer_service`) VALUES
(1, '', 1, '123', 1, '123', '123', '123', '123', '123', './tpl/User/default/common/images/portrait.jpg', 'pgtepl1400696466', 'p', 5, 'c', '1400696466@yourdomain.com', 0, 8, '服务', '', 100, 1, 0, 0, '1400696489', '144', '1400696489', 'index13879dasdjuufd', '1', 'yl_list', '1', 'ktv_content', '', '', '', '', '', '', '', '', '', '', 0),
(6, '', 1, '中恒影视团队', 1, '', '', 'gh_2b3a96d8ffc8', 'dffsff', 'zhfilm', './tpl/User/default/common/images/portrait.jpg', 'jyccid1400850497', 'p', 0, 'c', '1400850497@yourdomain.com', 0, 8, '服务', '', 0, 0, 0, 0, '1400850525', '1', '1400850525', 'ty_index', '1', 'yl_list', '1', 'ktv_content', '', '', '', '', '', '', '', '', '', '', 0),
(4, '', 2, '营口生活', 1, '', '', 'gh_dd7141479fac', '44555555', 'myyingkou', './tpl/User/default/common/images/portrait.jpg', 'fucuac1400841542', 'p', 0, 'c', '1400841542@yourdomain.com', 0, 8, '服务', '', 0, 0, 0, 0, '1400841640', '1', '1400841640', 'ty_index', '1', 'yl_list', '1', 'ktv_content', '', '', '', '', '', '', '', '', '', '', 0),
(5, '', 4, 'qwqeqeq', 1, '', '', 'qwqeqeq', 'qwqeqeq', 'qwqeqeq', './tpl/User/default/common/images/portrait.jpg', 'lseyvg1400848442', 'p', 0, 'c', '1400848442@yourdomain.com', 0, 8, '服务', '', 0, 0, 0, 0, '1400848450', '1', '1400848450', 'ty_index', '1', 'yl_list', '1', 'ktv_content', '', '', '', '', '', '', '', '', '', '', 0),
(7, '', 1, '营口生活', 3, 'wxd0fda22d88b7edc6', 'a82137513a16cd860f6e84a3cb93e880', 'gh_451de9436af4', 'gh_451de9436af4', 'kjfrhsyl', './tpl/User/default/common/images/portrait.jpg', 'pbnnog1400853333', 'p', 0, 'c', '1400853333@yourdomain.com', 0, 8, '服务', '', 0, 0, 0, 0, '1400853432', '1', '1400853432', 'ty_index', '1', 'yl_list', '1', 'ktv_content', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wy_wxuser_message`
--

CREATE TABLE IF NOT EXISTS `wy_wxuser_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(255) NOT NULL,
  `FromUserName` varchar(255) NOT NULL,
  `CreateTime` int(11) NOT NULL,
  `MsgType` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `MsgId` varchar(255) NOT NULL,
  `PicUrl` varchar(255) NOT NULL,
  `MediaId` varchar(255) NOT NULL,
  `Format` varchar(255) NOT NULL,
  `ThumbMediaId` varchar(255) NOT NULL,
  `Location_X` varchar(255) NOT NULL,
  `Location_Y` varchar(255) NOT NULL,
  `Scale` varchar(255) NOT NULL,
  `Label` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `backcontent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wxuser_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wxwall_award`
--

CREATE TABLE IF NOT EXISTS `wy_wxwall_award` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wxq_id` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wxwall_award`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wxwall_members`
--

CREATE TABLE IF NOT EXISTS `wy_wxwall_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` varchar(50) NOT NULL COMMENT '用户的唯一身份ID',
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(100) NOT NULL DEFAULT '' COMMENT '头像',
  `wxq_id` int(10) unsigned NOT NULL COMMENT '用户当前所在的微信墙话题',
  `isjoin` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否正在加入话题',
  `isblacklist` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户是否是黑名单',
  `lastupdate` int(10) unsigned NOT NULL COMMENT '用户最后发表时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wxwall_members`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_wxwall_message`
--

CREATE TABLE IF NOT EXISTS `wy_wxwall_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wxq_id` int(10) unsigned NOT NULL COMMENT '规则ID',
  `from_user` varchar(50) NOT NULL COMMENT '用户的唯一ID',
  `content` varchar(1000) NOT NULL DEFAULT '' COMMENT '用户发表的内容',
  `type` varchar(10) NOT NULL COMMENT '发表内容类型',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `createtime` int(10) unsigned NOT NULL,
  `isshowed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示过了 1 是 0否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_wxwall_message`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_yuyue`
--

CREATE TABLE IF NOT EXISTS `wy_yuyue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `topic` varchar(200) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `statdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `copyright` varchar(30) DEFAULT NULL,
  `yuyue_type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_yuyue`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_yuyue_order`
--

CREATE TABLE IF NOT EXISTS `wy_yuyue_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `token` varchar(40) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `memo` varchar(200) DEFAULT NULL,
  `type` smallint(4) NOT NULL DEFAULT '0',
  `wecha_id` varchar(200) NOT NULL,
  `or_date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `nums` varchar(20) DEFAULT NULL,
  `fieldsigle` varchar(100) DEFAULT NULL,
  `fielddownload` varchar(100) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `kind` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_yuyue_order`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_yuyue_setcin`
--

CREATE TABLE IF NOT EXISTS `wy_yuyue_setcin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `yuanjia` varchar(10) DEFAULT NULL,
  `youhui` varchar(10) DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `messages` text,
  `type` varchar(20) DEFAULT NULL,
  `pic1` varchar(100) DEFAULT NULL,
  `pic2` varchar(100) DEFAULT NULL,
  `pic3` varchar(100) DEFAULT NULL,
  `pic4` varchar(100) DEFAULT NULL,
  `pic5` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_yuyue_setcin`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_zhuanpan_config`
--

CREATE TABLE IF NOT EXISTS `wy_zhuanpan_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hd_name` varchar(200) NOT NULL COMMENT '活动名称',
  `hd_info` varchar(255) NOT NULL COMMENT '活动说明',
  `hd_duijiang_info` varchar(255) NOT NULL COMMENT '兑奖信息',
  `hd_begin_time` varchar(30) NOT NULL,
  `hd_end_time` varchar(30) NOT NULL,
  `hd_chongfu_info` varchar(255) NOT NULL COMMENT '重复提示信息',
  `hd_end_info` varchar(255) NOT NULL COMMENT '活动结束说明',
  `hd_cishu` int(10) NOT NULL COMMENT '每天最大次数',
  `hd_renshu` int(10) NOT NULL COMMENT '//活动人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_zhuanpan_config`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_zhuanpan_list`
--

CREATE TABLE IF NOT EXISTS `wy_zhuanpan_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `praisefeild` varchar(20) NOT NULL COMMENT '奖项标示字段',
  `praisename` varchar(20) NOT NULL COMMENT '奖项名字',
  `min` text NOT NULL COMMENT '最小角度',
  `max` text NOT NULL COMMENT '最大角度',
  `praisecontent` text NOT NULL COMMENT '奖项内容',
  `praisenumber` int(3) NOT NULL COMMENT '奖项库存次数',
  `chance` int(10) unsigned NOT NULL COMMENT '本奖项的概率',
  `shuliang` int(10) NOT NULL COMMENT '奖品数量',
  PRIMARY KEY (`id`),
  KEY `praisefeild` (`praisefeild`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_zhuanpan_list`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_zhuanpan_log`
--

CREATE TABLE IF NOT EXISTS `wy_zhuanpan_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL COMMENT '//用户ID',
  `username` varchar(200) NOT NULL COMMENT '//用户名',
  `u_phone` varchar(30) NOT NULL COMMENT '//用户手机号码',
  `u_name` varchar(30) NOT NULL COMMENT '//用户姓名',
  `snid` varchar(100) NOT NULL COMMENT '//SN号',
  `listid` int(10) NOT NULL COMMENT '//奖励ID',
  `addtime` varchar(30) NOT NULL COMMENT '//抽奖时间',
  `status` char(1) NOT NULL COMMENT '//发放状态',
  `do_time` varchar(30) NOT NULL COMMENT '//处理时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_zhuanpan_log`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_zhufu`
--

CREATE TABLE IF NOT EXISTS `wy_zhufu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xid` int(11) NOT NULL,
  `wecha_id` varchar(60) NOT NULL,
  `token` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_zhufu`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_zhu_menu`
--

CREATE TABLE IF NOT EXISTS `wy_zhu_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `order` int(5) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `picurl` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `display` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_zhu_menu`
--


-- --------------------------------------------------------

--
-- 表的结构 `wy_zi_menu`
--

CREATE TABLE IF NOT EXISTS `wy_zi_menu` (
  `zid` int(11) NOT NULL AUTO_INCREMENT,
  `zhu_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `zorder` int(5) DEFAULT NULL,
  `zname` varchar(50) DEFAULT NULL,
  `zpicurl` varchar(100) DEFAULT NULL,
  `zurl` varchar(100) DEFAULT NULL,
  `zdisplay` int(1) DEFAULT NULL,
  PRIMARY KEY (`zid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `wy_zi_menu`
--
