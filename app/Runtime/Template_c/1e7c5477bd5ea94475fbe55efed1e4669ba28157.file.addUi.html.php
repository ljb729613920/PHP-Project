<?php /* Smarty version Smarty-3.1.16, created on 2018-01-05 15:59:16
         compiled from ".\App\admin\views\Article\addUi.html" */ ?>
<?php /*%%SmartyHeaderCode:251665a4dd07fe78824-61443415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e7c5477bd5ea94475fbe55efed1e4669ba28157' => 
    array (
      0 => '.\\App\\admin\\views\\Article\\addUi.html',
      1 => 1515138855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251665a4dd07fe78824-61443415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a4dd07ff34049_80434309',
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4dd07ff34049_80434309')) {function content_5a4dd07ff34049_80434309($_smarty_tpl) {?><!DOCTYPE html>
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

<script type="text/javascript" src="/public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/public/ueditor/ueditor.all.js"></script>
</head>

<body>
<div class="lefter">
  <div class="logo"><a href="#" target="_blank"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>3,'sub'=>3002), 0);?>

    <div class="admin-bread">
      <span>您好，<?php echo $_SESSION['userInfo']['a_truename'];?>
，欢迎您的光临。</span>
      <ul class="bread">
        <li><a href="index.php?g=admin&c=index&a=index" class="icon-home"> 开始</a></li>
        <li><a href="index.php?g=admin&c=article&a=index">文章管理</a></li>
        <li>添加文章</li>
      </ul>
    </div>
  </div>
</div>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>文章管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加文章</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="index.php" enctype="multipart/form-data">
          <input type="hidden" name="m" value="admin">
          <input type="hidden" name="c" value="Article">
          <input type="hidden" name="a" value="add">
          <div class="form-group">
            <div class="label">
              <label for="a_title">文章标题</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="a_title" name="a_title" size="50" placeholder="请填写你文章标题的名称" data-validate="required:请填写你文章标题的名称" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">所属分类</label>
            </div>
            <div class="field">
              <select class="input" name="a_category" style="width:20%">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$_smarty_tpl->tpl_vars['v']->value['c_level']);?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="a_desc">文章描述</label>
            </div>
            <div class="field">
              <textarea class="input" name="a_desc" rows="5" cols="50" placeholder="描述" data-validate="required:请填写分类描述"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="a_content">文章内容</label>
            </div>
            <div class="field">
              <textarea rows="5" name="a_content" id='ueditor' cols="50" placeholder="内容" data-validate="required:请填写文章内容"></textarea>

              <script type="text/javascript">
                  UE.getEditor('ueditor');
              </script>

            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="img">上传图片</label>
            </div>
            <div class="field">
              <input type="file" id="img" name="MyFile"/>
            </div>
          </div>
          <div class="form-button">
            <button class="button bg-main" type="submit">提交</button>
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
