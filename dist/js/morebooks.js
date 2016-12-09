/**
 * Created by xc on 2016/11/30.
 */
var global_url = $('#global_url').html();

var more_url = 'http://' + global_url + '/more.php';
var batch_option = '';

//    var generate_order_url = 'http://' + global_url + '/zhengdingdan/generate_order.php';
//    var batch_option_create_url = 'http://' + global_url + '/chachong/batch_option_create.php';
var progress = 0;
var progress_id = "progressbar";
var generate_order_url = 'http://' + global_url + '/chachong/generate_order.php';

var operate_temp_table_url = 'http://' + global_url + '/chachong/operate_temp_table.php';
var manipulate_session_two_types_url = 'http://' + global_url + '/manipulate_session_two_types.php';
var add_or_delete_this_page_temp_table_url = 'http://' + global_url + '/chachong/add_or_delete_this_page_temp_table.php';
var batch_item_url = 'http://' + global_url + '/chachong/batch_item.php';
var delete_batch_url = 'http://' + global_url + '/chachong/batch_item.php';

var default_num_two_types_url = 'http://' + global_url + '/default_num_two_types.php';
var get_progress_info_two_types_url = 'http://' + global_url + '/get_progress_info_two_types.php';
var batch_option_create_url = 'http://' + global_url + '/chachong/batch_option_create.php';
var add_to_batch_url = 'http://' + global_url + '/chachong/add_to_batch.php';
var reset_start_purchase_two_types_url = 'http://' + global_url + '/reset_start_purchase_two_types.php';

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

