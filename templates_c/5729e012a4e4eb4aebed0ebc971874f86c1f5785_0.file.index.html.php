<?php
/* Smarty version 3.1.29, created on 2016-11-23 15:13:00
  from "D:\phpStudy\WWW\guanpeipindao\templates\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5835417c5062f7_52199824',
  'file_dependency' => 
  array (
    '5729e012a4e4eb4aebed0ebc971874f86c1f5785' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\index.html',
      1 => 1474598280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_5835417c5062f7_52199824 ($_smarty_tpl) {
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
