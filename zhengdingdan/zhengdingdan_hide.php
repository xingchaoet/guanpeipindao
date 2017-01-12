<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2017/1/5
 * Time: 17:42
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("../include/email.class.php");

include("../include/sendmail.class.php");

require_once("../config.php");
//include("../include/GuanCangSmarty.php");
include("auth_zhengdingdan.php");

$send_to ="";

$sheet_no = $_POST['sheet_no'];
$send_to = $_POST['email'];

$connect_email = $_SESSION['email'];
$connect_email =  "<a href=mailto:".$connect_email.">$connect_email</a>";

$telephone = $_SESSION['telephone'];
$cellphone = $_SESSION['cellphone'];

$xm = $_SESSION['xm'];
$xm = iconv('GBK', 'UTF-8', $_SESSION['xm']) ;
$tsgqc = iconv('GBK', 'UTF-8', $_SESSION['tsgqc']);

$email_content = $_POST['email_content'];

$email_content .= "<br><br><br><br>";
$email_content .= "<hr width=100% style=\"border:1px dashed lightgray; height:1px\">";

$email_content .= "<br>"."姓名：".$xm;
$email_content .= "<br>"."回信给：".$connect_email;
$email_content .= "<br>"."座机：".$telephone;
$email_content .= "<br>"."手机：".$cellphone;
$email_content .= "<br>"."图书馆：".$tsgqc;


$gps = $_GET['lxr'] = iconv('UTF-8', 'GBK', $_POST['gps']);


$ms = new con_mssql();
//
//$sql_email = "SELECT  email FROM gps_info WHERE gps_name = '$gps'";
//
//$rs_sql_email = $ms->sdb($sql_email);
//
//while ($gps = odbc_fetch_row($rs_sql_email)) {
//    $send_to = odbc_result($rs_sql_email, 1);
//}

//$send_to = '1363688001@qq.com';
//发送邮件
//$send_to = $_SESSION['email'];

$send_email = new SEND_EMAIL();

$send_email->smtpemailto = $send_to;

$send_email->send($email_content);


$sql = "UPDATE [dbo]." . bs_zhengdingdan . " SET  zdd_is_hide = '1'  , zdd_gps = '$gps'   WHERE zdd_pc_id = '$sheet_no'";

$rs_sql = $ms->sdb($sql);

if (odbc_num_rows($rs_sql) <= 0) {
    $error = "批次{$sheet_no}的报单失败";
    $log->debug($error);

    echo '0';

} else {

    echo '1';

}

