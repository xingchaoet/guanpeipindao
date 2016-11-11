<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/10/11
 * Time: 15:03
 */

header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once("../db/con_mssql.php");
include("../db/dao.php");
require_once("../config.php");
include("../include/GuanCangSmarty.php");

session_start();

$order_list = array();

$uid = $_REQUEST['usrn'];

//echo $uid;

if (!empty($_REQUEST['sheet_no'])) {
    $sheet_no = $_REQUEST['sheet_no'];
    $_SESSION['sheet_no'] = $sheet_no;
} else {
    $sheet_no = $_SESSION['sheet_no'];
}

//print_r($_POST);
//exit();

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

// 实例化SQLServer封装类
$ms = new con_mssql();


$page_size = 10; //每页显示数量

$sql_info = ser(bs_yudingdan_mx, "count(*) as sum", "inputby='$uid' and sheet_no='$sheet_no' ");

//echo $sql_info;

$rs_info = $ms->sdb($sql_info);
$data = odbc_fetch_array($rs_info);

$rows = $data['sum'];

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

//    echo $page. '|'.$select_from. '|'.$select_limit. '|'. $page_count.'|'. $rows. '|'. $page_size. '|'. $next_page;
//    echo '////////////////////////';


    $pagenav .= "<a page = '1' showtype = 'ydd_detail' id = 'ydd_firstpage' onclick='ydd_firstpagesend()'>首页</a>&nbsp;&nbsp; ";
    $pagenav .= "<a page = $pre_page  showtype = 'ydd_detail' id = 'ydd_prepage' onclick='ydd_prepagesend()'>前一页</a>&nbsp;&nbsp; ";
    $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";
    $pagenav .= "<a page = $next_page showtype = 'ydd_detail' id = 'ydd_nextpage' onclick='ydd_nextpagesend()'>后一页</a>&nbsp;&nbsp; ";
    $pagenav .= "<a page = $page_count showtype = 'ydd_detail' id = 'ydd_lastpage' onclick='ydd_lastpagesend()'>末页</a>";
//    将  放到id = 'jumptopage' 之前 ，当$show_type为undefined时，会成为showtype =''id = 'jumptopage' 这种格式
//    使得函数jumptopagesend()找不到id为jumptopage的元素，取不到该元素的page值,使得page的值也是undefined
    $pagenav .= "　跳到<select name='topage' id = 'ydd_jumptopage' size='1' onchange='ydd_jumptopagesend()'  showtype = 'ydd_detail' >\n";
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

$sql = "select top ($select_limit) amount,book_name, isbn,writer,kb, CONVERT(varchar(10),publish_date,120)
as publish_date ,price,book_id from bs_yudingdan_mx
 where (inputby = '$uid' and sheet_no = '$sheet_no' ) and  id not in
 (select top ($select_from) id from bs_yudingdan_mx where (inputby = '$uid' and sheet_no = '$sheet_no' ) )  ORDER BY uptime  ";

//$sql = "SELECT rows, amount,book_name, isbn,writer,kb, CONVERT(varchar(10),publish_date,120) as publish_date ,price
//FROM (SELECT amount,book_name, isbn,writer,kb,publish_date, price ,rows,
//ROW_NUMBER() OVER (ORDER BY rows) AS RowNumber
//FROM bs_yudingdan_mx WHERE (inputby = '$uid' and sheet_no = '$sheet_no' )) a
//WHERE RowNumber > $select_from AND RowNumber <= ($select_from + $page_size)
//ORDER BY a.rows DESC";
//$sql = ser("bs_yudingdan", "ydd_pc_id,ydd_detail, ydd_time", "ydd_user_id='$uid' ORDER BY ydd_time desc limit $select_from $select_limit");

//echo $sql;

$rs = $ms->sdb($sql);

if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(odbc_errormsg(), true));
}
while ($data = odbc_fetch_array($rs)) {
//    print_r($data);
    $ydd_order_detail[] = $data;
}


for ($i = 0; $i < count($ydd_order_detail); $i++) {

    $ydd_order_detail[$i]['book_name'] = iconv('GBK', 'UTF-8', $ydd_order_detail[$i]['book_name']);

    $ydd_order_detail[$i]['writer'] = iconv('GBK', 'UTF-8', $ydd_order_detail[$i]['writer']);

    $ydd_order_detail[$i]['kb'] = iconv('GBK', 'UTF-8', $ydd_order_detail[$i]['kb']);

    $isbn = $ydd_order_detail[$i]['isbn'];

    $book_id = $ydd_order_detail[$i]['book_id'];

    $sql = ser("ecs_book", "kc", "book_id = '$book_id' AND jz=1");

    $books_temp1 = $ms->sdb($sql);

    if (!$books_temp1) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }

    while ($data1 = odbc_fetch_array($books_temp1)) {
        $books1[] = $data1;
    }

    $kc1 = $books1[0]['kc'];


    $sql = ser("ecs_book", "kc", "book_id = '$book_id' AND jz=3");

    $books_temp3 = $ms->sdb($sql);

    if (!$books_temp3) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }

    while ($data3 = odbc_fetch_array($books_temp3)) {
        $books3[] = $data3;
    }

    $kc3 = $books3[0]['kc'];


//    echo '(';
//
//    print_r($kc1);
//
//    echo '|';
//
//    print_r($kc3);
//
//    echo ')';


    if ($kc1 > 0) {
        $ydd_order_detail[$i]['kc'] = '纸本可供';
    } else {

        if (is_numeric($kc3) && ($kc3 >= 0)) {
            $ydd_order_detail[$i]['kc'] = 'POD可供';
        } else if (is_null($kc3)) {
            $ydd_order_detail[$i]['kc'] = '可预订';
        }
    }
//    $sql = ser("v_ecs_book", "jz1,jz3", "isbn = '$isbn'");
//
//    $books_temp =  $con_mysql2->sdb($sql);
//
//    while ($data2 = mysqli_fetch_array($books_temp,MYSQLI_ASSOC)) {
//        $books[] = $data2;
//    }
//
//    if ($books[0]['jz1'] > 0) {
//        $ydd_order_detail[$i]['kc'] = '纸本可供';
//    } else {
//
//        if (is_numeric($books[0]['jz3']) && ($books[0]['jz3'] >= 0)) {
//            $ydd_order_detail[$i]['kc'] = 'POD可供';
//        } else if (is_null($books[0]['jz3'])) {
//            $ydd_order_detail[$i]['kc'] = '可预订';
//        }
//    }

}

//print_r($ydd_order_detail);

$relpostodist = '../';

$smarty->assign("relpostodist", $relpostodist);

$smarty->assign("ydd_order_detail", $ydd_order_detail);

$smarty->assign("pagenav", $pagenav);

//$page 有值说明是ajax请求
//    echo 'test';
$page_info = $smarty->display("zhengdingdan/yudingdan_detail.html");
return $page_info;


