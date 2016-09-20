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
include("db/con_mysql2.php");
include("db/dao.php");

include("class/Page.class.php");

session_start();

//echo $_REQUEST;
//
//echo 'test';

//echo $_REQUEST['page'];
//echo $_REQUEST['type'];
//echo $_REQUEST['show'];

if (empty($_REQUEST['type'])) {
    $_REQUEST['type'] = 'recommend';
}

if (empty($_REQUEST['show'])) {
    $_REQUEST['show'] = 'picture';
}

//exit();
$page_num = $_REQUEST['page'];
$smarty = new GuanCangSmarty();

$relpostodist = './';
$smarty->assign("relpostodist", $relpostodist);

$ms = new con_mssql();
$con_mysql2 = new con_mysql2();
$ms_tsfl4 = new con_mysql2();

//介绍文字
$sql = ser("bs_home_introduce", "introduce", "");

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
$smarty->assign("introduce", $introduce);


$show_num_per_page = 21; //一页显示的数量

if ($_REQUEST['type'] == 'recommend') { //推荐

//    计算总数

//    $sql = "select count(*) as sum from v_ecs_book where bjtj != ''"; //写推荐条件

    $sql = "SELECT count(*) as sum FROM v_ecs_book WHERE bjtj IS NOT NULL";

    $recommendbooks_sum = $con_mysql2->sdb($sql);
    $data = mysqli_fetch_assoc($recommendbooks_sum);

    $tot = $data['sum'];
//
//    echo $tot;
//
//    exit();

    $page = new Page('more.php', $tot, $show_num_per_page, $_REQUEST['type'], $_REQUEST['show']);

    $search_content = "(case
         when jz1>0 then bid1
         when jz1=0 and jz3 is not null then bid3
         when jz1=0 and jz3 is null then bid1
       end )as book_id ,

     sm,isbn,zzh,kb,cbrq,

      (case
         when jz1>0 then dj1
         when jz1=0 and jz3 is not null then dj3
         when jz1=0 and jz3 is null then dj1
       end )as dj ,

       jz1,

       jz3,

       slt";

//    $search_TJ = "    ORDER BY cbrq DESC $page->limit";
//    $sql = ser("v_ecs_book", $search_content, $search_TJ);

    $sql = "select " . "$search_content" . "  from v_ecs_book WHERE bjtj IS NOT NULL $page->limit";


//    $sql = "SELECT * FROM v_ecs_book WHERE bjtj IS NOT NULL $page->limit";
    $recommendbooksObject = $con_mysql2->sdb($sql);
//    print_r($recommendbooksObject);
//
//    exit();

    while ($data = $recommendbooksObject->fetch_array(MYSQLI_ASSOC)) {

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
        $recommendbooks[] = $data;
    }
//    $recommendbooks = $recommendbooksObject->fetch_array(MYSQLI_ASSOC);
//    print_r($recommendbooks);
//
//    exit();
    $smarty->assign("type", "recommend");
    $smarty->assign("page_num", $page_num);
    $smarty->assign("sub_title", "重点推荐");
    $smarty->assign("page", $page);
    $smarty->assign("books", $recommendbooks);

} else {//新书

    $sql = "select count(*) as sum from v_ecs_book where cbrq > '2015-01-01'";// 做个数量限制
    $newbooks_sum = $con_mysql2->sdb($sql);
    $data = mysqli_fetch_assoc($newbooks_sum);
    $tot = $data['sum'];

    $page = new Page('more.php', $tot, $show_num_per_page, $_REQUEST['type'], $_REQUEST['show']);
    $search_content = "(case
         when jz1>0 then bid1
         when jz1=0 and jz3 is not null then bid3
         when jz1=0 and jz3 is null then bid1
       end )as book_id ,

     sm,isbn,zzh,kb,cbrq,

      (case
         when jz1>0 then dj1
         when jz1=0 and jz3 is not null then dj3
         when jz1=0 and jz3 is null then dj1
       end )as dj ,

       jz1,

       jz3,

       slt";

//    $search_TJ = "    ORDER BY cbrq DESC $page->limit";
//    $sql = ser("v_ecs_book", $search_content, $search_TJ);

    $sql = "select " . "$search_content" . "  from v_ecs_book ORDER BY cbrq DESC $page->limit";

    $newbooksObject = $con_mysql2->sdb($sql);
//    print_r($recommendbooksObject);
//
//    exit();
    while ($data = $newbooksObject->fetch_array(MYSQLI_ASSOC)) {
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

