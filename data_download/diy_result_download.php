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

session_start();

// 实例化SQLServer封装类
$ms = new con_mssql();
// 创建MARC数据临时缓存
// 创建MARC数据临时缓存
$tmp_marc = "";
$tmp_calis = "";
$tmp_cf = "";

$MARC_file = "";
$CALIS_file = "";
$CF_file = "";

$MARC_filename = "";
$CALIS_filename = "";
$CF_filename = "";
//print_r($_SESSION[data_diy_isbns]);
//exit();
$indata = $_SESSION[data_diy_isbns];

$sheet_no = date('YmdHis', time());
//$indata_marc = "";
//$indata_calis = "";
//$indata_cf = "";

//$indata = isset($_SESSION['indata']) ? $_SESSION['indata'] : "";

//$sheet_no = $_REQUEST['sheet_no'];

$MARC = $_REQUEST['MARC'];
$CALIS = $_REQUEST['CALIS'];
$CF = $_REQUEST['CF'];

$EXCEL = $_REQUEST['EXCEL'];

if ($MARC || $CALIS || $CF) { //采访类型

    $zip = new ZipArchive();
    $zipname = date('YmdHis', time()) . '.zip';
//$zipname_file = $zipname . '.zip';

    if ($zip->open($zipname, ZIPARCHIVE::CREATE) !== TRUE) {
        exit ('无法打开文件，或者文件创建失败');
    }
//
//    $sql = ser("bs_zhengdingdan_mx", "isbn", "sheet_no='$sheet_no'");
//
////$sql = "SELECT isbn FROM bs_zhengdingdan_mx WHERE sheet_no='FJ0014479_a9193bf52ad7ebc906b16d262d527b23'";
//
//    $rs = $ms->sdb($sql);
//
//    if (!$rs) {
//        echo "Error in query preparation/execution.<br />";
//        die(print_r(odbc_errormsg(), true));
//    }
//
//    while ($data = odbc_fetch_array($rs)) {
//        $indata[] = $data;
//    }


    if ($MARC) {

//        $sql = ser("bs_zhengdingdan_mx", "isbn", "sheet_no='$sheet_no'");
//
////$sql = "SELECT isbn FROM bs_zhengdingdan_mx WHERE sheet_no='FJ0014479_a9193bf52ad7ebc906b16d262d527b23'";
//
//        $rs = $ms->sdb($sql);
//
//        if (!$rs) {
//            echo "Error in query preparation/execution.<br />";
//            die(print_r(odbc_errormsg(), true));
//        }
//
//        while ($data = odbc_fetch_array($rs)) {
//            $indata_marc[] = $data;
//        }

//从SQLServer中提取特定的MARC数据
        foreach ($indata as $i) {
            $sql = ser("MARC_MAIN", "marc", "ISBN='$i[isbn]'  and marc_format='1'");
            // 查询数据
            $rs = $ms->sdb($sql);
            if (!$rs) {
                echo "Error in query preparation/execution.<br />";
                die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
            }
            if (odbc_fetch_row($rs)) {
//                if (!empty(odbc_result($rs, "marc"))) {
                $tmp_marc = $tmp_marc . odbc_result($rs, "marc") . chr(13) . chr(10);
//                }
            }
        }
// 下载CF数据
        $MARC_filename = 'marc_' . $sheet_no . '.iso';
        if (strlen($tmp_marc) == 0) {
        } else {
            unset($_SESSION['err']);
            $open = fopen("$MARC_filename", "a+");
            fwrite($open, $tmp_marc);
            fclose($open);
            $MARC_file = $MARC_filename;
            $zip->addFile($MARC_file);
//            header("Content-Type: application/force-download");
//            Header("Accept-Ranges:bytes ");
//            Header("Accept-Length:" . strlen($file));
//            Header("Content-Disposition: attachment;filename={$filename}");
//            @readfile($file);//输出文件;
//            @unlink($file);
        }
    }

    if ($CALIS) {
//
//        $sql = ser("bs_zhengdingdan_mx", "isbn", "sheet_no='$sheet_no'");
//
////$sql = "SELECT isbn FROM bs_zhengdingdan_mx WHERE sheet_no='FJ0014479_a9193bf52ad7ebc906b16d262d527b23'";
//
//        $rs = $ms->sdb($sql);
//
//        if (!$rs) {
//            echo "Error in query preparation/execution.<br />";
//            die(print_r(odbc_errormsg(), true));
//        }
//
//        while ($data = odbc_fetch_array($rs)) {
//            $indata_calis[] = $data;
//        }

//从SQLServer中提取特定的MARC数据
        foreach ($indata as $i) {
            $sql = ser("MARC_MAIN", "marc", "ISBN='$i[isbn]'  and marc_format='2'");
            // 查询数据
            $rs = $ms->sdb($sql);
            if (!$rs) {
                echo "Error in query preparation/execution.<br />";
                die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
            }
            if (odbc_fetch_row($rs)) {

//                if (!empty(odbc_result($rs, "marc"))) {

                $tmp_calis = $tmp_calis . odbc_result($rs, "marc") . chr(13) . chr(10);

//                }
            }
        }
// 下载CF数据
        $CALIS_filename = 'calis_' . $sheet_no . '.iso';
        if (strlen($tmp_calis) == 0) {
        } else {
            unset($_SESSION['err']);
            $open = fopen("$CALIS_filename", "a+");
            fwrite($open, $tmp_calis);
            fclose($open);
            $CALIS_file = $CALIS_filename;
            $zip->addFile($CALIS_file);
        }
    }

    if ($CF) {

//        $sql = ser("bs_zhengdingdan_mx", "isbn", "sheet_no='$sheet_no'");
//
////$sql = "SELECT isbn FROM bs_zhengdingdan_mx WHERE sheet_no='FJ0014479_a9193bf52ad7ebc906b16d262d527b23'";
//
//        $rs = $ms->sdb($sql);
//
//        if (!$rs) {
//            echo "Error in query preparation/execution.<br />";
//            die(print_r(odbc_errormsg(), true));
//        }
//
//        while ($data = odbc_fetch_array($rs)) {
//            $indata_cf[] = $data;
//        }

//从SQLServer中提取特定的MARC数据
        foreach ($indata as $i) {
            $sql = ser("MARC_MAIN", "marc", "ISBN='$i[isbn]'  and marc_format='3'");
            // 查询数据
            $rs = $ms->sdb($sql);
            if (!$rs) {
                echo "Error in query preparation/execution.<br />";
                die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
            }
            if (odbc_fetch_row($rs)) {
//                if (!empty(odbc_result($rs, "marc"))) {

                $tmp_cf = $tmp_cf . odbc_result($rs, "marc") . chr(13) . chr(10);

//                }
            }
        }
// 下载CF数据
        $CF_filename = 'cf_' . $sheet_no . '.iso';
        if (strlen($tmp_cf) == 0) {
        } else {
            unset($_SESSION['err']);
            $open = fopen("$CF_filename", "a+");
            fwrite($open, $tmp_cf);
            fclose($open);
            $CF_file = $CF_filename;
            $zip->addFile($CF_file);
//            header("Content-Type: application/force-download");
//            Header("Accept-Ranges:bytes ");
//            Header("Accept-Length:" . strlen($file));
//            Header("Content-Disposition: attachment;filename={$filename}");
//            @readfile($file);//输出文件;
//            @unlink($file);
        }
    }

    $zip->close();
    $zipfile = dirname(__FILE__) . '\\' . $zipname;

//if (file_exists($zipfile)) {
//    echo filesize ( $zipfile );
//}

//$open = fopen("D:/WWW/guanpeipindao/data_download/filesize.txt", "a");
//fwrite($open, filesize($zipfile) . "\r\n");
//fclose($open);

    $size = filesize($zipfile);

//下面是输出下载;
    header("Cache-Control: max-age=0");
    header("Content-Description: File Transfer");
    header("Accept-Ranges: bytes");
    header('Content-disposition: attachment; filename=' . basename($zipname)); // 文件名
    header("Content-Type: application/zip"); // zip格式的
    header("Transfer-Encoding: binary"); // 告诉浏览器，这是二进制文件
    header('Content-Length: ' . $size); // 告诉浏览器，文件大小
    @readfile($zipfile);//输出文件;

    unlink($zipfile); //下载完成后要进行删除

    @unlink($MARC_file);
    @unlink($CALIS_file);
    @unlink($CF_file);
    @unlink($EXCEL_file);
    unset($MARC_filename);
    unset($CALIS_filename);
    unset($CF_filename);
    unset($EXCEL_filename);

} else if ($EXCEL) {//下载EXCEL格式
    $strin = "GBK";
    $strout = "UTF-8";

//    $state=intval(trim($_POST['state']));
//    $lib_no = $_SESSION['lib_no'];
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

    $excel_data = array();

    // 查询订单
    for ($index = 0; $index < count($indata); $index++) {

        $isbn_i = $indata[$index]['isbn'];

        if (is_numeric($isbn_i) && ((strlen($isbn_i) == 11) || ((strlen($isbn_i) == 13)))) {

            $sql = ser("v_ecs_book", "*", "isbn='$isbn_i'");

            $rs = $ms->sdb($sql);
//
//        if (!$rs) {
//            die('Could not connect: ' . mysql_error());
//        }

            while ($data = odbc_fetch_array($rs)) {
                $excel_data[$index]['isbn'] = ($data['isbn']);
                $excel_data[$index]['sm'] = trim($data['sm']);
                $excel_data[$index]['csm'] = trim($data['csm']);
                $excel_data[$index]['zzh'] = trim($data['zzh']);
                $excel_data[$index]['dj1'] = trim($data['dj1']);
                $excel_data[$index]['cbrq'] = trim($data['cbrq']);
                $excel_data[$index]['sl'] = trim($data['sl']);
                $excel_data[$index]['kb'] = trim($data['kb']);

            }

        }

    }
//    $sql = ser("bs_zhengdingdan_mx", "*", "sheet_no='$sheet_no' ");
//    $rs = $ms->sdb($sql);
//
//    if (!$rs) {
//        die('Could not connect: ' . mysql_error());
//    }

    $styleArray1 = array
    (
        'font' => array
        (
            'bold' => true,
            'size' => 12,
            'color' => array
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
//        ->setCellValue('A1', '订单号')
        ->setCellValue('A1', 'ISBN')
        ->setCellValue('B1', '书名')
        ->setCellValue('C1', '丛书名')
        ->setCellValue('D1', '作者')
        ->setCellValue('E1', '价格')
        ->setCellValue('F1', '出版日期')
        ->setCellValue('G1', '分类')
        ->setCellValue('H1', '开本');
//        ->setCellValue('J1', '数量');
//        ->setCellValue('K1', '单位名称');
    $objPHPExcel->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode('0000000000000');
    $i = 2;
//    while ($data = odbc_fetch_array($rs)) {
    for ($index = 0; $index < count($excel_data); $index++) {
        $objPHPExcel->getActiveSheet()
//            ->setCellValue('A' . $i, iconv($strin, $strout, trim($data['sheet_no'])))
            ->setCellValue('A' . $i, iconv($strin, $strout, trim($excel_data[$index]['isbn'])))
            ->setCellValue('B' . $i, iconv($strin, $strout, trim($excel_data[$index]['sm'])))
            ->setCellValue('C' . $i, iconv($strin, $strout, trim($excel_data[$index]['csm'])))
            ->setCellValue('D' . $i, iconv($strin, $strout, trim($excel_data[$index]['zzh'])))
            ->setCellValue('E' . $i, iconv($strin, $strout, trim($excel_data[$index]['dj1'])))
            ->setCellValue('F' . $i, iconv($strin, $strout, trim($excel_data[$index]['cbrq'])))
            ->setCellValue('G' . $i, iconv($strin, $strout, trim($excel_data[$index]['sl'])))
            ->setCellValue('H' . $i, iconv($strin, $strout, trim($excel_data[$index]['kb'])));
        $i++;
    }

//            ->setCellValue('J' . $i, iconv($strin, $strout, trim($data['amount'])));
//            ->setCellValue('K'.$i, iconv($strin,$strout,trim($tsgqc)));
//        $i++;
//    }

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
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;

}


?>
