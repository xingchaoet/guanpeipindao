<?php
/* Smarty version 3.1.29, created on 2016-11-16 19:18:00
  from "D:\phpStudy\WWW\guanpeipindao\templates\chachong\chachong.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582c4068366c15_82672580',
  'file_dependency' => 
  array (
    'c7215b059ad1a7d7ea89acd7968a17fc303f3e3f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\chachong\\chachong.html',
      1 => 1479295075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_582c4068366c15_82672580 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">

    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/introduce.css">

    <?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>

    <title>馆藏查重</title>
    <style>

        .row {
            margin-bottom: 10px;
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 11px;
        }

        /*.col-sm-3 */

        .col-sm-9 {
            width: 770px;
        }

        .down {
            padding-top: 12px;
            width: 770px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .history {
            padding-top: 45px;
            width: 770px;
            display: none;
        }

        #condition {
            font-family: 'Microsoft YaHei', 'Arial';

        }

        .mid {
            margin-top: 10px;
            font-family: 'Microsoft YaHei', 'Arial';

        }

        .form-inline {
            margin-top: 15px;
            font-family: 'Microsoft YaHei', 'Arial';

            font-size: 11px;
            /*background-color: #e1edf7;*/
        }

        .checklist {
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 11px;
        }

        .save {
            margin-top: 10px;
            font-family: 'Microsoft YaHei', 'Arial';

        }

        .list_pic {
            margin-top: 15px;
            background-color: #EBEBEB;
            display: none;
            height: 32px;
            font-size: 15px;
            line-height: 32px;
            border: 0px solid transparent;
            box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.2);
            margin-bottom: 0px;

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/

        }

        .list_pic_batch {
            margin-top: 15px;
            background-color: #EBEBEB;
            display: none;
            height: 32px;
            font-size: 15px;
            line-height: 32px;
            border: 0px solid transparent;
            box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.2);
            margin-bottom: 0px;

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/

        }

        #condition_title {
            background-color: #EBEBEB;
            /*display: none;*/
            height: 32px;
            font-size: 15px;
            line-height: 32px;
            border: 0px solid transparent;
            box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.2);

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/
            margin-bottom: 4px;
        }

        #condition_content {
        }

        #div_list {
            margin-top: 0px;
        }

        .bottom {
            position: relative;
            float: right;
            /*margin-left: 500px;*/
            margin-right: 10px;
            margin-top: 20px;
            display: none;
        }

        select {
            font-size: 11px;
        }

        .btn-sm {
            /*size: 22px;*/
            padding: 3px 3px;
        }

        .black_overlay {
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index: 1001;
            -moz-opacity: 0.8;
            opacity: .80;
            filter: alpha(opacity=80);
        }

        .white_content {
            display: none;
            position: absolute;
            top: 95%;
            left: 5%;
            width: 10%;
            height: 10%;
            padding: 16px;
            /*border: 16px solid black;*/
            background-color: white;
            z-index: 1002;
            overflow: auto
        }

        .history {
            display: none;
            position: absolute;
            top: 25%;
            left: 5%;
            width: 90%;
            min-height: 360px;
            padding: 16px;
            /*border: 16px solid black;*/
            background-color: white;
            z-index: 1002;
            /*overflow: auto*/
        }

        .toggle:hover {
            background: olive;
        }

        .panel-default {
            width: 620px;
        }

        .piciinfo {
            float: left;
        }

        .picioption {
            margin-top: 10px;
        }

        #pici_list {
            /*border: #3f3f3f;*/
            display: none;
            width: 100px;

            min-height: 150px;
        }

        .upload_guancang {
            margin-left: 20px;
        }

        .submit_clear {
            /*position: relative;*/
            margin-top: 20px;
            /*margin:0px auto;*/
            margin-left: 0px;
            margin-right: 0px;
            text-align: center;

            width: 100%;
        }

        .clear_tj {
            margin-left: 20px;
        }

        #condition {
            margin-top: 20px;
        }

        #condition_panel {
            padding-top: 15px;
            background-color: #FFFFFF;
            padding-bottom: 16px;
            border: 2px #EFEFEF solid;
        }

        .clear {
            clear: both
        }

        a {
            cursor: pointer;
            text-decoration: none;
        }

        a:hover, a:focus {
            color: #2a6496;
            text-decoration: none;
        }

        .need_op_batch {
            margin-top: 10px;
        }

        .batch_ltd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 300px;
        }

        .batch_mtd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 300px;
        }

        .batch_rtd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 50px;
        }

        .batch_table {
            margin-bottom: 10px;
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

        .batch_item {

        }

        .default_num_span {
            height: 25px;
            width: 20px;
        }

        .default_num_input {
            height: 25px;
            width: 20px;
        }

        .hide_before_purchase {
            display: none;
        }

        .flow {
            margin-top: 5px;
        }
    </style>
</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="site">
    <div class="row ">

        <div class="col-sm-3">
            <!--<img src="../../../dist/js/holder.js/263x800" alt="">-->
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:left_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


            <div class="introduce">
                <?php echo $_smarty_tpl->tpl_vars['introduce']->value;?>

            </div>
        </div>

        <div class="col-sm-9">
            <div class="history">

            </div>
            <div class="down">
                <!--<form action="cc_index.php" method="post" enctype="multipart/form-data">-->
                <input type="hidden" name="usrn" value="<?php echo $_SESSION['user_id'];?>
"/>
                <input type="hidden" name="leadExcel" value="true">


                <div id="mid" class='mid'>

                    <div class="form-inline">
                        <!--<form action="guangcang_chachong.php" method="post" enctype="multipart/form-data">-->
                        <form id="guangcangexcel">

                            <a class="btn btn-sm btn-info" href="<?php echo PATH; ?>gc_moban.xlsx">模板下载</a>

                            <label class="upload_guancang">上传馆藏数据:</label>
                            <input type="hidden" name="usrn" value="<?php echo $_SESSION['user_id'];?>
"/>
                            <input type="hidden" name="leadExcel" value="true">
                            <div class="form-group btn  btn-sm">
                                <input class="btn btn-sm" type="file" name="inputExcel" id="inputExcel">
                            </div>
                            <div class="form-group btn  btn-sm">
                                <input class="btn btn-sm btn-danger " type="button" value="导入数据"
                                       onclick="gangcangimport();">
                                <!--<input class="btn btn-sm " type="submit" value="导入数据" >-->
                            </div>

                            <!--<div class="form-group btn  btn-sm">-->
                            <!--&lt;!&ndash;<a href="gangcang_import_history.php?uid=<?php echo $_SESSION['user_id'];?>
"  class="btn btn-sm btn-info " type="button" value="馆藏导入历史" >馆藏导入历史</a>&ndash;&gt;-->
                            <!--<button onclick="guan_cang_import_history()" class="btn btn-sm btn-info " type="button"-->
                            <!--value="馆藏导入历史">馆藏导入历史-->
                            <!--</button>-->

                            <!--&lt;!&ndash;<input class="btn btn-sm " type="submit" value="导入数据" >&ndash;&gt;-->
                            <!--</div>-->

                        </form>


                    </div>

                    <!--<div id="option">-->
                    <!--<label>-->
                    <!--<input class="option" type="radio" name='rname' value="tianjiadaoyiyoupici"> 添加到已有批次-->
                    <!--</label>-->
                    <!--<label>-->
                    <!--<input class="option" type="radio" name='rname' value="xinjianpici"> 新建批次-->
                    <!--</label>-->
                    <!--</div>-->

                    <!--<div id="pici_list">-->

                    <!--</div>-->


                    <!--导入模板及查重查询安钮--结束-->
                    <!--<?php include("cc_search.php");?>-->
                    <!--查询结果显示--开始-->
                </div>


                <form id="condition">
                    <input type="hidden" name="usrn" value="<?php echo $_SESSION['user_id'];?>
"/>

                    <div id="condition_title" height=30 colspan=4 bgcolor='EDEDED'><b
                            style="margin-left: 12px">信息查询查重</b></div>

                    <div id="condition_panel">

                        <table>
                            <tr>
                                <td height=25 width='60' align='right'>书名</td>
                                <td width='200'><input maxlength="100" size="25" type="text" name="bname" id="bname"
                                                       value=''></td>
                                <td width='200' align='right'>上架时间</td>
                                <td width='350'>
                                    <input class="Wdate" type="text" name="sjdate_low" id="sjdate_low" value=''
                                           onClick="WdatePicker()">至
                                    <input class="Wdate" type="text" name="sjdate_high" id="sjdate_high" value=''
                                           onClick="WdatePicker()">
                                </td>
                            </tr>
                            <tr>
                                <td height=25 width='60' align='right'>丛书名</td>
                                <td><input maxlength="100" size="25" type="text" name="csbname" id="csbname" value="">
                                </td>
                                <td align='right'>出版时间</td>
                                <td><input class="Wdate" type="text" name="cbdate_low" id="cbdate_low" value=""
                                           onClick="WdatePicker()">至
                                    <input class="Wdate" type="text" name="cbdate_high" id="cbdate_high" value=""
                                           onClick="WdatePicker()">
                                </td>
                            </tr>
                            <tr>
                                <td height=25 width='60' align='right'>书号</td>
                                <td><input maxlength="100" size="25" type="text" name="isbn" id="isbn" value=""></td>
                                <td height=25 align='right' name="zyfl_value" id="zyfl_value">图书分类</td>
                                <td style='position: absolute;  z-index:2;'><?php  include('zyfl.php');?></td>
                            </tr>
                            <tr>
                                <td height=25 width='60' align='right'>作译者</td>
                                <td><input maxlength="100" size="25" type="text" name="writer" id="writer" value="">
                                </td>
                                <td align='right' name="skfl_value">中图法-社会科学</td>
                                <td style='position: absolute; z-index:1;'><?php  include('ztfl_sk.php');?></td>
                            </tr>
                            <tr>
                                <td height=25 width='60' align='right'>主题词</td>
                                <td><input maxlength="100" size="25" type="text" name="keyword" id="keyword" value="">
                                </td>
                                <td align='right' name="zkfl_value" id="zkfl_value">中图法-自然科学</td>
                                <td style='position: absolute; z-index:0;'><?php  include('ztfl_zk.php');?></td>
                            </tr>
                            <tr>
                                <td align='right'>定价</td>
                                <td><input maxlength="18" size="8" type="text" name="price_low" id="price_low" value="">至
                                    <input maxlength="18" size="8" type="text" name="price_high" id="price_high"
                                           value="">
                                </td>
                                <td align='right'>产品介质</td>
                                <td><select name="media" id="media">
                                    <option value="全部">全部</option>
                                    <option value="纸质书">纸质书</option>
                                    <option value="按需印刷">按需印刷</option>
                                </select>
                                </td>
                            </tr>
                        </table>


                        <div class="submit_clear">
                            <!--<input type="hidden" name=t1 value="chaxunchachong">-->
                            <input type="button" class="btn btn-sm btn-default" name="submit_cc"
                                   onclick="send('chaxunchachong');"
                                   value="查询查重"/>
                            <input onclick="category_clear();" type="reset" class="btn btn-sm btn-default clear_tj"
                                   value="清空"/>
                        </div>

                        <!--<div class="form-group btn  btn-sm">-->
                        <!--</div>-->
                    </div>

                </form>

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


                    <table id="batch_table" class="table table-condensed batch_table">

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

                            <td class="batch_rtd">
                                <a class="delete_batch"><img width="19" height="19"
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


                <div id="second_floor">

                    <div id="list_pic" class="list_pic">

                        <label style="margin-left: 10px">结果列表</label>

                        <label style="margin-left: 500px">显示方式：</label>

                        <span id="list_disable_pic_enable" style="margin-left: 30px;">
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_disable.gif" onclick="send();"></a>
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_enable.gif" onclick="sendpic();"></a>
                        </span>

                        <span id="pic_disable_list_enable" style="margin-left: 30px; display: none">
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/list_enable.gif" onclick="send();"></a>
                            <a><img src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/pic_list/pic_disable.gif" onclick="sendpic();"></a>
                        </span>

                    </div>

                    <div id="list_pic_batch" class="list_pic_batch">

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
                    <!--导入模板及查重查询安钮--开始-->


                    <div id="show">


                    </div>

                    <div id="light" class="white_content">
                        <a href="#" onClick="document.getElementById('light').style.display='none';"
                           style="color:blue;z-index:9999">关闭</a>
                        <div style="width:150px;height:36px;" id="content">
                            <span>默认数量</span> <input class="default_num" type="text" value="1">
                        </div>
                    </div>

                    <!--<div id="history" class="history">-->
                    <!--<a href="#" onClick="document.getElementById('history').style.display='none';"-->
                    <!--style="color:blue;z-index:9999">关闭</a>-->
                    <!--<div style="width:715px;height:360px;border:#ccc solid 1px;" id="history_content">-->

                    <!--</div>-->
                    <!--</div>-->

                    <!--<div class="save">-->
                    <!--勾选书目前请先保存该搜索结果列表-->
                    <!--<input type="submit" value="保存搜索结果">保存批次号:-->
                    <!--</div>-->
                    <!--查询结果显示--结束-->

                    <!--<tr><td colspan=4 align=center><?php echo $pagenav;?></td></tr>-->
                    <div class="clear"></div>
                    <div id="bottom" class="bottom">
                        <button type="button" class="btn btn-sm btn-default" onclick="generate_order();"
                                value="生成征订单和预订单">
                            生成征订单和预订单
                        </button>
                        <button type="button" class="btn btn-sm btn-default" onclick="view_my_orders();" value=""
                        >查看我的订单
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!--<a id="userid" style="display: none "><?php echo $_SESSION['user_id'];?>
</a>-->
    <!--<a id="usertype" style=" display: none "><?php echo $_SESSION['user_type'];?>
</a>-->
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
<!--<?php echo '<script'; ?>
 src="../dist/js/jquery.icheck.min.js"><?php echo '</script'; ?>
>-->

<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>


    //    var global_url = "192.168.1.138";
    var global_url = $('#global_url').html();


    var search_url = 'http://' + global_url + '/guanpeipindao/search.php';
    var guangcangimport_url = 'http://' + global_url + '/guanpeipindao/chachong/guangcang_chachong.php';
    var guan_cang_import_history_url = 'http://' + global_url + '/guanpeipindao/chachong/gangcang_import_history.php';
    var delpici_url = 'http://' + global_url + '/guanpeipindao/chachong/delpici.php';
    var generate_order_url = 'http://' + global_url + '/guanpeipindao/zhengdingdan/generate_order.php';
    var order_list_url = 'http://' + global_url + '/guanpeipindao/zhengdingdan/order_list.php';

    var operate_temp_table_url = 'http://' + global_url + '/guanpeipindao/zhengdingdan/operate_temp_table.php';
    var manipulate_session_url = 'http://' + global_url + '/guanpeipindao/zhengdingdan/manipulate_session.php';
    var add_or_delete_this_page_temp_table_url = 'http://' + global_url + '/guanpeipindao/zhengdingdan/add_or_delete_this_page_temp_table.php';
    var batch_item_url = 'http://' + global_url + '/guanpeipindao/chachong/batch_item.php';
    var delete_batch_url = 'http://' + global_url + '/guanpeipindao/chachong/batch_item.php';

    var default_num_url = 'http://' + global_url + '/guanpeipindao/chachong/default_num.php';

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
    //
    //    function check_user() {
    //
    //        var utp = $('#usertype').html();
    //
    //        if (utp == null || utp == undefined || utp == '') {
    //            alert("您还没登录");
    //            return false;
    //        }
    //
    //        if (utp != "library_user") {
    //            alert("您不是图书馆用户");
    //        }
    //
    //    }

    function gangcangimport() {


        var utp = $('#usertype').html();

        if (utp == null || utp == undefined || utp == '') {
            alert("您还没登录");
            return false;
        }

        if (utp != "library_user") {
            alert("您不是图书馆用户");
        }

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

    function send(arg) {

        if (arg == "chaxunchachong" || $('#pic_disable_list_enable').is(':visible')) {

            var fm = document.getElementById('condition');
            var fdata = new FormData(fm);
            if (arg == "chaxunchachong") {
                fdata.append("show_type", 'chaxunchachong');
                fdata.append("first_search", 'first_search');
                fdata.append("manipulate_session", 'manipulate_session');

            } else {
                fdata.append("show_type", 'list');
            }


            xhr.open('POST', search_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {

                    $('#list_disable_pic_enable').show();
                    $('#pic_disable_list_enable').hide();

                    $('#list_pic_batch').hide();

                    $('#list_pic').show();
                    $('#bottom').show();

                    document.getElementById('show').innerHTML = '';
                    document.getElementById('show').innerHTML = this.responseText;
//                $("#show").load("../../guanpeipindao/chachong/cc_list.php");
                }
            }
        }
    }


    function sendpic() {

        if ($('#list_disable_pic_enable').is(':visible')) {

            var fm = document.getElementById('condition');
            var fdata = new FormData(fm);
            fdata.append("show_type", 'pic');

            xhr.open('POST', search_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {

                    $('#list_pic_batch').hide();

                    $('#list_disable_pic_enable').hide();
                    $('#pic_disable_list_enable').show();

                    document.getElementById('show').innerHTML = '';
                    document.getElementById('show').innerHTML = this.responseText;
                }
            }
        }
    }

    function get_checked_bookid_and_num() {

    }

    function firstpagesend() {

        var fm = document.getElementById('condition');
        var fdata = new FormData(fm);

        var page = $("#firstpage").attr("page");
        fdata.append("page", page);

        var showtype = $("#firstpage").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', search_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function prepagesend() {

        var fm = document.getElementById('condition');
        var fdata = new FormData(fm);

        var page = $("#prepage").attr("page");
        fdata.append("page", page);

        var showtype = $("#prepage").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', search_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function nextpagesend() {

        var fm = document.getElementById('condition');
        var fdata = new FormData(fm);

        var page = $("#nextpage").attr("page");
        fdata.append("page", page);

        var showtype = $("#nextpage").attr("showtype");
        fdata.append("show_type", showtype);


//        alert(book_ids);

//        var book_ids = [];
//        var book_nums = [];

        xhr.open('POST', search_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function lastpagesend() {

        var fm = document.getElementById('condition');
        var fdata = new FormData(fm);
        var page = $("#lastpage").attr("page");
        fdata.append("page", page);

        var showtype = $("#lastpage").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', search_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function jumptopagesend() {

        var fm = document.getElementById('condition');
        var fdata = new FormData(fm);

        var page = $("#jumptopage").val();
        fdata.append("page", page);
//        alert(page);
        var showtype = $("#jumptopage").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', search_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }


    //多关联一
    var checkboxes_sel = "input.checkall:checkbox:enabled";

    var checkboxes_changed = function () {
        var $row = $('.row');
        var $div_list = $('#div_list');
        var $checkallbox = $div_list.find("input.checkall_box:checkbox");

        var total_boxes = $row.find(checkboxes_sel).length;
        var checked_boxes = $row.find(checkboxes_sel + ":checked").length;

//        alert(total_boxes);

//        alert(checked_boxes);

        if (total_boxes == checked_boxes) {
            $checkallbox.prop("checked", true);
        } else {
            $checkallbox.prop("checked", false);
        }
    };

    $(document).on("propertychange input", checkboxes_sel, checkboxes_changed);

    //    var checkallbox_changed = function () {

    //一关联多
    function checkallbox_changed() {

        var $div_list = $('#div_list');
        var $checkallbox = $div_list.find("input.checkall_box:checkbox");
        var checkalllist = $('.checkall');

//        alert($checkallbox.prop("checked"));

        if ($checkallbox.prop("checked")) {

            $.each(checkalllist, function (index, domEle) {
                domEle.checked = true;
//                加入订单
//                domEle.trigger("click");
            });
//顺序不可变
            add_or_delete_this_page_temp_table('add');

        } else {

//顺序不可变
            add_or_delete_this_page_temp_table('delete');

//            alert(2);
            $.each(checkalllist, function (index, domEle) {
                domEle.checked = false;
//                取消订单
//                domEle.trigger("click");
            });


        }
    }
    ;

    //    var check_all_box = $('.checkall_box');
    //
    //    添加或删除一个页面的数据

    function add_or_delete_this_page_temp_table(option) {

        var user_id = $('#userid').html();
        var book_index = [];
        var book_ids = [];
        var book_nums = [];
        var $row = $('.row');
        var checked_boxes = $row.find(checkboxes_sel + ":checked");
//        var total_num = 1;
//        alert(checked_boxes.length);

        $.each(checked_boxes, function (index, checkboxEle) {

//            alert($(this).parent().attr('class'));

            if ($(this).parent().attr('class') == 'list') {
                book_nums.push($(this).parent().next().children().val());
            } else {
                book_nums.push($(this).next().val());
            }
            if (checkboxEle.name) {
                book_ids.push(checkboxEle.name);
            }
        })


//        alert(option);

        if (option == 'add') {

            for (var i in book_nums) {

//                total_num = total_num && book_nums[i];
//有一本书数量为0
                if (book_nums[i] == 0) {

                    alert("请填写数量");

//保持原来选中状态
                    var $div_list = $('#div_list');
                    var $checkallbox = $div_list.find("input.get_book_num_and_update_db_class:checkbox");
                    var get_book_num_and_update_db_class_list = $('.get_book_num_and_update_db_class');
                    var checkalllist = $('.checkall');


                    var count = 0;
                    $.each(get_book_num_and_update_db_class_list, function (index, domEle) {

                        if (this.value == 0) {
//                            domEle.checked = false;
                            book_index.push(count);
                        }

                        count = count + 1;
//                domEle.checked = domEle.is(':checked');

                    });

//                    alert(book_index.length);
//                    alert(book_index);

                    for (var j = 0; j < book_index.length; j++) {

                        $.each(checkalllist, function (index, domEle) {

                            if (index == book_index[j]) {
//                                book_index.push(index);
                                domEle.checked = false;

                            }

                        });
                    }

                    checkboxes_changed();


//                    $.each(checkalllist, function (index, domEle) {
//
//                        if (domEle.val()  == 0) {
////                            domEle.checked = false;
//                            book_index.push(index);
//                        }
//
//                        index = index + 1;
////                domEle.checked = domEle.is(':checked');
//                    });

//            $checkallbox.checked = false;
//            alert($checkallbox.checked);

                    return;
                }

            }

        }

        if (option == 'delete') {

//            不改变输入框的值

//            var list = $('input[class=get_book_num_and_update_db_class]');
//            $.each(list, function (index, domEle) {
////                domEle.onkeyup = function () {
////                    this.value = this.value.replace(/\D/g, '');
//                domEle.value = 0;
////                }
//            });

        }


        xhr.open('POST', add_or_delete_this_page_temp_table_url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("user_id=" + user_id + "&book_ids=" + book_ids + "&book_nums=" + book_nums + "&option=" + option);
//        xhr.send("user_id=" + user_id);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                alert(this.responseText);
            }
        }

    }

    //    已保存现场的修改

    $('#show').on('mouseenter', function () {

        $(".get_book_info_and_update_db_class").on("click", function () {

            var add_one_book_to_order = 1;
            var book_id = '';
            var book_num = '';

            var fdata = new FormData();

            user_id = $('#userid').html();

            book_id = this.name;

            if ($(this).parent().attr('class') == 'list') {
                book_num = $(this).parent().next().children().val();
            } else {
                book_num = $(this).next().val();
            }


            if (book_num == '0') {
                alert("请填写数量");
                $(this).prop("checked", false);
                return;
            }

            if (this.checked) {
            } else {

                $(this).parent().next().children().attr('value', 0);

                add_one_book_to_order = 0;
            }

            fdata.append("book_id", book_id);
            fdata.append("book_num", book_num);
            fdata.append("user_id", user_id);
            fdata.append("add_one_book_to_order", add_one_book_to_order);

            xhr.open('POST', operate_temp_table_url, true);
            xhr.send(fdata);

            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    checkboxes_changed();
                    alert(this.responseText);
                }
            }

        });

        $("body").on("propertychange input", ".get_book_num_and_update_db_class", function () {

//            alert("i m change");
//            alert($(this).val());

            var add_one_book_to_order = 1;

            var fdata = new FormData();

            user_id = $('#userid').html();

            book_id = $(this).parent().prev().children().attr('name');
            book_num = $(this).val();

//            alert(book_id);
//            alert(book_num);
//
//
            if (book_num == '0') {
                $(this).attr('value', 1);
                book_num = 1;

//                add_one_book_to_order = 1;
//                $(this).parent().prev().children().prop("checked", false);
//                add_one_book_to_order = 0;
            } else {
                if (book_num > '5') {
                    $(this).attr('value', 5);
                    book_num = 5;
                }
//                add_one_book_to_order = 1;
            }

            $(this).parent().prev().children().prop("checked", true);

//            if ($(this).parent().prev().children().prop("checked")) {
//            } else {
//                add_one_book_to_order = 0;
//            }

            fdata.append("book_id", book_id);
            fdata.append("book_num", book_num);
            fdata.append("user_id", user_id);
            fdata.append("add_one_book_to_order", add_one_book_to_order);

            xhr.open('POST', operate_temp_table_url, true);
            xhr.send(fdata);

            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    checkboxes_changed();

//                    var $row = $('.row');
//                    var $div_list = $('#div_list');
//                    var $checkallbox = $div_list.find("input.checkall_box:checkbox");
//
//                    var total_boxes = $row.find(checkboxes_sel).length;
//                    var checked_boxes = $row.find(checkboxes_sel + ":checked").length;
//
//                    alert(total_boxes);
//
//                    alert(checked_boxes);
//
//                    if (total_boxes == checked_boxes) {
//                        $checkallbox.prop("checked", true);
//                    } else {
//                        $checkallbox.prop("checked", false);
//                    }

                    alert(this.responseText);
                }
            }

        });

//        if (isIE()) {
////            $(".get_book_num_and_update_db_class").on("propertychange",function () {
////            $(".get_book_num_and_update_db_class").attr("onpropertychange", "changeValue()");
//            $("body").on("propertychange input", ".get_book_num_and_update_db_class", function () { alert("i m change"); });
////            alert('1');
//        } else { // 其他浏览器
////            $(".get_book_num_and_update_db_class").on("change",changeValue());
////            $(".get_book_num_and_update_db_class").attr("onpropertychange", "changeValue()");
//            $("body").on("propertychange input", ".get_book_num_and_update_db_class", function () { alert("i m change"); });
//        }


    });

    $('#show').on('mouseleave', function () {

        $(".get_book_info_and_update_db_class").off("click");
//        $("body").off("propertychange input");

    });


    function guan_cang_import_history() {
//        var uid = '<?php echo $_SESSION['user_id'];?>
';

        var utp = $('#usertype').html();

        if (utp == null || utp == undefined || utp == '') {
            alert("您还没登录");
            return false;
        }

        if (utp != "library_user") {
            alert("您不是图书馆用户");
        }

        var uid = $('#userid').html();


        xhr.open('POST', guan_cang_import_history_url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("uid=" + uid);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('history_content').innerHTML = '';
                document.getElementById('history').style.display = 'block';
                document.getElementById('history_content').innerHTML = this.responseText;
            }
        }
    }


    function delpici() {
//        alert($(this).parent());
        var pici_id = $(this).parent().prev().children().eq(1).prop('id');
        var pici = $(this).parent().parent();
//        alert(pici_id);
        xhr.open('POST', delpici_url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("pici_id=" + pici_id);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.responseText == "success") {
                    alert('删除成功！');
                    pici.remove();
                } else {
                    alert('删除失败！');
                }
            }
        }
    }

    var flag = 0;

    function toggle_click() {

        if (flag <= 0) {
            $('.toggle').click(function () {
                val = $(this).attr('href');
                $(val).slideToggle(500);
            });

            $(".delpici").click(function () {
                var pici_id = $(this).parent().prev().children().eq(1).prop('id');
                var pici = $(this).parent().parent();
                xhr.open('POST', delpici_url, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("pici_id=" + pici_id);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        if (this.responseText == "success") {
                            alert('删除成功！');
                            pici.remove();
                        } else {
                            alert('删除失败！');
                        }
                    }
                }

            });

            flag = flag + 1;
        }
    }

    function return_to_guancangchachong() {
        $('.history').hide();
        $('.history').empty();

        $('.down').show();
    }


    function generate_order() {


        var utp = $('#usertype').html();

        if (utp == null || utp == undefined || utp == '') {
            alert("您还没登录");
            return false;
        }

        if (utp != "library_user") {
            alert("您不是图书馆用户");
        }

        user_id = $('#userid').html();

//        alert(1);
//        alert(user_id);

        var book_ids = [];
        var book_nums = [];
        var $row = $('.row');
        var checked_boxes = $row.find(checkboxes_sel + ":checked");

        $.each(checked_boxes, function (index, checkboxEle) {
            if ($(this).parent().attr('class') == 'list') {
                book_nums.push($(this).parent().next().children().val());
            } else {
                book_nums.push($(this).next().val());
            }
            if (checkboxEle.name) {
                book_ids.push(checkboxEle.name);
            }
        })
//
//        alert(book_ids);
//        alert(book_nums);
//return;

        xhr.open('POST', generate_order_url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("user_id=" + user_id + "&book_ids=" + book_ids + "&book_nums=" + book_nums);
//        xhr.send("user_id=" + user_id);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                alert(this.responseText);
            }
        }

    }

    function view_my_orders() {

        var utp = $('#usertype').html();

        if (utp == null || utp == undefined || utp == '') {
            alert("您还没登录");
            return false;
        }

        if (utp != "library_user") {
            alert("您不是图书馆用户");
        }

        var uid = $('#userid').html();

        window.location.href = "http://" + global_url + "/guanpeipindao/zhengdingdan/orders_view.php?usrn=" + uid;
    }

    function category_clear() {
        $("#zyfl_sel").attr("value", "");
        $("#ztfl_sk_sel").attr("value", "");
        $("#ztfl_zk_sel").attr("value", "");
    }

    function get_book_info_and_update_db() {

        $('.get_book_info_and_update_db_class').click(function () {
//            alert(1);
            if (this.checked)alert(this.value);//当前checkbox值
        })
//        if(this.checked)alert(this.value);//当前checkbox值

    }
    //    $(function(){
    //        $('.get_book_info_and_update_db_class').click(function(){
    //            alert(1);
    //            if(this.checked)alert(this.value);//当前checkbox值
    //        })
    //    })

    //    function isIE() { //ie?
    //        if (!!window.ActiveXObject || "ActiveXObject" in window)
    //            return true;
    //        else
    //            return false;
    //    }
    //

    //    var $flag_for_num_limit = 0;
    function num_limit() {
//        $flag_for_num_limit++;
//        if ($flag_for_num_limit <= 1) {
        var list = $('input[id^=amount1]');
        $.each(list, function (index, domEle) {
            domEle.onkeyup = function () {
                this.value = this.value.replace(/\D/g, '');
                if (domEle.value > 5) {
                    domEle.value = 5;
                }
                if (domEle.value < 1) {
                    domEle.value = 1;
                }
            }
        });
//        }
    }


    function manipulate_session() {

        var fdata = new FormData();
        var user_id = $('#userid').html();
        var list = $('.hide_before_purchase');
//        alert("默认数量");
        var content = $('#white_content');

        var content = "<span class='default_num_span'>默认数量</span> <input class=\"default_num_input\" type=\"text\" value=\"1\">";
        var flow = $('.flow');
        $('.flow').append(content);

        $('.default_num_input').on('change', function () {
            var default_num = $('.default_num_input').val();
            alert(default_num);
            var fdata_d_num = new FormData();
            fdata_d_num.append("default_num", default_num);

            xhr.open('POST', default_num_url, true);
            xhr.send(fdata_d_num);

            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    alert(this.responseText);
                }
            }
        });

