<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 9:51
 */

include("include/GuanCangSmarty.php");
require_once("config.php");
include("db/con_mysql2.php");
require_once("db/con_mssql.php");
include("db/dao.php");

//echo 'test';
//
//print_r($_POST) ;

//exit();
session_start();

$smarty = new GuanCangSmarty();
$smarty->MySmarty();

$show_type = $_REQUEST["show_type"];
$usrid = $_REQUEST["usrn"];
$lib_no = "";
$xm = "";
$guancangisbns = array();
$TJaddon = "";

//echo $show_type;
//
//exit();

$tsfl_data3_array = array();

//if (isset($_REQUEST['submit_cc'])) {
if (1) {

    //注释1---接收cc_index.php通过post传递出的参数，分别存储入变量-----------
    $bname = $_REQUEST["bname"];
    $isbn = $_REQUEST["isbn"];
    $csbname = $_REQUEST["csbname"];
    $writer = $_REQUEST["writer"];
    $keyword = $_REQUEST["keyword"];
    $price_low = $_REQUEST["price_low"];
    $price_high = $_REQUEST["price_high"];
    $sjdate_low = $_REQUEST["sjdate_low"];
    $sjdate_high = $_REQUEST["sjdate_high"];
    $cbdate_low = $_REQUEST["cbdate_low"];
    $cbdate_high = $_REQUEST["cbdate_high"];
    $zyfl_value = $_REQUEST["zyfl_id_sel"];
    $skfl_value = $_REQUEST["ztfl_sk_id_sel"];
    $zkfl_value = $_REQUEST["ztfl_zk_id_sel"];
    $media = $_REQUEST["media"];

    //注释2---判断参数是否为空，如果为空，不作任何操作。如果有参数传出，则生成相应SQL语句。---------------------
    if ($bname != null) {
        $a = " and sm like '%$bname%'";
    } else {
        $a = "";
    }
    if ($csbname != null) {
        $b = " and csm like '%$csbname%'";
    } else {
        $b = "";
    }
    if ($isbn != null) {
        $c = " and isbn like '%$isbn%'";
    } else {
        $c = "";
    }
    if ($writer != null) {
        $d = " and zzh like '%$writer%'";
    } else {
        $d = "";
    }
    if ($keyword != null) {
        $e = " and ztc like '%$keyword%'";
    } else {
        $e = "";
    }


//    先用dj1

    if ($price_low != null and $price_high != null) {
        $f = " and dj1 >= '$price_low' and  dj1 <= '$price_high'";
    } elseif ($price_low != null and $price_high = null) {
        $f = " and dj1 >= '$price_low' ";
    } elseif ($price_low = null and $price_high != null) {
        $f = " and dj1 <= '$price_high' ";
    } else {
        $f = "";
    }

    if ($sjdate_low != null and $sjdate_high != null) {
        $g = " and gxsj >= '$sjdate_low' and  gxsj <= '$sjdate_high'";
    } elseif ($sjdate_low != null and ($sjdate_high = null or $sjdate_high == "")) {
        $g = " and gxsj >= '$sjdate_low' ";
    } elseif (($sjdate_low = null or $sjdate_low == "") and $sjdate_high != null) {
        $g = " and gxsj <= '$sjdate_high' ";
    } else {
        $g = "";
    }
    if ($cbdate_low != null and $cbdate_high != null) {
        $h = " and cbrq >= '$cbdate_low' and  cbrq <= '$cbdate_high'";
    } elseif ($cbdate_low != null and ($cbdate_high = null or $cbdate_high == "")) {
        $h = " and cbrq >= '$cbdate_low' ";
    } elseif (($cbdate_low = null or $cbdate_low == "") and $cbdate_high != null) {
        $h = " and cbrq <= '$cbdate_high' ";
    } else {
        $h = "";
    }


    //图书分类查询分类cat_ID条件生成
    if ($zyfl_value != null) {
        $i = "";
        $cat_id_array = explode(",", $zyfl_value);
        foreach ($cat_id_array as $id_value) {
            $i = $i . " or zyfl like '%.$id_value.%'";
        }
        $i = " and (" . substr($i, 3, strlen($i) - 3) . ")";
    } else {
        $i = "";
    }

    //中图社科分类查询分类cat_ID条件生成
    if ($skfl_value != null) {

        $j = "";
        $cat_id_array = explode(",", $skfl_value);
        foreach ($cat_id_array as $id_value) {
            $j = $j . " or ztfl like '%.$id_value.%'";
        }
        $j = " and (" . substr($j, 3, strlen($j) - 3) . ")";
    } else {
        $j = "";
    }

    //中图自科分类查询分类cat_ID条件生成
    if ($zkfl_value != null) {
        $k = "";
        $cat_id_array = explode(",", $zkfl_value);
        foreach ($cat_id_array as $id_value) {
            $k = $k . " or ztfl like '%.$id_value.%'";
        }
        $k = " and (" . substr($k, 3, strlen($k) - 3) . ")";
    } else {
        $k = "";
    }

    if ($media != null) {
        switch ($media) {
            case "全部":
                $l = "";
                break;
            case "纸质书": //jz1>0
                $l = " and jz1 > '0'";
                break;
            case "按需印刷": //jz1=0 and jz3 is not null
//                $l = " and jz = '2'";
                $l = " and jz1 = '0' and jz3 is not null";
                break;
        }

    } else {
        $l = "";
    }
    //注释3---用追加的方法生成SQL语句--------
    $search_TJ = " (1=1)";
    $search_TJ .= $a;
    $search_TJ .= $b;
    $search_TJ .= $c;
    $search_TJ .= $d;
    $search_TJ .= $e;
    $search_TJ .= $f;
    $search_TJ .= $g;
    $search_TJ .= $h;
    $search_TJ .= $i;
    $search_TJ .= $j;
    $search_TJ .= $k;
    $search_TJ .= $l;
    if ($search_TJ == " (1=1)") {
        $search_TJ = " (1=0)";
    }

    $ms_tsfl30 = new con_mysql2();


    //从这里写查重条件

    $ms = new con_mssql();

//    $sql = ser("lib_lxr_info", "xm,lib_no", "ID='$usrid'");
////    echo $un;
////    echo $sql;
//
//    $rs = $ms->sdb($sql);
//    if (!$rs) {
////        echo '这里出错了';
//        echo "Error in query preparation/execution.<br />";
//        die(print_r(odbc_errormsg(), true));
//    }
//    if (odbc_fetch_row($rs)) {
//        $lib_no = trim(odbc_result($rs, "lib_no"));
//        $xm = trim(odbc_result($rs, "xm"));
//
////        echo '图书馆代号';
////        echo $lib_no;
////        echo '用户id';
////        echo $rID;
////        echo '用户姓名';
////        echo $xm;
//    } else {
////        echo 'test';
//    }


//用用户的id判断
    $sql_info = ser(lib_gc_info, "isbn", "inputby='$usrid'");

//    $sql_info = "SELECT isbn FROM lib_gc_info WHERE isbn='$isbn'";
//        echo $sql_info;

    $rs_info = $ms->sdb($sql_info);
//    $data = odbc_fetch_array($rs_info);

    while ($data = odbc_fetch_array($rs_info)) {
        $guancangisbns[] = $data['isbn'];
    };

//    print_r($guancangisbns);


    for ($i = 0; $i < count($guancangisbns); $i++) {
        $TJaddon .= '    AND isbn != ' . "'$guancangisbns[$i]'";
    }


    $TJaddon .= "    AND LENGTH(isbn) >= 11 "; //查询查重任何情况下都不出现电子书

//    $TJaddon .=  "    AND jz !=  '2' "; //查询查重任何情况下都不出现电子书


    $search_TJ = $search_TJ . $TJaddon;
//    echo $search_TJ;


//
//    exit();
//    print_r($search_TJ);

//    $sql_tsfl30 = ser("ecs_book", "book_id ", $search_TJ);
//得到总条数
    $sql_tsfl30 = ser("v_ecs_book", "isbn", $search_TJ);

//    echo $sql_tsfl30;

//    echo "test";
//    exit();
    $rs_tsfl30 = $ms_tsfl30->sdb($sql_tsfl30);
    $rows = mysqli_num_rows($rs_tsfl30);
//    echo "当前记录数：".$rows;



    //session_start();
    $_SESSION['search_TJ'] = $search_TJ;  // 少了不出结果
//因为分页函数里用到了

    //echo "当前查询条件11：".$search_TJ;
} else {
    $rows = isset($_REQUEST["rows"]) ? $_REQUEST["rows"] : 0;
    //echo "当前记录数：".$rows;
    //session_start();
    $search_TJ = $_SESSION['search_TJ'];

//    print_r($search_TJ);
//    $_SESSION['search_TJ'] = $search_TJ;

    //echo "当前查询条件12：".$search_TJ;
}
/* require_once('page.php');
page($sql,'index.php');
echo $pagenav;	 */


