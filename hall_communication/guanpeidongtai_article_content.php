<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/1
 * Time: 14:29
 */
require("../config.php");
require("../db/con_mssql.php");
//require("../db/con_mysql2.php");
include("../db/dao.php");

include("../include/GuanCangSmarty.php");
include ("auth_hall_communication.php");

//session_start();

$id = $_REQUEST['id'];

//$global_url = GLOBAL_URL;
//
$gpdt = array();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$smarty->MySmarty();

include("../include/introduce.php");
//$ms = new con_mssql();

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

$count_gpdt = count($gpdt);
for ($i = 0; $i < $count_gpdt; $i++) {
    $gpdt[$i]['Title'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Title']);
    $gpdt[$i]['NewsType'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['NewsType']);
//    print_r($gpdt[$i]['Article']);

    $gpdt[$i]['Article'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Article']);
    $gpdt[$i]['Source'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Source']);
    $gpdt[$i]['Writer'] = iconv('gbk', 'utf-8//IGNORE', $gpdt[$i]['Writer']);

}

$smarty->assign("gpdt", $gpdt);


$relpostodist = '../';
$smarty->assign("first_level", "<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level", "<a href='hall_communication.php'>社馆互动</a>");
$smarty->assign("relpostodist", $relpostodist);


$smarty->display("hall_communication/guanpeidongtai_article_content.html");
