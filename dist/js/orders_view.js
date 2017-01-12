/**
 * Created by xc on 2016/12/20.
 */
var global_url = $('#global_url').html();

var orders_view_url = 'http://' + global_url + '/zhengdingdan/orders_view.php';

var guangcangimport_url = 'http://' + global_url + '/chachong/guangcang_chachong.php';
//    征订单查看详情
var orders_view_detail_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_detail.php';
//    已报征订单查看详情
var orders_view_detail_hide_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_detail_hide.php';


var zhengdingdan_hide_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_hide.php';

var view_hide_zhengdingdan_url = 'http://' + global_url + '/zhengdingdan/view_hide_zhengdingdan.php';


//    征订单查看详情 masql
var orders_view_detail_mssql_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_detail_mssql.php';

//    预订单查看详情
var orders_view_ydd_detail_url = 'http://' + global_url + '/zhengdingdan/yudingdan_detail.php';

//    征订单下载文件产生子页面
var zhengdingdan_download_marc_url = 'http://' + global_url + '/zhengdingdan/zhengdingdan_download_marc.php';
//    预订单下载文件产生子页面
var yudingdan_download_marc_url = 'http://' + global_url + '/zhengdingdan/yudingdan_download_marc.php';
//返回到我的预订单
var orders_view_ydd_url = 'http://' + global_url + '/zhengdingdan/return_yudingdan.php';
//修改密码
var change_password_url = 'http://' + global_url + '/members_space/change_password.php';

var check_old_password_url = 'http://' + global_url + '/members_space/check_old_password.php';

var order_list_for_generate_url = 'http://' + global_url + '/chachong/order_list_for_generate.php';

function creatXHR() {
    var xhr = null;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    }
    return xhr;
}

var xhr = creatXHR();

function gangcangimport() {
    var fm = document.getElementById('guangcangexcel');
    var fdata = new FormData(fm);

    xhr.open('POST', guangcangimport_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {

            document.getElementById('content').innerHTML = '';
            document.getElementById('content').innerHTML = this.responseText;

            // document.getElementById('light_overlay').style.display = 'block';
            $("#light_overlay").fadeIn("slow");
        }
    }
}

