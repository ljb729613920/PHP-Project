<?php /* Smarty version Smarty-3.1.16, created on 2018-01-10 19:48:37
         compiled from ".\App\home\views\article\show.html" */ ?>
<?php /*%%SmartyHeaderCode:113175a55fd95d07d71-60673404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e8485f2b03837dae31593d5d8f8396af588ddd0' => 
    array (
      0 => '.\\App\\home\\views\\article\\show.html',
      1 => 1515582368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113175a55fd95d07d71-60673404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'locations' => 0,
    'v' => 0,
    'recordNums' => 0,
    'tag' => 0,
    'pre' => 0,
    'next' => 0,
    'assocArt' => 0,
    'record' => 0,
    'group' => 0,
    'i' => 0,
    'hit' => 0,
    'k' => 0,
    'top' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5a55fd95e194b2_21714730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a55fd95e194b2_21714730')) {function content_5a55fd95e194b2_21714730($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'D:\\blackhorse\\www\\blog\\frame\\Smarty\\plugins\\modifier.truncate.php';
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="比格沃斯先生的个人博客模板" />
<link href="./public/home/css/base.css" rel="stylesheet">
<link href="./public/home/css/style.css" rel="stylesheet">
<link href="./public/home/css/media.css" rel="stylesheet">
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
 <?php echo $_smarty_tpl->getSubTemplate ("../common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('active'=>$_smarty_tpl->tpl_vars['data']->value['c_id']), 0);?>

  <article>
    <h2 class="about_h">您现在的位置是：<a href="index.php?g=home&c=index&a=index">首页</a><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>》<a href="index.php?g=home&c=article&a=index&c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_name'];?>
</a><?php } ?></h2>

    <div class="index_about">
      <h2 class="c_titile"><?php echo $_smarty_tpl->tpl_vars['data']->value['a_title'];?>
</h2>
      <p class="box_c"><span class="d_time">发布时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['a_last_time'],'Y-m-d H:i:s');?>
</span>
      <span>编辑：<?php echo $_smarty_tpl->tpl_vars['data']->value['u_name'];?>
</span>
      <span>浏览（<?php echo $_smarty_tpl->tpl_vars['data']->value['a_hits'];?>
）</span>
      <span>评论览（<?php echo $_smarty_tpl->tpl_vars['recordNums']->value;?>
）</span></p>
      <ul class="infos">
       <?php echo $_smarty_tpl->tpl_vars['data']->value['a_content'];?>

      </ul>
      <div class="keybq">
        <p><span>关键字词</span>： <?php if (isset($_smarty_tpl->tpl_vars['tag']->value)) {?><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
<?php } else { ?>无<?php }?></p>
      </div>
      <div class="nextinfo">
      
        <?php if ($_smarty_tpl->tpl_vars['pre']->value==false) {?>
        <p>上一篇：没有了</p>
        <?php } else { ?>
        <p>上一篇：<a href="index.php?c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['pre']->value['a_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['pre']->value['a_title'];?>
</a></p>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['next']->value==false) {?>
        <p>下一篇：没有了</p>
        <?php } else { ?>
        <p>下一篇：<a href="index.php?c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['next']->value['a_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['next']->value['a_title'];?>
</a></p>
        <?php }?>
        
      </div>
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
         <?php if (isset($_smarty_tpl->tpl_vars['assocArt']->value)) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['assocArt']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
          <li><a href="index.php?c=article&a=show&a_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['a_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['a_title'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['a_title'],20,'...',true);?>
</a></li>
        <?php } ?>
        <?php } else { ?>
          <li>世间罕见的文章，并无相关</li>
        <?php }?>
        </ul>
      </div>

    <div style="clear:both; height:10px;"></div>
      <div class="otherlink">
      <h2>评论列表</h2>
      </div>
         <ul class="pl_n">
            
            <?php if (isset($_smarty_tpl->tpl_vars['record']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['record']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                    <dl>
                        <dt><img  src="<?php echo $_smarty_tpl->tpl_vars['v']->value['u_avatar'];?>
"></dt>
                        <dd>&nbsp;</dd>
                        <dd>
                            <time><?php echo $_smarty_tpl->tpl_vars['v']->value['u_nickname'];?>
：</time><?php echo $_smarty_tpl->tpl_vars['v']->value['r_content'];?>

                            <time> <?php echo $_smarty_tpl->tpl_vars['v']->value['r_time'];?>
</time><span id="rec">回复</span>
                            <div id="rec-block"></div>
                            <script type="text/javascript">
                                    rec.onclick=fucntion(){
                                          var obj = document.getElementById('rec-block');
                                          obj.innerHTML="";
                                    }
                            </script>
                        </dd>
                    </dl>
                <?php } ?>
                <?php } else { ?>
                  <dl>
                          <dt>&nbsp;</dt>

                  </dl>并没有小伙伴搭理你呦！
                <?php }?>
            
        </ul>

    <div style="clear:both; height:10px;"></div>
     <div class="otherlink">
        <h2>发布评论</h2>
      </div>





    <div style="clear:both; height:10px;"></div>

    <div class="ds-replybox">
        <form action="index.php?g=home&c=Article&a=addRecord" method="post">
        <input type='hidden' name='userid' value="<?php echo (($tmp = @$_SESSION['user']['id'])===null||$tmp==='' ? 0 : $tmp);?>
" />
        <input type='hidden' name='a_id' value="<?php echo $_smarty_tpl->tpl_vars['data']->value['a_id'];?>
" />
        <input type='hidden' name='r_pid' value="0" />

        <textarea placeholder="说点什么吧…" title="Ctrl+Enter快捷提交" name="r_content"></textarea><pre class="ds-hidden-text"></pre>
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

    <div class="copyright">
      <ul>
        <p> Design by <a href="/">Mr.Bigglesworth</a></p>
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
