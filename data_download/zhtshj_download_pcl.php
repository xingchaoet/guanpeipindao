<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 10:04
 */
require("../db/con_mssql.php");
include("../db/dao.php");
require("../config.php");
require("../class/pclzip.lib.php");

include ("auth_data_download.php");


// 实例化SQLServer封装类
$ms = new con_mssql();
// 创建MARC数据临时缓存
$tmp_marc = "";
$tmp_calis = "";
$tmp_cf = "";
$tmp_excel = "";

$zhtshj_no = $_REQUEST['zhtshj_no'];

$MARC = $_REQUEST['MARC'];
$CALIS = $_REQUEST['CALIS'];
$CF = $_REQUEST['CF'];
$EXCEL = $_REQUEST['EXCEL'];

$MARC_file = "";
$CALIS_file = "";
$CF_file = "";
$EXCEL_file = "";

$MARC_filename = "";
$CALIS_filename = "";
$CF_filename = "";
$EXCEL_filename = "";

//$zip = new ZipArchive();

$zipname = date('YmdHis', time()) . '.zip';
////$zipname_file = $zipname . '.zip';
//
//if ($zip->open($zipname, ZIPARCHIVE::CREATE) !== TRUE) {
//    exit ('无法打开文件，或者文件创建失败');
//}

$archive = new PclZip($zipname.'.zip');


//}
//$zip->addFile('./'.'data_download.php');
//exit();

//下载MARC格式
if ($MARC) {
//从SQLServer中提取特定的MARC数据
    $sql = ser("bs_marc_seminar", " MarcGt", "id='$zhtshj_no'");

    // 查询数据
    $rs = $ms->sdb($sql);
    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
    }
    if (odbc_fetch_row($rs)) {
        $tmp_marc = $tmp_marc . odbc_result($rs, "MarcGt");
    }

// 下载MARC数据
    $MARC_filename = 'MARC_' . $zhtshj_no . '.iso';
    if (strlen($tmp_marc) == 0) {
        $_SESSION['err'] = "无此批书MARC数据!";
        echo "<script type='text/javascript'>alert('无此批书MARC数据!');</script>";

        $global_url = GLOBAL_URL;

        echo "<script type='text/javascript'>window.location.href='http://$global_url/data_download/data_download.php';</script>";

    } else {
        unset($_SESSION['err']);
        $open = fopen("$MARC_filename", "a+");
        fwrite($open, $tmp_marc);
        fclose($open);

//        echo "testtest";

//        $file = "./" . $MARC_filename;
        $MARC_file = "./" . $MARC_filename;;
//        $zip->addFile($MARC_file);
        $archive->add($MARC_file, PCLZIP_OPT_REMOVE_PATH);

//        header("Content-Type: application/force-download");
//        Header("Accept-Ranges:bytes ");
//        Header("Accept-Length:" . strlen($file));
//        Header("Content-Disposition: attachment;filename={$MARC_filename}");
//        @readfile($file);//输出文件;
//        @unlink($file);
//        unset($tmp_marc);

    }
}


//下载CALIS格式
if ($CALIS) { //采访类型
//从SQLServer中提取特定的MARC数据
    $sql = ser("bs_marc_seminar", "isnull(MarcCalis,'') MarcCalis", "id='$zhtshj_no'");

    // 查询数据
    $rs = $ms->sdb($sql);
    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
    }
    if (odbc_fetch_row($rs)) {
        $tmp_calis = $tmp_calis . odbc_result($rs, "MarcCalis");
    }

// 下载MARC数据
    $CALIS_filename = 'Calis_' . $zhtshj_no . '.iso';
    if (strlen($tmp_calis) == 0) {
        $_SESSION['err'] = "无此批书CALIS数据!";
        echo "<script type='text/javascript'>alert('无此批书CALIS数据!');</script>";

        $global_url = GLOBAL_URL;

        echo "<script type='text/javascript'>window.location.href='http://$global_url/data_download/data_download.php';</script>";

    } else {
        unset($_SESSION['err']);
        $open = fopen("$CALIS_filename", "a+");
        fwrite($open, $tmp_calis);
        fclose($open);

        $CALIS_file = "./" . $CALIS_filename;
//        $zip->addFile($CALIS_file);
        $archive->add(($CALIS_file), PCLZIP_OPT_REMOVE_PATH);

//        header("Content-Type: application/force-download");
//        Header("Accept-Ranges:bytes ");
//        Header("Accept-Length:" . strlen($file));
//        Header("Content-Disposition: attachment;filename={$CALIS_filename}");
//        @readfile($file);//输出文件;
//        @unlink($file);
//        unset($tmp_calis);
    }
}


