<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/11
 * Time: 16:16
 */
include("../include/GuanCangSmarty.php");
include ("auth_zhengdingdan.php");

//session_start();

$sheet_no = $_POST['sheet_no'];
$type_num = $_POST['type_num'];

$zdd_is_hide = $_POST['zdd_is_hide'];

//print_r($_POST);

//exit();

$smarty = new GuanCangSmarty();
$smarty->MySmarty();



$zdd_times = 1; //防止多次绑定函数
$smarty->assign("zdd_times", $zdd_times);

$smarty->assign("sheet_no", $sheet_no);
$smarty->assign("type_num", $type_num);
$smarty->assign("zdd_is_hide", $zdd_is_hide);

$marc_page = $smarty->display("zhengdingdan/zhengdingdan_download_marc.html");
return $marc_page;