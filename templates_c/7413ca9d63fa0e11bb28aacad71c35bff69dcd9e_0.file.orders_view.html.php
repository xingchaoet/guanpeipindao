<?php
/* Smarty version 3.1.29, created on 2016-12-08 08:59:51
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\orders_view.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5848b0874b9a72_55304482',
  'file_dependency' => 
  array (
    '7413ca9d63fa0e11bb28aacad71c35bff69dcd9e' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\orders_view.html',
      1 => 1481082149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_5848b0874b9a72_55304482 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <!--<?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>-->

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">


    <!--<link rel="stylesheet" href="../dist/css/demo.css">-->
    <link rel="stylesheet" href="../dist/css/style.css">
    <!--<link rel="stylesheet" href="../dist/css/normalize.css">-->

    <?php $style_css = '../dist/css/style.css' ?>
    <link rel="stylesheet" href="<?php echo $style_css .'?v='. filemtime( $style_css ); ?>">

    <?php $header_css = '../dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $introduce_css = '../dist/css/introduce.css' ?>
    <link rel="stylesheet" href="<?php echo $introduce_css .'?v='. filemtime( $introduce_css ); ?>">


    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet'-->
    <!--type='text/css'>-->

    <title>查看我的订单</title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <!--<meta name="description" content="Animated Content Tabs with CSS3"/>-->
    <!--<meta name="keywords" content="tabs, css3, transition, checked, pseudo-class, label, css-only, sibling combinator"/>-->
    <!--<meta name="author" content="Codrops"/>-->

    <style>

        .row {
            margin-bottom: 10px;
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 12px;
        }

        /*.col-sm-3 */

        .col-sm-9 {
            width: 770px;
        }

        .down {
            margin-top: -23px;
            /*padding-top: 2px;*/
            width: 770px;
        }

        .tabs label {

            width: 150px;
            height: 0;
            border-bottom: 30px solid grey;
            border-right: 30px solid transparent;
            /*color: blue;*/
            /*background: blue;*/
            /*background: -moz-linear-gradient(top, blue 0%, lightblue 100%);*/
            /*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,blue), color-stop(100%,lightblue));*/
            /*background: -webkit-linear-gradient(top, blue 0%,lightblue 100%);*/
            /*color: blue;*/
            /*background: grey;*/
            /*background: -moz-linear-gradient(top, grey 0%, grey 100%);*/
            /*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, grey), color-stop(100%, grey));*/
            /*background: -webkit-linear-gradient(top, grey 0%, grey 100%);*/
            color: white;
            text-align: left;
        }

        .tabs input {
            position: fixed;
            z-index: 1000;
            width: 150px;
            height: 40px;
            left: 0px;
            top: 0px;
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            filter: alpha(opacity=0);
            cursor: pointer;
        }

        #scgc {
            position: relative;
            margin-left: 10px;
            margin-top: 10px;
            top: 10%;
            left: 10%;
            background-color: #002a80;
            color: #9B410E;
        }

        /*.btn:hover, .btn:focus */
        /*.content div */
        #scgc {
            position: relative;
            margin-left: 20px;
            z-index: 1000000;
            opacity: 1;
            background-color: white;
            width: 500px;
            height: 100px;
        }

        #scgc div {
            position: relative;
            z-index: 1100000;
            opacity: 1;
            background-color: white;
            width: 150px;
            height: 20px;
        }

        #scgc div input {
            position: relative;
            z-index: 1110000;
            opacity: 1;
            width: 190px;
            height: 20px;
        }

        .white_content {
            display: none;
            position: absolute;
            top: 25%;
            left: 5%;
            width: 90%;
            height: 90%;
            padding: 16px;
            /*border: 16px solid black;*/
            background-color: white;
            z-index: 1002;
            overflow: auto
        }

        .table {
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 12px;
            /*font-size: 6px;*/

        }

        /*由jquery添加到该页面*/
        #zhengdingdan_marc {
            opacity: 1;
            position: relative;
            margin-left: 10px;
            margin-top: 10px;
        }

        #zhengdingdan_marc * {
            opacity: 1;
            position: relative;
            margin-left: 10px;
            margin-top: 10px;
        }

        #zhengdingdan_marc input {
            width: 15px;
            height: 15px;
        }

        #yudingdan_marc {
            opacity: 1;
            position: relative;
            margin-left: 10px;
            margin-top: 10px;
        }

        #yudingdan_marc * {
            opacity: 1;
            position: relative;
            margin-left: 10px;
            margin-top: 10px;
        }

        #yudingdan_marc input {
            width: 15px;
            height: 15px;
        }

        .download_marc_btn {
            margin-left: 600px;
            /*width: 60px;*/
            /*height:35px;*/
            text-align: center;

        }

        .container {
            width: 100%;
            position: inherit;
            padding-right: 0px;
            padding-left: 0px;
            margin-right: auto;
            margin-left: auto;
        }

        #register_info_change input {
            position: relative;
            z-index: 1000;
            width: 200px;
            height: 20px;
            left: 0px;
            top: 0px;
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            filter: alpha(opacity=0);
            cursor: auto;
        }

        #register_info_change input[type='radio'] {
            width: 12px;
            height: 12px;
        }

        #register_info_change input[type='checkbox'] {
            width: 12px;
            height: 12px;
            /*border: 1px solid blue;*/
            /*border-color: blue;*/
        }

        .reg_left_td {
            text-align: right;
            width: 180px;
        }

        .reg_right_td {
            width: 380px;
        }

        .change_password_btn_td, .change_register_info_btn_td {
            align: center;
            valign: center;
            text-align: center;
            height: 50px;
        }

        .change_password_btn, .change_register_info_btn {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            line-height: 25px;
            height: 25px;
            margin: 0px;
            padding: 0px;
            border: 0px;
            width: 90px;
        }

        #old_password_span, #repeat_password_span, #new_password_span {
            position: relative;
            margin-left: 10px;
            /*top: 0px;*/
            /*left: 270px;*/
            border: 1px #f0f0f0 dashed;
            background-color: #FEFEE2;
            width: 200px;
            height: 15px;
            color: #ADADAD;
            line-height: 18px;
            opacity: 1;
            display: none;
        }

        #orders_view_nav_tab {
            /*width: 770px;*/
            /*height: 30px;*/
            /*background: #C3C3C3;*/
            /*background: -moz-linear-gradient(top, #C3C3C3 0%, #C3C3C3 100%);*/
            /*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #C3C3C3), color-stop(100%, #C3C3C3));*/
            /*background: -webkit-linear-gradient(top, #C3C3C3 0%, #C3C3C3 100%);*/
        }

        .the_space {

        }
