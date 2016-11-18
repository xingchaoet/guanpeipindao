<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/18
 * Time: 18:47
 */
include("../include/GuanCangSmarty.php");
require_once("../config.php");
//include("db/con_mysql2.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");
require '../plog/classes/plog.php';
Plog::set_config(include '../plog/config.php');
$log = Plog::factory(__FILE__);

$progress = $_SESSION["progress"];
echo $progress;