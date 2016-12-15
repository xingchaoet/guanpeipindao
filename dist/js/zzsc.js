var global_url = $('#global_url').html();
var userid = $('#userid').html();
var usertype = $('#usertype').html();


function isnot_login() {
    alert("您还没登录!");
}
function is_gps() {
    alert('请经销商用户到“数据下载”栏目查询下载数据！');
}


function showSub() {
    document.getElementById('query_generate').style.display = 'block';
}
function AccordionMenu(options) {
    this.config = {
        containerCls: '.wrap-menu', // 外层容器
        menuArrs: '', //  JSON传进来的数据
        type: 'click', // 默认为click 也可以mouseover
        renderCallBack: null, // 渲染html结构后回调
        clickItemCallBack: null // 每点击某一项时候回调
    };
    this.cache = {};
    this.init(options);
}


AccordionMenu.prototype = {

    constructor: AccordionMenu,

    init: function (options) {
        this.config = $.extend(this.config, options || {});
        var self = this,
            _config = self.config,
            _cache = self.cache;

        // 渲染html结构
        $(_config.containerCls).each(function (index, item) {

            self._renderHTML(item);

            // 处理点击事件
            self._bindEnv(item);
        });
    },
    _renderHTML: function (container) {
        var self = this,
            _config = self.config,
            _cache = self.cache;
        var ulhtml = $('<ul></ul>');
        $(_config.menuArrs).each(function (index, item) {
            var lihtml = $('<li><h2>' + item.name + '</h2></li>');

            if (item.submenu && item.submenu.length > 0) {
                self._createSubMenu(item.submenu, lihtml);
            }
            $(ulhtml).append(lihtml);
        });
        $(container).append(ulhtml);

        _config.renderCallBack && $.isFunction(_config.renderCallBack) && _config.renderCallBack();

        // 处理层级缩进
        self._levelIndent(ulhtml);
    },
    /**
     * 创建子菜单
     * @param {array} 子菜单
     * @param {lihtml} li项
     */
    _createSubMenu: function (submenu, lihtml) {
        var self = this,
            _config = self.config,
            _cache = self.cache;
        var subUl = $('<ul></ul>'),
            callee = arguments.callee,
            subLi;

        $(submenu).each(function (index, item) {
            var url = item.url || 'javascript:void(0)';

            if ((typeof(userid) == "undefined" || (userid == null) || (userid == ''))) {
                url = 'javascript:void(0)';
                subLi = $('<li><a onclick="isnot_login();" href="' + url + '">' + item.name + '</a></li>');
            } else {
                if (usertype == "gps_user" && item.auth == "chachong_auth") {
                    url = 'javascript:void(0)';
                    subLi = $('<li><a onclick="is_gps();" href="' + url + '">' + item.name + '</a></li>');
                } else if (item.auth == "chachong_auth") {
                    url = 'javascript:void(0)';
                    subLi = $('<li onclick="showSub();"><a href="' + url + '">' + item.name + '</a></li>');
                } else {
                    subLi = $('<li ><a href="' + url + '">' + item.name + '</a></li>');
                }
            }
            if (item.submenu && item.submenu.length > 0) {

                // alert(item.submenu.length);
                // $(subLi).children('a').prepend('<img src="../dist/images/nopicture.png" alt=""/>');


                var sub_sub_Ul = $('<ul id="query_generate"></ul>'),
                    sub_sub_li;

                $(item.submenu).each(function (index, item) {

                    // alert(item.url);
                    var sub_url = item.url || 'javascript:void(0)';

                    if ((typeof(userid) == "undefined" || (userid == null) || (userid == ''))) {
                        sub_url = 'javascript:void(0)';
                        sub_sub_li = $('<li><a onclick="isnot_login();" href="' + sub_url + '">' + item.name + '</a></li>');
                    } else {
                        if (item.auth == "order_generate") {
                            sub_url = 'javascript:void(0)';
                            sub_sub_li = $('<li onclick="generate_order();"><a href="' + sub_url + '">' + item.name + '</a></li>')
                        } else {
                            sub_sub_li = $('<li><a href="' + sub_url + '">' + item.name + '</a></li>')
                        }
                    }
                    //here
                    $(sub_sub_Ul).append(sub_sub_li);
                    // alert(sub_sub_Ul);
                });


                // $(subLi).children('a').append(sub_sub_Ul);
                $(subLi).append(sub_sub_Ul);

                // callee(item.submenu, subLi);
            }
            $(subUl).append(subLi);
        });
        $(lihtml).append(subUl);
    },
    /**
     * 处理层级缩进
     */
    _levelIndent: function (ulList) {
        var self = this,
            _config = self.config,
            _cache = self.cache,
            callee = arguments.callee;

        var initTextIndent = 2,
            lev = 1,
            $oUl = $(ulList);

        while ($oUl.find('ul').length > 0) {
            initTextIndent = parseInt(initTextIndent, 10) + 2 + 'em';
            $oUl.children().children('ul').addClass('lev-' + lev)
                .children('li').css({
                'text-indent': initTextIndent,
                // 'background-color': '#cc0000'
            });
            $oUl = $oUl.children().children('ul');
            lev++;
        }
        // $(ulList).find('ul').hide();
        $(ulList).find('ul:first').show();
    },
    /**
     * 绑定事件
     */
    _bindEnv: function (container) {
        var self = this,
            _config = self.config;

        $('h2,a', container).unbind(_config.type);
        $('h2,a', container).bind(_config.type, function (e) {
            if ($(this).siblings('ul').length > 0) {
                $(this).siblings('ul').slideToggle('slow').end().children('img').toggleClass('unfold');
            }

            $(this).parent('li').siblings().find('ul').hide()
                .end().find('img.unfold').removeClass('unfold');
            _config.clickItemCallBack && $.isFunction(_config.clickItemCallBack) && _config.clickItemCallBack($(this));

        });
    }
};