// Page分页函数
//if isset($page){$page = $_GET["page"];} else { $page=0;}
//$page = $_GET["page"];


//$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1;

function Page($rows, $page_size, $show_type)
{
    global $page, $select_from, $select_limit, $pagenav;
    $page_count = ceil($rows / $page_size);
    if ($page <= 1 || $page == '') $page = 1;
    if ($page >= $page_count) $page = $page_count;
    $select_limit = $page_size;
    $select_from = ($page - 1) * $page_size . ',';
    $pre_page = ($page == 1) ? 1 : $page - 1;
    $next_page = ($page == $page_count) ? $page_count : $page + 1;
//
//    $pagewhere = "&submit_cc=submit_cc";
//    @$_REQUEST["bname"] != '' ? $pagewhere .= "&bname=" . $_REQUEST["bname"] : '';
//    @$_REQUEST["isbn"] != '' ? $pagewhere .= "&isbn=" . $_REQUEST["isbn"] : '';
//    @$_REQUEST["csbname"] != '' ? $pagewhere .= "&csbname=" . $_REQUEST["csbname"] : '';
//    @$_REQUEST["writer"] != '' ? $pagewhere .= "&writer=" . $_REQUEST["writer"] : '';
//    @$_REQUEST["price_low"] != '' ? $pagewhere .= "&price_low=" . $_REQUEST["price_low"] : '';
//    @$_REQUEST["price_high"] != '' ? $pagewhere .= "&price_high=" . $_REQUEST["price_high"] : '';
//    @$_REQUEST["sjdate_low"] != '' ? $pagewhere .= "&sjdate_low=" . $_REQUEST["sjdate_low"] : '';
//    @$_REQUEST["sjdate_high"] != '' ? $pagewhere .= "&sjdate_high=" . $_REQUEST["sjdate_high"] : '';
//    @$_REQUEST["cbdate_low"] != '' ? $pagewhere .= "&cbdate_low=" . $_REQUEST["cbdate_low"] : '';
//    @$_REQUEST["cbdate_high"] != '' ? $pagewhere .= "&cbdate_high=" . $_REQUEST["cbdate_high"] : '';
//    @$_REQUEST["zyfl_id_sel"] != '' ? $pagewhere .= "&zyfl_id_sel=" . $_REQUEST["zyfl_id_sel"] : '';
//    @$_REQUEST["ztfl_sk_id_sel"] != '' ? $pagewhere .= "&ztfl_sk_id_sel=" . $_REQUEST["ztfl_sk_id_sel"] : '';
//    @$_REQUEST["ztfl_zk_id_sel"] != '' ? $pagewhere .= "&ztfl_zk_id_sel=" . $_REQUEST["ztfl_zk_id_sel"] : '';
//    @$_REQUEST["media"] != '' ? $pagewhere .= "&media=" . $_REQUEST["media"] : '';
//

//    $pagenav .= "<a href='search.php?page=1$pagewhere'>首页</a>&nbsp;&nbsp; ";
//    $pagenav .= "<a href='search.php?page=$pre_page$pagewhere'>前一页</a>&nbsp;&nbsp; ";
//    $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";
//    $pagenav .= "<a href='search.php?page=$next_page$pagewhere'>后一页</a>&nbsp;&nbsp; ";
//    $pagenav .= "<a href='search.php?page=$page_count$pagewhere'>末页</a>";
//    $pagenav .= "　跳到<select name='topage' size='1' onchange='window.location=\"search.php?page=\"+this.value$pagewhere'>\n";
//    for ($i = 1; $i <= $page_count; $i++) {
//        if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
//        else $pagenav .= "<option value='$i'>$i</option>\n";
//    }
    $pagenav .= "<a page = '1' showtype = $show_type id = 'firstpage' onclick='firstpagesend()'>首页</a>&nbsp;&nbsp; ";
    $pagenav .= "<a page = $pre_page showtype = $show_type id = 'prepage' onclick='prepagesend()'>前一页</a>&nbsp;&nbsp; ";
    $pagenav .= "第 $page/$page_count 页 共 $rows 条记录 &nbsp;&nbsp;";
    $pagenav .= "<a page = $next_page showtype = $show_type id = 'nextpage' onclick='nextpagesend()'>后一页</a>&nbsp;&nbsp; ";
    $pagenav .= "<a page = $page_count showtype = $show_type id = 'lastpage' onclick='lastpagesend()'>末页</a>";
//    将 showtype = $show_type 放到id = 'jumptopage' 之前 ，当$show_type为undefined时，会成为showtype =''id = 'jumptopage' 这种格式
//    使得函数jumptopagesend()找不到id为jumptopage的元素，取不到该元素的page值,使得page的值也是undefined
    $pagenav .= "　跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  showtype = $show_type >\n";
    for ($i = 1; $i <= $page_count; $i++) {
        if ($i == $page) $pagenav .= "<option value='$i' selected>$i</option>\n";
        else $pagenav .= "<option value='$i'>$i</option>\n";
    }
}

