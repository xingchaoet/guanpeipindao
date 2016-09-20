<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/19
 * Time: 22:25
 */
include ("../include/GuanCangSmarty.php");

//include ("db/db.php");

session_start();

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

//$username = $_POST['username'];
//$password = $_POST['password'];
$relpostodist = '../';
$smarty->assign("relpostodist", $relpostodist);

$smarty->display("user/register.html");




?>