<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 9:51
 */

include("include/GuanCangSmarty.php");
require_once("config.php");
//include("db/con_mysql2.php");
require_once("db/con_mssql.php");
include("db/dao.php");
include("auth.php");


$smarty = new GuanCangSmarty();
$smarty->MySmarty();

$show_type = $_REQUEST["show_type"];
$book_ids = $_REQUEST["book_ids"];
$book_nums = $_REQUEST["book_nums"];
$first_search = $_REQUEST["first_search"];
//重置进度
//unset($_SESSION['progress']);
if (!empty($_SESSION['default_num'])) {
    $default_num = $_SESSION['default_num'];
} else {
    $default_num = 2;
}

$manipulate_session = $_REQUEST["manipulate_session"];
//unset($_REQUEST["manipulate_session"]);

//新批次
if ($manipulate_session == "manipulate_session") {
    echo "<script type='text/javascript'>alert('manipulate_session!');</script>";
    $_SESSION['start_purchase'] = false;
//    print_r($manipulate_session);

}


$origin_page = $_REQUEST["page"];

$usrid = $_REQUEST["usrn"];
//$lib_no = "";
//$xm = "";
$guancangisbns = array();
$TJaddon = "";
$temp_table_bids = array();

//echo $show_type;
//
//exit();

$tsfl_data3_array = array();
$ms = new con_mssql();


//无有选中书籍信息并且不是从分页过来，创建临时表
//if (empty($book_ids) && empty($origin_page)) {
//
//    $temp_table_name = 'temp_' . $usrid . '_' . date('YmdHis', time());
//
//    $_SESSION['temp_table_name'] = $temp_table_name;
//
//    $sql_create_temp_table = "
//    CREATE TABLE [dbo]." . $temp_table_name . " (
//    Id int IDENTITY(1, 1) PRIMARY KEY  NOT NULL,
//    BookId varchar(50) NULL,
//    IsChecked varchar(10) NULL
//    );
//
//    ALTER TABLE [dbo]." . $temp_table_name . " SET (LOCK_ESCALATION = TABLE);
//    ";
//
//    $rs_create_temp_table = $ms->sdb($sql_create_temp_table);
//
//    if (!$rs_create_temp_table) {
//        echo "Error in query preparation/execution.<br />";
//        die(print_r(odbc_errormsg(), true));
//    }
//}
//echo $sql_create_temp_table;

//exit();

//if (isset($_REQUEST['submit_cc'])) {
//if (1)
//{

//注释1---接收cc_index.php通过post传递出的参数，分别存储入变量-----------
//sqlsever iconv('utf-8', 'gbk//IGNORE', $introduce)

