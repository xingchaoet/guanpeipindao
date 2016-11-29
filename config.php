<?php
/**
 */

define('SQLServer_DB_HOST', '192.168.0.3');


define('SQLServer_DB_USER', 'test');
define('SQLServer_DB_PASSWORD', 'test2016');
define('SQLServer_DB_NAME', 'lscrm_db_test');
define('SQLServer_DB_DRIVER', 'SQL Server');
// define('DB_CHARSET','utf8');

define('TIMEZONE', "PRC");
define('PATH', '../gc/');
define('FPATH', '../zdd/');

//define('GLOBAL_URL', '192.168.1.138');

$url=$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/'.basename(dirname(__FILE__));
$web_url = basename(dirname(__FILE__));

define('WEB_DIR',$web_url);
define('GLOBAL_URL',$url);

//$GLOBALS['progress'] = 0;
?>