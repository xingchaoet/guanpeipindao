<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/8
 * Time: 9:46
 */
include("include/GuanCangSmarty.php");
require_once("config.php");
//include("db/con_mysql2.php");
require_once("db/con_mssql.php");
include("db/dao.php");
include("auth.php");

require 'plog/classes/plog.php';
Plog::set_config(include 'plog/config.php');
$log = Plog::factory(__FILE__);


$temp_table_pici_name = 'bs_temp_dingdan_pici';

$temp_table_name = 'bs_temp_dingdan';

$ms = new con_mssql();

$previous_max_sequence_number = 0;

//控制显示
$_SESSION['first_search_two_types'] = false;

$_SESSION['start_purchase_two_types'] = true;

//写入数据库的数据
$temp_table_two_types = $_SESSION['temp_table_two_types'];
$table_name = 'bs_temp_dingdan';

$user_id = $_POST['user_id'];
$batch_option = $_POST['batch_option'];


$lib_no = $_SESSION['lib_no'];

if ($batch_option == "create_new_batch") {

    $dd_pc = $lib_no . '_' . $user_id . '_' . date('YmdHis', time());
    $_SESSION['dd_pc'] = $dd_pc;
//选择创建新批次时使用
    $_SESSION['dd_pc_create'] = $dd_pc;


//批次号表
    $sql_add_to_temp_table_batch = "
        INSERT INTO [dbo]." . $temp_table_pici_name
        . " (User_Id, PiCi_Num,State,Date_Time)
        VALUES ('$user_id', '$dd_pc','0',GETDATE())";

    $rs_sql_add_to_temp_table_batch = $ms->sdb($sql_add_to_temp_table_batch);

    try {

        if (!$rs_sql_add_to_temp_table_batch) {

            $error = "insert $dd_pc to $temp_table_pici_name failed";
            $log->debug($error);
            throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
        }

    } catch (Exception $e) {
//    echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
    }

} else if ($batch_option == "add_to_previous_batch") {

    $dd_pc = $_SESSION['dd_pc'];

    $sql_get_sequence_number = "select max(Sequence_Number) as Max_Sequence_Number from  " . $table_name . " WHERE Pi_Ci_No = '$dd_pc'";

    $rs = $ms->sdb($sql_get_sequence_number);
    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
    }

    if (odbc_fetch_row($rs)) {
        $previous_max_sequence_number = odbc_result($rs, "Max_Sequence_Number");
    }

}


$progress_num = 0;
//while ($data = odbc_fetch_array($temp_table)) {

$sum = count($temp_table_two_types);


if ($batch_option == "create_new_batch") {
    for ($i = 0; $i < $sum; $i++) {
        session_start();
        $bid = $temp_table_two_types[$i];
//        IsChecked 默认为0

        $sql_add_to_temp_table = "
        INSERT INTO [dbo]." . $temp_table_name
            . " (Book_Id,Book_Num, State,User_Id,Pi_Ci_No,Date_Time,Sequence_Number)
        VALUES ('$bid', '0','0','$user_id','$dd_pc',GETDATE(),'$i')";

//        $open = fopen("D:/phpStudy/WWW/guanpeipindao/db/log.txt", "a");
//        fwrite($open, $sql_add_to_temp_table . "\r\n");
//        fclose($open);

        $rs_sql_add_to_temp_table = $ms->sdb($sql_add_to_temp_table);

        try {

            if (!$rs_sql_add_to_temp_table) {

                $error = "insert $bid to $temp_table_name failed";
                $log->debug($error);
                throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
            }

        } catch (Exception $e) {
//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
        }

        $progress_num++;

        $_SESSION['progress_two_types'] = floor($progress_num * 100 / $sum);
        session_write_close();

    }
} else if ($batch_option == "add_to_previous_batch") {

    for ($i = 0; $i < $sum; $i++) {
        session_start();
        $bid = $temp_table_two_types[$i];
//        IsChecked 默认为0

        $sequence_number = $previous_max_sequence_number + $i + 1;
        $sql_add_to_temp_table = "
        INSERT INTO [dbo]." . $temp_table_name
            . " (Book_Id,Book_Num, State,User_Id,Pi_Ci_No,Date_Time,Sequence_Number)
        VALUES ('$bid', '0','0','$user_id','$dd_pc',GETDATE(),'$sequence_number')";

        $rs_sql_add_to_temp_table = $ms->sdb($sql_add_to_temp_table);

        try {

            if (!$rs_sql_add_to_temp_table) {

                $error = "insert $bid to $temp_table_name failed";
                $log->debug($error);
                throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
            }

        } catch (Exception $e) {
//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
        }

        $progress_num++;

        $_SESSION['progress_two_types'] = floor($progress_num * 100 / $sum);
        session_write_close();

    }
}



