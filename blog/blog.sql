/*
Navicat MySQL Data Transfer

Source Server         : testdb
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2018-01-17 21:34:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `art_art`
-- ----------------------------
DROP TABLE IF EXISTS `art_art`;
CREATE TABLE `art_art` (
  `a_id` int(10) unsigned DEFAULT NULL COMMENT '查询id',
  `t_id` int(10) unsigned DEFAULT NULL COMMENT '被查询id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of art_art
-- ----------------------------
INSERT INTO `art_art` VALUES ('1', '1');
INSERT INTO `art_art` VALUES ('3', '3');
INSERT INTO `art_art` VALUES ('1', '3');
INSERT INTO `art_art` VALUES ('3', '5');
INSERT INTO `art_art` VALUES ('12', '6');
INSERT INTO `art_art` VALUES ('12', '7');
INSERT INTO `art_art` VALUES ('13', '1');
INSERT INTO `art_art` VALUES ('13', '6');
INSERT INTO `art_art` VALUES ('14', '1');
INSERT INTO `art_art` VALUES ('14', '3');

-- ----------------------------
-- Table structure for `blog_admin`
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `a_name` varchar(32) NOT NULL DEFAULT '1' COMMENT '用户名',
  `a_pwd` char(128) NOT NULL DEFAULT '' COMMENT '密码',
  `a_truename` varchar(32) NOT NULL DEFAULT ' ' COMMENT '真名',
  `a_avatar` varchar(128) NOT NULL DEFAULT ' ' COMMENT '用户头像',
  `a_last_time` char(10) NOT NULL DEFAULT '1' COMMENT '最后登录时间',
  `a_last_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'admin1', '1111', ' 超级管理员', ' ', '1515546172', '127.0.0.1');

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `a_title` varchar(255) NOT NULL DEFAULT ' ' COMMENT '文章标题',
  `a_owner` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章作者普通用户id',
  `u_owner` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章作者管理员id',
  `a_desc` varchar(255) DEFAULT NULL COMMENT '简介、描述',
  `a_content` text NOT NULL COMMENT '文章内容',
  `a_create_time` char(10) NOT NULL DEFAULT '1' COMMENT '文章创建时间',
  `a_last_time` char(10) NOT NULL DEFAULT '1' COMMENT '文章编辑时间',
  `a_like` int(11) NOT NULL DEFAULT '0' COMMENT '点赞',
  `a_hits` int(11) NOT NULL DEFAULT '0' COMMENT '点击数',
  `a_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章置顶状态:1置顶 0未置顶',
  `a_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '删除状态:1未删除 0删除',
  `a_del_time` char(10) NOT NULL DEFAULT '1' COMMENT '删除时间',
  `c_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '专区id',
  `a_img` varchar(128) DEFAULT ' ' COMMENT '文章图片',
  `a_thumb` varchar(128) DEFAULT ' ' COMMENT '文章缩略图片',
  `a_water` varchar(128) DEFAULT ' ' COMMENT '文章水印',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '“三九严寒”今日到来 局地气温达负10℃或破历史极值', '0', '1', '中新网北京1月9日 今天开始，中国将迎来一年中最寒冷的“三九天”。连日来，在经历连续多日的雨雪后，大范围寒潮天气中又不断下挫中东部多地的气温。今日起，中国大部地区将迎来持续的“天寒地冻”模式，局地低温接近或跌破历史同期极值。', '两轮雨雪天——全国155县市日降水量突破1月历史极值进入新年以来，“雪”和“雨”成为中国民众讨论最多的话题之一，近期，中国雨雪天气明显增多增强，且来势迅猛。根据中央气象台8日发布的数据，在接连两场大范围的雨雪中，全国共有155个县(市)日降水量突破1月历史极值。中央气象台首席预报员马学款介绍，刚刚过去的两次雨雪过程，中东部地区的雨雪范围高度重叠。其中第一次降雪强度强、范围广；第二次降雪强度虽然不及前次，但落区基本重叠，特别是中到大雪区域重复落在河南、陕西等地，导致上述地区重复受灾或加重灾情。与此同时，南方暴雨范围广，极端性强。第二次雨雪过程中，南方地区出现了区域性暴雨，据统计，50毫米降雨覆盖面积达42.6万平方公里，100毫米覆盖20万平方公里。“降雨强度之强、范围之广，在隆冬季节少见。”马学款称。长时间的雨雪天气也让部分地区因雪成灾。据民政部网站消息，1月2日以来，中东部地区连续出现两轮大范围、强降雪天气过程，截至1月8日11时统计，8省(直辖市)43市(自治州)202个县(市、区)237.5万人受灾，21人死亡，直接经济损失55.5亿元。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中新社记者 武俊杰 摄寒潮黄色预警——局地气温将超10℃ 低温或破历史同期极值雨雪交加之后，中东部大部分地区又迎来大范围大风降温天气。连日来，中央气象台连续发布寒潮预警，8日，寒潮预警的级别从“蓝色”变为“黄色”。根据预警，受冷空气影响，9日至10日，内蒙古中东部、东北地区、黄淮西部、江淮西部、华南沿海及云南东部等地气温将下降6~8℃，局地降温将达10℃以上。北方大部地区有4~6级偏北风，东部和南部海区有7~8级大风。预计9日至13日，黄河以南大部地区平均气温将比常年同期持续偏低4~6℃，其中，陕西中南部、河南、安徽中北部、湖北中西部等地偏低6~10℃。这期间，最低气温0℃线将南压至华南北部，江南中北部最低气温-2~-7℃，陕西南部、河南、湖北北部、安徽北部等地最低气温可达-10~-15℃，局地低于-15℃，接近或突破历史同期极值。14~15日，上述地区气温将逐渐回升至接近常年水平。', '1515465703', '1515466232', '0', '0', '1', '1', '1', '1', '201801091041430.jpg', 'thumb_201801091041430.jpg', ' ');
INSERT INTO `blog_article` VALUES ('2', '19岁女生保送北大读博士 成长经历曝光', '0', '2', '​16岁上大一，今年19岁的王杨璐是西南大学2014级药学院制药工程专业的学生，目前已被保送北大直博。近日，从北京大学请假回校的王杨璐作为校优秀学生标兵在全校巡讲。她将自己的科研经历比如“啃骨头”、“嗑瓜子”，希望激励更多学弟学妹不断进取。', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16岁上大一，今年19岁的王杨璐是西南大学2014级药学院制药工程专业的学生，目前已被保送北大直博。近日，从北京大学请假回校的王杨璐作为校优秀学生标兵在全校巡讲。她将自己的科研经历比如“啃骨头”、“嗑瓜子”，希望激励更多学弟学妹不断进取。　　从“学霸”到“榜样”，王杨璐说，她的成长并没有什么不同，只是找对了每一次的小目标，并努力实现它。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16岁上大学，很多人会联想到“跳级”。王杨璐解释，“其实是上学比较早，我没有上过幼儿园，4岁直接上小学。”王杨璐说，因为小时候不喜欢幼儿园，当时作为小学教师的妈妈，干脆将她带到自己班上。　　“一开始妈妈也特别担心我学习跟不上，所以在小学三年级以前，每到暑假，她都会给我提前上完下学期所有课。”王杨璐特别补充，小学阶段各学科的课妈妈都能教，所以自己基础打得很牢。三年级以后，自己的学习就基本上是班级第一名了。　　这种在假期提前预习的习惯，王杨璐一直保持到高考结束，且颇有成效。“记得每一年暑假，我都会将一学年的英语单词提前全部背完，虽然过程特别辛苦，但开学后学习上更轻松，也让自己尝到甜头，之后就不自觉养成这种习惯了。”王杨璐还曾在中考时取得山西古交市第五名的成绩，那时候老师曾认定她将来能考上北大。“所以这次总算是弥补了中学时的遗憾吧。”　　进入大学，学习方法也随着教学方式、学习环境发生了变化，“需要提前预习的内容很少。”在老师建议下，王杨璐从大一开始将更多精力放在实验室，她也将这段经历比作“啃骨头”“嗑瓜子”。　　大一进入实验室，选最难啃的“骨头”　　王杨璐认为科研就像吃饭睡觉，并没有什么不同，有苦有累，也有一点小确幸。“我特别喜欢吃好吃的，读完本科，我觉得做科研跟吃好吃的同样重要，而且许多事情其实是相通的。如果研究生活就是一场赴宴的话，那么我应该吃点什么，又该怎么去吃呢？“想来想去，她表示自己会选择这三样：就是啃骨头、嗑瓜子、熬清汤。　　王杨璐大一下学期申请进实验室跟着老师搞研究。“虽然自己当时什么都不会，但是谁都是从不会到会的。“刚接触实验，王杨璐觉得很新奇，每天只要有时间就跑到实验室跟着师姐做。“师姐什么时候回去我再回去，一般都是晚上12点左右才回宿舍。”　　之后，老师推选她参加院创项目（西南大学药学实验教学中心本科生创新实验项目） 。“想到自己年轻，又想满足好奇心。”王杨璐没有选择实验室最擅长的方向，而是提了一个和老师研究方向基本不沾边的课题。“我喜欢看电视，尤其喜欢看动物世界。寒假看了一部肠道微生物对人类健康的影响纪录片，讲述一个人有口臭，各种方法都治不好，连工作也丢了，然后科学家就给他分析了一下他口腔里和正常人口腔里相比较，缺了哪些重要的微生物，然后给他做了一个漱口水，每天拿微生物漱口，最后竟然治好了。”王杨璐就选了治口臭这个课题，尽管这个课题到现在也还没做出　　有了这些经历，王杨璐在大二上学期申请了校创（西南大学第八届本科生科技创新基金项目），大二下学期申请了国创（2016国家级大学生创新创业训练计划项目 ）。期间，老师推荐她做现在很火的植物内生细菌，表示很多人做，也好出结果。王杨璐却问，“内生真菌做的人多吗？”老师说不多，因为比较难。“好，我做内生真菌，啃别人没啃过的骨头！”王杨璐成为实验室第一个做这个课题的人，前几步是通用步骤，还有一些经验可以参考，后面就完全是自己摸着石头过河了。　　“刚开始是排斥的，但觉得自己这件事情一定要做好，就抱着这样的心态之后，发现这件事情好像并没有这么难，做着做着就做成了。”最后还和老师一起写了篇教改论文投稿并发表。　　这个事情也给了她信心，哪怕是从零开始，只要自己咬定这个骨头不放松，也是可以后来居上。　　科研像“啃瓜子” 可以尝到甜头　　王杨璐形容自己的科研经历在啃完骨头之后，就慢慢进入一个嗑瓜子的状态。嗑瓜子虽然是特别低效的一件事，但很多人都喜欢。“我想应该是每磕完一颗瓜子之后，都可以吃到一颗瓜子仁，它对你不停地有一个正反馈，所以会让你觉得可以继续吃下去。”王杨璐认为，科研就像嗑瓜子，刚开始的起步阶段需要一些小小的成果来激励自己，让自己坚持做下去。　　理论基础已经具备，就开始实践了。“扛着大剪子去剪树枝，给树枝消毒的时候要先蘸酒精然后用酒精灯灼烧，反复循环，谁知道树枝太烫了，直接把烧杯里面的酒精给引燃了，当时第一个想法是怕是要被逐出实验室，后来想起做菜的时候锅里着火要盖灭，就拿培养皿盖迅速盖在上面，保住了一条小命......”王杨璐在巡讲中，常常将科研经历讲得生动有趣。　　“反正就这么周而复始，像嗑瓜子一样无聊，却穿插着瓜子仁的一样好吃的小结果。”经过不断努力，最终王杨璐的国创顺利结题，校创顺利结题并获得一等奖，一篇论文在投。　　大三时，王杨璐去南京参加了“世界大学生药苑论坛”，和来自北京大学、复旦大学、中国药科大学等48所全国知名医药类高校的80余名选手竞争、交流、相互提高。王杨璐的研究课题《重庆市香樟树内生真菌的多样性活性研究》最终获得“优秀论文奖”和“创新成果一等奖”。　　紧张学习之余，王杨璐喜欢用漫画放松自己。“我并不是学霸，总觉得用脑过度，所以从小学到现在，我喜欢看漫画这种不费脑子的事情来放松自己。”留着姬发的王杨璐是十足的漫画迷，性格也十分开朗活泼。　　想进最顶尖实验室，获北大直博　　大二时，王杨璐在了解到之前有很多学姐学长都保送中科院研究生后，也有了这样的计划。去年暑假，她参加了中科院暑期夏令营，并获得保送名额。“在大家都觉得我可以安稳舒适进中科院的时候，我觉得自己想试试顶尖的东西，想试试走在最前沿的研究。”　　去年9月，王杨璐申请了北京大学前沿交叉学院，希望进入干细胞领域顶尖的实验室进行深造。由于时间紧张，接到北大老师的电话后，王杨璐第二天就赶到北京，当天晚上先和师姐师兄面试。“面试了一个半小时，问了一些跨专业的知识，但在本科阶段没有学过，我想这次肯定没戏了。”　　为了第二天正式面试，王杨璐又熬夜完成了本科阶段科研介绍的ppt。在面试交流中，本科阶段丰富的科研经历，让她得到老师认可，最终获得北大直博。　　王杨璐说，瓜子嗑多了会上火，所以就开始反思，觉得自己真正需要的是一碗清汤。“学术更像熬清汤一样，它可能平淡无奇，但它是汤中极品，所以希望有一天能够熬出自己的一碗科研的清汤。”', '1515466068', '1515466190', '0', '0', '1', '1', '1', '7', '201801091047477.jpg', 'thumb_201801091047477.jpg', ' ');
INSERT INTO `blog_article` VALUES ('3', '113123', '0', '1', '1231231', '1231231', '1515485719', '1515485719', '0', '0', '1', '1', '1', '2', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('4', '113123', '0', '1', '1231231', '1231231', '1515485741', '1515485741', '0', '0', '0', '1', '1', '2', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('5', '113123', '0', '1', '1231231', '1231231', '1515485766', '1515485766', '0', '0', '0', '1', '1', '3', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('6', '113123', '0', '1', '1231231', '1231231', '1515485882', '1515485882', '0', '0', '0', '1', '1', '3', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('7', '113123', '0', '1', '1231231', '1231231', '1515486076', '1515486076', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('8', '113123', '0', '1', '1231231', '1231231', '1515486089', '1515486089', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('9', '113123', '0', '1', '1231231', '1231231', '1515486153', '1515486153', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('10', '12415', '0', '1', '512515125', '2515125125123123', '1515486204', '1515486204', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('11', '124124124', '0', '1', '12412412412412414', 'asdfasdfasfasdf', '1515486599', '1515486599', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('12', '124124124', '0', '1', '12412412412412414', 'asdfasdfasfasdf', '1515486615', '1515486615', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('13', '黑色', '0', '1', '黑色', '黑色', '1515547855', '1515547855', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');
INSERT INTO `blog_article` VALUES ('14', '测试2', '0', '1', '测试2', '测试2', '1515548948', '1515548948', '0', '0', '0', '1', '1', '1', 'default_img.jpeg', 'thumb_default_img.jpeg', ' ');

-- ----------------------------
-- Table structure for `blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `c_name` varchar(32) NOT NULL DEFAULT '' COMMENT '专区名',
  `c_pid` varchar(10) NOT NULL DEFAULT '0' COMMENT '专区等级',
  `c_sort` varchar(10) NOT NULL DEFAULT '1' COMMENT '排序',
  `c_role` char(1) NOT NULL DEFAULT '0' COMMENT '修改访问权限：0普通用户 1管理员',
  `c_create_time` char(10) NOT NULL DEFAULT '1' COMMENT '专区创建时间',
  `c_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '删除状态:1未删除 0删除',
  `c_del_time` char(10) NOT NULL DEFAULT '1' COMMENT '删除时间',
  `c_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '专区描述',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '国内', '0', '1', '0', '1000000000', '1', '1515154294', '123312');
INSERT INTO `blog_category` VALUES ('2', '国际', '0', '2', '0', '1000000000', '1', '1515149438', '123');
INSERT INTO `blog_category` VALUES ('3', '综合区', '0', '3', '0', '1000000000', '1', '1515154304', '123123');
INSERT INTO `blog_category` VALUES ('4', '时政', '1', '1001', '0', '1515133656', '1', '1515154325', 'admintest');
INSERT INTO `blog_category` VALUES ('7', '社会', '1', '1002', '0', '1515154376', '1', '1', '123');
INSERT INTO `blog_category` VALUES ('8', '内蒙古时政', '4', '123', '0', '1515586928', '1', '1', '内蒙古时政');
INSERT INTO `blog_category` VALUES ('9', '河北时政', '4', '12314', '0', '1515586948', '1', '1', '河北时政');

-- ----------------------------
-- Table structure for `blog_record`
-- ----------------------------
DROP TABLE IF EXISTS `blog_record`;
CREATE TABLE `blog_record` (
  `r_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `u_id` int(10) unsigned DEFAULT NULL COMMENT '回复人的id',
  `r_content` text NOT NULL COMMENT '回复的内容',
  `r_a_id` int(10) unsigned DEFAULT NULL COMMENT '回复帖子的id',
  `r_pid` int(10) unsigned DEFAULT '0' COMMENT '回复本帖回复的id',
  `r_time` char(10) NOT NULL DEFAULT '' COMMENT '回复的时间',
  `r_like` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '喜欢',
  `r_diss` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '踩',
  `r_del` char(1) NOT NULL DEFAULT '1' COMMENT '删除状态: 1未删除 0已删除',
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_record
-- ----------------------------
INSERT INTO `blog_record` VALUES ('1', '1', '123', '2', '0', '', '0', '0', '1');
INSERT INTO `blog_record` VALUES ('2', '1', '321', '1', '0', '1515469413', '0', '0', '1');
INSERT INTO `blog_record` VALUES ('3', '1', '234', '1', '0', '1515469444', '0', '0', '1');
INSERT INTO `blog_record` VALUES ('4', '1', '1231231231', '1', '0', '1515469885', '0', '0', '1');
INSERT INTO `blog_record` VALUES ('5', '1', '123', '7', '0', '1515551701', '0', '0', '1');
INSERT INTO `blog_record` VALUES ('6', '1', '123', '6', '0', '1515584951', '0', '0', '1');
INSERT INTO `blog_record` VALUES ('7', '1', '123123', '4', '0', '1515651298', '0', '0', '1');

-- ----------------------------
-- Table structure for `blog_user`
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `u_name` varchar(32) NOT NULL DEFAULT '1' COMMENT '用户名',
  `u_pwd` char(128) NOT NULL DEFAULT '1' COMMENT '密码',
  `u_nickname` varchar(32) NOT NULL DEFAULT ' ' COMMENT '昵称',
  `u_avatar` varchar(128) NOT NULL DEFAULT ' ' COMMENT '用户头像',
  `u_reg_time` char(10) NOT NULL DEFAULT '1' COMMENT '注册时间',
  `u_reg_ip` char(15) NOT NULL DEFAULT '' COMMENT '注册IP',
  `u_last_time` char(10) NOT NULL DEFAULT '1' COMMENT '最后登录时间',
  `u_last_ip` varchar(128) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `u_score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'admin1', '1111', '太上老君', 'thumb_201801091041430.jpg', '1000000000', '129.0.0.1', '1000000000', '134.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('2', 'admin2', '1111', '齐天大圣', 'thumb_201801091041430.jpg', '1000000000', '130.0.0.1', '1515123641', '135.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('3', 'admin3', '1111', '罗天大醮', 'thumb_201801091047477.jpg ', '1000000000', '131.0.0.1', '1000000000', '136.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('4', 'admin4', '1111', '西楚霸王', ' ', '1000000000', '132.0.0.1', '1515123641', '137.0.0.1', '0');
INSERT INTO `blog_user` VALUES ('5', 'admin5', '1111', '刘佳彬', ' ', '1000000000', '133.0.0.1', '1000000000', '138.0.0.1', '0');

-- ----------------------------
-- Table structure for `tag`
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `t_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `t_name` varchar(64) NOT NULL COMMENT '关键词',
  `t_flag` int(10) unsigned DEFAULT '0' COMMENT '主键冲突更新此记录',
  PRIMARY KEY (`t_id`),
  UNIQUE KEY `t_name` (`t_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('1', '黑色', '3');
INSERT INTO `tag` VALUES ('3', '测试', '2');
INSERT INTO `tag` VALUES ('5', '标签', '0');
INSERT INTO `tag` VALUES ('6', '123', '1');
INSERT INTO `tag` VALUES ('7', '231', '0');
