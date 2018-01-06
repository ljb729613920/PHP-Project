<?php /* Smarty version Smarty-3.1.16, created on 2018-01-06 15:04:19
         compiled from ".\App\home\views\article\show.html" */ ?>
<?php /*%%SmartyHeaderCode:32465a5045c3057837-73510093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e8485f2b03837dae31593d5d8f8396af588ddd0' => 
    array (
      0 => '.\\App\\home\\views\\article\\show.html',
      1 => 1515221888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32465a5045c3057837-73510093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a5045c30e4250_49815679',
  'variables' => 
  array (
    'data' => 0,
    'prev' => 0,
    'next' => 0,
    'bucket' => 0,
    'hit' => 0,
    'k' => 0,
    'i' => 0,
    'v' => 0,
    'top' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5045c30e4250_49815679')) {function content_5a5045c30e4250_49815679($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.truncate.php';
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
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style type="text/css">
   .ds-replybox img {
    float:left;
    width:76px;
    height:76px;
  }
  textarea {
    box-shadow: none;
    color: #999;
    height: 54px;
    margin: 0;
    overflow: auto;
    padding: 10px;
    resize: none;
    width: 80%;
    margin-left:10px;
  }
  button {
    margin-top:10px;
    margin-left:85px;
    font-size: 14px;
    font-weight: bold;
    height: 32px;
    text-align: center;
    text-shadow: 0 1px 0 #fff;
    transition: all 0.15s linear 0s;
    width: 100px;
  }
  .otherlink dl {
    display:block;
    width:100%;
    height:65px;
    padding:20px 0;
    border-bottom:1px #DEDEDE solid;
  }
  .otherlink dt {
    float:left;
  }
  .otherlink h3 {
    color:#D23;
  }
  .otherlink h3,.otherlink p {
    line-height:22px;
    text-indent:10px;
  }
  .otherlink .msg {
     color:#333;
  }
  .otherlink .addtime {
     color:#999;
  }
  .logform input {
    width:140px;
    height:30px;
  }
</style>
</head>
<body>
<div class="ibody">
 <?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>'2'), 0);?>

  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">模板分享</a>><a href="1/">个人博客模板</a></h2>
    <div class="index_about">
      <h2 class="c_titile"><?php echo $_smarty_tpl->tpl_vars['data']->value['a_title'];?>
</h2>
      <p class="box_c"><span class="d_time">发布时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['a_last_time'],'Y-m-d H:i:s');?>
</span>
      <span>编辑：<?php echo $_smarty_tpl->tpl_vars['data']->value['a_owner'];?>
</span>
      <span>浏览（<?php echo $_smarty_tpl->tpl_vars['data']->value['a_hits'];?>
）</span>
      <span>评论览（<?php echo $_smarty_tpl->tpl_vars['data']->value['a_hits'];?>
）</span></p>
      <ul class="infos">
       <?php echo $_smarty_tpl->tpl_vars['data']->value['a_content'];?>

      </ul>
      <div class="keybq">
        <p><span>关键字词</span>：黑色,个人博客,时间轴,响应式</p>
      </div>
      <div class="nextinfo">
     <!--  
        <?php if ($_smarty_tpl->tpl_vars['prev']->value==false) {?>
        <p>上一篇：<a href="javascript:void();">没有了</a></p>
        <?php } else { ?>
        <p>上一篇：<a href="index.php?c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['prev']->value['a_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prev']->value['a_title'];?>
</a></p>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['next']->value==false) {?>
        <p>下一篇：<a href="javascript:void();">没有了</a></p>
        <?php } else { ?>
        <p>下一篇：<a href="index.php?c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['next']->value['a_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['next']->value['a_title'];?>
</a></p>
        <?php }?>
         -->
      </div>
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          <li><a href="/news/s/2013-07-25/524.html" title="现在，我相信爱情！">现在，我相信爱情！</a></li>
          <li><a href="/newstalk/mood/2013-07-24/518.html" title="我希望我的爱情是这样的">我希望我的爱情是这样的</a></li>
          <li><a href="/newstalk/mood/2013-07-02/335.html" title="有种情谊，不是爱情，也算不得友情">有种情谊，不是爱情，也算不得友情</a></li>
          <li><a href="/newstalk/mood/2013-07-01/329.html" title="世上最美好的爱情">世上最美好的爱情</a></li>
          <li><a href="/news/read/2013-06-11/213.html" title="爱情没有永远，地老天荒也走不完">爱情没有永远，地老天荒也走不完</a></li>
          <li><a href="/news/s/2013-06-06/24.html" title="爱情的背叛者">爱情的背叛者</a></li>
        </ul>
      </div>

    <div style="clear:both; height:10px;"></div>
    <h2>评论列表</h2>
      
      <?php echo $_smarty_tpl->tpl_vars['bucket']->value;?>

      


    <div style="clear:both; height:10px;"></div>
     <div class="otherlink">
        <h2>发布评论</h2>
      </div>





    <div style="clear:both; height:10px;"></div>

    <div class="ds-replybox">
        <form action="index.php?c=Article&a=addcomment" method="post">
        <input type='hidden' name='userid' value='{$smarty.session.user.id|default:0}' />
        <input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['a_id'];?>
' />
        <input type='hidden' name='pid' value='0' />
        <textarea placeholder="说点什么吧…" title="Ctrl+Enter快捷提交" name="content"></textarea><pre class="ds-hidden-text"></pre>
        </div>
        <div class="ds-post-toolbar">
        <div class="ds-post-options ds-gradient-bg"><span class="ds-sync"></span>
        </div>
        <button type="submit" class="ds-post-button">发布</button>
        <div class="ds-toolbar-buttons"><a title="插入表情" class="ds-toolbar-button ds-add-emote"></a>
        </div>
        </div>
        </form>
      </div>
  </article>


  <aside>
    <div class="rnav">
      <li class="rnav1 "><a href="/">日记</a></li>
      <li class="rnav2 "><a href="/">欣赏</a></li>
      <li class="rnav3 "><a href="/">程序人生</a></li>
      <li class="rnav4 "><a href="/">经典语录</a></li>
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
      <ul>
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
      <h2>
        <p>最新评论</p>
      </h2>
      <ul class="pl_n">
        <dl>
          <dt><img  src="/public/home/images/s8.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
        </dl>
        <dl>
          <dt><img  src="/public/home/images/s7.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2小时前</time>
          </dd>
          <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
        </dl>
        <dl>
          <dt><img  src="/public/home/images/s6.jpg"> </dt>
          <dt> </dt>
          <dd>小林博客
            <time>8月7日</time>
          </dd>
          <dd><a href="/">博客色彩丰富，很是好看</a></dd>
        </dl>
        <dl>
          <dt><img  src="/public/home/images/003.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
        </dl>
        <dl>
          <dt><img  src="/public/home/images/002.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2小时前</time>
          </dd>
          <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
        </dl>
      </ul>
      <h2>
        <p>最近访客</p>
        <ul>
          <img  src="/public/home/images/vis.jpg"><!-- 直接使用“多说”插件的调用代码 -->
        </ul>
      </h2>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside>
  <script src="js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 -->
</div>
</body>
</html>
<?php }} ?>
