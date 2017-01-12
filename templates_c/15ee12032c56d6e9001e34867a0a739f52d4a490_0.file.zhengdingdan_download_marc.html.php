<?php
/* Smarty version 3.1.29, created on 2017-01-11 15:08:34
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\zhengdingdan_download_marc.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5875d9f2ca2ed8_78460256',
  'file_dependency' => 
  array (
    '15ee12032c56d6e9001e34867a0a739f52d4a490' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\zhengdingdan_download_marc.html',
      1 => 1484030044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5875d9f2ca2ed8_78460256 ($_smarty_tpl) {
?>
<div id="zhengdingdan_marc">
    <span style="display: none" id="zdd_times"><?php echo $_smarty_tpl->tpl_vars['zdd_times']->value;?>
</span>

    <h3><?php echo $_smarty_tpl->tpl_vars['zdd_is_hide']->value;?>
</h3>

    <h3>征订单编号:<span class=""><?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
</span></h3>
    <h3>图书品种数:<span class=""><?php echo $_smarty_tpl->tpl_vars['type_num']->value;?>
</span></h3>

    <h3><input name="marc" type="radio" value="excel"/>Excel格式下载 </h3>
    <h3><input name="marc" type="radio" value="marc"/>Marc格式下载 </h3>

    <input id="MARC" type="checkbox" name="MARC" value="T" disabled="disabled"/><span
        class="label label-primary">国图</span>
    <input id="Calis" type="checkbox" name="Calis" value="T" disabled="disabled"/><span
        class="label label-info">Calis</span>
    <input id="CF" type="checkbox" name="CF" value="T" disabled="disabled"/><span class="label btn-warning">采访</span>

</div>
<p>
<h2><a id="<?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
" class="download_zhengdingdan download_marc_btn btn label-success btn-xs">下载</a></h2>
<?php if ($_smarty_tpl->tpl_vars['zdd_is_hide']->value != '已报单') {?>
<button class="btn btn-default btn-sm" id="return_to_my_zhengdingdan" style="color: #428bca;" onclick="return_to_my_zhengdingdan();"
        value="返回到我的征订单">返回到我的征订单
</button>
<?php } else { ?>
<button class="btn btn-default btn-sm" id="return_to_my_hide_zhengdingdan" onclick="return_to_my_hide_zhengdingdan();"
        value="返回到我的已报征订单">返回到我的已报征订单
</button>
<?php }?>


<?php }
}
