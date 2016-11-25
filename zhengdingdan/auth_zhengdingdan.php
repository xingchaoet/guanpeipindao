<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/4
 * Time: 15:05
 */

session_start();

$global_url = GLOBAL_URL;
$uid = $_SESSION['user_id'];

if (empty($uid)) {
    echo "<script type='text/javascript'>alert('您还没登录!');</script>";
    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/user/login.php';</script>";
}

