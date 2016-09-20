<?php
/* Smarty version 3.1.29, created on 2016-09-20 18:49:08
  from "D:\WWW\guanpeipindao\templates\zhengdingdan\zhengdingdan.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57e11424dfe443_92519258',
  'file_dependency' => 
  array (
    'e07db1a8ef8b7ff685409a184b25b723ffd1537f' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\zhengdingdan\\zhengdingdan.html',
      1 => 1472643440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e11424dfe443_92519258 ($_smarty_tpl) {
?>
<table  class='table table-bordered table-striped'>
    <span style="display: none" id="zdd_times"><?php echo $_smarty_tpl->tpl_vars['zdd_times']->value;?>
</span>
    <tr style="text-align: center">
        <td>征订单编号</td>
        <td>生成时间</td>
        <td>品种数量</td>
        <td>操作</td>
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
">
            <?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_sum'];?>

        </td>
        <td>
            <a id="view_zdd_detail"   class="view_zdd_detail">查看详情</a>
            <a  class="zhengdingdan_download_marc" >下载</a>
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


</table><?php }
}
