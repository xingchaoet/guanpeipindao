<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/27
 * Time: 15:44
 */

include("../include/GuanCangSmarty.php");


require_once("../config.php");

include("../db/con_mysql2.php");

require_once('../PHPExcel.php');
require_once("../db/con_mssql.php");
require_once("../db/con_mysql2.php");
require_once("../db/con_mysql3.php");
include("../db/dao.php");
session_start();

//var_dump($_POST);

$pici_id = $_POST['pici_id'];

$ms = new con_mssql();

$sql = del("bs_gcdr_pc", "gc_dr_pc='$pici_id'");

$rs = $ms->sdb($sql);

$sql_gc_info = del("lib_gc_info", "gc_pc='$pici_id'");

$rs_gc_info = $ms->sdb($sql_gc_info);

if ($rs && $rs_gc_info) {
    echo 'success';
}

?>