<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/2
 * Time: 11:29
 */
require_once("../config.php");
require_once("../db/con_mssql.php");
//require_once("../db/con_mysql2.php");
include("../db/dao.php");

include("../include/GuanCangSmarty.php");
include ("auth_hall_communication.php");

//session_start();
//$global_url = GLOBAL_URL;
//

$liuyan = array();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();

$ms = new con_mssql();

//馆配动态
//$sql_liuyan = "SELECT Id, Title, CONVERT(varchar(10), UpTime, 120) as UpTime ,NewsType FROM bs_news  WHERE FlagAudit = '1'  ORDER BY UpTime DESC";
//$sql_liuyan = "SELECT Title, UpTime FROM bs_news ORDER BY UpTime DESC";
$reback = '0';
$message_date = date("Y-m-d H:i:s", time());

$zw = iconv('UTF-8', 'GBK', $_SESSION['zw']);
$_SESSION['username'];

$message = $_POST['message'];
$message = iconv('UTF-8', 'GBK', $message);



$sql = "insert into bs_message_board
(UserName,CompanyName,Position,MessageContents,MessageTime,FlagAudit,FlagMask,FlagReply) 
values
('" . trim($_SESSION['username']) . "','" . trim($_SESSION['lib_no']) . "','" . trim($zw) . "','" . $message . "','" . $message_date . "','" . 0 . "','" . 0 . "','" . 0 . "')";


$MessageResult = $ms->sdb($sql);
if ($MessageResult) {
    $reback = '留言成功';
}else{
    $reback = '留言失败';
}
echo $reback;



