/*
Navicat MySQL Data Transfer

Source Server         : kgbbs
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-01-06 23:40:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `blog_admin`
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '涓婚敭',
  `a_name` varchar(32) NOT NULL DEFAULT '1' COMMENT '鐢ㄦ埛鍚',
  `a_pwd` char(128) NOT NULL DEFAULT '' COMMENT '瀵嗙爜',
  `a_truename` varchar(32) NOT NULL DEFAULT ' ' COMMENT '鐪熷悕',
  `a_avatar` int(11) NOT NULL DEFAULT '0' COMMENT '鐢ㄦ埛澶村儚',
  `a_last_time` char(10) NOT NULL DEFAULT '1' COMMENT '鏈?悗鐧诲綍鏃堕棿',
  `a_last_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '鏈?悗鐧诲綍IP',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'admin1', '1111', ' 刘佳彬', '0', '1515246588', '127.0.0.1');

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '涓婚敭',
  `a_title` varchar(255) NOT NULL DEFAULT ' ' COMMENT '鏂囩珷鏍囬?',
  `a_owner` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '鏂囩珷浣滆?',
  `a_desc` varchar(255) DEFAULT NULL COMMENT '绠?粙銆佹弿杩',
  `a_content` text COMMENT '鍐呭?',
  `a_create_time` char(10) NOT NULL DEFAULT '1' COMMENT '鏂囩珷鍒涘缓鏃堕棿',
  `a_last_time` char(10) NOT NULL DEFAULT '1' COMMENT '鏂囩珷缂栬緫鏃堕棿',
  `a_like` int(11) NOT NULL DEFAULT '0' COMMENT '鐐硅禐',
  `a_hits` int(11) NOT NULL DEFAULT '0' COMMENT '鐐瑰嚮鏁',
  `a_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '鏂囩珷缃?《鐘舵?:1缃?《 0鏈?疆椤',
  `a_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '鍒犻櫎鐘舵?:1鏈?垹闄?0鍒犻櫎',
  `a_del_time` char(10) NOT NULL DEFAULT '1' COMMENT '鍒犻櫎鏃堕棿',
  `c_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '涓撳尯id',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', 'test1', '1', '测试1内容', '测试1内容', '1000000002', '1515246298', '0', '0', '1', '1', '1', '3');
INSERT INTO `blog_article` VALUES ('2', 'test2', '1', '测试2', '测试2内容', '1000000005', '1515173617', '0', '0', '1', '1', '1', '1');
INSERT INTO `blog_article` VALUES ('3', 'test3', '1', '测试3', '测试3内容', '1000000001', '1515173640', '0', '0', '0', '1', '1', '1');
INSERT INTO `blog_article` VALUES ('4', 'test4', '1', '测试4', '测试4内容', '1000000004', '1515173653', '0', '0', '0', '1', '1', '1');
INSERT INTO `blog_article` VALUES ('5', 'test5', '1', '测试55', '测试5内容', '1000000003', '1515173665', '0', '0', '0', '1', '1', '1');

-- ----------------------------
-- Table structure for `blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '涓婚敭',
  `c_name` varchar(32) NOT NULL DEFAULT '' COMMENT '涓撳尯鍚',
  `c_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '涓撳尯鎻忚堪',
  `c_pid` varchar(10) NOT NULL DEFAULT '0' COMMENT '涓撳尯绛夌骇:0鏄?渶楂樼骇',
  `c_sort` varchar(10) NOT NULL DEFAULT '1' COMMENT '鎺掑簭',
  `c_role` char(1) NOT NULL DEFAULT '0' COMMENT '淇?敼璁块棶鏉冮檺锛?鏅??鐢ㄦ埛 1绠＄悊鍛',
  `c_create_time` char(10) NOT NULL DEFAULT '1' COMMENT '涓撳尯鍒涘缓鏃堕棿',
  `c_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '鍒犻櫎鐘舵?:1鏈?垹闄?0鍒犻櫎',
  `c_del_time` char(10) NOT NULL DEFAULT '1' COMMENT '鍒犻櫎鏃堕棿',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '综合区', '杂七杂八', '0', '1', '0', '1000000000', '1', '1515248441');
INSERT INTO `blog_category` VALUES ('2', '灌水区', '划水撩闲区', '0', '3', '0', '1000000000', '1', '1515248260');
INSERT INTO `blog_category` VALUES ('3', '技术交流区', '交♂流技术的地方', '0', '2', '0', '1000000000', '1', '1515248281');
INSERT INTO `blog_category` VALUES ('4', 'php专区', '交流php的地方123142123', '6', '60', '0', '1515248167', '1', '1515250187');
INSERT INTO `blog_category` VALUES ('5', 'Java', '123', '3', '123', '0', '1515249977', '1', '1');
INSERT INTO `blog_category` VALUES ('6', 'python', '123', '3', '123', '0', '1515250017', '1', '1');
INSERT INTO `blog_category` VALUES ('7', 'thinkphp', 'thinkphp', '4', '45', '0', '1515250036', '1', '1');
INSERT INTO `blog_category` VALUES ('8', 'yii', '123', '4', '324', '0', '1515250056', '1', '1');

-- ----------------------------
-- Table structure for `blog_user`
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '涓婚敭',
  `u_name` varchar(32) NOT NULL DEFAULT '1' COMMENT '鐢ㄦ埛鍚',
  `u_pwd` char(128) NOT NULL DEFAULT '1' COMMENT '瀵嗙爜',
  `u_nickname` varchar(32) NOT NULL DEFAULT ' ' COMMENT '鏄电О',
  `u_avatar` int(11) NOT NULL DEFAULT '0' COMMENT '鐢ㄦ埛澶村儚',
  `u_reg_time` char(10) NOT NULL DEFAULT '1' COMMENT '娉ㄥ唽鏃堕棿',
  `u_reg_ip` char(15) NOT NULL DEFAULT '' COMMENT '娉ㄥ唽IP',
  `u_last_time` char(10) NOT NULL DEFAULT '1' COMMENT '鏈?悗鐧诲綍鏃堕棿',
  `u_last_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '鏈?悗鐧诲綍IP',
  `u_score` int(11) NOT NULL DEFAULT '0' COMMENT '鐢ㄦ埛绉?垎',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'admin1', '1111', 'admin1', '0', '1000000000', '129.0.0.1', '1000000000', '134.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('2', 'admin2', '1111', 'admin2', '0', '1000000000', '130.0.0.1', '1000000000', '135.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('3', 'admin3', '1111', 'admin3', '0', '1000000000', '131.0.0.1', '1000000000', '136.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('4', 'admin4', '1111', 'admin4', '0', '1000000000', '132.0.0.1', '1000000000', '137.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('5', 'admin5', '1111', 'admin5', '0', '1000000000', '133.0.0.1', '1000000000', '138.0.0.1', '0');
