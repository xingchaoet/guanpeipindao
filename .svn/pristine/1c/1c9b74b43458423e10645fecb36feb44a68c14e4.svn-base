<?php
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
$ms=new con_mssql();
$Query = "select * from lib_lxr_info where ltrim(rtrim(user_id))='".$_GET['name']."'";
$AdminResult=$ms->sdb($Query);
$num=odbc_num_rows($AdminResult); 
if($num == 1){
	echo '2';
}else if($num == 0){
	echo '1';
}else{
	echo $conne->msg_error();
}
?>
