<?php /* Smarty version Smarty-3.1.16, created on 2018-01-04 17:07:34
         compiled from ".\App\admin\views\article\crash.html" */ ?>
<?php /*%%SmartyHeaderCode:83065a4deed638bb90-45969621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45b4aa7aa58e337ca985f85c671682b1a535a875' => 
    array (
      0 => '.\\App\\admin\\views\\article\\crash.html',
      1 => 1515056361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83065a4deed638bb90-45969621',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a4deed640ca32_04637079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4deed640ca32_04637079')) {function content_5a4deed640ca32_04637079($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
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
    <div class="logo"><a href="#" target="_blank"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>"3",'sub'=>'3001'), 0);?>

    <div class="admin-bread">
        <span>您好，<?php echo $_SESSION['userInfo']['u_nickname'];?>
，欢迎您的光临。</span>
        <ul class="bread">
            <li><a href="index.php?g=admin&c=index&a=index" class="icon-home"> 开始</a></li>
            <li><a href="index.php?g=admin&c=article&a=index">文章管理</li>
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
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加文章" onclick="window.location='index.php?g=admin&c=Article&a=addUi'"/>
            <input type="button" class="button button-small border-yellow"  onclick="delRows()" value="批量删除" />
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
            <input type="button" class="button button-small border-blue" id="crash" value="回收站" style="this.onclick=window.location='index.php?g=admin&c=article&a=crash" />

        </div>
        <table class="table table-hover" id="tab">
        	<tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="*">文章标题</th>
                <th width="120">点击率</th>
                <th width="100">推荐</th>
                <th width="180">发布时间</th>
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
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['a_top']==0) {?>
                    <a class="button border-red button-little" href="index.php?g=admin&c=Article&a=recommend&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" id="recommend">推荐</a>
                    <?php } else { ?>
                    <a class="button border-yellow button-little" href="index.php?g=admin&c=Article&a=recommend&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
">取消推荐</a>
                    <?php }?>
                </td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['a_last_time'],'Y-m-d H:i:s');?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?g=admin&c=article&a=modify&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
">修改</a>
                    <a class="button border-yellow button-little" href="index.php?g=admin&c=article&a=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" onclick="return confirm('确认删除么？');">删除</a>
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
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
</div>

</body>
</html>
<?php }} ?>
