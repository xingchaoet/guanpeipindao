<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/24
 * Time: 23:22
 */
include("include/GuanCangSmarty.php");
require_once("config.php");
include("db/con_mssql.php");
include("db/dao.php");

include("class/Page.class.php");

session_start();

$smarty = new GuanCangSmarty();
include("include/introduce.php");

$uid = $_SESSION['user_id'];

if (empty($_REQUEST['type'])) {
    $_REQUEST['type'] = 'recommend';
}

if (empty($_REQUEST['show'])) {
    $_REQUEST['show'] = 'picture';
}

$page_num = $_REQUEST['page'];


//echo "/////////////////////////////////";
//print_r(empty($page_num));

if (empty($page_num)) {
    $_SESSION['first_search_two_types'] = true;
}

$smarty->assign("first_search_two_types", $first_search_two_types);

if (!empty($_SESSION['default_num_two_types'])) {
    $default_num_two_types = $_SESSION['default_num_two_types'];
} else {
    $_SESSION['default_num_two_types'] = 2;
//    $default_num_two_types = 2;
}

$date_low = '2015-03';
$search_TJ = "cbrq1 >= '$date_low'";

$relpostodist = './';
$smarty->assign("relpostodist", $relpostodist);

//$ms = new con_mssql();


$tot = '0';

//未处理批次

$sql_batch = ser("bs_temp_dingdan_pici", "*", "User_Id = '$uid' AND State = '0'");
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

$show_num_per_page = 21; //一页显示的数量

