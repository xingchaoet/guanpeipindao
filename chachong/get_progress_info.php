<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/18
 * Time: 18:47
 */
//include("../include/GuanCangSmarty.php");
require("../config.php");
//include("db/con_mysql2.php");
//require("../db/con_mssql.php");
//include("../db/dao.php");
include("auth_chachong.php");
//require '../plog/classes/plog.php';
//Plog::set_config(include '../plog/config.php');
//$log = Plog::factory(__FILE__);

//
//if (empty($_SESSION["progress"])) {
//
//    for ($i = 0.01; $i < 1; $i = $i + 0.01) {
//        $_SESSION["progress_temp"]  = $_SESSION["progress_temp"] + 0.01;
//        $progress = $_SESSION["progress_temp"];
//        sleep(100);
//    }
//
//}else{
//    $progress = $_SESSION["progress"];
//}
//$progress = $_SESSION["progress"];
//$progress = $fp[count($fp)-1];
////$progressbar = $progress * 100 ;
//
//global $progress;

echo $_SESSION["progress"];
//print_r($GLOBALS);
//$_SESSION["progress"] = 0;