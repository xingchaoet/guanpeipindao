<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 8:17
 */

session_start();
$global_url = GLOBAL_URL;

$uid = $_SESSION['user_id'];
if (empty($uid)) {
    echo "<script type='text/javascript'>alert('您还没登录!');</script>";
    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/user/login.php';</script>";
}

//$_SESSION['user_type'] == "gps_user";
$user_type = $_SESSION['user_type'];

