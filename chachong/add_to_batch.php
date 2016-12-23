<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/25
 * Time: 11:25
 */
//include("../include/GuanCangSmarty.php");
require("../config.php");
//require("../db/con_mssql.php");
//include("../db/dao.php");
include("auth_chachong.php");
$pre_pi_ci = $_POST['batch_id'];
//$_SESSION['add_to_new_so_insert'] = 1;
$_SESSION['dd_pc']  = $pre_pi_ci;
session_write_close();
//echo $_SESSION['dd_pc'];