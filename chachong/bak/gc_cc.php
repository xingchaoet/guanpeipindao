<?php
header("Content-Type: text/html;charset=GB2312");
ini_set("max_execution_time", "1800");
require_once('../PHPExcel.php');
require("../db/con_mssql.php");
include("../db/dao.php");
require("../config.php");

session_start();

// ?????SQLServer?????
$ms = new con_mssql();
// ????MARC???????????
$tmp_marc = "";
// ???????????
$gc_pc = date("Ymd");

//?Ú…?????????gzip????????cache??PHPExcel????????????????????œ]???????
$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
$cacheSettings = array();
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

$objPHPExcel = new PHPExcel();

$lib_no = '';
$un = '';

//??????????
if ($_FILES["inputExcel"]["tmp_name"] == "") {
    echo '?????';
    $_SESSION['err'] = "¦Ä????????";
    $url = PATH . "gc_dr.php";
    Header("Location: $url");
} else {
//    echo '?????';

    $objPHPExcel = PHPExcel_IOFactory::load($_FILES["inputExcel"]["tmp_name"]);
//    echo $_FILES["inputExcel"]["tmp_name"];

    //????????????
    $indata = $objPHPExcel->getSheet(0)->toArray();

//    print_r($indata);


    // ????????
    $un = isset($_SESSION['usrn']) ? trim($_SESSION['usrn']) : trim($_POST["usrn"]);
    // ???lib_no
    $sql = ser("lib_lxr_info", "ID,lib_no", "xm='$un'");

    echo $un;
    echo $sql;


    $rs = $ms->sdb($sql);
    if (!$rs) {
        echo '?????????';
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    if (odbc_fetch_row($rs)) {
        $lib_no = trim(odbc_result($rs, "lib_no"));
        $rID = trim(odbc_result($rs, "ID"));

        echo '???????';
        echo $lib_no;
        echo '???id';
        echo $rID;
    }else{
        echo 'test';
    }


    // ?????????SQLServer?????lib_gc??
    //??lib_gc_info???????????excel?§Ö??????????§µ????????????????§µ??????¦Ê?????
    $highestRow = count($indata);
    echo $highestRow;
    for ($i = 1; $i < $highestRow; $i++) {
        $isbn = $indata[$i][0];
        $amount = $indata[$i][1];
//        echo $isbn . " ";
//        echo $amount;

        //?????????????
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

//        echo '????????<br>';

//        echo $sum;


        if ($sum) {
            // Do nothing
            echo "?????????isbn?{$isbn}???üž";
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
                $_SESSION['err'] = "?????????????";
//                $url = PATH . "gc_up.php";
//                Header("Location: $url");
                echo '?????????????';
            } else {
                echo '????????????';
            }
        }


    }

    //???????
    $ms->clo();

    // ????????????session??
    $_SESSION['sheet_no'] = $sheet_no;
    $_SESSION['lib_no'] = $lib_no;
    $_SESSION['state'] = $state;
}
?>