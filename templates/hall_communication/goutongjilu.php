<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 17:08
 */


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