/*防止header样式错版*/
        .site_header .search_size {
            width: 290px;
            height: 32px;
        }

        a {
            cursor:pointer;
            text-decoration:none;
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
                <div id="light" class="white_content">
                    <a href="#" onClick="document.getElementById('light').style.display='none';"
                       style="color:blue;z-index:9999">关闭</a>
                    <div style="width:715px;height:360px;border:#ccc solid 1px;" id="content">

                    </div>
                </div>
                <div class="the_space">
                    <!-- Codrops top bar -->
                    <section class="tabs">

                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value == "library_user") {?>

                        <!--<div id="orders_view_nav_tab">-->
                        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked"/>
                        <label for="tab-1" class="tab-label-1">我的征订单</label>

                        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2"/>
                        <label for="tab-2" class="tab-label-2">预订单</label>

                        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3"/>
                        <label for="tab-3" class="tab-label-3">上传馆藏</label>

                        <?php }?>

                        <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4"/>
                        <label for="tab-4" class="tab-label-4">注册信息修改</label>

                        <div class="clear-shadow"></div>
                        <!--</div>-->
                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value == "library_user") {?>
                        <div class="content">
                            <div id="show_zhengdingdan" class="content-1">
                                <span style="display: none" id="zdd_times"><?php echo $_smarty_tpl->tpl_vars['zdd_times']->value;?>
</span>
                                <table class='table table-bordered table-striped'>
                                    <tr style="text-align: center">
                                        <td width="150">征订单编号</td>
                                        <td width="150">生成时间</td>
                                        <td width="100">品种数量</td>
                                        <td width="150">操作</td>
                                    </tr>

                                    <?php
$_from = $_smarty_tpl->tpl_vars['zdd_order_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_order_0_saved_item = isset($_smarty_tpl->tpl_vars['order']) ? $_smarty_tpl->tpl_vars['order'] : false;
$_smarty_tpl->tpl_vars['order'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['order']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
$__foreach_order_0_saved_local_item = $_smarty_tpl->tpl_vars['order'];
?>
                                    <tr>
                                        <td id="<?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_pc_id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_pc_id'];?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_time'];?>

                                        </td>
                                        <td id="<?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_sum'];?>
" style="text-align: center">
                                            <?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_sum'];?>

                                        </td>

                                        <td>
                                            <a id="view_zdd_detail" class="view_zdd_detail">查看详情</a>
                                            <!--<a id="view_zdd_detail_mssql"   class="view_zdd_detail_mssql">查看详情mssql</a>-->
                                            <a class="zhengdingdan_download_marc">下载</a>
                                        </td>

                                    </tr>
                                    <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_local_item;
}
if ($__foreach_order_0_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_item;
}
?>
                                    <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>


                                </table>

                            </div>
                            <!--<div id="show_yudingdan" class="content-2" onmouseover="show_ydd();">-->
                            <div id="show_yudingdan" class="content-2">
                                <span style="display: none" id="ydd_times"><?php echo $_smarty_tpl->tpl_vars['ydd_times']->value;?>
</span>
                                <table id="show_yudingdan_table" class='table table-bordered table-striped'>
                                    <tr style="text-align: center">
                                        <td width="150">预订单编号</td>
                                        <td width="150">生成时间</td>
                                        <td width="100">品种数量</td>
                                        <td width="150">操作</td>
                                    </tr>

                                    <?php
$_from = $_smarty_tpl->tpl_vars['ydd_order_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_order_1_saved_item = isset($_smarty_tpl->tpl_vars['order']) ? $_smarty_tpl->tpl_vars['order'] : false;
$_smarty_tpl->tpl_vars['order'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['order']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
$__foreach_order_1_saved_local_item = $_smarty_tpl->tpl_vars['order'];
?>
                                    <tr>
                                        <td id="<?php echo $_smarty_tpl->tpl_vars['order']->value['ydd_pc_id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['order']->value['ydd_pc_id'];?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['order']->value['ydd_time'];?>

                                        </td>
                                        <td id="<?php echo $_smarty_tpl->tpl_vars['order']->value['ydd_sum'];?>
" style="text-align: center">
                                            <?php echo $_smarty_tpl->tpl_vars['order']->value['ydd_sum'];?>

                                        </td>
                                        <td>
                                            <a id="view_ydd_detail" class="view_ydd_detail">查看详情</a>
                                            <a class="yudingdan_download_marc">下载</a>
                                        </td>
                                    </tr>
                                    <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_1_saved_local_item;
}
if ($__foreach_order_1_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_1_saved_item;
}
?>
                                </table>

                            </div>
                            <div class="content-3">
                                <form id="guangcangexcel">

                                    <a style="float: left" class="btn btn-sm btn-info"
                                       href="<?php echo PATH; ?>gc_moban.xlsx">模板下载</a>
                                    <input type="hidden" name="usrn" value="<?php echo $_SESSION['user_id'];?>
"/>
                                    <input type="hidden" name="leadExcel" value="true">

                                    <div>div</div>
                                    <div id="scgc">
                                        <div class="form-group ">
                                            <input id="input_file" class=" " type="file" name="inputExcel"
                                                   id="inputExcel">
                                        </div>
                                        <div id="input_import" class="form-group  ">
                                            <input class=" " type="button" value="导入数据"
                                                   onclick="gangcangimport();">
                                        </div>


                                    </div>
                                </form>
                            </div>

                            <?php }?>

                            <div class="content-4">
                                <form id="change_password_form">
                                    <table id="register_info_change" class=''>
                                        <tr>
                                            <td class="reg_left_td">原密码：</td>
                                            <td class="reg_right_td"><input type="password" id="old_password"
                                                                            name="old_password">
                                                <span id="old_password_span"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">新密码：</td>
                                            <td class="reg_right_td"><input type="password" id="new_password"
                                                                            name="new_password">
                                                <span id="new_password_span"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">确认密码：</td>
                                            <td class="reg_right_td"><input type="password" id="repeat_password"
                                                                            name="repeat_password">
                                                <span id="repeat_password_span"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="change_password_btn_td" colspan="2">
                                                <button id="change_password_btn" disabled="disabled"
                                                        class="btn btn-default change_password_btn"
                                                        onclick="change_password();">确认修改
                                                </button>
                                            </td>
                                        </tr>

                                        <?php if ($_smarty_tpl->tpl_vars['user_type']->value == "library_user") {?>
                                        <tr>
                                            <td class="reg_left_td">图书馆名称：</td>
                                            <td class="reg_right_td"><input type="text" id="library"
                                                                            name="library">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">省份：</td>
                                            <td class="reg_right_td"><input type="text" id="province"
                                                                            name="province">
                                            </td>
                                        </tr>
                                        <?php }?>

                                        <tr>
                                            <td class="reg_left_td">工作地址：</td>
                                            <td class="reg_right_td"><input type="text" id="work_addr"
                                                                            name="work_addr">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">邮编：</td>
                                            <td class="reg_right_td"><input type="text" id="zip_code"
                                                                            name="zip_code">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">联系人：</td>
                                            <td class="reg_right_td"><input type="text" id="lian_xi_ren"
                                                                            name="lian_xi_ren">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">办公电话：</td>
                                            <td class="reg_right_td"><input type="text" id="phone"
                                                                            name="phone">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">移动电话：</td>
                                            <td class="reg_right_td"><input type="text" id="mobile_phone"
                                                                            name="mobile_phone">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">QQ：</td>
                                            <td class="reg_right_td"><input type="text" id="qq"
                                                                            name="qq">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">电子邮件：</td>
                                            <td class="reg_right_td"><input type="text" id="email"
                                                                            name="email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">职务：</td>
                                            <td class="reg_right_td"><?php include('zw_select.php'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">数据需求：</td>
                                            <td class="reg_right_td"></td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">时间：</td>
                                            <td class="reg_right_td">
                                                <input type="radio" name="frequency" value="每周"/>每周
                                                <input type="radio" name="frequency" value="一个月"/>一个月
                                                <input type="radio" name="frequency" value="一季度"/>一季度
                                                <input type="radio" name="frequency" value="半年度"/>半年度
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">格式：</td>
                                            <td class="reg_right_td">
                                                <input type="checkbox" name="excel">Excel
                                                <input type="checkbox" name="marc">Marc
                                                <!--<input type="checkbox" name="excel_marc">Excel+Marc-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="reg_left_td">学科：</td>
                                            <td class="reg_right_td">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="she_ke_ren_wen">社科人文
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="she_ke_jing_guan">社科经管
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="ren_wen_kao_gu">人文考古
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="hua_xue">化学
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="wu_li">物理
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="shu_xue">数学
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="zi_yuan_huan_jing">资源环境
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="nong_ye_ke_xue">农业科学
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="yi_yao_wei_sheng">医药卫生
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sheng_ming_ke_xue">生命科学
                                                        </td>
                                                        <td colspan="2">
                                                            <input type="checkbox" name="ke_xue_tong_su_du_wu">科学通俗读物
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="wai_yu_du_wu">外语读物
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="gong_ye_ji_shu">工业技术
                                                        </td>
                                                        <td colspan="2">
                                                            <input type="checkbox" name="zong_he">综合
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="change_register_info_btn_td" colspan="2">
                                                <button id="change_register_info_btn" disabled="disabled"
                                                        class="btn btn-default change_register_info_btn"
                                                        onclick="change_register_info();">确认修改
                                                </button>
                                            </td>
                                        </tr>

                                    </table>
                                </form>
                                <!--注册信息修改-->
                                <!--<div class="password_change">-->
                                <!--<span>原密码:</span><input type="text" name="old_password">-->
                                <!--<span>新密码:</span><input type="text" name="repeat_password">-->
                                <!--<span>确认密码:</span><input type="text" name="new_password">-->
                                <!--</div>-->
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

        <a id="userid" style="display: none "><?php echo $_SESSION['user_id'];?>
</a>
        <a id="usertype" style=" display: none "><?php echo $_SESSION['user_type'];?>
</a>

    </div>
</div>

</body>
<?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/holder.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/application.js"><?php echo '</script'; ?>
>

<!--<link rel="shortcut icon" href="../favicon.ico">-->
<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/modernizr.custom.04022.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

    var global_url = $('#global_url').html();


    var orders_view_url = 'http://' + global_url + '/zhengdingdan/orders_view.php';

    var guangcangimport_url = 'http://' + global_url + '/chachong/guangcang_chachong.php';

    //    征订单查看详情
    var orders_view_detail_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_detail.php';

    //    征订单查看详情 masql
    var orders_view_detail_mssql_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_detail_mssql.php';

    //    预订单查看详情
    var orders_view_ydd_detail_url = 'http://' + global_url + '/zhengdingdan/yudingdan_detail.php';

    //    征订单下载文件产生子页面
    var zhengdingdan_download_marc_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_download_marc.php';
    //    预订单下载文件产生子页面
    var yudingdan_download_marc_url = 'http://' + global_url + '/zhengdingdan/yudingdan_download_marc.php';
    //返回到我的预订单
    var orders_view_ydd_url = 'http://' + global_url + '/zhengdingdan/return_yudingdan.php';
    //修改密码
    var change_password_url = 'http://' + global_url + '/members_space/change_password.php';

    var check_old_password_url = 'http://' + global_url + '/members_space/check_old_password.php';

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

    function gangcangimport() {
        var fm = document.getElementById('guangcangexcel');
        var fdata = new FormData(fm);

        xhr.open('POST', guangcangimport_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('content').innerHTML = '';
                document.getElementById('light').style.display = 'block';
                document.getElementById('content').innerHTML = this.responseText;
            }
        }
    }

    function firstpagesend() {

        var fdata = new FormData();

        var page = $("#firstpage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        var showtype = $("#firstpage").attr("showtype");
        fdata.append("show_type", showtype);

        if (showtype != 'detail') {
            xhr.open('POST', orders_view_url, true);
        } else {
            xhr.open('POST', orders_view_detail_url, true);
        }

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_zhengdingdan').innerHTML = '';
                document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
            }
        }
    }

    //    预订单首页
    function ydd_firstpagesend() {

        var fdata = new FormData();

        var page = $("#ydd_firstpage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        xhr.open('POST', orders_view_ydd_detail_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_yudingdan').innerHTML = '';
                document.getElementById('show_yudingdan').innerHTML = this.responseText;
            }
        }
    }


    function prepagesend() {

        var fdata = new FormData();

        var page = $("#prepage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        var showtype = $("#prepage").attr("showtype");
        fdata.append("show_type", showtype);

        if (showtype != 'detail') {
            xhr.open('POST', orders_view_url, true);
        } else {
            xhr.open('POST', orders_view_detail_url, true);
        }

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_zhengdingdan').innerHTML = '';
                document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
            }
        }
    }

    //预订单前一页
    function ydd_prepagesend() {

        var fdata = new FormData();

        var page = $("#ydd_prepage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        xhr.open('POST', orders_view_ydd_detail_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_yudingdan').innerHTML = '';
                document.getElementById('show_yudingdan').innerHTML = this.responseText;
            }
        }
    }

    function nextpagesend() {

        var fdata = new FormData();

        var page = $("#nextpage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        var showtype = $("#nextpage").attr("showtype");
        fdata.append("show_type", showtype);
//        alert(showtype);

        if (showtype != 'detail') {
            xhr.open('POST', orders_view_url, true);
        } else {
            xhr.open('POST', orders_view_detail_url, true);
        }

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_zhengdingdan').innerHTML = '';
                document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
            }
        }
    }

    //预订单下一页
    function ydd_nextpagesend() {

        var fdata = new FormData();

        var page = $("#ydd_nextpage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        xhr.open('POST', orders_view_ydd_detail_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_yudingdan').innerHTML = '';
                document.getElementById('show_yudingdan').innerHTML = this.responseText;
            }
        }
    }


    function lastpagesend() {

//        var fm = document.getElementById('condition');
        var fdata = new FormData();
        var page = $("#lastpage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        var showtype = $("#lastpage").attr("showtype");
        fdata.append("show_type", showtype);

        if (showtype != 'detail') {
            xhr.open('POST', orders_view_url, true);
        } else {
            xhr.open('POST', orders_view_detail_url, true);
        }

        xhr.send(fdata);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_zhengdingdan').innerHTML = '';
                document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
            }
        }
    }

    //预订单最后一页
    function ydd_lastpagesend() {

        var fdata = new FormData();
        var page = $("#ydd_lastpage").attr("page");
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        xhr.open('POST', orders_view_ydd_detail_url, true);

        xhr.send(fdata);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_yudingdan').innerHTML = '';
                document.getElementById('show_yudingdan').innerHTML = this.responseText;
            }
        }
    }

    function jumptopagesend() {

        var fdata = new FormData();

        var page = $("#jumptopage").val();
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        var showtype = $("#jumptopage").attr("showtype");
        fdata.append("show_type", showtype);

        if (showtype != 'detail') {
            xhr.open('POST', orders_view_url, true);
        } else {
            xhr.open('POST', orders_view_detail_url, true);
        }

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_zhengdingdan').innerHTML = '';
                document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
            }
        }
    }

    //    预订单跳转到页面
    function ydd_jumptopagesend() {

        var fdata = new FormData();

        var page = $("#ydd_jumptopage").val();
        fdata.append("page", page);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);

        xhr.open('POST', orders_view_ydd_detail_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_yudingdan').innerHTML = '';
                document.getElementById('show_yudingdan').innerHTML = this.responseText;
            }
        }
    }

    $('#show_zhengdingdan').on('mouseenter', function () {

        var flag;
        zdd_times_slice = $('#zdd_times_slice').text();
        zdd_times = $('#zdd_times').text();
        if (zdd_times_slice != '' && zdd_times_slice != 'undefined' && zdd_times_slice != null) {
            flag = zdd_times_slice;
        } else {
            flag = zdd_times;
        }

        if (flag == 1) {

            $(".view_zdd_detail").one("click", function () {
                var fdata = new FormData();
                var uid = $("#userid").text();
                fdata.append("usrn", uid);
                var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
//                alert(sheet_no);
                fdata.append("sheet_no", sheet_no);

                xhr.open('POST', orders_view_detail_url, true);
                xhr.send(fdata);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        document.getElementById('show_zhengdingdan').innerHTML = '';
                        document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
                    }
                }

            });
//测试
//            $(".view_zdd_detail_mssql").one("click", function () {
//                var fdata = new FormData();
//                var uid = $("#userid").text();
//                fdata.append("usrn", uid);
//                var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
////                alert(sheet_no);
//                fdata.append("sheet_no", sheet_no);
//
//                xhr.open('POST', orders_view_detail_mssql_url, true);
//                xhr.send(fdata);
//                xhr.onreadystatechange = function () {
//                    if (this.readyState == 4) {
//                        document.getElementById('show_zhengdingdan').innerHTML = '';
//                        document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
//                    }
//                }
//
//            });

            $(".zhengdingdan_download_marc").one("click", function () {

                var fdata = new FormData();
                var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
                fdata.append("sheet_no", sheet_no);
                var type_num = $(this).parent().parent().children().eq(2).prop('id');
                fdata.append("type_num", type_num);

                xhr.open('POST', zhengdingdan_download_marc_url, true);
                xhr.send(fdata);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        document.getElementById('show_zhengdingdan').innerHTML = '';
                        document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
                    }
                }
            });


            dmarc();

            download_zhengdingdan();

            $('#zdd_times').text('2');

            if (zdd_times_slice == 1) {
                $('#zdd_times_slice').text('2');
            }

        }

    });


    $('#show_yudingdan').on('mouseenter', function () {

        var flag;
        ydd_times_slice = $('#ydd_times_slice').text();
        ydd_times = $('#ydd_times').text();
//        alert(ydd_times_slice);
        if (ydd_times_slice != '' && ydd_times_slice != 'undefined' && ydd_times_slice != null) {
//            alert(ydd_times_slice);
            flag = ydd_times_slice;
        } else {
//            alert(ydd_times_slice);
            flag = ydd_times;
        }

        if (flag == 1) {
//            查看预订单详情
            $(".view_ydd_detail").one('click', function () {
                var fdata = new FormData();
                var uid = $("#userid").text();
                fdata.append("usrn", uid);
                var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
//                alert(sheet_no);
                fdata.append("sheet_no", sheet_no);

                xhr.open('POST', orders_view_ydd_detail_url, true);
                xhr.send(fdata);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        document.getElementById('show_yudingdan').innerHTML = '';
                        document.getElementById('show_yudingdan').innerHTML = this.responseText;
                    }
                }

            });

//预订单转到下载页面按钮

            $(".yudingdan_download_marc").on("click", function () {

                var fdata = new FormData();
                var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
                fdata.append("sheet_no", sheet_no);
//                alert(sheet_no);
                var type_num = $(this).parent().parent().children().eq(2).prop('id');
                fdata.append("type_num", type_num);
//                alert(type_num);

                xhr.open('POST', yudingdan_download_marc_url, true);
                xhr.send(fdata);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        document.getElementById('show_yudingdan').innerHTML = '';
                        document.getElementById('show_yudingdan').innerHTML = this.responseText;
                    }
                }

            });


            dmarc_ydd();

            download_yudingdan();

            //            下载页面下载按钮绑定一次事件
