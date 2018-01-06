<?php /* Smarty version Smarty-3.1.16, created on 2018-01-06 21:43:42
         compiled from ".\App\admin\views\article\modify.html" */ ?>
<?php /*%%SmartyHeaderCode:139135a50d160d88487-91686164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cde1e178de5889d68133fa052e9509ef60d5fdb5' => 
    array (
      0 => '.\\App\\admin\\views\\article\\modify.html',
      1 => 1515246176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139135a50d160d88487-91686164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a50d160e0d3a1_31869440',
  'variables' => 
  array (
    'data' => 0,
    'menu' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a50d160e0d3a1_31869440')) {function content_5a50d160e0d3a1_31869440($_smarty_tpl) {?><!DOCTYPE html>
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
  <div class="logo"><a href="index.php?g=admin&c=index&a=index" target="_blank"><img src="/public/admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>3,'sub'=>3003), 0);?>

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
        <form method="post" class="form-x" action="index.php?g=admin&c=article&a=update" enctype="multipart/form-data">
          <input type="hidden" name="a_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['a_id'];?>
">

          <div class="form-group">
            <div class="label">
              <label for="a_title">文章标题</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="a_title" name="a_title" size="50" placeholder="请填写你文章标题的名称" data-validate="required:请填写你文章标题的名称" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['a_title'];?>
" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">所属分类</label>
            </div>
            <div class="field">
              <select class="input" name="c_id" style="width:20%">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['c_id']==$_smarty_tpl->tpl_vars['data']->value['c_id']) {?>selected<?php }?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$_smarty_tpl->tpl_vars['v']->value['lv']);?>
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
              <textarea class="input" name="a_desc" rows="5" cols="50" placeholder="描述" data-validate="required:请填写分类描述"><?php echo $_smarty_tpl->tpl_vars['data']->value['a_desc'];?>
</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="a_content">文章内容</label>
            </div>
            <div class="field">
              <textarea rows="5" name="a_content" id='ueditor' cols="50" placeholder="内容" data-validate="required:请填写文章内容"><?php echo $_smarty_tpl->tpl_vars['data']->value['a_content'];?>
</textarea>

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
