<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 15:16
 */
require_once("../config.php");
require_once("../db/con_mssql.php");
require_once("../db/con_mysql2.php");
include("../db/dao.php");

include("../include/GuanCangSmarty.php");
include ("auth_hall_communication.php");
//session_start();
//$global_url = GLOBAL_URL;
//
//if($_SESSION['user_type'] == "gps_user"){
//    echo "<script type='text/javascript'>alert('您是馆配商用户，只有图书馆用户才可以访问此栏目!');</script>";
//    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/';</script>";
//}


$gpdt = array();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();


$ms = new con_mssql();

//$tj1 = '馆配动态';
//
//$tj1 = iconv( 'utf-8','gbk',$tj1);

//馆配动态
//$sql_gpdt = ser(bs_news, "Title,UpTime", "");
$sql_gpdt = "SELECT Id, Title, CONVERT(varchar(10), UpTime, 120) as UpTime ,NewsType FROM bs_news  WHERE FlagAudit = '1'   ORDER BY UpTime DESC";
//$sql_gpdt = "SELECT Title, UpTime FROM bs_news ORDER BY UpTime DESC";

$rs_gpdt = $ms->sdb($sql_gpdt);
//$gpdt_data = odbc_fetch_array($rs_gpdt);

while ($gpdt_data = odbc_fetch_array($rs_gpdt)) {
    $gpdt[] = $gpdt_data;
};

for ($i = 0;$i < count($gpdt) ; $i ++) {
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

//print_r($gpdt_sgdt);
//print_r($gpdt_hyzx);
//print_r($gpdt_xshjl);

//print_r($gpdt);
//
//exit();

//$smarty->assign("gpdt", $gpdt);
$smarty->assign("gpdt_sgdt", $gpdt_sgdt);
$smarty->assign("gpdt_hyzx", $gpdt_hyzx);
$smarty->assign("gpdt_xshjl", $gpdt_xshjl);


$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='hall_communication.php'>社馆互动</a>");
$smarty->assign("relpostodist", $relpostodist);

$smarty->display("hall_communication/guanpeidongtai_more.html");
