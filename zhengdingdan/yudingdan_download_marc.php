<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/17
 * Time: 12:05
 */

include("../include/GuanCangSmarty.php");
include ("auth_zhengdingdan.php");

//session_start();

$sheet_no = $_POST['sheet_no'];
$type_num = $_POST['type_num'];

//print_r($_POST);

//exit();

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

$ydd_times = 1; //防止多次绑定函数
$smarty->assign("ydd_times", $ydd_times);

$smarty->assign("sheet_no", $sheet_no);
$smarty->assign("type_num", $type_num);

$marc_page = $smarty->display("zhengdingdan/yudingdan_download_marc.html");
return $marc_page;