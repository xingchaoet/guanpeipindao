<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/10/11
 * Time: 15:13
 */
header("Content-Type: text/html;charset=UTF-8");
ini_set("max_execution_time", "1800");
require("../db/con_mssql.php");
include("../db/dao.php");
require("../config.php");
include("auth_chachong.php");
include("../include/splitArray.php");
include("../include/splitArrayByPrice.php");

$all_batch_ids = array();

$lib_no = $_SESSION['lib_no'];

//$uid = $_POST['user_id'];

$uid = $_SESSION['user_id'];

$type = $_POST['type'];
$num = $_POST['num'];

$pod_paper_price_sum = $_POST['pod_paper_price_sum'];

$ms = new con_mssql();

//生成单个批次
if (!empty($_POST['batch_id'])) {
//    $book_id_s = explode(",", $book_ids);
    $all_batch_ids[] = $_POST['batch_id'];
}

//合并多个批次
if (!empty($_POST['batch_ids'])) {
//    $book_id_s = explode(",", $book_ids);
    $all_batch_ids = explode(",", $_POST['batch_ids']);
}

//print_r($all_batch_ids);

$count_all_batch_ids = count($all_batch_ids);

//echo $count_all_batch_ids;
//echo "\n";

if ($count_all_batch_ids == 0) {
    echo '请选择需要合并的订单';
    exit();
}

//征订单批次号
if ($count_all_batch_ids >= 2) {

//    $zdd_pc = $lib_no . '_' . $uid . '_' . date('YmdHis', time());

    $zdd_pc = $lib_no . '_' . $uid . '_' . date('YmdHis', time()) . '_' . microtime(true);

    $zdd_pc = str_replace(".", "_", $zdd_pc);

} else {

    $zdd_pc = $all_batch_ids[0];

}

//$batch_id = $_POST['batch_id'];

//预订单批次号
$ydd_pc = $lib_no . $uid;

//从临时表中获取订单明细

$book_id_s = array();
$book_num_s = array();
$stock_state_s = array();

$yudingdan_ids = array();
$yudingdan_nums = array();
$zhengdingdan_ids = array();

$ydd_isbn_list = array();
$ydd_amount_list = array();
$ydd_id_list = array();

$transfer_isbn = array();
$transfer_amount = array();
$transfer_id = array();

