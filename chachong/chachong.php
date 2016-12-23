<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 8:02
 */

include("../include/GuanCangSmarty.php");
require("../config.php");
require_once('../PHPExcel.php');
require("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");

$user_id = $_SESSION['user_id'];
$smarty = new GuanCangSmarty();
$smarty->MySmarty();

include("../include/introduce.php");

//$smarty->php_handling = SMARTY::PHP_ALLOW;
// 实例化SQLServer封装类
//$ms = new con_mssql();

// print_r($smarty->getTemplateDir());
//未处理批次

$sql_batch = ser("bs_temp_dingdan_pici", "*","User_Id = '$user_id' AND State = '0'");
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

$smarty->assign("need_op_batch_num", $need_op_batch_num);
$smarty->assign("need_op_batch_detail", $need_op_batch_detail);

$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='chachong.php'>在线订购</a>");
$smarty->assign("relpostodist", $relpostodist);

//echo CSSJS_ROOT;
$smarty->display("chachong/chachong.html");