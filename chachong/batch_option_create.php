<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/24
 * Time: 13:50
 */
//include("../include/GuanCangSmarty.php");
//require("../config.php");
//require("../db/con_mssql.php");
//include("../db/dao.php");
include("auth_chachong.php");

$_SESSION['dd_pc']  = $_SESSION['dd_pc_create'] ;

echo $_SESSION['dd_pc'];