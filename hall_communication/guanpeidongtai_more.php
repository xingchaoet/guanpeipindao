<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 15:16
 */
require_once("../config.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("../include/GuanCangSmarty.php");
include ("auth_hall_communication.php");

$gpdt = array();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();
include("../include/introduce.php");

//馆配动态

$sql_gpdt = "SELECT Id, Title, CONVERT(varchar(10), UpTime, 120) as UpTime ,NewsType FROM bs_news  WHERE FlagAudit = '1'   ORDER BY UpTime DESC";

$rs_gpdt = $ms->sdb($sql_gpdt);

while ($gpdt_data = odbc_fetch_array($rs_gpdt)) {
    $gpdt[] = $gpdt_data;
};

$count_gpdt = count($gpdt);
for ($i = 0;$i < $count_gpdt; $i ++) {
    $gpdt[$i]['Title'] = iconv( 'gbk','utf-8',$gpdt[$i]['Title']);
    $gpdt[$i]['NewsType'] = iconv( 'gbk','utf-8',$gpdt[$i]['NewsType']);

    if($gpdt[$i]['NewsType'] == "社馆动态"){
        $gpdt_sgdt[] = $gpdt[$i];
    }else if($gpdt[$i]['NewsType'] == "行业资讯"){
        $gpdt_hyzx[] = $gpdt[$i];
    }else if($gpdt[$i]['NewsType'] == "学术交流"){
        $gpdt_xshjl[] = $gpdt[$i];
    }
}

$smarty->assign("gpdt_sgdt", $gpdt_sgdt);
$smarty->assign("gpdt_hyzx", $gpdt_hyzx);
$smarty->assign("gpdt_xshjl", $gpdt_xshjl);

$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='hall_communication.php'>社馆互动</a>");
$smarty->assign("relpostodist", $relpostodist);

$smarty->display("hall_communication/guanpeidongtai_more.html");
