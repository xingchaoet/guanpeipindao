<?php
	require_once('../PHPExcel.php');
	require_once("../DB/con_mssql.php");
	include("../DB/dao.php");
	session_start();

	// ʵ����SQLServer��װ��
	$ms=new con_mssql();

	// ����������Ϣ
	$gc_pc=date("Ymd");
	
	// ��ȡ�û���
		$un=isset($_SESSION['usrn'])?trim($_SESSION['usrn']):trim($_GET['usrn']);
		// ��ȡlib_no
//		$sql = ser("lib_lxr_info","ID,lib_no","xm='$un'");

        $sql = "select ID,lib_no from dbo.lib_lxr_info where xm = '֣��'";

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

		/* ���ɳ��������� */
		// ���ɵ���
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

        if(substr_count($data['sheet_no'],$sheet_no)>0) //�еĻ���ζ���û�ͬһ��ǰЩʱ���Ѿ������˶���
        {
            $y=intval(substr(trim($data['sheet_no']),-3)); //ȡ������
            if($y>$z)
            {
                $z=$y;
            }
        }

//print_r($z); //����û���ɶ����Ļ�Ϊ0


		$z=$z+1; //����û���ɶ���:001;�����˶�����+1
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


		// ����������������SQLServer��bs_order_mx��
		$state=10;// ����״̬Ϊ����������
		$sql1= ser("lib_gc_info","isbn","lib_no='$lib_no'");

//        ������Ҫ�Ӳ���
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
		
		// �������α�״̬
		$pc_state=0;// ����״̬Ϊδ���
		$sql = ins("bs_order_pc","sheet_no,lib_no,state,inputby,uptime,mx_state","'$sheet_no','$lib_no','$pc_state','$un',getdate(),'$state'");
		$rs = $ms->sdb($sql);
		
		//�ر�����
		$ms->clo();
		
		// �������Ϣ����session��
		$_SESSION['sheet_no']=$sheet_no;
		$_SESSION['lib_no']=$lib_no;
		$_SESSION['state']=$state;
		
		// �ض�����ʾҳ��
		$url=FPATH."zdd_xs.php";
		if (isset($url)) 
		{ 
			Header("Location: $url"); 
		}
?>