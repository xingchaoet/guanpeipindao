<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/24
 * Time: 20:12
 */

//include ("libs/Smarty.class.php");
include ("include/GuanCangSmarty.php");


require_once("config.php");
include("db/con_mssql.php");
include("db/dao.php");
include  ("db/con_mysql2.php");

//echo $_GET['book_id'];
//exit();

session_start();

$smarty = new GuanCangSmarty();

$book_id = $_GET['book_id'];

$con_mysql2 = new con_mysql2();

$ms = new con_mssql();

//$smt=$pdo->query("SELECT * FROM bookinfo where bookinfo_id = '$book_id'");
//
//$bookdetails=$smt->fetchAll(PDO::FETCH_ASSOC);

$sql = "select * from ecs_book where book_id = '$book_id'";

$bookdetails =  $con_mysql2->sdb($sql);


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




$smarty->assign('details',$bookdetails);

$smarty->display("detail.html");