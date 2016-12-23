<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/16
 * Time: 19:02
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

$default_num = $_POST["default_num"];

if ($default_num > 5) {
    $default_num = 5;
} else if ($default_num < 1) {
    $default_num = 1;
}

$_SESSION['default_num'] = $default_num;


print_r($_SESSION['default_num']);