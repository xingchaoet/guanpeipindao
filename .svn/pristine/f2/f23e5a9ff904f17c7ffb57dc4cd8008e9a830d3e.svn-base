<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 14:49
 */
include ("../libs/Smarty.class.php");
require_once("../config.php");

include ("../db/con_mysql2.php");

$smarty = new Smarty();
$smarty->caching = false; //设置缓存方式

$con_mysql2 = new con_mysql2();

////最新
//
//$sql = "select * from ecs_book  ORDER BY gxsj DESC  LIMIT 0,8";
//
////$sql = "select * from v_ecs_category LIMIT 0,1 ";
//
//$result =  $con_mysql2->sdb($sql);
//
//print_r($result);



//推荐
//
$sql = "select * from ecs_book ORDER BY gxsj DESC LIMIT 0,8 ";
//
////$sql = "select * from v_ecs_category LIMIT 0,1 ";
//
$result =  $con_mysql2->sdb($sql);
//
//print_r($result);
//




for($i = 0 ; $i < count($result); $i ++){

//    print_r($result[$i]['slt']);
    echo " <img src=http://www.ecsponline.com/".trim($result[$i]['slt'])." width=120 height=120>";
    echo '<br>';


}
//<img src=http://www.ecsponline.com".trim($newbooks[$i]['slt'])." width=120 height=120>
//$smarty->assign('slt',$result[0]['slt']);

//var_dump($smarty);
//$smarty->display("index.html");