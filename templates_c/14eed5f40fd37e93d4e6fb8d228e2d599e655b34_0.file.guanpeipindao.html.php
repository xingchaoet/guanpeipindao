<?php
/* Smarty version 3.1.29, created on 2016-09-19 14:25:31
  from "D:\WWW\guanpeipindao\templates\guanpeipindao.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57df84db5f2079_27092976',
  'file_dependency' => 
  array (
    '14eed5f40fd37e93d4e6fb8d228e2d599e655b34' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\guanpeipindao.html',
      1 => 1473392682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_57df84db5f2079_27092976 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\WWW\\guanpeipindao\\libs\\plugins\\modifier.truncate.php';
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/left_nav.css">

    <link rel="stylesheet" href="dist/css/header.css">
    <link rel="stylesheet" href="dist/css/introduce.css">

    <style>
        .carousel-indicators {
            position: absolute;
            top: 10px;
        }

        .row {
            margin-top: 25px;

            margin-bottom: 25px;
        }

        .col-sm-3 {
            /*background: #FFF8DC;*/
            /*margin-bottom: 10px;*/
            width: 210px;
        }

        p {
            /*display: block;*/
            /*-webkit-margin-before: 1em;*/
            /*-webkit-margin-after: 1em;*/
            /*-webkit-margin-start: 0px;*/
            /*-webkit-margin-end: 0px;*/
            font-size: xx-small;
            font-family: 'Microsoft YaHei', 'Arial';
        }

        .col-sm-9 {
            width: 770px;
        }

        .col-sm-2 {
            width: 180px;
        }

        .feng_mian {
            height: 160px;
            width: 140px;
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
            <div style="margin-top: 0px">
                <div class="carousel slide" data-ride="carousel" id='mycarousel'>
                    <ul class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1"></li>
                        <!--<li data-target="#mycarousel" data-slide-to="2"></li>-->
                    </ul>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="dist/picture/gg/gg_0.jpg">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <div class="item">
                            <img src="dist/picture/gg/gg_1.jpg">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <!--<div class="item">-->
                        <!--<img src="dist/picture/p3.jpg">-->
                        <!--<div class="carousel-caption">-->
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                    <a class="left carousel-control" href="#mycarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#mycarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="content">
                <ul class="nav nav-tabs">
                    <li class='active'><a href="#recommend" data-toggle='tab'>重点推荐</a></li>
                    <li><a href="#newbooks" data-toggle='tab'>本期新书</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active fade in" id='recommend'>
                        <div class="row">
                            <?php
$_from = $_smarty_tpl->tpl_vars['recommendbooks']->value;
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
                            <div class="col-sm-2">

                                <?php if (trim($_smarty_tpl->tpl_vars['val']->value['slt'])) {?>
                                <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img class="feng_mian"
                                                                                    src="http://www.ecsponline.com/<?php echo trim($_smarty_tpl->tpl_vars['val']->value['slt']);?>
"
                                                                                    alt=""></a>
                                <?php } else { ?>
                                <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img class="feng_mian"
                                                                                    src="dist/images/nopicture.png"
                                                                                    alt=""></a>
                                <?php }?>

                                <div class="tooltip-demo">
                                    <p data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['sm'];?>
" style="text-align: center">
                                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['sm'],16,"...",true);?>
</p>
                                </div>
                                <p style="text-align: center">
                                    <a id="buy_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
" class="btn btn-default btn-xs">加入订单</a>
                                    <a style="text-align: center; display: none"><?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
</a>
                                </p>
                            </div>
                            <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
                            <!--<div class="clearfix"></div>-->
                        </div>
                        <?php if ($_SESSION['user_type'] == 2) {?>
                        <div style="text-align:right;margin-right: 20px ;margin-bottom: 10px; "><a href='showorder.php'
                                                                                                   class="btn  ">查看订单</a>
                        </div>
                        <?php }?>
                        <div style="text-align:right; margin-right: 20px"><a href='more.php?type=recommend'
                                                                             class="btn btn-primary ">更多</a></div>
                    </div>
                    <div class="tab-pane fade" id='newbooks'>
                        <div class="row">
                            <?php
$_from = $_smarty_tpl->tpl_vars['newbooks']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_1_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_1_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
                            <div class="col-sm-2">
                                <?php if (trim($_smarty_tpl->tpl_vars['val']->value['slt'])) {?>
                                <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img class="feng_mian"
                                                                                    src="http://www.ecsponline.com/<?php echo trim($_smarty_tpl->tpl_vars['val']->value['slt']);?>
"
                                                                                    alt=""></a>
                                <?php } else { ?>
                                <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img class="feng_mian"
                                                                                    src="dist/images/nopicture.png"
                                                                                    alt=""></a>
                                <?php }?>
                                <div class="tooltip-demo">
                                    <p data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['sm'];?>
" style="text-align: center">
                                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['sm'],16,"...",true);?>
</p>
                                </div>
                                <p style="text-align: center">
                                    <a id="buy_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
" class="btn btn-default btn-xs">加入订单</a>
                                    <a style="text-align: center; display: none"><?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
</a>
                                </p>
                            </div>
                            <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
?>
                            <!--<div class="clearfix"></div>-->
                        </div>
                        <?php if ($_SESSION['user_type'] == 2) {?>
                        <div style="text-align:right;margin-right: 20px ;margin-bottom: 10px; "><a href='showorder.php'
                                                                                                   class="btn  ">查看订单</a>
                        </div>
                        <?php }?>
                        <div style="text-align:right;margin-right: 20px "><a href='more.php?type=new'
                                                                             class="btn btn-primary ">更多</a></div>
                    </div>
                </div>
            </div>
            <a id="userid" style="text-align: center; display: none "><?php echo $_SESSION['user_id'];?>
</a>
            <a id="usertype" style="text-align: center; display: none "><?php echo $_SESSION['user_type'];?>
</a>


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
<?php echo '<script'; ?>
 src="dist/js/holder.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/application.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/left_nav.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">

    var global_url = $('#global_url').html();

    var generate_order_url = 'http://' + global_url + '/guanpeipindao/zhengdingdan/generate_order.php';
    function creatXHR() {
        var xhr = null;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        return xhr;
    }

    var xhr = creatXHR();

    var list = $('a[id^=buy]');
    $.each(list, function (index, domEle) {

        domEle.onclick = function () {

            user_id = $('#userid').html();
            book_id = $(this).next().html();
            user_type = $('#usertype').html();

            if (user_type == null || user_type == undefined || user_type == '') {
                alert('你还没登录！');
                return;
            }
            if (user_type != 'library_user') {
                alert('你不是图书馆用户，不能生成订单！');
                return;
            }
            alert(user_id);
            alert(book_id);
            alert(user_type);
            alert(generate_order_url);
            xhr.open('POST', generate_order_url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//            xhr.send("user_id=" + user_id + "&book_ids=" + book_id + "&book_nums=" + book_nums);
            xhr.send("user_id=" + user_id + "&book_ids=" + book_id);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    alert(this.responseText);
                }
            }

//        $.ajax({
//            type: "POST",
//            url: "generate_order.php",
//            data: { user_id: user_id, book_ids: book_id},
//            success: function(msg) {
//                alert("生成订单成功! " + msg);
//            }
//        });

        }

    });
<?php echo '</script'; ?>
>

</html>
<?php }
}
