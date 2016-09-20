<?php
/* Smarty version 3.1.29, created on 2016-09-20 13:50:04
  from "D:\WWW\guanpeipindao\templates\left_nav.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57e0ce0cc46d31_93842909',
  'file_dependency' => 
  array (
    'b60b901375755bbd0c623c769a67cb01336bbb32' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\left_nav.html',
      1 => 1473388916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e0ce0cc46d31_93842909 ($_smarty_tpl) {
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