//            dmarc();

            $('#ydd_times').text('2');

            if (ydd_times_slice == 1) {
                $('#ydd_times_slice').text('2');
            }

        }
    });


    function return_to_my_zhengdingdan() {
        var fdata = new FormData();
        fdata.append("page", 1);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);
        xhr.open('POST', orders_view_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_zhengdingdan').innerHTML = '';
                document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
            }
        }
    }


    function return_to_my_yudingdan() {
        var fdata = new FormData();
        fdata.append("page", 1);

        var uid = $("#userid").text();
        fdata.append("usrn", uid);
        xhr.open('POST', orders_view_ydd_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show_yudingdan').innerHTML = '';
                document.getElementById('show_yudingdan').innerHTML = this.responseText;
            }
        }
    }

    //    功能完好

    function download_zhengdingdan() {

        $(".download_zhengdingdan").click(function () {

            if ((!$("input[type=radio][name=marc][value='excel']").attr("checked")) && (!$("input[type=radio][name=marc][value='marc']").attr("checked"))) {

                alert('未选择文件类型！');
                return;
            }

            if (($("input[type=radio][name=marc][value='marc']").attr("checked")) && (!($("#MARC").attr("checked") || $("#Calis").attr("checked") || $("#CF").attr("checked")))) {

                alert('未选择文件类型！');
                return;
            }

            var sheet_no = $(this).prop('id');
            if ($("#MARC").attr("checked") || $("#Calis").attr("checked") || $("#CF").attr("checked")) {

                var marc;
                var calis;
                var cf;

                if ($("#MARC").attr("checked")) {
                    marc = 1;
                }
                if ($("#Calis").attr("checked")) {
                    calis = 1;
                }
                if ($("#CF").attr("checked")) {
                    cf = 1;
                }

                document.location.href =
                        "http://" + global_url + "/zhengdingdan/download_marc.php?sheet_no=" + sheet_no + '&MARC=' + marc + '&CALIS=' + calis + '&CF=' + cf;
            }

            if (($("input[type=radio][name=marc][value='excel']").attr("checked"))) {
                document.location.href =
                        "http://" + global_url + "/zhengdingdan/download_marc.php?sheet_no=" + sheet_no + '&EXCEL=1';
            }
        });
    }


    function download_yudingdan() {

        $(".download_yudingdan").click(function () {

            if ((!$("input[type=radio][name=marc_ydd][value='excel_ydd']").attr("checked")) && (!$("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked"))) {

                alert('未选择文件类型！');
                return;
            }

            if (($("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked")) && (!($("#MARC_YDD").attr("checked") || $("#Calis_YDD").attr("checked") || $("#CF_YDD").attr("checked")))) {

                alert('未选择文件类型！');
                return;
            }

            var sheet_no = $(this).prop('id');
            if ($("#MARC_YDD").attr("checked") || $("#Calis_YDD").attr("checked") || $("#CF_YDD").attr("checked")) {

                var marc;
                var calis;
                var cf;

                if ($("#MARC_YDD").attr("checked")) {
                    marc = 1;
                }
                if ($("#Calis_YDD").attr("checked")) {
                    calis = 1;
                }
                if ($("#CF_YDD").attr("checked")) {
                    cf = 1;
                }
//                alert(sheet_no);

                document.location.href =
                        "http://" + global_url + "/zhengdingdan/download_ydd_marc.php?sheet_no=" + sheet_no + '&MARC=' + marc + '&CALIS=' + calis + '&CF=' + cf;
            }

            if (($("input[type=radio][name=marc_ydd][value='excel_ydd']").attr("checked"))) {
                document.location.href =
                        "http://" + global_url + "/zhengdingdan/download_ydd_marc.php?sheet_no=" + sheet_no + '&EXCEL=1';
            }
        });
    }


    function dmarc() {

        if (!($("input[type=radio][name=marc][value='marc']").attr("checked"))) {
            $('#Calis').attr("disabled", true);
            $('#CF').attr("disabled", true);
            $('#MARC').attr("disabled", true);
        }

        $("input[type=radio][name=marc][value='excel']").change(function () {

            $("#Calis").attr("checked", false);
            $("#CF").attr("checked", false);
            $("#MARC").attr("checked", false);

            $('#Calis').attr("disabled", true);
            $('#CF').attr("disabled", true);
            $('#MARC').attr("disabled", true);
        })

        $("input[type=radio][name=marc][value='marc']").change(function () {
            $('#Calis').attr("disabled", false);
            $('#CF').attr("disabled", false);
            $('#MARC').attr("disabled", false);
        })
    }

    function dmarc_ydd() {
//        alert(1);
        if (!($("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked"))) {
            $('#Calis_YDD').attr("disabled", true);
            $('#CF_YDD').attr("disabled", true);
            $('#MARC_YDD').attr("disabled", true);
        }

        $("input[type=radio][name=marc_ydd][value='excel_ydd']").change(function () {

            $("#Calis_YDD").attr("checked", false);
            $("#CF_YDD").attr("checked", false);
            $("#MARC_YDD").attr("checked", false);

            $('#Calis_YDD').attr("disabled", true);
            $('#CF_YDD').attr("disabled", true);
            $('#MARC_YDD').attr("disabled", true);
        })

        $("input[type=radio][name=marc_ydd][value='marc_ydd']").change(function () {
            $('#Calis_YDD').attr("disabled", false);
            $('#CF_YDD').attr("disabled", false);
            $('#MARC_YDD').attr("disabled", false);
        })
    }

    //验证原密码输入是否正确

    $(document).ready(function () {

        var old_password_flag, new_password_flag, repeat_password_flag;

        $('#old_password').on('blur', old_password_input_blur);
        $('#new_password').on('blur', new_password_input_blur);
        $('#repeat_password').on('blur', repeat_password_input_blur);

        function chk_change_password() {
            if ((old_password_flag == 'yes') && (new_password_flag == 'yes') && (repeat_password_flag == 'yes')) {
                document.getElementById("change_password_btn").disabled = false;
            } else {
                document.getElementById("change_password_btn").disabled = true;
            }
        }


        function old_password_input_blur() {
//        alert(1);
            old_password = $('#old_password').val();
            //        alert(old_password);
            var fdata = new FormData();
            fdata.append("old_password", old_password);
            xhr.open('POST', check_old_password_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var msg = xhr.responseText;
//                    alert(msg);
                        if (msg == '1') {
                            $("#old_password_span").show();
                            $('#old_password_span').html("<font color='red'>原密码输入错误</font>");
                            old_password_flag = '';
                        } else if (msg == '0') {
                            $("#old_password_span").show();
                            $('#old_password_span').html("<font color='green'>原密码输入正确</font>");
                            old_password_flag = 'yes';
                        }
                    }
                }
            }
        }


        function new_password_input_blur() {
            new_password = $('#new_password').val();
            if (new_password.length < 6) {
                $("#new_password_span").show();
                $('#new_password_span').html("<font color='red'>密码长度最少需要6位</font>")
            } else if (new_password.length >= 6 && new_password.length < 12) {
                $("#new_password_span").show();
                $('#new_password_span').html("<font color='green'>密码符合要求。密码强度：弱</font>")
                new_password_flag = 'yes';
            } else if ((new_password.match(/^[0-9]*$/) != null) || (new_password.match(/^[a-zA-Z]*$/) != null )) {
                $("#new_password_span").show();
                $('#new_password_span').html("<font color='green'>密码符合要求。密码强度：中</font>")
                new_password_flag = 'yes';
            } else {
                $("#new_password_span").show();
                $('#new_password_span').html("<font color='green'>密码符合要求。密码强度：高</font>")
                new_password_flag = 'yes';
            }

        }

        function repeat_password_input_blur() {
            new_password = $('#new_password').val();
            repeat_password = $('#repeat_password').val();
            if (new_password != repeat_password) {
                $("#repeat_password_span").show();
                $('#repeat_password_span').html("<font color='red'>两次密码输入不一致</font>");
                repeat_password_flag = '';
            } else if (repeat_password != '' && new_password == repeat_password) {
                $("#repeat_password_span").show();
                $('#repeat_password_span').html("<font color='green'>两次密码输入一致</font>")
                repeat_password_flag = 'yes';
            }

            chk_change_password();

        }

    });

    function change_password() {
        var fm = document.getElementById('change_password_form');
        var fdata = new FormData(fm);
        xhr.open('POST', change_password_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                alert(this.responseText);
            }
        }
    }

    $('.tab-selector-1').click(function () {
        document.getElementById('light').style.display='none';
    });

    $('.tab-selector-2').click(function () {
        document.getElementById('light').style.display='none';
    });

    $('.tab-selector-4').click(function () {
        document.getElementById('light').style.display='none';
    });


<?php echo '</script'; ?>
>
</html>
<?php }
}
