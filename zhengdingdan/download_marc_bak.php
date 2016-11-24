<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/11
 * Time: 9:06
 */
require_once("../db/con_mssql.php");
include("../db/dao.php");
require_once("../config.php");
include ("auth_zhengdingdan.php");

//session_start();

// 实例化SQLServer封装类
$ms = new con_mssql();
// 创建MARC数据临时缓存
$tmp_marc = "";
$indata = "";
//$indata = isset($_SESSION['indata']) ? $_SESSION['indata'] : "";

$sheet_no = $_REQUEST['sheet_no'];
$MARC = $_REQUEST['MARC'];
$CALIS = $_REQUEST['CALIS'];
$CF = $_REQUEST['CF'];

$EXCEL = $_REQUEST['EXCEL'];

if ($MARC||$CALIS||$CF) { //采访类型

    echo "<script type='text/javascript' charset='UTF-8'>alert('test!');</script>";

//    exit();

    $sql = ser("bs_zhengdingdan_mx", "isbn", "sheet_no='$sheet_no'");

//$sql = "SELECT isbn FROM bs_zhengdingdan_mx WHERE sheet_no='FJ0014479_a9193bf52ad7ebc906b16d262d527b23'";

    $rs = $ms->sdb($sql);

    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }

    while ($data = odbc_fetch_array($rs)) {
        $indata[] = $data;
    }


//从SQLServer中提取特定的MARC数据
    foreach ($indata as $i) {
        $sql = ser("MARC_MAIN", "marc", "ISBN='$i[isbn]'  and marc_format='3'");
        // 查询数据
        $rs = $ms->sdb($sql);
        if (!$rs) {
            echo "Error in query preparation/execution.<br />";
            die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
//        die(print_r(odbc_errormsg(), true));
        }
        if (odbc_fetch_row($rs)) {
            $tmp_marc = $tmp_marc . odbc_result($rs, "marc") . chr(13) . chr(10);
        }
    }

// 下载MARC数据
//$date = date("Ymd-H:i:m");
    $filename = 'caifang_' . $sheet_no . '.iso';
//$filename = 'caifang' . '.iso';
    if (strlen($tmp_marc) == 0) {
//        $_SESSION['err'] = iconv("GB2312", "UTF-8", "无此批书MARC数据!");
//        $_SESSION['err'] = "无此批书MARC数据!";
//        echo "<script type='text/javascript' charset='UTF-8'>alert('无此批书MARC数据!');</script>";

//        exit;
//        echo "<script type='text/javascript'>(function(){return false;}) ;</script>";

//        echo "<script type='text/javascript'> sleep(1000);</script>";
//        $uid = $_SESSION['user_id'];
//        $global_url = GLOBAL_URL;
//
//        echo "<script type='text/javascript'>window.location.href='http://$global_url/guanpeipindao/zhengdingdan/orders_view.php?usrn='+$uid;</script>";


//        echo $_SESSION['err'];
//        header('Location: ' . $_SERVER['HTTP_REFERER']);//回前一个页面
//    Header("Location: ../DLMARC/marc_piliang.php");
    } else {
        unset($_SESSION['err']);
        $open = fopen("$filename", "a+");
        fwrite($open, $tmp_marc);
        fclose($open);

//    ob_start();
//    echo $tmp_marc;
        $file = "./" . $filename;
        header("Content-Type: application/force-download");
//    header("Content-Disposition: attachment; filename=".basename($user_file));
//    Header("Content-type:application/octet-stream");
        Header("Accept-Ranges:bytes ");
        Header("Accept-Length:" . strlen($file));
        Header("Content-Disposition: attachment;filename={$filename}");
        @readfile($file);//输出文件;
        @unlink($file);
//    echo 'test';
//    echo $file;
//    ob_end_flush();
//    exit;

    }


}else if($EXCEL){//下载EXCEL格式
    $strin="GBK";
    $strout="UTF-8";

//    $state=intval(trim($_POST['state']));
    $lib_no=$_SESSION['lib_no'];
    /** Error reporting */
//    error_reporting(E_ALL);
//    ini_set('display_errors', TRUE);
//    ini_set('display_startup_errors', TRUE);
//    date_default_timezone_set('Europe/London');

    if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');

    /** Include PHPExcel */
    require_once '../PHPExcel.php';

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
        ->setLastModifiedBy("Maarten Balliauw")
        ->setTitle("Office 2007 XLSX Test Document")
        ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");

    // 查询订单
    $sql = ser("bs_zhengdingdan_mx","*","sheet_no='$sheet_no' ");
    $rs = $ms->sdb($sql);

    if (!$rs)
    {
        die('Could not connect: ' . mysql_error());
    }

    $styleArray1 = array
    (
        'font' => array
        (
            'bold' => true,
            'size'=>12,
            'color'=>array
            (
                'argb' => '00000000',
            ),
        ),
        'alignment' => array
        (
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
    );

    // 标题加粗
    $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleArray1);
    $objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($styleArray1);

    // 单元格自适应
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);

    // Add some data
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '订单号')
        ->setCellValue('B1', 'ISBN')
        ->setCellValue('C1', '书名')
        ->setCellValue('D1', '丛书名')
        ->setCellValue('E1', '作者')
        ->setCellValue('F1', '价格')
        ->setCellValue('G1', '出版日期')
        ->setCellValue('H1', '分类')
        ->setCellValue('I1', '开本')
        ->setCellValue('J1', '数量');
//        ->setCellValue('K1', '单位名称');
    $objPHPExcel->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode('0000000000000');
    $i = 2;
    while($data =odbc_fetch_array($rs))
    {
        $objPHPExcel->getActiveSheet()
            ->setCellValue('A'.$i, iconv($strin,$strout,trim($data['sheet_no'])))
            ->setCellValue('B'.$i, iconv($strin,$strout,trim($data['isbn'])))
            ->setCellValue('C'.$i, iconv($strin,$strout,trim($data['book_name'])))
            ->setCellValue('D'.$i, iconv($strin,$strout,trim($data['bookcs_name'])))
            ->setCellValue('E'.$i, iconv($strin,$strout,trim($data['writer'])))
            ->setCellValue('F'.$i, iconv($strin,$strout,trim($data['price'])))
            ->setCellValue('G'.$i, iconv($strin,$strout,trim($data['publish_date'])))
            ->setCellValue('H'.$i, iconv($strin,$strout,trim($data['fenlei'])))
            ->setCellValue('I'.$i, iconv($strin,$strout,trim($data['kb'])))
            ->setCellValue('J'.$i, iconv($strin,$strout,trim($data['amount'])));
//            ->setCellValue('K'.$i, iconv($strin,$strout,trim($tsgqc)));
        $i ++;
    }

    //关闭连接
    $ms->clo();

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('bookingsheet');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel;charset=gb2312');
    header("Content-Disposition: attachment;filename={$sheet_no}.xls");
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;

}


?>
