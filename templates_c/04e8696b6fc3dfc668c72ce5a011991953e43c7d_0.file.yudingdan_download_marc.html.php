<?php
/* Smarty version 3.1.29, created on 2016-12-15 16:43:21
  from "D:\phpStudy\WWW\guanpeipindao\templates\zhengdingdan\yudingdan_download_marc.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_585257a9112477_07043065',
  'file_dependency' => 
  array (
    '04e8696b6fc3dfc668c72ce5a011991953e43c7d' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\zhengdingdan\\yudingdan_download_marc.html',
      1 => 1481791379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_585257a9112477_07043065 ($_smarty_tpl) {
?>
<div id="yudingdan_marc" >
    <span style="display: none" id="ydd_times"><?php echo $_smarty_tpl->tpl_vars['ydd_times']->value;?>
</span>
    <h3>征订单编号:<span class=""><?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
</span></h3>
    <h3>图书品种数:<span class=""><?php echo $_smarty_tpl->tpl_vars['type_num']->value;?>
</span></h3>

    <h3><input name="marc_ydd" type="radio" value="excel_ydd"/>Excel格式下载 </h3>
    <h3><input name="marc_ydd" type="radio" value="marc_ydd"/>Marc格式下载 </h3>

    <input id="MARC_YDD" type="checkbox" name="MARC_YDD" value="T" disabled="disabled"/><span class="label label-warning">国图</span>
    <input id="Calis_YDD" type="checkbox" name="Calis_YDD" value="T" disabled="disabled"/><span class="label label-info">Calis</span>
    <input id="CF_YDD" type="checkbox" name="CF_YDD" value="T" disabled="disabled"/><span class="label label-success">采访</span>

</div>
<p>
<h2><a id="<?php echo $_smarty_tpl->tpl_vars['sheet_no']->value;?>
"  class="download_yudingdan download_marc_btn btn btn-warning btn-sm">下载</a></h2>
<button class="btn btn-default btn-sm" id="return_to_my_yudingdan" onclick="return_to_my_yudingdan();" value="返回到我的预订单">返回到我的预订单</button>



<?php }
}
