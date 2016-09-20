<?php
header("Content-Type: text/html;charset=GB2312");
ini_set("max_execution_time", "1800");
require_once('../PHPExcel.php');
require_once("../db/con_mssql.php");
include("../db/dao.php");
require_once("../config.php");

session_start();

// 实例化SQLServer封装类
$ms = new con_mssql();
// 创建MARC数据临时缓存
$tmp_marc = "";
// 创建批次信息
$gc_pc = date("Ymd");

//设定缓存模式为经gzip压缩后存入cache（PHPExcel导入导出及大量数据导入缓存方式的修改）
$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
$cacheSettings = array();
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

$objPHPExcel = new PHPExcel();

$lib_no = '';
$un = '';

//读入上传文件
if ($_FILES["inputExcel"]["tmp_name"] == "") {
    echo '无文件';
    $_SESSION['err'] = "未上传文件！";
    $url = PATH . "gc_dr.php";
    Header("Location: $url");
} else {
//    echo '有文件';

    $objPHPExcel = PHPExcel_IOFactory::load($_FILES["inputExcel"]["tmp_name"]);
//    echo $_FILES["inputExcel"]["tmp_name"];

    //内容转换为数组
    $indata = $objPHPExcel->getSheet(0)->toArray();

//    print_r($indata);


    // 读取用户名
    $un = isset($_SESSION['usrn']) ? trim($_SESSION['usrn']) : trim($_POST["usrn"]);
    // 读取lib_no
    $sql = ser("lib_lxr_info", "ID,lib_no", "xm='$un'");

    echo $un;
    echo $sql;


    $rs = $ms->sdb($sql);
    if (!$rs) {
        echo '这里出错了';
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    if (odbc_fetch_row($rs)) {
        $lib_no = trim(odbc_result($rs, "lib_no"));
        $rID = trim(odbc_result($rs, "ID"));

        echo '图书馆代号';
        echo $lib_no;
        echo '用户id';
        echo $rID;
    }else{
        echo 'test';
    }


    // 把数据存入SQLServer临时表lib_gc里
    //查看lib_gc_info表中是否已有excel中的数据，若没有，把数据直接存入；若有，不做任何事情
    $highestRow = count($indata);
    echo $highestRow;
    for ($i = 1; $i < $highestRow; $i++) {
        $isbn = $indata[$i][0];
        $amount = $indata[$i][1];
//        echo $isbn . " ";
//        echo $amount;

        //用图书馆号和用户名
        $sql_info = ser(lib_gc_info, "count(*) as sum", "lib_no = '$lib_no' AND isbn='$isbn'");
//
//        $sql_info = "SELECT count(*) as sum FROM lib_gc_info WHERE isbn='$isbn'";

        echo $sql_info;

        $rs_info = $ms->sdb($sql_info);


        $data = odbc_fetch_array($rs_info);

//        while($data = odbc_fetch_array($rs_info)){
//            print_r($data);
//        };


        $sum = $data['sum'];

//        echo '有没有用户<br>';

//        echo $sum;


        if ($sum) {
            // Do nothing
            echo "馆藏中已有isbn为{$isbn}的书籍";
        } else {

            $a = $lib_no;
            $b = $gc_pc;
            $c = $isbn;
            $d = $amount;
            $e = $un;
            $f = date("Y-m-d H:i:s");
            $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime", "'$a','$b','$c','$d','$e','$f'");
            $rs = $ms->sdb($sql);




            if (!$rs) {
                $_SESSION['err'] = "馆藏数据导入失败";
//                $url = PATH . "gc_up.php";
//                Header("Location: $url");
                echo '馆藏数据导入失败';
            } else {
                echo '馆藏数据导入成功';
            }
        }


    }

    //关闭连接
    $ms->clo();

    // 将相关信息存入session中
    $_SESSION['sheet_no'] = $sheet_no;
    $_SESSION['lib_no'] = $lib_no;
    $_SESSION['state'] = $state;
}
?>