function firstpagesend() {

    var fdata = new FormData();

    var page = $("#firstpage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    var showtype = $("#firstpage").attr("showtype");
    fdata.append("show_type", showtype);

    if (showtype == 'orders_view') {
        xhr.open('POST', orders_view_url, true);
    } else if (showtype == 'detail') {
        xhr.open('POST', orders_view_detail_url, true);
    } else if (showtype == 'hide_zdd_detail') {
        xhr.open('POST', orders_view_detail_hide_url, true);
    }
    else {
        xhr.open('POST', view_hide_zhengdingdan_url, true);
    }

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

//    预订单首页
function ydd_firstpagesend() {

    var fdata = new FormData();

    var page = $("#ydd_firstpage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    xhr.open('POST', orders_view_ydd_detail_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_yudingdan').innerHTML = '';
            document.getElementById('show_yudingdan').innerHTML = this.responseText;
        }
    }
}


function prepagesend() {

    var fdata = new FormData();

    var page = $("#prepage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    var showtype = $("#prepage").attr("showtype");
    fdata.append("show_type", showtype);

    if (showtype == 'orders_view') {
        xhr.open('POST', orders_view_url, true);
    } else if (showtype == 'detail') {
        xhr.open('POST', orders_view_detail_url, true);
    } else if (showtype == 'hide_zdd_detail') {
        xhr.open('POST', orders_view_detail_hide_url, true);
    }
    else {
        xhr.open('POST', view_hide_zhengdingdan_url, true);
    }

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

//预订单前一页
function ydd_prepagesend() {

    var fdata = new FormData();

    var page = $("#ydd_prepage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    xhr.open('POST', orders_view_ydd_detail_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_yudingdan').innerHTML = '';
            document.getElementById('show_yudingdan').innerHTML = this.responseText;
        }
    }
}

function nextpagesend() {

    var fdata = new FormData();

    var page = $("#nextpage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    var showtype = $("#nextpage").attr("showtype");
    fdata.append("show_type", showtype);
//        alert(showtype);

    if (showtype == 'orders_view') {
        xhr.open('POST', orders_view_url, true);
    } else if (showtype == 'detail') {
        xhr.open('POST', orders_view_detail_url, true);
    } else if (showtype == 'hide_zdd_detail') {
        xhr.open('POST', orders_view_detail_hide_url, true);
    }
    else {
        xhr.open('POST', view_hide_zhengdingdan_url, true);
    }

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

//预订单下一页
function ydd_nextpagesend() {

    var fdata = new FormData();

    var page = $("#ydd_nextpage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    xhr.open('POST', orders_view_ydd_detail_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_yudingdan').innerHTML = '';
            document.getElementById('show_yudingdan').innerHTML = this.responseText;
        }
    }
}


function lastpagesend() {

//        var fm = document.getElementById('condition');
    var fdata = new FormData();
    var page = $("#lastpage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    var showtype = $("#lastpage").attr("showtype");
    fdata.append("show_type", showtype);

    if (showtype == 'orders_view') {
        xhr.open('POST', orders_view_url, true);
    } else if (showtype == 'detail') {
        xhr.open('POST', orders_view_detail_url, true);
    } else if (showtype == 'hide_zdd_detail') {
        xhr.open('POST', orders_view_detail_hide_url, true);
    }
    else {
        xhr.open('POST', view_hide_zhengdingdan_url, true);
    }

    xhr.send(fdata);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

//预订单最后一页
function ydd_lastpagesend() {

    var fdata = new FormData();
    var page = $("#ydd_lastpage").attr("page");
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    xhr.open('POST', orders_view_ydd_detail_url, true);

    xhr.send(fdata);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_yudingdan').innerHTML = '';
            document.getElementById('show_yudingdan').innerHTML = this.responseText;
        }
    }
}

function jumptopagesend() {

    var fdata = new FormData();

    var page = $("#jumptopage").val();
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    var showtype = $("#jumptopage").attr("showtype");
    fdata.append("show_type", showtype);

    if (showtype == 'orders_view') {
        xhr.open('POST', orders_view_url, true);
    } else if (showtype == 'detail') {
        xhr.open('POST', orders_view_detail_url, true);
    } else if (showtype == 'hide_zdd_detail') {
        xhr.open('POST', orders_view_detail_hide_url, true);
    }
    else {
        xhr.open('POST', view_hide_zhengdingdan_url, true);
    }

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

//    预订单跳转到页面
function ydd_jumptopagesend() {

    var fdata = new FormData();

    var page = $("#ydd_jumptopage").val();
    fdata.append("page", page);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);

    xhr.open('POST', orders_view_ydd_detail_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_yudingdan').innerHTML = '';
            document.getElementById('show_yudingdan').innerHTML = this.responseText;
        }
    }
}

$('#show_zhengdingdan').on('mouseenter', function () {

    var flag;
    zdd_times_slice = $('#zdd_times_slice').text();
    zdd_times = $('#zdd_times').text();
    if (zdd_times_slice != '' && zdd_times_slice != 'undefined' && zdd_times_slice != null) {
        flag = zdd_times_slice;
    } else {
        flag = zdd_times;
    }

    if (flag == 1) {

        $(".view_zdd_detail").one("click", function () {
            var fdata = new FormData();
            var uid = $("#userid").text();
            fdata.append("usrn", uid);
            var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
//                alert(sheet_no);
            fdata.append("sheet_no", sheet_no);

            xhr.open('POST', orders_view_detail_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    document.getElementById('show_zhengdingdan').innerHTML = '';
                    document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
                }
            }

        });
//测试
//            $(".view_zdd_detail_mssql").one("click", function () {
//                var fdata = new FormData();
//                var uid = $("#userid").text();
//                fdata.append("usrn", uid);
//                var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
////                alert(sheet_no);
//                fdata.append("sheet_no", sheet_no);
//
//                xhr.open('POST', orders_view_detail_mssql_url, true);
//                xhr.send(fdata);
//                xhr.onreadystatechange = function () {
//                    if (this.readyState == 4) {
//                        document.getElementById('show_zhengdingdan').innerHTML = '';
//                        document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
//                    }
//                }
//
//            });

        $(".zhengdingdan_download_marc").one("click", function () {

            var fdata = new FormData();
            var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
            fdata.append("sheet_no", sheet_no);
            var type_num = $(this).parent().parent().children().eq(2).prop('id');
            fdata.append("type_num", type_num);

            xhr.open('POST', zhengdingdan_download_marc_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    document.getElementById('show_zhengdingdan').innerHTML = '';
                    document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
                }
            }
        });


//            dmarc();

        download_zhengdingdan();

        $('#zdd_times').text('2');

        if (zdd_times_slice == 1) {
            $('#zdd_times_slice').text('2');
        }

    }

});


