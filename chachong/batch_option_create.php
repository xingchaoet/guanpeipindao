<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/24
 * Time: 13:50
 */
//include("../include/GuanCangSmarty.php");
//require_once("../config.php");
//require_once("../db/con_mssql.php");
//include("../db/dao.php");
include("auth_chachong.php");

$_SESSION['dd_pc']  = $_SESSION['dd_pc_create'] ;

echo $_SESSION['dd_pc'];