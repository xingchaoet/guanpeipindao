<?php
session_start();
header('Content-Type:text/html;charset=UTF-8');
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
$name = addslashes($_GET['name']);
$pwd = $_GET['pwd'];
if(!empty($name) and !empty($pwd)){
	$ms=new con_mssql();
	$sql = "select xm,count,active,lib_no,zw,ID,user_id,user_pwd from lib_lxr_info where ltrim(rtrim(user_id)) = '".$name."'";
	$rs1 = $ms->sdb($sql);
	
	$xm=trim(odbc_result($rs1,1));
	$count=odbc_result($rs1,2);
	$active=odbc_result($rs1,3);
	$lib_no=trim(odbc_result($rs1,4));
	$zw=trim(odbc_result($rs1,5));
    $ID=trim(odbc_result($rs1,6));
    $uid=trim(odbc_result($rs1,7));
    $ud=trim(odbc_result($rs1,8));

    $ms0=new con_mssql();
	$sql0 = "select tsgqc from lib_base_info where ltrim(rtrim(lib_no)) = '".$lib_no."'";
	$rs0 = $ms0->sdb($sql0);
	$tsgqc=trim(odbc_result($rs0,1));
	
	if($active == ''){
		if(is_null($_COOKIE['count']) or $_COOKIE['count'] == 0){
			setcookie('count',1);
		}else{
			setcookie('count',$_COOKIE['count']+1);
		}
		$reback = 4;
	}else if($active == 0){
		$reback = '0';
	}else if($count >= 30){
		$reback = '3';
	}else{
		$sql .= " and user_pwd = '".md5($pwd)."'";
		$rs2 = $ms->sdb($sql);
		$num2=odbc_num_rows($rs2);
		if($num2 == 0 or $num2 == ''){
			$sql3="update lib_lxr_info set count = ".($count+1)." where ltrim(rtrim(user_id)) = '".$name."'";
			$rs3 = $ms->sdb($sql3);
			$reback = ($count+1);
		}else{
			if($count != 0){
				$sql3="update lib_lxr_info set count = 0 where ltrim(rtrim(user_id)) = '".$name."'";
				$rs3 = $ms->sdb($sql3);	
			}
			if(isset($_COOKIE['count']) and $_COOKIE['count'] != 0){
				setcookie('count',0);
			}
			setcookie('name',$name,time()+60*10);
			setcookie('xm',$xm);
			setcookie('lib_no',$lib_no);
			setcookie('tsgqc',$tsgqc);
			setcookie('zw',$zw);

            $_SESSION['username'] = $uid;
            $_SESSION['islogin'] = 1;
            $_SESSION['user_id'] = $ID;

            $_SESSION['user_type'] = "library_user";


            $_SESSION['name'] = $name;
			$_SESSION['xm'] = $xm;
			$_SESSION['lib_no'] = $lib_no;
			$_SESSION['tsgqc'] = $tsgqc;
			$_SESSION['zw'] = $zw;
            $_SESSION['ud'] = $ud;
			$reback = '-1';
		}
	}
}
echo $reback;
?>