//首次搜索
if (!empty($first_search)) {

    $bname = iconv('utf-8', 'gbk//IGNORE', $_REQUEST["bname"]);
    $isbn = $_REQUEST["isbn"];
    $csbname = iconv('utf-8', 'gbk//IGNORE', $_REQUEST["csbname"]);
    $writer = iconv('utf-8', 'gbk//IGNORE', $_REQUEST["writer"]);
    $keyword = iconv('utf-8', 'gbk//IGNORE', $_REQUEST["keyword"]);
    $price_low = $_REQUEST["price_low"];
    $price_high = $_REQUEST["price_high"];
    $sjdate_low = $_REQUEST["sjdate_low"];
    $sjdate_high = $_REQUEST["sjdate_high"];
    $cbdate_low = $_REQUEST["cbdate_low"];
    $cbdate_high = $_REQUEST["cbdate_high"];
    $zyfl_value = $_REQUEST["zyfl_id_sel"];
    $skfl_value = $_REQUEST["ztfl_sk_id_sel"];
    $zkfl_value = $_REQUEST["ztfl_zk_id_sel"];
    $media = $_REQUEST["media"];

//mysql
//$bname = $_REQUEST["bname"];
//$isbn = $_REQUEST["isbn"];
//$csbname = $_REQUEST["csbname"];
//$writer = $_REQUEST["writer"];
//$keyword = $_REQUEST["keyword"];
//$price_low = $_REQUEST["price_low"];
//$price_high = $_REQUEST["price_high"];
//$sjdate_low = $_REQUEST["sjdate_low"];
//$sjdate_high = $_REQUEST["sjdate_high"];
//$cbdate_low = $_REQUEST["cbdate_low"];
//$cbdate_high = $_REQUEST["cbdate_high"];
//$zyfl_value = $_REQUEST["zyfl_id_sel"];
//$skfl_value = $_REQUEST["ztfl_sk_id_sel"];
//$zkfl_value = $_REQUEST["ztfl_zk_id_sel"];
//$media = $_REQUEST["media"];

//注释2---判断参数是否为空，如果为空，不作任何操作。如果有参数传出，则生成相应SQL语句。---------------------
    if ($bname != null) {
        $a = " and sm like '%" . trim($bname) . "%'";
    } else {
        $a = "";
    }
    if ($csbname != null) {
        $b = " and csm like '%$csbname%'";
    } else {
        $b = "";
    }
    if ($isbn != null) {
        $c = " and isbn like '%$isbn%'";
    } else {
        $c = "";
    }
    if ($writer != null) {
        $d = " and zzh like '%$writer%'";
    } else {
        $d = "";
    }
    if ($keyword != null) {
        $e = " and ztc like '%$keyword%'";
    } else {
        $e = "";
    }


//    先用dj1

    if ($price_low != null and $price_high != null) {
        $f = " and dj1 >= '$price_low' and  dj1 <= '$price_high'";
    } elseif ($price_low != null and $price_high = null) {
        $f = " and dj1 >= '$price_low' ";
    } elseif ($price_low = null and $price_high != null) {
        $f = " and dj1 <= '$price_high' ";
    } else {
        $f = "";
    }

    if ($sjdate_low != null and $sjdate_high != null) {
        $g = " and gxsj >= '$sjdate_low' and  gxsj <= '$sjdate_high'";
    } elseif ($sjdate_low != null and ($sjdate_high = null or $sjdate_high == "")) {
        $g = " and gxsj >= '$sjdate_low' ";
    } elseif (($sjdate_low = null or $sjdate_low == "") and $sjdate_high != null) {
        $g = " and gxsj <= '$sjdate_high' ";
    } else {
        $g = "";
    }

//    if ($cbdate_low != null and $cbdate_high != null) {
//        $h = " and cbrq >= '$cbdate_low' and  cbrq <= '$cbdate_high'";
//    } elseif ($cbdate_low != null and ($cbdate_high = null or $cbdate_high == "")) {
//        $h = " and cbrq >= '$cbdate_low' ";
//    } elseif (($cbdate_low = null or $cbdate_low == "") and $cbdate_high != null) {
//        $h = " and cbrq <= '$cbdate_high' ";
//    } else {
//        $h = "";
//    }

    if ($cbdate_low != null and $cbdate_high != null) {
        $h = " and cbrq1 >= '$cbdate_low' and  cbrq1 <= '$cbdate_high'";
    } elseif ($cbdate_low != null and ($cbdate_high = null or $cbdate_high == "")) {
        $h = " and cbrq1 >= '$cbdate_low' ";
    } elseif (($cbdate_low = null or $cbdate_low == "") and $cbdate_high != null) {
        $h = " and cbrq1 <= '$cbdate_high' ";
    } else {
        $h = "";
    }

//图书分类查询分类cat_ID条件生成
    if ($zyfl_value != null) {
        $i = "";
        $cat_id_array = explode(",", $zyfl_value);
        foreach ($cat_id_array as $id_value) {
            $i = $i . " or zyfl like '%.$id_value.%'";
        }
        $i = " and (" . substr($i, 3, strlen($i) - 3) . ")";
    } else {
        $i = "";
    }

//中图社科分类查询分类cat_ID条件生成
    if ($skfl_value != null) {

        $j = "";
        $cat_id_array = explode(",", $skfl_value);
        foreach ($cat_id_array as $id_value) {
            $j = $j . " or ztfl like '%.$id_value.%'";
        }
        $j = " and (" . substr($j, 3, strlen($j) - 3) . ")";
    } else {
        $j = "";
    }

//中图自科分类查询分类cat_ID条件生成
    if ($zkfl_value != null) {
        $k = "";
        $cat_id_array = explode(",", $zkfl_value);
        foreach ($cat_id_array as $id_value) {
            $k = $k . " or ztfl like '%.$id_value.%'";
        }
        $k = " and (" . substr($k, 3, strlen($k) - 3) . ")";
    } else {
        $k = "";
    }

    if ($media != null) {
        switch ($media) {
            case "全部":
                $l = "";
                break;
            case "纸质书": //jz1>0
                $l = " and jz1 > '0'";
                break;
            case "按需印刷": //jz1=0 and jz3 is not null
//                $l = " and jz = '2'";
                $l = " and (jz1 = '0' or jz1 is null)   and jz3 is not null";
                break;
        }

    } else {
        $l = "";
    }
//注释3---用追加的方法生成SQL语句--------
    $search_TJ = " (1=1)";
    $search_TJ .= $a;
    $search_TJ .= $b;
    $search_TJ .= $c;
    $search_TJ .= $d;
    $search_TJ .= $e;
    $search_TJ .= $f;
    $search_TJ .= $g;
    $search_TJ .= $h;
    $search_TJ .= $i;
    $search_TJ .= $j;
    $search_TJ .= $k;
    $search_TJ .= $l;
    if ($search_TJ == " (1=1)") {
        $search_TJ = " (1=0)";
    }

//$ms_tsfl30 = new con_mysql2();
//使用mssql

//从这里写查重条件


//    $sql = ser("lib_lxr_info", "xm,lib_no", "ID='$usrid'");
////    echo $un;
////    echo $sql;
//
//    $rs = $ms->sdb($sql);
//    if (!$rs) {
////        echo '这里出错了';
//        echo "Error in query preparation/execution.<br />";
//        die(print_r(odbc_errormsg(), true));
//    }
//    if (odbc_fetch_row($rs)) {
//        $lib_no = trim(odbc_result($rs, "lib_no"));
//        $xm = trim(odbc_result($rs, "xm"));
//
////        echo '图书馆代号';
////        echo $lib_no;
////        echo '用户id';
////        echo $rID;
////        echo '用户姓名';
////        echo $xm;
//    } else {
////        echo 'test';
//    }


//用用户的id判断
    $sql_info = ser(lib_gc_info, "isbn", "inputby='$usrid'");

//    $sql_info = "SELECT isbn FROM lib_gc_info WHERE isbn='$isbn'";
//        echo $sql_info;

    $rs_info = $ms->sdb($sql_info);
//    $data = odbc_fetch_array($rs_info);

    while ($data = odbc_fetch_array($rs_info)) {
        $guancangisbns[] = $data['isbn'];
    };

//    print_r($guancangisbns);


    for ($i = 0; $i < count($guancangisbns); $i++) {
        $TJaddon .= "    AND isbn != '" . $guancangisbns[$i] . "'";
    }

//$TJaddon .= "    AND LENGTH(isbn) >= 11 ";

    $TJaddon .= "    AND DATALENGTH(isbn) >= 10 ";

//    $TJaddon .=  "    AND jz !=  '2' "; //查询查重任何情况下都不出现电子书


    $search_TJ = $search_TJ . $TJaddon;

//print_r($search_TJ);

//    $sql_tsfl30 = ser("ecs_book", "book_id ", $search_TJ);
//得到总条数
//$sql_tsfl30 = ser("v_ecs_book", "count(*) as sum", $search_TJ);
//    $sql_tsfl30 = ser("ecs_book", "isbn", $search_TJ);

//    $sql_tsfl30 = "select bid1 from v_ecs_book where " . $search_TJ;

    $sql_tsfl30 = "select rows,bid1 from v_ecs_book where " . $search_TJ . "ORDER BY rows ";

//$sql_tsfl30 = "select bid1 from v_ecs_book  ";

//$sql_tsfl30 = "select count(*) as sum from v_ecs_book  " . " WHERE " . " $search_TJ";

//echo $sql_tsfl30.chr(13).chr(10)."------------";

//$ttt = "select bid1 from v_ecs_book where (1=1) ";
//echo $sql_tsfl30;
//$rows = '0';
//$rs_tsfl30 = $ms_tsfl30->sdb($sql_tsfl30);
//$ms00=new con_mssql();
    $AdminResult = $ms->sdb($sql_tsfl30);
    $rows = odbc_num_rows($AdminResult);
    $_SESSION['rows'] = $rows;


//$_SESSION['temp_table']  =  $AdminResult;

//print_r($temp_table_bids);

    if (!$AdminResult) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
//存入session,供bs_temp_dingdan使用

    while ($data = odbc_fetch_array($AdminResult)) {
//        $tsfl_data3_array[] = $data;
        $temp_table_bids[] = $data['bid1'];
    }

    $_SESSION['temp_table'] = $temp_table_bids;

    $_SESSION['search_TJ'] = $search_TJ;

} else {

    $search_TJ = $_SESSION['search_TJ'];

    $rows = $_SESSION['rows'];
}

