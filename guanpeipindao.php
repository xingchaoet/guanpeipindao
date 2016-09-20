<?php

require_once("include/GuanCangSmarty.php");
require_once("config.php");
include("db/con_mssql.php");
include("db/con_mysql2.php");
include("db/dao.php");


session_start();

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
$ms = new con_mssql();

$con_mysql2 = new con_mysql2();

//介绍文字
$sql = ser("bs_home_introduce", "introduce", "");

// 查询数据
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


////轮播图片
//$carousel = array();
//
//$sql_carousel = "SELECT TOP 3 ggPhoto FROM bs_home_gg ORDER BY uptime DESC ";
//
////echo  $sql_carousel;
//$rs_carousel = $ms->sdb($sql_carousel);
////$carousel_data = odbc_fetch_array($rs_carousel);
//
//while ($carousel_data = odbc_fetch_array($rs_carousel)) {
//    $carousel[] = $carousel_data;
//};
//
//$carousel_sum = array();
////$dir = ;
//for ($i = 0; $i < count($carousel); $i++) {
////    print_r($carousel[$i]);
//
//    $carousel_sum[] = gg_."$i".jpg;
//
//    $data = base64_decode($carousel[$i]['ggPhoto']);
//
//    $im = imagecreatefromstring($data);
//    if ($im !== false) {
//        header('Content-Type: image/jpg');
//        imagejpeg($im, "dist/picture/gg/gg_$i.jpg");
//        imagedestroy($im);
//    } else {
//        echo 'An error occurred.';
//    }
//}

//exit();

$smarty->assign("carousel_sum", $carousel_sum);


//最新

$sql = "SELECT * FROM ecs_book  ORDER BY cbrq DESC  LIMIT 0,8";
$newbooks = $con_mysql2->sdb($sql);

//推荐
$sql = "SELECT * FROM ecs_book WHERE bjtj IS NOT NULL ORDER BY cbrq DESC LIMIT 0,8";
$recommendbooks = $con_mysql2->sdb($sql);
$relpostodist = './';
$smarty->assign("relpostodist", $relpostodist);

//$smarty->assign("first_level", "<a href='guanpeipindao.php'>馆配服务</a>");

$smarty->assign("recommendbooks", $recommendbooks);
$smarty->assign("newbooks", $newbooks);


$smarty->display("guanpeipindao.html");


?>

