<?php
/* Smarty version 3.1.29, created on 2017-01-10 18:26:22
  from "D:\phpStudy\WWW\guanpeipindao\templates\hall_communication\hall_communication.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5874b6ce7026d4_45571655',
  'file_dependency' => 
  array (
    'e2812993bcfacf111d19391720c085e96afd15f9' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\hall_communication\\hall_communication.html',
      1 => 1481880563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_5874b6ce7026d4_45571655 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\phpStudy\\WWW\\guanpeipindao\\libs\\plugins\\modifier.truncate.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>社馆互动</title>

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">


    <?php $header_css = '../dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $introduce_css = '../dist/css/introduce.css' ?>
    <link rel="stylesheet" href="<?php echo $introduce_css .'?v='. filemtime( $introduce_css ); ?>">

    <?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>


    <style>
        .down {
            padding-top: 25px;
            width: 770px;
        }

        /*头部变动较小*/
        .site .hr {
            height: 0px;
            border: none;
            border-top: 1px ridge darkgray;
            margin-bottom: 5px;

        }

        .site hr {
            margin-top: 0px;
            margin-bottom: 0px;
            border: 0;
            /*border-top: 1px solid #eee;*/
        }

        .site hr {
            height: 0;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }

        .site hr {
            display: block;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
            -webkit-margin-start: auto;
            -webkit-margin-end: auto;
            border-style: inset;
            border-width: 0px;
        }

        /*#guanpeidongtai:before,#communication_record:before,#communication_method:before */

        .gpdt_table {
            width: 750px;
            line-height: 18px;
            margin-left: 10px;
        }

        .guanpeidongtai_content {
            margin-top: 20px;
        }

        .gpdt_tr {
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 12px;
        }

        .gpdt_l_td {
            width: 80%;
        }

        .gpdt_m_td {
            color: #F16D06;
        }

        .gpdt_r_td {
            width: 20%;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 4px 4px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 0px solid #ddd;
        }

        #communication_record {
            margin-top: 30px;
        }

        .communication_record_content {
            margin-top: 20px;
            margin-left: 25px;
            height: auto;
        }

        .message {
            position: relative;
            left: -25px;
            width: 700px;
            height: auto;
            border: 1px solid grey;
        }

        .question {
            color: #665ce6;
        }

        .answer {
            color: #6b9619;
        }

        .message_time {
            opacity: 0.5;
        }

        .communication_method {
            margin-top: 20px;
        }

        textarea {
            margin-left: 10px;
        }

        .message_title {
            margin-left: 10px;
            margin-top: 15px;
        }

        .message_btn_wrap {
            margin-left: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .message_btn {
            height: 35px;
            width: 150px;
            background: blue;
            color: white;
            border-radius: 10px;
        }

        .ywlxfsh {
            margin-left: 10px;
            margin-top: 20px;
        }

        .square {
            width: 11px;
            height: 11px;
            background-color: grey;
            float: left;
            margin-top: 3px;
            margin-right: 4px;
        }

        .people_thumbnail {
            float: left;
        }

        .answer_question {
            margin-left: 50px;
        }

        .generate_order {
            padding-top: 12px;
            width: 770px;
            margin-left: 10px;
            margin-right: 10px;
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 12px;
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

            <div class="generate_order"></div>

            <div class="down">
                <div class="square"></div>
                <div id="guanpeidongtai">
                    <div><label> 馆配动态</label> <span style="margin-left: 650px"><a
                            href="guanpeidongtai_more.php"> MORE </a></span></div>
                    <hr class="hr"/>
                    <div class="guanpeidongtai_content">
                        <table class="gpdt_table">
                            <?php
$_from = $_smarty_tpl->tpl_vars['gpdt']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                            <tr class=" gpdt_tr">
                                <td class="gpdt_m_td">[<?php echo $_smarty_tpl->tpl_vars['value']->value['NewsType'];?>
]</td>
                                <td class="gpdt_l_td"><a href="guanpeidongtai_article_content.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['Id'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['Title'];?>
 </a></td>
                                <td><span class="gpdt_r_td"><?php echo $_smarty_tpl->tpl_vars['value']->value['UpTime'];?>
</span></td>
                                <!--<td><span class="gpdt_r_td"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value['UpTime'],11,'',true);?>
</span></td>-->
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
?>

                        </table>
                    </div>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['user_type']->value == "library_user") {?>
                <div id="communication_record">
                    <div class="square"></div>
                    <div><label>沟通记录</label> <span style="margin-left: 650px"><a
                            href="goutongjilu_more.php"> MORE </a></span></div>
                    <hr class="hr"/>
                    <div class="communication_record_content">
                        <?php
$_from = $_smarty_tpl->tpl_vars['gtjl']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_1_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_1_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                        <div class="list-group">
                            <a class="list-group-item ">
                                <img class="people_thumbnail" src="../dist/picture/question.png">
                                <div class="answer_question">
                                    <h4 class="list-group-item-heading ">
                                        <span class="question"><?php echo $_smarty_tpl->tpl_vars['value']->value['UserName'];?>
:<?php echo $_smarty_tpl->tpl_vars['value']->value['MessageContents'];?>
</span>
                                        <!--留言一-->
                                    </h4>
                                    <p class="list-group-item-text message_time">
                                        <!--2016-8-30-->
                                        <?php echo $_smarty_tpl->tpl_vars['value']->value['MessageTime'];?>

                                    </p>
                                </div>
                            </a>
                            <?php
$_from = $_smarty_tpl->tpl_vars['value']->value['reply'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_2_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_2_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
                            <a class="list-group-item">

                                <img class="people_thumbnail" src="../dist/picture/answer.png">
                                <div class="answer_question">
                                    <p class="list-group-item-text answer">
                                        <!--留言回复一-->
                                        留言回复 : <?php echo $_smarty_tpl->tpl_vars['val']->value['ReplyContents'];?>

                                    </p>
                                    <p class="list-group-item-text message_time">
                                        <!--2016-8-30-->
                                        <?php echo $_smarty_tpl->tpl_vars['val']->value['ReplyUserName'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['ReplyTime'];?>

                                    </p>
                                </div>
                            </a>
                            <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_local_item;
}
if ($__foreach_val_2_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_item;
}
?>
                        </div>
                        <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_local_item;
}
if ($__foreach_value_1_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_item;
}
?>
                        <div class="message">
                            <label class="message_title">留言</label>
                            <div>
                                <textarea id="message_content" rows="3" cols="90">限制5000字。</textarea>
                            </div>
                            <div class="message_btn_wrap">
                                <input class="message_btn" type="button" value="提交"
                                       onclick="send_message();">
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

                <div class="communication_method">
                    <div class="square"></div>
                    <div><label>业务联系方式</label></div>
                    <hr class="hr"/>
                    <div class="ywlxfsh">
                        <?php echo $_smarty_tpl->tpl_vars['ywlxfsh']->value[0]['Contents'];?>

                    </div>
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
<!--<?php echo '<script'; ?>
 src="../dist/js/holder.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="../dist/js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>

<?php $order_list_for_generate_js = '../dist/js/order_list_for_generate.js' ;
echo '<script'; ?>
 src='../dist/js/order_list_for_generate.js?v=<?php echo filemtime( $order_list_for_generate_js );?>'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var global_url = $('#global_url').html();

    var message_url = 'http://' + global_url + '/hall_communication/send_message.php';

    var order_list_for_generate_url = 'http://' + global_url + '/chachong/order_list_for_generate.php';

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


    function send_message() {
        var message = $('#message_content').val();
//        alert(message);
        var fdata = new FormData();

        fdata.append("message", message);
//        alert(message_url);

        xhr.open('POST', message_url, true);

        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                alert(this.responseText);
            }
        }
    }

    function generate_order() {
        $('.down').hide();

        var fdata_generate_order = new FormData();

        xhr.open('POST', order_list_for_generate_url, true);
        xhr.send(fdata_generate_order);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
//                alert(this.responseText);
                $('.generate_order').html(this.responseText);
            }
        }

    }
<?php echo '</script'; ?>
>
</html><?php }
}
