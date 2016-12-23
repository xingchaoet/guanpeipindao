<?php
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once('../PHPExcel.php');
require("../db/con_mssql.php");
require("../db/con_mysql2.php");
include("../db/dao.php");
require("../config.php");

session_start();

// 实例化SQLServer封装类
$ms = new con_mssql();
// 创建MARC数据临时缓存
$tmp_marc = "";
//$gc_pc = date("Ymd");

$today = date("Y-m-d H:i:s");

$gc_pc_time_prefix = date('YmdHis');
// 创建批次信息
$gc_dr_pc = '';
//设定缓存模式为经gzip压缩后存入cache（PHPExcel导入导出及大量数据导入缓存方式的修改）
$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
$cacheSettings = array();
PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

$objPHPExcel = new PHPExcel();

$lib_no = '';
$un = '';
$isbn = '';
$xm = '';
//读入上传文件

//var_dump($_FILES);
//exit();

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
    $rID = $un;
    // 读取lib_no
    $sql = ser("lib_lxr_info", "xm,lib_no", "ID='$un'");
//
//    echo $un;
//    echo $sql;

    $book_info = new con_mysql2();

    $rs = $ms->sdb($sql);
    if (!$rs) {
//        echo '这里出错了';
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    if (odbc_fetch_row($rs)) {
        $lib_no = trim(odbc_result($rs, "lib_no"));
        $xm = trim(odbc_result($rs, "xm"));

//        echo '图书馆代号';
//        echo $lib_no;
//        echo '用户id';
//        echo $rID;
//        echo '用户姓名';
//        echo $xm;
    } else {
//        echo 'test';
    }

    // 把数据存入SQLServer临时表lib_gc里
    //查看lib_gc_info表中是否已有excel中的数据，若没有，把数据直接存入；若有，不做任何事情
    $highestRow = count($indata);
//    echo $highestRow;
    $flag = 0;//是否写入批次表

    for ($i = 1; $i < $highestRow; $i++) {
        $isbn = $indata[$i][0];
        $amount = $indata[$i][1];
//        echo $isbn . " ";
//        echo $amount;
        //用图书isbn号和用户id
        $sql_info = ser(lib_gc_info, "count(*) as sum", "isbn='$isbn' AND inputby='$un'");
//
//        $sql_info = "SELECT count(*) as sum FROM lib_gc_info WHERE isbn='$isbn'";
//        echo $sql_info;
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
            echo "馆藏中已有isbn为{$isbn}的书籍<br>";
        } else {

//            $sql_book_info = ser("ecs_book", "dj,csm,sm,zzh,cbrq,sl,kb", "isbn='$isbn'");

//            $sql_book_info = "SELECT dj,csm,sm,zzh,str_to_date(cbrq, '%Y%m%d') as cbrqi,sl,kb FROM ecs_book WHERE isbn="."'$isbn'" ;
            $sql_book_info = "SELECT dj,csm,sm,zzh,cbrq,sl,kb FROM ecs_book WHERE isbn=" . "'$isbn'";

//            echo $sql_book_info;

            $rs_book_info = $book_info->sdb($sql_book_info);

//            var_dump($rs_book_info);
            $book_data = $rs_book_info->fetch_array(MYSQLI_ASSOC);
//            $book_data = ($rs_book_info.fetch_row());

//            print_r($book_data);
//            exit();
            if (strstr($book_data['cbrq'], "-")) {
                if(substr_count($book_data['cbrq'],"-") == 1){
                    $book_data['cbrq'] = $book_data['cbrq'].'-01';
                }
                str_replace("-", "/", $book_data['cbrq']);
            }


            $price1 = $book_data['dj'];
            $bookcs_name1 = iconv('UTF-8', 'GBK', $book_data['csm']);
            $book_name1 = iconv('UTF-8', 'GBK',  $book_data['sm']);
            $writer1 = iconv('UTF-8', 'GBK',  $book_data['zzh']) ;
//            $writer = "test";
//            echo $writer;

            $publish_date1 = $book_data['cbrq'];

            $fenlei1 = $book_data['sl'];
            $kb1 = $book_data['kb'];

            $lib_no1 = $lib_no;
            $gc_pc1 = $gc_pc_time_prefix . $lib_no . $un;
            $isbn1 = $isbn;
            $amount1 = $amount;
            $inputby1 = $un;
            $uptime1 = $today;

//            $bookcs_name1 = 'test1';
//            $book_name1 = 'test2';
//            $writer1 = 'test3';
//
//
//            $bookcs_name1 = '中文1';
//            $book_name1 = '中文2';
//            $writer1 = '中文3';

            $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime,price,bookcs_name,book_name,writer,publish_date,fenlei,kb","'$lib_no1','$gc_pc1','$isbn1','$amount1','$inputby1','$uptime1','$price1','$bookcs_name1','$book_name1','$writer1','$publish_date1','$fenlei1','$kb1'");
//price可以
//            $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime,price,publish_date,fenlei,kb","'$lib_no1','$gc_pc1','$isbn1','$amount1','$inputby1','$uptime1','$price1','$publish_date1','$fenlei1','$kb1'");

//              $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime,price,bookcs_name,publish_date,fenlei,kb","'$lib_no1','$gc_pc1','$isbn1','$amount1','$inputby1','$uptime1','$price1','$bookcs_name1','$publish_date1','$fenlei1','$kb1'");


//            $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime,writer,publish_date,fenlei,kb", "'$a','$gc_dr_pc','$c','$d','$e','$f','$writer','$publish_date','$fenlei','$kb'");

//            $sql = "INSERT INTO lib_gc_info (lib_no,gc_pc,isbn,amount,inputby,uptime,price,bookcs_name,book_name,writer,publish_date,fenlei,kb) VALUES ('$a','$gc_dr_pc','$c','$d','$e','$f','$price','$bookcs_name','$book_name','$writer','$publish_date','$fenlei','$kb')";

            echo $sql;

//            $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime,publish_date,fenlei,kb", "'$a','$gc_dr_pc','$c','$d','$e','$f','$publish_date','$fenlei','$kb'");
//049成功，271失败
//            $sql = ins("lib_gc_info", "lib_no,gc_pc,isbn,amount,inputby,uptime", "'$a','$gc_dr_pc','$c','$d','$e','$f'");

            $rs = $ms->sdb($sql);

            if (!$rs) {
                $_SESSION['err'] = "导入isbn为{$isbn}的书籍失败<br>";
//                $url = PATH . "gc_up.php";
//                Header("Location: $url");
                echo "导入isbn为{$isbn}的书籍失败<br>";
            } else {
                echo "导入isbn为{$isbn}的书籍成功<br>";

                //写入批次表
                //成功一本书就建立批次，批次只建立一次

//                echo 'test';

                $sql_pc = ser(bs_gcdr_pc, "count(*) as sum", "gc_dr_pc ='$gc_dr_pc'");

//                echo $sql_pc;

                $rs_pc = $ms->sdb($sql_pc);

//                print_r($rs_pc);

                $data = odbc_fetch_array($rs_pc);

                print_r($data);


                $sum = $data['sum'];

                print_r($sum);

                if($sum == '0'){
                    $sql = ins("bs_gcdr_pc", "gc_dr_pc,lib_no,inputby,uptime", "'$gc_dr_pc','$lib_no','$un','$today'");
                    $rs = $ms->sdb($sql);
                }
            }
        }

    }


    //关闭连接
    $ms->clo();

    // 将相关信息存入session中
//    $_SESSION['sheet_no'] = $sheet_no;
    $_SESSION['lib_no'] = $lib_no;
//    $_SESSION['state'] = $state;
}
?>