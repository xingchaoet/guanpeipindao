<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/9
 * Time: 16:31
 */
//print_r($_POST);
include("../include/GuanCangSmarty.php");
require_once("../config.php");
require_once("../db/con_mssql.php");
include("../db/dao.php");
include("auth_chachong.php");

$show_type = $_REQUEST["show_type"];
//$show_type = 'list';

$smarty = new GuanCangSmarty();
$smarty->MySmarty();
//$batch_id = '';

$from_url = $_REQUEST["from_url"];



if ($from_url == 'a_new') {
    $batch_id = $_REQUEST["batch_id"];
    $_SESSION['batch_id'] = $batch_id;
    $_SESSION['dd_pc'] = $batch_id;

} else {
    $batch_id = $_SESSION['batch_id'];
}

//echo "$$$$$$$$$$$$$$$$$$$$$$";
echo "<div style='margin-top: 4px;'>";
echo "批次号：".($_SESSION['dd_pc']);
//echo "$$$$$$$$$$$$$$$$$$$$$$";
echo "</div>";

$usrid = $_REQUEST["usrn"];

$batch_book_data_array = array();

$batch_books = array();

$a = " AND Pi_Ci_No = '$batch_id'";

$ms = new con_mssql();
$batch_TJ = " (1=1)";
$batch_TJ .= $a;

if ($batch_TJ == " (1=1)") {
    $batch_TJ = " (1=0)";
}

$_SESSION['batch_TJ'] = $batch_TJ;

$batch_sql = " SELECT Book_Id FROM bs_temp_dingdan WHERE  " . $batch_TJ;
//$batch_sql = " SELECT Book_Id,Book_Num,Sequence_Number FROM bs_temp_dingdan WHERE  " .$batch_TJ;

//echo $batch_sql;

$rs_batch_sql = $ms->sdb($batch_sql);
//    $data = odbc_fetch_array($rs_info);
$batch_rows = odbc_num_rows($rs_batch_sql);

$_SESSION['batch_rows'] = $batch_rows;

//echo "当前记录数：" . $batch_rows;

//
//while ($data = odbc_fetch_array($rs_batch_sql)) {
//    $temp_book_id = $data['Book_Id'];
//    $temp_book_num = $data['Book_Num'];
//    $temp_sequence_number = $data['Sequence_Number'];
//
//    print_r($temp_book_id);
//    print_r($temp_book_num);
//    print_r($temp_sequence_number);
//
//    $batch_book_detail_sql = "SELECT * FROM  v_ecs_book WHERE bid1 = '$temp_book_id' OR bid3 = '$temp_book_id'";
//
//};


//首次搜索
//if (!empty($first_search)) {
//
//    $_SESSION['temp_table'] = $temp_table_bids;
//
//    $_SESSION['search_TJ'] = $batch_TJ;
//
//} else {
//
//    $batch_TJ = $_SESSION['search_TJ'];
//
//    $rows = $_SESSION['rows'];
//}
//
//
$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1; //不要改动这行代码的位置

function Page($rows, $page_size, $show_type)
{
    global $page, $select_from, $select_limit, $pagenav;
    $page_count = ceil($rows / $page_size);
    if ($page <= 1 || $page == '') $page = 1;
    if ($page >= $page_count) $page = $page_count;
    $select_limit = $page_size;
//mssql 待查
    $select_from = ($page - 1) * $page_size;
//mysql 待查
//    $select_from = ($page - 1) * $page_size . ',';
    $pre_page = ($page == 1) ? 1 : $page - 1;
    $next_page = ($page == $page_count) ? $page_count : $page + 1;

    $pagenav .= "<div style='margin-right: 3px;margin-top: 2px;float:right;'>";
    $pagenav .= "<a page = '1' showtype = $show_type id = 'firstpage_batch' onclick='firstpagesend_batch()'>首页</a>&nbsp;&nbsp; ";

    if ($page != 1) {
        $pagenav .= "<a page = $pre_page showtype = $show_type id = 'prepage_batch' onclick='prepagesend_batch()'>前一页</a>&nbsp;&nbsp; ";
    }

    $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";

    if ($page != $page_count) {
        $pagenav .= "<a page = $next_page showtype = $show_type id = 'nextpage_batch' onclick='nextpagesend_batch()'>后一页</a>&nbsp;&nbsp; ";
    }
    $pagenav .= "<a page = $page_count showtype = $show_type id = 'lastpage_batch' onclick='lastpagesend_batch()'>末页</a>";
//    将 showtype = $show_type 放到id = 'jumptopage' 之前 ，当$show_type为undefined时，会成为showtype =''id = 'jumptopage' 这种格式
//    使得函数jumptopagesend()找不到id为jumptopage的元素，取不到该元素的page值,使得page的值也是undefined
    $pagenav .= "　跳到<select name='topage' id = 'jumptopage_batch' size='1' onchange='jumptopagesend_batch()'  showtype = $show_type >\n";
    for ($i = 1; $i <= $page_count; $i++) {
        if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
        else $pagenav .= "<option value='$i'>$i</option>\n";
    }
    $pagenav .= "</div>";
}

