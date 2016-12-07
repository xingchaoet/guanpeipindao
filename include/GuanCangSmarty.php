<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 10:40
 */
//定义服务器中的根目录的绝对地址
 define("WEB_ROOT",realpath(dirname(__FILE__)."/.."));

//echo WEB_ROOT;
//exit();

// //加载smarty类文件
require_once(WEB_ROOT."/libs/SmartyBC.class.php");
//扩展smarty类
class GuanCangSmarty extends SmartyBC {
    function MySmarty() {
//        $this->Smarty();
        $this->template_dir = WEB_ROOT.'/templates/';
        $this->compile_dir = WEB_ROOT.'/templates_c/';
        $this->config_dir = WEB_ROOT.'/configs/';
        $this->cache_dir = WEB_ROOT.'/caches/';
        $this->caching = false;
//        $this->caching = true;
//        $this->cache_lifetime = 60; //缓存时间

        //加载引用当前类的文件所在的目录到根目录的相对地址
//        require_once("./url_root.php");
        // //为样式路径赋值
        $this->assign("WEB_ROOT",WEB_ROOT);
    }
}

        ?>