function firstpagesend() {
    //首页显示不判断用户id

    var fdata = new FormData();

    var page = $("#firstpage").attr("page");
    fdata.append("page", page);

    var type = $("#firstpage").attr("type");
    fdata.append("type", type);

    var show = $("#firstpage").attr("show");
    fdata.append("show", show);

    xhr.open('POST', more_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}


function prepagesend() {

    var fdata = new FormData();

    var page = $("#prepage").attr("page");
    fdata.append("page", page);

    var type = $("#prepage").attr("type");
    fdata.append("type", type);

    var show = $("#prepage").attr("show");
    fdata.append("show", show);

    xhr.open('POST', more_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}


function nextpagesend() {

    var fdata = new FormData();

    var page = $("#nextpage").attr("page");
    fdata.append("page", page);

    var type = $("#nextpage").attr("type");
    fdata.append("type", type);

    var show = $("#nextpage").attr("show");
    fdata.append("show", show);

    xhr.open('POST', more_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}


function lastpagesend() {

//        var fm = document.getElementById('condition');
    var fdata = new FormData();

    var page = $("#lastpage").attr("page");
    fdata.append("page", page);

    var type = $("#lastpage").attr("type");
    fdata.append("type", type);

    var show = $("#lastpage").attr("show");
    fdata.append("show", show);

    xhr.open('POST', more_url, true);

    xhr.send(fdata);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}

function to_page() {

    var page_a_tag_id = event.srcElement.id;
    var fdata = new FormData();

    var page = document.getElementById(page_a_tag_id).getAttribute("page");
    fdata.append("page", page);

    var type = document.getElementById(page_a_tag_id).getAttribute("type");
    fdata.append("type", type);

    var show = document.getElementById(page_a_tag_id).getAttribute("show");
    fdata.append("show", show);

    xhr.open('POST', more_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}


function jumptopagesend() {

    var fdata = new FormData();

    var page = $("#jumptopage").val();
    fdata.append("page", page);

    var type = $("#jumptopage").attr("type");
    fdata.append("type", type);

    var show = $("#jumptopage").attr("show");
    fdata.append("show", show);

    xhr.open('POST', more_url, true);

    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}


//多关联一
var checkboxes_sel = "input.checkall:checkbox:enabled";

var checkboxes_changed = function () {
    var $row = $('.row');
    var $div_list = $('#div_list');
    var $checkallbox = $div_list.find("input.checkall_box:checkbox");

    var total_boxes = $row.find(checkboxes_sel).length;
    var checked_boxes = $row.find(checkboxes_sel + ":checked").length;

//        alert(total_boxes);

//        alert(checked_boxes);

    if (total_boxes == checked_boxes) {
        $checkallbox.prop("checked", true);
    } else {
        $checkallbox.prop("checked", false);
    }
};

$(document).on("propertychange input", checkboxes_sel, checkboxes_changed);

//    var checkallbox_changed = function () {

//一关联多
function checkallbox_changed() {

    var $div_list = $('#div_list');
    var $checkallbox = $div_list.find("input.checkall_box:checkbox");
    var checkalllist = $('.checkall');

//        alert($checkallbox.prop("checked"));

    if ($checkallbox.prop("checked")) {

        $.each(checkalllist, function (index, domEle) {
            domEle.checked = true;
//                加入订单
//                domEle.trigger("click");
        });
//顺序不可变
        add_or_delete_this_page_temp_table('add');

    } else {

//顺序不可变
        add_or_delete_this_page_temp_table('delete');

//            alert(2);
        $.each(checkalllist, function (index, domEle) {
            domEle.checked = false;
//                取消订单
//                domEle.trigger("click");
        });


    }
};

function num_limit() {
//        $flag_for_num_limit++;
//        if ($flag_for_num_limit <= 1) {
    var list = $('input[id^=amount1]');
    $.each(list, function (index, domEle) {
        domEle.onkeyup = function () {
            this.value = this.value.replace(/\D/g, '');

            // alert(domEle.value);

            if (domEle.value > 5) {
                domEle.value = 5;
            }
            if (domEle.value < 1) {
                domEle.value = 1;
            }
        }
    });
//        }
}

//
//
// var checkboxes_sel = "input.checkall:checkbox:enabled";
//
// var checkboxes_changed = function () {
//     var $row = $('.row');
//     var $div_list = $('#div_list');
//     var $checkallbox = $div_list.find("input.checkall_box:checkbox");
//
//     var total_boxes = $row.find(checkboxes_sel).length;
//     var checked_boxes = $row.find(checkboxes_sel + ":checked").length;
//     if (total_boxes == checked_boxes) {
//         $checkallbox.prop("checked", true);
//     } else {
//         $checkallbox.prop("checked", false);
//     }
// };
//
// $(document).on("change", checkboxes_sel, checkboxes_changed);
//
// var checkallbox_changed = function () {
//     var $div_list = $('#div_list');
//     var $checkallbox = $div_list.find("input.checkall_box:checkbox");
//     var checkalllist = $('.checkall');
//     if ($checkallbox.prop("checked")) {
//         $.each(checkalllist, function (index, domEle) {
//             domEle.checked = true;
//         });
//     } else {
//         $.each(checkalllist, function (index, domEle) {
//             domEle.checked = false;
//         });
//     }
// };

function generate_order() {
    return;
    user_id = $('#userid').html();
    var utp = $('#usertype').html();
    if (utp == null || utp == undefined || utp == '') {
        alert("您还没登录");
        return false;
    }
    if (utp != "library_user") {
        alert("您不是图书馆用户");
    }
    var book_ids = [];
    var book_nums = [];
    var $row = $('.row');
    var checked_boxes = $row.find(checkboxes_sel + ":checked");

//        alert(checked_boxes.length);

    $.each(checked_boxes, function (index, checkboxEle) {
        if ($(this).parent().attr('class') == 'list') {
            book_nums.push($(this).parent().next().children().val());
        } else {
            book_nums.push($(this).next().children().val());
        }
//            if (checkboxEle.name) {
        book_ids.push(checkboxEle.name);
//            }
    })

//        alert(book_ids);
//        alert(book_nums);

//        return;

    xhr.open('POST', generate_order_url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("user_id=" + user_id + "&book_ids=" + book_ids + "&book_nums=" + book_nums);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);
        }
    }

}

// $('.down').on('mouseenter', function () {
//
//     var list = $('input[id^=sum_]');
//     $.each(list, function (index, domEle) {
//         domEle.onkeyup = function () {
//             this.value = this.value.replace(/\D/g, '');
//             if (domEle.value > 5) {
//                 domEle.value = 5;
//             }
//             if (domEle.value < 1) {
//                 domEle.value = 1;
//             }
//         }
//     });
// //
// });


$(".batch_icon").toggle(
    function () {
        $("#batch_table").show();
//                $("#toggle_table").attr('src');
    },
    function () {
        $("#batch_table").hide();
//                $("#toggle_table").attr('src');
    }
);

//    添加或删除一个页面的数据

function add_or_delete_this_page_temp_table(option) {

    var user_id = $('#userid').html();
    var book_index = [];
    var book_ids = [];
    var book_nums = [];
    var $row = $('.row');
    var checked_boxes = $row.find(checkboxes_sel + ":checked");
//        var total_num = 1;
//        alert(checked_boxes.length);

    $.each(checked_boxes, function (index, checkboxEle) {

//            alert($(this).parent().attr('class'));

        if ($(this).parent().attr('class') == 'list') {
            book_nums.push($(this).parent().next().children().val());
        } else {
            book_nums.push($(this).next().children().val());
        }
        if (checkboxEle.name) {
            book_ids.push(checkboxEle.name);
        }
    })


//        alert(option);

    if (option == 'add') {

        for (var i in book_nums) {

//                total_num = total_num && book_nums[i];
//有一本书数量为0
            if (book_nums[i] == 0) {

                alert("请填写数量");

//保持原来选中状态
                var $div_list = $('#div_list');
                var $checkallbox = $div_list.find("input.get_book_num_and_update_db_class:checkbox");
                var get_book_num_and_update_db_class_list = $('.get_book_num_and_update_db_class');
                var checkalllist = $('.checkall');


                var count = 0;
                $.each(get_book_num_and_update_db_class_list, function (index, domEle) {

                    if (this.value == 0) {
//                            domEle.checked = false;
                        book_index.push(count);
                    }

                    count = count + 1;
//                domEle.checked = domEle.is(':checked');

                });

//                    alert(book_index.length);
//                    alert(book_index);

                for (var j = 0; j < book_index.length; j++) {

                    $.each(checkalllist, function (index, domEle) {

                        if (index == book_index[j]) {
//                                book_index.push(index);
                            domEle.checked = false;

                        }

                    });
                }

                checkboxes_changed();


//                    $.each(checkalllist, function (index, domEle) {
//
//                        if (domEle.val()  == 0) {
////                            domEle.checked = false;
//                            book_index.push(index);
//                        }
//
//                        index = index + 1;
////                domEle.checked = domEle.is(':checked');
//                    });

//            $checkallbox.checked = false;
//            alert($checkallbox.checked);

                return;
            }

        }

    }

    if (option == 'delete') {

//            不改变输入框的值

//            var list = $('input[class=get_book_num_and_update_db_class]');
//            $.each(list, function (index, domEle) {
////                domEle.onkeyup = function () {
////                    this.value = this.value.replace(/\D/g, '');
//                domEle.value = 0;
////                }
//            });

    }


    xhr.open('POST', add_or_delete_this_page_temp_table_url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("user_id=" + user_id + "&book_ids=" + book_ids + "&book_nums=" + book_nums + "&option=" + option);
//        xhr.send("user_id=" + user_id);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);
        }
    }

}

//    已保存现场的修改

$('#down').delegate('.get_book_info_and_update_db_class', 'click', get_book_info_and_update_db_class_click);

function get_book_info_and_update_db_class_click() {

    var save = $(this);
    var add_one_book_to_order = 1;
    var book_id = '';
    var book_num = '';

    var fdata = new FormData();

    user_id = $('#userid').html();

    // book_id = null;
    book_id = this.name;

    if ($(this).parent().attr('class') == 'list') {
        book_num = $(this).parent().next().children().val();
    } else {
        book_num = $(this).next().children().val();
    }


    if (book_num == '0') {
        alert("请填写数量");
        $(this).prop("checked", false);
        return;
    }

    if (this.checked) {
    } else {
        //delete数据库中条目时不在置为0
        // $(this).parent().next().children().attr('value', 0);

        add_one_book_to_order = 0;
    }

    fdata.append("book_id", book_id);
    fdata.append("book_num", book_num);
    fdata.append("user_id", user_id);
    fdata.append("add_one_book_to_order", add_one_book_to_order);

    xhr.open('POST', operate_temp_table_url, true);
    xhr.send(fdata);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {

            if (this.responseText == '添加失败') {
                save.prop("checked", false);
            }

            alert(this.responseText);

            checkboxes_changed();
        }
    }

}

