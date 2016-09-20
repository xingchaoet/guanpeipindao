<?php
/* Smarty version 3.1.29, created on 2016-09-19 14:37:02
  from "D:\WWW\guanpeipindao\templates\zhengdingdan\zhengdingdan_download_marc.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57df878e181be6_29250261',
  'file_dependency' => 
  array (
    '131b011316c54833a4f79e460b0ded7a4173b82a' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\zhengdingdan\\zhengdingdan_download_marc.html',
      1 => 1472643346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57df878e181be6_29250261 ($_smarty_tpl) {
?>
<div id="zhengdingdan_marc" >
    <span style="display: none" id="zdd_times"><?php echo $_smarty_tpl->tpl_vars['zdd_times']->value;?>
</span>
    <h3>征订单编号:<span class=""><?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
</span></h3>
    <h3>图书品种数:<span class=""><?php echo $_smarty_tpl->tpl_vars['type_num']->value;?>
</span></h3>

    <h3><input name="marc" type="radio" value="excel"/>Excel格式下载 </h3>
    <h3><input name="marc" type="radio" value="marc"/>Marc格式下载 </h3>

    <input id="MARC" type="checkbox" name="MARC" value="T"/><span class="label label-warning">国图</span>
    <input id="Calis" type="checkbox" name="Calis" value="T"/><span class="label label-info">Calis</span>
    <input id="CF" type="checkbox" name="CF" value="T"/><span class="label label-success">采访</span>

</div>
<p>
<h2><a id="<?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
"  class="download_zhengdingdan download_marc_btn btn btn-warning">下载</a></h2>
<button class="btn btn-default btn-sm" id="return_to_my_zhengdingdan" onclick="return_to_my_zhengdingdan();" value="返回到我的征订单">返到我的征订单</button>



<?php }
}
