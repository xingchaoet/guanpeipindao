<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/13
 * Time: 14:41
 */
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
header("Content-type: text/html; charset=utf-8");
$ms=new con_mssql();
$Query = "select zw_name from xzzw_info order by zw_name";
$AdminResult=$ms->sdb($Query);
?>
<select id='zw' name='zw' height='20'>
    <option value='-1' >请选择职务</option>
    <?php
    while($zw=odbc_fetch_row($AdminResult)){
        $zw1=odbc_result($AdminResult,1);
        $zw2=iconv('GBK','UTF-8',$zw1);
        echo "<option value='".trim($zw2)."'>".trim($zw2)."</option>";
    }
    echo "</select>";

    ?>
