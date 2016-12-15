<?php
/* Smarty version 3.1.29, created on 2016-12-15 16:43:39
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\return_yudingdan.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_585257bb9a81f5_16458250',
  'file_dependency' => 
  array (
    '4df956a453d5e304cdcf0a37740a8469e795693f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\return_yudingdan.html',
      1 => 1474598280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585257bb9a81f5_16458250 ($_smarty_tpl) {
?>
<!--<div id="show_yudingdan" class="content-2" onmouseover="show_ydd();" >-->
    <table id="show_yudingdan_table" class='table table-bordered table-striped'>
        <span style="display: none" id="ydd_times_slice"><?php echo $_smarty_tpl->tpl_vars['ydd_times']->value;?>
</span>
        <tr style="text-align: center">
            <td>预订单编号</td>
            <td>生成时间</td>
            <td>品种数量</td>
            <td>操作</td>
        </tr>

        <?php
$_from = $_smarty_tpl->tpl_vars['ydd_order_list']->value;
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
                <a class="yudingdan_download_marc"
                   >下载</a>
            </td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_local_item;
}
if ($__foreach_order_0_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_item;
}
?>
    </table>

<!--</div>-->
<?php }
}
