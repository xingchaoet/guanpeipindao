<?php
/* Smarty version 3.1.29, created on 2016-12-19 14:20:57
  from "D:\phpStudy\WWW\guanpeipindao\templates\morebooks_picture.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58577c49625b45_14020886',
  'file_dependency' => 
  array (
    '7aa41d7b95157de377f7e1b877405221c3930603' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\morebooks_picture.html',
      1 => 1481281521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58577c49625b45_14020886 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\phpStudy\\WWW\\guanpeipindao\\libs\\plugins\\modifier.truncate.php';
?>
<div id="div_list" name="div_list">

    <?php if ($_SESSION['first_search_two_types']) {?>
    <div class='hide_before_purchase'>
        <input type="checkbox"  id="checkall_box" onclick='checkallbox_changed();'
               name="all" class="checkall_box">
        <label>全选</label>
    </div>
    <?php } elseif ($_SESSION['start_purchase_two_types']) {?>

    <div class=''>
        <input type="checkbox"  id="checkall_box" onclick='checkallbox_changed();'
               name="all" class="checkall_box">
        <label>全选</label>

    </div>
    <?php } else { ?>

    <div class='hide_before_purchase_session'>
        <input type="checkbox"  id="checkall_box" onclick='checkallbox_changed();'
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
                        <!---->
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

                        <!--<input type="checkbox" checked="checked" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
" class="checkall"/>-->
                        <!--<p>数量：-->
                        <!--<input type="text" id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
" class="sum" value="2"/>-->
                        <!--</p>-->

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
                        <p class="">数量：
                            <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                   id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                                   class="sum get_book_num_and_update_db_class"
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
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
    </div>

    <!--<div class="add_and_check">-->
    <!--<a id="buy" class="btn btn-default btn-xs" onclick="generate_order();">加入订单</a>-->
    <!--<?php if ($_SESSION['user_type'] == 'library_user') {?>-->
    <!--<a href='zhengdingdan/orders_view.php' class="btn  btn-default btn-xs">查看订单</a>-->
    <!--<?php }?>-->
    <!--</div>-->

    <?php echo $_smarty_tpl->tpl_vars['page']->value->show();?>



</div>
<?php }
}