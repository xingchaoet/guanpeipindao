<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 16:17
 */

require_once("../config.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");

include("../include/GuanCangSmarty.php");

include("auth_members_space.php");

$new_password = $_POST['new_password'];

//echo $new_password;

$user_pwd = md5($new_password);

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

$ms = new con_mssql();

if ($user_type == 'library_user') {
    $sql = upd("lib_lxr_info", "user_pwd = '$user_pwd'", "ID = '$user_id'");
}elseif ($user_type == 'gps_user'){
    $sql = upd("gps_lxr_info", "user_pwd = '$user_pwd'", "ID = '$user_id'");
}

//$sql = "UPDATE lib_lxr_info SET user_pwd = $user_pwd WHERE ID = $user_id";

//echo $sql;
//$open = fopen("D:/WWW/guanpeipindao/members_space/sql.txt", "a");
//fwrite($open, $sql . "\r\n");
//fclose($open);

//exit();

$rs = $ms->sdb($sql);

if ($rs) {
    echo "更新密码成功";
} else {
    echo "更新密码失败";
}