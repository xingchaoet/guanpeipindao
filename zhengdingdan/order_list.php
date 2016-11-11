<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/3
 * Time: 14:05
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once("../db/con_mssql.php");
include("../db/dao.php");
require_once("../config.php");
include("../include/GuanCangSmarty.php");
$order_list = array();
$uid = $_REQUEST['uid'];

$smarty = new GuanCangSmarty();
$smarty->MySmarty();
// 实例化SQLServer封装类
$ms = new con_mssql();
//$book_info = new con_mysql2();

$sql = ser("bs_zhengdingdan", "zdd_pc_id, zdd_time", "zdd_user_id='$uid' ORDER BY zdd_time desc");

$rs = $ms->sdb($sql);

if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(odbc_errormsg(), true));
}
while ($data = odbc_fetch_array($rs)) {
//    print_r($data);
    $order_list[] = $data;
}


$smarty->assign("order_list", $order_list);
//echo CSSJS_ROOT;
//exit();
$order_list_page = $smarty->display("zhengdingdan/order_list.html");

echo $order_list_page;
