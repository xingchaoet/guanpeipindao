<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 8:02
 */

include("../include/GuanCangSmarty.php");
require_once("../config.php");
require_once('../PHPExcel.php');
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");
//if (isset($_SESSION['err'])) {
//    $err = $_SESSION['err'];
//} else {
//    $err = "";
//};

$user_id = $_SESSION['user_id'];
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
//未处理批次

$sql_batch = ser("bs_temp_dingdan_pici", "*","User_Id = '$user_id' AND State = '0'");
//echo $sql_batch;
$rs_sql_batch = $ms->sdb($sql_batch);

if (!$rs_sql_batch) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(odbc_errormsg(), true));
}

$need_op_batch_num = 0;

while ($data = odbc_fetch_array($rs_sql_batch)) {
    $need_op_batch_detail[] = $data;
    $need_op_batch_num = $need_op_batch_num + 1;
}
//print_r($need_op_batch_detail);

$smarty->assign("need_op_batch_num", $need_op_batch_num);
$smarty->assign("need_op_batch_detail", $need_op_batch_detail);

$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='chachong.php'>在线订购</a>");
$smarty->assign("relpostodist", $relpostodist);
$smarty->assign("introduce", $introduce);

//echo CSSJS_ROOT;
//exit();
$smarty->display("chachong/chachong.html");