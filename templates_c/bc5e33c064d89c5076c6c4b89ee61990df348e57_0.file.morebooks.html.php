<?php
/* Smarty version 3.1.29, created on 2016-11-29 10:30:28
  from "D:\phpStudy\WWW\guanpeipindao\templates\morebooks.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583ce844296941_57819381',
  'file_dependency' => 
  array (
    'bc5e33c064d89c5076c6c4b89ee61990df348e57' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\morebooks.html',
      1 => 1480383858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_583ce844296941_57819381 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\phpStudy\\WWW\\guanpeipindao\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>更多</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/left_nav.css">
    <link rel="stylesheet" href="dist/css/header.css">
    <link rel="stylesheet" href="dist/css/introduce.css">

    <style>
        body {
            padding-top: 10px;
            margin-left: 30px;
            margin-right: 30px;

        }

        .col-sm-4 {
            background: #FFF;
            /*background: white;*/
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
            font-size: xx-small;
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
            margin-top: 60px;
            margin-left: 620px;
            margin-bottom: 20px;
            position: absolute;
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
        .batch_r_f_td{
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

            <div class="show_title">
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

            <div id="down" class="down" onmouseover="active_topagesend();">
                <div id="div_list" name="div_list">
                    <div>
                        <input type="checkbox" checked="checked" id="checkall_box" onclick='checkallbox_changed();'
                               name="all" class="checkall_box">
                        <label>全选</label>
                    </div>
                    <div class="row">
                        <?php
$_from = $_smarty_tpl->tpl_vars['books']->value;
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
                        <div class="col-sm-4">
                            <table id="table">
                                <tr>
                                    <td class="left_td">
                                        <!--<a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img-->
                                        <!--src="http://www.ecsponline.com/<?php echo trim($_smarty_tpl->tpl_vars['val']->value['slt']);?>
"-->
                                        <!--class="fen_mian" alt=""></a>-->

                                        <?php if (trim($_smarty_tpl->tpl_vars['val']->value['slt'])) {?>
                                        <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img
                                                src="http://www.ecsponline.com/<?php echo trim($_smarty_tpl->tpl_vars['val']->value['slt']);?>
"
                                                class="fen_mian" alt=""></a>
                                        <?php } else { ?>
                                        <a href="detail.php?book_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"><img
                                                src="dist/images/nopicture.png"
                                                class="fen_mian" alt=""></a>
                                        <?php }?>


                                    </td>
                                    <td class="right_td">
                                        <input type="checkbox" checked="checked" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                               class="checkall"/>
                                        <p>数量：
                                            <input type="text" id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
" class="sum" value="2"/>
                                        </p>
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
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
                    </div>

                    <div class="add_and_check">


                        <a id="buy" class="btn btn-default btn-xs" onclick="generate_order();">加入订单</a>
                        <?php if ($_SESSION['user_type'] == 'library_user') {?>
                        <a href='zhengdingdan/orders_view.php' class="btn  btn-default btn-xs">查看订单</a>
                        <?php }?>
                    </div>

                    <?php echo $_smarty_tpl->tpl_vars['page']->value->show();?>


                </div>

            </div>


        </div>
    </div>


</div>

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

            <td  class="batch_mtd">
                批次产生时间
            </td>

            <td  class="batch_r_f_td">
                添加到此批次
            </td>

            <td  class="batch_rtd">
                删除
            </td>

        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['need_op_batch_detail']->value;
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
        <tr>
            <td class="batch_ltd">
                <a class="batch_item"><?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
</a>
            </td>

            <td class="batch_mtd">
                <?php echo $_smarty_tpl->tpl_vars['val']->value['Date_Time'];?>

            </td>

            <td class="batch_r_f_td">
                <input id='' type="radio" name="add_to_batch" value="" />
            </td>

            <td class="batch_rtd">
                <a class="delete_batch"><img width="19" height="19"
                                             src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/chachong/delete_batch.png"></a>
            </td>

        </tr>
        <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
?>
    </table>

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
>

    var global_url = $('#global_url').html();

    var more_url = 'http://' + global_url + '/more.php';

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

    function firstpagesend() {
        //首页显示不判断用户id

        var fdata = new FormData();

        var page = $("#firstpage").attr("page");
        fdata.append("page", page);

        var type = $("#firstpage").attr("type");
        fdata.append("type", type);

        var show = $("#firstpage").attr("show");
        fdata.append("show", show);

        xhr.open('POST', more_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
            }
        }
    }


    function prepagesend() {

        var fdata = new FormData();

        var page = $("#prepage").attr("page");
        fdata.append("page", page);

        var type = $("#prepage").attr("type");
        fdata.append("type", type);

        var show = $("#prepage").attr("show");
        fdata.append("show", show);

        xhr.open('POST', more_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
            }
        }
    }


    function nextpagesend() {

        var fdata = new FormData();

        var page = $("#nextpage").attr("page");
        fdata.append("page", page);

        var type = $("#nextpage").attr("type");
        fdata.append("type", type);

        var show = $("#nextpage").attr("show");
        fdata.append("show", show);

//        alert(page);
//        alert(type);
//        alert(show);

        xhr.open('POST', more_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
            }
        }
    }


    function lastpagesend() {

//        var fm = document.getElementById('condition');
        var fdata = new FormData();

        var page = $("#lastpage").attr("page");
        fdata.append("page", page);

        var type = $("#lastpage").attr("type");
        fdata.append("type", type);

        var show = $("#lastpage").attr("show");
        fdata.append("show", show);

        xhr.open('POST', more_url, true);

        xhr.send(fdata);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
            }
        }
    }

    //    var flag = 0;

    function active_topagesend() {
//        alert(flag);
//        if(flag <= 1){

        $(".topagesend").click(function () {

                    var fdata = new FormData();

                    var page = $(this).attr("page");
                    fdata.append("page", page);

                    var type = $(this).attr("type");
                    fdata.append("type", type);

                    var show = $(this).attr("show");
                    fdata.append("show", show);

//                        alert(page);
//                        alert(type);
//                        alert(show);

                    xhr.open('POST', more_url, true);

                    xhr.send(fdata);
                    xhr.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            document.getElementById('down').innerHTML = '';
                            document.getElementById('down').innerHTML = this.responseText;
                        }
                    }
                }
        );