$('#batch_option').delegate('input[name=batch_option_radio]', 'click', create_or_add);

function create_or_add() {

    // var fdata = new FormData();
    $('#progressbar').hide();

    switch ($("input[name=batch_option_radio]:checked").attr("id")) {
        case "batch_option_create_radio":

            batch_option = 'create_new_batch';

            var list = $('.hide_before_purchase');
            var list_session = $('.hide_before_purchase_session');

            list.css("display", "none");
            list_session.css("display", "none");

            $('.flow').show();
            // $("#manipulate_session_two_types_btn").show();

            document.getElementById('manipulate_session_two_types_btn').disabled = false;

            $('.batch_r_f_td').hide();
            $("#batch_table").hide();
            break;

        case "batch_option_add_radio":

            var list = $('.hide_before_purchase');
            var list_session = $('.hide_before_purchase_session');

            batch_option = 'add_to_previous_batch';

            list.css("display", "none");
            list_session.css("display", "none");

            $('.batch_r_f_td').show();
            $("#batch_table").show();

            break;
        default:
            break;
    }

}

$('body').delegate('.get_book_num_and_update_db_class', 'propertychange input', get_book_num_and_update_db_class_propertychange);

function get_book_num_and_update_db_class_propertychange() {

    var save_num = $(this);

    var add_one_book_to_order = 1;

    var fdata = new FormData();

    user_id = $('#userid').html();

    // book_id = $(this).parent().prev().children().attr('name');

    // book_id = null;
    //
    book_id = this.name;

    book_num = $(this).val();

//            alert(book_id);
//            alert(book_num);
//
//
    if (book_num == '0') {
        $(this).attr('value', 1);
        book_num = 1;

//                add_one_book_to_order = 1;
//                $(this).parent().prev().children().prop("checked", false);
//                add_one_book_to_order = 0;
    } else {
        if (book_num > '5') {
            $(this).attr('value', 5);
            book_num = 5;
        }
//                add_one_book_to_order = 1;
    }

    // alert($(this).parent().prev().children().length);
    // alert($(this).prev().length);

    if ($(this).prev().length == 0) {
        $(this).parent().prev().children().prop("checked", true);
    } else if ($(this).prev().length == 1) {
        $(this).prev().prop("checked", true);
    }

//            if ($(this).parent().prev().children().prop("checked")) {
//            } else {
//                add_one_book_to_order = 0;
//            }

    fdata.append("book_id", book_id);
    fdata.append("book_num", book_num);
    fdata.append("user_id", user_id);
    fdata.append("add_one_book_to_order", add_one_book_to_order);

    xhr.open('POST', operate_temp_table_url, true);
    xhr.send(fdata);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {

//                    var $row = $('.row');
//                    var $div_list = $('#div_list');
//                    var $checkallbox = $div_list.find("input.checkall_box:checkbox");
//
//                    var total_boxes = $row.find(checkboxes_sel).length;
//                    var checked_boxes = $row.find(checkboxes_sel + ":checked").length;
//
//                    alert(total_boxes);
//
//                    alert(checked_boxes);
//
//                    if (total_boxes == checked_boxes) {
//                        $checkallbox.prop("checked", true);
//                    } else {
//                        $checkallbox.prop("checked", false);
//                    }

            if (this.responseText == '添加失败') {
                if (save_num.prev().length == 0) {
                    save_num.parent().prev().children().prop("checked", false);
                } else if (save_num.prev().length == 1) {
                    save_num.prev().prop("checked", false);
                }

            }
            alert(this.responseText);

            checkboxes_changed();

        }
    }

}


