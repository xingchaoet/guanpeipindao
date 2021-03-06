/**
 * Created by xc on 2017/1/3.
 */
(function() {
    window.alert = function(text) {
        //解析alert内容中的换行符
        text = text.toString().replace(/\\/g, '\\').replace(/\n/g, '<br />').replace(/\r/g, '<br />');

        // 自定义DIV弹窗
        var alertdiv = '<div id="alertdiv" style="position:absolute; display:none ; overflow:hidden;  padding:10px 10px 8px; top: 50%; left: 50%; text-align:center; line-height:22px; background-color:#DDE4EE; border:1px solid #ccc">' + text + '<br /><input type="submit" name="button" id="button" value="确定" style="margin-top:8px;" onclick="$(this).parent().remove(); " /></div>';
        $(document.body).append(alertdiv);

        // 设置偏移数值，实现垂直和水平居中
        $("#alertdiv").css({
            "margin-left": $("#alertdiv").width() / 2 * (-1) - 20,
            "margin-top": $("#alertdiv").height() / 2 * (-1) - 20
        });

        // 显示
        $("#alertdiv").show();
    };
})();