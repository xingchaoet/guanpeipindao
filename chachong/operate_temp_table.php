<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/4
 * Time: 14:38
 */
//include("../include/GuanCangSmarty.php");
require("../config.php");
require("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");

require '../plog/classes/plog.php';
Plog::set_config(include '../plog/config.php');
$log = Plog::factory(__FILE__);

$book_id = $_POST['book_id'];
$book_num = $_POST['book_num'];

$price = trim($_POST['price']);

$stock_state = $_POST['stock_state'];
$stock_state = trim(iconv('utf-8', 'gbk//IGNORE', $stock_state));

$user_id = $_POST['user_id'];
$add_one_book_to_order = $_POST['add_one_book_to_order'];

$lib_no = $_SESSION['lib_no'];

$dd_pc = $_SESSION['dd_pc'];

$table_name = 'bs_temp_dingdan';
//
//if (empty($_SESSION['$dd_pc'])) {
//    $dd_pc = $lib_no . '_' . $user_id . '_' . date('YmdHis', time());
//    $_SESSION['$dd_pc'] = $dd_pc;
//}
$ms = new con_mssql();

$error_appear = false;

if ($add_one_book_to_order) {//添加书籍

    $sql_temp_table = "UPDATE [dbo]." . $table_name . " SET  Book_Num = '$book_num'  , Price = '$price' , StockState = '$stock_state'    WHERE Book_Id = '$book_id' AND Pi_Ci_No = '$dd_pc'";

    $rs_sql_temp_table = $ms->sdb($sql_temp_table);

//    $open = fopen("D:/phpStudy/WWW/guanpeipindao/db/log.txt", "a");
//    fwrite($open, $sql_temp_table . "\r\n");
//    fclose($open);

    try {

        if (odbc_num_rows($rs_sql_temp_table) <= 0 ) {

            $error_appear = true;
//            echo "Error in query preparation/execution.<br />";
//                die(print_r(odbc_errormsg(), true));
            $error = " $book_id in $table_name failed";

            $log->debug($error);

            throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
        }

    } catch (Exception $e) {

//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
    }

    if (!$error_appear) {
        echo "添加成功";
    } else {
        echo "添加失败";
    }

} else { //删除书籍

    $sql_update_temp_table = "UPDATE [dbo]." . $table_name . " SET  Book_Num = '0'  WHERE Book_Id = '$book_id' AND Pi_Ci_No = '$dd_pc'";

    $rs = $ms->sdb($sql_update_temp_table);

    try {

        if (odbc_num_rows($rs) <= 0 ) {
            $error_appear = true;

//            echo "Error in query preparation/execution.<br />";
//                die(print_r(odbc_errormsg(), true));
            $error = "delete $book_id from $table_name failed";

            $log->debug($error);

            throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
        }

    } catch (Exception $e) {

//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息

    }

    if (!$error_appear) {
        echo "删除成功";
    } else {
        echo "删除失败";
    }

}