//报单动作
$('.down').delegate('#declaration_tj_btn', 'click', declaration_tj_btn_id_click);

function declaration_tj_btn_id_click() {

    // var save_this = $(this);
    // var sheet_no = e.currentTarget.name;
    var fdata = new FormData();
    var gps = $("#company_gps option:selected").text();

    var email_content = $('#email_content').val();

    var email = $('#gps_people').val();
    // alert(email);

    if (email == '-1') {
        alert('无用户邮箱信息');
        return;
    }

    $.confirm({
        'title': '提示',
        'message': '确认提交报单',
        'buttons': {
            '是': {
                'class': 'blue',
                'action': function () {

                    fdata.append("email", email);
                    fdata.append("sheet_no", window.sheet_no);
                    fdata.append("gps", gps);
                    fdata.append("email_content", email_content);

                    // alert(gps);
                    xhr.open('POST', zhengdingdan_hide_url, true);
                    xhr.send(fdata);
                    xhr.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            if (this.responseText == '1') {
                                $("#declaration").fadeOut("slow");
                                window.save_this.parent().parent().remove();
                            } else if (this.responseText == '0') {
                                $("#declaration").fadeOut("slow");
                                alert('报单失败');
                            } else {


                                alert(this.responseText);
                                // alert('error');
                            }
                        }
                    }
                }
            },
            '否': {
                'class': 'gray',
                'action': function () {
                }	// Nothing to do in this case. You can as well omit the action property.
            }
        }
    });
}


function zhengdingdan_hide_class_click(e) {
    window.save_this = $(this);
    window.sheet_no = e.currentTarget.name;

    $("#declaration").fadeIn("slow");
}

$('#show_zhengdingdan').delegate('.zhengdingdan_hide', 'click', zhengdingdan_hide_class_click);
//已报单批次列表
$('#show_zhengdingdan').delegate('#view_hide_zhengdingdan', 'click', view_hide_zhengdingdan_id_click);

function view_hide_zhengdingdan_id_click() {

    var fdata = new FormData();
    fdata.append("page", 1);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);
    xhr.open('POST', view_hide_zhengdingdan_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
    // alert(1);

}

//已报单某批次详情列表
$('#show_zhengdingdan').delegate('#view_hide_zdd_detail', 'click', view_hide_zdd_detail_id_click);

