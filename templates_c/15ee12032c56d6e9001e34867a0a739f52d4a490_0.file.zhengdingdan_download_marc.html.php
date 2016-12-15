<?php
/* Smarty version 3.1.29, created on 2016-12-15 16:42:08
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\zhengdingdan_download_marc.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58525760ea72a7_90479162',
  'file_dependency' => 
  array (
    '15ee12032c56d6e9001e34867a0a739f52d4a490' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\zhengdingdan_download_marc.html',
      1 => 1481791314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58525760ea72a7_90479162 ($_smarty_tpl) {
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

    <input id="MARC" type="checkbox" name="MARC" value="T" disabled="disabled"/><span class="label label-warning">国图</span>
    <input id="Calis" type="checkbox" name="Calis" value="T" disabled="disabled"/><span class="label label-info">Calis</span>
    <input id="CF" type="checkbox" name="CF" value="T" disabled="disabled"/><span class="label label-success">采访</span>

</div>
<p>
<h2><a id="<?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
"  class="download_zhengdingdan download_marc_btn btn btn-warning btn-sm">下载</a></h2>
<button class="btn btn-default btn-sm" id="return_to_my_zhengdingdan" onclick="return_to_my_zhengdingdan();" value="返回到我的征订单">返回到我的征订单</button>



<?php }
}
