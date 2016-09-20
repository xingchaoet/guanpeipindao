<?php
/* Smarty version 3.1.29, created on 2016-09-19 16:06:49
  from "D:\WWW\guanpeipindao\templates\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57df9c990d0402_91433961',
  'file_dependency' => 
  array (
    'd631ac2198136cd056d4914f0e4a181cefce4552' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\index.html',
      1 => 1472088228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_57df9c990d0402_91433961 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">


    <link rel="stylesheet" href="dist/css/header.css">

</head>
<body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



</body>
<?php echo '<script'; ?>
 src="dist/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/holder.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="dist/js/application.js"><?php echo '</script'; ?>
>
</html>
<?php }
}
