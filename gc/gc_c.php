<?php
	require_once('../PHPExcel.php');
	require_once("../DB/con_mssql.php");
	include("../DB/dao.php");
	session_start();

	// 实例化SQLServer封装类
	$ms=new con_mssql();

	// 创建批次信息
	$gc_pc=date("Ymd");
	
	// 读取用户名
		$un=isset($_SESSION['usrn'])?trim($_SESSION['usrn']):trim($_GET['usrn']);
		// 读取lib_no
//		$sql = ser("lib_lxr_info","ID,lib_no","xm='$un'");

        $sql = "select ID,lib_no from dbo.lib_lxr_info where xm = '郑健'";

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

		/* 生成初步征订单 */
		// 生成单号
		$sheet_no=$gc_pc.$lib_no.$rID;
//echo '<br>';
//print_r($sheet_no);
//echo '<br>';


		$sql = ser("bs_order_mx","top 1 sheet_no","lib_no='$lib_no'");

		$rs = $ms->sdb($sql);
//        print_r(odbc_result($rs,"sheet_no"));

		$z=0;
//		while($data=odbc_fetch_array($rs))
//		{
//			if(substr_count($data['sheet_no'],$sheet_no)>0)
//			{
//				$y=intval(substr(trim($data['sheet_no']),-3));
//				if($y>$z)
//				{
//					$z=$y;
//				}
//			}
//
//		}

        $data=odbc_fetch_array($rs);

        if(substr_count($data['sheet_no'],$sheet_no)>0) //有的话意味着用户同一天前些时候已经创建了订单
        {
            $y=intval(substr(trim($data['sheet_no']),-3)); //取订单号
            if($y>$z)
            {
                $z=$y;
            }
        }

//print_r($z); //今天没生成订单的话为0


		$z=$z+1; //今天没生成订单:001;生成了订单：+1
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

//        print_r($sheet_no);


		// 将初步征订单存入SQLServer中bs_order_mx内
		$state=10;// 设置状态为初步征订单
		$sql1= ser("lib_gc_info","isbn","lib_no='$lib_no'");

//        这里需要接参数
		$sql = ser("fx_book_info","isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,kc_amount","isbn not in($sql1)");
		$rs = $ms->sdb($sql);


		while($data=odbc_fetch_array($rs))
		{
		    print_r($data);
			$a=trim($data['isbn']);
			$b=trim($data['book_name']);
			$c=trim($data['bookcs_name']);
			$d=trim($data['writer']);
			$e=trim($data['price']);
			$f=trim($data['publish_date']);
			$g=trim($data['fenlei']);
			$h=trim($data['kb']);
			$i=trim($data['kc_amount']);
			// echo "<br />".$a."||".$b."||".$c."||".$d."||".$e."||".$f."||".$g."||".$h."||".$i."<br />";
			$sql = ins("bs_order_mx","sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,kc_amount,inputby,uptime,state,lib_no","'$sheet_no','$a','$b','$c','$d','$e','$f','$g','$h','$i','$un',getdate(),'$state','$lib_no'");
			$rs1 = $ms->sdb($sql);
		}

echo "test";
exit();
		
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
?>