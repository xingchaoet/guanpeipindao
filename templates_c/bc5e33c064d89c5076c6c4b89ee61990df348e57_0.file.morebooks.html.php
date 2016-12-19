<?php
/* Smarty version 3.1.29, created on 2016-12-19 11:51:42
  from "D:\phpStudy\WWW\guanpeipindao\templates\morebooks.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5857594ec82a09_10799605',
  'file_dependency' => 
  array (
    'bc5e33c064d89c5076c6c4b89ee61990df348e57' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\morebooks.html',
      1 => 1482119497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_5857594ec82a09_10799605 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\phpStudy\\WWW\\guanpeipindao\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>更多</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/left_nav.css">


    <?php $header_css = 'dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $introduce_css = 'dist/css/introduce.css' ?>
    <link rel="stylesheet" href="<?php echo $introduce_css .'?v='. filemtime( $introduce_css ); ?>">

    <?php $progressbar_css = 'dist/css/progressbar.css' ?>
    <link rel="stylesheet" href="<?php echo $progressbar_css .'?v='. filemtime( $progressbar_css ); ?>">

    <?php $jquery_confirm_css = 'dist/css/jquery.confirm.css' ?>
    <link rel="stylesheet" href="<?php echo $jquery_confirm_css .'?v='. filemtime( $jquery_confirm_css ); ?>">


    <style>
        body {
            padding-top: 10px;
            margin-left: 30px;
            margin-right: 30px;
        }

        .col-sm-4 {
            background: #FFF;
            margin-bottom: 10px;
            padding-left: 1px;
            padding-right: 1px;
        }

        .col-sm-9 {
            width: 770px;
        }

        .row {
            margin-bottom: 10px;
        }

        p {
            font-family: 'Microsoft YaHei', 'Arial';
            /*font-size: smaller;*/
            /*ie*/
            /*font-size: xx-small;*/
            font-size: 10px;
            display: block;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 1px;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
        }

        button {
            font-family: 'Microsoft YaHei', 'Arial';
        }

        .btn-toolbar {
            margin-right: 10px;
            float: right;
        }

        .show_title {
            margin-top: 10px;
            background-color: #EBEBEB;
            /*display: none;*/
            width: 790px;
            height: 32px;
            font-size: 15px;
            line-height: 32px;
            border: 0px solid transparent;
            box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.2);

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/
            margin-bottom: 4px;
        }

        .down {
            padding-top: 10px;
            width: 770px;
        }

        .op_batch {
            width: 770px;
            font-family: 'Microsoft YaHei', 'Arial';
            margin-top: -5px;
            font-size: 12px;
        }

        .navbar {
            background-color: lightblue;
        }

        #show_type {
            margin-left: 10px;
            font-family: 'Microsoft YaHei', 'Arial';
            float: left;
        }

        .show_type_style {
            opacity: 0.5;
        }

        .fen_mian {
            /*width: 125px;*/
            /*height: 168px;*/
            width: 150px;
            height: 168px;
        }

        .sum {
            width: 20px;
            height: 15px;
            overflow-x: visible;
            overflow-y: visible;
        }

        .left_td {

        }

        .right_td {
            font-size: 5px;
            width: 115px;
            height: 201px;
        }

        .add_and_check {
            /*margin-left:600px;*/
            /*margin-bottom:40px;*/
            /*float: right;*/
            /*margin-right: 10px;*/
            /*margin-top: 60px;*/
            /*margin-left: 620px;*/
            /*margin-bottom: 20px;*/
            /*position: absolute;*/
        }

        #pagination {

            float: right;
            margin-right: 5px;
        }

        #pagination a {
            text-decoration: none;
        }

        #pagination a:link {
            color: black;
        }

        #pagination a:hover {
            cursor: pointer;
            color: purple;
        }

        #pagination a:visited {
            color: red;
        }

        .need_op_batch {
            margin-top: 10px;
        }

        .batch_ltd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 260px;
        }

        .batch_mtd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 260px;
        }

        .batch_r_f_td {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 260px;
            display: none;
        }

        .batch_rtd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 50px;
        }

        .batch_table {
            margin-bottom: 10px;
            display: none;
        }

        .batch_title {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .batch_icon {
            /*margin-top: 10px;*/
            margin-bottom: 10px;

            float: right;
            margin-right: 10px;
        }

        .default_num_two_types_span {
            display: none;
            height: 25px;
            width: 20px;
        }

        .default_num_two_types_input {
            display: none;
            height: 25px;
            width: 20px;
            text-align: left;

        }

        .hide_before_purchase {
            display: none;
        }

        .hide_before_purchase_session {
            display: none;
        }

        #batch_option {
            margin-top: 5px;
            float: left;
        }

        .flow {
            margin-top: 5px;
            margin-left: 5px;
            float: left;
            display: none;
        }

        .clear {
            clear: both;
        }

        .show_title_batch {
            margin-top: 10px;
            background-color: #EBEBEB;
            /*display: none;*/
            width: 790px;
            height: 32px;
            font-size: 15px;
            line-height: 32px;
            border: 0px solid transparent;
            box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.2);

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/
            margin-bottom: 4px;
            display: none;
        }

        a {
            cursor: pointer;
            text-decoration: none;
        }

        a:hover, a:focus {
            color: #2a6496;
            text-decoration: none;
        }

    </style>
