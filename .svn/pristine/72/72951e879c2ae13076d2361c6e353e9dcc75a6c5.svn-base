<?php
	require_once("../config.php");
	require_once("../DB/con_mssql.php");
	include("../DB/dao.php");
	$ms=new con_mssql();
	$reback = '0';
	$regdate=date("Y-m-d H:i:s",time());
	
	$sql = "insert into lib_lxr_info(user_id,user_pwd,question,answer,dzyj1,xm,xb,zw,csny,bgdh,sj1,qq1,active,ddate,dformat,lib_no,regdate) values('".trim($_GET['name'])."','".md5(trim($_GET['pwd']))."','".$_GET['question']."','".$_GET['answer']."','".$_GET['email']."','".$_GET['realname']."','".$_GET['xb']."','".$_GET['zw']."','".$_GET['birthday']."','".$_GET['telephone']."','".$_GET['mobile']."','".$_GET['qq']."','1','".$_GET['ddate']."','".$_GET['dformat']."','".$_GET['lib_no']."','".$regdate."')";
	//echo $sql;
	$AdminResult = $ms->sdb($sql);
	$sql1="select * from lib_lxr_info where ltrim(rtrim(user_id))='".trim($_GET['name'])."'";
	$AdminResult1 = $ms->sdb($sql1);
	$num=odbc_num_rows($AdminResult1); 
		if($num == 1){
			$reback = '1';
		}
	echo $reback;
?>