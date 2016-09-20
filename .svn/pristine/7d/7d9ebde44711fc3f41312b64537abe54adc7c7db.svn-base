<?php
header("Content-Type: text/html;charset=GB2312"); 
ini_set("max_execution_time", "1800"); 
	require_once('../PHPExcel.php');
	require_once("../DB/con_mssql.php");
	include("../DB/dao.php");
	session_start();

	// 实例化SQLServer封装类
	$ms=new con_mssql();
	// 创建MARC数据临时缓存
	$tmp_marc="";
	// 创建批次信息
	$gc_pc=date("Ymd");
	
	//设定缓存模式为经gzip压缩后存入cache（PHPExcel导入导出及大量数据导入缓存方式的修改） 
	$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip; 
	$cacheSettings = array(); 
	PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings); 
 
	$objPHPExcel = new PHPExcel();

	//读入上传文件
	if($_FILES["inputExcel"]["tmp_name"]=="")
	{
		$_SESSION['err']="未上传文件！";
		$url=PATH."gc_dr.php";
		Header("Location: $url");
	}
	else
	{
		$objPHPExcel = PHPExcel_IOFactory::load($_FILES["inputExcel"]["tmp_name"]);
		//内容转换为数组 
		$indata = $objPHPExcel->getSheet(0)->toArray();
		
		// 读取用户名
		$un=isset($_SESSION['usrn'])?trim($_SESSION['usrn']):trim($_POST["usrn"]);
		// 读取lib_no
		$sql = ser("lib_lxr_info","ID,lib_no","xm='$un'");
		$rs=$ms->sdb($sql);
		if(!$rs)
		{
			echo "Error in query preparation/execution.<br />";
			die( print_r( odbc_errormsg(), true));
		}
		if(odbc_fetch_row($rs))
		{
			$lib_no=trim(odbc_result($rs,"lib_no"));
			$rID=trim(odbc_result($rs,"ID"));
		}

		// 把数据存入SQLServer临时表lib_gc里
                $highestRow =count($indata); 
echo $highestRow;
		for ($i=1;$i<$highestRow;$i++)
		{
$isbn =$indata[$i][0];
$amount=$indata[$i][1];
echo $isbn." ";
echo $amount;
			$sql = ins("lib_gc","lib_no,gc_pc,isbn,amount,inputby,uptime","'$lib_no','$gc_pc','$isbn','$amount','$un',getdate()");
echo abc;
			$rs = $ms->sdb($sql);
echo xyz;
			if(!$rs)
			{
				$_SESSION['err']="上传失败！";
				$url=PATH."gc_up.php";
				Header("Location: $url");
			}
		}
		
		// 临时数据与馆藏数据对比（lib_gc_info）并将未收录信息插入数据库中
		$sql1= ser("lib_gc_info","isbn","lib_no='$lib_no'");
		$sql = ser("lib_gc","lib_no,gc_pc,isbn,amount,inputby,uptime","isbn not in($sql1)");
		$rs = $ms->sdb($sql);
	
		while($data=odbc_fetch_array($rs))
		{
			// echo "<br />".$data['lib_no']." || ".$data['gc_pc']." || ".$data['isbn']." || ".$data['amount']." || ".$data['inputby']." || ".$data['uptime']."<br />";
			$a=trim($data['lib_no']);
			$b=trim($data['gc_pc']);
			$c=trim($data['isbn']);
			$d=trim($data['amount']);
			$e=trim($data['inputby']);
			$f=trim($data['uptime']);
			$sql = ins("lib_gc_info","lib_no,gc_pc,isbn,amount,inputby,uptime","'$a','$b','$c','$d','$e','$f'");
			$rs1 = $ms->sdb($sql);
		}
		
		// 删除临时表中的数据
		$sql = del("lib_gc","lib_no='$lib_no' and gc_pc='$gc_pc' and inputby='$un'");
		$rs1 = $ms->sdb($sql);
		
		/* 生成初步征订单 */
		// 生成单号
		$sheet_no=$gc_pc.$lib_no.$rID;
		$sql = ser("bs_order_mx","sheet_no","lib_no='$lib_no'");
		$rs = $ms->sdb($sql);
		
		$z=0;
		while($data=odbc_fetch_array($rs))
		{
			if(substr_count($data['sheet_no'],$sheet_no)>0)
			{
				$y=intval(substr(trim($data['sheet_no']),-3));
				if($y>$z)
				{
					$z=$y;
				}
			}
		}
		$z=$z+1;
		$order=(string)$z;
		if(strlen($order)==1)
		{
			$order="00".$order;
		}
		if(strlen($order)==2)
		{
			$order="0".$order;
		}
		$sheet_no=$sheet_no.$order;
		
		// 将初步征订单存入SQLServer中bs_order_mx内
		$state=10;// 设置状态为初步征订单
		$sql = ser("fx_book_info","isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,kc_amount","isbn not in($sql1)");
		$rs = $ms->sdb($sql);
                //$rs=odbc_exec("select * from fx_book_info where isbn not in ($sql1)");
		
		while($data=odbc_fetch_array($rs))
		{
			$a=str_replace("'","‘",trim($data['isbn']));
			$b=str_replace("'","‘",trim($data['book_name']));
			$c=str_replace("'","‘",trim($data['bookcs_name']));
			$d=str_replace("'","‘",trim($data['writer']));
			$e=trim($data['price']);
			$f=trim($data['publish_date']);
			$g=str_replace("'","‘",trim($data['fenlei']));
			$h=str_replace("'","‘",trim($data['kb']));
			$i=trim($data['kc_amount']);
			//echo "<br />".$a."||".$b."||".$c."||".$d."||".$e."||".$f."||".$g."||".$h."||".$i."<br />";
		
			$sql = ins("bs_order_mx","sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,kc_amount,inputby,uptime,state,lib_no","'$sheet_no','$a','$b','$c','$d','$e','$f','$g','$h','$i','$un',getdate(),'$state','$lib_no'");
			
			$rs1 = $ms->sdb($sql);
			
		}
		
		// 加入批次表状态
		$pc_state=0;// 设置状态为未完成
		$sql = ins("bs_order_pc","sheet_no,lib_no,state,inputby,uptime,mx_state","'$sheet_no','$lib_no','$pc_state','$un',getdate(),'$state'");
		$rs = $ms->sdb($sql);
		
		//关闭连接
		$ms->clo();
		
		// 将相关信息存入session中
		$_SESSION['sheet_no']=$sheet_no;
		$_SESSION['lib_no']=$lib_no;
		$_SESSION['state']=$state;
		
		// 重定向到显示页面
		$url=FPATH."zdd_xs.php";
		if (isset($url)) 
		{ 
			Header("Location: $url"); 
		}
	}
?>