//print_r($tsfl_data3_array);
//exit();
//print_r($data);
//$rows = $data['sum'];

//$rows = mysqli_num_rows($rs_tsfl30);
//echo "当前记录数：" . $rows;
//<span style='color:#ff6c77'> 保存采购结果中..........</span>
if ($_SESSION['start_purchase']) {
    echo "
          <div id='batch_option'>
               <input id='batch_option_create_radio' type=\"radio\" name=\"batch_option_radio\" value=\"创建新批次\" />创建新批次 
               <input id='batch_option_add_radio' type=\"radio\" name=\"batch_option_radio\" value=\"添加到原有批次\" />添加到原有批次 
          
               <span class='default_num_span'>默认数量</span> <input class='default_num_input' type='text'>
 
          </div>
          <div class='flow'> 
             <button id='manipulate_session_btn' class='btn btn-default btn-sm'  style='float: left' disabled='true'>开始采购</button> 
             
          </div>
          <div id='progressbar' style='float: left'><div></div></div>
  
          ";
} else {
    echo "
          <div id='batch_option'>
               <input id='batch_option_create_radio' type=\"radio\" name=\"batch_option_radio\" value=\"创建新批次\" />创建新批次 
               <input id='batch_option_add_radio' type=\"radio\" name=\"batch_option_radio\" value=\"添加到原有批次\" />添加到原有批次 
     
               <span class='default_num_span'>默认数量</span> <input class='default_num_input' type='text'>
     
          </div>
          <div class='flow'> 
                <button id='manipulate_session_btn' class='btn btn-default btn-sm' style='float: left'  onclick='manipulate_session();'>开始采购</button>  
          </div>
          <div id='progressbar' style='float: left;'><div></div></div>
          ";
}

