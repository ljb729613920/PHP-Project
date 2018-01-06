<?php /* Smarty version Smarty-3.1.16, created on 2018-01-06 14:30:01
         compiled from ".\App\admin\views\Category\addUi.html" */ ?>
<?php /*%%SmartyHeaderCode:2495a506ce9b75b97-10689271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e7e15d89735d0c1adc4cdb5727bf5bb7dd23a3a' => 
    array (
      0 => '.\\App\\admin\\views\\Category\\addUi.html',
      1 => 1515198856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2495a506ce9b75b97-10689271',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a506ce9c64057_44700843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a506ce9c64057_44700843')) {function content_5a506ce9c64057_44700843($_smarty_tpl) {?><!DOCTYPE html>
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
  <div class="logo"><a href="index.php?g=admin&c=index&a=index" target="_blank"><img src="/public/admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>

  <?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>"2",'sub'=>"2002"), 0);?>


    <div class="admin-bread"> <span>您好，<?php echo $_SESSION['userInfo']['a_truename'];?>
，欢迎您的光临。</span>
      <ul class="bread">
        <li><a href="index.php?g=admin&c=index&a=index" class="icon-home"> 开始</a></li>
        <li><a href="index.php?g=admin&c=category&a=index">类别管理</a></li>
        <li>添加分类</li>
      </ul>
    </div>
  </div>
</div>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>分类管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加分类</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="index.php?g=admin&c=Category&a=add">
          <div class="form-group">
            <div class="label">
              <label for="c_name">分类名称</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="c_name" name="c_name" size="50" placeholder="类别名称" data-validate="required:请填写类别名称" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="c_desc">描述</label>
            </div>
            <div class="field">
              <textarea class="input" name="c_desc" id="c_desc" rows="5" cols="50" placeholder="描述" data-validate="required:请填写分类描述"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="c_sort">排序</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="c_sort" name="c_sort" size="50" placeholder="50" data-validate="required:请填写分类排序" />
            </div>
          </div>
          <div class="form-button">
            <button class="button bg-main" type="submit" onclick="window.location.href='index.php?g=admin&c=Category&a=sub'">提交</button>
          </div>
        </form>
      </div>
      <div class="tab-panel" id="tab-email">邮件设置</div>
      <div class="tab-panel" id="tab-upload">上传设置</div>
      <div class="tab-panel" id="tab-visit">访问限制</div>
    </div>
  </div>

</div>
</body>
</html>
<?php }} ?>
