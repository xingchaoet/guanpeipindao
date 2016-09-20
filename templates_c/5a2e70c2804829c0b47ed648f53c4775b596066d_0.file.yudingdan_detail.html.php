<?php
/* Smarty version 3.1.29, created on 2016-09-20 18:47:08
  from "D:\WWW\guanpeipindao\templates\zhengdingdan\yudingdan_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57e113accd5a59_29509410',
  'file_dependency' => 
  array (
    '5a2e70c2804829c0b47ed648f53c4775b596066d' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\zhengdingdan\\yudingdan_detail.html',
      1 => 1471422932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e113accd5a59_29509410 ($_smarty_tpl) {
?>
<table class='table table-bordered table-striped'>
    <tr style="text-align: center">
        <td>数量</td>
        <td>书名</td>
        <td>书号</td>
        <td>作者</td>
        <td>开本</td>
        <td>出版日期</td>
        <td>价格</td>
        <td>库存</td>
    </tr>

    <?php
$_from = $_smarty_tpl->tpl_vars['ydd_order_detail']->value;
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
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['amount'];?>

        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['book_name'];?>

        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['isbn'];?>

        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['writer'];?>

        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['kb'];?>

        </td>
        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['publish_date'];?>

        </td>

        <td>
            <?php echo $_smarty_tpl->tpl_vars['order']->value['price'];?>

        </td>
        <td>
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
    <button class="btn btn-default btn-sm" id="return_to_my_yudingdan" onclick="return_to_my_yudingdan();" value="返回到我的预订单">返到我的预订单</button>
<?php }
}
