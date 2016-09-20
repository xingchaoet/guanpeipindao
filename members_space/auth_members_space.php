<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/12
 * Time: 17:14
 */
session_start();

//$uid = $_REQUEST['usrn'];
$global_url = GLOBAL_URL;

$uid = $_SESSION['user_id'];
if (empty($uid)) {
    echo "<script type='text/javascript'>alert('您还没登录!');</script>";
    echo "<script type='text/javascript'>window.location.href='http://'+\"$global_url\"+'/guanpeipindao/user/login.php';</script>";
}