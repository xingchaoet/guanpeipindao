<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 17:08
 */

//介绍文字
$sql = ser("bs_home_introduce", "introduce","");

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

//沟通记录
$gtjl = array();

//允许发布字段
$sql_gtjl = "SELECT UserName,MessageContents FROM bs_message_board";

//echo  $sql_gtjl;
$rs_gtjl = $ms->sdb($sql_gtjl);
//$gtjl_data = odbc_fetch_array($rs_gtjl);

while ($gtjl_data = odbc_fetch_array($rs_gtjl)) {
    $gtjl[] = $gtjl_data;
};


for ($i = 0; $i < count($gtjl); $i++) {
    $gtjl[$i]['UserName'] = iconv('gbk', 'utf-8//IGNORE', $gtjl[$i]['UserName']);
    $gtjl[$i]['MessageContents'] = iconv('gbk', 'utf-8//IGNORE', $gtjl[$i]['MessageContents']);
}

//print_r($gtjl);
//
//exit();

$smarty->assign("gtjl", $gtjl);