//下载CF格式
if ($CF) { //采访类型
//从SQLServer中提取特定的MARC数据
    $sql = ser("bs_marc_seminar", "MarcCf", "id='$zhtshj_no'");

    // 查询数据
    $rs = $ms->sdb($sql);
    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
    }
    if (odbc_fetch_row($rs)) {
        $tmp_cf = $tmp_cf . odbc_result($rs, "MarcCf");
    }

// 下载MARC数据
    $CF_filename = 'MarcCf_' . $zhtshj_no . '.iso';
    if (strlen($tmp_cf) == 0) {
        $_SESSION['err'] = "无此批书采访数据!";
        echo "<script type='text/javascript'>alert('无此批书采访数据!');</script>";

        $global_url = GLOBAL_URL;

        echo "<script type='text/javascript'>window.location.href='http://$global_url/data_download/data_download.php';</script>";

    } else {
        unset($_SESSION['err']);
        $open = fopen("$CF_filename", "a+");
        fwrite($open, $tmp_cf);
        fclose($open);

        $CF_file = "./" . $CF_filename;
//        $zip->addFile($CF_file);
        $archive->add(($CF_file), PCLZIP_OPT_REMOVE_PATH);

//        header("Content-Type: application/force-download");
//        Header("Accept-Ranges:bytes ");
//        Header("Accept-Length:" . strlen($file));
//        Header("Content-Disposition: attachment;filename={$CF_filename}");
//        @readfile($file);//输出文件;
//        @unlink($file);
//        unset($tmp_cf);
    }
}

//下载EXCEL格式
if ($EXCEL) {
    //从SQLServer中提取特定的MARC数据
    $sql = ser("bs_marc_seminar", "MarcExcel", "id='$zhtshj_no'");

    // 查询数据
    $rs = $ms->sdb($sql);
    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
    }
    if (odbc_fetch_row($rs)) {
        $tmp_excel = $tmp_excel . odbc_result($rs, "MarcExcel");
    }

// 下载数据
    $EXCEL_filename = 'MarcExcel_' . $zhtshj_no . '.xls';
    if (strlen($tmp_excel) == 0) {
        $_SESSION['err'] = "无此批书Excel数据!";
        echo "<script type='text/javascript'>alert('无此批书Excel数据!');</script>";

        $global_url = GLOBAL_URL;

        echo "<script type='text/javascript'>window.location.href='http://$global_url/data_download/data_download.php';</script>";

    } else {
        unset($_SESSION['err']);
        $open = fopen("$EXCEL_filename", "a+");
        fwrite($open, $tmp_excel);
        fclose($open);

        $EXCEL_file = "./" . $EXCEL_filename;
//        $zip->addFile($EXCEL_file);
        $archive->add((($EXCEL_file)), PCLZIP_OPT_REMOVE_PATH);

//        header("Content-Type: application/force-download");
//        Header("Accept-Ranges:bytes ");
//        Header("Accept-Length:" . strlen($file));
//        Header("Content-Disposition: attachment;filename={$EXCEL_filename}");
//        @readfile($file);//输出文件;
//        @unlink($file);
//        unset($tmp_excel);
    }
}
//$zip->close();
$zipfile = dirname(__FILE__) . '\\' . $zipname;

//if (file_exists($zipfile)) {
//    echo filesize ( $zipfile );
//}



//下面是输出下载;
header("Cache-Control: max-age=0");
header("Content-Description: File Transfer");
header("Accept-Ranges: bytes");
header('Content-disposition: attachment; filename=' . basename($zipname)); // 文件名
header("Content-Type: application/zip"); // zip格式的
header("Transfer-Encoding: binary"); // 告诉浏览器，这是二进制文件
//header ( "Transfer-Encoding: chunked" ); //不确定消息长度的时候使用
header('Content-Length: ' . filesize($zipfile)); // 告诉浏览器，文件大小
@readfile($zipfile);//输出文件;

//
//header("Content-Type: application/force-download");
//Header("Accept-Ranges:bytes ");
//Header("Accept-Length:" . strlen($file_path));
//Header("Content-Disposition: attachment;filename={$zipname_file}");
//@readfile($file_path);//输出文件;


//    unlink(); //下载完成后要进行删除

@unlink($MARC_file);
@unlink($CALIS_file);
@unlink($CF_file);
@unlink($EXCEL_file);
unset($MARC_filename);
unset($CALIS_filename);
unset($CF_filename);
unset($EXCEL_filename);


?>
