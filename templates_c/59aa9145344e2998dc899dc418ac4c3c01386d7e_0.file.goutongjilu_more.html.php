<?php
/* Smarty version 3.1.29, created on 2016-11-28 18:27:25
  from "D:\phpStudy\WWW\guanpeipindao\templates\hall_communication\goutongjilu_more.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583c068d397c95_31420129',
  'file_dependency' => 
  array (
    '59aa9145344e2998dc899dc418ac4c3c01386d7e' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\hall_communication\\goutongjilu_more.html',
      1 => 1474598280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:left_nav.html' => 1,
  ),
),false)) {
function content_583c068d397c95_31420129 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>沟通记录-更多</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/left_nav.css">

    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/introduce.css">

    <?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
    <style>
        .down {
            padding-top: 25px;
            width: 770px;
        }

    </style>
</head>
<body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="site">
    <div class="row ">

        <div class="col-sm-3">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:left_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <div class="introduce">
                <?php echo $_smarty_tpl->tpl_vars['introduce']->value;?>

            </div>

        </div>

        <div class="col-sm-9">
            <div class="down">
                <div id="communication_record">
                    <div><label>沟通记录</label></div>
                    <hr class="hr"/>
                    <div class="communication_record_content">
                        <?php
$_from = $_smarty_tpl->tpl_vars['gtjl']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                        <div class="list-group">
                            <a href="#" class="list-group-item ">
                                <h4 class="list-group-item-heading">
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['UserName'];?>
:<?php echo $_smarty_tpl->tpl_vars['value']->value['MessageContents'];?>

                                    <!--留言一-->
                                </h4>
                                <p class="list-group-item-text">
                                    <!--2016-8-30-->
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['MessageTime'];?>

                                </p>
                            </a>
                            <?php
$_from = $_smarty_tpl->tpl_vars['value']->value['reply'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_1_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_1_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
                            <a href="#" class="list-group-item">
                                <p class="list-group-item-text">
                                    <!--留言回复一-->
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['ReplyUserName'];?>
:<?php echo $_smarty_tpl->tpl_vars['val']->value['ReplyContents'];?>

                                </p>
                                <p class="list-group-item-text">
                                    <!--2016-8-30-->
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['ReplyTime'];?>

                                </p>
                            </a>
                            <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
?>
                        </div>
                        <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/holder.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/zzsc.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/left_nav.js"><?php echo '</script'; ?>
>
</html><?php }
}