//exit();


//有选中书籍信息，将临时表的选中书籍的IsChecked修改为订购数量，无，将结果中所有书籍写入临时表，IsChecked 默认为0
//if (!empty($book_ids)) { //选中了书籍
////        将当前页选中的书籍写入临时表
//
//    $book_id_s = explode(",", $book_ids);
//    $book_num_s = explode(",", $book_nums);
//    $temp_table_name = $_SESSION['temp_table_name'];
//    for ($i = 0 ; $i < count($book_id_s); $i ++) {
//        $book_id_temp = $book_id_s[$i];
//        $book_num_temp = $book_num_s[$i];
//
//        //更新
//        $sql_update_temp_table = "UPDATE [dbo]." . $temp_table_name . " SET  IsChecked = '$book_num_temp' WHERE BookId = '$book_id_temp' ";
//
//        echo $sql_update_temp_table;
//        $rs_sql_update_temp_table = $ms->sdb($sql_update_temp_table);
//
//        try {
//
//            if (!$rs_sql_update_temp_table) {
//
//                echo "Error in query preparation/execution.<br />";
////                die(print_r(odbc_errormsg(), true));
//
//                $error = "update $bid to $temp_table_name failed";
//
//                throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
//            }
//
//        } catch (Exception $e) {
//
//            echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
//
//        }
//
//
//    }
//
//} else if (empty($book_ids) && empty($origin_page)) { //不是从分页过来，也没选中书籍，就是直接的查询
//
//    while ($data = odbc_fetch_array($AdminResult)) {
////        $tsfl_data3_array[] = $data;
//        $bid = $data['bid1'];
////        IsChecked 默认为0
//        $sql_add_to_temp_table = "INSERT INTO [dbo]." . $temp_table_name . " (BookId, IsChecked) VALUES ('$bid', '0')";
//
//        $rs_sql_add_to_temp_table = $ms->sdb($sql_add_to_temp_table);
//
//        try {
//
//            if (!$rs_sql_add_to_temp_table) {
//
//                echo "Error in query preparation/execution.<br />";
////                die(print_r(odbc_errormsg(), true));
//
//                $error = "insert $bid to $temp_table_name failed";
//
//                throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
//            }
//
//        } catch (Exception $e) {
//
//            echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
//
//        }
//
//    }
//
//}

//session_start();
//$_SESSION['search_TJ'] = $search_TJ;  // 少了不出结果
//因为分页函数里用到了

//echo "当前查询条件11：".$search_TJ;
//}
//else {
//    $rows = isset($_REQUEST["rows"]) ? $_REQUEST["rows"] : 0;
//    //echo "当前记录数：".$rows;
//    //session_start();
//    $search_TJ = $_SESSION['search_TJ'];

//    print_r($search_TJ);
//    $_SESSION['search_TJ'] = $search_TJ;

//echo "当前查询条件12：".$search_TJ;
//}
/* require_once('page.php');
page($sql,'index.php');
echo $pagenav;	 */


// Page分页函数
//if isset($page){$page = $_GET["page"];} else { $page=0;}
//$page = $_GET["page"];


//$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1; //不要改动这行代码的位置

