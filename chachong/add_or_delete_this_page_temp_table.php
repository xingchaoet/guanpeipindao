<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/8
 * Time: 9:25
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require("../db/con_mssql.php");
//require("../db/con_mysql2.php");
include("../db/dao.php");
require("../config.php");
require '../plog/classes/plog.php';
Plog::set_config(include '../plog/config.php');
$log = Plog::factory(__FILE__);
include("auth_chachong.php");

//session_start();
$ms = new con_mssql();

$book_ids = $_POST['book_ids'];
$book_nums = $_POST['book_nums'];

$prices = $_POST['prices'];
$stock_states = $_POST['stock_states'];

//print_r($book_ids);

$option = $_POST['option'];

//$lib_no = 'FJ0014';
$table_name = 'bs_temp_dingdan';
$dd_pc = $_SESSION['dd_pc'];

//$lib_no = $_SESSION['lib_no'];

//$uid = $_POST['user_id'];

$book_id_s = explode(",", $book_ids);

//print_r($book_id_s);

$total = count($book_id_s);

$error_appear = 0;

$error_place = array();

//print_r($option);
////从首页加入订单过来 没数量
//if (empty($book_nums)) {
//    $book_nums = 1;
//}
$book_num_s = explode(",", $book_nums);

$price_s = explode(",", $prices);

$stock_state_s = explode(",", $stock_states);

if ($option == 'add') {//添加书籍

    $count_book_id_s = count($book_id_s);

    for ($i = 0; $i < $count_book_id_s; $i++) {

        $book_id = $book_id_s[$i];
        $book_num = $book_num_s[$i];

        $price = $price_s[$i];
        $stock_state = trim(iconv('utf-8', 'gbk//IGNORE', $stock_state_s[$i])) ;

        //    $sql_add_to_temp_table = "INSERT INTO [dbo]." . $table_name . " (Book_Id,Book_Num, State,User_Id,Pi_Ci_No,Date_Time) VALUES ('$book_id',$book_num, '0','$user_id','$zdd_pc',GETDATE())";
        $sql_update_temp_table = "UPDATE [dbo]." . $table_name . " SET  Book_Num = '$book_num'  ,  Price = '$price' , StockState = '$stock_state'     WHERE Book_Id = '$book_id' AND Pi_Ci_No = '$dd_pc'";

//


        $rs_sql_update_temp_table = $ms->sdb($sql_update_temp_table);

        try {

            if (odbc_num_rows($rs_sql_update_temp_table) <= 0) {

                $error_place[] = $i;

                echo "Error in query preparation/execution.<br />";
//                die(print_r(odbc_errormsg(), true));
                $error_appear = $error_appear + 1;

                $error = "add $book_id to $dd_pc failed";

                $log->debug($error);

                throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
            }

        } catch (Exception $e) {

            echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息

        }


    }

    if ($error_appear == 0) {

        echo '添加成功';

    } else {

        if ($error_appear == $total) {
            echo "无一添加成功";
        } else {
            $count_error_place = count($error_place);
            $error_msg = "第";
            for ($j = 0; $j < $count_error_place; $j++) {
                $error_msg .= $j . ',';
            }
            $error_msg .= "本书添加失败";

            echo $error_msg;
        }
    }

} else if ($option == 'delete') { //删除书籍

    $count_book_id_s = count($book_id_s);

    for ($i = 0; $i < $count_book_id_s; $i++) {

        $book_id = $book_id_s[$i];
        $sql_update_temp_table = "UPDATE [dbo]." . $table_name . " SET  Book_Num = '0' , Price = '0' , StockState = ''  WHERE Book_Id = '$book_id' AND Pi_Ci_No = '$dd_pc'";

//        $open = fopen("D:/phpStudy/WWW/guanpeipindao/db/log.txt", "a");
//        fwrite($open, $sql_update_temp_table . "\r\n");
//        fclose($open);

        $rs_sql_update_temp_table = $ms->sdb($sql_update_temp_table);

        try {

            if (odbc_num_rows($rs_sql_update_temp_table) <= 0) {

                $error_place[] = $i;

                echo "Error in query preparation/execution.<br />";

//                die(print_r(odbc_errormsg(), true));
                $error = "delete $book_id from $dd_pc failed";

                $error_appear = $error_appear + 1;

                $log->debug($error);

                throw new Exception($error);      //创建一个异常对象，通过throw语句抛出
            }

        } catch (Exception $e) {

            echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息

        }

    }

    if ($error_appear == 0) {

        echo '删除成功';

    } else {

        if ($error_appear == $total) {
            echo "无一删除成功";
        } else {
            $count_error_place = count($error_place);
            $error_msg = "第";
            for ($j = 0; $j < $count_error_place; $j++) {
                $error_msg .= $j . ',';
            }
            $error_msg .= "本书删除失败";

            echo $error_msg;
        }
    }

}