<?php
require_once("../config.php");
require_once("../DB/con_mssql.php");
include("../DB/dao.php");
$ms = new con_mssql();
$reback = '0';
$regdate = date("Y-m-d H:i:s", time());

$_GET['xb'] = iconv('UTF-8', 'GBK', $_GET['xb']);
$_GET['zw'] = iconv('UTF-8', 'GBK', $_GET['zw']);
$_GET['realname'] = iconv('UTF-8', 'GBK', $_GET['realname']);
$_GET['question'] = iconv('UTF-8', 'GBK', $_GET['question']);
$_GET['answer'] = iconv('UTF-8', 'GBK', $_GET['answer']);
$_GET['ddate'] = iconv('UTF-8', 'GBK', $_GET['ddate']); //发送频次

$has_user_sql = "select * from lib_lxr_info where xm = '" . trim($_GET['realname']) . "' AND lib_no = '" . trim($_GET['lib_no']) . "'";

$rs = $ms->sdb($has_user_sql);
$has_user_num = odbc_num_rows($rs);
if ($has_user_num) {

    $sql = "UPDATE lib_lxr_info  SET " .
        "user_id='" . trim($_GET['name']) .
        "',user_pwd='" . md5(trim($_GET['pwd'])) .
        "',question = '" . trim($_GET['question']) .
        "',answer = '" . trim($_GET['answer']) .
        "',dzyj1 = '" . trim($_GET['email']) .
        "',xb = '" . trim($_GET['xb']) .
        "',zw = '" . trim($_GET['zw']) .
        "',csny = '" . trim($_GET['birthday']) .
        "',bgdh = '" . trim($_GET['telephone']) .
        "',sj1 = '" . trim($_GET['mobile']) .
        "',qq1 = '" . trim($_GET['qq']) .
        "',active = '1'" .
        ",ddate = '" . trim($_GET['ddate']) .
        "',dformat = '" . trim($_GET['dformat']) .
        "',regdate = '" . trim($_GET['$regdate']) .
        "',FromType = '" . trim($_GET['dformat']) . "' where xm = '" . trim($_GET['realname']) . "' AND lib_no = '" . trim($_GET['lib_no']) . "'";

    $rs1 = $ms->sdb($sql);
    if ($rs1) {
        $reback = '1';
    }
    echo $reback;

} else {

    $sql = "insert into lib_lxr_info
    (user_id,user_pwd,question,answer,dzyj1,xm,xb,zw,csny,bgdh,sj1,qq1,active,ddate,dformat,lib_no,regdate,FromType) 
    values
    ('" . trim($_GET['name']) . "','" . md5(trim($_GET['pwd'])) . "','" . $_GET['question'] . "','" . $_GET['answer'] . "','" . $_GET['email'] . "','" . $_GET['realname'] . "','" . $_GET['xb'] . "','" . $_GET['zw'] . "','" . $_GET['birthday'] . "','" . $_GET['telephone'] . "','" . $_GET['mobile'] . "','" . $_GET['qq'] . "','1','" . $_GET['ddate'] . "','" . $_GET['dformat'] . "','" . $_GET['lib_no'] . "','" . $regdate . "','" . out . "')";

    $AdminResult = $ms->sdb($sql);
    $sql1 = "select * from lib_lxr_info where ltrim(rtrim(user_id))='" . trim($_GET['name']) . "'";
    $AdminResult1 = $ms->sdb($sql1);
    $num = odbc_num_rows($AdminResult1);
    if ($num == 1) {
        $reback = '1';
    }
    echo $reback;


}


?>