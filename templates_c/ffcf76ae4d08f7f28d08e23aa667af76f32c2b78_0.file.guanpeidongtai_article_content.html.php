<?php
/* Smarty version 3.1.29, created on 2016-11-29 10:31:04
  from "D:\phpStudy\WWW\guanpeipindao\templates\hall_communication\guanpeidongtai_article_content.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583ce8684d78b9_60988767',
  'file_dependency' => 
  array (
    'ffcf76ae4d08f7f28d08e23aa667af76f32c2b78' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\hall_communication\\guanpeidongtai_article_content.html',
      1 => 1474598280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_583ce8684d78b9_60988767 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章内容</title>

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">

    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/introduce.css">

    <?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
    <style>
        .down {
            padding-top: 55px;
            width: 770px;
        }

        .article_head {
            text-align: center;
        }

        .article_title {
            font-weight: bold;
            margin: 0 auto;
            width: 400px;
            line-height: 30px;
        }

        .author_time {
            margin: 0 auto;
            width: 400px;
            color: #F16D06;
        }

        .article_content{
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="site">
    <div class="row ">

        <div class="col-sm-3">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:left_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <div class="introduce">
                <?php echo $_smarty_tpl->tpl_vars['introduce']->value;?>

            </div>

        </div>

        <div class="col-sm-9">
            <div class="down">

                <div class="article_head">
                    <div class="article_title">
                        <?php echo $_smarty_tpl->tpl_vars['gpdt']->value[0]['Title'];?>

                    </div>
                    <div class="author_time">
                        <?php echo $_smarty_tpl->tpl_vars['gpdt']->value[0]['Writer'];?>
/<?php echo $_smarty_tpl->tpl_vars['gpdt']->value[0]['UpTime'];?>

                    </div>
                </div>
                <div class="article_content">
                    <?php echo $_smarty_tpl->tpl_vars['gpdt']->value[0]['Article'];?>

                </div>


            </div>
        </div>
    </div>
</div>
</body>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/holder.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>

</html><?php }
}
