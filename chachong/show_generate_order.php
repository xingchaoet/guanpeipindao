<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/19
 * Time: 8:48
 */
include("../include/GuanCangSmarty.php");
require_once("../config.php");
require_once('../PHPExcel.php');
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");

$user_id = $_SESSION['user_id'];
$smarty = new GuanCangSmarty();
$smarty->MySmarty();

include("../include/introduce.php");

$ms = new con_mssql();

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

$relpostodist = '../';
$smarty->assign("relpostodist", $relpostodist);
$smarty->assign("need_op_batch_num", $need_op_batch_num);
$smarty->assign("need_op_batch_detail", $need_op_batch_detail);
//$order_list_for_generate_page = $smarty->display("chachong/order_list_for_generate.html");
//return $order_list_for_generate_page;
$smarty->display("chachong/show_generate_order.html");