// Page分页函数
// 使用示例
// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航

if (isset($batch_rows) and $batch_rows > 0) {
    if ($show_type != 'pic') {
        $page_size = 12; //每页显示数量
    } else {
        $page_size = 12; //每页显示数量
    }

    $batch_TJ = $_SESSION['batch_TJ'];
    Page($batch_rows, $page_size, $show_type);


    $search_content_first = "Book_Id,Book_Num,Sequence_Number";


    $sql_batch_book3 = "SELECT  Book_Id,Book_Num,Sequence_Number
FROM (SELECT $search_content_first,
ROW_NUMBER() OVER (ORDER BY Sequence_Number) AS RowNumber
FROM bs_temp_dingdan WHERE $batch_TJ) a
WHERE RowNumber > $select_from AND RowNumber <= ($select_from + $page_size)
ORDER BY a.Sequence_Number ASC ";

//    echo $sql_batch_book3;

//    $sql_batch_book3 = "SELECT rows, book_id,sm,isbn,zzh,kb,cbrq,dj,jz1,jz3,slt
//FROM (SELECT $search_content,rows,
//ROW_NUMBER() OVER (ORDER BY rows) AS RowNumber
//FROM v_ecs_book WHERE $batch_TJ) a
//WHERE RowNumber > $select_from AND RowNumber <= ($select_from + $page_size)
//ORDER BY a.rows DESC";
//
//
//
    $search_content = "
     sm,isbn,zzh,kb,

      (case
         when jz1>0 then cbrq1
         when (jz1=0 or jz1 is null) and jz3 is not null then cbrq3
         when (jz1=0 or jz1 is null) and jz3 is null then cbrq1
       end )as cbrq ,
       
      (case
         when jz1>0 then dj1
         when (jz1=0 or jz1 is null) and jz3 is not null then dj3
         when (jz1=0 or jz1 is null) and jz3 is null then dj1
       end )as dj ,

       jz1,

       jz3,

       slt";

    $rs_batch_book = $ms->sdb($sql_batch_book3);

    if (!$rs_batch_book) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(odbc_errormsg(), true));
    }
    while ($data = odbc_fetch_array($rs_batch_book)) {
        $temp_batch_book_data_array[] = $data;
    }

//    print_r($temp_batch_book_data3_array);

    for ($i = 0; $i <= count($temp_batch_book_data_array); $i++) {
        $temp_book_id = $temp_batch_book_data_array[$i]['Book_Id'];
        $temp_book_num = $temp_batch_book_data_array[$i]['Book_Num'];
        $temp_sequence_number = $temp_batch_book_data_array[$i]['Sequence_Number'];

//        print_r($temp_book_id);
//        echo "<br>";
//        print_r($temp_book_num);
//        echo "<br>";
//        print_r($temp_sequence_number);
//        echo "<br>";

        $batch_book_detail_sql = "SELECT " . $search_content . " FROM  v_ecs_book WHERE bid1 = '$temp_book_id' OR bid3 = '$temp_book_id'";
        $rs_batch_book_detail_sql = $ms->sdb($batch_book_detail_sql);

        if (!$rs_batch_book_detail_sql) {
            echo "Error in query preparation/execution.<br />";
            die(print_r(odbc_errormsg(), true));
        }

        while ($data = odbc_fetch_array($rs_batch_book_detail_sql)) {

            $data['Book_Id'] = $temp_book_id;
            $data['Book_Num'] = $temp_book_num;
            $data['Sequence_Number'] = $temp_sequence_number;

//            print_r($data);

            $batch_book_data_array[] = $data;
//            print_r($batch_book_data3_array);

        }

    };

