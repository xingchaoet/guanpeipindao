<?php
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
header("Content-type: text/html; charset=utf-8");
$ms=new con_mssql();
$sheng1=strtolower(trim($_REQUEST['sheng']));
$sheng2=iconv('UTF-8','GBK',$sheng1);

//处理字符
$Query = "select lib_no,tsgqc from lib_base_info where ltrim(rtrim(sheng))='".trim($sheng2)."' order by tsgqc";
$AdminResult=$ms->sdb($Query);
echo "<select id='lib' name='lib' onchange=\"selectLib(this.options[this.selectedIndex].value);\">";
echo " <option value='-1' height='18'>请选择工作单位</option>";
while(odbc_fetch_row($AdminResult)){
	$lib_no1=odbc_result($AdminResult,1);
	$tsgqc1=odbc_result($AdminResult,2);
    $tsgqc2=iconv('GBK','UTF-8',$tsgqc1);

    echo "<option value='".$lib_no1."'>".$tsgqc2."</option>";
}
echo "</select>";

?>