function Page($rows, $page_size, $show_type)
{
    global $page, $select_from, $select_limit, $pagenav;
    $page_count = ceil($rows / $page_size);
    if ($page <= 1 || $page == '') $page = 1;
    if ($page >= $page_count) $page = $page_count;
    $select_limit = $page_size;
//mssql 待查
    $select_from = ($page - 1) * $page_size;
//mysql 待查
//    $select_from = ($page - 1) * $page_size . ',';
    $pre_page = ($page == 1) ? 1 : $page - 1;
    $next_page = ($page == $page_count) ? $page_count : $page + 1;
//
//    $pagewhere = "&submit_cc=submit_cc";
//    @$_REQUEST["bname"] != '' ? $pagewhere .= "&bname=" . $_REQUEST["bname"] : '';
//    @$_REQUEST["isbn"] != '' ? $pagewhere .= "&isbn=" . $_REQUEST["isbn"] : '';
//    @$_REQUEST["csbname"] != '' ? $pagewhere .= "&csbname=" . $_REQUEST["csbname"] : '';
//    @$_REQUEST["writer"] != '' ? $pagewhere .= "&writer=" . $_REQUEST["writer"] : '';
//    @$_REQUEST["price_low"] != '' ? $pagewhere .= "&price_low=" . $_REQUEST["price_low"] : '';
//    @$_REQUEST["price_high"] != '' ? $pagewhere .= "&price_high=" . $_REQUEST["price_high"] : '';
//    @$_REQUEST["sjdate_low"] != '' ? $pagewhere .= "&sjdate_low=" . $_REQUEST["sjdate_low"] : '';
//    @$_REQUEST["sjdate_high"] != '' ? $pagewhere .= "&sjdate_high=" . $_REQUEST["sjdate_high"] : '';
//    @$_REQUEST["cbdate_low"] != '' ? $pagewhere .= "&cbdate_low=" . $_REQUEST["cbdate_low"] : '';
//    @$_REQUEST["cbdate_high"] != '' ? $pagewhere .= "&cbdate_high=" . $_REQUEST["cbdate_high"] : '';
//    @$_REQUEST["zyfl_id_sel"] != '' ? $pagewhere .= "&zyfl_id_sel=" . $_REQUEST["zyfl_id_sel"] : '';
//    @$_REQUEST["ztfl_sk_id_sel"] != '' ? $pagewhere .= "&ztfl_sk_id_sel=" . $_REQUEST["ztfl_sk_id_sel"] : '';
//    @$_REQUEST["ztfl_zk_id_sel"] != '' ? $pagewhere .= "&ztfl_zk_id_sel=" . $_REQUEST["ztfl_zk_id_sel"] : '';
//    @$_REQUEST["media"] != '' ? $pagewhere .= "&media=" . $_REQUEST["media"] : '';
//

//    $pagenav .= "<a href='search.php?page=1$pagewhere'>首页</a>&nbsp;&nbsp; ";
//    $pagenav .= "<a href='search.php?page=$pre_page$pagewhere'>前一页</a>&nbsp;&nbsp; ";
//    $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";
//    $pagenav .= "<a href='search.php?page=$next_page$pagewhere'>后一页</a>&nbsp;&nbsp; ";
//    $pagenav .= "<a href='search.php?page=$page_count$pagewhere'>末页</a>";
//    $pagenav .= "　跳到<select name='topage' size='1' onchange='window.location=\"search.php?page=\"+this.value$pagewhere'>\n";
//    for ($i = 1; $i <= $page_count; $i++) {
//        if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
//        else $pagenav .= "<option value='$i'>$i</option>\n";
//    }
    $pagenav .= "<div style='margin-right: 3px;margin-top: 2px;float:right;'>";
    $pagenav .= "<a page = '1' showtype = $show_type id = 'firstpage' onclick='firstpagesend()'>首页</a>&nbsp;&nbsp; ";

    if ($page != 1) {
        $pagenav .= "<a page = $pre_page showtype = $show_type id = 'prepage' onclick='prepagesend()'>前一页</a>&nbsp;&nbsp; ";
    }

    $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";

    if ($page != $page_count) {
        $pagenav .= "<a page = $next_page showtype = $show_type id = 'nextpage' onclick='nextpagesend()'>后一页</a>&nbsp;&nbsp; ";
    }
    $pagenav .= "<a page = $page_count showtype = $show_type id = 'lastpage' onclick='lastpagesend()'>末页</a>";
//    将 showtype = $show_type 放到id = 'jumptopage' 之前 ，当$show_type为undefined时，会成为showtype =''id = 'jumptopage' 这种格式
//    使得函数jumptopagesend()找不到id为jumptopage的元素，取不到该元素的page值,使得page的值也是undefined
    $pagenav .= "　跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  showtype = $show_type >\n";
    for ($i = 1; $i <= $page_count; $i++) {
        if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
        else $pagenav .= "<option value='$i'>$i</option>\n";
    }
    $pagenav .= "</div>";
}

// Page分页函数
// 使用示例
// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航

