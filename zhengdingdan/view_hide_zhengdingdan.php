<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2017/1/6
 * Time: 15:07
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once("../db/con_mssql.php");
include("../db/dao.php");
require_once("../config.php");
include("../include/GuanCangSmarty.php");
include("auth_zhengdingdan.php");

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

$ms = new con_mssql();

$page_size = 10; //每页显示数量

$sql_info = ser(bs_zhengdingdan, "count(*) as sum", "zdd_user_id='$uid' AND zdd_is_hide = '1'");
//echo $sql_info;
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

        $pagenav .= "<span style='opacity: 1'>";
        $pagenav .= "<a page = '1'  id = 'firstpage' showtype = 'view_hide' onclick='firstpagesend()'>首页</a>&nbsp;&nbsp; ";
        $pagenav .= "<a page = $pre_page  id = 'prepage' showtype = 'view_hide' onclick='prepagesend()'>前一页</a>&nbsp;&nbsp; ";
        $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";
        $pagenav .= "<a page = $next_page  id = 'nextpage' showtype = 'view_hide' onclick='nextpagesend()'>后一页</a>&nbsp;&nbsp; ";
        $pagenav .= "<a page = $page_count  id = 'lastpage' showtype = 'view_hide' onclick='lastpagesend()'>末页</a>";
//    将  放到id = 'jumptopage' 之前 ，当$show_type为undefined时，会成为showtype =''id = 'jumptopage' 这种格式
//    使得函数jumptopagesend()找不到id为jumptopage的元素，取不到该元素的page值,使得page的值也是undefined
        $pagenav .= "　跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  showtype = 'view_hide'  >\n";
        for ($i = 1; $i <= $page_count; $i++) {
            if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
            else $pagenav .= "<option value='$i'>$i</option>\n";
        }


        $pagenav .= "</span>";

    }

// Page分页函数
// 使用示例
// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航

//if (isset($rows) and $rows > 0) {


//echo "当前记录数2：".$rows;
//echo "当前查询条件2：".$search_TJ;
    Page($rows, $page_size);

    $sql = "select top ($select_limit) zdd_pc_id,zdd_detail, zdd_time from bs_zhengdingdan
 where zdd_id not in (select top ($select_from) zdd_id from bs_zhengdingdan where zdd_user_id = '$uid' AND zdd_is_hide = '1' ) and zdd_user_id = '$uid' AND zdd_is_hide = '1'
ORDER BY zdd_time DESC";

//$sql = ser("bs_zhengdingdan", "zdd_pc_id,zdd_detail, zdd_time", "zdd_user_id='$uid' ORDER BY zdd_time desc limit $select_from $select_limit");

    $rs = $ms->sdb($sql);

    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    while ($data = odbc_fetch_array($rs)) {
        $zdd_order_list[] = $data;
    }

    $count_zdd_order_list = count($zdd_order_list);

    for ($i = 0; $i < $count_zdd_order_list; $i++) {

        $zdd_pc_id = $zdd_order_list[$i]['zdd_pc_id'];

        $sql_info = ser(bs_zhengdingdan_mx, "count(*) as sum", "sheet_no='$zdd_pc_id' ");

        $rs_info = $ms->sdb($sql_info);

        $data = odbc_fetch_array($rs_info);

        $zdd_order_list[$i]['zdd_sum'] = $data['sum'];

    }

}


$smarty->assign("zdd_times", $zdd_times);
$smarty->assign("pagenav", $pagenav);

$smarty->assign("zdd_order_list", $zdd_order_list);
//模板不变
$page_info = $smarty->display("zhengdingdan/view_hide_zhengdingdan.html");
return $page_info;


