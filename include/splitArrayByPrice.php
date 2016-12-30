<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/29
 * Time: 14:57
 */
include_once("../auth.php");
include_once("../db/con_mssql.php");
include_once("../db/dao.php");
include_once("../config.php");


//使用价格总和拆分订单
function splitArrayByPrice($array_id, $array_num, $pod_paper_price_sum, $sum)
{
    if (empty($ms)) {
        $ms = new con_mssql();
    }
    //结果集
    $result = array();

    $boundary_sum = floor($pod_paper_price_sum / $sum);
//    分界数组
    $boundary = array();


//    第一个值置为0
    $boundary[] = 0;

    if (empty($array_id) || empty($array_num)) return array();

    $count_array_id = count($array_id);

    $temp_sum = 0;

    for ($i = 0; $i < $count_array_id; $i++) {

        $book_id = $array_id[$i];

        $sql = "SELECT dj FROM ecs_book WHERE book_id = '$book_id'";

        $rs_sql = $ms->sdb($sql);

        while ($data = odbc_fetch_array($rs_sql)) {

            $book_dj = $data['dj'];

        };
        //递增一种类书的金额总和
        $temp_sum += $book_dj * $array_num[$i];

//        若大于分割金额数
        if ($temp_sum > $boundary_sum) {
            $boundary[] = $i;
//倒退
            $i = $i - 1;
            $temp_sum = 0;
        }

    }

    $_SESSION['boundary'] = $boundary;

//        分割数组
    $count_boundary = count($boundary);

    for ($i = 0; $i < $count_boundary; $i++) {

        if ($i != $count_boundary - 1) {

            $num = $boundary[$i + 1] - $boundary[$i];

            $result[] = array_slice($array_id, $boundary[$i], $num);

        } else {

            $result[] = array_slice($array_id, $boundary[$i]);

        }

    }

//    print_r($result);

    return $result;
}
