<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 8:02
 */

include("../include/GuanCangSmarty.php");


require_once("../config.php");

include("../db/con_mysql2.php");

require_once('../PHPExcel.php');
require_once("../db/con_mssql.php");
require_once("../db/con_mysql2.php");
require_once("../db/con_mysql3.php");
include("../db/dao.php");
include("auth_chachong.php");

//if (isset($_SESSION['err'])) {
//    $err = $_SESSION['err'];
//} else {
//    $err = "";
//};


$smarty = new GuanCangSmarty();
$smarty->MySmarty();
//$smarty->php_handling = SMARTY::PHP_ALLOW;
// 实例化SQLServer封装类
$ms = new con_mssql();


//介绍文字
$sql = ser("bs_home_introduce", "introduce","");

// 查询数据
$rs = $ms->sdb($sql);
if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
}
if (odbc_fetch_row($rs)) {
    $introduce = odbc_result($rs, "introduce");
}

$introduce = iconv('gbk', 'utf-8//IGNORE', $introduce);

//$sql = ser("fx_book_info","distinct qtfl","1=1");
//$rs = $ms->sdb($sql);

// print_r($smarty->getTemplateDir());

$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='chachong.php'>在线订购</a>");
$smarty->assign("relpostodist", $relpostodist);
$smarty->assign("introduce", $introduce);

//echo CSSJS_ROOT;
//exit();
$smarty->display("chachong/chachong.html");