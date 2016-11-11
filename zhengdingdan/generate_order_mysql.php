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

session_start();

$search_TJ = $_SESSION['search_TJ'];

$ms = new con_mssql();
$con_mysql2 = new con_mysql2();

// 有用户登录时，可从session中取用户id

$book_ids = $_POST['book_ids'];

//$lib_no = 'FJ0014';

$lib_no = $_SESSION['lib_no'];

$uid = $_POST['user_id'];

//预订单批次
$ydd_pc = $lib_no . $uid;

//征订单批次
$zdd_pc = $lib_no . $uid . '_' . md5($search_TJ);


$ydd_isbn_list = array();
$ydd_amount_list = array();
$ydd_id_list = array();

$transfer_isbn = array();
$transfer_amount = array();
$transfer_id = array();


//将书籍分为两类，征订单和预订单
//print_r($book_ids);

if (!empty($book_ids)) {


//    征订单与预订单的处理 开始

    $book_id_s = explode(",", $book_ids);
    $book_nums = $_POST['book_nums'];
//从首页加入订单过来 没数量
    if (empty($book_nums)) {
        $book_nums = 1;
    }

    $book_num_s = explode(",", $book_nums);

    $yudingdan_ids = '';
    $yudingdan_nums = '';

    $zhengdingdan_ids = '';
    $zhengdingdan_nums = '';

    $gc_pc_time_prefix = date('YmdHis');


    for ($i = 0; $i < count($book_id_s); $i++) {
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

        $kuncun1 = null;
        $kuncun3 = null;

        $isbn = '';
        $flag = '';

        $sql = "select isbn ,kc from ecs_book where book_id = '$id' and jz = '1' ";

        $book1 = $con_mysql2->sdb($sql);
        while ($data1 = $book1->fetch_array(MYSQLI_ASSOC)) {
            $kuncun1 = $data1['kc'];
            $isbn = $data1['isbn'];
        }

        $sql = "select isbn ,kc from ecs_book where book_id = '$id' and jz = '3' ";


        $book3 = $con_mysql2->sdb($sql);
        while ($data3 = $book3->fetch_array(MYSQLI_ASSOC)) {
            $kuncun3 = $data3['kc'];
            $isbn = $data3['isbn'];
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
//        print_r($flag);
//        $open = fopen("D:/WWW/guanpeipindao/zhengdingdan/sql.txt", "a");
//        fwrite($open, $flag . "\r\n");
//        fclose($open);


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

            if (!$rs) {
                echo "创建预订单失败\n";
            } else {
                echo "创建预订单成功\n";
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

            if (!$rs) {
//                echo "合并{$isbn}到预订单条目失败\n";
            } else {
//                echo "合并{$isbn}到预订单条目成功\n";
            }

//        exit();
        }

//添加到明细表
        for ($i = 0; $i < count($yudingdan_ids); $i++) {

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

            $book = $con_mysql2->sdb($sql);
            while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
                $isbn = $data['isbn'];

                $sm = iconv('UTF-8', 'GBK', $data['sm']);
                $csm = iconv('UTF-8', 'GBK', $data['csm']);
                $zzh = iconv('UTF-8', 'GBK', $data['zzh']);
                $dj = $data['dj'];

                if (empty($data['cbrq'])) {
                    $cbrq = NULL;
                } else {
                    $cbrq = $data['cbrq'];
                    if (strstr($cbrq, "-")) {
                        if (substr_count($cbrq, "-") == 1) {
                            $cbrq = $cbrq . '-01';
                        }
                        $cbrq = str_replace("-", "/", $cbrq);
                    }
                    $cbrq = date('Y/m/d', strtotime($cbrq));
                }

                $sl = $data['sl'];
                $kb = iconv('UTF-8', 'GBK', $data['kb']);
            }

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
//            $open = fopen("D:/WWW/guanpeipindao/zhengdingdan/sql.txt", "a");
//            fwrite($open, $sql . "\r\n");
//            fclose($open);

//添加到预订单明细表
            $rs = $ms->sdb($sql);

            if (!$rs) {
                echo "合并{$isbn}到预订单明细失败\n";
            } else {
                echo "合并{$isbn}到预订单明细成功\n";
            }
        }
    }

//print_r($yudingdan);
//print_r($zhengdingdan_ids); //变量为空 什么都不会打印
//print_r($zhengdingdan_nums);
//exit();

//生成征订单
//是否生成征订单时才转移
    if (!empty($zhengdingdan_ids[0])) {


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

            for ($i = 0; $i < count($ydd_isbn_list); $i++) {

                $ydd_isbn = $ydd_isbn_list[$i];
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

                $sql1 = "SELECT count(*) as sum FROM ecs_book WHERE  isbn = '$ydd_isbn' and jz = '1' and kc > '0'";

                $book1 = $con_mysql2->sdb($sql1);
                while ($data1 = $book1->fetch_array(MYSQLI_ASSOC)) {
                    $to_be_transfered1 = $data1['sum'];
//                    print_r($to_be_transfered);
//                    echo '   ';
                }

                $sql3 = "SELECT count(*) as sum FROM ecs_book WHERE  isbn = '$ydd_isbn' and jz = '3' and kc is not null";

                $book3 = $con_mysql2->sdb($sql3);
                while ($data3 = $book3->fetch_array(MYSQLI_ASSOC)) {
                    $to_be_transfered3 = $data3['sum'];
//                    print_r($to_be_transfered);
//                    echo '   ';
                }


//是否有需要转移的数据
                if ($to_be_transfered1 > 0 || $to_be_transfered3 > 0) {
                    $transfer_isbn[] = $ydd_isbn;
                    $transfer_amount[] = $ydd_amount;
                    $transfer_id[] = $ydd_id;
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

        //检查用户原来预订单中是否有可加入到当前征订单的书籍  结束


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

            if (!$rs) {
//                echo "从预订单删除条目失败\n";
            } else {
//                echo "从预订单删除条目成功\n";
            }


            //    删除预订单明细表的内容
            for ($i = 0; $i < count($transfer_isbn); $i++) {
                $sql = "delete from bs_yudingdan_mx WHERE isbn = " . $transfer_isbn[$i];

                $rs = $ms->sdb($sql);

                if (!$rs) {
                    echo "从预订单移除isbn号为$transfer_isbn[$i]的书籍失败\n";
                } else {
                    echo "从预订单移除isbn号为$transfer_isbn[$i]的书籍成功\n";
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


//        是否已有该征订单
        $sql = ser(bs_zhengdingdan, "count(*) as sum", "zdd_pc_id ='$zdd_pc'");
        $rs = $ms->sdb($sql);
        $data = odbc_fetch_array($rs);
        $sum = $data['sum'];

//        去重，防止以前预订单表中的书籍又在这次征订单中
        $zhengdingdan_ids_nums = array_combine($zhengdingdan_ids, $zhengdingdan_nums);

        $zhengdingdan = json_encode((object)$zhengdingdan_ids_nums);

        if ($sum == '0') { // 生成新征订单

            echo "生成新征订单";

            $sql = ins("bs_zhengdingdan", "zdd_pc_id,zdd_user_id,zdd_detail,zdd_time", "'$zdd_pc','$uid','$zhengdingdan',GETDATE()");
            $rs = $ms->sdb($sql);

            if (!$rs) {
                echo "生成征订单失败\n";
            } else {
                echo "生成征订单成功\n";
            }
        } else { //添加到原有征订单

//            echo "添加到原有征订单";


            $sql = ser("bs_zhengdingdan", "zdd_detail", " zdd_pc_id = '$zdd_pc'");

            $rs = $ms->sdb($sql);

            $data = odbc_fetch_array($rs);

            $rs = $data['zdd_detail'];

            $zhengdingdan_detail = json_decode($rs, true) + $zhengdingdan_ids_nums;

            $zhengdingdan = json_encode((object)$zhengdingdan_detail);

            $sql = upd("bs_zhengdingdan", "zdd_detail = '$zhengdingdan'", "zdd_pc_id = '$zdd_pc'");

//        echo $sql;

            $rs = $ms->sdb($sql);

            if (!$rs) {
//                echo "合并" . print_r($zhengdingdan_ids_nums) . "到征订单条目失败";
            } else {
//                echo "合并" . print_r($zhengdingdan_ids_nums) . "到征订单条目成功";
            }


        }


        //    写入征订单明细表

        for ($i = 0; $i < count($zhengdingdan_ids); $i++) {

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

            $book = $con_mysql2->sdb($sql);
            while ($data = $book->fetch_array(MYSQLI_ASSOC)) {
                $isbn = $data['isbn'];

//                echo $isbn;

                $sm = iconv('UTF-8', 'GBK', $data['sm']);
                $csm = iconv('UTF-8', 'GBK', $data['csm']);
                $zzh = iconv('UTF-8', 'GBK', $data['zzh']);
                $dj = $data['dj'];


                if (empty($data['cbrq'])) {
                    $cbrq = NULL;
                } else {
                    $cbrq = $data['cbrq'];
                    if (strstr($cbrq, "-")) {
                        if (substr_count($cbrq, "-") == 1) {
                            $cbrq = $cbrq . '-01';
                        }
                        $cbrq = str_replace("-", "/", $cbrq);
                    }
                    $cbrq = date('Y/m/d', strtotime($cbrq));
                }

                $sl = $data['sl'];
                $kb = iconv('UTF-8', 'GBK', $data['kb']);
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

//            echo $sql;

//            $open = fopen("D:/WWW/guanpeipindao/zhengdingdan/sql.txt", "a");
//            fwrite($open, $sql . "\r\n");
//            fclose($open);

//添加到预订单明细表
            $rs = $ms->sdb($sql);

            if (!$rs) {
                echo "合并{$isbn}到征订单明细失败\n";
            } else {
                echo "合并{$isbn}到征订单明细成功\n";
            }
        }

    }

} else {
    echo "未选中书籍";
}




