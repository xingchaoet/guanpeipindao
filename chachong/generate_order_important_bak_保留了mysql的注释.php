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
//require("../db/con_mysql2.php");
include("../db/dao.php");
require("../config.php");
include("auth_chachong.php");

$batch_id = $_POST['batch_id'];

$search_TJ = $_SESSION['search_TJ'];

$ms = new con_mssql();

$book_id_s = array();
//$con_mysql2 = new con_mysql2();

// 有用户登录时，可从session中取用户id
//从临时表中获取订单明细
//$temp_table_name = $_SESSION['temp_table_name'];
//
//$sql_search_temp_table = "SELECT BookId,IsChecked from " . $temp_table_name . " WHERE IsChecked > '0'";
//
//echo $sql_search_temp_table;
//
//$rs_sql_search_temp_table = $ms->sdb($sql_search_temp_table);
//
//if (!$rs_sql_search_temp_table) {
//    echo "Error in query preparation/execution.<br />";
//    die(print_r(odbc_errormsg(), true));
//}
//while ($data = odbc_fetch_array($rs_sql_search_temp_table)) {
////    print_r($data);
//    $book_id_s[] = $data['BookId'];
//    $book_num_s[] = $data['IsChecked'];
//
//}
//
//print_r($book_id_s);
//print_r($book_num_s);

//$book_ids = $_POST['book_ids'];

//
//$dd_pc = $_SESSION['dd_pc'];

$dd_pc = $batch_id;

//print_r($dd_pc);

$sql_dd_pc = "SELECT Book_Id,Book_Num FROM bs_temp_dingdan WHERE Pi_Ci_No = '$dd_pc' AND Book_Num <> 0 AND State = 0";
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

};
//$lib_no = 'FJ0014';
//print_r($book_id_s);
//
//print_r($book_num_s);
//
//exit();

$lib_no = $_SESSION['lib_no'];

//$uid = $_POST['user_id'];
$uid = $_SESSION['user_id'];

//预订单批次
$ydd_pc = $lib_no . $uid;

//征订单批次
//$zdd_pc = $lib_no . $uid . '_' . md5($search_TJ);
//$zdd_pc = $lib_no . '_' . $uid . '_' . date('YmdHis', time());
$zdd_pc = $dd_pc;

//$zdd_pc = $dd_pc . '_' . date('YmdHis', time());

$ydd_isbn_list = array();
$ydd_amount_list = array();
$ydd_id_list = array();

$transfer_isbn = array();
$transfer_amount = array();
$transfer_id = array();


//将书籍分为两类，征订单和预订单
//print_r($book_ids);

