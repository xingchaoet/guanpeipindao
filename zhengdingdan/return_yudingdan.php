<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/17
 * Time: 14:08
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once("../db/con_mssql.php");
include("../db/dao.php");
require_once("../config.php");
include("../include/GuanCangSmarty.php");
include ("auth_zhengdingdan.php");

//session_start();
$order_list = array();

$uid = $_REQUEST['usrn'];

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

// 实例化SQLServer封装类
$ms = new con_mssql();

$page_size = 10; //每页显示数量

//查询预订单
$sql = ser("bs_yudingdan", "ydd_pc_id,ydd_detail, ydd_time", "ydd_user_id='$uid' ORDER BY ydd_time desc");

$rs = $ms->sdb($sql);

if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(odbc_errormsg(), true));
}
while ($data = odbc_fetch_array($rs)) {
//    print_r($data);
    $ydd_order_list[] = $data;
}

$count_ydd_order_list = count($ydd_order_list);

for ($i = 0; $i < $count_ydd_order_list; $i++) {
//    echo $zdd_order_list[$i]['zdd_detail'];
    $ydd_pc_id = $ydd_order_list[$i]['ydd_pc_id'];

    $sql_info = ser(bs_yudingdan_mx, "count(*) as sum", "sheet_no='$ydd_pc_id' ");

    $rs_info = $ms->sdb($sql_info);

    $data = odbc_fetch_array($rs_info);

    $ydd_order_list[$i]['ydd_sum'] = $data['sum'];

}

//print_r($ydd_order_list);

$relpostodist = '../';


$ydd_times = 1; //防止多次绑定函数
$smarty->assign("ydd_times", $ydd_times);

$smarty->assign("relpostodist", $relpostodist);

//$smarty->assign("pagenav", $pagenav);

$smarty->assign("ydd_order_list", $ydd_order_list);
//$page 有值说明是ajax请求
//if (isset($_REQUEST["page"])) {
//    echo 'test';
$page_info = $smarty->display("zhengdingdan/return_yudingdan.html");
return $page_info;
//} else {
//    $smarty->display("zhengdingdan/orders_view.html");
//}
