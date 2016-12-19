<?php
/* Smarty version 3.1.29, created on 2016-12-16 17:22:57
  from "D:\phpStudy\WWW\guanpeipindao\templates\chachong\order_list_for_generate.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5853b2711f07e7_36948720',
  'file_dependency' => 
  array (
    '2d632bae839daed8abd7f606ac1d7b8786632f03' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\chachong\\order_list_for_generate.html',
      1 => 1481880157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5853b2711f07e7_36948720 ($_smarty_tpl) {
?>
<div class="need_op_batch">

    <div class="batch_title">
                        <span>
                            你还有<?php echo $_smarty_tpl->tpl_vars['need_op_batch_num']->value;?>
条未处理批次
                        </span>
    </div>

    <table id="batch_table_generate" class="table table-bordered batch_table_generate">
        <tr>
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
            <td class="batch_ltd">
                <a class="batch_item"><?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
</a>
            </td>

            <td class="batch_mtd">
                <?php echo $_smarty_tpl->tpl_vars['val']->value['Date_Time'];?>

            </td>

            <td class="batch_r_f_g_td">
                <input id="<?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
" type="button" class="btn btn-default btn-sm generate_order_btn" name="generate_order" value="生成订单"/>
            </td>

            <td class="batch_rtd">
                <a class="delete_batch" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['PiCi_Num'];?>
" ><img width="19" height="19"
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

</div><?php }
}
