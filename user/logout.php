<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/27
 * Time: 1:56
 */

require("../config.php");

session_start();
session_unset();
session_destroy();
setcookie(session_name(),"",time()-3600,"/");

setcookie('count',"");
setcookie('name',"");
setcookie('xm',"");
setcookie('lib_no',"");
setcookie('tsgqc',"");
setcookie('zw',"");
setcookie('gps_no',"");
$global_url = GLOBAL_URL;
header("location:http://".$global_url."/guanpeipindao.php");
