<?php
/* Smarty version 3.1.29, created on 2016-11-04 17:03:45
  from "D:\phpStudy\WWW\guanpeipindao\templates\left_nav.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_581c4ef1a56170_70701612',
  'file_dependency' => 
  array (
    '6f433d23cae4f7de86a0fe761988e90a022a63e8' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\left_nav.html',
      1 => 1474598280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_581c4ef1a56170_70701612 ($_smarty_tpl) {
?>
<div class="site-position">
    <?php if ($_smarty_tpl->tpl_vars['first_level']->value) {?>
    当前位置: <?php echo $_smarty_tpl->tpl_vars['first_level']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['second_level']->value) {?> ><?php echo $_smarty_tpl->tpl_vars['second_level']->value;
}?>
    <?php }?>
</div>
<div class="wrap-menu left-nav">
</div>

<div style="text-align:center;clear:both">
</div><?php }
}