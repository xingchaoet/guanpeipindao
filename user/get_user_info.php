<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/18
 * Time: 10:23
 */
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
$ms = new con_mssql();
$_GET['realname'] = iconv('UTF-8', 'GBK', $_GET['realname']);

$has_user_sql = "select user_id , FlagCheck from lib_lxr_info where xm = '" . trim($_GET['realname']) . "' AND lib_no = '" . trim($_GET['lib_no']) . "'";

$rs = $ms->sdb($has_user_sql);

if (!$rs) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
}
if (odbc_fetch_row($rs)) {
//    未在网站注册的用户是空值
    $user_id = odbc_result($rs, "user_id");
    $FlagCheck = odbc_result($rs, "FlagCheck");
//    echo urlencode(json_encode(array('user_id'=>$user_id,'FlagCheck'=>$FlagCheck)));
    echo json_encode(array('user_id' => $user_id, 'FlagCheck' => $FlagCheck));

//    echo $user_id;
} else {
    echo json_encode(array('user_id' => $user_id, 'FlagCheck' => $FlagCheck));
}