<?php
/**
 * 项目入口文件
 */
// 定义项目目录
define('APP_PATH','./App');
// 加载框架初始化文件
include_once './frame/core/frame.class.php';
// 调用初始化文件
Frame::run();