</head>
<body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="site">
    <a id="default_num_two_types" style="display: none "><?php if ($_SESSION['default_num_two_types']) {
echo $_SESSION['default_num_two_types'];
} else { ?>2<?php }?></a>
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

            <?php if ($_SESSION['islogin']) {?>
            <div class="op_batch">
                <div class="need_op_batch">

                    <div class="batch_title">
            <span>
            你还有<?php echo $_smarty_tpl->tpl_vars['need_op_batch_num']->value;?>
条未处理批次
            </span>
                        <span class="batch_icon">
            <img id="toggle_table" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/chachong/hide_table.png">
            </span>
                    </div>

                    <table id="batch_table" class="batch_table">
                        <tr>
                            <td align="center" class="batch_ltd">
                                批次号
                            </td>

                            <td class="batch_mtd">
                                批次产生时间
                            </td>

                            <td class="batch_r_f_td">
                                添加到此批次
                            </td>

                            <td class="batch_rtd">
                                删除
                            </td>

                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['need_op_batch_detail']->value;
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
                        <tr>
                            <td class="batch_ltd">
                                <a class="batch_item"><?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
</a>
                            </td>

                            <td class="batch_mtd">
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['Date_Time'];?>

                            </td>

                            <td class="batch_r_f_td">
                                <input class='add_to_batch' type="radio" name="add_to_batch" value=""/>
                            </td>

                            <td class="batch_rtd">
                                <a class="delete_batch" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
"><img width="19" height="19"
                                                             src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/chachong/delete_batch.png"></a>
                            </td>

                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
                    </table>

                </div>
            </div>
            <?php }?>

            <div class="show_title" id="show_title">
                <div id="show_type">
                    <h4><b><?php echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
</b></h4>
                </div>
                <div class="btn-toolbar">
                    <div class="show_type_style ">
                        <label class="">显示方式：</label>
                        <a><img id="list" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_enable.gif"></a>
                        <!--<img id="list" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_disable.gif">-->
                        <!--<a href="more.php?type=recommend&show=list" class='btn btn-info'>列表</a>-->
                        <a><img id="picture" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_disable.gif"></a>
                        <!--<img id="picture" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_enable.gif">-->
                    </div>
                    </p>
                </div>
            </div>

            <div id="show_title_batch" class="show_title_batch">

                <label style="margin-left: 10px">结果列表:</label>

                <div style="float:right; margin-right: 20px">显示方式：

                    <span id="list_disable_pic_batch_enable" style="float:right; margin-right: 5px;">
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_disable.gif" onclick="send_batch();"></a>
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_enable.gif"
                                    onclick="sendpic_batch();"></a>
                            </span>

                    <span id="pic_disable_list_batch_enable"
                          style="float:right; margin-right: 5px; display: none">
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_enable.gif" onclick="send_batch();"></a>
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_disable.gif"
                                    onclick="sendpic_batch();"></a>
                            </span>
                </div>
            </div>

            <!--<div class="show_title_batch" id="show_title_batch">-->
            <!--<div id="show_type_batch">-->
            <!--<h4><b></b></h4>-->
            <!--</div>-->
            <!--<div class="btn-toolbar">-->
            <!--<div class="show_type_style ">-->
            <!--<label class="">显示方式：</label>-->
            <!--<a><img id="list_batch" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_enable.gif"></a>-->
            <!--&lt;!&ndash;<img id="list" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_disable.gif">&ndash;&gt;-->
            <!--&lt;!&ndash;<a href="more.php?type=recommend&show=list" class='btn btn-info'>列表</a>&ndash;&gt;-->
            <!--<a><img id="picture_batch" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_disable.gif"></a>-->
            <!--&lt;!&ndash;<img id="picture" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_enable.gif">&ndash;&gt;-->
            <!--</div>-->
            <!--</p>-->
            <!--</div>-->
            <!--</div>-->

            <?php if ($_SESSION['islogin']) {?>

            <div class="wrap_add_and_check">

                <?php if ($_SESSION['start_purchase_two_types']) {?>

                <div id='batch_option'>
                    <input id='batch_option_create_radio' type="radio" name="batch_option_radio" value="创建新批次"/>创建新批次
                    <input id='batch_option_add_radio' type="radio" name="batch_option_radio" value="添加到原有批次"/>添加到原有批次
                </div>
                <div class='flow'>
                    <span class='default_num_two_types_span'>默认数量</span> <input class=' default_num_two_types_input'
                                                                                type='text'>
                    <button id='manipulate_session_two_types_btn' class='btn btn-default btn-sm' style='float: left'
                            disabled='true' onclick='manipulate_session_two_types();'>开始采购
                    </button>

                </div>
                <div id='progressbar' style='float: left'>
                    <div></div>
                </div>

                <?php } else { ?>

                <div id='batch_option'>
                    <input id='batch_option_create_radio' type="radio" name="batch_option_radio" value="创建新批次"/>创建新批次
                    <input id='batch_option_add_radio' type="radio" name="batch_option_radio" value="添加到原有批次"/>添加到原有批次

                </div>
                <div class='flow'>
                    <span class='default_num_two_types_span'>默认数量</span> <input class=' default_num_two_types_input'
                                                                                type='text'>
                    <button id='manipulate_session_two_types_btn' class='btn btn-default btn-sm' style='float: left'
                            disabled='true' onclick='manipulate_session_two_types();'>开始采购
                    </button>

                </div>
                <div id='progressbar' style='float: left'>
                    <div></div>
                </div>

                <?php }?>

            </div>

            <div class="clear"></div>
            <?php }?>

            <div id="down" class="down">
                <div id="div_list" name="div_list">

                    <!--<div>-->
                    <!--<input type="checkbox"  id="checkall_box" onclick='checkallbox_changed();'-->
                    <!--name="all" class="checkall_box">-->
                    <!--<label>全选</label>-->
                    <!--</div>-->

                    <?php if ($_SESSION['first_search_two_types']) {?>
                    <div class='hide_before_purchase'>
                        <input type="checkbox" id="checkall_box" onclick='checkallbox_changed();'
                               name="all" class="checkall_box">
                        <label>全选</label>
                    </div>
                    <?php } elseif ($_SESSION['start_purchase_two_types']) {?>

                    <div class=''>
                        <input type="checkbox" id="checkall_box" onclick='checkallbox_changed();'
                               name="all" class="checkall_box">
                        <label>全选</label>

                    </div>
                    <?php } else { ?>

                    <div class='hide_before_purchase_session'>
                        <input type="checkbox" id="checkall_box" onclick='checkallbox_changed();'
                               name="all" class="checkall_box">
                        <label>全选</label>
                    </div>
                    <?php }?>

                    <div class="row">
                        <?php
