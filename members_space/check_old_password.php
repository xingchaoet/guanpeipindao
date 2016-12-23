<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 17:43
 */
require_once("../config.php");
//require("../db/con_mssql.php");
//include("../db/dao.php");
//require("../db/con_mysql2.php");

//include("../include/GuanCangSmarty.php");

include("auth_members_space.php");

$old_password = $_POST['old_password'];

$ud = $_SESSION['ud'];

if (md5($old_password) != $ud) {
    echo "1";
}else{
    echo "0";
}
