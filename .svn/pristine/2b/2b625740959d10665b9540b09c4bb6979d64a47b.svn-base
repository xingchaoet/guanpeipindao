<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 14:25
 */

include ("../libs/Smarty.class.php");
require_once("../config.php");
include("../db/dao.php");

include ("../db/con_mysql2.php");

$smarty = new Smarty();
$smarty->caching = false; //设置缓存方式

$ms_tsfl2=new con_mysql2();
$sql_tsfl2 = ser("v_ecs_category","cat_id,parent_id,cat_name","cat_desc='30'  order by cat_id " );
$rs_tsfl2 = $ms_tsfl2->sdb("select cat_id,parent_id,cat_name from v_ecs_category where cat_desc='30' order by cat_id;
");

print_r($rs_tsfl2);

