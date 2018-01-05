-- 创建博客数据库
create database if not exists blog;
-- 创建文章表
create table blog_article(
a_id int unsigned primary key auto_increment comment '主键',
a_title varchar(255) not null default ' ' comment '文章标题',
a_owner int unsigned  not null default 1 comment '文章作者',
a_desc varchar(255) comment '简介、描述',
a_category varchar(32) comment '专区名',
a_content text comment '内容',
a_create_time char(10) not null default '1' comment '文章创建时间',
a_last_time char(10) not null default '1' comment '文章编辑时间',
a_like int not null default 0 comment '点赞',
a_hits int not null  default 0 comment '点击数',
a_top tinyint(1) not null default 0 comment '文章置顶状态:1置顶 0未置顶',
a_del tinyint(1) not null default 1 comment '删除状态:1未删除 0删除',
a_del_time char(10) not null default '1' comment '删除时间',
c_id int unsigned not null default 1 comment '专区id'
)charset utf8;

-- 测试数据
insert into blog_article(a_title,a_owner,a_create_time,a_last_time,a_top) values('test1','admin1','1000000000','1000000000',1),('test2','admin2','1000000000','1000000000',0),('test3','admin3','1000000000','1000000000',0),('test4','admin4','1000000000','1000000000',1),('test5','admin5','1000000000','1000000000',0);

-- 创建用户表
create table blog_user(
u_id int unsigned primary key auto_increment comment '主键',
u_name varchar(32) not null default '1' comment '用户名',
u_pwd char(128) not null default '1' comment '密码',
u_nickname varchar(32) not null default ' ' comment '昵称',
u_avatar int not null default 0 comment '用户头像',
u_reg_time char(10) not null default '1' comment '注册时间',
u_reg_ip char(15) not null default '' comment '注册IP',
u_last_time char(10) not null default '1' comment '最后登录时间',
u_last_ip varchar(128) not null default '' comment '最后登录IP',
u_score int not null default 0 comment '用户积分'
)charset utf8;

-- 用户分组
-- u_role char(1) not null default 0 comment '用户权限：0普通用户 1管理员'

-- 登录次数
-- u_login_num int not null default 0 comment '登录次数',

-- 测试数据
insert into blog_user(u_name,u_pwd,u_nickname,u_reg_time,u_reg_ip,u_last_time,u_last_ip) values('admin1','1111','admin1','1000000000','129.0.0.1','1000000000','134.0.0.1'),('admin2','1111','admin2','1000000000','130.0.0.1','1000000000','135.0.0.1'),('admin3','1111','admin3','1000000000','131.0.0.1','1000000000','136.0.0.1'),('admin4','1111','admin4','1000000000','132.0.0.1','1000000000','137.0.0.1'),('admin5','1111','admin5','1000000000','133.0.0.1','1000000000','138.0.0.1');

-- 专区表
create table blog_category(
c_id int unsigned primary key auto_increment comment '主键',
c_name varchar(32) not null default '' comment '专区名',
c_desc varchar(255) not null default '' comment '专区描述',
c_pid varchar(10) not null default '0' comment '专区等级:0是最高级',
c_sort varchar(10) not null default '1' comment '排序',
c_role char(1) not null default 0 comment '修改访问权限：0普通用户 1管理员',
c_create_time char(10) not null default '1' comment '专区创建时间',
c_del tinyint(1) not null default 1 comment '删除状态:1未删除 0删除',
c_del_time char(10) not null default '1' comment '删除时间'
)charset utf8;

-- 测试数据
insert into blog_category(c_name,c_pid,c_create_time) values('综合区','0','1000000000'),('灌水区','0','1000000000'),('技术交流区','0','1000000000');

-- 创建管理员表
create table blog_admin(
a_id int unsigned primary key auto_increment comment '主键',
a_name varchar(32) not null default '1' comment '用户名',
a_pwd char(128) not null default '' comment '密码',
a_truename varchar(32) not null default ' ' comment '真名',
a_avatar int not null default 0 comment '用户头像',
a_last_time char(10) not null default '1' comment '最后登录时间',
a_last_ip varchar(128) not null default '' comment '最后登录IP'
)charset utf8;

-- 角色权限
-- a_role char(1) not null default 0 comment '用户权限(部门)：0普通管理员 1高级管理员.....'

-- 测试数据
insert into blog_admin(a_name,a_pwd) values('admin1','1111');


-- 回复表
create table blog_record(
r_id int unsigned primary key auto_increment comment '主键',
r_a_id int unsigned comment '回复帖子的id',
r_id int unsigned  comment '主键',
r_like
)charset utf8;