for ($index = 0; $index < $count_all_batch_ids; $index++) {

//    echo "第{$index}个订单";
    echo "\n";
    $dd_pc = $all_batch_ids[$index];

    $sql_dd_pc = "SELECT Book_Id,Book_Num,StockState FROM bs_temp_dingdan WHERE Pi_Ci_No = '$dd_pc' AND Book_Num <> 0 AND State = 0";
    $rs_sql_dd_pc = $ms->sdb($sql_dd_pc);

    try {
        if (!$rs_sql_dd_pc) {
            $error = "查询bs_temp_dingdan出错";
            $log->debug($error);
            throw new Exception($e);      //创建一个异常对象，通过throw语句抛出
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";  //输出捕获的异常消息
    }

    while ($data = odbc_fetch_array($rs_sql_dd_pc)) {

        $book_id_s[] = $data['Book_Id'];
        $book_num_s[] = $data['Book_Num'];
//库存状态变化并不大，从临时表中取
        $stock_state_s[] = trim(iconv('gbk', 'utf-8//IGNORE', $data['StockState']));
    };

//print_r($book_id_s);
//print_r($book_num_s);

//征订单批次
//$zdd_pc = $lib_no . $uid . '_' . md5($search_TJ);
//$zdd_pc = $lib_no . '_' . $uid . '_' . date('YmdHis', time());
//    $zdd_pc = $dd_pc;

//$zdd_pc = $dd_pc . '_' . date('YmdHis', time());


//将书籍分为两类，征订单和预订单
//print_r($book_ids);

//if (!empty($book_ids)) {
    if (!empty($book_id_s)) {

//    征订单与预订单的处理 开始

        $gc_pc_time_prefix = date('YmdHis');

        $count_book_id_s = count($book_id_s);

        for ($i = 0; $i < $count_book_id_s; $i++) {

//            $id = $book_id_s[$i];
//
//            $sql = "select isbn ,jz1, jz3 from v_ecs_book where bid1 = '$id' or bid3 = '$id' ";
////
//            $kucun_state = $ms->sdb($sql);
//
//            while (odbc_fetch_array($kucun_state)) {
//                $jz1 = trim(odbc_result($kucun_state, "jz1"));
//                $jz3 = trim(odbc_result($kucun_state, "jz3"));
////            $isbn = trim(odbc_result($kucun_state, "isbn"));
//            }

            if ($stock_state_s[$i] == '纸本可供') {
//                echo '纸本可供';
//            $flag = "纸本可供";
                $zhengdingdan_ids[] = $book_id_s[$i];
                $zhengdingdan_nums[] = $book_num_s[$i];

//            测试预订单到征订单的转移 测试时，将查询到的纸本可供的书籍，修改这里就可以了
//            $yudingdan_ids[] = $book_id_s[$i];
//            $yudingdan_nums[] = $book_num_s[$i];

            } else {

                if ($stock_state_s[$i] == 'POD可供') {
//                $flag = "POD可供";
                    //            测试预订单到征订单的转移 测试时，将查询到的POD可供的书籍，修改这里就可以了
//
                    $zhengdingdan_ids[] = $book_id_s[$i];
                    $zhengdingdan_nums[] = $book_num_s[$i];

//                $yudingdan_ids[] = $book_id_s[$i];
//                $yudingdan_nums[] = $book_num_s[$i];

//                } else if (is_null($jz3)) {
                } else if ($stock_state_s[$i] == '可预订') {

//                $flag = "可预订";
                    $yudingdan_ids[] = $book_id_s[$i];
                    $yudingdan_nums[] = $book_num_s[$i];
                }
            }
        }

//        print_r($yudingdan_ids);
//        print_r($yudingdan_nums);

        if (!empty($yudingdan_ids[0])) { //预订单只创建一次

            $yudingdan_ids_nums = array_combine($yudingdan_ids, $yudingdan_nums);

            $sql = ser(bs_yudingdan, "count(*) as sum", "ydd_pc_id ='$ydd_pc'");

            $rs = $ms->sdb($sql);
            $data = odbc_fetch_array($rs);
            $sum = $data['sum'];

            if ($sum == '0') { // 第一次创建预订单

                $yudingdan = json_encode((object)$yudingdan_ids_nums);


                $sql = ins("bs_yudingdan", "ydd_pc_id,ydd_user_id,ydd_detail,ydd_time", "'$ydd_pc','$uid','$yudingdan',GETDATE()");

                $rs = $ms->sdb($sql);

                if (odbc_num_rows($rs) == 1) {
//                    echo "创建预订单成功\n";
                } else {
                    $error = "创建预订单失败\n";
                    echo $error;
                    $log->debug($error);

                }
            } else {//添加到预订单条目

                $sql = ser(bs_yudingdan, "ydd_detail", "ydd_pc_id ='$ydd_pc'");

                $rs = $ms->sdb($sql);

                $data = odbc_fetch_array($rs);

                $rs = $data['ydd_detail'];

                $yudingdan_detail = json_decode($rs, true) + $yudingdan_ids_nums;

                $yudingdan = json_encode((object)$yudingdan_detail);

                $sql = upd("bs_yudingdan", "ydd_detail = '$yudingdan'", "ydd_pc_id = '$ydd_pc'");

                $rs = $ms->sdb($sql);

                if (odbc_num_rows($rs) == 1) {
//                echo "合并{$isbn}到预订单条目成功\n";
                } else {
//                echo "合并{$isbn}到预订单条目失败\n";
                    $error = "合并{$isbn}到预订单条目失败\n";
//                echo $error;
                    $log->debug($error);
                }
            }

//添加到明细表

            $count_yudingdan_ids = count($yudingdan_ids);

//            echo "可预订书籍数量{$count_yudingdan_ids}\r\n";
            $count_for_add_to_ydd_success = 0;

            for ($i = 0; $i < $count_yudingdan_ids; $i++) {

                $isbn = '';
                $sm = '';
                $csm = '';
                $zzh = '';
                $dj = '';
                $cbrq = '';
                $sl = '';
                $kb = '';

                $id = $yudingdan_ids[$i];

                $sql = "SELECT isbn,sm,csm,zzh,dj,cbrq,sl,kb FROM ecs_book WHERE  book_id = '$id'";

                $book = $ms->sdb($sql);

                while (odbc_fetch_array($book)) {

//                $kuncun1 = trim(odbc_result($book, "kc"));
//                $isbn = trim(odbc_result($book, "isbn"));

                    $isbn = trim(odbc_result($book, "isbn"));

                    $sm = trim(odbc_result($book, "sm"));
                    $csm = trim(odbc_result($book, "csm"));
                    $zzh = trim(odbc_result($book, "zzh"));
                    $dj = trim(odbc_result($book, "dj"));

                    $tr_cbrq = trim(odbc_result($book, "cbrq"));
                    $empty_cbrq = empty($tr_cbrq);
                    if ($empty_cbrq) {
                        $cbrq = NULL;
                    } else {
                        $cbrq = trim(odbc_result($book, "cbrq"));
                        if (strstr($cbrq, "-")) {
                            if (substr_count($cbrq, "-") == 1) {
                                $cbrq = $cbrq . '-01';
                            }
                            $cbrq = str_replace("-", "/", $cbrq);
                        }
                        $cbrq = date('Y/m/d', strtotime($cbrq));
                    }

                    $sl = trim(odbc_result($book, "sl"));
                    $kb = trim(odbc_result($book, "kb"));
                }

                $state = '10';

                if (!empty($cbrq)) {
                    $sql = ins("bs_yudingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                        "'$ydd_pc','$isbn','$sm','$csm','$zzh','$dj','$cbrq','$sl','$kb','$yudingdan_nums[$i]','$uid',GETDATE(),'$state','$lib_no' ,'$id'");

                } else {
                    $sql = ins("bs_yudingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                        "'$ydd_pc','$isbn','$sm','$csm','$zzh','$dj',null,'$sl','$kb','$yudingdan_nums[$i]','$uid',GETDATE(),'$state','$lib_no' ,'$id'");
                }

//添加到预订单明细表
                $rs = $ms->sdb($sql);

                if (odbc_num_rows($rs) == 1) {
//                    echo "合并{$isbn}到预订单明细{$ydd_pc}成功\n";
                    $count_for_add_to_ydd_success++;
                } else {
                    $error = "合并{$isbn}到预订单明细{$ydd_pc}失败\n";
                    echo $error;
                    $log->debug($error);
                }
            }

            echo "共有{$count_for_add_to_ydd_success}种书加入到预订单\n";
            echo "预订单号是{$ydd_pc}\n";
        }

//    print_r($yudingdan);
//    print_r($zhengdingdan_ids); //变量为空 什么都不会打印
//    print_r($zhengdingdan_nums);

//生成征订单
//是否生成征订单时才转移
        if (!empty($zhengdingdan_ids[0])) {

            //转移开始

            //因为预订单转征订单只是理论性质，所以只在有新的订单生成的时候转移以提高性能
            //检查用户原来预订单中是否有可加入到当前征订单的书籍  开始

//有些书是没isbn号的 没isbn号的书有4980本， 纸本可供的为0
//select count(*) from ecs_book where isbn = '' and jz= '1' and kc > '0';

            $sql = "select book_id,isbn,amount from bs_yudingdan_mx where sheet_no = '$ydd_pc'";

            $rs = $ms->sdb($sql);

            if (!$rs) {
                echo "Error in query preparation/execution.<br />";
                die(print_r(odbc_errormsg(), true));
            }

            while ($data = odbc_fetch_array($rs)) {
//    print_r($data);
//    $ydd_isbn_list[] = $data;
                $ydd_isbn_list[] = $data['isbn'];
                $ydd_amount_list[] = $data['amount'];
                $ydd_id_list[] = $data['book_id'];
            }
//        print_r($ydd_isbn_list);
//        print_r($ydd_amount_list);
//        print_r($ydd_id_list);

            if (!empty($ydd_isbn_list)) {

                $count_ydd_isbn_list = count($ydd_isbn_list);
                for ($i = 0; $i < $count_ydd_isbn_list; $i++) {

                    $ydd_isbn = $ydd_isbn_list[$i];

//预订单明细中有一大批isbn为空
                    if (!empty($ydd_isbn)) {

                        $ydd_amount = $ydd_amount_list[$i];
                        $ydd_id = $ydd_id_list[$i];

                        $to_be_transfered = '';
                        $flag = '';
//sqlsever

//                    这里搜count(*)会使得数据库中有多条记录的，库存状态矛盾的书的矛盾显示出来
                        $sql1 = "SELECT count(*) as sum FROM ecs_book WHERE  isbn = '$ydd_isbn' and jz = '1' and kc > '0'";

                        $book1 = $ms->sdb($sql1);
                        while (odbc_fetch_array($book1)) {
                            $to_be_transfered1 = trim(odbc_result($book1, "sum"));
                        }

                        $sql3 = "SELECT count(*) as sum FROM ecs_book WHERE  isbn = '$ydd_isbn' and jz = '3' and kc is not null";

                        $book3 = $ms->sdb($sql3);
                        while (odbc_fetch_array($book3)) {
                            $to_be_transfered3 = trim(odbc_result($book3, "sum"));
                        }

//是否有需要转移的数据
                        if ($to_be_transfered1 > 0 || $to_be_transfered3 > 0) {
                            $transfer_isbn[] = $ydd_isbn;
                            $transfer_amount[] = $ydd_amount;
                            $transfer_id[] = $ydd_id;
                        }
                    }
                }
            }

            //检查用户原来预订单中是否有可加入到当前征订单的书籍  结束

//        print_r($transfer_isbn);
//        print_r($transfer_amount);
//
//        print_r($transfer_id);

            if (!empty($transfer_id)) {//开始转移
//得到原预订单中的内容 从中减去可转移的内容
                $sql = ser(bs_yudingdan, "ydd_detail", "ydd_pc_id ='$ydd_pc'");
                $rs = $ms->sdb($sql);
                $data = odbc_fetch_array($rs);
                $ydd_detail = $data['ydd_detail'];

//            print_r(json_decode($ydd_detail, true));

                $transfer_ids_nums = array_combine($transfer_id, $transfer_amount);

//            print_r($transfer_ids_nums);

//            删除目录表

                $yudingdan_detail = array_diff(json_decode($ydd_detail, true), $transfer_ids_nums);

//            print_r(array_diff(json_decode($ydd_detail, true), $transfer_ids_nums));

                $yudingdan = json_encode((object)$yudingdan_detail);

//            print_r($yudingdan);

                $sql = upd("bs_yudingdan", "ydd_detail = '$yudingdan'", "ydd_pc_id = '$ydd_pc'");

                $rs = $ms->sdb($sql);

                if (odbc_num_rows($rs) == 1) {
//                    echo "从预订单删除条目成功\n";
                } else {
                    $error = "从预订单删除条目失败\n";
                    echo $error;
                    $log->debug($error);
                }

                //    删除预订单明细表的内容
                $count_transfer_isbn = count($transfer_isbn);

                for ($i = 0; $i < $count_transfer_isbn; $i++) {

//               删除时出现字段类型错误
//                $sql = "delete from bs_yudingdan_mx WHERE isbn = " . $transfer_isbn[$i];

                    $sql = "delete from bs_yudingdan_mx WHERE isbn =  '$transfer_isbn[$i]' ";

                    $rs = $ms->sdb($sql);

                    if (odbc_num_rows($rs) == 1) {
                        echo "从预订单移除isbn号为$transfer_isbn[$i]的书籍成功\n";
                    } else {
                        $error = "从预订单移除isbn号为$transfer_isbn[$i]的书籍失败\n";
                        echo $error;
                        $log->debug($error);
                    }
                }
            }

//合并到征订单明细表 //

//        print_r($transfer_id);
//        print_r($zhengdingdan_ids);

            if (!empty($transfer_id)) {
                $zhengdingdan_ids = array_merge($transfer_id, $zhengdingdan_ids);
                $zhengdingdan_nums = array_merge($transfer_amount, $zhengdingdan_nums);
            }
//        print_r($zhengdingdan_ids);

            $count_zhengdingdan_ids = count($zhengdingdan_ids);

//          是否需要拆分此征订单

            if (empty($type)) {//不拆分

//                不会出现已有该征订单的情况
                //        是否已有该征订单
                $sql = ser(bs_zhengdingdan, "count(*) as sum", "zdd_pc_id ='$zdd_pc'");
                $rs = $ms->sdb($sql);
                $data = odbc_fetch_array($rs);
                $sum = $data['sum'];

//        去重，防止以前预订单表中的书籍又在这次征订单中
                $zhengdingdan_ids_nums = array_combine($zhengdingdan_ids, $zhengdingdan_nums);

                $zhengdingdan = json_encode((object)$zhengdingdan_ids_nums);

                if ($sum == '0') { // 生成新征订单

//            echo "生成新征订单";

                    $sql = ins("bs_zhengdingdan", "zdd_pc_id,zdd_user_id,zdd_detail,zdd_time,zdd_is_hide,zdd_gps", "'$zdd_pc','$uid','$zhengdingdan',GETDATE(),'0',''");
                    $rs = $ms->sdb($sql);


                    echo "\n";

                    if (odbc_num_rows($rs) == 1) {
//                        echo "生成征订单{$zdd_pc}成功\n";
                    } else {
                        $error = "生成征订单失败\n";
                        echo $error;
                        $log->debug($error);
                    }
                } else { //添加到原有征订单

//            echo "添加到原有征订单";

//先添加到条目
                    $sql = ser("bs_zhengdingdan", "zdd_detail", " zdd_pc_id = '$zdd_pc'");

                    $rs = $ms->sdb($sql);

                    $data = odbc_fetch_array($rs);

                    $rs = $data['zdd_detail'];

                    $zhengdingdan_detail = json_decode($rs, true) + $zhengdingdan_ids_nums;

                    $zhengdingdan = json_encode((object)$zhengdingdan_detail);

                    $sql = upd("bs_zhengdingdan", "zdd_detail = '$zhengdingdan'", "zdd_pc_id = '$zdd_pc'");

//        echo $sql;

                    $rs = $ms->sdb($sql);

                    if (odbc_num_rows($rs) == 1) {
//                echo "合并" . print_r($zhengdingdan_ids_nums) . "到征订单条目成功";
                    } else {
                        //                echo "合并" . print_r($zhengdingdan_ids_nums) . "到征订单条目失败";
                        $error = "合并" . print_r($zhengdingdan_ids_nums) . "到征订单条目失败";
//                echo $error;
                        $log->debug($error);
                    }

                }

                //    写入征订单明细表

//                $count_zhengdingdan_ids = count($zhengdingdan_ids);

//                echo "纸本可供与POD可供书籍数量{$count_zhengdingdan_ids}\r\n";
                $count_for_add_to_zdd_success = 0;

                for ($i = 0; $i < $count_zhengdingdan_ids; $i++) {

                    $isbn = '';
                    $sm = '';
                    $csm = '';
                    $zzh = '';
                    $dj = '';
                    $cbrq = '';
                    $sl = '';
                    $kb = '';

                    $id = $zhengdingdan_ids[$i];

                    $sql = "SELECT isbn,sm,csm,zzh,dj,cbrq,sl,kb FROM ecs_book WHERE  book_id = '$id'";

                    $book = $ms->sdb($sql);

                    while (odbc_fetch_array($book)) {

//                $kuncun1 = trim(odbc_result($book, "kc"));
//                $isbn = trim(odbc_result($book, "isbn"));

                        $isbn = trim(odbc_result($book, "isbn"));

                        $sm = trim(odbc_result($book, "sm"));
                        $csm = trim(odbc_result($book, "csm"));
                        $zzh = trim(odbc_result($book, "zzh"));
                        $dj = trim(odbc_result($book, "dj"));

                        $tr_cbrq = trim(odbc_result($book, "cbrq"));
                        $empty_cbrq = empty($tr_cbrq);
                        if ($empty_cbrq) {
                            $cbrq = NULL;
                        } else {
                            $cbrq = trim(odbc_result($book, "cbrq"));
                            if (strstr($cbrq, "-")) {
                                if (substr_count($cbrq, "-") == 1) {
                                    $cbrq = $cbrq . '-01';
                                }
                                $cbrq = str_replace("-", "/", $cbrq);
                            }
                            $cbrq = date('Y/m/d', strtotime($cbrq));
                        }

                        $sl = trim(odbc_result($book, "sl"));
                        $kb = trim(odbc_result($book, "kb"));
                    }

                    $state = '10';

//测试预订单到征订单的转移

                    if (!empty($cbrq)) {
                        $sql = ins("bs_zhengdingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                            "'$zdd_pc','$isbn','$sm','$csm','$zzh','$dj','$cbrq','$sl','$kb','$zhengdingdan_nums[$i]','$uid',GETDATE(),'$state','$lib_no','$id'");

                    } else {
                        $sql = ins("bs_zhengdingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                            "'$zdd_pc','$isbn','$sm','$csm','$zzh','$dj',null,'$sl','$kb','$zhengdingdan_nums[$i]','$uid',GETDATE(),'$state','$lib_no','$id'");
                    }

//添加到征订单明细表
                    $rs = $ms->sdb($sql);

                    if (odbc_num_rows($rs) == 1) {
//                        echo "合并{$isbn}到征订单明细{$zdd_pc}成功\n";
                        $count_for_add_to_zdd_success++;
                    } else {

                        $error = "合并{$isbn}到征订单明细{$zdd_pc}失败\n";
                        echo $error;
                        $log->debug($error);

                    }
                }

                echo "共有{$count_for_add_to_zdd_success}种书籍加入到征订单\n";
                echo "征订单号是{$zdd_pc}";


            } else { //拆分

                if ($type == 'by_type') {// 按种类

                    $zhengdingdan_ids_after_split = splitArray($zhengdingdan_ids, $num);
                    $zhengdingdan_nums_after_split = splitArray($zhengdingdan_nums, $num);

//                    $split_to_num = ceil($count_zhengdingdan_ids / $num);
//                    $zhengdingdan_ids_after_split = splitArray($zhengdingdan_ids, $split_to_num);
//                    $zhengdingdan_nums_after_split = splitArray($zhengdingdan_nums, $split_to_num);

                    $count_zhengdingdan_ids_after_split = count($zhengdingdan_ids_after_split);

//                    $count_zhengdingdan_nums_after_split = count($zhengdingdan_nums_after_split);

                    for ($index_ids = 0; $index_ids < $count_zhengdingdan_ids_after_split; $index_ids++) {

//                     按种类拆分加入订单开始  *******************************

//    拆分时生成新的批次号
//        去重，防止以前预订单表中的书籍又在这次征订单中
                        $zhengdingdan_ids_nums_after_split = array_combine($zhengdingdan_ids_after_split[$index_ids], $zhengdingdan_nums_after_split[$index_ids]);

                        $zhengdingdan_after_split = json_encode((object)$zhengdingdan_ids_nums_after_split);

                        $zdd_pc = $lib_no . '_' . $uid . '_' . date('YmdHis', time()) . '_' . microtime(true);

                        $zdd_pc = str_replace(".", "_", $zdd_pc);

                        $sql = ins("bs_zhengdingdan", "zdd_pc_id,zdd_user_id,zdd_detail,zdd_time,zdd_is_hide,zdd_gps", "'$zdd_pc','$uid','$zhengdingdan_after_split',GETDATE(),'0',''");
                        $rs = $ms->sdb($sql);

                        if (odbc_num_rows($rs) == 1) {
                            echo "生成征订单{$zdd_pc}成功\n";
                        } else {
                            $error = "生成征订单失败\n";
                            echo $error;
                            $log->debug($error);
                        }

                        //    写入征订单明细表

                        $count_zhengdingdan_ids_index_after_split = count($zhengdingdan_ids_after_split[$index_ids]);

                        echo "纸本可供与POD可供书籍数量{$count_zhengdingdan_ids_index_after_split}\n";

                        for ($i = 0; $i < $count_zhengdingdan_ids_index_after_split; $i++) {

                            $isbn = '';
                            $sm = '';
                            $csm = '';
                            $zzh = '';
                            $dj = '';
                            $cbrq = '';
                            $sl = '';
                            $kb = '';

                            $id = $zhengdingdan_ids_after_split[$index_ids][$i];


                            $sql = "SELECT isbn,sm,csm,zzh,dj,cbrq,sl,kb FROM ecs_book WHERE  book_id = '$id'";

                            $book = $ms->sdb($sql);

                            while (odbc_fetch_array($book)) {

                                $isbn = trim(odbc_result($book, "isbn"));

                                $sm = trim(odbc_result($book, "sm"));
                                $csm = trim(odbc_result($book, "csm"));
                                $zzh = trim(odbc_result($book, "zzh"));
                                $dj = trim(odbc_result($book, "dj"));


                                $tr_cbrq = trim(odbc_result($book, "cbrq"));
                                $empty_cbrq = empty($tr_cbrq);
                                if ($empty_cbrq) {
                                    $cbrq = NULL;
                                } else {
                                    $cbrq = trim(odbc_result($book, "cbrq"));
                                    if (strstr($cbrq, "-")) {
                                        if (substr_count($cbrq, "-") == 1) {
                                            $cbrq = $cbrq . '-01';
                                        }
                                        $cbrq = str_replace("-", "/", $cbrq);
                                    }
                                    $cbrq = date('Y/m/d', strtotime($cbrq));
                                }

                                $sl = trim(odbc_result($book, "sl"));
                                $kb = trim(odbc_result($book, "kb"));
                            }

                            $state = '10';

//测试预订单到征订单的转移
                            $book_num = $zhengdingdan_nums_after_split[$index_ids][$i];
                            if (!empty($cbrq)) {
                                $sql = ins("bs_zhengdingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                                    "'$zdd_pc','$isbn','$sm','$csm','$zzh','$dj','$cbrq','$sl','$kb','$book_num','$uid',GETDATE(),'$state','$lib_no','$id'");

                            } else {
                                $sql = ins("bs_zhengdingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                                    "'$zdd_pc','$isbn','$sm','$csm','$zzh','$dj',null,'$sl','$kb','$book_num','$uid',GETDATE(),'$state','$lib_no','$id'");
                            }

//添加到征订单明细表

                            $rs = $ms->sdb($sql);

                            if (odbc_num_rows($rs) == 1) {
                                echo "合并{$isbn}到征订单明细{$zdd_pc}成功\n";
                            } else {

                                $error = "合并{$isbn}到征订单明细{$zdd_pc}失败\n";
                                echo $error;
                                $log->debug($error);

                            }
                        }
                    }
                }//按种类拆分加入订单结束
                elseif ($type == "by_price") {//按价格

                    // 按种类

                    echo '$zhengdingdan_ids';
                    print_r($zhengdingdan_ids);
                    $zhengdingdan_ids_after_split = splitArrayByPrice($zhengdingdan_ids, $zhengdingdan_nums, $pod_paper_price_sum, $num);

                    echo '$zhengdingdan_ids_after_split';
                    print_r($zhengdingdan_ids_after_split);

                    $boundary = $_SESSION['boundary'];
                    echo '$boundary';
                    print_r($boundary);

                    $count_boundary = count($boundary);

                    $count_boundary_1 = $count_boundary - 1;
                    $num_1 = $num - 1;


                    for ($i = 0; $i < $count_boundary; $i++) {


                        if (($i != $count_boundary - 1) && ($i < $num_1)) {

                            $num = $boundary[$i + 1] - $boundary[$i];

                            $zhengdingdan_nums_after_split[] = array_slice($zhengdingdan_nums, $boundary[$i], $num);

                        } else {

                            $zhengdingdan_nums_after_split[] = array_slice($zhengdingdan_nums, $boundary[$i]);

                        }

                        if ($i >= $num_1) {
                            break;
                        }

                    }
//                    $zhengdingdan_nums_after_split = splitArrayByPrice($zhengdingdan_nums, $num);


                    $count_zhengdingdan_ids_after_split = count($zhengdingdan_ids_after_split);


//                    $count_zhengdingdan_nums_after_split = count($zhengdingdan_nums_after_split);

                    for ($index_ids = 0; $index_ids < $count_zhengdingdan_ids_after_split; $index_ids++) {


//                     按种类拆分加入订单开始  *******************************

//    拆分时生成新的批次号
//        去重，防止以前预订单表中的书籍又在这次征订单中
                        $zhengdingdan_ids_nums_after_split = array_combine($zhengdingdan_ids_after_split[$index_ids], $zhengdingdan_nums_after_split[$index_ids]);

                        $zhengdingdan_after_split = json_encode((object)$zhengdingdan_ids_nums_after_split);

                        $zdd_pc = $lib_no . '_' . $uid . '_' . date('YmdHis', time()) . '_' . microtime(true);

                        $zdd_pc = str_replace(".", "_", $zdd_pc);

                        $sql = ins("bs_zhengdingdan", "zdd_pc_id,zdd_user_id,zdd_detail,zdd_time,zdd_is_hide,zdd_gps", "'$zdd_pc','$uid','$zhengdingdan_after_split',GETDATE(),'0',''");
                        $rs = $ms->sdb($sql);

                        if (odbc_num_rows($rs) == 1) {
                            echo "生成征订单{$zdd_pc}成功\n";
                        } else {
                            $error = "生成征订单失败\n";
                            echo $error;
                            $log->debug($error);
                        }

                        //    写入征订单明细表

                        $count_zhengdingdan_ids_index_after_split = count($zhengdingdan_ids_after_split[$index_ids]);

                        echo "纸本可供与POD可供书籍数量{$count_zhengdingdan_ids_index_after_split}\n";

                        for ($i = 0; $i < $count_zhengdingdan_ids_index_after_split; $i++) {

                            $isbn = '';
                            $sm = '';
                            $csm = '';
                            $zzh = '';
                            $dj = '';
                            $cbrq = '';
                            $sl = '';
                            $kb = '';

                            $id = $zhengdingdan_ids_after_split[$index_ids][$i];


                            $sql = "SELECT isbn,sm,csm,zzh,dj,cbrq,sl,kb FROM ecs_book WHERE  book_id = '$id'";

                            $book = $ms->sdb($sql);

                            while (odbc_fetch_array($book)) {

                                $isbn = trim(odbc_result($book, "isbn"));

                                $sm = trim(odbc_result($book, "sm"));
                                $csm = trim(odbc_result($book, "csm"));
                                $zzh = trim(odbc_result($book, "zzh"));
                                $dj = trim(odbc_result($book, "dj"));


                                $tr_cbrq = trim(odbc_result($book, "cbrq"));
                                $empty_cbrq = empty($tr_cbrq);
                                if ($empty_cbrq) {
                                    $cbrq = NULL;
                                } else {
                                    $cbrq = trim(odbc_result($book, "cbrq"));
                                    if (strstr($cbrq, "-")) {
                                        if (substr_count($cbrq, "-") == 1) {
                                            $cbrq = $cbrq . '-01';
                                        }
                                        $cbrq = str_replace("-", "/", $cbrq);
                                    }
                                    $cbrq = date('Y/m/d', strtotime($cbrq));
                                }

                                $sl = trim(odbc_result($book, "sl"));
                                $kb = trim(odbc_result($book, "kb"));
                            }

                            $state = '10';

//测试预订单到征订单的转移
                            $book_num = $zhengdingdan_nums_after_split[$index_ids][$i];
                            if (!empty($cbrq)) {
                                $sql = ins("bs_zhengdingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                                    "'$zdd_pc','$isbn','$sm','$csm','$zzh','$dj','$cbrq','$sl','$kb','$book_num','$uid',GETDATE(),'$state','$lib_no','$id'");

                            } else {
                                $sql = ins("bs_zhengdingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                                    "'$zdd_pc','$isbn','$sm','$csm','$zzh','$dj',null,'$sl','$kb','$book_num','$uid',GETDATE(),'$state','$lib_no','$id'");
                            }

//添加到征订单明细表

                            $rs = $ms->sdb($sql);

                            if (odbc_num_rows($rs) == 1) {
                                echo "合并{$isbn}到征订单明细{$zdd_pc}成功\n";
                            } else {

                                $error = "合并{$isbn}到征订单明细{$zdd_pc}失败\n";
                                echo $error;
                                $log->debug($error);

                            }
                        }

                    }


                }//按价格拆分结束

            }
        }


//有征订单生成，将已生成订单的状态更改为1

//            $sql_update_dingdan_pici = "UPDATE [dbo]." . bs_temp_dingdan_pici . " SET  State = '1'     WHERE PiCi_Num = '$dd_pc'";
        $batch_id_for_update = $all_batch_ids[$index];
        $sql_update_dingdan_pici = "UPDATE [dbo]." . bs_temp_dingdan_pici . " SET  State = '1'     WHERE PiCi_Num = '$batch_id_for_update'";

//    echo $sql_update_temp_table;

        $rs_sql_update_dingdan_pici = $ms->sdb($sql_update_dingdan_pici);

        try {
            if (odbc_num_rows($rs_sql_update_dingdan_pici) <= 0) {
                echo "Error in query preparation/execution.<br />";
                $error = "更新 批次$dd_pc中的 $book_id 订单已生成状态失败";
                $log->debug($error);
                throw new Exception($error);
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        //    防止合并时重复添加
        unset($book_id_s);
        unset($book_num_s);

        unset($yudingdan_ids);
        unset($yudingdan_nums);
        unset($zhengdingdan_ids);
        unset($zhengdingdan_nums);


        unset($ydd_isbn_list);

        unset($ydd_amount_list);
        unset($ydd_id_list);

        unset($transfer_isbn);
        unset($transfer_amount);
        unset($transfer_id);

    } else {
        echo "批次{$dd_pc}中未选中书籍\n";
    }

}




