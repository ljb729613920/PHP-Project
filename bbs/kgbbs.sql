/*
Navicat MySQL Data Transfer

Source Server         : testdb
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : kgbbs

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2018-01-17 21:34:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `area`
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `area_name` varchar(20) NOT NULL COMMENT '专区名',
  `area_role` int(11) NOT NULL DEFAULT '0' COMMENT '专区权限0所有用1只有管理员',
  `area_del` int(11) NOT NULL DEFAULT '1' COMMENT '是否已删除，1未被删除，0已被删除',
  `area_create_time` char(10) NOT NULL DEFAULT '0' COMMENT '专区运营时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_name` (`area_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO `area` VALUES ('1', '综合交流区', '0', '1', '1513578461');

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_title` varchar(20) NOT NULL DEFAULT '' COMMENT '题目',
  `a_owner` varchar(32) NOT NULL DEFAULT '' COMMENT '发帖人',
  `a_content` text NOT NULL COMMENT '发帖内容',
  `a_time` char(10) NOT NULL DEFAULT '' COMMENT '发帖时间',
  `a_hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '帖子浏览次数',
  `a_like` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '帖子点赞数',
  `a_top` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '帖子是否置顶，1置顶0否',
  `a_area` varchar(20) NOT NULL COMMENT '所属专区名',
  `a_del` smallint(6) NOT NULL DEFAULT '1' COMMENT '帖子删除，1未被删除，0已被删除',
  `a_apply_top` smallint(6) NOT NULL DEFAULT '0' COMMENT '是否请求置顶1请求置顶0未请求置顶',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '第一个帖子', 'admin_1', '我是第一人，超管', '1514031820', '231', '4', '0', '综合交流区', '1', '0');

-- ----------------------------
-- Table structure for `record`
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `r_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `r_a_id` int(10) unsigned NOT NULL COMMENT '主贴的id',
  `r_content` varchar(255) NOT NULL DEFAULT '' COMMENT '回复内容',
  `r_username` varchar(32) NOT NULL DEFAULT '' COMMENT '回复人的用户名',
  `r_time` char(10) NOT NULL DEFAULT '' COMMENT '回复时间',
  `r_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复的楼层数',
  `r_r_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '楼中楼的id',
  `r_del` smallint(6) NOT NULL DEFAULT '1' COMMENT '帖子删除，1未被删除，0已被删除',
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO `record` VALUES ('1', '1', '沙发', 'admin_1', '1514031877', '1', '0', '1');
INSERT INTO `record` VALUES ('2', '1', '沙发', 'admin_1', '1514031884', '2', '0', '1');
INSERT INTO `record` VALUES ('3', '1', '抢沙发', 'admin_1', '1514031892', '3', '0', '1');
INSERT INTO `record` VALUES ('4', '1', '抢沙发', 'admin_1', '1514031900', '4', '0', '1');
INSERT INTO `record` VALUES ('5', '1', '我来回复3楼', 'admin_1', '1514031941', '5', '3', '1');
INSERT INTO `record` VALUES ('6', '1', '回复4楼', 'admin_1', '1514031992', '6', '4', '1');
INSERT INTO `record` VALUES ('7', '1', '123', 'admin_1', '1514032474', '7', '0', '1');
INSERT INTO `record` VALUES ('8', '1', '1234', 'admin_1', '1514032511', '8', '0', '1');
INSERT INTO `record` VALUES ('9', '1', '312', 'admin_1', '1514032532', '9', '5', '1');

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` char(32) NOT NULL COMMENT '密码',
  `email` varchar(32) NOT NULL COMMENT '用户邮箱 ',
  `nickname` varchar(32) DEFAULT NULL COMMENT '昵称',
  `profile` varchar(100) NOT NULL DEFAULT '../public/images/default.png' COMMENT '头像',
  `reg_time` char(10) NOT NULL COMMENT '注册时间 ',
  `reg_ip` char(15) NOT NULL COMMENT '注册ip ',
  `last_login_time` char(10) NOT NULL COMMENT '最后登录时间 ',
  `last_login_ip` char(15) NOT NULL COMMENT '最后登录ip ',
  `user_role` int(11) NOT NULL DEFAULT '0' COMMENT '角色0:普通用户1管理员',
  `user_allowed` int(11) NOT NULL DEFAULT '1' COMMENT '用户禁言1正常发言0禁言',
  `score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '等级积分',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', 'admin_1', '96e79218965eb72c92a549dd5a330112', '123@qq.com', 'admin_1', '../public/images/default.png', '1514030270', '127.0.0.1', '1514858332', '127.0.0.1', '0', '1', '3');
