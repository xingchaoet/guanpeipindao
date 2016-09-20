<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 13:50
 */
session_start();
header('Content-Type:text/html;charset=UTF-8');
require_once("../config.php");
require_once("../DB/con_mssql.php");
require_once("../DB/DAO.php");
$name = addslashes($_GET['name']);
$pwd = $_GET['pwd'];
if(!empty($name) and !empty($pwd)){
    $ms=new con_mssql();
    $sql = "select xm,count,active,company,zw,ID,user_id,user_pwd from gps_lxr_info where ltrim(rtrim(user_id)) = '".$name."'";
    $rs1 = $ms->sdb($sql);

    $xm=trim(odbc_result($rs1,1));
    $count=odbc_result($rs1,2);
    $active=odbc_result($rs1,3);
    $gps_no=trim(odbc_result($rs1,4));
    $zw=trim(odbc_result($rs1,5));
    $ID=trim(odbc_result($rs1,6));
    $uid=trim(odbc_result($rs1,7));
    $ud=trim(odbc_result($rs1,8));

    if($active == ''){
        if(is_null($_COOKIE['count']) or $_COOKIE['count'] == 0){
            setcookie('count',1);
        }else{
            setcookie('count',$_COOKIE['count']+1);
        }
        $reback = 4;
    }else if($active == 0){
        $reback = '0';
    }else if($count >= 30){
        $reback = '3';
    }else{
        $sql .= " and user_pwd = '".md5($pwd)."'";
        $rs2 = $ms->sdb($sql);
        $num2=odbc_num_rows($rs2);
        if($num2 == 0 or $num2 == ''){
            $sql3="update gps_lxr_info set count = ".($count+1)." where ltrim(rtrim(user_id)) = '".$name."'";
            $rs3 = $ms->sdb($sql3);
            $reback = ($count+1);
        }else{
            if($count != 0){
                $sql3="update gps_lxr_info set count = 0 where ltrim(rtrim(user_id)) = '".$name."'";
                $rs3 = $ms->sdb($sql3);
            }
            if(isset($_COOKIE['count']) and $_COOKIE['count'] != 0){
                setcookie('count',0);
            }
            setcookie('name',$name,time()+60*10);
            setcookie('xm',$xm);
            setcookie('gps_no',$gps_no);

            $_SESSION['username'] = $uid;
            $_SESSION['islogin'] = 1;
            $_SESSION['user_id'] = $ID;

            $_SESSION['user_type'] = "gps_user";

            $_SESSION['ud'] = $ud;
            $_SESSION['name'] = $name;
            $_SESSION['xm'] = $xm;
            $_SESSION['gps_no'] = $gps_no;
            $reback = '-1';
        }
    }
}
echo $reback;
?>