$_from = $_smarty_tpl->tpl_vars['books']->value;
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
                        <div class="col-sm-4">
                            <table id="table">
                                <tr>
                                    <td class="left_td">
                                        <!--<a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img-->

                                        <?php if (trim($_smarty_tpl->tpl_vars['val']->value['slt'])) {?>
                                        <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img
                                                src="http://www.ecsponline.com/<?php echo trim($_smarty_tpl->tpl_vars['val']->value['slt']);?>
"
                                                class="fen_mian"
                                                onerror="javascript:this.src='dist/images/nopicture.png';"
                                                alt=""></a>
                                        <?php } else { ?>
                                        <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img
                                                src="dist/images/nopicture.png"
                                                class="fen_mian" alt=""></a>
                                        <?php }?>


                                    </td>
                                    <td class="right_td">

                                        <?php if ($_SESSION['first_search_two_types']) {?>

                                        <input type="checkbox"
                                               name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                               class="checkall get_book_info_and_update_db_class hide_before_purchase"/>
                                        <p class="hide_before_purchase">数量：
                                            <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                                   id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                                   class="sum get_book_num_and_update_db_class hide_before_purchase"
                                                   onmouseover='num_limit();'
                                                   value="<?php echo $_SESSION['default_num_two_types'];?>
"/>
                                        </p>

                                        <?php } elseif ($_SESSION['start_purchase_two_types']) {?>

                                        <input type="checkbox"
                                               name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                               class="checkall get_book_info_and_update_db_class"/>
                                        <p>数量：
                                            <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                                   id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                                   class="get_book_num_and_update_db_class"
                                                   onmouseover='num_limit();'
                                                   value="<?php echo $_SESSION['default_num_two_types'];?>
"/>
                                        </p>

                                        <?php } else { ?>


                                        <input type="checkbox"
                                               name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                               class="checkall get_book_info_and_update_db_class hide_before_purchase_session"/>
                                        <p class="hide_before_purchase">数量：
                                            <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                                   id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                                   class="get_book_num_and_update_db_class hide_before_purchase_session"
                                                   onmouseover='num_limit();'
                                                   value="<?php echo $_SESSION['default_num_two_types'];?>
"/>
                                        </p>

                                        <?php }?>


                                        <div class="tooltip-demo">
                                            <p data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['sm'];?>
