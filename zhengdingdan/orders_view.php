<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/8
 * Time: 8:06
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
$user_type = $_SESSION['user_type'];

//$uid = $_REQUEST['usrn'];
$global_url = GLOBAL_URL;

$uid = $_SESSION['user_id'];
if (empty($uid)) {
    echo "<script type='text/javascript'>alert('您还没登录!');</script>";
    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/user/login.php';</script>";
}
//
//if($_SESSION['user_type'] == "gps_user"){
//    echo "<script type='text/javascript'>alert('请经销商用户到“数据下载”栏目查询下载数据！');</script>";
//    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/guanpeipindao.php';</script>";
//}


//print_r($_POST);

//exit();

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

// 实例化SQLServer封装类
$ms = new con_mssql();

//介绍文字
$sql = ser("bs_home_introduce", "introduce","");

$rs = $ms->sdb($sql);
if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
}
if (odbc_fetch_row($rs)) {
    $introduce = odbc_result($rs, "introduce");
}

$introduce = iconv('gbk', 'utf-8//IGNORE', $introduce);
$smarty->assign("introduce", $introduce);

$page_size = 10; //每页显示数量

$sql_info = ser(bs_zhengdingdan, "count(*) as sum", "zdd_user_id='$uid'");

$rs_info = $ms->sdb($sql_info);
$data = odbc_fetch_array($rs_info);

$rows = $data['sum'];

if ($rows) {
    //查询征订单
// Page分页函数
    $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1;

    function Page($rows, $page_size)
    {
        global $page, $select_from, $select_limit, $pagenav;


        $page_count = ceil($rows / $page_size);

//    echo $page. '|'.$select_from. '|'.$select_limit. '|'. $page_count.'|'. $rows. '|'. $page_size;
//    echo '////////////////////////';

        if ($page <= 1 || $page == '') $page = 1;
        if ($page >= $page_count) $page = $page_count;
        $select_limit = $page_size;
        $select_from = ($page - 1) * $page_size;
        $pre_page = ($page == 1) ? 1 : $page - 1;
        $next_page = ($page == $page_count) ? $page_count : $page + 1;

//    echo $page. '|'.$select_from. '|'.$select_limit. '|'. $page_count.'|'. $rows. '|'. $page_size;
//    echo '////////////////////////';


        $pagenav .= "<a page = '1'  id = 'firstpage' onclick='firstpagesend()'>首页</a>&nbsp;&nbsp; ";
        $pagenav .= "<a page = $pre_page  id = 'prepage' onclick='prepagesend()'>前一页</a>&nbsp;&nbsp; ";
        $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";
        $pagenav .= "<a page = $next_page  id = 'nextpage' onclick='nextpagesend()'>后一页</a>&nbsp;&nbsp; ";
        $pagenav .= "<a page = $page_count  id = 'lastpage' onclick='lastpagesend()'>末页</a>";
//    将  放到id = 'jumptopage' 之前 ，当$show_type为undefined时，会成为showtype =''id = 'jumptopage' 这种格式
//    使得函数jumptopagesend()找不到id为jumptopage的元素，取不到该元素的page值,使得page的值也是undefined
        $pagenav .= "　跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'   >\n";
        for ($i = 1; $i <= $page_count; $i++) {
            if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
            else $pagenav .= "<option value='$i'>$i</option>\n";
        }
    }

// Page分页函数
// 使用示例
// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航

//if (isset($rows) and $rows > 0) {


//echo "当前记录数2：".$rows;
//echo "当前查询条件2：".$search_TJ;
    Page($rows, $page_size);

    $sql = "select top ($select_limit) zdd_pc_id,zdd_detail, zdd_time from bs_zhengdingdan
 where zdd_id not in (select top ($select_from) zdd_id from bs_zhengdingdan where zdd_user_id = '$uid' ) and zdd_user_id = '$uid' ";

//$sql = ser("bs_zhengdingdan", "zdd_pc_id,zdd_detail, zdd_time", "zdd_user_id='$uid' ORDER BY zdd_time desc limit $select_from $select_limit");

//echo $sql;

    $rs = $ms->sdb($sql);

    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    while ($data = odbc_fetch_array($rs)) {
//    print_r($data);
        $zdd_order_list[] = $data;
    }

    for ($i = 0; $i < count($zdd_order_list); $i++) {
//    echo $zdd_order_list[$i]['zdd_detail'];
        $zdd_pc_id = $zdd_order_list[$i]['zdd_pc_id'];

        $sql_info = ser(bs_zhengdingdan_mx, "count(*) as sum", "sheet_no='$zdd_pc_id' ");

        $rs_info = $ms->sdb($sql_info);

        $data = odbc_fetch_array($rs_info);

        $zdd_order_list[$i]['zdd_sum'] = $data['sum'];

    }

//print_r($zdd_order_list);

//}
}


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

for ($i = 0; $i < count($ydd_order_list); $i++) {
//    echo $zdd_order_list[$i]['zdd_detail'];
    $ydd_pc_id = $ydd_order_list[$i]['ydd_pc_id'];

    $sql_info = ser(bs_yudingdan_mx, "count(*) as sum", "sheet_no='$ydd_pc_id' ");

    $rs_info = $ms->sdb($sql_info);

    $data = odbc_fetch_array($rs_info);

    $ydd_order_list[$i]['ydd_sum'] = $data['sum'];

}

$relpostodist = '../';

$ydd_times = 1; //防止多次绑定函数
$smarty->assign("ydd_times", $ydd_times);

$zdd_times = 1; //防止多次绑定函数
$smarty->assign("zdd_times", $zdd_times);


//print_r($ydd_order_list);
//guanpeipindao.php与dist的相对此处位置相同
$smarty->assign("first_level", "<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level", "<a href=orders_view.php?usrn=$uid>会员空间</a>");

$smarty->assign("relpostodist", $relpostodist);

$smarty->assign("pagenav", $pagenav);

$smarty->assign("zdd_order_list", $zdd_order_list);
$smarty->assign("ydd_order_list", $ydd_order_list);
$smarty->assign("user_type", $user_type);

//$page 有值说明是ajax请求
if (isset($_REQUEST["page"])) {
//    echo 'test';
    $page_info = $smarty->display("zhengdingdan/zhengdingdan.html");
    return $page_info;
} else {
    $smarty->display("zhengdingdan/orders_view.html");
}


