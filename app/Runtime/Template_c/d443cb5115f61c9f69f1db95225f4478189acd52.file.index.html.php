<?php /* Smarty version Smarty-3.1.16, created on 2018-01-06 20:59:49
         compiled from ".\App\admin\views\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:294445a506acbb66701-29512387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd443cb5115f61c9f69f1db95225f4478189acd52' => 
    array (
      0 => '.\\App\\admin\\views\\index\\index.html',
      1 => 1515243421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294445a506acbb66701-29512387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a506acbc41340_60228851',
  'variables' => 
  array (
    'activeUser' => 0,
    'totalArticle' => 0,
    'totalRecord' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a506acbc41340_60228851')) {function content_5a506acbc41340_60228851($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\php9\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-后台管理</title>
    <link rel="stylesheet" href="/public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/public/admin/css/admin.css">
    <script src="/public/admin/js/jquery.js"></script>
    <script src="/public/admin/js/pintuer.js"></script>
    <script src="/public/admin/js/respond.js"></script>
    <script src="/public/admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="/public/admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
    <?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>"1",'sub'=>''), 0);?>


        <div class="admin-bread">
            <span>您好，<?php echo $_SESSION['userInfo']['a_truename'];?>
，欢迎您的光临。</span>
            <ul class="bread">
                <li><a href="index.php?g=admin&c=index&a=index" class="icon-home"> 开始</a></li>
                <li>后台首页</li>
            </ul>
        </div>
    </div>
</div>

<div class="admin">
	<div class="line-big">
    	<div class="xm3">
        	<div class="panel border-back">
            	<div class="panel-body text-center">
                	<img src="/public/admin/images/face.jpg" width="120" class="radius-circle" /><br />
                    admin
                </div>
                <div class="panel-foot bg-back border-back">您好，<?php echo $_SESSION['userInfo']['a_truename'];?>
，上次登陆的ip为：<?php echo $_SESSION['userInfo']['a_last_ip'];?>
，上次登录时间<?php echo smarty_modifier_date_format($_SESSION['userInfo']['a_last_time'],'Y-m-d H:i:s');?>
。</div>
            </div>
            <br />
        	<div class="panel">
            	<div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                        <li><span class="float-right badge bg-red"><?php echo $_smarty_tpl->tpl_vars['activeUser']->value;?>
</span><span class="icon-user"></span> 活跃会员</li>
                        <li><span class="float-right badge bg-main"><?php echo $_smarty_tpl->tpl_vars['totalArticle']->value;?>
</span><span class="icon-file"></span> 文章</li>
                        <li><span class="float-right badge bg-main"><?php echo $_smarty_tpl->tpl_vars['totalRecord']->value;?>
</span><span class="icon-file"></span> 回复</li>

                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
        	<div class="alert alert-yellow"><span class="close"></span><strong>注意：</strong>您有5条未读信息，<a href="#">点击查看</a>。</div>
          <!--   <div class="alert">
                <h4>拼图前端框架介绍</h4>
                <p class="text-gray padding-top">拼图是优秀的响应式前端CSS框架，国内前端框架先驱及领导者，自动适应手机、平板、电脑等设备，让前端开发像游戏般快乐、简单、灵活、便捷。</p>
            	<a target="_blank" class="button bg-dot icon-code" href="#"> 下载示例代码</a>
            	<a target="_blank" class="button bg-main icon-download" href="#"> 下载拼图框架</a>
            	<a target="_blank" class="button border-main icon-file" href="#"> 拼图使用教程</a>
            </div> -->
            <div class="panel">
            	<div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                	<tr><th colspan="2">服务器信息</th><th colspan="2">系统信息</th></tr>
                    <tr><td width="110" align="right">操作系统：</td><td>Windows 7</td><td width="90" align="right">系统开发：</td><td><a href="#" target="_blank">博客开发</a></td></tr>
                    <tr><td align="right">Web服务器：</td><td>Apache 2.4.4</td><td align="right">主页：</td><td><a href="#" target="_blank">#</a></td></tr>
                    <tr><td align="right">程序语言：</td><td>PHP 5.6.32</td><td align="right">演示：</td><td><a href="#" target="_blank">http://blog.com</a></td></tr>
                    <tr><td align="right">数据库：</td><td>MySQL 5.5</td><td align="right">BUG反馈：</td><td><a href="http://shang.qq.com/wpa/qunwpa?idkey=a08e4d729d15d32cec493212f7672a6a312c7e59884a959c47ae7a846c3fadc1" target="_blank">729613920</a> </td></tr>
                </table>
            </div>
        </div>
    </div>

</div>


</body>
</html>
<?php }} ?>
