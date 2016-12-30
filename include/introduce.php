<?php
/**
 * Created by PhpStorm.
 * User: xc
 * Date: 2016/11/28
 * Time: 17:59
 */
//include_once ("../auth.php");

$ms = new con_mssql();

if (!isset($_SESSION['last_access']) || (time() - $_SESSION['last_access']) > 600) {

    $_SESSION['last_access'] = time();

    //介绍文字
    $sql = ser("bs_home_introduce", "introduce", "");

// 查询数据

    $rs = $ms->sdb($sql);

    if (!$rs) {
        echo "Error in query preparation/execution.<br />";
        die(print_r(iconv('GBK', 'UTF-8', odbc_errormsg()), true));
    }
    if (odbc_fetch_row($rs)) {
        $introduce = odbc_result($rs, "introduce");
    }

    $introduce = iconv('gbk', 'utf-8//IGNORE', $introduce);
    $smarty->assign("introduce", $introduce);
    $_SESSION['last_access'] = $introduce;

} else {

    $introduce = $_SESSION['last_access'];

    $smarty->assign("introduce", $introduce);
}