//if (!empty($book_ids)) {
if (!empty($book_id_s)) {


//    征订单与预订单的处理 开始

//    $book_id_s = explode(",", $book_ids);
//    $book_nums = $_POST['book_nums'];
////从首页加入订单过来 没数量
//    if (empty($book_nums)) {
//        $book_nums = 1;
//    }
//
//    $book_num_s = explode(",", $book_nums);

    $yudingdan_ids = '';
    $yudingdan_nums = '';

    $zhengdingdan_ids = '';
    $zhengdingdan_nums = '';

    $gc_pc_time_prefix = date('YmdHis');

    $count_book_id_s = count($book_id_s);

    for ($i = 0; $i < $count_book_id_s; $i++) {
        $id = $book_id_s[$i];


//  view start     ***********************************************************
//
//    $sql = "SELECT isbn, kc FROM ecs_book WHERE  book_id = '$id'";
//        $sql = "select isbn , jz1 , jz3 from　v_ecs_book WHERE  bid1 = '$id' or bid2 = '$id' or bid3 = '$id' ";//不能大写

//        $sql = "select isbn , jz1 , jz3 from v_ecs_book where bid1 = '$id' or bid2 = '$id' or bid3 = '$id'";
//        $kuncun1 = '';
//        $kuncun3 = '';
//
//        $isbn = '';
//        $flag = '';
//
//        $book = $con_mysql2->sdb($sql);
//        while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
//            $kuncun1 = $data['jz1'];
//            $kuncun3 = $data['jz3'];
//            $isbn = $data['isbn'];
//        }
//  view end      ***********************************************************

        //  table start      ***********************************************************
//mysql
//        $kuncun1 = null;
//        $kuncun3 = null;
//
//        $isbn = '';
//        $flag = '';
//
//        $sql = "select isbn ,kc from ecs_book where book_id = '$id' and jz = '1' ";
//
//        $book1 = $con_mysql2->sdb($sql);
//        while ($data1 = $book1->fetch_array(MYSQLI_ASSOC)) {
//            $kuncun1 = $data1['kc'];
//            $isbn = $data1['isbn'];
//        }
//
//        $sql = "select isbn ,kc from ecs_book where book_id = '$id' and jz = '3' ";
//
//
//        $book3 = $con_mysql2->sdb($sql);
//        while ($data3 = $book3->fetch_array(MYSQLI_ASSOC)) {
//            $kuncun3 = $data3['kc'];
//            $isbn = $data3['isbn'];
//        }
//        //  table end      ***********************************************************
//
//
//        if ($kuncun1 > 0) {
////            echo '纸本可供';
//            $flag = "纸本可供";
//            $zhengdingdan_ids[] = $book_id_s[$i];
//            $zhengdingdan_nums[] = $book_num_s[$i];
//
////            测试预订单到征订单的转移 测试时，将查询到的纸本可供的书籍，修改这里就可以了
////            $yudingdan_ids[] = $book_id_s[$i];
////            $yudingdan_nums[] = $book_num_s[$i];
//
//
//        } else {
//
//            if (is_numeric($kuncun3) && ($kuncun3 >= 0)) {
//                $flag = "POD可供";
//                //            测试预订单到征订单的转移 测试时，将查询到的POD可供的书籍，修改这里就可以了
////
//                $zhengdingdan_ids[] = $book_id_s[$i];
//                $zhengdingdan_nums[] = $book_num_s[$i];
//
////                $yudingdan_ids[] = $book_id_s[$i];
////                $yudingdan_nums[] = $book_num_s[$i];
//
////                echo 'POD可供';
//            } else if (is_null($kuncun3)) {
//                $flag = "可预订";
//                $yudingdan_ids[] = $book_id_s[$i];
//                $yudingdan_nums[] = $book_num_s[$i];
////                echo '可预订';
//            }
//
//        }
//        print_r($flag);


//        sqlserver
        $kuncun1 = null;
        $kuncun3 = null;

        $isbn = '';
        $flag = '';

        $sql = "select isbn ,kc from ecs_book where book_id = '$id' and jz = '1' ";

        $book1 = $ms->sdb($sql);

        while (odbc_fetch_array($book1)) {
            $kuncun1 = trim(odbc_result($book1, "kc"));
            $isbn = trim(odbc_result($book1, "isbn"));
        }

        $sql = "select isbn ,kc from ecs_book where book_id = '$id' and jz = '3' ";

        $book3 = $ms->sdb($sql);

        while (odbc_fetch_array($book3)) {
            $kuncun3 = trim(odbc_result($book3, "kc"));
            $isbn = trim(odbc_result($book3, "isbn"));
        }

        //  table end      ***********************************************************


        if ($kuncun1 > 0) {
//            echo '纸本可供';
            $flag = "纸本可供";
            $zhengdingdan_ids[] = $book_id_s[$i];
            $zhengdingdan_nums[] = $book_num_s[$i];

//            测试预订单到征订单的转移 测试时，将查询到的纸本可供的书籍，修改这里就可以了
//            $yudingdan_ids[] = $book_id_s[$i];
//            $yudingdan_nums[] = $book_num_s[$i];


        } else {

            if (is_numeric($kuncun3) && ($kuncun3 >= 0)) {
                $flag = "POD可供";
                //            测试预订单到征订单的转移 测试时，将查询到的POD可供的书籍，修改这里就可以了
//
                $zhengdingdan_ids[] = $book_id_s[$i];
                $zhengdingdan_nums[] = $book_num_s[$i];

//                $yudingdan_ids[] = $book_id_s[$i];
//                $yudingdan_nums[] = $book_num_s[$i];

//                echo 'POD可供';
            } else if (is_null($kuncun3)) {
                $flag = "可预订";
                $yudingdan_ids[] = $book_id_s[$i];
                $yudingdan_nums[] = $book_num_s[$i];
//                echo '可预订';
            }

        }

    }

//    print_r($yudingdan_ids);
//    print_r($yudingdan_nums);

//    exit();
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
                echo "创建预订单成功\n";
            } else {
                echo "创建预订单失败\n";
            }
        } else {//添加到预订单

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
            }

//        exit();
        }