function view_hide_zdd_detail_id_click() {

    var fdata = new FormData();
    var uid = $("#userid").text();
    fdata.append("usrn", uid);
    var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
    // alert(sheet_no);
    fdata.append("sheet_no", sheet_no);

    xhr.open('POST', orders_view_detail_hide_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

//已报单某批次详情下载
$('#show_zhengdingdan').delegate('#hide_zhengdingdan_download_marc', 'click', hide_zhengdingdan_download_marc_id_click);

function hide_zhengdingdan_download_marc_id_click() {

    var fdata = new FormData();
    var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
    fdata.append("sheet_no", sheet_no);
    var type_num = $(this).parent().parent().children().eq(2).prop('id');
    fdata.append("type_num", type_num);

    fdata.append("zdd_is_hide", '已报单');

    xhr.open('POST', zhengdingdan_download_marc_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

$('#show_yudingdan').on('mouseenter', function () {

    var flag;
    ydd_times_slice = $('#ydd_times_slice').text();
    ydd_times = $('#ydd_times').text();
//        alert(ydd_times_slice);
    if (ydd_times_slice != '' && ydd_times_slice != 'undefined' && ydd_times_slice != null) {
//            alert(ydd_times_slice);
        flag = ydd_times_slice;
    } else {
//            alert(ydd_times_slice);
        flag = ydd_times;
    }

    if (flag == 1) {
//            查看预订单详情
        $(".view_ydd_detail").one('click', function () {
            var fdata = new FormData();
            var uid = $("#userid").text();
            fdata.append("usrn", uid);
            var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
//                alert(sheet_no);
            fdata.append("sheet_no", sheet_no);

            xhr.open('POST', orders_view_ydd_detail_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    document.getElementById('show_yudingdan').innerHTML = '';
                    document.getElementById('show_yudingdan').innerHTML = this.responseText;
                }
            }

        });

//预订单转到下载页面按钮

        $(".yudingdan_download_marc").on("click", function () {

            var fdata = new FormData();
            var sheet_no = $(this).parent().parent().children().eq(0).prop('id');
            fdata.append("sheet_no", sheet_no);
//                alert(sheet_no);
            var type_num = $(this).parent().parent().children().eq(2).prop('id');
            fdata.append("type_num", type_num);
//                alert(type_num);

            xhr.open('POST', yudingdan_download_marc_url, true);
            xhr.send(fdata);
            xhr.onreadystatechange = function () {
                if (this.readyState == 4) {
                    document.getElementById('show_yudingdan').innerHTML = '';
                    document.getElementById('show_yudingdan').innerHTML = this.responseText;
                }
            }

        });


//            dmarc_ydd();

        download_yudingdan();

        //            下载页面下载按钮绑定一次事件
//            dmarc();

        $('#ydd_times').text('2');

        if (ydd_times_slice == 1) {
            $('#ydd_times_slice').text('2');
        }

    }
});


function return_to_my_zhengdingdan() {
    var fdata = new FormData();
    fdata.append("page", 1);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);
    xhr.open('POST', orders_view_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

function return_to_my_hide_zhengdingdan() {
    var fdata = new FormData();
    fdata.append("page", 1);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);
    xhr.open('POST', view_hide_zhengdingdan_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_zhengdingdan').innerHTML = '';
            document.getElementById('show_zhengdingdan').innerHTML = this.responseText;
        }
    }
}

function return_to_my_yudingdan() {
    var fdata = new FormData();
    fdata.append("page", 1);

    var uid = $("#userid").text();
    fdata.append("usrn", uid);
    xhr.open('POST', orders_view_ydd_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('show_yudingdan').innerHTML = '';
            document.getElementById('show_yudingdan').innerHTML = this.responseText;
        }
    }
}

//    功能完好

function download_zhengdingdan() {

    $(".download_zhengdingdan").click(function () {

        if ((!$("input[type=radio][name=marc][value='excel']").attr("checked")) && (!$("input[type=radio][name=marc][value='marc']").attr("checked"))) {

            alert('未选择文件类型！');
            return;
        }

        if (($("input[type=radio][name=marc][value='marc']").attr("checked")) && (!($("#MARC").attr("checked") || $("#Calis").attr("checked") || $("#CF").attr("checked")))) {

            alert('未选择文件类型！');
            return;
        }

        var sheet_no = $(this).prop('id');
        if ($("#MARC").attr("checked") || $("#Calis").attr("checked") || $("#CF").attr("checked")) {

            var marc;
            var calis;
            var cf;

            if ($("#MARC").attr("checked")) {
                marc = 1;
            }
            if ($("#Calis").attr("checked")) {
                calis = 1;
            }
            if ($("#CF").attr("checked")) {
                cf = 1;
            }

            document.location.href =
                "http://" + global_url + "/zhengdingdan/download_marc.php?sheet_no=" + sheet_no + '&MARC=' + marc + '&CALIS=' + calis + '&CF=' + cf;
        }

        if (($("input[type=radio][name=marc][value='excel']").attr("checked"))) {
            document.location.href =
                "http://" + global_url + "/zhengdingdan/download_marc.php?sheet_no=" + sheet_no + '&EXCEL=1';
        }
    });
}


function download_yudingdan() {

    $(".download_yudingdan").click(function () {

        if ((!$("input[type=radio][name=marc_ydd][value='excel_ydd']").attr("checked")) && (!$("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked"))) {

            alert('未选择文件类型！');
            return;
        }

        if (($("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked")) && (!($("#MARC_YDD").attr("checked") || $("#Calis_YDD").attr("checked") || $("#CF_YDD").attr("checked")))) {

            alert('未选择文件类型！');
            return;
        }

        var sheet_no = $(this).prop('id');
        if ($("#MARC_YDD").attr("checked") || $("#Calis_YDD").attr("checked") || $("#CF_YDD").attr("checked")) {

            var marc;
            var calis;
            var cf;

            if ($("#MARC_YDD").attr("checked")) {
                marc = 1;
            }
            if ($("#Calis_YDD").attr("checked")) {
                calis = 1;
            }
            if ($("#CF_YDD").attr("checked")) {
                cf = 1;
            }
//                alert(sheet_no);

            document.location.href =
                "http://" + global_url + "/zhengdingdan/download_ydd_marc.php?sheet_no=" + sheet_no + '&MARC=' + marc + '&CALIS=' + calis + '&CF=' + cf;
        }

        if (($("input[type=radio][name=marc_ydd][value='excel_ydd']").attr("checked"))) {
            document.location.href =
                "http://" + global_url + "/zhengdingdan/download_ydd_marc.php?sheet_no=" + sheet_no + '&EXCEL=1';
        }
    });
}


function dmarc() {

    if (!($("input[type=radio][name=marc][value='marc']").attr("checked"))) {
        $('#Calis').attr("disabled", true);
        $('#CF').attr("disabled", true);
        $('#MARC').attr("disabled", true);
    }

    if (($("input[type=radio][name=marc][value='marc']").attr("checked"))) {
        $('#Calis').attr("disabled", false);
        $('#CF').attr("disabled", false);
        $('#MARC').attr("disabled", false);
    }

    $("input[type=radio][name=marc][value='excel']").change(function () {

        $("#Calis").attr("checked", false);
        $("#CF").attr("checked", false);
        $("#MARC").attr("checked", false);

        $('#Calis').attr("disabled", true);
        $('#CF').attr("disabled", true);
        $('#MARC').attr("disabled", true);
    })

    $("input[type=radio][name=marc][value='marc']").change(function () {
        $('#Calis').attr("disabled", false);
        $('#CF').attr("disabled", false);
        $('#MARC').attr("disabled", false);
    })
}

function dmarc_ydd() {
//        alert(1);
    if (!($("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked"))) {
        $('#Calis_YDD').attr("disabled", true);
        $('#CF_YDD').attr("disabled", true);
        $('#MARC_YDD').attr("disabled", true);
    }

    if (($("input[type=radio][name=marc_ydd][value='marc_ydd']").attr("checked"))) {
        $('#Calis_YDD').attr("disabled", false);
        $('#CF_YDD').attr("disabled", false);
        $('#MARC_YDD').attr("disabled", false);
    }

    $("input[type=radio][name=marc_ydd][value='excel_ydd']").change(function () {

        $("#Calis_YDD").attr("checked", false);
        $("#CF_YDD").attr("checked", false);
        $("#MARC_YDD").attr("checked", false);

        $('#Calis_YDD').attr("disabled", true);
        $('#CF_YDD').attr("disabled", true);
        $('#MARC_YDD').attr("disabled", true);
    })

    $("input[type=radio][name=marc_ydd][value='marc_ydd']").change(function () {
        $('#Calis_YDD').attr("disabled", false);
        $('#CF_YDD').attr("disabled", false);
        $('#MARC_YDD').attr("disabled", false);
    })
}

//验证原密码输入是否正确

$(document).ready(function () {

    var old_password_flag, new_password_flag, repeat_password_flag;

    $('#old_password').on('blur', old_password_input_blur);
    $('#new_password').on('blur', new_password_input_blur);
    $('#repeat_password').on('blur', repeat_password_input_blur);

    function chk_change_password() {
        if ((old_password_flag == 'yes') && (new_password_flag == 'yes') && (repeat_password_flag == 'yes')) {
            document.getElementById("change_password_btn").disabled = false;
        } else {
            document.getElementById("change_password_btn").disabled = true;
        }
    }


    function old_password_input_blur() {
//        alert(1);
        old_password = $('#old_password').val();
        //        alert(old_password);
        var fdata = new FormData();
        fdata.append("old_password", old_password);
        xhr.open('POST', check_old_password_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var msg = xhr.responseText;
//                    alert(msg);
                    if (msg == '1') {
                        $("#old_password_span").show();
                        $('#old_password_span').html("<font color='red'>原密码输入错误</font>");
                        old_password_flag = '';
                    } else if (msg == '0') {
                        $("#old_password_span").show();
                        $('#old_password_span').html("<font color='green'>原密码输入正确</font>");
                        old_password_flag = 'yes';
                    }
                }
            }
        }
    }


    function new_password_input_blur() {
        new_password = $('#new_password').val();
        if (new_password.length < 6) {
            $("#new_password_span").show();
            $('#new_password_span').html("<font color='red'>密码长度最少需要6位</font>")
        } else if (new_password.length >= 6 && new_password.length < 12) {
            $("#new_password_span").show();
            $('#new_password_span').html("<font color='green'>密码符合要求。密码强度：弱</font>")
            new_password_flag = 'yes';
        } else if ((new_password.match(/^[0-9]*$/) != null) || (new_password.match(/^[a-zA-Z]*$/) != null )) {
            $("#new_password_span").show();
            $('#new_password_span').html("<font color='green'>密码符合要求。密码强度：中</font>")
            new_password_flag = 'yes';
        } else {
            $("#new_password_span").show();
            $('#new_password_span').html("<font color='green'>密码符合要求。密码强度：高</font>")
            new_password_flag = 'yes';
        }

    }

    function repeat_password_input_blur() {
        new_password = $('#new_password').val();
        repeat_password = $('#repeat_password').val();
        if (new_password != repeat_password) {
            $("#repeat_password_span").show();
            $('#repeat_password_span').html("<font color='red'>两次密码输入不一致</font>");
            repeat_password_flag = '';
        } else if (repeat_password != '' && new_password == repeat_password) {
            $("#repeat_password_span").show();
            $('#repeat_password_span').html("<font color='green'>两次密码输入一致</font>")
            repeat_password_flag = 'yes';
        }

        chk_change_password();

    }

});

