<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 8:02
 */
include("../include/GuanCangSmarty.php");
require("../config.php");
include("../db/con_mysql2.php");
require("../db/con_mssql.php");
require("../db/con_mysql2.php");
include("../db/dao.php");

include("auth_chachong.php");

//if (isset($_SESSION['err'])) {
//    $err = $_SESSION['err'];
//} else {
//    $err = "";
//};
$pici_info = array();
$pici_info_collection = array();
$uid = $_REQUEST['uid'];
$smarty = new GuanCangSmarty();
$smarty->MySmarty();
// 实例化SQLServer封装类
$ms = new con_mssql();
//$book_info = new con_mysql2();

$sql = ser("bs_gcdr_pc", "gc_dr_pc,uptime", "inputby='$uid'");


$rs = $ms->sdb($sql);
if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(odbc_errormsg(), true));
}
while (odbc_fetch_array($rs)) {
    $gc_dr_pc = trim(odbc_result($rs, "gc_dr_pc"));
    $uptime = trim(odbc_result($rs, "uptime"));
//
//    echo '批次代号';
//    echo $gc_dr_pc;
//    echo '导入时间';
//    echo $uptime;
    $pici_info['gc_dr_pc'] = $gc_dr_pc;
    $pici_info['uptime'] = $uptime;

    $sql = ser("lib_gc_info", "isbn", "gc_pc='$gc_dr_pc'");

//    echo $sql;
    $pc_isbns_rs = $ms->sdb($sql);
    if (!$pc_isbns_rs) {
//        echo '这里出错了';
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
//    $i = 0;
    while (odbc_fetch_array($pc_isbns_rs)) {
        $isbn = trim(odbc_result($pc_isbns_rs, "isbn"));

//        echo '批次代号'.$gc_dr_pc;
//        echo $isbn;
        $pici_info[$gc_dr_pc][] = $isbn;

//        $book_sql = ser("ecs_book", "isbn", "gc_pc='$gc_dr_pc'");
//        $i ++;
    }
    $pici_info_collection[] = $pici_info;
}




$relpostodist = '../';
$smarty->assign("relpostodist", $relpostodist);


$smarty->assign("pici_info_collection", $pici_info_collection);
$history_page = $smarty->display("chachong/gangcang_import_history.html");

 echo ($history_page);

?>