//            flag = flag + 1;
//        }

    }


    function jumptopagesend() {

        var fdata = new FormData();

        var page = $("#jumptopage").val();
        fdata.append("page", page);

        var type = $("#jumptopage").attr("type");
        fdata.append("type", type);

        var show = $("#jumptopage").attr("show");
        fdata.append("show", show);

        xhr.open('POST', more_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
            }
        }
    }

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
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
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
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        $("#picture").attr('src', path);
                        $("#list").attr('src', path2);
                        document.getElementById('down').innerHTML = '';
                        document.getElementById('down').innerHTML = this.responseText;
                    }
                }
            }
    );


    var checkboxes_sel = "input.checkall:checkbox:enabled";

    var checkboxes_changed = function () {
        var $row = $('.row');
        var $div_list = $('#div_list');
        var $checkallbox = $div_list.find("input.checkall_box:checkbox");

        var total_boxes = $row.find(checkboxes_sel).length;
        var checked_boxes = $row.find(checkboxes_sel + ":checked").length;
        if (total_boxes == checked_boxes) {
            $checkallbox.prop("checked", true);
        } else {
            $checkallbox.prop("checked", false);
        }
    };

    $(document).on("change", checkboxes_sel, checkboxes_changed);

    var checkallbox_changed = function () {
        var $div_list = $('#div_list');
        var $checkallbox = $div_list.find("input.checkall_box:checkbox");
        var checkalllist = $('.checkall');
        if ($checkallbox.prop("checked")) {
            $.each(checkalllist, function (index, domEle) {
                domEle.checked = true;
            });
        } else {
            $.each(checkalllist, function (index, domEle) {
                domEle.checked = false;
            });
        }
    };

    function generate_order() {
        return;
        user_id = $('#userid').html();
        var utp = $('#usertype').html();
        if (utp == null || utp == undefined || utp == '') {
            alert("您还没登录");
            return false;
        }
        if (utp != "library_user") {
            alert("您不是图书馆用户");
        }
        var book_ids = [];
        var book_nums = [];
        var $row = $('.row');
        var checked_boxes = $row.find(checkboxes_sel + ":checked");

//        alert(checked_boxes.length);

        $.each(checked_boxes, function (index, checkboxEle) {
            if ($(this).parent().attr('class') == 'list') {
                book_nums.push($(this).parent().next().children().val());
            } else {
                book_nums.push($(this).next().children().val());
            }
//            if (checkboxEle.name) {
            book_ids.push(checkboxEle.name);
//            }
        })

//        alert(book_ids);
//        alert(book_nums);

//        return;

        xhr.open('POST', generate_order_url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("user_id=" + user_id + "&book_ids=" + book_ids + "&book_nums=" + book_nums);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                alert(this.responseText);
            }
        }

    }

    $('.down').on('mouseenter', function () {

        var list = $('input[id^=sum_]');
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
//
    });


<?php echo '</script'; ?>
>
</html><?php }
}