//    echo '********************************************';
}
if (!empty($batch_book_data_array)) {


//    if ($show_type == 'chaxunchachong' | $show_type == 'list') {//list
    if ($show_type == 'list') {//list

//    if ($show_type != 'pic') {//list
        $book_num_list = 1;
        $check_all_list = "checked= \"checked\"";

        foreach ($batch_book_data_array as $key => $tsfl_data3) {
            $book_num_list = $book_num_list && $tsfl_data3['Book_Num'];
        }

        if (!$book_num_list) {
            $check_all_list = "";
        }


        echo "<div id=\"div_list\" name=\"div_list\">
	<table   width=\"770\" border=0 cellspacing=0 >

	  <div>

		<tr>

			<td height=30 width=20 bgcolor=\"#EDEDED\" >
			<input type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box\"  onclick='checkallbox_changed();' $check_all_list/>
			</td>


			<td width=30 bgcolor=\"#EDEDED\" align=center ><b>数量</b></td>
			<td width=230 bgcolor=\"#EDEDED\" align=center><b>书名</b></td>
			<td width=110 bgcolor=\"#EDEDED\" align=center><b>书号</b></td>
			<td width=120 bgcolor=\"#EDEDED\" align=center><b>作者</b></td>
			<td width=50 bgcolor=\"#EDEDED\" align=center><b>开本</b></td>
			<td width=90 bgcolor=\"#EDEDED\" align=center><b>出版日期</b></td>
			<td width=40 bgcolor=\"#EDEDED\" align=center><b>价格</b></td>
			<td width=70 bgcolor=\"#EDEDED\" align=center><b>库存</b></td>
		</tr>
	  </div>

		";

        $n = $_REQUEST["n"];
        if ($n == null or $n == 0) {
            $n = 0;
        }
        //$n=0;
        //while($tsfl_data3=mysqli_fetch_array($rs_tsfl3))


        is_array($batch_book_data_array) ? null : $batch_book_data_array = array(); //如果该变量不是一个有效数组，则设置该变量为一个空数组即array()，

        echo "<div class=\"row\" name = \"row\">";
        foreach ($batch_book_data_array as $key => $tsfl_data3) {
            $bid = $tsfl_data3['Book_Id'];
            $book_num = $tsfl_data3['Book_Num'];
//            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$";
//            echo $book_num;
//            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$";

            if (!empty($book_num)) {
                $checked = "checked= \"checked\"";
            } else {
                $checked = "";
            }

            $n = $n + 1;
            echo "<tr>";
            echo "<td class='list' height=20 width=15><input type='checkbox'   name=\"$bid\" class=\"checkall get_book_info_and_update_db_class\" value=$n $checked/></td>";
            echo "<td style='text-align: center'><input style='width:15px;' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class'    type='text' maxlength='1' size='1' value=\"$book_num\" /></td>";
            if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm']))) > 36) {
                echo "<td align='left' width='280'>" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])), 0, 18, 'utf8') . "</td>";
            } else {
                echo "<td  align='left'>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])) . "</td>";
            }

            echo "<td  align='center'>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['isbn'])) . "</td>";
