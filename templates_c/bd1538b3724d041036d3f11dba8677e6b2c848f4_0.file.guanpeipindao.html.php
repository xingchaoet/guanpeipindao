<?php
/* Smarty version 3.1.29, created on 2017-01-11 08:33:06
  from "D:\phpStudy\WWW\guanpeipindao\templates\guanpeipindao.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58757d42e342b2_00460174',
  'file_dependency' => 
  array (
    'bd1538b3724d041036d3f11dba8677e6b2c848f4' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\guanpeipindao.html',
      1 => 1481539239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_58757d42e342b2_00460174 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\phpStudy\\WWW\\guanpeipindao\\libs\\plugins\\modifier.truncate.php';
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/left_nav.css">

    <?php $header_css = 'dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $introduce_css = 'dist/css/introduce.css' ?>
    <link rel="stylesheet" href="<?php echo $introduce_css .'?v='. filemtime( $introduce_css ); ?>">

    <!--<link rel="stylesheet" href="dist/css/carousel.css">-->

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
            margin-top: 15px;
            width: 770px;
        }

        .col-sm-2 {
            width: 180px;
        }

        .filling{
            height: 8px;
            width: 6px;
        }
        .feng_mian {
            height: 160px;
            width: 140px;
        }

        .carousel-indicators span {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin: 1px;
            /*text-indent: -999px;*/
            cursor: pointer;
            /*background-color: #F0FFFF \9;*/
            /*background-color: #F0FFFF;*/
            border: 0px solid #F0FFFF;
            border-radius: 18px;
            color: #E6E7E6;
        }

        .carousel-indicators span:hover {
            background-color: #FF588E;
        }

        .carousel-indicators .active {
            width: 18px;
            height: 18px;
            margin: 0;
            background-color: #FF588E;
        }

        #carousel_tab {
            /*position: relative;*/
            margin-left: 120px;
            margin-top: 260px;
            z-index: 2;
        }

        #shade {
            margin-left: 137px;
            margin-top: 264px;
            opacity: 0.3;
            z-index: 1;
        }

        .carousel-fade .carousel-inner .item {
            opacity: 0;
            -webkit-transition-property: opacity;
            -moz-transition-property: opacity;
            -ms-transition-property: opacity;
            -o-transition-property: opacity;
            transition-property: opacity;
        }

        .carousel-fade .carousel-inner .active {
            opacity: 1;
        }

        .carousel-fade .carousel-inner .active.left, .carousel-fade .carousel-inner .active.right {
            left: 0;
            opacity: 0;
        }

        .carousel-fade .carousel-inner .next.left, .carousel-fade .carousel-inner .prev.right {
            opacity: 1;
        }

        .content {
            margin-top: 12px;
        }

        .shade {
            width: 233px;
            height: 16px;
            background: -moz-linear-gradient(left, #D6D6D0 0%, #020302 100%);
            background: -webkit-gradient(linear, left top, right top, color-stop(0%, #D6D6D0), color-stop(100%, #020302));
            background: -webkit-linear-gradient(left, #D6D6D0 0%, #020302 100%);
        }

        .content .nav {
            background-color: #EEEEEE;
            width: 100%;
            font-size: 12px;
            height: 26px;
            padding-left: 0px;
            font-family: 'Microsoft YaHei', 'Arial';
        }

        .content .nav-tabs {
            border-bottom: 0px solid #ddd;
            background-color: #EBEBEB;
            /*display: none;*/
            /*条的大小*/
            height: 26px;
            font-size: 14px;
            line-height: 32px;
            border: 0px solid transparent;
            box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.2);

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/
            margin-bottom: 4px;
        }

        .content .nav {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .content ul, ol {
            margin-top: 0;
            margin-bottom: 0px;
        }

        .content *, *:before, *:after {
        }

        .content *, *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .content ul, menu, dir {
            display: block;
            list-style-type: disc;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            -webkit-padding-start: 0px;
        }

        .content .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            /*color: #555;*/
            cursor: default;
            /*background-color: #fff;*/
            /*border: 1px solid #ddd;*/
            /*border-bottom-color: transparent;*/
        }

        .content .nav > li > a:hover, .nav > li > a:focus {
            /*background-color: #C8C8C8;*/
        }

        .content .nav-tabs > li > a:hover {
            /*border-color: #eee #eee #ddd;*/
        }

        .content .nav > li > a:hover, .nav > li > a:focus {
            text-decoration: none;
            /*background-color: #eee;*/
        }

        /*字体padding*/
        .content .nav > li > a {
            position: relative;
            display: block;
            padding: 5px 5px;
            /*border-bottom: 30px solid grey;*/
            /*border-right: 30px solid transparent;*/
        }

        .content .nav-tabs > li > a {
            margin-right: 0px;
            line-height: 1.128571429;
            border-radius: 1px 1px 0 0;
        }

        .content .nav > li > a {
            position: relative;
            display: block;
        }

        .content a:hover, a:focus {
            color: #C8C8C8;
        }

        .content a:active, a:hover {
        }

        .content_tab {
            width: 150px;
            color: #C8C8C8;
            border-bottom: 30px solid #C8C8C8;
            border-right: 30px solid transparent;
        }

        .content .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #0066CD;
            /*border-color: #0066CD #0066CD transparent;*/
            /*border-image: none;*/
            /*border-style: solid;*/
            /*border-width: 0px;*/
            color: white;
            cursor: default;
        }

    </style>
    <?php echo '<script'; ?>
 src="dist/js/jquery.min.js"><?php echo '</script'; ?>
>

</head>

<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>

    var web_dir = $('#web_dir').html();

    function no_find(){

        var img=event.srcElement;
        img.src="/" + web_dir + "/dist/images/nopicture.png";
        img.onerror=null; //控制不要一直跳动

    }
<?php echo '</script'; ?>
>

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
                <div class="carousel-fade carousel slide" data-ride="carousel" id='mycarousel'>
                    <div id="carousel_tab" class="carousel-indicators">
                        <span data-target="#mycarousel" data-slide-to="0" class="active">1</span>
                        <span data-target="#mycarousel" data-slide-to="1">2</span>
                        <span data-target="#mycarousel" data-slide-to="2">3</span>
                        <!--<li data-target="#mycarousel" data-slide-to="2"></li>-->
                    </div>
                    <div id="shade" class="shade carousel-indicators">

                    </div>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="dist/picture/gg/gg_0.jpg" alt="" style="width:770px;height:290px;">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <div class="item">
                            <img src="dist/picture/gg/gg_1.jpg" alt="" style="width:770px;height:290px;">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <div class="item">
                            <img src="dist/picture/gg/gg_2.jpg" alt="" style="width:770px;height:290px;">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <!--<div class="item">-->
                        <!--<img src="dist/picture/p3.jpg">-->
                        <!--<div class="carousel-caption">-->
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                    <!--<a class="carousel-control left" href="#myCarousel" data-slide="0">&lsaquo;</a>-->
                    <!--<a class="carousel-control right" href="#myCarousel" data-slide="1">&rsaquo;</a>-->
                    <!--<a class="left carousel-control" href="#mycarousel" data-slide="prev">-->
                    <!--<span class="glyphicon glyphicon-chevron-left"></span>-->
                    <!--</a>-->
                    <!--<a class="right carousel-control" href="#mycarousel" data-slide="next">-->
                    <!--<span class="glyphicon glyphicon-chevron-right"></span>-->
                    <!--</a>-->
                </div>
            </div>

            <div class="content">
                <ul class="nav nav-tabs">
                    <li class='active'><a class="content_tab" href="#recommend" data-toggle='tab'
                                          onFocus="this.blur()"><span>重点推荐</span></a></li>
                    <li class=''><a class="content_tab" href="#newbooks" data-toggle='tab'
                                    onFocus="this.blur()"><span>本期新书</span></a></li>
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
                                                                                    onerror="no_find();"
                                                                                    alt=""></a>
                                <?php } else { ?>
                                <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img class="feng_mian"
                                                                                    src="dist/images/nopicture.png"
                                                                                    alt=""></a>
                                <?php }?>

                                <div class="tooltip-demo">
                                    <p data-toggle="tooltip" title="<?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['sm']);?>
"
                                       style="text-align: center">
                                        <?php echo smarty_modifier_truncate(iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['sm']),8,"...",true);?>
