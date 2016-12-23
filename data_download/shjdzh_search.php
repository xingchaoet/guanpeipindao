<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 16:12
 */

//include("../include/GuanCangSmarty.php");
require("../config.php");
//include("../db/con_mysql2.php");
require("../db/con_mssql.php");
include("../db/dao.php");

include ("auth_data_download.php");


//$smarty = new GuanCangSmarty();
//$smarty->MySmarty();

$tsfl_data3_array = array();

//注释1---接收cc_index.php通过post传递出的参数，分别存储入变量-----------
$sjdate_low = $_REQUEST["sjdate_low"];
$sjdate_high = $_REQUEST["sjdate_high"];
$cbdate_low = $_REQUEST["cbdate_low"];
$cbdate_high = $_REQUEST["cbdate_high"];
$zyfl_value = $_REQUEST["zyfl_id_sel"];
$skfl_value = $_REQUEST["ztfl_sk_id_sel"];
$zkfl_value = $_REQUEST["ztfl_zk_id_sel"];
$media = $_REQUEST["media"];

//注释2---判断参数是否为空，如果为空，不作任何操作。如果有参数传出，则生成相应SQL语句。---------------------

if ($sjdate_low != null and $sjdate_high != null) {
    $g = " and gxsj >= '$sjdate_low' and  gxsj <= '$sjdate_high'";
} elseif ($sjdate_low != null and ($sjdate_high = null or $sjdate_high == "")) {
    $g = " and gxsj >= '$sjdate_low' ";
} elseif (($sjdate_low = null or $sjdate_low == "") and $sjdate_high != null) {
    $g = " and gxsj <= '$sjdate_high' ";
} else {
    $g = "";
}
if ($cbdate_low != null and $cbdate_high != null) {
    $h = " and cbrq >= '$cbdate_low' and  cbrq <= '$cbdate_high'";
} elseif ($cbdate_low != null and ($cbdate_high = null or $cbdate_high == "")) {
    $h = " and cbrq >= '$cbdate_low' ";
} elseif (($cbdate_low = null or $cbdate_low == "") and $cbdate_high != null) {
    $h = " and cbrq <= '$cbdate_high' ";
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
            $l = " and (jz1 = '0' and jz1 is null) and jz3 is not null";
            break;
    }

} else {
    $l = "";
}
//注释3---用追加的方法生成SQL语句--------
$search_TJ = " (1=1)";
$search_TJ .= $g;
$search_TJ .= $h;
$search_TJ .= $i;
$search_TJ .= $j;
$search_TJ .= $k;
$search_TJ .= $l;
if ($search_TJ == " (1=1)") {
    $search_TJ = " (1=0)";
}



//
//$sql_tsfl30 = ser("v_ecs_book", "isbn", $search_TJ);
//
//$rs_tsfl30 = $ms_tsfl30->sdb($sql_tsfl30);
//
//while ($tsfl_data3 = mysqli_fetch_assoc($rs_tsfl30)) {
//    $tsfl_data3_array[] = $tsfl_data3;
//}

$ms = new con_mssql();
$sql_tsfl30 = ser("v_ecs_book", "bid1,isbn", $search_TJ);

$rs_tsfl30 = $ms->sdb($sql_tsfl30);
while ($tsfl_data3 = odbc_fetch_array($rs_tsfl30)) {
    $tsfl_data3_array[] = $tsfl_data3;
};

$count_tsfl_data3_array = count($tsfl_data3_array);

for ($i = 0 ;$i < $count_tsfl_data3_array; $i ++) {
//    删去不规范的书号
    if (strlen(trim( $tsfl_data3_array[$i]['isbn'])) < 10) {
        array_splice($tsfl_data3_array, $i, 1);
    }
//    echo  $tsfl_data3_array[$i]['isbn']."_";
//
//    echo strlen(trim($tsfl_data3_array[$i]['isbn']))."|";
}

//print_r($tsfl_data3_array);

$_SESSION[data_diy_isbns] = $tsfl_data3_array;
//print_r($_SESSION[data_diy_isbns]);

//$rows = mysqli_num_rows($rs_tsfl30);
$rows = count($tsfl_data3_array);
echo "共搜索出" . $rows." 条记录";


