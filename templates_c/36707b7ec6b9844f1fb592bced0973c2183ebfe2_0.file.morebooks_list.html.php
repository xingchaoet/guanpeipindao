<?php
/* Smarty version 3.1.29, created on 2016-12-08 09:41:55
  from "D:\phpStudy\WWW\guanpeipindao\templates\morebooks_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5848ba63b08a60_40785365',
  'file_dependency' => 
  array (
    '36707b7ec6b9844f1fb592bced0973c2183ebfe2' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\morebooks_list.html',
      1 => 1481160525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5848ba63b08a60_40785365 ($_smarty_tpl) {
?>
<div id="div_list" name="div_list">
    <div class="row">
        <div class="col-sm-12">
            <table id="table" class="table  table-striped table-hover">
                <tr>
                    <th>
                        <input type="checkbox" checked="checked" id="checkall_box" onclick='checkallbox_changed();'
                               name="all" class="checkall_box">
                    </th>
                    <th style="width:50px;">数量</th>
                    <th style="width:144px;text-align: center">书名</th>
                    <th style="width:110px;text-align: center">书号</th>
                    <th style="width:100px;text-align: center">作者</th>
                    <th style="width:90px;text-align: center">出版日期</th>
                    <th style="width:80px;text-align: center">价格</th>
                    <th style="width:80px;text-align: center">库存</th>
                    <th style="width:100px;text-align: center">是否已定</th>
                </tr>
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
                <tr>
                    <td class='list'>
                        <input type="checkbox" checked="checked" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
"
                               class="checkall">
                    </td>
                    <td>
                        <input type="text" id="sum_<?php echo $_smarty_tpl->tpl_vars['val']->value['book_id'];?>
" class="sum" value="2"/>
                    <td style="width:144px;text-align: left">
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['sm'];?>
</p>
                    </td>
                    <td width="110" align="center";>
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['isbn'];?>
</p>
                    </td>
                    <td width="100" align="left";>
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['zzh'];?>
</p>
                    </td>
                    <td width="90" align="center";>
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['cbrq'];?>
</p>
                    </td>
                    <td style="width:80px;text-align: center">
                        <p>￥<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['val']->value['dj']);?>
</p>
                    </td>
                    <td style="width:80px;text-align: center">
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['kucun'];?>
</p>
                    </td>
                    <td style="width:100px;text-align: center">
                        <p><?php echo $_smarty_tpl->tpl_vars['val']->value['yi_ding'];?>
</p>
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
        </div>
    </div>

    <?php echo $_smarty_tpl->tpl_vars['page']->value->show();?>


</div>
<?php }
}
