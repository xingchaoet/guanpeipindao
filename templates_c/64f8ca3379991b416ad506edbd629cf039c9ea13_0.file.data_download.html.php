<?php
/* Smarty version 3.1.29, created on 2016-11-23 15:15:56
  from "D:\phpStudy\WWW\guanpeipindao\templates\data_download\data_download.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5835422caf2517_01541747',
  'file_dependency' => 
  array (
    '64f8ca3379991b416ad506edbd629cf039c9ea13' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\data_download\\data_download.html',
      1 => 1476774379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_5835422caf2517_01541747 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据下载</title>

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">
    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/introduce.css">

    <!--<?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>
    <style>
        /*<!--header.html css-->*/
        #thenavbar {

        }

        #first_all {
            width: 200px;
        }

        .row {
            margin-bottom: 10px;
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 11px;
        }

        /*.col-sm-3 */

        .col-sm-9 {
            width: 770px;
        }

        /*.down */

        .linear {
            margin-top: 20px;
            width: 100%;
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 14px;
            font-weight: bold;
            /*height: 600px;*/

            background: -ms-linear-gradient(top, #b8c4cb, #f6f6f8); /* IE 10 */

            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/

            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/

            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /* Safari 4-5, Chrome 1-9*/

            background: -webkit-linear-gradient(top, #b8c4cb, #f6f6f8); /*Safari5.1 Chrome 10+*/

            background: -o-linear-gradient(top, #b8c4cb, #f6f6f8); /*Opera 11.10+*/

        }

        .guanpeipaihang_header {
            margin-left: 80px;
            margin-top: 10px;
        }

        .guanpeipaihang_content {
            position: relative;
            margin-left: 160px;
            margin-top: 10px;
        }

        .guanpeipaihang_content .gpph_column1 {
            position: absolute;
            width: 50px;
            left: -40px;

        }

        .guanpeipaihang_content .gpph_column2 {
            position: absolute;
            width: 50px;
            left: 40px;

        }

        .guanpeipaihang_content .gpph_column3 {
            position: absolute;
            width: 50px;
            left: 120px;

        }

        .guanpeipaihang_content .gpph_column4 {
            position: absolute;
            width: 50px;
            left: 200px;

        }

        .guanpeipaihang_content .gpph_label_column1 {
            position: static;
            left: -30px;
        }

        .guanpeipaihang_content .gpph_label_column2 {
            position: relative;
            left: 30px;
        }

        .guanpeipaihang_content .gpph_label_column3 {
            position: relative;
            left: 62px;
        }

        .guanpeipaihang_content .gpph_label_column4 {
            position: relative;
            left: 100px;
        }

        #math {
            position: relative;
            left: 53px;
        }

        #resource_environment {
            position: relative;
            left: 105px;
        }

        #agriculture_tech {
            position: relative;
            left: 143px;
        }

        .guanpeipaihang_bottom {
            margin-top: 20px;
            margin-left: 110px;

        }

        #guanpeipaihang {
            height: auto;
        }

        #data_diy {
            height: auto;
        }

        #result_download {
            height: auto;
        }

        #special_data {
            height: auto;
        }

        .data_diy_table {
            /*line-height: 15px;*/
        }

        .data_diy_table > tr > td {
            /*padding: 80px;*/
            /*padding-bottom: 15px;*/
        }

        .data_diy_down {
            margin-top: 10px;
            /*position: relative;*/
        }

        .data_diy_bottom {
            margin-top: 20px;
            margin-left: 269px;
        }

        .result_download_down {
            margin-top: 10px;
        }

        .result_download_header {
            margin-left: 280px;
            /*display: none;*/
            height: 15px;
        }

        .result_download_content {
            margin-top: 20px;
            margin-left: 140px;
        }

        .two_formats {
            float: left;
        }

        .three_formats {
            position: relative;
            left: 30px;
            top: 26px;
        }

        .clear {
            clear: both
        }

        .result_download_download {
            position: relative;
            margin-left: 350px;
            bottom: 10px;
        }

        .special_data_content {
            margin-top: 25px;
            margin-left: 15px;
        }

        .special_data_content_table {
            width: 90%;
        }

        .ztsj_title {
            width: 30%;
        }

        .download_zhuantishuju {
            font-style: italic;
            color: #F16D06;
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
                <div id="guanpeipaihang">
                    <div class="linear">馆配排行</div>
                    <div>
                        <div class="guanpeipaihang_header">
                            <p><input type="radio" value="整体排行榜" name="gpph_radio_level1" style="vertical-align:middle"><label>整体排行榜</label>
                            </p>
                            <p><input type="radio" value="学科排行榜" name="gpph_radio_level1" style="vertical-align:middle"><label>学科排行榜</label>
                            </p>
                        </div>
                        <div class="guanpeipaihang_content">
                            <div>
                                <input class="gpph_column1" type="radio" value="社科人文" name="gpph_radio_level2"><label
                                    class="gpph_label_column1">社科人文</label>
                                <input class="gpph_column2" type="radio" value="社科经营" name="gpph_radio_level2"><label
                                    class="gpph_label_column2">社科经营</label>
                                <input class="gpph_column3" type="radio" value="人文考古" name="gpph_radio_level2"><label
                                    class="gpph_label_column3">人文考古</label>
                                <input class="gpph_column4" type="radio" value="化学"
                                       name="gpph_radio_level2"><label class="gpph_label_column4">化学</label>
                            </div>
                            <div>
                                <input class="gpph_column1" type="radio" value="物理"
                                       name="gpph_radio_level2"><label class="gpph_label_column1">物理</label>
                                <input class="gpph_column2" type="radio" value="数学"
                                       name="gpph_radio_level2"><label id="math" class="gpph_label_column2">数学</label>
                                <input class="gpph_column3" type="radio" value="资源环境" name="gpph_radio_level2"><label
                                    class="gpph_label_column3" id="resource_environment">资源环境</label>
                                <input class="gpph_column4" type="radio" value="农业科学" name="gpph_radio_level2"><label
                                    class="gpph_label_column4" id="agriculture_tech">农业科学</label>
                            </div>
                            <div>
                                <input class="gpph_column1" type="radio" value="医药卫生" name="gpph_radio_level2"><label
                                    class="gpph_label_column1">医药卫生</label>
                                <input class="gpph_column2" type="radio" value="生命科学" name="gpph_radio_level2"><label
                                    class="gpph_label_column2">生命科学</label>
                                <input class="gpph_column3" type="radio" value="科普通俗读物" name="gpph_radio_level2"><label
                                    class="gpph_label_column3">科普通俗读物</label>
                            </div>
                            <div>

                                <input class="gpph_column1" type="radio" value="外语读物" name="gpph_radio_level2">
                                <label class="gpph_label_column1">外语读物</label>
                                <input class="gpph_column2" type="radio" value="工业技术" name="gpph_radio_level2"><label
                                    class="gpph_label_column2">工业技术</label>
                                <input class="gpph_column3" type="radio" value="综合"
                                       name="gpph_radio_level2"><label class="gpph_label_column3">综合</label>
                            </div>
                            <div class="guanpeipaihang_bottom">
                                <div class="form-group btn  btn-xs">
                                    <input class="btn btn-xs btn-default" type="button" value="下载"
                                           onclick="guanpeipaihang_download();">
                                </div>
                                <div class="form-group btn  btn-xs">
                                    <input onclick="guanpeipaihang_check();" class="btn btn-default btn-xs "
                                           type="button"
                                           value="查看">
                                    </input>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div id="data_diy">
                    <div class="linear">数据定制</div>
                    <div class="data_diy_down">
                        <form id="condition">
                            <table id="data_diy_table" class="data_diy_table">

                                <tr>
                                    <td class="left_td"
                                        style="margin-top: 1px;margin-bottom: 1px;padding-top: 1px;padding-bottom: 1px;"
                                        width='200' align='right'>上架时间
                                    </td>
                                    <td style="margin-top: 1px;margin-bottom: 1px;padding-top: 1px;padding-bottom: 1px;"
                                        width='350'>
                                        <input class="Wdate" type="text" name="sjdate_low" id="sjdate_low" value=''
                                               onClick="WdatePicker()">至
                                        <input class="Wdate" type="text" name="sjdate_high" id="sjdate_high" value=''
                                               onClick="WdatePicker()">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="margin-top: 1px;margin-bottom: 1px;padding-top: 1px;padding-bottom: 1px;"
                                        align='right'>出版时间
                                    </td>
                                    <td style="margin-top: 1px;margin-bottom: 1px;padding-top: 1px;padding-bottom: 1px;">
                                        <input class="Wdate" type="text" name="cbdate_low" id="cbdate_low" value=""
                                               onClick="WdatePicker()">至
                                        <input class="Wdate" type="text" name="cbdate_high" id="cbdate_high" value=""
                                               onClick="WdatePicker()">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="margin-top: 5px;margin-bottom: 1px;padding-top: 5px;padding-bottom: 1px;"
                                        align='right' name="zyfl_value" id="zyfl_value">图书分类
                                    </td>
                                    <td
                                            style='margin-top: 1px;margin-bottom: 5px;padding-top: 1px;padding-bottom: 1px;;position: absolute;  z-index:2;'>
                                        <?php  include('zyfl.php');?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="margin-top: 8px;margin-bottom: 1px;padding-top: 8px;padding-bottom: 1px;"
                                        align='right' name="skfl_value">中图法-社会科学
                                    </td>
                                    <td style='position: absolute; z-index:1;margin-top: 3px;margin-bottom: 1px;padding-top: 3px;padding-bottom: 1px;'>
                                        <?php  include('ztfl_sk.php');?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="margin-top: 10px;margin-bottom: 10px;padding-top: 10px;padding-bottom: 10px;"
                                        align='right' name="zkfl_value" id="zkfl_value">中图法-自然科学
                                    </td>
                                    <td style='position: absolute; z-index:0;margin-top:  3px;margin-bottom: 2px;padding-top: 3px;padding-bottom: 2px;'>
                                        <?php  include('ztfl_zk.php');?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="margin-top: 1px;margin-bottom: 1px;padding-top: 1px;padding-bottom: 1px;"
                                        align='right'>产品介质
                                    </td>
                                    <td style="margin-top: 0px;margin-bottom: 0px;padding-top: 0px;padding-bottom: 0px;">
                                        <select name="media" id="media">
                                            <option value="全部">全部</option>
                                            <option value="纸质书">纸质书</option>
                                            <option value="按需印刷">按需印刷</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <div class="data_diy_bottom">
                                <div class="form-group btn  btn-xs">
                                    <input onclick="data_diy_search();" class="btn btn-default btn-xs "
                                           type="button"
                                           value="搜索">
                                    </input>
                                    <input onclick="data_diy_clear();" class="btn btn-default btn-xs "
                                           type="reset"
                                           value="清空">
                                    </input>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <div id="result_download">
                    <div class="linear">搜索结果下载</div>
                    <div class="result_download_down">
                        <div id="search_result_num" class="result_download_header"></div>

                        <div class="result_download_content">
                            <div class="two_formats">
                                <h3><input name="marc" type="radio" value="excel"/>Excel格式下载 </h3>
                                <h3><input name="marc" type="radio" value="marc"/>Marc格式下载 </h3>
                            </div>
                            <div class="three_formats">
                                <input id="MARC" type="checkbox" name="MARC" value="T"/><span>国图</span>
                                <input id="Calis" type="checkbox" name="Calis" value="T"/><span>Calis</span>
                                <input id="CF" type="checkbox" name="CF" value="T"/><span>采访</span>
                            </div>
                            <div class="result_download_download">
                                <input id="diy_result_download" class="btn btn-xs btn-default" type="button" value="下载">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="clear"></div>
                <div id="special_data">
                    <div class="linear">专题数据 <span style="margin-left: 650px">MORE</span></div>

                    <div class="special_data_content">
                        <table class="table special_data_content_table">

                            <?php
$_from = $_smarty_tpl->tpl_vars['zhtshj']->value;
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
                            <tr class="">
                                <td class="ztsj_title"><?php echo $_smarty_tpl->tpl_vars['val']->value['Title'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['uptime'];?>
</td>

                                <?php if ($_smarty_tpl->tpl_vars['val']->value['MarcGt']) {?>
                                <td><input type="checkbox" id="MARC_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"
                                           name="MARC_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"/><span>国图</span></td>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['val']->value['MarcCalis']) {?>
                                <td><input type="checkbox" id="CALIS_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"
                                           name="CALIS_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"/><span>Calis</span></td>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['val']->value['MarcCf']) {?>
                                <td><input type="checkbox" id="CF_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"
                                           name="CF_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"/><span>采访</span></td>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['val']->value['MarcExcel']) {?>
                                <td><input type="checkbox" id="EXCEL_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"
                                           name="EXCEL_zhtshj_<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"/><span>EXCEL</span></td>
                                <?php }?>
                                <td><span id="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="download_zhuantishuju">[下载]</span></td>
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

    var global_url = $('#global_url').html();

    var data_diy_url = 'http://' + global_url + '/guanpeipindao/data_download/shjdzh_search.php';

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

    function data_diy_search() {
        var fm = document.getElementById('condition');
        var fdata = new FormData(fm);

        xhr.open('POST', data_diy_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
//                document.getElementById('search_result_num').display = 'block';
                document.getElementById('search_result_num').innerHTML = '';
                document.getElementById('search_result_num').innerHTML = this.responseText;
            }
        }
    }

    //    数据定制搜索结果下载
    $("#diy_result_download").click(function () {

//        alert(1);
//
//        return;

        if ((!$("input[type=radio][name=marc][value='excel']").attr("checked")) && (!$("input[type=radio][name=marc][value='marc']").attr("checked"))) {

            alert('未选择文件类型！');
            return;
        }

        if (($("input[type=radio][name=marc][value='marc']").attr("checked")) && (!($("#MARC").attr("checked") || $("#Calis").attr("checked") || $("#CF").attr("checked")))) {

            alert('未选择文件类型！');
            return;
        }
//        var sheet_no = $(this).prop('id');
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
//            alert(marc);
//            alert(calis);
//            alert(cf);

            document.location.href =
                    "http://" + global_url + "/guanpeipindao/data_download/diy_result_download.php?" + 'MARC=' + marc + '&CALIS=' + calis + '&CF=' + cf;
        }

        if (($("input[type=radio][name=marc][value='excel']").attr("checked"))) {
//            alert(1);
            document.location.href =
                    "http://" + global_url + "/guanpeipindao/data_download/diy_result_download.php?" + 'EXCEL=1';
        }
    });

    //    function result_download_download() {
    //
    //
    //
    //    }

    if (!($("input[type=radio][name=marc][value='marc']").attr("checked"))) {
        $('#Calis').attr("disabled", true);
        $('#CF').attr("disabled", true);
        $('#MARC').attr("disabled", true);
    }

    $("input[type=radio][name=marc][value='excel']").change(function () {
//            alert(1);
        $("#Calis").attr("checked", false);
        $("#CF").attr("checked", false);
        $("#MARC").attr("checked", false);

        $('#Calis').attr("disabled", true);
        $('#CF').attr("disabled", true);
        $('#MARC').attr("disabled", true);
    })

    $("input[type=radio][name=marc][value='marc']").change(function () {
//            alert(1);
        $('#Calis').attr("disabled", false);
        $('#CF').attr("disabled", false);
        $('#MARC').attr("disabled", false);
    })

    //    function download_zhuantishuju() {


    //    专题数据下载
    $(".download_zhuantishuju").click(function () {


        var zhtshj_no = $(this).prop('id');
//        alert(zhtshj_no);

        var marc_download = 'MARC_zhtshj_' + zhtshj_no;
        var calis_download = 'CALIS_zhtshj_' + zhtshj_no;
        var cf_download = 'CF_zhtshj_' + zhtshj_no;
        var excel_download = 'EXCEL_zhtshj_' + zhtshj_no;

        var MARC = 0;
        var CALIS = 0;
        var CF = 0;
        var EXCEL = 0;

//        alert(marc_download);
//        alert(calis_download);
//        alert(cf_download);
//        alert(excel_download);

        if ((!$("#" + marc_download).attr("checked"))
                && (!$("#" + calis_download).attr("checked"))
                && (!$("#" + cf_download).attr("checked"))
                && (!$("#" + excel_download).attr("checked"))
        ) {
            alert('未选择文件类型！');
            return;
        }

        if ($("#" + marc_download).attr("checked")) {
//            alert(1);
            MARC = 1;
//            document.location.href =
//                    "http://" + global_url + "/guanpeipindao/data_download/zhtshj_download_pcl.php?zhtshj_no=" + zhtshj_no + '&MARC=1';
        }

        if ($("#" + calis_download).attr("checked")) {
//            alert(2);
            CALIS = 1;
//            document.location.href =
//                    "http://" + global_url + "/guanpeipindao/data_download/zhtshj_download_pcl.php?zhtshj_no=" + zhtshj_no + '&CALIS=1';
        }

        if ($("#" + cf_download).attr("checked")) {
//            alert(3);
            CF = 1;
//            document.location.href =
//                    "http://" + global_url + "/guanpeipindao/data_download/zhtshj_download_pcl.php?zhtshj_no=" + zhtshj_no + '&CF=1';
        }

        if ($("#" + excel_download).attr("checked")) {
//            alert(4);
            EXCEL = 1;
//            document.location.href =
//                    "http://" + global_url + "/guanpeipindao/data_download/zhtshj_download_pcl.php?zhtshj_no=" + zhtshj_no + '&EXCEL=1';
        }

        document.location.href =
                "http://" + global_url + "/guanpeipindao/data_download/zhtshj_download.php?zhtshj_no=" + zhtshj_no
                + '&MARC=' + MARC
                + '&CALIS=' + CALIS
                + '&CF=' + CF
                + '&EXCEL=' + EXCEL
        ;

    });
    //    }

    function data_diy_clear() {
        $("#zyfl_sel").attr("value", "");
        $("#ztfl_sk_sel").attr("value", "");
        $("#ztfl_zk_sel").attr("value", "");
    }
<?php echo '</script'; ?>
>
</html><?php }
}
