<?php
/* Smarty version 3.1.29, created on 2016-09-20 15:43:36
  from "D:\WWW\guanpeipindao\templates\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57e0e8a8462460_91750229',
  'file_dependency' => 
  array (
    '0ad32a6d75a2e009af653ca5cc135d475668c3b3' => 
    array (
      0 => 'D:\\WWW\\guanpeipindao\\templates\\header.html',
      1 => 1473404898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e0e8a8462460_91750229 ($_smarty_tpl) {
?>
<div class="site">
    <div class="login_register">

        <?php if ($_SESSION['islogin']) {?>
        <!--<a style="margin-left: 930px">欢迎<?php echo $_SESSION['username'];?>
</a>-->
        <p style="margin-left: 900px">
            <a >欢迎<?php echo $_SESSION['username'];?>
</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
user/logout.php">退出</a>
        </p>

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
                <img height="56" width="238" src="<?php echo $_smarty_tpl->tpl_vars['relpostodist']->value;?>
dist/picture/logo.gif" alt="logo"></a>
            <div style="float: left">
                <form action="" class="navbar-form">
                    <div class="form-group">
                        <input  type="text" placeholder='书名、内容简介或作者' class='form-control search_size'>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="搜索" class='btn btn-primary'>
                    </div>
                    <p class="keys">热门关键词 ：物理 科学 企业管理与培训</p>
                </form>
            </div>
            <!--<div style=""><p class="gouwuche">去购物车结算</p></div>-->

        </div>


    </div>
    <a id="global_url" style="display: none"><?php echo GLOBAL_URL;?></a>
    <a id="userid" style="display: none"><?php echo $_SESSION['user_id'];?>
</a>
    <a id="usertype" style="display: none"><?php echo $_SESSION['user_type'];?>
</a>

    <div id="thenavbar">
        <ul class="nav navbar-nav">
            <li class="active">
                <a id="first_all" href="guanpeipindao.php">全部商品分类</a>
            </li>
            <li class="nav_li_second">
                <a href="other1.php">网上书店</a>
            </li>
            <li class="nav_li">
                <a href="other2.php">按需印刷</a>
            </li>
            <li class="nav_li">
                <a href=".php">电子书</a>
            </li>
            <li class="nav_li">
                <a href="other1.php">预出版</a>
            </li>
            <li class="nav_li">
                <a href="/guanpeipindao/guanpeipindao.php">馆配服务</a>
            </li>
            <li class="nav_li">
                <a href="other1.php">教学服务</a>
            </li>
            <li class="nav_li">
                <a href="other2.php">经销商服务</a>
            </li>


        </ul>
    </div>


</div>
<?php }
}