$("input[name=add_to_batch]").on("click", function () {

    $('.flow').show();
    document.getElementById('manipulate_session_two_types_btn').disabled = false;


    var batch_id = $(this).parent().parent().children().eq(0).children().eq(0).html();

    var fdata = new FormData();
    fdata.append("batch_id", batch_id);

    xhr.open('POST', add_to_batch_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            // alert(this.responseText);
        }
    }
});

function get_book_info_and_update_db() {

    $('.get_book_info_and_update_db_class').click(function () {
        if (this.checked)alert(this.value);//当前checkbox值
    })

}


function get_progress_info_two_types() {

    var fdata_progress = new FormData();

    xhr.open('POST', get_progress_info_two_types_url, true);
    xhr.send(fdata_progress);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
//                alert(this.responseText);
            progress = this.responseText;
        }
    }
}

function SetProgress(progress) {

    if (progress) {
        $("#" + progress_id + " > div").css("width", String(progress) + "%"); //控制#loading div宽度
        $("#" + progress_id + " > div").html(String(progress) + "%"); //显示百分比
    }

}

function doProgress() {

    var list = $('.hide_before_purchase');
    var list_session = $('.hide_before_purchase_session');

    if (progress >= 100) {

        SetProgress(progress);
        list.css("display", "block");
        list_session.css("display", "block");
        progress = 0;
        return;

    }
    if (progress < 100) {

        setTimeout("doProgress()", 100);
        SetProgress(progress);
        get_progress_info_two_types();

    }
}