if (isset($rows) and $rows > 0) {
    if ($show_type != 'pic') {
        $page_size = 12; //每页显示数量
    } else {
        $page_size = 12; //每页显示数量
    }

//    $rows = mysqli_num_rows($rs_tsfl30);
//session_start();
    $search_TJ = $_SESSION['search_TJ'];
//echo "当前记录数2：".$rows;
//echo "当前查询条件2：".$search_TJ;
    Page($rows, $page_size, $show_type);


//    $sql = "select top ($select_limit) zdd_pc_id,zdd_detail, zdd_time from bs_zhengdingdan
// where zdd_id not in (select top ($select_from) zdd_id from bs_zhengdingdan where zdd_user_id = '$uid' ) and zdd_user_id = '$uid' ";

//    $search_TJ1 = $search_TJ . " limit $select_from $select_limit";

//    $search_TJ1 = $search_TJ . " limit $select_from $select_limit";


//    echo $search_TJ1;

//    $ms_tsfl3 = new con_mysql2();

//    $sql_tsfl3 = ser("ecs_book", "book_id,sm,isbn,zzh,kb,cbrq,dj,kc,slt ", $search_TJ1);


//    (case
//         when jz1>0 then bid1
//         when (jz1=0 or jz1 is null) and jz3 is not null then bid3
//         when (jz1=0 or jz1 is null) and jz3 is null then bid1
//       end )as book_id ,

//    统一使用bid1 这样不会和manipulate_session.php生成临时表 的语句 冲突
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

//    $sql_tsfl3 = ser("v_ecs_book", $search_content, $search_TJ1);
//方案一
//    $sql_tsfl3 = "select top ($select_limit) $search_content from v_ecs_book
// where bid1 not in (select top ($select_from) bid1 from v_ecs_book where $search_TJ ) and $search_TJ ";

//    $sql_tsfl3 = "select top ($select_limit) $search_content from (select row_number() over(order by rows) as rownumber1,  *  from v_ecs_book ) A where A.rownumber1 > $select_from and $search_TJ order by a.rows";
//方案二
//   如果视图中有多条记录的话， 这样搜索只会搜索出row 小的一行数据，如果依据此条数据判断出的库存状态是'可预定' 这样会和generate_order.php 会因为搜索 count(*) 搜出多条数据
//    多条数据中如果有库存状态是其他的话 矛盾
    $sql_tsfl3 = "SELECT rows, book_id,sm,isbn,zzh,isnull(kb,'16K') as kb,cbrq,dj,jz1,jz3,slt
FROM (SELECT $search_content,rows,
ROW_NUMBER() OVER (ORDER BY rows) AS RowNumber
FROM v_ecs_book WHERE $search_TJ) a
WHERE RowNumber > $select_from AND RowNumber <= ($select_from + $page_size)
ORDER BY a.rows ASC";


//    echo $sql_tsfl3;

//方案3
//    $sql_tsfl3 = "select *
//from (
//select row_number() over(order by tempcolumn) temprownumber,*
//from (select top 开始位置+10 tempcolumn=0,* from table1)t
//)tt
//where temprownumber>开始位置";

//    $sql_tsfl3 = "select top ($select_limit) bid1 from v_ecs_book
// where bid1 not in (select top ($select_from) bid1 from v_ecs_book ) ";

//    echo $select_from;
//    echo $sql_tsfl3;
//
//    $sql = " select
//
//      (case
//         when jz1>0 then bid1
//         when jz1=0 then bid3
//       end )as dj ,
//
//     sm,isbn,zzh,kb,cbrq,
//
//      (case
//         when jz1>0 then dj1
//         when jz1=0 then dj3
//       end )as dj ,
//
//      (case
//         when jz1>0 then jz1
//         when jz1=0 then jz3
//       end )as kc ,
//
//       slt
//    ";
//    echo $sql_tsfl3;

//    $rs_tsfl3 = $ms_tsfl3->sdb($sql_tsfl3);
    $rs_tsfl3 = $ms->sdb($sql_tsfl3);

    if (!$rs_tsfl3) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    while ($data = odbc_fetch_array($rs_tsfl3)) {
//    print_r($data);
        $tsfl_data3_array[] = $data;
    }

//    $tsfl_data3_array = array();
//    while ($tsfl_data3 = mysqli_fetch_assoc($rs_tsfl3)) {
//        $tsfl_data3_array[] = $tsfl_data3;
//    }

}

//print_r($tsfl_data3_array);

