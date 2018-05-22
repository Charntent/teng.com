/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : thome

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-03 19:39:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `th_components`
-- ----------------------------
DROP TABLE IF EXISTS `th_components`;
CREATE TABLE `th_components` (
  `cop_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(4) NOT NULL COMMENT '分类id',
  `cop_name` varchar(20) NOT NULL COMMENT '组件名称',
  `cop_css` text NOT NULL COMMENT 'css内容',
  `cop_tpl` text NOT NULL COMMENT '组件html模板',
  `add_time` int(11) NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `praise` int(11) NOT NULL DEFAULT '0' COMMENT '点赞量',
  `usenums` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`cop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_components
-- ----------------------------

-- ----------------------------
-- Table structure for `th_sites`
-- ----------------------------
DROP TABLE IF EXISTS `th_sites`;
CREATE TABLE `th_sites` (
  `site_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(20) NOT NULL COMMENT '站点名称',
  `site_logo` varchar(150) NOT NULL COMMENT '站点LOGO',
  `font_max` tinyint(1) NOT NULL DEFAULT '20' COMMENT '最大字体',
  `font_mid` tinyint(1) NOT NULL DEFAULT '16' COMMENT '字体中',
  `font_small` tinyint(1) NOT NULL DEFAULT '12' COMMENT '字体最小',
  `color_main` varchar(30) NOT NULL DEFAULT '#333' COMMENT '主色调',
  `color_minor` varchar(30) NOT NULL DEFAULT '#666' COMMENT '次要色',
  `color_light` varchar(30) NOT NULL DEFAULT '#999',
  `font_weight` varchar(20) NOT NULL DEFAULT '300' COMMENT '字体权重',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `clicks` int(11) NOT NULL DEFAULT '0' COMMENT '点击量浏览量',
  `ranks` int(11) NOT NULL DEFAULT '0' COMMENT '藤网排名',
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_sites
-- ----------------------------

-- ----------------------------
-- Table structure for `th_user`
-- ----------------------------
DROP TABLE IF EXISTS `th_user`;
CREATE TABLE `th_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` int(20) NOT NULL,
  `phone` varchar(12) NOT NULL COMMENT '手机号码',
  `userpwd` varchar(35) NOT NULL COMMENT '用户密码',
  `salt` varchar(10) NOT NULL DEFAULT '' COMMENT '加盐',
  `regtime` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `lastlogintime` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `regip` varchar(50) NOT NULL COMMENT '注册IP',
  `lastip` varchar(50) NOT NULL COMMENT '最后登录的IP地址',
  `loginnum` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_user
-- ----------------------------
INSERT INTO `th_user` VALUES ('1', '0', '15295892896', '6960793b956004322c418f61e34e86a7', '', '1524708329', '1524708329', '127.0.0.1', '127.0.0.1', '1');
INSERT INTO `th_user` VALUES ('2', '0', '15295892894', 'b5732510e6157a0eae754b29167e5e0d', 'hs131z', '1524708459', '1524708459', '127.0.0.1', '127.0.0.1', '1');
INSERT INTO `th_user` VALUES ('3', '0', '15295892890', 'af4d3b21c5fd991cc0c665de242b48f8', 'hed4dy', '1524708620', '1524708620', '127.0.0.1', '127.0.0.1', '1');
INSERT INTO `th_user` VALUES ('4', '0', '15295892891', '31d783c7187001cff4a225701fe56075', 'zfbj14', '1524708714', '1524708714', '127.0.0.1', '127.0.0.1', '1');
INSERT INTO `th_user` VALUES ('5', '0', '15295892892', '5eeb12022909e955abd7531113083139', 's8p60t', '1524711164', '1524711164', '127.0.0.1', '127.0.0.1', '1');
INSERT INTO `th_user` VALUES ('6', '0', '15295892893', '5af2920f7153938e0099fab7e8c3163a', 'c9it6y', '1524713386', '1524713386', '127.0.0.1', '127.0.0.1', '1');
INSERT INTO `th_user` VALUES ('7', '0', '15295892895', '8ad95a7d0acd316c59848f2c760e3089', '5v28yi', '1524713469', '1525335240', '127.0.0.1', '127.0.0.1', '10');
INSERT INTO `th_user` VALUES ('8', '0', '13557229695', 'e5d0bb80f4e074e5eab8929880e93651', 'dm261p', '1525260526', '1525263595', '127.0.0.1', '127.0.0.1', '2');
