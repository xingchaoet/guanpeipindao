<?php
/* Smarty version 3.1.29, created on 2016-12-13 09:01:37
  from "D:\phpStudy\WWW\guanpeipindao\templates\user\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584f4871a644c2_85931285',
  'file_dependency' => 
  array (
    '59e5ca12a9e2cd51565c756f8460f583d176b678' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\user\\login.html',
      1 => 1481092166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_584f4871a644c2_85931285 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>

    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">

    <?php $header_css = '../dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $login_css = '../dist/css/login.css' ?>
    <link rel="stylesheet" href="<?php echo $login_css .'?v='. filemtime( $login_css ); ?>">

    <style>

    </style>
</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="login_group">

    <ul id="login_group_title" class="nav nav-tabs ">
        <li class='active'><a id="library_user_login_title" href="#library_user" data-toggle='tab'>图书馆用户登录</a></li>
        <li ><a href="#gps_user" id="gps_user_login_title" data-toggle='tab'>馆配商用户登录</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active fade  in" id='library_user'>
            <div id="library_user_login" class="library_user_login">

                    <div id="txtdiv1">登录名称：<input id="lgname" name="lgname" type="text"/></div>
                    <div id="txtdiv2">登录密码：<input id="lgpwd" name="lgpwd" type="password"/></div>
                    <div id="txtdiv3">验证码：<input id="lgchk" type="text" maxlength="4"
                                                                         style="width:35px;font-size: 10px"><img
                            id='chkid' src=""/><a
                            id="changea">看不清</a></div>
                    <div id="btndiv">
                        <button id="lgbtn"></button>
                        <button id="rgbtn"></button>
                        <button id="fdbtn"></button>
                        <input id="chknm" name="chknm" type="hidden" value=""/></div>
                    <div id="regimg" style="visibility: hidden;"></div>

            </div>
        </div>
        <div class="tab-pane  fade " id='gps_user'>
            <div id="gps_user_login" class="gps_user_login">


                    <div id="txtdiv1_gps">登录名称：<input id="lgname_gps" name="lgname_gps" type="text"/></div>
                    <div id="txtdiv2_gps">登录密码：<input id="lgpwd_gps" name="lgpwd_gps" type="password"/></div>
                    <div id="txtdiv3_gps">验证码：<input id="lgchk_gps" type="text" maxlength="4"
                                                                             style="width:35px;font-size: 10px"><img
                            id='chkid_gps'
                            src=""/><a
                            id="changea_gps">看不清</a></div>
                    <div id="btndiv_gps">
                        <button id="lgbtn_gps"></button>
                        <button id="rgbtn_gps"></button>
                        <button id="fdbtn_gps"></button>
                        <input id="chknm_gps" name="chknm_gps" type="hidden" value=""/></div>
                    <div id="regimg_gps" style="visibility: hidden;"></div>

            </div>

        </div>
    </div>
</div>


</body>
<?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript" src="../dist/js/login_gps.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" src="../dist/js/login.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript" src="../dist/js/xmlhttprequest.js"><?php echo '</script'; ?>
>

</html><?php }
}
