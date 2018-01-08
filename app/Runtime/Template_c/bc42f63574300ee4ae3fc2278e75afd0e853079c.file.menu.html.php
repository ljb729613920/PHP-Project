<?php /* Smarty version Smarty-3.1.16, created on 2018-01-08 19:22:01
         compiled from "D:\blackhorse\www\blog\App\home\views\common\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:267565a535459117de6-78899296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc42f63574300ee4ae3fc2278e75afd0e853079c' => 
    array (
      0 => 'D:\\blackhorse\\www\\blog\\App\\home\\views\\common\\menu.html',
      1 => 1515371335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267565a535459117de6-78899296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'active' => 0,
    'menu' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a535459133362_50167894',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a535459133362_50167894')) {function content_5a535459133362_50167894($_smarty_tpl) {?><header>
    <h1>比格沃斯先生</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav">
      <a <?php if ($_smarty_tpl->tpl_vars['active']->value==0) {?> id="topnav_current"<?php }?> href="index.php">首页</a>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <a <?php if ($_smarty_tpl->tpl_vars['active']->value==$_smarty_tpl->tpl_vars['v']->value['c_id']) {?> id="topnav_current"<?php }?> href="index.php?g=home&c=Article&a=index&c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</a>
      <?php } ?>
    </nav>
</header>
<?php }} ?>
