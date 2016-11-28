<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/24
 * Time: 20:12
 */
include ("include/GuanCangSmarty.php");

require_once("config.php");
include("db/con_mssql.php");
include("db/dao.php");
//echo $_GET['book_id'];
session_start();

$smarty = new GuanCangSmarty();
//$ms = new con_mssql();

include("include/introduce.php");

$book_id = $_GET['book_id'];

$sql = "select * from ecs_book where book_id = '$book_id'";

$rs_detail = $ms->sdb($sql);
while ($detail_data = odbc_fetch_array($rs_detail)) {
    $bookdetails[] = $detail_data;
};

$smarty->assign('details',$bookdetails);

$smarty->display("detail.html");