//return ""
//print_r($tsfl_data3_array);
//exit();
if (!empty($tsfl_data3_array)) {


    if ($show_type == 'chaxunchachong' | $show_type == 'list') {//list
//    if ($show_type != 'pic') {//list
        echo "<div id=\"div_list\" name=\"div_list\">
	<table   width=\"770\" border=0 cellspacing=0 >

	  <div>

		<tr>

			<td  height=30 width=20 bgcolor=\"#EDEDED\" >";
        if ($first_search) {
            echo " <input  type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box hide_before_purchase\"  onclick='checkallbox_changed();'/>";
        } else if ($_SESSION['start_purchase']) {
            echo " <input  type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box\"  onclick='checkallbox_changed();'/>";
        }else{
            echo " <input  type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box hide_before_purchase_session\"  onclick='checkallbox_changed();'/>";
        }
        echo "
			</td>
			
			<td width=30 bgcolor=\"#EDEDED\" align=center>";
        if ($first_search) {
            echo "<span class='hide_before_purchase'> <b>数量</b> </span> ";
        }else if ($_SESSION['start_purchase']) {
            echo "<span class=''> <b>数量</b> </span> ";
        }else{
            echo "<span class='hide_before_purchase_session'> <b>数量</b> </span> ";
        }

        echo "	</td>
			<td width=230 bgcolor=\"#EDEDED\" align=center><b>书名</b></td>
			<td width=110 bgcolor=\"#EDEDED\" align=center><b>书号</b></td>
			<td width=120 bgcolor=\"#EDEDED\" align=center><b>作者</b></td>
			<td width=50 bgcolor=\"#EDEDED\" align=center><b>开本</b></td>
			<td width=90 bgcolor=\"#EDEDED\" align=center><b>出版日期</b></td>
			<td width=40 bgcolor=\"#EDEDED\" align=center><b>价格</b></td>
			<td width=70 bgcolor=\"#EDEDED\" align=center><b>库存</b></td>
		</tr>
	  </div>

		";

        $n = $_REQUEST["n"];
        if ($n == null or $n == 0) {
            $n = 0;
        }
        //$n=0;
        //while($tsfl_data3=mysqli_fetch_array($rs_tsfl3))


        is_array($tsfl_data3_array) ? null : $tsfl_data3_array = array(); //如果该变量不是一个有效数组，则设置该变量为一个空数组即array()，

        echo "<div class=\"row\" name = \"row\">";
        foreach ($tsfl_data3_array as $key => $tsfl_data3) {
            $bid = $tsfl_data3['book_id'];

            $n = $n + 1;
            echo "<tr>";

            echo "<td class='list' height=20 width=15>";
//
            if ($first_search) {
                echo "<input type='checkbox'   name=\"$bid\" class=\"checkall get_book_info_and_update_db_class hide_before_purchase\" value=$n />";
            }else if ($_SESSION['start_purchase']) {
                echo "<input type='checkbox'   name=\"$bid\" class=\"checkall get_book_info_and_update_db_class\" value=$n />";
            }else{
                echo "<input type='checkbox'   name=\"$bid\" class=\"checkall get_book_info_and_update_db_class hide_before_purchase_session\" value=$n />";
            }


            echo "</td>";

            echo "<td style='text-align: center'>";
            if ($first_search) {
                echo "<input style='width:15px;' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class hide_before_purchase' onmouseover='num_limit();'  type='text' maxlength='1' size='1' value=$default_num />";
            }else if ($_SESSION['start_purchase']) {
                echo "<input style='width:15px;' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class' onmouseover='num_limit();'  type='text' maxlength='1' size='1' value=$default_num />";
            }else{
                echo "<input style='width:15px;' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class hide_before_purchase_session' onmouseover='num_limit();'  type='text' maxlength='1' size='1' value=$default_num />";
            }
            echo "</td>";

            if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm']))) > 36) {
                echo "<td align='left' width='280' height='28'>" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])), 0, 18, 'utf8') . "</td>";
            } else {
                echo "<td  align='left' width='280' height='28'>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])) . "</td>";
            }

            echo "<td  align='center'>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['isbn'])) . "</td>";