//添加到明细表

        $count_yudingdan_ids = count($yudingdan_ids);
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

                if (empty(trim(odbc_result($book, "cbrq")))) {
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
//            while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
//                $isbn = $data['isbn'];
//
//                $sm = iconv('UTF-8', 'GBK', $data['sm']);
//                $csm = iconv('UTF-8', 'GBK', $data['csm']);
//                $zzh = iconv('UTF-8', 'GBK', $data['zzh']);
//                $dj = $data['dj'];
//
//                if (empty($data['cbrq'])) {
//                    $cbrq = NULL;
//                } else {
//                    $cbrq = $data['cbrq'];
//                    if (strstr($cbrq, "-")) {
//                        if (substr_count($cbrq, "-") == 1) {
//                            $cbrq = $cbrq . '-01';
//                        }
//                        $cbrq = str_replace("-", "/", $cbrq);
//                    }
//                    $cbrq = date('Y/m/d', strtotime($cbrq));
//                }
//
//                $sl = $data['sl'];
//                $kb = iconv('UTF-8', 'GBK', $data['kb']);
//            }

            $state = '10';

            if (!empty($cbrq)) {
                $sql = ins("bs_yudingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                    "'$ydd_pc','$isbn','$sm','$csm','$zzh','$dj','$cbrq','$sl','$kb','$yudingdan_nums[$i]','$uid',GETDATE(),'$state','$lib_no' ,'$id'");

            } else {
                $sql = ins("bs_yudingdan_mx", "sheet_no,isbn,book_name,bookcs_name,writer,price,publish_date,fenlei,kb,amount,inputby,uptime,state,lib_no,book_id",
                    "'$ydd_pc','$isbn','$sm','$csm','$zzh','$dj',null,'$sl','$kb','$yudingdan_nums[$i]','$uid',GETDATE(),'$state','$lib_no' ,'$id'");
            }

//
//            echo $sql;
//


//添加到预订单明细表
            $rs = $ms->sdb($sql);

            if (odbc_num_rows($rs) == 1) {
                echo "合并{$isbn}到预订单{$ydd_pc}明细成功\n";
            } else {
                echo "合并{$isbn}到预订单{$ydd_pc}明细失败\n";
            }
        }
    }

//    print_r($yudingdan);
//    print_r($zhengdingdan_ids); //变量为空 什么都不会打印
//    print_r($zhengdingdan_nums);
//exit();

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
//
//                $sql = "SELECT count(*) as sum FROM v_ecs_book WHERE  isbn = '$ydd_isbn' and (jz1 > 0 or jz3 is not null) ";
//
//                $book = $con_mysql2->sdb($sql);
//                while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
//                    $to_be_transfered = $data['sum'];
////                    print_r($to_be_transfered);
////                    echo '   ';
//                }
//                是否有需要转移的数据
//                if ($to_be_transfered > 0) {
//                    $transfer_isbn[] = $ydd_isbn;
//                    $transfer_amount[] = $ydd_amount;
//                    $transfer_id[] = $ydd_id;
//                }
//

//                mysql
//                $sql1 = "SELECT count(*) as sum FROM ecs_book WHERE  isbn = '$ydd_isbn' and jz = '1' and kc > '0'";
//
//                $book1 = $con_mysql2->sdb($sql1);
//                while ($data1 = $book1->fetch_array(MYSQLI_ASSOC)) {
//                    $to_be_transfered1 = $data1['sum'];
////                    print_r($to_be_transfered);
////                    echo '   ';
//                }
//
//                $sql3 = "SELECT count(*) as sum FROM ecs_book WHERE  isbn = '$ydd_isbn' and jz = '3' and kc is not null";
//
//                $book3 = $con_mysql2->sdb($sql3);
//                while ($data3 = $book3->fetch_array(MYSQLI_ASSOC)) {
//                    $to_be_transfered3 = $data3['sum'];
////                    print_r($to_be_transfered);
////                    echo '   ';
//                }

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

//                        print_r($ydd_isbn);
                    }
//                $sql = "SELECT count(*) as sum FROM v_ecs_book WHERE  isbn = '$ydd_isbn' and (jz1 > 0 or jz3 is not null) ";
//
//                $to_be_transfered = '';
//                $flag = '';
//
//                $book = $con_mysql2->sdb($sql);
//                while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
//                    $to_be_transfered = $data['sum'];
////                    print_r($to_be_transfered);
////                    echo '   ';
//                }
////是否有需要转移的数据
//                if ($to_be_transfered > 0) {
//                    $transfer_isbn[] = $ydd_isbn;
//                    $transfer_amount[] = $ydd_amount;
//                    $transfer_id[] = $ydd_id;
//                }

                }
            }


        }

        //检查用户原来预订单中是否有可加入到当前征订单的书籍  结束