// Page分页函数
// 使用示例
// 用Page函数计算出 $select_from 从哪条记录开始检索、$pagenav 输出分页导航

if (isset($rows) and $rows > 0) {
    if ($show_type != 'pic') {
        $page_size = 12; //每页显示数量
    } else {
        $page_size = 12; //每页显示数量
    }

    $rows = mysqli_num_rows($rs_tsfl30);
//session_start();
    $search_TJ = $_SESSION['search_TJ'];
//echo "当前记录数2：".$rows;
//echo "当前查询条件2：".$search_TJ;
    Page($rows, $page_size, $show_type);


    $search_TJ1 = $search_TJ . " limit $select_from $select_limit";

//    echo $search_TJ1;

    $ms_tsfl3 = new con_mysql2();

//    $sql_tsfl3 = ser("ecs_book", "book_id,sm,isbn,zzh,kb,cbrq,dj,kc,slt ", $search_TJ1);


    $search_content = "(case
         when jz1>0 then bid1
         when jz1=0 and jz3 is not null then bid3
         when jz1=0 and jz3 is null then bid1
       end )as book_id ,

     sm,isbn,zzh,kb,cbrq,

      (case
         when jz1>0 then dj1
         when jz1=0 and jz3 is not null then dj3
         when jz1=0 and jz3 is null then dj1
       end )as dj ,

      (case
         when jz1>0 then jz1
         when jz1=0 then jz3
       end )as kc ,

       jz1,

       jz3,

       slt";

    $sql_tsfl3 = ser("v_ecs_book", $search_content, $search_TJ1);

