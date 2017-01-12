<?php
/* Smarty version 3.1.29, created on 2017-01-11 08:44:02
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\view_hide_zhengdingdan.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58757fd29b5e69_86224378',
  'file_dependency' => 
  array (
    '18ffdf5839334fd739b335d46371dedec3f14035' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\view_hide_zhengdingdan.html',
      1 => 1484095433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58757fd29b5e69_86224378 ($_smarty_tpl) {
?>
<table  class='table table-bordered table-striped' style="margin-top: 10px;">
    <span style="display: none" id="zdd_times"><?php echo $_smarty_tpl->tpl_vars['zdd_times']->value;?>
</span>

    <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>

    <tr style="text-align: center">
        <td width="150">征订单编号</td>
        <td width="150">提交时间</td>
        <td width="100" align="center">品种数量</td>
        <td width="150" align="center">操作</td>
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
" align="center">
            <?php echo $_smarty_tpl->tpl_vars['order']->value['zdd_sum'];?>

        </td>
        <td align="center">
            <a id="view_hide_zdd_detail"   class="view_hide_zdd_detail">查看详情</a>
            <!--<a id="view_zdd_detail_mssql"   class="view_zdd_detail_mssql">查看详情mssql</a>-->
            <a  id="hide_zhengdingdan_download_marc" >下载</a>

        </td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_local_item;
}
if ($__foreach_order_0_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_item;
}
?>

    <span style="opacity: 1;float: right;color:#9B410E">已报单列表</span>

</table>

<button class="btn btn-default btn-sm" id="return_to_my_zhengdingdan" style="color: #428bca;" onclick="return_to_my_zhengdingdan();" value="返回到我的征订单">返回到我的征订单</button>
<?php }
}
