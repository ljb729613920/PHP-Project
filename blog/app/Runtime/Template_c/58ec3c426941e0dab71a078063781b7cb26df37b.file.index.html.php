<?php /* Smarty version Smarty-3.1.16, created on 2018-01-10 19:48:48
         compiled from ".\App\home\views\article\index.html" */ ?>
<?php /*%%SmartyHeaderCode:157375a55fda06e7f62-27411508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58ec3c426941e0dab71a078063781b7cb26df37b' => 
    array (
      0 => '.\\App\\home\\views\\article\\index.html',
      1 => 1515584659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157375a55fda06e7f62-27411508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'c_id' => 0,
    'data' => 0,
    'v' => 0,
    'totalArts' => 0,
    'pages' => 0,
    'group' => 0,
    'i' => 0,
    'hit' => 0,
    'k' => 0,
    'top' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a55fda079ba98_46566550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a55fda079ba98_46566550')) {function content_5a55fda079ba98_46566550($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="比格沃斯先生的个人博客模板" />
<link href="/public/home/css/base.css" rel="stylesheet">
<link href="/public/home/css/style.css" rel="stylesheet">
<link href="/public/home/css/media.css" rel="stylesheet">
<style type="text/css">
	div.page{
		margin:0px 200px;
	}
	#pages li{
		position:relative;
		float:left;
		margin-left:-1px;

/*		padding:6px 12px;
		line-height:1.42857143;
		color:#337ab7;text-decoration:none;
		background-color:#fff;*/
	}
</style>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<div class="ibody">

	<?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>$_smarty_tpl->tpl_vars['c_id']->value), 0);?>


	<article>
		<h2 class="about_h">您现在的位置是：<a href="index.php?g=home&c=index&a=index">首页</a>><a href="1/">
		</a></h2>
		<div class="bloglist">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			<div class="newblog">
				<ul>
					<h3>
					<a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['a_title'];?>
</a>
					</h3>
					<div class="autor">
					<span>作者：<?php echo $_smarty_tpl->tpl_vars['v']->value['u_nickname'];?>
</span>
					<span>分类：[<a href="/"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</a>]</span>
					<span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['v']->value['a_hits'];?>
</a>）</span>
					<span>评论（<a href="/"><?php echo $_smarty_tpl->tpl_vars['v']->value['records'];?>
</a>）</span>
					</div>
					<p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_desc'],100,'...',true);?>
 <a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" target="_blank" class="readmore">全文</a></p>
				</ul>
				<figure><img src="./Upload/thumber/<?php echo $_smarty_tpl->tpl_vars['v']->value['a_thumb'];?>
" ></figure>
				<div class="dateview"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['a_last_time'],'Y-m-d');?>
</div>
			</div>
			<?php } ?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['totalArts']->value) {?>
		<div class="page">
			<ul id='pages'>
				<li><a title="Total record"><b><?php echo $_smarty_tpl->tpl_vars['totalArts']->value;?>
</b></a></li>
				<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

			</ul>
		</div>
		<?php }?>
	</article>
	<aside>
		<div class="rnav">
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			<li class="rnav<?php echo $_smarty_tpl->tpl_vars['i']->value++%4+1;?>
 "><a href="index.php?g=home&c=article&a=index&c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</a></li>
		<?php } ?>
		</div>
		<div class="ph_news">
						<h2>
				<p>点击排行</p>
			</h2>
			<ul class="ph_n">
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><span <?php if ($_smarty_tpl->tpl_vars['k']->value<=2) {?>class="num1"<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
 </span><a href="http://blog.com/index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_title'],15,'...',true);?>
</a></li>
			<?php } ?>
			</ul>
			<h2>
				<p>栏目推荐</p>
			</h2>
			<ul >
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['top']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<li><a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_title'],15,'...',true);?>
</a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="copyright">
			<ul>
				<p> Design by <a href="/">Mr.Bigglesworth</a></p>
			</ul>
		</div>
	</aside>
	<!-- <script src="js/silder.js"></script> -->
	<div class="clear"></div>
	<!-- 清除浮动 -->
</div>
</body>
</html>
<?php }} ?>
