<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/11
 * Time: 23:14
 */
session_start();
$global_url = GLOBAL_URL;

$uid = $_SESSION['user_id'];
if (empty($uid)) {
    echo "<script type='text/javascript'>alert('您还没登录!');</script>";
    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/user/login.php';</script>";
}

//if($_SESSION['user_type'] == "gps_user"){
//    echo "<script type='text/javascript'>alert('您是馆配商用户，只有图书馆用户才可以访问此栏目!');</script>";
//    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/guanpeipindao.php';</script>";
//}