//
//    $sql = " select
//
//      (case
//         when jz1>0 then bid1
//         when jz1=0 then bid3
//       end )as dj ,
//
//     sm,isbn,zzh,kb,cbrq,
//
//      (case
//         when jz1>0 then dj1
//         when jz1=0 then dj3
//       end )as dj ,
//
//      (case
//         when jz1>0 then jz1
//         when jz1=0 then jz3
//       end )as kc ,
//
//       slt
//    ";
//    echo $sql_tsfl3;

    $rs_tsfl3 = $ms_tsfl3->sdb($sql_tsfl3);
//    $tsfl_data3_array = array();
    while ($tsfl_data3 = mysqli_fetch_assoc($rs_tsfl3)) {
        $tsfl_data3_array[] = $tsfl_data3;
    }
}

//print_r($tsfl_data3_array);

//return ""

if (!empty($tsfl_data3_array)) {


    if ($show_type == 'chaxunchachong' | $show_type == 'list') {//list
//    if ($show_type != 'pic') {//list

        echo "<div id=\"div_list\" name=\"div_list\">
	<table   width=\"770\" border=0 cellspacing=0 >

	  <div>

		<tr>
			<td width=70 bgcolor=\"#EDEDED\" align=center><b>序号</b></td>


			<td height=30 width=20 bgcolor=\"#EDEDED\" >
			<input type=\"checkbox\" name=\"all\" checked=\"checked\" id=\"checkall_box\" class=\"checkall_box\"  onclick='checkallbox_changed();'/>
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

        is_array($tsfl_data3_array) ? null : $tsfl_data3_array = array(); //如果该变量不是一个有效数组，则设置该变量为一个空数组即array()，

        echo "<div class=\"row\" name = \"row\">";
        foreach ($tsfl_data3_array as $key => $tsfl_data3) {
            $bid = $tsfl_data3['book_id'];

//            $open=fopen("D:/xampps/htdocs/guanpeipindao/book_id.txt","a" );
//            fwrite($open, $bid."\r\n");
//            fclose($open);


            $n = $n + 1;
            echo "<tr><td height=20 width=15 align=center></td>";
            echo "<td class='list' height=20 width=15><input type='checkbox'  checked=\"checked\" name=\"$bid\" class=\"checkall\" value=$n /></td>";
            echo "<td><input style='width:15px' name='amount1[]' id=\"amount1_$bid\" onmouseover='num_limit();'  type='text' maxlength='1' size='1' value=2 /></td>";
            if (strlen(trim($tsfl_data3['sm'])) > 36) {
                echo "<td align='left' width='280'>" . mb_substr(trim($tsfl_data3['sm']), 0, 18, 'utf8') . "</td>";
            } else {
                echo "<td  align='left'>" . trim($tsfl_data3['sm']) . "</td>";
            }

            echo "<td  align='center'>" . trim($tsfl_data3['isbn']) . "</td>";
            $isbn11 = trim($tsfl_data3['isbn']);
            if (strlen(trim($tsfl_data3['zzh'])) > 20) {
                echo "<td  align='left'>" . mb_substr(trim($tsfl_data3['zzh']), 0, 20) . "</td>";
            } else {
                echo "<td  align='left'>" . trim($tsfl_data3['zzh']) . "</td>";
            }
            echo "<td align=center>" . trim($tsfl_data3['kb']) . "</td>";
            if ($tsfl_data3['cbrq'] == '') {
                echo "<td></td>";
            } else {
                echo "<td align=center>" . substr(trim($tsfl_data3['cbrq']), 0, 4) . "年" . str_pad(str_replace('/', '', str_replace('-', '', substr(trim($tsfl_data3['cbrq']), 5, 2))), 2, '0', STR_PAD_LEFT) . "月</td>";
            }
            echo "<td align=center>￥" . trim(sprintf('%.2f', $tsfl_data3['dj'])) . "</td>";
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

            echo "
    <div id=\"div_list\" name=\"div_list\" >
        <div>
            	<input type=\"checkbox\" name=\"all\" checked=\"checked\" id=\"checkall_box\" class=\"checkall_box\"  onclick='checkallbox_changed();'/>
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
            foreach ($tsfl_data3_array as $key => $tsfl_data3) {

                $bid = $tsfl_data3['book_id'];


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
            <input type='checkbox' class = 'checkall' checked = 'checked' name=\"$bid\"  value=$n />
            <input style='width:15px' name='amount1[]' id=\"amount1_$bid\" onmouseover='num_limit();' type='text' maxlength='1' size='1' value=2 />
            </td>
            </tr>";

                if (strlen(trim($tsfl_data3['sm'])) > 36) {
                    echo "<tr><td width='280' height=15>书名：" . mb_substr(trim($tsfl_data3['sm']), 0, 18, 'utf8') . "</td></tr>";
                } else {
                    echo "<tr><td>书名：" . trim($tsfl_data3['sm']) . "</td></tr>";
                }

                echo "<tr><td height=15>书号：" . trim($tsfl_data3['isbn']) . "</td></tr>";
                $isbn11 = trim($tsfl_data3['isbn']);
                if (strlen(trim($tsfl_data3['zzh'])) > 36) {
                    echo "<tr><td>作者：" . mb_substr(trim($tsfl_data3['zzh']), 0, 18) . "</td></tr>";
                } else {
                    echo "<tr><td>作者：" . trim($tsfl_data3['zzh']) . "</td></tr>";
                }
                echo "<tr><td>开本：" . trim($tsfl_data3['kb']) . "</td></tr>";
                if ($tsfl_data3['cbrq'] == '') {
                    echo "<tr><td></td></tr>";
                } else {
                    echo "<tr><td>出版年月：" . substr(trim($tsfl_data3['cbrq']), 0, 4) . "年" . str_pad(str_replace('/', '', str_replace('-', '', substr(trim($tsfl_data3['cbrq']), 5, 2))), 2, '0', STR_PAD_LEFT) . "月</td></tr>";
                }
                echo "<tr><td>定价：￥" . trim(sprintf('%.2f', $tsfl_data3['dj'])) . "</td></tr>";
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