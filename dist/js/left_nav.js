/**
 * Created by Administrator on 2016/8/12.
 */

// var global_url = "<?php echo GLOBAL_URL;?>";
//    用户的id在orders_view.php中处理

// var global_url = "192.168.1.138";
var global_url = $('#global_url').html();

var leftMenu = [{
    "name": "馆配服务",
    "submenu": [{
        "name": "在线订购",
        "auth":"chachong_auth",
        "url": "http://"+global_url+"/chachong/chachong.php"
    }, {
        "name": "数据下载",
        "auth":"data_download_auth",
        "url": "http://"+global_url+"/data_download/data_download.php"
    }, {
        "name": "社馆互动",
        "auth":"hall_communication_auth",
        "url": "http://"+global_url+"/hall_communication/hall_communication.php"
    }, {
        "name": "会员空间",
        "auth":"members_space_auth",
        "url": "http://"+global_url+"/zhengdingdan/orders_view.php"
    }
    ]
},

];
$(function() {
    // alert(1);
    new AccordionMenu({
        menuArrs: leftMenu
    });
});
