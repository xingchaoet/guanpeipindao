<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/2
 * Time: 15:32
 */
require("../config.php");
require("../db/con_mssql.php");
//require("../db/con_mysql2.php");
include("../db/dao.php");

include("../include/GuanCangSmarty.php");
include ("auth_hall_communication.php");

//session_start();
//$global_url = GLOBAL_URL;
//
if($_SESSION['user_type'] == "gps_user"){
    echo "<script type='text/javascript'>alert('请经销商用户到“数据下载”栏目查询下载数据！');</script>";
    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/';</script>";
}

$gtjl = array();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();
include("../include/introduce.php");
//$ms = new con_mssql();


//沟通记录
$gtjl = array();

//允许发布字段
$sql_gtjl = "SELECT Id, UserName,MessageContents,CONVERT(varchar(20), MessageTime, 120) as MessageTime  FROM bs_message_board WHERE FlagAudit = '1' ";

//echo  $sql_gtjl;
$rs_gtjl = $ms->sdb($sql_gtjl);
//$gtjl_data = odbc_fetch_array($rs_gtjl);

while ($gtjl_data = odbc_fetch_array($rs_gtjl)) {
    $gtjl[] = $gtjl_data;
};


$count_gtjl = count($gtjl);

for ($i = 0; $i < $count_gtjl; $i++) {
    $gtjl[$i]['UserName'] = iconv('gbk', 'utf-8//IGNORE', $gtjl[$i]['UserName']);
    $gtjl[$i]['MessageContents'] = iconv('gbk', 'utf-8//IGNORE', $gtjl[$i]['MessageContents']);

//    得到此留言的回复
    $sql_gtjl_reply = "SELECT  ReplyUserName,ReplyContents,CONVERT(varchar(10), ReplyTime, 120) as ReplyTime  FROM bs_message_board_reply WHERE MessageId = " . $gtjl[$i]['Id'];

    $rs_gtjl_reply = $ms->sdb($sql_gtjl_reply);

    while ($gtjl_data_reply = odbc_fetch_array($rs_gtjl_reply)) {
        $gtjl_reply[] = $gtjl_data_reply;
    };
//    print_r($gtjl_reply);
//    注意索引
    $count_gtjl_reply = count($gtjl_reply);
    for ($j = 0; $j < $count_gtjl_reply; $j++) {
//    注意索引
        $gtjl_reply[$j]['ReplyUserName'] = iconv('gbk', 'utf-8//IGNORE', $gtjl_reply[$j]['ReplyUserName']);
        $gtjl_reply[$j]['ReplyContents'] = iconv('gbk', 'utf-8//IGNORE', $gtjl_reply[$j]['ReplyContents']);
    }

//    print_r($gtjl_reply);

    $gtjl[$i]['reply'] = $gtjl_reply;

    unset($gtjl_reply);
}


//print_r($gtjl);
//
//exit();

$smarty->assign("gtjl", $gtjl);

$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='hall_communication.php'>社馆互动</a>");
$smarty->assign("relpostodist", $relpostodist);

$smarty->display("hall_communication/goutongjilu_more.html");
