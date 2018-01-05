<?php /* Smarty version Smarty-3.1.16, created on 2018-01-05 16:38:13
         compiled from ".\App\admin\views\article\trash.html" */ ?>
<?php /*%%SmartyHeaderCode:50635a4ec974b5ecc5-31734201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0a1740df8a887742893f46af67d17e1f12301ef' => 
    array (
      0 => '.\\App\\admin\\views\\article\\trash.html',
      1 => 1515140583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50635a4ec974b5ecc5-31734201',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a4ec974bdbce9_90842142',
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4ec974bdbce9_90842142')) {function content_5a4ec974bdbce9_90842142($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
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
    <script src="/public/admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
    <link href="/public/bootstrap/css/bootstrap-pages.css" rel="stylesheet">

</head>

<body>
<div class="lefter">
    <div class="logo"><a href="index.php?g=admin&c=index&a=index" target="_blank"><img src="/public/admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>"3",'sub'=>'3001'), 0);?>

    <div class="admin-bread">
        <span>您好，<?php echo $_SESSION['userInfo']['a_truename'];?>
，欢迎您的光临。</span>
        <ul class="bread">
            <li><a href="index.php?g=admin&c=index&a=index" class="icon-home"> 开始</a></li>
            <li><a href="index.php?g=admin&c=article&a=index">文章管理</a></li>
            <li>回收站</li>
        </ul>
    </div>
    </div>
    </div>

<div class="admin">
	<form action="#" method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>回收站</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加文章" onclick="window.location='index.php?g=admin&c=article&a=addui"/>
            <input type="button" class="button button-small border-yellow"  onclick="delRows()" value="批量恢复" />
            <script type="text/javascript">
                function delRows(){
                    var ids = '';
                    var objs = document.getElementsByName('ids');
                    for(var i=0;i<objs.length;i++){
                        if (objs[i].checked) {
                            ids += objs[i].value+',';
                        }
                    }
                     window.location='index.php?g=admin&c=article&a=del&id='+ids;
                }
            </script>
        </div>
        <table class="table table-hover" id="tab">
        	<tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="*">文章标题</th>
                <th width="120">点击率</th>
                <th width="180">发布时间</th>
                <th width="180">删除时间</th>
                <th width="100">操作</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <tr>
                <td><input type="checkbox" name="ids" id="ids" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['a_title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['a_title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['a_hits'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['a_last_time'],'Y-m-d H:i:s');?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['a_del_time'],'Y-m-d H:i:s');?>
</td>
                <td>
                    <a class="button border-yellow button-little" href="index.php?g=admin&c=article&a=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" onclick="return confirm('确认恢复么？');">恢复</a>
                </td>
            </tr>
            <?php } ?>
            <tfoot>
                <tr>
                    <td colspan='6'>
                       <div class="pagination" id='pagination'>
                            <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

                        </div>
                    </td>
                </tr>

            </tfoot>
        </table>
    </div>
    </form>
    <br />
</body>
</html>
<?php }} ?>