//        document.getElementById('light').style.display = 'block';

        return;

        fdata.append("user_id", user_id);

        xhr.open('POST', manipulate_session_url, true);
        xhr.send(fdata);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
//                alert(this.responseText);
//                $('.hide_before_purchase').css("display","block");
//                $.each(list, function (index, domEle) {
//                    domEle.onkeyup = function () {
                list.css("display", "block");

//                });
                document.getElementById("manipulate_session_btn").disabled = true;
            }
        }

    }

    $(".batch_item").on('click', function () {
//        alert(1);

        var batch_id = $(this).html();
//        alert($(this).html());
        var a_new = "a_new";
        var list = "list";

        var fdata = new FormData();
        fdata.append("batch_id", batch_id);
        fdata.append("from_url", a_new);
        fdata.append("show_type", list);

        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {

                $('#list_pic').hide();

//                $('#list_pic_batch').hide();

                $('#list_pic_batch').show();
                $('#bottom').show();

                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }

    });

    $(".batch_icon").toggle(
            function () {
                $("#batch_table").hide();
//                $("#toggle_table").attr('src');
            },
            function () {
                $("#batch_table").show();
//                $("#toggle_table").attr('src');
            }
    );


    function firstpagesend_batch() {

        var fdata = new FormData();

        var page = $("#firstpage_batch").attr("page");
        fdata.append("page", page);

        var showtype = $("#firstpage_batch").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function prepagesend_batch() {

        var fdata = new FormData();

        var page = $("#prepage_batch").attr("page");
        fdata.append("page", page);

        var showtype = $("#prepage_batch").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function nextpagesend_batch() {

        var fdata = new FormData();

        var page = $("#nextpage_batch").attr("page");
        fdata.append("page", page);

        var showtype = $("#nextpage_batch").attr("showtype");
        fdata.append("show_type", showtype);

//        alert(page);
//        alert(showtype);

        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function lastpagesend_batch() {

        var fdata = new FormData();
        var page = $("#lastpage_batch").attr("page");
        fdata.append("page", page);

        var showtype = $("#lastpage_batch").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }

    function jumptopagesend_batch() {

        var fdata = new FormData();

        var page = $("#jumptopage_batch").val();
        fdata.append("page", page);
//        alert(page);
        var showtype = $("#jumptopage_batch").attr("showtype");
        fdata.append("show_type", showtype);


        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('show').innerHTML = '';
                document.getElementById('show').innerHTML = this.responseText;
            }
        }
    }


    function send_batch(arg) {

        if ($('#pic_disable_list_batch_enable').is(':visible')) {

            var fdata = new FormData();

            fdata.append("show_type", 'list');

            xhr.open('POST', batch_item_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {

                    $('#list_disable_pic_batch_enable').show();
                    $('#pic_disable_list_batch_enable').hide();

                    $('#list_pic').hide();
                    $('#list_pic_batch').show();

//                    $('#bottom').show();

                    document.getElementById('show').innerHTML = '';
                    document.getElementById('show').innerHTML = this.responseText;
//                $("#show").load("../../guanpeipindao/chachong/cc_list.php");
                }
            }
        }
    }


    function sendpic_batch() {

        if ($('#list_disable_pic_batch_enable').is(':visible')) {

            var fdata = new FormData();
            fdata.append("show_type", 'pic');

            xhr.open('POST', batch_item_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {

                    $('#list_pic').hide();

                    $('#list_disable_pic_batch_enable').hide();
                    $('#pic_disable_list_batch_enable').show();

                    document.getElementById('show').innerHTML = '';
                    document.getElementById('show').innerHTML = this.responseText;
                }
            }
        }
    }

    $(".delete_batch").on('click', function () {

//        var batch_id = $(this).parent().parent().children().eq(1).children().eq(1).html();
        var batch_id = $(this).parent().parent().children().eq(0).children().eq(0).html();
//        alert(1);
        alert(batch_id);

        var fdata = new FormData();
        fdata.append("batch_id", batch_id);

        xhr.open('POST', delete_batch_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                alert(this.responseText);
            }
        }

    });
<?php echo '</script'; ?>
>
</html><?php }
}
