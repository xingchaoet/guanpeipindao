<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/24
 * Time: 14:35
 */
require_once("../config.php");
require_once("../DB/con_mssql.php");
include("../DB/dao.php");
$ms = new con_mssql();
$reback = '0';
$regdate = date("Y-m-d H:i:s", time());

//$_GET['xb'] = $_GET['xb'];


$_GET['company'] = iconv('UTF-8', 'GBK', $_GET['company']);
$_GET['lxr'] = iconv('UTF-8', 'GBK', $_GET['lxr']);

//dzyj1 邮箱
$sql = "insert into gps_lxr_info 
(user_id,user_pwd,dzyj1,bgdh,sj1,qq1,active,regdate,lxr,company,FromType) 
values
('" . trim($_GET['name']) . "','" . md5(trim($_GET['pwd'])) . "','" . $_GET['email'] . "','" . $_GET['telephone'] . "','" . $_GET['mobile'] . "','" . $_GET['qq'] . "','1','" . $regdate . "','" . $_GET['lxr'] . "','" . $_GET['company'] . "','" . out . "')";
//echo $sql;

//$open = fopen("D:/WWW/guanpeipindao/zhengdingdan/sql.txt", "a");
//fwrite($open, $sql . "\r\n");
//fclose($open);


$AdminResult = $ms->sdb($sql);
$sql1 = "select * from gps_lxr_info where ltrim(rtrim(user_id))='" . trim($_GET['name']) . "'";
$AdminResult1 = $ms->sdb($sql1);
$num = odbc_num_rows($AdminResult1);
if ($num == 1) {
    $reback = '1';
}
echo $reback;
?>