function change_password() {
    var fm = document.getElementById('change_password_form');
    var fdata = new FormData(fm);
    xhr.open('POST', change_password_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);
        }
    }
}
//
// $('.tab-selector-1').click(function () {
//     document.getElementById('light').style.display = 'none';
// });
//
// $('.tab-selector-2').click(function () {
//     document.getElementById('light').style.display = 'none';
// });
//
// $('.tab-selector-4').click(function () {
//     document.getElementById('light').style.display = 'none';
// });

$('#show_zhengdingdan').delegate('input[name=marc]', 'click', dmarc);
$('#show_yudingdan').delegate('input[name=marc_ydd]', 'click', dmarc_ydd);


function generate_order() {
    $('.down').hide();

    var fdata_generate_order = new FormData();

    xhr.open('POST', order_list_for_generate_url, true);
    xhr.send(fdata_generate_order);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
//                alert(this.responseText);
            $('.generate_order').html(this.responseText);
        }
    }

}

//    jQuery.fn.center = function () {
//        this.css("position", "absolute");
//        this.css("top", ( $(window).height() - this.height() ) / 2 + $(window).scrollTop() -280 + "px");
//        this.css("left", ( $(window).width() - this.width() ) / 2 + $(window).scrollLeft() -250 + "px");
//        return this;
//    }

$('#close').click(function () {
    $("#light_overlay").fadeOut("slow");
})

$('#declaration_close').click(function () {
    $("#declaration").fadeOut("slow");
})


// document.getElementsByTagName('textarea')[0].onkeypress = function () {
//     var value = this.value;
//
//     alert(value);
// };
//处理省份，select_gps是获取到的馆配商名称
function select_gps_people(select_gps) {
    var cObj = document.getElementById(gps_span);//取网页中id为city的容器对象

    //判断确实选择到了省份值
    if (select_gps != '' && select_gps != null && select_gps != 0 && select_gps != -1) {
        //将省份名称值提交lib_select.php

        var fdata = new FormData();
        fdata.append("gps", select_gps);
        xhr.open('POST', 'gps_people_select.php', true);
        xhr.send(fdata);

        xhr.onreadystatechange = function () {
            if (xhr.readyState != 4) {
            }
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    //将从chkpc中获取到的输出值写入网页中id为city的对象容器
                    //    alert(xhr.responseText);
                    // cObj.innerHTML = xhr.responseText;
                    $('#gps_span').html(this.responseText);
                }
            }
        }

    }
    else {
        cObj.innerHTML = '';
        //alert('请重新选择省份！');
        return false;
    }
}
