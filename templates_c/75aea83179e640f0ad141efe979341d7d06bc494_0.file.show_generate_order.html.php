<?php
/* Smarty version 3.1.29, created on 2016-12-23 14:48:41
  from "D:\phpStudy\WWW\guanpeipindao\templates\chachong\show_generate_order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_585cc8c93c0d22_23538310',
  'file_dependency' => 
  array (
    '75aea83179e640f0ad141efe979341d7d06bc494' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\chachong\\show_generate_order.html',
      1 => 1482475515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_585cc8c93c0d22_23538310 ($_smarty_tpl) {
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
    <?php $jquery_confirm_css = '../dist/css/jquery.confirm.css' ?>
    <link rel="stylesheet" href="<?php echo $jquery_confirm_css .'?v='. filemtime( $jquery_confirm_css ); ?>">
    <?php $batch_merge_split_css = '../dist/css/batch_merge_split.css' ?>
    <link rel="stylesheet" href="<?php echo $batch_merge_split_css .'?v='. filemtime( $batch_merge_split_css ); ?>">
    <?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>

    <title>生成订单</title>
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

        .btn-sm {
            /*size: 22px;*/
            padding: 3px 3px;
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

        .batch_l_ltd {
            margin-top: 5px;
            margin-bottom: 5px;
            width: 33px;
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
            <div class="history">

            </div>

            <div class="generate_order">

                <div id="div_list" name="div_list" class="need_op_batch">

                    <div class="batch_title">
                        <span>
                            你还有<span id="need_op_batch_num_span"><?php echo $_smarty_tpl->tpl_vars['need_op_batch_num']->value;?>
</span>条未处理批次
                        </span>
                    </div>

                    <!--<div class="row" name="row">-->
                    <table id="batch_table_generate" class="table table-bordered batch_table_generate">
                        <tr>

                            <td align="center" class="batch_l_ltd">
                                <input type="checkbox" name="all" class="checkall_box" class=""
                                       onclick='checkallbox_changed();'/>
                            </td>
                            <td align="center" class="batch_ltd">
                                批次号
                            </td>

                            <td class="batch_mtd">
                                批次产生时间
                            </td>

                            <td class="batch_r_f_g_td">
                                生成订单
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
                            <td align="center" class="batch_l_ltd">
                                <input type='checkbox' name="<?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
" class="checkall" onclick="checkboxes_changed();"/>
                            </td>

                            <td class="batch_ltd">
                                <a class="batch_item"><?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
</a>
                            </td>

                            <td class="batch_mtd">
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['Date_Time'];?>

                            </td>

                            <td class="batch_r_f_g_td">
                                <input id="<?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
" type="button"
                                       class="btn btn-default btn-sm generate_order_btn" name="generate_order"
                                       value="生成订单"/>
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
                    <!--</div>-->

                </div>
            </div>

            <div id="batch_merge_split">
                <div class="tab-head">
                    <h3 class="selected">订单合并</h3>
                    <h3>订单拆分</h3>
                    <h3>3</h3>
                </div>
                <div class="tab-content">
                    <div class="show">
                        <input type="button" id="batch_merge" class="btn btn-default btn-sm" value="合并订单">
                    </div>
                    <div>

                        <input id='by_type' type="radio" name="by_radio" value="按种类拆分"/>按种类拆分
                        <input id='by_price' type="radio" name="by_radio" value="按价格拆分"/>按价格拆分

                    </div>
                    <div>

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
 src="../dist/js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>
<?php $jquery_confirm_js = '../dist/js/jquery.confirm.js' ;
echo '<script'; ?>
 src='../dist/js/jquery.confirm.js?v=<?php echo filemtime( $jquery_confirm_js );?>'><?php echo '</script'; ?>
>
<?php $order_list_for_generate_js = '../dist/js/order_list_for_generate.js' ;
echo '<script'; ?>
 src='../dist/js/order_list_for_generate.js?v=<?php echo filemtime( $order_list_for_generate_js );?>'><?php echo '</script'; ?>
>
<?php $batch_merge_split_js = '../dist/js/batch_merge_split.js' ;
echo '<script'; ?>
 src='../dist/js/batch_merge_split.js?v=<?php echo filemtime( $batch_merge_split_js );?>'><?php echo '</script'; ?>
>
</html><?php }
}
