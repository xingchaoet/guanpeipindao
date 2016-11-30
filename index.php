<?php

include ("include/GuanCangSmarty.php");
include ("config.php");
session_start();

$smarty = new GuanCangSmarty();

//echo $_SESSION['islogin'].$_SESSION['username'];


if($_SESSION['islogin']){



    $smarty->assign("islogin",$_SESSION['islogin']);

    $smarty->assign("username",$_SESSION['username']);

}

$smarty->display("index.html");


?>