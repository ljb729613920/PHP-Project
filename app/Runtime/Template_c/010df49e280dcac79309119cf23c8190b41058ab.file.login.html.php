<?php /* Smarty version Smarty-3.1.16, created on 2018-01-05 17:35:39
         compiled from ".\App\admin\views\Privilege\login.html" */ ?>
<?php /*%%SmartyHeaderCode:300255a4dbe5485e3b9-82280107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '010df49e280dcac79309119cf23c8190b41058ab' => 
    array (
      0 => '.\\App\\admin\\views\\Privilege\\login.html',
      1 => 1515140611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300255a4dbe5485e3b9-82280107',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a4dbe5489cbc2_79404200',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4dbe5489cbc2_79404200')) {function content_5a4dbe5489cbc2_79404200($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-管理员登录</title>
    <link rel="stylesheet" href="public/admin/css/pintuer.css">
    <link rel="stylesheet" href="public/admin/css/admin.css">
    <script src="public/admin/js/jquery.js"></script>
    <script src="public/admin/js/pintuer.js"></script>
    <script src="public/admin/js/respond.js"></script>
    <script src="public/admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="#" target="_blank"><img src="/public/admin/public/admin/images/logo.png" class="radius" alt="后台管理系统" /></a>
            </div>
            <br /><br />
            <form action="index.php?g=admin&c=Privilege&a=validate" method="post">
            <div class="panel">
                <div class="panel-head"><strong>登录拼图后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="admin" placeholder="登录账号" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" placeholder="登录密码" data-validate="required:请填写密码,length#>=3:密码长度不符合要求" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input" name="passcode" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                            <img src="index.php?g=admin&c=Privilege&a=captcha" width="80" height="32" class="passcode" onclick="this.src='index.php?g=admin&c=Privilege&a=captcha&'+Math.random()"/>
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><button class="button button-block bg-main text-big">立即登录后台</button></div>
            </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
<?php }} ?>