if ($_REQUEST['type'] == 'recommend') { //推荐

//    计算总数

//    $sql = "select count(*) as sum from v_ecs_book where bjtj != ''"; //写推荐条件

    $sql = "SELECT count(*) as sum FROM v_ecs_book where " . $search_TJ;
//    $sql = "SELECT count(*) as sum FROM ecs_book WHERE bjtj IS NOT NULL";

//    $recommendbooks_sum = $con_mysql2->sdb($sql);
//    $data = mysqli_fetch_assoc($recommendbooks_sum);

    $recommendbooks_sum_rs = $ms->sdb($sql);

    if (odbc_fetch_row($recommendbooks_sum_rs)) {
        $tot = odbc_result($recommendbooks_sum_rs, "sum");
    }
//    $tot = $data['sum'];
//

    $page = new Page('more.php', $tot, $show_num_per_page, $_REQUEST['type'], $_REQUEST['show']);

//    mysql
//    $search_content = "(case
//         when jz1>0 then bid1
//         when jz1=0 and jz3 is not null then bid3
//         when jz1=0 and jz3 is null then bid1
//       end )as book_id ,
//
//     sm,isbn,zzh,kb,cbrq,
//
//      (case
//         when jz1>0 then dj1
//         when jz1=0 and jz3 is not null then dj3
//         when jz1=0 and jz3 is null then dj1
//       end )as dj ,
//
//       jz1,
//
//       jz3,
//
//       slt";
//
////    $search_TJ = "    ORDER BY cbrq DESC $page->limit";
////    $sql = ser("v_ecs_book", $search_content, $search_TJ);
//
//    $sql = "select " . "$search_content" . "  from v_ecs_book  $page->limit";
////    $sql = "select " . "$search_content" . "  from ecs_book WHERE bjtj IS NOT NULL $page->limit";


//    $sql = "SELECT * FROM v_ecs_book WHERE bjtj IS NOT NULL $page->limit";
//    $recommendbooksObject = $con_mysql2->sdb($sql);
//    print_r($recommendbooksObject);
//
//    exit();
//    while ($data = $recommendbooksObject->fetch_array(MYSQLI_ASSOC)) {

//    (case
//         when jz1>0 then bid1
//         when (jz1=0 or jz1 is null) and jz3 is not null then bid3
//         when (jz1=0 or jz1 is null) and jz3 is null then bid1
//       end )as book_id ,
    $search_content = "
    
     bid1 as book_id ,

     sm,isbn,zzh,kb,

      (case
         when jz1>0 then cbrq1
         when (jz1=0 or jz1 is null) and jz3 is not null then cbrq3
         when (jz1=0 or jz1 is null) and jz3 is null then cbrq1
       end )as cbrq ,
       
      (case
         when jz1>0 then dj1
         when (jz1=0 or jz1 is null) and jz3 is not null then dj3
         when (jz1=0 or jz1 is null) and jz3 is null then dj1
       end )as dj ,

       jz1,

       jz3,

       slt";

    $sql_tsfl30 = "select rows,bid1 from v_ecs_book where " . $search_TJ . "ORDER BY rows ";

    $AdminResult = $ms->sdb($sql_tsfl30);
//    $rows = odbc_num_rows($AdminResult);
//    $_SESSION['rows'] = $rows;

    if (!$AdminResult) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
//存入session,供bs_temp_dingdan使用

    while ($data = odbc_fetch_array($AdminResult)) {
        $temp_table_bids[] = $data['bid1'];
    }

    $_SESSION['temp_table_two_types'] = $temp_table_bids;


    $sql_tsfl3 = "SELECT rows, book_id,sm,isbn,zzh,kb,cbrq,dj,jz1,jz3,slt
FROM (SELECT $search_content,rows,
ROW_NUMBER() OVER (ORDER BY rows) AS RowNumber
FROM v_ecs_book where " . $search_TJ . ") a
WHERE RowNumber > $page->offset AND RowNumber <= ($page->offset + $page->length) AND 
 cbrq > '$date_low'
ORDER BY a.rows ASC";

//    echo "$sql_tsfl3";
//
//    exit();

//    $sql_tsfl3 = "SELECT top $page->length * from v_ecs_book";

    $rs_tsfl3 = $ms->sdb($sql_tsfl3);

    if (!$rs_tsfl3) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }

    while ($data = odbc_fetch_array($rs_tsfl3)) {


        $data['sm'] = iconv('gbk', 'utf-8//IGNORE', $data['sm']);
        $data['zzh'] = iconv('gbk', 'utf-8//IGNORE', $data['zzh']);

        $isbn = $data['isbn'];
        if ($data['jz1'] > 0) {
            $data['kucun'] = "纸本可供";
        } else {

            if (is_numeric($data['jz3']) && ($data['jz3'] >= 0)) {
                $data['kucun'] = "POD可供";
            } else if (is_null($data['jz3'])) {
                $data['kucun'] = "可预订";
            }
        }

//        $sql = ser("bs_zhengdingdan_mx", "count(*) as yi_ding","isbn = $isbn AND inputby = $uid");
        $sql = "SELECT count(*) as yi_ding FROM bs_zhengdingdan_mx WHERE isbn = '$isbn' AND inputby = '$uid' ";
        $rs = $ms->sdb($sql);
        if (!$rs) {
            echo "Error in query preparation/execution.<br />";
            die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
        }
        if (odbc_fetch_row($rs)) {
            $yi_ding = odbc_result($rs, "yi_ding");
        }
        if ($yi_ding) {
            $data['yi_ding'] = "已定";
        } else {
            $data['yi_ding'] = "未定";
        }


        $recommendbooks[] = $data;
    }
