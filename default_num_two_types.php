<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/8
 * Time: 10:40
 */
//include("include/GuanCangSmarty.php");
//require_once("config.php");
//include("db/con_mysql2.php");
//require_once("db/con_mssql.php");
//include("db/dao.php");
include("auth.php");
//require 'plog/classes/plog.php';
//Plog::set_config(include 'plog/config.php');
//$log = Plog::factory(__FILE__);

$default_num_two_types = $_POST["default_num_two_types"];

if ($default_num_two_types > 5) {
    $default_num_two_types = 5;
} else if ($default_num_two_types < 1) {
    $default_num_two_types = 1;
}

$_SESSION['default_num_two_types'] = $default_num_two_types;


print_r($_SESSION['default_num_two_types']);