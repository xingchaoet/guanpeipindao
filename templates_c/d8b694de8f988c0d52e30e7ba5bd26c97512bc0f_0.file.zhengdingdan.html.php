<?php
/* Smarty version 3.1.29, created on 2017-01-10 14:45:57
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\zhengdingdan.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5874832518eba8_02645146',
  'file_dependency' => 
  array (
    'd8b694de8f988c0d52e30e7ba5bd26c97512bc0f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\zhengdingdan.html',
      1 => 1484030739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5874832518eba8_02645146 ($_smarty_tpl) {
?>
<table id="show_zhengdingdan_table" class='table table-bordered table-striped'>
    <span style="display: none" id="zdd_times"><?php echo $_smarty_tpl->tpl_vars['zdd_times']->value;?>
</span>

    <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>


    <tr style="text-align: center">
        <td width="150">征订单编号</td>
        <td width="150">生成时间</td>
        <td width="100">品种数量</td>
        <td width="150">操作</td>
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
    <tr style="text-align: center">
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
            <!--<a id="view_zdd_detail_mssql"   class="view_zdd_detail_mssql">查看详情mssql</a>-->
            <a  class="zhengdingdan_download_marc" >下载</a>
            <a class="zhengdingdan_hide" name="<?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_pc_id'];?>
">报单</a>

        </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_local_item;
}
if ($__foreach_order_0_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_item;
}
?>



    <span style="opacity: 1;float: right;color: #4cae4c;cursor: pointer;" id="view_hide_zhengdingdan">查看已报单</span>

</table><?php }
}
