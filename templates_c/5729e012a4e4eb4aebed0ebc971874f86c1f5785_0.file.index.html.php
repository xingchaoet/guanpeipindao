<?php
/* Smarty version 3.1.29, created on 2016-12-13 08:32:31
  from "D:\phpStudy\WWW\guanpeipindao\templates\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584f419f557c07_72049626',
  'file_dependency' => 
  array (
    '5729e012a4e4eb4aebed0ebc971874f86c1f5785' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\index.html',
      1 => 1481094261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_584f419f557c07_72049626 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">

    <?php $header_css = 'dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

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
<!--<?php echo '<script'; ?>
 src="dist/js/holder.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="dist/js/application.js"><?php echo '</script'; ?>
>
</html>
<?php }
}
