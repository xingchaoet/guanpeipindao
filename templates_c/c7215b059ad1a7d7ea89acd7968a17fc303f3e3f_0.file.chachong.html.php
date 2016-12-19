<?php
/* Smarty version 3.1.29, created on 2016-12-19 11:38:25
  from "D:\phpStudy\WWW\guanpeipindao\templates\chachong\chachong.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58575631924376_43812639',
  'file_dependency' => 
  array (
    'c7215b059ad1a7d7ea89acd7968a17fc303f3e3f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\chachong\\chachong.html',
      1 => 1482118666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_58575631924376_43812639 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">

    <?php $header_css = '../dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $introduce_css = '../dist/css/introduce.css' ?>
    <link rel="stylesheet" href="<?php echo $introduce_css .'?v='. filemtime( $introduce_css ); ?>">

    <?php $progressbar_css = '../dist/css/progressbar.css' ?>
    <link rel="stylesheet" href="<?php echo $progressbar_css .'?v='. filemtime( $progressbar_css ); ?>">

    <?php $jquery_confirm_css = '../dist/css/jquery.confirm.css' ?>
    <link rel="stylesheet" href="<?php echo $jquery_confirm_css .'?v='. filemtime( $jquery_confirm_css ); ?>">

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

        .generate_order {
            padding-top: 12px;
            width: 770px;
            margin-left: 10px;
            margin-right: 10px;
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

        #show {
            /*width: auto;*/
            /*height: auto;*/
            /*text-align:center*/
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

        .batch_r_f_g_td {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 260px;
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

        .batch_table_generate {
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
            display: none;
            height: 25px;
            width: 20px;
        }

        .default_num_input {
            display: none;
            height: 25px;
            width: 20px;
        }

        .hide_before_purchase {
            display: none;
        }

        .hide_before_purchase_session {
            display: none;
        }

        .flow {
            margin-top: 5px;
            float: left;
            display: none;
        }

        #batch_option {
            margin-top: 5px;
            float: left;
        }

    </style>
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
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:left_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


            <div class="introduce">
                <?php echo $_smarty_tpl->tpl_vars['introduce']->value;?>

            </div>
        </div>

        <div class="col-sm-9">
            <!--<div class="history">-->

            <!--</div>-->

            <div class="down">
                <!--<form action="cc_index.php" method="post" enctype="multipart/form-data">-->
                <input type="hidden" name="usrn" value="<?php echo $_SESSION['user_id'];?>
"/>
                <input type="hidden" name="leadExcel" value="true">

                <div id="mid" class='mid'>

                    <div class="form-inline">
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
                                <input id='' type="radio" name="add_to_batch" value=""/>
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
                    <div class="clear"></div>
                    <!--<div id="bottom" class="bottom">-->
                        <!--<button type="button" class="btn btn-sm btn-default" onclick="generate_order();"-->
                                <!--value="生成征订单和预订单">-->
                            <!--生成征订单和预订单-->
                        <!--</button>-->
                        <!--<button type="button" class="btn btn-sm btn-default" onclick="view_my_orders();" value=""-->
                        <!--&gt;查看我的订单-->
                        <!--</button>-->
                    <!--</div>-->
                </div>
            </div>

        </div>
    </div>
    <a id="default_num" style="display: none "><?php if ($_SESSION['default_num']) {?> <?php echo $_SESSION['default_num'];?>
 <?php } else { ?> 2
        <?php }?></a>
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
 src="../dist/js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>

<?php $chachong_js = '../dist/js/chachong.js' ;
echo '<script'; ?>
 src='../dist/js/chachong.js?v=<?php echo filemtime( $chachong_js );?>'><?php echo '</script'; ?>
>

<?php $jquery_confirm_js = '../dist/js/jquery.confirm.js' ;
echo '<script'; ?>
 src='../dist/js/jquery.confirm.js?v=<?php echo filemtime( $jquery_confirm_js );?>'><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

    var waiting = "<div style='height: auto;width:inherit'><div style='margin :0px auto;margin-top: 20px;  width:320px'><a><img src=" + "'<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/chachong/waiting.gif'" + " ></a></div></div>";

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
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>

</html><?php }
}
