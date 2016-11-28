<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/30
 * Time: 15:33
 */
require_once("../config.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("../include/GuanCangSmarty.php");
include("auth_hall_communication.php");

$gpdt = array();
$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();

include("../include/introduce.php");

//馆配动态
$sql_gpdt = "SELECT TOP 5 Id, Title, CONVERT(varchar(10), UpTime, 120) as UpTime ,NewsType FROM bs_news  WHERE FlagAudit = '1'  ORDER BY UpTime DESC";

$rs_gpdt = $ms->sdb($sql_gpdt);

while ($gpdt_data = odbc_fetch_array($rs_gpdt)) {
    $gpdt[] = $gpdt_data;
};

for ($i = 0; $i < count($gpdt); $i++) {
    $gpdt[$i]['Title'] = iconv('gbk', 'utf-8', $gpdt[$i]['Title']);
    $gpdt[$i]['NewsType'] = iconv('gbk', 'utf-8', $gpdt[$i]['NewsType']);
}


$smarty->assign("gpdt", $gpdt);

//沟通记录
$gtjl = array();

//允许发布字段
$sql_gtjl = "SELECT TOP 3 Id, UserName,MessageContents,CONVERT(varchar(20), MessageTime, 120) as MessageTime  FROM bs_message_board WHERE FlagAudit = '1'  ";

$rs_gtjl = $ms->sdb($sql_gtjl);

while ($gtjl_data = odbc_fetch_array($rs_gtjl)) {
    $gtjl[] = $gtjl_data;
};

for ($i = 0; $i < count($gtjl); $i++) {
    $gtjl[$i]['UserName'] = iconv('gbk', 'utf-8//IGNORE', $gtjl[$i]['UserName']);
    $gtjl[$i]['MessageContents'] = iconv('gbk', 'utf-8//IGNORE', $gtjl[$i]['MessageContents']);

//    得到此留言的回复
    $sql_gtjl_reply = "SELECT  ReplyUserName,ReplyContents,CONVERT(varchar(20), ReplyTime, 120) as ReplyTime  FROM bs_message_board_reply WHERE MessageId = " . $gtjl[$i]['Id'];

    $rs_gtjl_reply = $ms->sdb($sql_gtjl_reply);

    while ($gtjl_data_reply = odbc_fetch_array($rs_gtjl_reply)) {
        $gtjl_reply[] = $gtjl_data_reply;
    };

    //    注意索引
    for ($j = 0; $j < count($gtjl_reply); $j++) {
//    注意索引
        $gtjl_reply[$j]['ReplyUserName'] = iconv('gbk', 'utf-8//IGNORE', $gtjl_reply[$j]['ReplyUserName']);
        $gtjl_reply[$j]['ReplyContents'] = iconv('gbk', 'utf-8//IGNORE', $gtjl_reply[$j]['ReplyContents']);
    }

    $gtjl[$i]['reply'] = $gtjl_reply;

    unset($gtjl_reply);
}

$smarty->assign("gtjl", $gtjl);


//业务联系方式
$ywlxfsh = array();

//允许发布字段
$sql_ywlxfsh = "SELECT Contents FROM bs_about";

$rs_ywlxfsh = $ms->sdb($sql_ywlxfsh);
//$ywlxfsh_data = odbc_fetch_array($rs_ywlxfsh);

while ($ywlxfsh_data = odbc_fetch_array($rs_ywlxfsh)) {
    $ywlxfsh[] = $ywlxfsh_data;
};


for ($i = 0; $i < count($ywlxfsh); $i++) {
    $ywlxfsh[$i]['Contents'] = iconv('gbk', 'utf-8//IGNORE', $ywlxfsh[$i]['Contents']);
}


$smarty->assign("ywlxfsh", $ywlxfsh);


$relpostodist = '../';
$smarty->assign("first_level", "<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level", "<a href='hall_communication.php'>社馆互动</a>");
$smarty->assign("relpostodist", $relpostodist);

$smarty->assign("user_type", $user_type);

$smarty->display("hall_communication/hall_communication.html");
