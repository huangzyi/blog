/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-10 16:43:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `arcid` int(10) NOT NULL AUTO_INCREMENT,
  `article` text,
  `author` varchar(20) DEFAULT NULL,
  `authorid` varchar(20) DEFAULT NULL,
  `now` datetime DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`arcid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur doloribus ipsum harum, modi quaerat est suscipit iste, quis nostrum vel facere odit dolore quidem maxime. Eos saepe suscipit architecto soluta.', '5445', '12', '2016-03-01 12:49:51', 'Lorem ipsum dolor sit amet');
INSERT INTO `article` VALUES ('2', '纷纷为发热威锋网', '5445', '12', '2016-03-05 13:48:58', '减肥写欧风');
INSERT INTO `article` VALUES ('3', '放入饭和司法', '5445', '12', '2016-03-05 13:49:23', '非农覅偶而非奇偶额日记');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comid` int(10) NOT NULL AUTO_INCREMENT,
  `arcid` int(4) NOT NULL,
  `userid` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`comid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '0', '5445', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur doloribus ipsum harum, modi quaerat est suscipit iste, quis nostrum vel facere odit dolore quidem maxime. Eos saepe suscipit architecto soluta', '2016-03-02 01:45:08');

-- ----------------------------
-- Table structure for friend
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postcode` varchar(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `wechat` varchar(20) DEFAULT NULL,
  `QQ` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------

-- ----------------------------
-- Table structure for public
-- ----------------------------
DROP TABLE IF EXISTS `public`;
CREATE TABLE `public` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of public
-- ----------------------------

-- ----------------------------
-- Table structure for tpsc
-- ----------------------------
DROP TABLE IF EXISTS `tpsc`;
CREATE TABLE `tpsc` (
  `id` int(10) NOT NULL,
  `topic` varchar(30) DEFAULT NULL,
  `file` blob NOT NULL,
  `author` varchar(20) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tpsc
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `blogname` varchar(20) DEFAULT NULL,
  `realname` varchar(20) DEFAULT NULL,
  `userpassport` varchar(40) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postcode` varchar(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `wechat` varchar(20) DEFAULT NULL,
  `QQ` varchar(20) DEFAULT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '35435', null, null, '353543', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('2', ' 格尼尔', null, null, '5965984', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('4', 'bhyuy', null, null, '26265', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('7', 'frerf', null, null, 'effe', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('8', 'gyyug', null, null, '1586814', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('9', '35435', null, null, '554', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('10', '5487', null, null, '254', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('12', '5445', null, null, '514', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('13', '35435', null, null, '4554', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('14', 'rgtg', null, null, 'bgbg', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('15', 'ht', null, null, 'trhe', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('17', 'dede', null, null, 'cdffc', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('19', 'efefr', null, null, 'frerfre', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('20', 'fhueh', null, null, 'vff', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('21', 'huangziyi', null, null, 'dssd', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('22', 'cdscfd', null, null, 'dcvscvsdc', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('23', 'fdvdfv', null, null, 'vfdvdv', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('24', 'vfdvdfv', null, null, 'svdfvdfvd', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('25', 'efewfe', null, null, 'vfdvfdv', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('26', 'dfbvfgb', null, null, 'dfbsdfb', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('27', 'ddf', null, null, 'sdfs', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('28', 'fvdfv', null, null, 'vfdvf', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('29', 'dfsdsf', null, null, 'vfdvdfv', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('30', 'fgfdgdf', null, null, 'bggfbgfb', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('32', 'dcdsc', null, null, 'vfdvfdv', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('33', 'dscsdc', null, null, 'vdfvfv', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('34', 'gyuggygu', null, null, 'tfytyty', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user` VALUES ('35', 'ht', null, null, '5959', null, null, null, null, null, null, null, null, null, null, null, null, null);
