<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/27
 * Time: 19:28
 */
include ("db/db.php");
include ("include/GuanCangSmarty.php");

include ("class/Page.class.php");


//
session_start();

$smarty = new GuanCangSmarty();

$userid = $_SESSION['user_id'];

$smt=$pdo->query("select count(*) as sum from bookinfo ,orderlist
    where orderlist.orderlist_user_id= '$userid'
    and orderlist.orderlist_content=bookinfo.bookinfo_id");

$list=$smt->fetchAll(PDO::FETCH_ASSOC);

$tot = $list[0]['sum'];

$page=new Page('showorder.php',$tot,10);

$orderlist_smt=$pdo->query("select bookinfo_name,bookinfo_isbn,bookinfo_price,orderlist_num,orderlist_time from bookinfo ,orderlist
    where orderlist.orderlist_user_id= '$userid'
    and orderlist.orderlist_content=bookinfo.bookinfo_id $page->limit");

$orderlist=$orderlist_smt->fetchAll(PDO::FETCH_ASSOC);



$smarty->assign("page",$page);

$smarty->assign("orderlist",$orderlist);

$smarty->display("showorder.html");
//var_dump($orderlist);