//            $isbn11 = trim($tsfl_data3['isbn']);
            if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh']))) > 20) {
                echo "<td  align='left'>" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])), 0, 20) . "</td>";
            } else {
                echo "<td  align='left'>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])) . "</td>";
            }
            echo "<td align=center>" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['kb'])) . "</td>";
            if (iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq']) == '') {
                echo "<td></td>";
            } else {
                echo "<td align=center>" . substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 0, 4) . "年" . str_pad(str_replace('/', '', str_replace('-', '', substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 5, 2))), 2, '0', STR_PAD_LEFT) . "月</td>";
            }
            echo "<td align=center>￥" . trim(sprintf('%.2f', iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['dj']))) . "</td>";
            echo "<td align=center>";


            if ($tsfl_data3['jz1'] > 0) {
                echo '纸本可供';
            } else {

                if (is_numeric($tsfl_data3['jz3']) && ($tsfl_data3['jz3'] >= 0)) {
                    echo 'POD可供';
                } else if (is_null($tsfl_data3['jz3'])) {
                    echo '可预订';
                }
            }

            echo "</td></tr>";
        }

        echo "</div>";

        echo "</table>
          </div>";


    } else
        if ($show_type == 'pic') { // pic 图片格式显示
//    } else { // pic

            $book_num_pic = 1;
            $check_all_pic = "checked= \"checked\"";

            foreach ($batch_book_data_array as $key => $tsfl_data3) {
                $book_num_pic = $book_num_pic && $tsfl_data3['Book_Num'];
            }

            if (!$book_num_pic) {
                $check_all_pic = "";
            }

            echo "
    <div id=\"div_list\" name=\"div_list\" >
        <div>
            	<input type=\"checkbox\" name=\"all\"  id=\"checkall_box\" class=\"checkall_box \"  onclick='checkallbox_changed();' $check_all_pic/>
                <label>全选</label>

        </div>
			<table  width=\"770\" border=0 cellspacing=0 >
			<tr>
			<td width=256></td>
			<td width=256></td>
			<td width=256></td>
			</tr>
    ";

            $n = 0;

            echo "<div class=\"row\" name = \"row\">";

            //while($tsfl_data3=mysqli_fetch_array($rs_tsfl3))
            foreach ($batch_book_data_array as $key => $tsfl_data3) {

//                $bid = $tsfl_data3['book_id'];
                $bid = $tsfl_data3['Book_Id'];
                $book_num = $tsfl_data3['Book_Num'];
//            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$";
//            echo $book_num;
//            echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$";

                if (!empty($book_num)) {
                    $checked = "checked= \"checked\"";
                } else {
                    $checked = "";
                }

                $n = $n + 1;
                $colnn = $n % 3;
                if ($colnn == 1) {
                    echo "<tr><td>";
                } else {
                    echo "<td>";
                }
                echo "<table border=0 cellspacing=0>
             <tr>
             <td rowspan=8><img src=http://www.ecsponline.com" . trim($tsfl_data3['slt']) . " width=120 height=120></td>
             <td height=20>
            <input type='checkbox' class = 'checkall get_book_info_and_update_db_class'  name=\"$bid\"  value=$n $checked/>
            <input style='width:15px' name='amount1[]' id=\"amount1_$bid\" class='get_book_num_and_update_db_class'   type='text' maxlength='1' size='1' value=$book_num />
            </td>
            </tr>";

                if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm']))) > 36) {
                    echo "<tr><td width='280' height=15>书名：" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])), 0, 18, 'utf8') . "</td></tr>";
                } else {
                    echo "<tr><td>书名：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['sm'])) . "</td></tr>";
                }

                echo "<tr><td height=15>书号：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['isbn'])) . "</td></tr>";
//                $isbn11 = trim($tsfl_data3['isbn']);
                if (strlen(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh']))) > 36) {
                    echo "<tr><td>作者：" . mb_substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])), 0, 18) . "</td></tr>";
                } else {
                    echo "<tr><td>作者：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['zzh'])) . "</td></tr>";
                }
                echo "<tr><td>开本：" . trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['kb'])) . "</td></tr>";
                if (iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq']) == '') {
                    echo "<tr><td></td></tr>";
                } else {
                    echo "<tr><td>出版年月：" . substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 0, 4) . "年" . str_pad(str_replace('/', '', str_replace('-', '', substr(trim(iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['cbrq'])), 5, 2))), 2, '0', STR_PAD_LEFT) . "月</td></tr>";
                }
                echo "<tr><td>定价：￥" . trim(sprintf('%.2f', iconv('gbk', 'utf-8//IGNORE', $tsfl_data3['dj']))) . "</td></tr>";
                echo "<tr><td>库存：";


                if ($tsfl_data3['jz1'] > 0) {
                    echo '纸本可供' . "</td></tr></table>";
                } else {

                    if (is_numeric($tsfl_data3['jz3']) && ($tsfl_data3['jz3'] >= 0)) {
                        echo 'POD可供' . "</td></tr></table>";
                    } else if (is_null($tsfl_data3['jz3'])) {
                        echo '可预订' . "</td></tr></table>";
                    }
                }


                if ($colnn == 0) {
                    echo "</td></tr>";
                } else {
                    echo "</td>";
                }

            }

            echo "</div>";

            echo "
        </table>
		</div>
    ";
        }

    echo $pagenav;
}


?>