</p>
                                </div>
                                <p style="text-align: center">
                                    <a id="buy_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img
                                            src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/guanpeipindao/add_order.png"
                                            alt=""></a>
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
                        <div style="text-align:right;margin-right: 20px ;margin-bottom: 10px; "><a
                                href='showorder.php'
                                class="btn  ">查看订单</a>
                        </div>
                        <?php }?>
                        <div style="text-align:right; margin-right: 20px"><a href='more.php?type=recommend'><img
                                src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/guanpeipindao/more.png" alt=""></a></div>
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
                                                                                    onerror="no_find();"
                                                                                    alt=""></a>
                                <?php } else { ?>
                                <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img class="feng_mian"
                                                                                    src="dist/images/nopicture.png"
                                                                                    alt=""></a>
                                <?php }?>
                                <div class="tooltip-demo">
                                    <p data-toggle="tooltip" title="<?php echo iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['sm']);?>
"
                                       style="text-align: center">
                                        <?php echo smarty_modifier_truncate(iconv('gbk','utf-8//IGNORE',$_smarty_tpl->tpl_vars['val']->value['sm']),8,"...",true);?>
</p>
                                </div>
                                <p style="text-align: center">
                                    <a id="buy_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img
                                            src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/guanpeipindao/add_order.png"
                                            alt=""></a>
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
                        <div style="text-align:right;margin-right: 20px ;margin-bottom: 10px; "><a
                                href='showorder.php'
                                class="btn  ">查看订单</a>
                        </div>
                        <?php }?>
                        <div style="text-align:right;margin-right: 20px "><a href='more.php?type=new'><img
                                src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/guanpeipindao/more.png" alt=""></a></div>
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

<?php echo '<script'; ?>
 type="text/javascript">

    var global_url = $('#global_url').html();

    var generate_order_url = 'http://' + global_url + '/zhengdingdan/generate_order.php';
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


        }

    });


<?php echo '</script'; ?>
>

</html>
<?php }
}