//            $isbn11 = trim($tsfl_data3['isbn']);
            if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh']))) > 20) {
                echo "<td  align='left'>" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])), 0, 20) . "</td>";
            } else {
                echo "<td  align='left'>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])) . "</td>";
            }
            echo "<td align=center>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['kb'])) . "</td>";
            if (iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq']) == '') {
                echo "<td></td>";
            } else {
                echo "<td align=center>" . substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 0, 4) . "年" . str_pad(str_replace('/', '', str_replace('-', '', substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 5, 2))), 2, '0', STR_PAD_LEFT) . "月</td>";
            }
            echo "<td align=center>￥" . trim(sprintf('%.2f', iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['dj']))) . "</td>";
            echo "<td align=center>";


            if ($tsfl_data3['jz1'] > 0) {
                echo '纸本可供';
            } else {

                if (is_numeric($tsfl_data3['jz3']) && ($tsfl_data3['jz3'] >= 0)) {
                    echo 'POD可供';
                } else if (is_null($tsfl_data3['jz3'])) {
                    echo '可预订';
                }
            }

            echo "</td></tr>";
        }

        echo "</div>";

        echo "</table>
          </div>";


    } else
        if ($show_type == 'pic') { // pic 图片格式显示
//    } else { // pic

            echo "
    <div id=\"div_list\" name=\"div_list\" >
";
            if ($first_search) {
                echo "
        <div class='hide_before_purchase'>
            	<input type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box \"  onclick='checkallbox_changed();'/>
                <label>全选</label>

        </div>";
            }else if ($_SESSION['start_purchase']) {
                echo "
        <div class=''>
            	<input type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box \"  onclick='checkallbox_changed();'/>
                <label>全选</label>

        </div>";
            }else{
                echo "
        <div class='hide_before_purchase_session'>
            	<input type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box \"  onclick='checkallbox_changed();'/>
                <label>全选</label>
        </div>";
            }

            echo "
			<table  width=\"770\" border=0 cellspacing=0 >
			<tr>
			<td width=256></td>
			<td width=256></td>
			<td width=256></td>
			</tr>
    ";

            $n = 0;

            echo "<div class=\"row\" name = \"row\">";

            //while($tsfl_data3=mysqli_fetch_array($rs_tsfl3))
            foreach ($tsfl_data3_array as $key => $tsfl_data3) {

                $bid = $tsfl_data3['book_id'];


                $n = $n + 1;
                $colnn = $n % 3;
                if ($colnn == 1) {
                    echo "<tr><td>";
                } else {
                    echo "<td>";
                }
                echo "<table border=0 cellspacing=0>
             <tr>
             <td rowspan=8><img src=http://www.ecsponline.com" . trim($tsfl_data3['slt']) . " width=120 height=120></td>
             <td height=20>
             
           ";
                if ($first_search) {
                    echo "
                         <input type='checkbox' class = 'checkall get_book_info_and_update_db_class hide_before_purchase'  name=\"$bid\"  value=$n />
                         <input style='width:15px' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class hide_before_purchase' onmouseover='num_limit();' type='text' maxlength='1' size='1' value=$default_num />
                         ";
                }else if ($_SESSION['start_purchase']) {

                    echo "
                         <input type='checkbox' class = 'checkall get_book_info_and_update_db_class'  name=\"$bid\"  value=$n />
                         <input style='width:15px' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class' onmouseover='num_limit();' type='text' maxlength='1' size='1' value=$default_num />
                         ";
                }else{
                    echo "
                         <input type='checkbox' class = 'checkall get_book_info_and_update_db_class hide_before_purchase_session'  name=\"$bid\"  value=$n />
                         <input style='width:15px' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class hide_before_purchase_session' onmouseover='num_limit();' type='text' maxlength='1' size='1' value=$default_num />
                         ";
                }

                echo "</td>
            </tr>";

                if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm']))) > 36) {
                    echo "<tr><td width='280' height=15>书名：" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])), 0, 18, 'utf8') . "</td></tr>";
                } else {
                    echo "<tr><td>书名：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])) . "</td></tr>";
                }

                echo "<tr><td height=15>书号：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['isbn'])) . "</td></tr>";
//                $isbn11 = trim($tsfl_data3['isbn']);
                if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh']))) > 36) {
                    echo "<tr><td>作者：" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])), 0, 18) . "</td></tr>";
                } else {
                    echo "<tr><td>作者：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])) . "</td></tr>";
                }
                echo "<tr><td>开本：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['kb'])) . "</td></tr>";
                if (iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq']) == '') {
                    echo "<tr><td></td></tr>";
                } else {
                    echo "<tr><td>出版年月：" . substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 0, 4) . "年" . str_pad(str_replace('/', '', str_replace('-', '', substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 5, 2))), 2, '0', STR_PAD_LEFT) . "月</td></tr>";
                }
                echo "<tr><td>定价：￥" . trim(sprintf('%.2f', iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['dj']))) . "</td></tr>";
                echo "<tr><td>库存：";


                if ($tsfl_data3['jz1'] > 0) {
                    echo '纸本可供' . "</td></tr></table>";
                } else {

                    if (is_numeric($tsfl_data3['jz3']) && ($tsfl_data3['jz3'] >= 0)) {
                        echo 'POD可供' . "</td></tr></table>";
                    } else if (is_null($tsfl_data3['jz3'])) {
                        echo '可预订' . "</td></tr></table>";
                    }
                }


                if ($colnn == 0) {
                    echo "</td></tr>";
                } else {
                    echo "</td>";
                }

            }

            echo "</div>";

            echo "
        </table>
		</div>
    ";
        }

    echo $pagenav;
}


?>