function manipulate_session_two_types() {

    document.getElementById('manipulate_session_two_types_btn').disabled = true;

    var fdata = new FormData();
    var user_id = $('#userid').html();
    var default_num_two_types = $('#default_num_two_types').html();
    var list = $('.hide_before_purchase');
    var list_session = $('.hide_before_purchase_session');

    alert(default_num_two_types);

    $('.default_num_two_types_span').show();

    $('.default_num_two_types_input').show();

    if (default_num_two_types > 5) {
        default_num_two_types = 5;
    } else if (default_num_two_types < 1) {
        default_num_two_types = 1;
    }

    $('.default_num_two_types_input').val(default_num_two_types);


    $('#progressbar').show();
    $('#progressbar').children().eq(0).show();

//        $('#batch_option').show();

    $('.default_num_two_types_input').on('change', function () {
        var default_num_two_types = $('.default_num_two_types_input').val();
        var fdata_d_num = new FormData();

        if (default_num_two_types > 5) {
            default_num_two_types = 5;
        } else if (default_num_two_types < 1) {
            default_num_two_types = 1;
        }
        $('.default_num_two_types_input').val(default_num_two_types);

        fdata_d_num.append("default_num_two_types", default_num_two_types);

        xhr.open('POST', default_num_two_types_url, true);
        xhr.send(fdata_d_num);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
//                    alert(this.responseText);

                var list_a = $('.get_book_num_and_update_db_class');
                $.each(list_a, function (index, domEle) {
                    domEle.value = default_num_two_types;
                });

            }
        }
    });

    //新建或添加到原有
    $.ajax({
        url: manipulate_session_two_types_url,
        type: "post",
        data: {"user_id": user_id, "batch_option": batch_option},
        //async:true,
        beforeSend: function () {

            setTimeout("doProgress()", 500);

        },
        complete: function () {

        },
        success: function (a) {
        },
        error: function () {
        }
    });


}


