<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/19
 * Time: 8:48
 */
include("../include/GuanCangSmarty.php");
require("../config.php");
require('../PHPExcel.php');
require("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");

$user_id = $_SESSION['user_id'];
$smarty = new GuanCangSmarty();
$smarty->MySmarty();

include("../include/introduce.php");

$ms = new con_mssql();

//未处理批次

$sql_batch = ser("bs_temp_dingdan_pici", "*", "User_Id = '$user_id' AND State = '0'");
$rs_sql_batch = $ms->sdb($sql_batch);

if (!$rs_sql_batch) {
    echo "Error in query preparation/execution.<br />";
    die(print_r(odbc_errormsg(), true));
}

$need_op_batch_num = 0;

while ($data = odbc_fetch_array($rs_sql_batch)) {
    $need_op_batch_detail[] = $data;
    $need_op_batch_num = $need_op_batch_num + 1;
}


$count_need_op_batch_detail = count($need_op_batch_detail);

for ($i = 0; $i < $count_need_op_batch_detail; $i++) {

    $pi_ci = $need_op_batch_detail[$i]['PiCi_Num'];

    $sql = "SELECT Book_Id,Book_Num FROM bs_temp_dingdan WHERE Pi_Ci_No = '$pi_ci' AND Book_Num <> '0'";
//    echo $sql;

    $rs_sql = $ms->sdb($sql);

    while ($data = odbc_fetch_array($rs_sql)) {
        $book_id[] = $data['Book_Id'];
        $book_num[] = $data['Book_Num'];
    }

    $count_book_id = count($book_id);
//    echo $count_book_id;

    for ($j = 0; $j < $count_book_id; $j++) {

        $id = $book_id[$j];

        $sql = "SELECT dj FROM ecs_book WHERE book_id = '$book_id[$j]'";
        $rs_sql = $ms->sdb($sql);

        while ($data = odbc_fetch_array($rs_sql)) {
            $book_dj = $data['dj'];
        };

        $sql = "select isbn ,jz1, jz3 from v_ecs_book where bid1 = '$id' or bid3 = '$id' ";
//
        $kucun_state = $ms->sdb($sql);

        while (odbc_fetch_array($kucun_state)) {
            $jz1 = trim(odbc_result($kucun_state, "jz1"));
            $jz3 = trim(odbc_result($kucun_state, "jz3"));
        }

        if ($jz1 > 0) {
            $need_op_batch_detail[$i]['pod_paper_sum']++;


//加到总价值
            $need_op_batch_detail[$i]['pod_paper_price_sum'] += $book_dj * $book_num[$j];

//            $flag = "纸本可供";

        } else {

            if (is_numeric($jz3) && ($jz3 > 0)) {
                $need_op_batch_detail[$i]['pod_paper_sum']++;
                //加到总价值
                $need_op_batch_detail[$i]['pod_paper_price_sum'] += $book_dj * $book_num[$j];

//                $flag = "POD可供";

            } else {
                $need_op_batch_detail[$i]['planned_sum']++;
                //加到总价值
                $need_op_batch_detail[$i]['planned_price_sum'] += $book_dj * $book_num[$j];

//                echo '可预订';
            }

        }

//


        $need_op_batch_detail[$i]['sum'] = $count_book_id;

        $need_op_batch_detail[$i]['price_sum'] += $book_dj * $book_num[$j];

    }

}

$relpostodist = '../';

$smarty->assign("first_level", "<a href={$relpostodist}guanpeipindao.php>馆配服务</a>");
$smarty->assign("second_level", "<a href='chachong.php'>在线订购</a>");
$smarty->assign("relpostodist", $relpostodist);

$smarty->assign("need_op_batch_num", $need_op_batch_num);
$smarty->assign("need_op_batch_detail", $need_op_batch_detail);
//$smarty->assign("sum", $book_num);
//$smarty->assign("count_need_op_batch_detail", $count_need_op_batch_detail);

//$order_list_for_generate_page = $smarty->display("chachong/order_list_for_generate.html");
//return $order_list_for_generate_page;
$smarty->display("chachong/show_generate_order.html");