//    $recommendbooks = $recommendbooksObject->fetch_array(MYSQLI_ASSOC);

    $smarty->assign("type", "recommend");
    $smarty->assign("page_num", $page_num);
    $smarty->assign("sub_title", "重点推荐");
    $smarty->assign("page", $page);
    $smarty->assign("books", $recommendbooks);

} else {//新书

    $sql = "select count(*) as sum from v_ecs_book where " . $search_TJ;// 做个数量限制
//    $sql = "select count(*) as sum from ecs_book where cbrq > '2015-01-01'";// 做个数量限制

//    $newbooks_sum = $con_mysql2->sdb($sql);
//    $data = mysqli_fetch_assoc($newbooks_sum);
//    $tot = $data['sum'];

    $newbooks_sum_rs = $ms->sdb($sql);

    if (odbc_fetch_row($newbooks_sum_rs)) {
        $tot = odbc_result($newbooks_sum_rs, "sum");
    }

    $page = new Page('more.php', $tot, $show_num_per_page, $_REQUEST['type'], $_REQUEST['show']);


    $sql_tsfl30 = "select rows,bid1 from v_ecs_book where " . $search_TJ . "ORDER BY rows ";

    $AdminResult = $ms->sdb($sql_tsfl30);
//    $rows = odbc_num_rows($AdminResult);
//    $_SESSION['rows'] = $rows;

    if (!$AdminResult) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
//存入session,供bs_temp_dingdan使用

    while ($data = odbc_fetch_array($AdminResult)) {
        $temp_table_bids[] = $data['bid1'];
    }

    $_SESSION['temp_table_two_types'] = $temp_table_bids;

//    (case
//         when jz1>0 then bid1
//         when (jz1=0 or jz1 is null) and jz3 is not null then bid3
//         when (jz1=0 or jz1 is null) and jz3 is null then bid1
//       end )as book_id ,
    $search_content = "
    
     bid1 as book_id ,

     sm,isbn,zzh,kb,

      (case
         when jz1>0 then cbrq1
         when (jz1=0 or jz1 is null) and jz3 is not null then cbrq3
         when (jz1=0 or jz1 is null) and jz3 is null then cbrq1
       end )as cbrq ,
       
      (case
         when jz1>0 then dj1
         when (jz1=0 or jz1 is null) and jz3 is not null then dj3
         when (jz1=0 or jz1 is null) and jz3 is null then dj1
       end )as dj ,

       jz1,

       jz3,

       slt";

    $sql_tsfl3 = "SELECT rows, book_id,sm,isbn,zzh,kb,cbrq,dj,jz1,jz3,slt
FROM (SELECT $search_content,rows,
ROW_NUMBER() OVER (ORDER BY rows) AS RowNumber
FROM v_ecs_book where " . $search_TJ . ") a
WHERE RowNumber > $page->offset AND RowNumber <= ($page->offset + $page->length) AND 
 cbrq > '$date_low'
ORDER BY a.rows ASC";
//    $sql_tsfl3 = "SELECT rows, book_id,sm,isbn,zzh,kb,cbrq,dj,jz1,jz3,slt
//FROM (SELECT $search_content,rows,
//ROW_NUMBER() OVER (ORDER BY rows) AS RowNumber
//FROM v_ecs_book) a
//WHERE RowNumber > $page->offset AND RowNumber <= ($page->offset + $page->length)
//ORDER BY a.rows DESC";

    $rs_tsfl3 = $ms->sdb($sql_tsfl3);

    if (!$rs_tsfl3) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }

    while ($data = odbc_fetch_array($rs_tsfl3)) {

        $data['sm'] = iconv('gbk', 'utf-8//IGNORE', $data['sm']);
        $data['zzh'] = iconv('gbk', 'utf-8//IGNORE', $data['zzh']);

        $isbn = $data['isbn'];

        if ($data['jz1'] > 0) {
            $data['kucun'] = "纸本可供";
        } else {

            if (is_numeric($data['jz3']) && ($data['jz3'] >= 0)) {
                $data['kucun'] = "POD可供";
            } else if (is_null($data['jz3'])) {
                $data['kucun'] = "可预订";
            }
        }


//        $sql = ser("bs_zhengdingdan_mx", "count(*) as yi_ding","isbn = $isbn AND inputby = $uid");
        $sql = "SELECT count(*) as yi_ding FROM bs_zhengdingdan_mx WHERE isbn = '$isbn' AND inputby = '$uid' ";

        $rs = $ms->sdb($sql);
        if (!$rs) {
            echo "Error in query preparation/execution.<br />";
            die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
        }
        if (odbc_fetch_row($rs)) {
            $yi_ding = odbc_result($rs, "yi_ding");
        }
        if ($yi_ding) {
            $data['yi_ding'] = "已定";
        } else {
            $data['yi_ding'] = "未定";
        }

        $newbooks[] = $data;
    }

    $smarty->assign("type", "new");
    $smarty->assign("page_num", $page_num);
    $smarty->assign("sub_title", "最近新书");
    $smarty->assign("page", $page);
    $smarty->assign("books", $newbooks);
}

if ($_REQUEST['show'] == 'list') {//列表显示

//    if ($_REQUEST['page']) {
    $page_info = $smarty->display("morebooks_list.html");
    return $page_info;
//    }
//    else {
//        $smarty->display("morebooks.html");
//    }
//    $smarty->display("morelist.html");

} else {//图像显示

    if ($_REQUEST['page'] || $_REQUEST['toggle'] == 'picture') {
        $page_info = $smarty->display("morebooks_picture.html");
        return $page_info;
    } else {
        $smarty->display("morebooks.html");
    }
//    $smarty->display("more.html");


}

