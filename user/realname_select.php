<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 11:01
 */
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
header("Content-type: text/html; charset=utf-8");
$ms = new con_mssql();
$lib1 = strtolower(trim($_GET['lib']));
$lib2 = iconv('UTF-8', 'GBK', $lib1);

//处理字符
$Query = "select xm from lib_lxr_info where ltrim(rtrim(lib_no))='" . trim($lib2) . "' order by xm";

$AdminResult = $ms->sdb($Query);
//echo "<select id='realname' name='realname' onchange=\"document.getElementById('realname_input').value=this.value\">";
echo "<select id='realname' name='realname' onchange='select_input();'>";
echo "<option  height='18'>请输入或选择姓名</option>";
while (odbc_fetch_row($AdminResult)) {
    $rn1 = odbc_result($AdminResult, 1);
    $rn2 = iconv('GBK', 'UTF-8', $rn1);
    echo "<option value='" . $rn2 . "'>" . $rn2 . "</option>";
}
echo "</select>";
//right
echo "<input id=\"realname_input\" name=\"realname_input\" onblur='get_user_info();'
style=\"position:absolute;width:170px;height:14px;left:52px;top:2px;
border-bottom:0px;border-right:0px;border-left:0px;border-top:0px;\">";
//right

?>
