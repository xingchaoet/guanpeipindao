<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 15:26
 */
require("include/GuanCangSmarty.php");
require("config.php");
include("db/con_mssql.php");
//include("db/con_mysql2.php");
include("db/dao.php");


$smarty = new GuanCangSmarty();

//轮播图片
$ms = new con_mssql();

$carousel = array();

$sql_carousel = "SELECT TOP 3 ggPhoto FROM bs_home_gg ORDER BY uptime DESC ";

$rs_carousel = $ms->sdb($sql_carousel);
//$carousel_data = odbc_fetch_array($rs_carousel);

while ($carousel_data = odbc_fetch_array($rs_carousel)) {
    $carousel[] = $carousel_data;
};

//$carousel_sum = array();

$count_carousel =count($carousel);

for ($i = 0; $i < $count_carousel; $i++) {

//    $carousel_sum[] = gg_ . "$i" . jpg;

    $data = base64_decode($carousel[$i]['ggPhoto']);

    $im = imagecreatefromstring($data);
    if ($im !== false) {
//        header('Content-Type: image/jpg');
        imagejpeg($im, "dist/picture/gg/gg_$i.jpg");
        imagedestroy($im);
//        echo '图片创建成功';
//        $smarty->display("create_gg_success_page.html");

    }
//    else {
//        echo 'An error occurred.';
//        $smarty->display("create_gg_error_page.html");
//
//    }
}
header("Content-Type:text/html;charset=utf-8");
$smarty->display("create_gg_success_page.html");
