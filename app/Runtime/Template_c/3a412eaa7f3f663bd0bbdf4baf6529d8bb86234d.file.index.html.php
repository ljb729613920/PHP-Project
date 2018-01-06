<?php /* Smarty version Smarty-3.1.16, created on 2018-01-06 23:33:54
         compiled from ".\App\home\views\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:29605a503f9f3f1a47-60387926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a412eaa7f3f663bd0bbdf4baf6529d8bb86234d' => 
    array (
      0 => '.\\App\\home\\views\\index\\index.html',
      1 => 1515252829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29605a503f9f3f1a47-60387926',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a503f9f4cc671_00980689',
  'variables' => 
  array (
    'menu' => 0,
    'data' => 0,
    'v' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a503f9f4cc671_00980689')) {function content_5a503f9f4cc671_00980689($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\php9\\blog\\frame\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\php9\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="比格沃斯先生的个人博客模板" />
<link href="./public/home/css/base.css" rel="stylesheet">
<link href="./public/home/css/index.css" rel="stylesheet">
<link href="./public/home/css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<div class="ibody">

  <?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>"0",'menu'=>$_smarty_tpl->tpl_vars['menu']->value), 0);?>


  <article>
    <div class="banner">
      <ul class="texts">
        <p>freedom heart</p>
        <p>流氓气质，诗人情怀，浪子之心，不羁一生</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>
      
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <div class="blogs">
        <h3><a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['a_title'];?>
</a></h3>
        <figure>
        <!-- <img src="<?php echo constant('DIR_THUMBER');?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['a_thumber'];?>
" ></figure> -->
        <ul>
          <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_desc'],20,'...');?>
</p>
          <a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" target="_blank" class="readmore">阅读全文&gt;&gt;</a>
        </ul>
        <p class="autor">
        <span >作者：<?php echo $_smarty_tpl->tpl_vars['v']->value['a_owner'];?>
</span> </p><br/>
        <span >分类：【<a href="/"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</a>】</span><br/>
        <span >浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['v']->value['a_hits'];?>
</a>）</span><br/>
        <span >评论（<a href="/"><?php echo $_smarty_tpl->tpl_vars['v']->value['a_content'];?>
</a>）</span>

        <div class="dateview"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['a_create_time'],'Y-m-d H:i:s');?>

        </div>
      </div>
      <?php } ?>
      
    </div>
  </article>
  <aside>
    <div class="avatar"><a href="about.html"><span>关于杨青</span></a></div>
    <div class="topspaceinfo">
      <h1>执子之手，与子偕老</h1>
      <p>于千万人之中，我遇见了我所遇见的人....</p>
    </div>
    <div class="about_c">
      <p>网名：Mr.Bigglesworth | 哞哞儿</p>
      <p>职业：Web开发攻城狮 </p>
      <p>籍贯：广东省-深圳市</p>
      <p>电话：186-XXXX-XXXX</p>
      <p>邮箱：liujiabin1212@outlook.com</p>
    </div>
  <!--   <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div> -->
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li><a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_title'],15,'...',true);?>
</a></li>
        <?php } ?>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>

        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li><a href="index.php?g=home&c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_title'],15,'...',true);?>
</a></li>
        <?php } ?>

      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="/">刘佳彬个人博客</a></li>

      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">Mr.Bigglesworth</a></p>
        <p></p>
        </p>
      </ul>
    </div>
  </aside>
  <!-- <script src="./public/home/js/silder.js"></script> -->
  <div class="clear"></div>
  <!-- 清除浮动 -->
</div>
</body>
</html>
<?php }} ?>
