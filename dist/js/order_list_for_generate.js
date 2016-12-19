/**
 * Created by xc on 2016/12/16.
 */
var generate_order_url = 'http://' + global_url + '/chachong/generate_order.php';
var delete_batch_url = 'http://' + global_url + '/chachong/delete_batch.php';

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

$('body').delegate('.generate_order_btn', 'click', do_generate_order);
function do_generate_order() {

    var save = $(this);
    // save.parent().parent().remove();
    // return;
    var batch_id = this.id;
    var fdata = new FormData();
    fdata.append("batch_id", batch_id);

    xhr.open('POST', generate_order_url, true);
    xhr.send(fdata);

    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
            alert(this.responseText);
            if (this.responseText == "此批次中未选中书籍") {
            } else {
                save.parent().parent().remove();
            }
        }
    }

}

$('.delete_batch').click(function (e) {

    var save_this = $(this);
    var batch_id = e.currentTarget.name;

    $.confirm({
        'title': '警告',
        'message': '确认删除',
        'buttons': {
            '是': {
                'class': 'blue',
                'action': function () {
                    var fdata = new FormData();
                    fdata.append("batch_id", batch_id);

                    xhr.open('POST', delete_batch_url, true);
                    xhr.send(fdata);
                    xhr.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            alert(this.responseText);

                            if (this.responseText == '删除成功！') {
                                save_this.parent().parent().remove();
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

});

