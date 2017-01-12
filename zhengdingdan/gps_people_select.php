<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2017/1/12
 * Time: 15:26
 */
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
header("Content-type: text/html; charset=utf-8");
$ms = new con_mssql();
$gps1 = strtolower(trim($_REQUEST['gps']));
$gps2 = iconv('UTF-8', 'GBK', $gps1);

//处理字符
$Query = "select user_id,dzyj1 from gps_lxr_info where ltrim(rtrim(company))='" . trim($gps2) . "' order by user_id";
$AdminResult = $ms->sdb($Query);
echo "<select id='gps_people' name='gps_people' >";
echo " <option value='-1' height='18'>请选择姓名</option>";

while (odbc_fetch_row($AdminResult)) {
    $usr_name = odbc_result($AdminResult, 1);

//    $usr_name = iconv('GBK', 'UTF-8', $usr_name);

    $email = odbc_result($AdminResult, 2);

    echo "<option value='" . $email . "'>" . $usr_name . "</option>";
}
echo "</select>";

?>
