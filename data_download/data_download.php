<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/12
 * Time: 11:34
 */
require_once("../config.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
//require_once("../db/con_mysql2.php");

include("../include/GuanCangSmarty.php");

include ("auth_data_download.php");


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


//专题数据
$zhtshj = array();

$sql_zhtshj = "SELECT TOP 3 id, Title,MarcGt,MarcCalis,MarcCf,MarcExcel,CONVERT(varchar(7), uptime, 120) as uptime  FROM bs_marc_seminar ";
//$sql_zhtshj = "SELECT TOP 5  id,Title,CONVERT(varchar(7), uptime, 120) as uptime  FROM bs_marc_seminar ";

//echo  $sql_zhtshj;
$rs_zhtshj = $ms->sdb($sql_zhtshj);
//$zhtshj_data = odbc_fetch_array($rs_zhtshj);

while ($zhtshj_data = odbc_fetch_array($rs_zhtshj)) {
    $zhtshj[] = $zhtshj_data;
};

for ($i = 0; $i < count($zhtshj); $i++) {
    $zhtshj[$i]['Title'] = iconv('gbk', 'utf-8//IGNORE', $zhtshj[$i]['Title']);
}

$smarty->assign("zhtshj", $zhtshj);


$relpostodist = '../';
$smarty->assign("first_level","<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level","<a href='data_download.php'>数据下载</a>");
$smarty->assign("relpostodist", $relpostodist);



$smarty->display("data_download/data_download.html");
