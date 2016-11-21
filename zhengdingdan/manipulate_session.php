<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/7
 * Time: 13:57
 */
include("../include/GuanCangSmarty.php");
require_once("../config.php");
//include("db/con_mysql2.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("auth_zhengdingdan.php");
require '../plog/classes/plog.php';
Plog::set_config(include '../plog/config.php');
$log = Plog::factory(__FILE__);

$_SESSION['start_purchase'] = true;

$temp_table = $_SESSION['temp_table'];

$user_id = $_POST['user_id'];
$lib_no = $_SESSION['lib_no'];

$dd_pc = $lib_no . '_' . $user_id . '_' . date('YmdHis', time());
$_SESSION['dd_pc'] = $dd_pc;

$temp_table_pici_name = 'bs_temp_dingdan_pici';

$temp_table_name = 'bs_temp_dingdan';

$ms = new con_mssql();

$sql_add_to_temp_table_batch = "
        INSERT INTO [dbo]." . $temp_table_pici_name
    . " (User_Id, PiCi_Num,State,Date_Time)
        VALUES ('$user_id', '$dd_pc','0',GETDATE())";

$rs_sql_add_to_temp_table_batch = $ms->sdb($sql_add_to_temp_table_batch);

try {

    if (!$rs_sql_add_to_temp_table_batch) {

//        echo "Error in query preparation/execution.<br />";
//                die(print_r(odbc_errormsg(), true));

        $error = "insert $dd_pc to $temp_table_pici_name failed";
        $log->debug($error);
        throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
    }

} catch (Exception $e) {

//    echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息

}

$progress_num = 0;
//while ($data = odbc_fetch_array($temp_table)) {

$sum = count($temp_table);

for ($i = 0; $i < $sum; $i++) {
    session_start();
//        $tsfl_data3_array[] = $data;
    $bid = $temp_table[$i];
//        IsChecked 默认为0
    $sql_add_to_temp_table = "
        INSERT INTO [dbo]." . $temp_table_name
        . " (Book_Id,Book_Num, State,User_Id,Pi_Ci_No,Date_Time,Sequence_Number)
        VALUES ('$bid', '0','0','$user_id','$dd_pc',GETDATE(),'$i')";

    $rs_sql_add_to_temp_table = $ms->sdb($sql_add_to_temp_table);

    try {

        if (!$rs_sql_add_to_temp_table) {

//            echo "Error in query preparation/execution.<br />";
//                die(print_r(odbc_errormsg(), true));

            $error = "insert $bid to $temp_table_name failed";
            $log->debug($error);
            throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
        }

    } catch (Exception $e) {
//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
    }

//    $sequence_number++;
    $progress_num++;
//    if (!$progress_num%10) {

    $_SESSION['progress'] = floor($progress_num * 100 / $sum);
//    $progress = floor($progress_num * 100/ $sum);
    session_write_close();
//    }


//    $open = fopen("D:/phpStudy/WWW/guanpeipindao/zhengdingdan/log.txt", "a");
//    fwrite($open, $_SESSION['progress'] . "\r\n");
//    fclose($open);

//    echo $progress_num;
}

//}

//echo $sequence_number ;
//
//print_r($dd_pc);

