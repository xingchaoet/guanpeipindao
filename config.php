<?php
//define('SQLServer_DB_HOST', '124.17.28.8,36005');
//
//define('SQLServer_DB_USER', 'sa');
//define('SQLServer_DB_PASSWORD', 'sciencep2015');
//define('SQLServer_DB_NAME', 'lscrm_db');

define('SQLServer_DB_HOST', '192.168.0.3');

define('SQLServer_DB_USER', 'test');
define('SQLServer_DB_PASSWORD', 'test_bitP_@)!^');
define('SQLServer_DB_NAME', 'lscrm_db_test');

define('SQLServer_DB_DRIVER', 'SQL Server');

define('TIMEZONE', "PRC");
define('PATH', '../gc/');
define('FPATH', '../zdd/');

$url=$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/'.basename(dirname(__FILE__));
$web_dir = basename(dirname(__FILE__));

define('WEB_DIR',$web_dir);
define('GLOBAL_URL',$url);
//define("__ROOT__",dirname(__FILE__));
function nocache_headers() {
    @ header('Expires: Thu, 01 Jan 1970 00:00:01 GMT');
    @ header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    @ header('Cache-Control:  private,no-cache, no-store,must-revalidate, max-age=0');
    @ header('Pragma: no-cache ,no-store');
}
nocache_headers();
?>