<?php
header("Content-Type: text/html;charset=GB2312"); 	
session_start();
	require_once("../config.php");
	require_once('../PHPExcel.php');
	require_once("../DB/con_mssql.php");
	include("../DB/dao.php");
	session_start();
	if(isset($_SESSION['err']))
	{$err=$_SESSION['err'];}
	else
	{$err="";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<title>馆藏数据导入</title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="<?php echo PATH; ?>gc_cc.php" method="post" enctype="multipart/form-data"> 
	<input type="hidden" name="usrn" value="郑健"/>
    <input type="hidden" name="leadExcel" value="true"> 
    <table align="center" width="770PX" border="0">
	
      <tr>
         <td colspan="7"><a href="<?php echo PATH; ?>gc_moban.xlsx">模板下载</a>&nbsp;&nbsp;上传馆藏数据<input type="file" name="inputExcel" id="inputExcel" ><input type="submit" value="导入数据"></td>
      </tr>
	  <tr>
         <td colspan="7" align="center"><b>（中转站）本馆馆藏数据上传临时库</b></td>
      </tr>
	<tr><td colspan="7">
	<table align="center" width="770PX" border="1" cellspacing=0>
	
	  <tr><td width="100PX">批次号</td><td width="180PX">导入日期</td><td width="98PX">导入人</td><td width="98PX">品种</td><td width="98PX">册数</td><td width="98PX">对应馆</td><td width="98PX">操作</td></tr>
	<?php
	$ms_gc=new con_mssql();
	$sql_gc = ser("lib_gc","lib_no,gc_pc,count(*) jls,sum(amount) amount,inputby,uptime"," inputby='管理员' group by lib_no,gc_pc,inputby,uptime");
	$rs_gc = $ms_gc->sdb($sql_gc);
	while($ts_gc=odbc_fetch_array($rs_gc))
	{
	echo "<tr><td>".$ts_gc['gc_pc']."</td><td>".$ts_gc['uptime']."</td><td>".$ts_gc['inputby']."</td><td>".$ts_gc['jls']."</td><td>".$ts_gc['amount']."</td><td>".$ts_gc['lib_no']."</td><td><input type='submit' name='submit_delete' value='删除' />&nbsp;&nbsp;<input type='submit' name='submit_up' value='上传' /></td></tr>"	;
	}
	?>
	</table></td></tr>
	 <tr>
         <td colspan="7" align="center"><B>（正式库）本馆馆藏数据最终结果</b></td>
    </tr> 
	<table align="center" width="770PX" border="1" cellspacing=0>
	<tr><td width="100PX">批次号</td><td width="180PX">导入日期</td><td width="98PX">导入人</td><td width="98PX">品种</td><td width="98PX">册数</td><td width="98PX">对应馆</td><td width="98PX">操作</td></tr>
	<?php
	$ms_gc2=new con_mssql();
	$sql_gc2 = ser("lib_gc_info","lib_no,gc_pc,count(*) jls,sum(amount) amount,inputby,uptime"," lib_no='JS0001' group by lib_no,gc_pc,inputby,uptime order by uptime desc");
	$rs_gc2 = $ms_gc2->sdb($sql_gc2);
	while($ts_gc2=odbc_fetch_array($rs_gc2))
	{
	echo "<tr><td>".$ts_gc2['gc_pc']."</td><td>".$ts_gc2['uptime']."</td><td>".$ts_gc2['inputby']."</td><td>".$ts_gc2['jls']."</td><td>".$ts_gc2['amount']."</td><td>".$ts_gc2['lib_no']."</td><td>无执行操作权限</td></tr>"	;
	}
	?>
	</table> </td></tr> 
    </table>
</form>
<a href="<?php echo PATH; ?>gc_c.php?usrn=郑健">直接生成征订单</a>
<p>返回</p>
<a href="<?php echo FPATH; ?>zdd_dd.php?usrn=郑健">未完成征订单筛选</a>
<p><font color="red"><?php echo $err; ?></font></p>
</body>
</html>