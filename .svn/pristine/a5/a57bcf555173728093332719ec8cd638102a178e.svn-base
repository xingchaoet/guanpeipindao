<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/1
 * Time: 15:31
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require_once("../db/con_mssql.php");
require_once("../db/con_mysql2.php");
include("../db/dao.php");
require_once("../config.php");

$ms = new con_mssql();
$con_mysql2 = new con_mysql2();

//print_r($_POST);
// 有用户登录时，可从session中取用户id

$uid = $_POST['user_id'];
$book_ids = $_POST['book_ids'];
$book_id_s = explode(",", $book_ids);
//print_r($book_ids);
$book_nums = $_POST['book_nums'];
$book_num_s = explode(",", $book_nums);

$tanjia_pici_id = $_POST['tanjia_pici_id'];


$yudingdan_ids = '';
$yudingdan_nums = '';

$zhengdingdan_ids = '';
$zhengdingdan_nums = '';

//$today = date("Y-m-d H:i:s");

$gc_pc_time_prefix = date('YmdHis');

$ydd_pc = $gc_pc_time_prefix . $uid;

$zdd_pc = $gc_pc_time_prefix . $uid;

for ($i = 0; $i < count($book_id_s); $i++) {
    $id = $book_id_s[$i];
    $sql = "SELECT isbn, kc FROM ecs_book WHERE  book_id = '$id'";
    $kuncun = '';
    $isbn = '';
    $flag = '';

    $book = $con_mysql2->sdb($sql);
    while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
        $kuncun = $data['kc'];
        $isbn = $data['isbn'];
    }
    if ($kuncun > 0) {
//            echo '纸本可供';
        $flag = "纸本可供";
        $zhengdingdan_ids[] = $book_id_s[$i];
        $zhengdingdan_nums[] = $book_num_s[$i];
    } else {
        $sql_tsfl4 = ser("ecs_book", "sm,isbn,zzh,kb,cbrq,dj,kc", "jz=2 and isbn='%{$isbn}%' ");
        $rs_tsfl4 = $con_mysql2->sdb($sql_tsfl4);
        $tsfl_data4 = mysqli_fetch_assoc($rs_tsfl4);
        $dj11 = trim($tsfl_data4['dj']);
        if ($dj11 == null) {
            //echo 'POD可供';
            $flag = "可预订";
            $yudingdan_ids[] = $book_id_s[$i];
            $yudingdan_nums[] = $book_num_s[$i];
//                echo '可预订';
        } else {
            //echo '可预订';
            $flag = "POD可供";
            $zhengdingdan_ids[] = $book_id_s[$i];
            $zhengdingdan_nums[] = $book_num_s[$i];
//                echo 'POD可供';
        }
    }

}



//print_r($yudingdan_ids);
//print_r($yudingdan_nums);

if (!empty($yudingdan_ids[0])) { //预订单只合并
    $yudingdan_ids_nums = array_combine($yudingdan_ids, $yudingdan_nums);

    $yudingdan = json_encode((object)$yudingdan_ids_nums);

    $sql = ins("bs_yudingdan", "ydd_pc_id,ydd_user_id,ydd_detail,ydd_time", "'$ydd_pc','$uid','$yudingdan',GETDATE()");

//echo $sql;

    $rs = $ms->sdb($sql);

    if (!$rs) {
        echo "生成预订单失败<br>";
    } else {
        echo "生成预订单成功<br>";
    }
}


//print_r($yudingdan);
//print_r($zhengdingdan_ids); //变量为空 什么都不会打印
//print_r($zhengdingdan_nums);

//print_r($tanjia_pici_id);
//
//exit();
if (!empty($zhengdingdan_ids[0])) {

    if (empty($tanjia_pici_id)) { // 生成新征订单
        $zhengdingdan_ids_nums = array_combine($zhengdingdan_ids, $zhengdingdan_nums);
        $zhengdingdan = json_encode((object)$zhengdingdan_ids_nums);

        $sql = ins("bs_zhengdingdan", "zdd_pc_id,zdd_user_id,zdd_detail,zdd_time", "'$zdd_pc','$uid','$zhengdingdan',GETDATE()");
        $rs = $ms->sdb($sql);

        if (!$rs) {
            echo "生成征订单失败<br>";
        } else {
            echo "生成征订单成功<br>";
        }
    } else { //添加到原有征订单

        $zhengdingdan_ids_nums = array_combine($zhengdingdan_ids, $zhengdingdan_nums);
        $zhengdingdan = json_encode((object)$zhengdingdan_ids_nums);

        $sql = ser("bs_zhengdingdan", "zdd_detail", " zdd_pc_id = '$tanjia_pici_id'");
//        echo 'test';
        echo $sql;

        $rs = $ms->sdb($sql);

        while ($data = odbc_fetch_array($rs)) {
            $this_zdd_detail[] = $data;
        }

//        print_r($this_zdd_detail[0]);
        print_r(json_decode($this_zdd_detail[0]['zdd_detail'], true));
        print_r(json_decode($zhengdingdan, true ));
//
        print_r(array_merge_recursive(
                json_decode($this_zdd_detail[0]['zdd_detail'], true),
                json_decode($zhengdingdan, true )
            ));

//        $newJson = json_encode(
//        array_merge_recursive(
//                json_decode($this_zdd_detail[0]['zdd_detail'], true),
//                json_decode($zhengdingdan, true )
//            )
//        );
//
//        print_r($newJson);

        exit();

        $sql = upd("bs_zhengdingdan", "zdd_detail = '$newJson'", "zdd_pc_id = '$tanjia_pici_id'");

        $rs = $ms->sdb($sql);

        if (!$rs) {
            echo "合并征订单失败<br>";
        } else {
            echo "合并征订单成功<br>";
        }


    }


}
