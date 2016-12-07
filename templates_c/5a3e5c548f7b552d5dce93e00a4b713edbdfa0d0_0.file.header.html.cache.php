<?php
/* Smarty version 3.1.29, created on 2016-12-06 14:47:18
  from "D:\phpStudy\WWW\guanpeipindao\templates\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58465ef661cf64_32545872',
  'file_dependency' => 
  array (
    '5a3e5c548f7b552d5dce93e00a4b713edbdfa0d0' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\header.html',
      1 => 1480654383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58465ef661cf64_32545872 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1336858465ef660fde1_44877712';
?>
<div class="site_header">
    <div class="login_register">

        <?php if ($_SESSION['islogin']) {?>
        <!--<a style="margin-left: 930px">欢迎<?php echo $_SESSION['username'];?>
</a>-->
        <span class="welcome_logout">
            <a >欢迎<?php echo $_SESSION['username'];?>
</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
user/logout.php">退出</a>
        </span>

        <?php } else { ?>
        <span style="margin-left: 680px">您好,欢迎来到科学出版社!</span>
        <a style="margin-left: 10px; font-weight:bold;" href="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
user/login.php"> [请登录],</a>
        <span>新用户？</span>
        <a style="font-weight:bold;" href="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
user/register.php">[免费注册]</a>
        <?php }?>

    </div>
    <hr class="hr"/>

    <div>
        <div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
index.php" style="float:left; margin-right: 100px" href="javascript:scroll(0,0)">
                <img height="53" width="290" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/logo.gif" alt="logo"></a>
            <div id="header_middle" >
                <div  class="">
                    <div class="" style="float: left">
                        <input  type="text" placeholder='书名、内容简介或作者' class='form-control search_size words'>
                    </div>
                    <div class="">
                        <input id="header_search" type="submit" value="搜索" class='btn btn-primary words'>
                    </div>
                </div>
                <div class="keys words">热门关键词 ：物理 科学 企业管理</div>

                <!--<form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()"  >-->
                    <!--<div class="B_input_box">-->
                        <!--<input name="keywords" type="text" id="keyword" placeholder='书名、书号、丛书名、作者或内容简介' value="" class="B_input"/>-->
                    <!--</div>-->
                    <!--<input name="imageField" type="submit" value="" class="go" style="cursor:pointer;" />-->
                    <!--&lt;!&ndash;<div style="margin-left:10px;float:left;width:40px"><a href="search.php?act=advanced_search">高级</br>搜索</a></div>&ndash;&gt;-->
                <!--</form>-->
                <!--<div class="keys">热门关键词 ：物理 科学 企业管理与培训</div>-->

            </div>
            <!--<div style=""><p class="gouwuche">去购物车结算</p></div>-->

        </div>

    </div>
    <a id="global_url" style="display: none"><?php echo GLOBAL_URL;?></a>
    <a id="web_dir" style="display: none"><?php echo WEB_DIR;?></a>

    <a id="userid" style="display: none"><?php echo $_SESSION['user_id'];?>
</a>
    <a id="usertype" style="display: none"><?php echo $_SESSION['user_type'];?>
</a>

    <div id="thenavbar">
        <ul class="nav navbar-nav">
            <li class="active">
                <a id="first_all" href="/<?php echo WEB_DIR; ?>/guanpeipindao.php">全部商品分类</a>
            </li>
            <li class="nav_li_second">
                <a href="">网上书店</a>
            </li>
            <li class="nav_li">
                <a href="">按需印刷</a>
            </li>
            <li class="nav_li">
                <a href="">电子书</a>
            </li>
            <li class="nav_li">
                <a href="">预出版</a>
            </li>
            <li class="nav_li">
                <a href="/<?php echo WEB_DIR; ?>/guanpeipindao.php">馆配服务</a>
            </li>
            <li class="nav_li">
                <a href="">教学服务</a>
            </li>
            <li class="nav_li">
                <a href="">经销商服务</a>
            </li>


        </ul>
    </div>


</div>
<?php }
}
