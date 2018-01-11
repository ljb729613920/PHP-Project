<?php /* Smarty version Smarty-3.1.16, created on 2018-01-10 20:57:43
         compiled from "D:\blackhorse\www\blog\App\home\views\common\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:86435a55fcf0b3f172-97270818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc42f63574300ee4ae3fc2278e75afd0e853079c' => 
    array (
      0 => 'D:\\blackhorse\\www\\blog\\App\\home\\views\\common\\menu.html',
      1 => 1515589060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86435a55fcf0b3f172-97270818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a55fcf0b5e579_59562701',
  'variables' => 
  array (
    'active' => 0,
    'menu' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a55fcf0b5e579_59562701')) {function content_5a55fcf0b5e579_59562701($_smarty_tpl) {?><header>
    <h1>比格沃斯先生</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav">
      <a <?php if ($_smarty_tpl->tpl_vars['active']->value==0) {?> id="topnav_current"<?php }?> href="index.php">首页</a>
      <!-- <a <?php if ($_smarty_tpl->tpl_vars['active']->value=='about') {?> id="topnav_current"<?php }?> href="index.php?g=home&c=SinglePage&a=aboutMe">关于我</a> -->
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <a <?php if (in_array($_smarty_tpl->tpl_vars['active']->value,$_smarty_tpl->tpl_vars['v']->value['ids'])) {?> id="topnav_current"<?php }?> href="index.php?g=home&c=Article&a=index&c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</a>
      <?php } ?>
    </nav>
</header>
<?php }} ?>
