<?php
/* Smarty version 3.1.29, created on 2016-12-15 16:07:10
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\zhengdingdan_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58524f2e4eec33_82554989',
  'file_dependency' => 
  array (
    'b04d9689f3d2f34d56a4b173407d3b462a64595e' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\zhengdingdan_detail.html',
      1 => 1481788599,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58524f2e4eec33_82554989 ($_smarty_tpl) {
?>
<table class='table table-bordered table-striped'>
    <tr style="text-align: center">
        <td width="50" align="center";>数量</td>
        <td>书名</td>
        <td width="80" align="center";>书号</td>
        <td width="100" align="center";>作者</td>
        <td width="50" align="center";>开本</td>
        <td width="90" align="center";>出版日期</td>
        <td>价格</td>
        <td width="70"  align="center";>库存</td>
    </tr>

    <?php
$_from = $_smarty_tpl->tpl_vars['zdd_order_detail']->value;
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
        <td width="50" align="center";>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['amount'];?>

        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['book_name'];?>

        </td>
        <td width="80" align="center";>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['isbn'];?>

        </td>
        <td width="100" align="center";>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['writer'];?>

        </td>
        <td width="50" align="center";>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['kb'];?>

        </td>
        <td width="90" align="center";>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['publish_date'];?>

        </td>

        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['price'];?>

        </td>
        <td width="70"  align="center";>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['kc'];?>

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



</table>

<!--<a>回到我的征订单</a>-->
<button class="btn btn-default btn-sm" id="return_to_my_zhengdingdan" onclick="return_to_my_zhengdingdan();" value="返回到我的征订单">返回到我的征订单</button>
<?php }
}
