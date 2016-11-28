<?php
/* Smarty version 3.1.29, created on 2016-11-28 18:33:21
  from "D:\phpStudy\WWW\guanpeipindao\templates\hall_communication\guanpeidongtai_more.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583c07f1077c09_26500272',
  'file_dependency' => 
  array (
    'd78dfe13fbf3df23f9f3cceb15f3aa952b839ebe' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\hall_communication\\guanpeidongtai_more.html',
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
function content_583c07f1077c09_26500272 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>馆配动态-更多</title>
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

        .hr {
            height: 0px;
            border: none;
            border-top: 1px ridge darkgray;
            margin-bottom: 5px;

        }

        hr {
            margin-top: 0px;
            margin-bottom: 0px;
            border: 0;
            /*border-top: 1px solid #eee;*/
        }

        hr {
            height: 0;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }

        hr {
            display: block;
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
            -webkit-margin-start: auto;
            -webkit-margin-end: auto;
            border-style: inset;
            border-width: 0px;
        }

        .gpdt_table {
            width: 750px;
            line-height: 18px;
            margin-left: 10px;
        }

        .gpdt_tr {
            font-family: 'Microsoft YaHei', 'Arial';
            font-size: 12px;
        }

        .gpdt_l_td {
            width: 80%;
        }

        .gpdt_m_td {
            color: #F16D06;
        }

        .gpdt_r_td {
            width: 20%;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 4px 4px;
            margin-bottom: -1px;
            background-color: #fff;
            border: 0px solid #ddd;
        }

        #hangyezixun{
            margin-top: 20px;
        }

        #xueshujiaoliu{
            margin-top: 20px;
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

                <div id="sheguandongtai">
                    <div><label> 社馆动态</label></div>
                    <hr class="hr"/>
                    <div class="sheguandongtai_content">
                        <table class="gpdt_table">
                            <?php
$_from = $_smarty_tpl->tpl_vars['gpdt_sgdt']->value;
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
                            <tr class=" gpdt_tr">
                                <td class="gpdt_m_td">[<?php echo $_smarty_tpl->tpl_vars['value']->value['NewsType'];?>
]</td>
                                <td class="gpdt_l_td"><a href="guanpeidongtai_article_content.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['Id'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['Title'];?>
 </a></td>
                                <td><span class="gpdt_r_td"><?php echo $_smarty_tpl->tpl_vars['value']->value['UpTime'];?>
</span></td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
?>

                        </table>
                    </div>
                </div>
                <div id="hangyezixun">
                    <div><label> 行业资讯</label></div>
                    <hr class="hr"/>
                    <div class="sheguandongtai_content">
                        <table class="gpdt_table">
                            <?php
$_from = $_smarty_tpl->tpl_vars['gpdt_hyzx']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_1_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_1_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                            <tr class=" gpdt_tr">
                                <td class="gpdt_m_td">[<?php echo $_smarty_tpl->tpl_vars['value']->value['NewsType'];?>
]</td>
                                <td class="gpdt_l_td"><a href="guanpeidongtai_article_content.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['Id'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['Title'];?>
 </a></td>
                                <td><span class="gpdt_r_td"><?php echo $_smarty_tpl->tpl_vars['value']->value['UpTime'];?>
</span></td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_local_item;
}
if ($__foreach_value_1_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_item;
}
?>

                        </table>
                    </div>
                </div>
                <div id="xueshujiaoliu">
                    <div><label> 学术交流</label></div>
                    <hr class="hr"/>
                    <div class="sheguandongtai_content">
                        <table class="gpdt_table">
                            <?php
$_from = $_smarty_tpl->tpl_vars['gpdt_xshjl']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_2_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_2_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                            <tr class=" gpdt_tr">
                                <td class="gpdt_m_td">[<?php echo $_smarty_tpl->tpl_vars['value']->value['NewsType'];?>
]</td>
                                <td class="gpdt_l_td"><a href="guanpeidongtai_article_content.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['Id'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['value']->value['Title'];?>
 </a></td>
                                <td><span class="gpdt_r_td"><?php echo $_smarty_tpl->tpl_vars['value']->value['UpTime'];?>
</span></td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved_local_item;
}
if ($__foreach_value_2_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved_item;
}
?>

                        </table>
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
