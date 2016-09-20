<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 14:49
 */
include ("libs/Smarty.class.php");
include ("db/con_mysql2.php");

$smarty = new Smarty();
$smarty->caching = false; //设置缓存方式

$con_mysql2 = new con_mysql2();

$sql = "select * from ecs_book LIMIT 0,1 ";

//$sql = "select * from v_ecs_category LIMIT 0,1 ";

$result =  $con_mysql2->sdb($sql);

//print_r($result[0]['slt']);

$smarty->assign('slt',$result[0]['slt']);

//var_dump($smarty);
$smarty->display("showmysql2.html");