//        print_r($transfer_isbn);
//        print_r($transfer_amount);
//
//        print_r($transfer_id);

//        exit();
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
                echo "从预订单删除条目成功\n";
            } else {
                echo "从预订单删除条目失败\n";
            }


            //    删除预订单明细表的内容
            $count_transfer_isbn = count($transfer_isbn);

            for ($i = 0; $i < $count_transfer_isbn; $i++) {

//               删除时出现字段类型错误
//                $sql = "delete from bs_yudingdan_mx WHERE isbn = " . $transfer_isbn[$i];

                $sql = "delete from bs_yudingdan_mx WHERE isbn =  '$transfer_isbn[$i]' ";

//                print_r($sql);


                $rs = $ms->sdb($sql);

                if (odbc_num_rows($rs) == 1) {
                    echo "从预订单移除isbn号为$transfer_isbn[$i]的书籍成功\n";
                } else {
                    echo "从预订单移除isbn号为$transfer_isbn[$i]的书籍失败\n";
                }
            }

//            exit();

        }

//合并到征订单明细表 //

//        print_r($transfer_id);
//        print_r($zhengdingdan_ids);

        if (!empty($transfer_id)) {
            $zhengdingdan_ids = array_merge($transfer_id, $zhengdingdan_ids);
            $zhengdingdan_nums = array_merge($transfer_amount, $zhengdingdan_nums);
        }
//        print_r($zhengdingdan_ids);


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

            $sql = ins("bs_zhengdingdan", "zdd_pc_id,zdd_user_id,zdd_detail,zdd_time", "'$zdd_pc','$uid','$zhengdingdan',GETDATE()");
            $rs = $ms->sdb($sql);

            if (odbc_num_rows($rs) == 1) {
                echo "生成征订单{$zdd_pc}成功\n";
            } else {
                echo "生成征订单失败\n";
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
            }


        }


        //    写入征订单明细表

        $count_zhengdingdan_ids = count($zhengdingdan_ids);

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

//            $book = $con_mysql2->sdb($sql);
//            while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
//                $isbn = $data['isbn'];
//
////                echo $isbn;
//
//                $sm = iconv('UTF-8', 'GBK', $data['sm']);
//                $csm = iconv('UTF-8', 'GBK', $data['csm']);
//                $zzh = iconv('UTF-8', 'GBK', $data['zzh']);
//                $dj = $data['dj'];
//
//
//                if (empty($data['cbrq'])) {
//                    $cbrq = NULL;
//                } else {
//                    $cbrq = $data['cbrq'];
//                    if (strstr($cbrq, "-")) {
//                        if (substr_count($cbrq, "-") == 1) {
//                            $cbrq = $cbrq . '-01';
//                        }
//                        $cbrq = str_replace("-", "/", $cbrq);
//                    }
//                    $cbrq = date('Y/m/d', strtotime($cbrq));
//                }
//
//                $sl = $data['sl'];
//                $kb = iconv('UTF-8', 'GBK', $data['kb']);
//            }

            $book = $ms->sdb($sql);

            while (odbc_fetch_array($book)) {


//                $kuncun1 = trim(odbc_result($book, "kc"));
//                $isbn = trim(odbc_result($book, "isbn"));

                $isbn = trim(odbc_result($book, "isbn"));

                $sm = trim(odbc_result($book, "sm"));
                $csm = trim(odbc_result($book, "csm"));
                $zzh = trim(odbc_result($book, "zzh"));
                $dj = trim(odbc_result($book, "dj"));

                if (empty(trim(odbc_result($book, "cbrq")))) {
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
                echo "合并{$isbn}到征订单明细{$dd_pc}成功\n";
            } else {
                echo "合并{$isbn}到征订单明细{$dd_pc}失败\n";
            }
        }

    }


//    将已生成订单的状态更改为1

    $sql_update_dingdan_pici = "UPDATE [dbo]." . bs_temp_dingdan_pici . " SET  State = '1'     WHERE PiCi_Num = '$dd_pc'";

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


} else {
    echo "此批次中未选中书籍";
}




