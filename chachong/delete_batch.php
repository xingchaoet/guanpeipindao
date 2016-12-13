<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/12/13
 * Time: 9:32
 */
include("../include/GuanCangSmarty.php");
require_once("../config.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");

require '../plog/classes/plog.php';
Plog::set_config(include '../plog/config.php');
$log = Plog::factory(__FILE__);

$sum = 0;

$delete_sum = 0;

$temp_table_pici_name = 'bs_temp_dingdan_pici';

$temp_table_name = 'bs_temp_dingdan';

$ms = new con_mssql();

$batch_id_delete = $_POST['batch_id'];

//echo $batch_id_delete;
//成功与否
$delete_batch_item_failure = false;

$delete_batch_failure = false;

//临时表明细
$sql_total = "select count(*) as sum from bs_temp_dingdan where Pi_Ci_No = '$batch_id_delete'";

$rs_sql_total = $ms->sdb($sql_total);
$data = odbc_fetch_array($rs_sql_total);
$sum = $data['sum'];
//echo $sum;
$sql_delete_batch_item = "delete  from bs_temp_dingdan where Pi_Ci_No = '$batch_id_delete'" ;

$rs_sql_delete_batch_item = $ms->sdb($sql_delete_batch_item);

$delete_sum = odbc_num_rows($rs_sql_delete_batch_item);
try {

    if ($delete_sum < $sum) {
        $delete_batch_item_failure = true;
        $error = "{$batch_id_delete} 中共有{$sum} 条，删除了$delete_sum条";
        $log->debug($error);
        throw new Exception($e);      //创建一个异常对象，通过throw语句抛出
    }

} catch (Exception $e) {
//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
    echo "未完全删除{$temp_table_name}中批次号为$batch_id_delete的内容";
}

//临时表目录

$sql_delete_batch = "delete  from bs_temp_dingdan_pici where PiCi_Num = '$batch_id_delete'"  ;

$rs_sql_delete_batch = $ms->sdb($sql_delete_batch);

try {

    if (odbc_num_rows($rs_sql_delete_batch) <= 0) {
        $delete_batch_failure = true;
        $error = "删除bs_temp_dingdan_pici中的{$batch_id_delete}失败";
        $log->debug($error);
        throw new Exception($e);      //创建一个异常对象，通过throw语句抛出
    }

} catch (Exception $e) {
//        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
}

if (!$delete_batch_failure && !$delete_batch_failure) {
    echo '删除成功！';
} else {
    echo '删除失败';
}