">书名：
                                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['sm'],5,"...",true);?>
</p>
                                        </div>
                                        <p>ISBN: <?php echo $_smarty_tpl->tpl_vars['val']->value['isbn'];?>
</p>

                                        <div class="tooltip-demo">
                                            <p data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['zzh'];?>
">作者：
                                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['zzh'],5,"...",true);?>
</p>
                                        </div>
                                        <p>出版日期: <?php echo $_smarty_tpl->tpl_vars['val']->value['cbrq'];?>
</p>
                                        <p>价格: ￥<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['val']->value['dj']);?>
</p>
                                        <p>库存:<?php echo $_smarty_tpl->tpl_vars['val']->value['kucun'];?>
</p>

                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
?>
                    </div>
                    <?php echo $_smarty_tpl->tpl_vars['page']->value->show();?>

                </div>
            </div>
        </div>
    </div>
</div>


<a id="booktype" style="display: none "><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</a>
<a id="page_num" style="display: none "><?php echo $_smarty_tpl->tpl_vars['page_num']->value;?>
</a>

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

<?php $morebooks_js = 'dist/js/morebooks.js' ;
echo '<script'; ?>
 src='dist/js/morebooks.js?v=<?php echo filemtime( $morebooks_js );?>'><?php echo '</script'; ?>
>

<?php $jquery_confirm_js = 'dist/js/jquery.confirm.js' ;
echo '<script'; ?>
 src='dist/js/jquery.confirm.js?v=<?php echo filemtime( $jquery_confirm_js );?>'><?php echo '</script'; ?>
>
<!--<?php echo '<script'; ?>
 src="dist/js/morebooks.js?+Math.random()"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
>
    var waiting = "<div style='height: auto;width:inherit'><div style='margin :0px auto;margin-top: 20px;  width:320px'><a><img src=" + "'<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/chachong/waiting.gif'" + " ></a></div></div>";

    $("#list").click(function () {

                path = "<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_disable.gif";
                path2 = "<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_enable.gif";

                if ($("#list").attr('src') == path) {
                    return;
                }
                var fdata = new FormData();
//推荐还是最新
                var booktype = $("#booktype").text();
                fdata.append("type", booktype);

                var page_num = $("#page_num").text();
                fdata.append("page", page_num);

                fdata.append("show", 'list');

                xhr.open('POST', more_url, true);

                xhr.send(fdata);

                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = waiting;

                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {

                        $('#batch_option_create_radio').removeAttr('checked');
                        $('#batch_option_add_radio').removeAttr('checked');
                        $('.add_to_batch').removeAttr('checked');

                        $('#progressbar').hide();
                        $('.flow').hide();

                        $("#list").attr('src', path);
                        $("#picture").attr('src', path2);
                        document.getElementById('down').innerHTML = '';
                        document.getElementById('down').innerHTML = this.responseText;
                    }
                }
            }
    );

    $("#picture").click(function () {

                path = "<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_disable.gif";
                path2 = "<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_enable.gif";


                if ($("#picture").attr('src') == path) {
                    return;
                }
                var fdata = new FormData();
//推荐还是最新
                var booktype = $("#booktype").text();
                fdata.append("type", booktype);

                var page_num = $("#page_num").text();
                fdata.append("page", page_num);

                fdata.append("show", 'picture');

                fdata.append("toggle", 'picture');

                xhr.open('POST', more_url, true);

                xhr.send(fdata);

                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = waiting;

                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {

                        $('#batch_option_create_radio').removeAttr('checked');
                        $('#batch_option_add_radio').removeAttr('checked');
                        $('.add_to_batch').removeAttr('checked');

                        $('#progressbar').hide();
                        $('.flow').hide();

                        $("#picture").attr('src', path);
                        $("#list").attr('src', path2);
                        document.getElementById('down').innerHTML = '';
                        document.getElementById('down').innerHTML = this.responseText;
                    }
                }
            }
    );

    $('.delete_batch').click(function (e) {

        var save_this = $(this);
        var batch_id = e.currentTarget.name;

        $.confirm({
            'title': '警告',
            'message': '确认删除',
            'buttons': {
                '是': {
                    'class': 'blue',
                    'action': function () {
                        var fdata = new FormData();
                        fdata.append("batch_id", batch_id);

                        xhr.open('POST', delete_batch_url, true);
                        xhr.send(fdata);
                        xhr.onreadystatechange = function () {
                            if (this.readyState == 4) {
                                alert(this.responseText);

                                if (this.responseText == '删除成功！') {
                                    save_this.parent().parent().remove();
                                }
                            }
                        }
                    }
                },
                '否': {
                    'class': 'gray',
                    'action': function () {
                    }	// Nothing to do in this case. You can as well omit the action property.
                }
            }
        });

    });

<?php echo '</script'; ?>
>
</html><?php }
}
