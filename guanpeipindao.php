<?php

require("include/GuanCangSmarty.php");
require("config.php");
include("db/con_mssql.php");
include("db/dao.php");

session_start();

//function fen_mian_exist($paras){
//    extract($paras);
//    $fileExists = @file_get_contents($file,null,null,-1,1) ? true : false;
//    return $fileExists;
//
//}

$smarty = new GuanCangSmarty();
//$smarty->caching = false; //设置缓存方式
//$ms = new con_mssql();
include("include/introduce.php");


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

//$smarty->assign("carousel_sum", $carousel_sum);

//最新

//$sql = "SELECT * FROM ecs_book  ORDER BY cbrq DESC  LIMIT 0,8";
//$newbooks = $con_mysql2->sdb($sql);

$sql = "SELECT TOP 8 * FROM ecs_book  ORDER BY cbrq DESC  ";

$rs_newbooks = $ms->sdb($sql);

while ($newbooks_data = odbc_fetch_array($rs_newbooks)) {
    $newbooks[] = $newbooks_data;
};

//推荐
//$sql = "SELECT * FROM ecs_book WHERE bjtj IS NOT NULL ORDER BY cbrq DESC LIMIT 0,8";
$sql = "SELECT TOP 8 * FROM ecs_book WHERE bjtj IS NOT NULL ORDER BY cbrq DESC ";

//$recommendbooks = $con_mysql2->sdb($sql);

$rs_recommendbooks = $ms->sdb($sql);

while ($recommendbooks_data = odbc_fetch_array($rs_recommendbooks)) {
    $recommendbooks[] = $recommendbooks_data;
};

$relpostodist = './';
$smarty->assign("relpostodist", $relpostodist);


$smarty->assign("recommendbooks", $recommendbooks);
$smarty->assign("newbooks", $newbooks);



//$smarty->registerPlugin('function','fen_mian_exist','fen_mian_exist');
$smarty->display("guanpeipindao.html");


?>

