/**
 * Created by xc on 2016/12/23.
 */
var generate_order_url = 'http://' + global_url + '/chachong/generate_order.php';

var tabs = document.getElementsByClassName('tab-head')[0].getElementsByTagName('h3'),
    contents = document.getElementsByClassName('tab-content')[0].getElementsByTagName('div');

(function changeTab(tab) {
    for (var i = 0, len = tabs.length; i < len; i++) {
        tabs[i].onmouseover = showTab;
    }
})();

function showTab() {
    for (var i = 0, len = tabs.length; i < len; i++) {
        if (tabs[i] === this) {
            tabs[i].className = 'selected';
            contents[i].className = 'show';
        } else {
            tabs[i].className = '';
            contents[i].className = '';
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

    // alert(total_boxes);

    // alert(checked_boxes);

    if (total_boxes == checked_boxes) {
        $checkallbox.prop("checked", true);
    } else {
        $checkallbox.prop("checked", false);
    }
};

// $(document).on("propertychange input", checkboxes_sel, checkboxes_changed);

//    var checkallbox_changed = function () {

//一关联多
function checkallbox_changed() {

    var $div_list = $('#div_list');
    var $checkallbox = $div_list.find("input.checkall_box:checkbox");
    var checkalllist = $('.checkall');

    // alert($checkallbox.prop("checked"));

    if ($checkallbox.prop("checked")) {

        $.each(checkalllist, function (index, domEle) {
            domEle.checked = true;
        });

    } else {
//            alert(2);
        $.each(checkalllist, function (index, domEle) {
            domEle.checked = false;
        });

    }
}


$('#batch_merge').click(function () {

    var utp = $('#usertype').html();

    if (utp == null || utp == undefined || utp == '') {
        alert("您还没登录");
        return false;
    }

    if (utp != "library_user") {
        alert("您不是图书馆用户");
    }

    user_id = $('#userid').html();

    // alert(utp);
    // alert(user_id);

    var batch_ids = [];
    var $row = $('.row');
    var checked_boxes = $row.find(checkboxes_sel + ":checked");

    $.each(checked_boxes, function (index, checkboxEle) {

        if (checkboxEle.name) {
            batch_ids.push(checkboxEle.name);
        }
    })

    if (batch_ids.length < 2) {
        alert('至少选择两个批次');
        return;
    } else if (batch_ids.length == 0) {
        alert('请先选择批次');
        return;
    }

    // alert(batch_ids);

    // return;

    xhr.open('POST', generate_order_url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("user_id=" + user_id + "&batch_ids=" + batch_ids);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);
        }
    }

})

$('#batch_split').click(function () {

    var utp = $('#usertype').html();

    var pod_paper_price_sum = $('#pod_paper_price_sum').html();

    if (utp == null || utp == undefined || utp == '') {
        alert("您还没登录");
        return false;
    }

    if (utp != "library_user") {
        alert("您不是图书馆用户");
    }

    // user_id = $('#userid').html();

    // alert(utp);
    // alert(user_id);

    var batch_ids = [];
    var $row = $('.row');
    var checked_boxes = $row.find(checkboxes_sel + ":checked");

    $.each(checked_boxes, function (index, checkboxEle) {

        if (checkboxEle.name) {
            batch_ids.push(checkboxEle.name);
        }
    })

    // alert(batch_ids.length);
    // alert(batch_ids);

    if (batch_ids.length > 1) {
        alert('一次只能拆分一个批次');
        return;
    } else if (batch_ids.length == 0) {
        alert('请先选择批次');
        return;
    }


    // var item = $(":radio:checked");
    var type;
    var num; //种类数或价格
    var radio_checked = $(":radio:checked");
    var len = radio_checked.length;

    if (len > 0) {

        type = radio_checked.val();
        num = (radio_checked.next().val());

    } else {
        alert("请选择拆分类型");
        return;
    }
    // alert(batch_ids);
    // alert(type);
    // alert(num);
    //
    // alert(pod_paper_price_sum);
    // return;
    xhr.open('POST', generate_order_url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("type=" + type + "&pod_paper_price_sum=" + pod_paper_price_sum + "&num=" + num + "&batch_ids=" + batch_ids);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);

        }
    }

})

