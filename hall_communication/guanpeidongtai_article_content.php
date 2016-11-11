<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 14:29
 */
require_once("../config.php");
require_once("../db/con_mssql.php");
//require_once("../db/con_mysql2.php");
include("../db/dao.php");

include("../include/GuanCangSmarty.php");
include ("auth_hall_communication.php");

//session_start();

$id = $_REQUEST['id'];

//$global_url = GLOBAL_URL;
//
//if ($_SESSION['user_type'] == "gps_user") {
//    echo "<script type='text/javascript'>alert('您是馆配商用户，只有图书馆用户才可以访问此栏目!');</script>";
//    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/';</script>";
//}


$gpdt = array();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();


$ms = new con_mssql();

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




$sql_size="SET   TEXTSIZE   65536";
$rs_size = $ms->sdb($sql_size);

//馆配动态
//$sql_gpdt = ser(bs_news, "Title,UpTime", "");
//$sql_gpdt = "SELECT Id, Title, Source, Writer ,CONVERT(varchar(10), UpTime, 120) as UpTime ,   Article , NewsType FROM bs_news  WHERE FlagAudit = '1' and id = $id ";
$sql_gpdt = "SELECT Id, Title, Source, Writer ,CONVERT(varchar(10), UpTime, 120) as UpTime ,    Article , NewsType FROM bs_news  WHERE FlagAudit = '1' and id = $id ";

//$sql_gpdt = "SELECT Title, UpTime FROM bs_news ORDER BY UpTime DESC";

//echo  $sql_gpdt;
$rs_gpdt = $ms->sdb($sql_gpdt);
//$gpdt_data = odbc_fetch_array($rs_gpdt);

while ($gpdt_data = odbc_fetch_array($rs_gpdt)) {
    $gpdt[] = $gpdt_data;
};


for ($i = 0; $i < count($gpdt); $i++) {
    $gpdt[$i]['Title'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Title']);
    $gpdt[$i]['NewsType'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['NewsType']);
//    print_r($gpdt[$i]['Article']);

    $gpdt[$i]['Article'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Article']);
    $gpdt[$i]['Source'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Source']);
    $gpdt[$i]['Writer'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Writer']);

}

//print_r($gpdt);
//
//exit();

$smarty->assign("gpdt", $gpdt);


$relpostodist = '../';
$smarty->assign("first_level", "<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level", "<a href='hall_communication.php'>社馆互动</a>");
$smarty->assign("relpostodist", $relpostodist);


$smarty->display("hall_communication/guanpeidongtai_article_content.html");