$(".batch_item").on('click', function () {

    var batch_id = $(this).html();
    var a_new = "a_new";
    var list = "list";

    var fdata = new FormData();
    fdata.append("batch_id", batch_id);
    fdata.append("from_url", a_new);
    fdata.append("show_type", list);

    xhr.open('POST', batch_item_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {

            $('#list_pic').hide();

//                $('#list_pic_batch').hide();

            $('#list_pic_batch').show();
            $('#bottom').show();

            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }

});

$(".batch_icon").toggle(
    function () {
        $("#batch_table").show();
    },
    function () {
        $("#batch_table").hide();
    }
);

function firstpagesend_batch() {

    var fdata = new FormData();

    var page = $("#firstpage_batch").attr("page");
    fdata.append("page", page);

    var showtype = $("#firstpage_batch").attr("showtype");
    fdata.append("show_type", showtype);

    xhr.open('POST', batch_item_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}

function prepagesend_batch() {

    var fdata = new FormData();

    var page = $("#prepage_batch").attr("page");
    fdata.append("page", page);

    var showtype = $("#prepage_batch").attr("showtype");
    fdata.append("show_type", showtype);


    xhr.open('POST', batch_item_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}

function nextpagesend_batch() {

    var fdata = new FormData();

    var page = $("#nextpage_batch").attr("page");
    fdata.append("page", page);

    var showtype = $("#nextpage_batch").attr("showtype");
    fdata.append("show_type", showtype);

//        alert(page);
//        alert(showtype);

    xhr.open('POST', batch_item_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}

function lastpagesend_batch() {

    var fdata = new FormData();
    var page = $("#lastpage_batch").attr("page");
    fdata.append("page", page);

    var showtype = $("#lastpage_batch").attr("showtype");
    fdata.append("show_type", showtype);


    xhr.open('POST', batch_item_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}

function jumptopagesend_batch() {

    var fdata = new FormData();

    var page = $("#jumptopage_batch").val();
    fdata.append("page", page);
//        alert(page);
    var showtype = $("#jumptopage_batch").attr("showtype");
    fdata.append("show_type", showtype);


    xhr.open('POST', batch_item_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            document.getElementById('down').innerHTML = '';
            document.getElementById('down').innerHTML = this.responseText;
        }
    }
}


function send_batch(arg) {

    if ($('#pic_disable_list_batch_enable').is(':visible')) {

        var fdata = new FormData();

        fdata.append("show_type", 'list');

        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {

                $('#list_disable_pic_batch_enable').show();
                $('#pic_disable_list_batch_enable').hide();

                $('#list_pic').hide();
                $('#list_pic_batch').show();

//                    $('#bottom').show();

                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
//                $("#show").load("../../chachong/cc_list.php");
            }
        }
    }
}


function sendpic_batch() {

    if ($('#list_disable_pic_batch_enable').is(':visible')) {

        var fdata = new FormData();
        fdata.append("show_type", 'pic');

        xhr.open('POST', batch_item_url, true);
        xhr.send(fdata);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {

                $('#list_pic').hide();

                $('#list_disable_pic_batch_enable').hide();
                $('#pic_disable_list_batch_enable').show();

                document.getElementById('down').innerHTML = '';
                document.getElementById('down').innerHTML = this.responseText;
            }
        }
    }
}

$(".delete_batch").on('click', function () {

//        var batch_id = $(this).parent().parent().children().eq(1).children().eq(1).html();
    var batch_id = $(this).parent().parent().children().eq(0).children().eq(0).html();
//        alert(1);
    alert(batch_id);

    var fdata = new FormData();
    fdata.append("batch_id", batch_id);

    xhr.open('POST', delete_batch_url, true);
    xhr.send(fdata);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);
        }
    }

});
