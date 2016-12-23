<?php
/* Smarty version 3.1.29, created on 2016-12-19 14:20:26
  from "D:\phpStudy\WWW\guanpeipindao\templates\detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58577c2a922d03_80856023',
  'file_dependency' => 
  array (
    '6e0054eabb156542deaa89168d99bce2da45a3e2' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\detail.html',
      1 => 1481159059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_58577c2a922d03_80856023 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>图书详情</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/left_nav.css">

    <?php $header_css = 'dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $introduce_css = 'dist/css/introduce.css' ?>
    <link rel="stylesheet" href="<?php echo $introduce_css .'?v='. filemtime( $introduce_css ); ?>">

    <style>
        body {
            /*background-color: #F0FFFF;*/
            background-color: #FFF;
            padding-top: 10px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .table > tbody > tr > td {
            border-top: 0px;
            font-family: 'Microsoft YaHei', 'Arial';
        }

        .navbar {
            background-color: lightblue;
        }

        .down {
            padding-top: 45px;
            width: 770px;
        }

        .detail_title {
            /*font-family: 'Microsoft YaHei', 'Arial';*/
            margin-top: 0px;
            margin-bottom: 0px;
            color: #F16D06;
            font-size: 20px;
            font-weight: bold;
            /*bolder: 10px solid ridge green;*/
        }

        .fen_mian {
            width: 150px;
            height: 168px;
        }

        .col-sm-9 img {
            margin-right: 5px;
        }

        .hr {
            height: 0px;
            border: none;
            border-top: 1px ridge green;
            margin-bottom: 29px;

        }

        hr {
            margin-top: 0px;
            margin-bottom: 0px;
            border: 0;
            /*border-top: 1px solid #eee;*/
        }

        hr {
            height: 0;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }

        /**, *:before, *:after */

        /**, *:before, *:after */
        hr {
            display: block;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
            -webkit-margin-start: auto;
            -webkit-margin-end: auto;
            border-style: inset;
            border-width: 0px;
        }

        .col-sm-3 {
            width: 190px;
        }

        .content_intro,.zhh_intro {
            text-indent: 28px;
        }

    </style>
</head>

<body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="site">
    <div class="row ">
        <div class="col-sm-3">
            <!--<img src="../dist/js/holder.js/263x800" alt="">-->
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:left_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



            <div class="introduce">
                <?php echo $_smarty_tpl->tpl_vars['introduce']->value;?>

            </div>

        </div>

        <div class="col-sm-9">

            <div class="down">
                <div class="">
                    <span class="detail_title">图书详情</span>
                    <hr class="hr"/>
                    <?php
$_from = $_smarty_tpl->tpl_vars['details']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
                    <!--<p></p>-->
                    <div class="row">
                        <div class="col-sm-3">

                            <?php if (trim($_smarty_tpl->tpl_vars['val']->value['slt'])) {?>
                            <img src="http://www.ecsponline.com/<?php echo trim($_smarty_tpl->tpl_vars['val']->value['slt']);?>
" class="fen_mian"
                                 onerror="javascript:this.src='dist/images/nopicture.png';"
                                 alt="">
                            <?php } else { ?>
                            <img src="dist/images/nopicture.png" class="fen_mian" alt="">
                            <?php }?>

                        </div>
                        <div class="col-sm-9">
                            <table class="table table-striped ">
                                <tr>
                                    <td colspan="2"><img src="dist/images/icon.png">书名： <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['sm']);?>
</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><img src="dist/images/icon.png">丛书名： <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['csm']);?>
</td>
                                </tr>
                                <tr>
                                    <td><img src="dist/images/icon.png">作者： <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['zzh']);?>
</td>
                                    <td><img src="dist/images/icon.png">ISBN: <?php echo $_smarty_tpl->tpl_vars['val']->value['isbn'];?>
</td>
                                </tr>
                                <tr>
                                    <td><img src="dist/images/icon.png">开本： <?php echo $_smarty_tpl->tpl_vars['val']->value['kb'];?>
</td>
                                    <td><img src="dist/images/icon.png">出版日期: <?php echo $_smarty_tpl->tpl_vars['val']->value['cbrq'];?>
</td>
                                </tr>
                                <tr>
                                    <td><img src="dist/images/icon.png">装帧： <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['zhzh']);?>
</td>
                                    <td><img src="dist/images/icon.png">价格: ￥<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['val']->value['dj']);?>
</td>
                                </tr>
                                <tr>
                                    <td><img src="dist/images/icon.png">页数： <?php echo $_smarty_tpl->tpl_vars['val']->value['ys'];?>
</td>
                                    <td><img src="dist/images/icon.png">中图法分类: <?php echo $_smarty_tpl->tpl_vars['val']->value['ztfl'];?>
</td>
                                </tr>
                                <tr>
                                    <td><img src="dist/images/icon.png">语种： <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['yz']);?>
</td>
                                    <td><img src="dist/images/icon.png">版次:</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><img src="dist/images/icon.png">内容简介： <p>
                                        <div class="content_intro">
                                            <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['nrjs']);?>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><img src="dist/images/icon.png">作者简介： <p>
                                        <div class="zhh_intro">
                                            <?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['zzhjj']);?>

                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
<?php echo '<script'; ?>
 src="dist/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!--<?php echo '<script'; ?>
 src="dist/js/holder.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="dist/js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/left_nav.js"><?php echo '</script'; ?>
>

<!--<?php $left_nav_js = 'dist/js/left_nav.js' ;?>-->
<!--<?php echo '<script'; ?>
 src='dist/js/left_nav.js?v=<?php echo filemtime( $left_nav_js );?>'><?php echo '</script'; ?>
>-->
</html>
<?php }
}
