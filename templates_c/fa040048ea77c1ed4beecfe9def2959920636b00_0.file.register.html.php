<?php
/* Smarty version 3.1.29, created on 2017-01-12 14:40:23
  from "D:\phpStudy\WWW\guanpeipindao\templates\user\register.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_587724d7b8d4d7_01508632',
  'file_dependency' => 
  array (
    'fa040048ea77c1ed4beecfe9def2959920636b00' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\guanpeipindao\\templates\\user\\register.html',
      1 => 1484203139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
  ),
),false)) {
function content_587724d7b8d4d7_01508632 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <!--jquery会冲突-->
    <?php $header_css = '../dist/css/header.css' ?>
    <link rel="stylesheet" href="<?php echo $header_css .'?v='. filemtime( $header_css ); ?>">

    <?php $register_css = '../dist/css/register.css' ?>
    <link rel="stylesheet" href="<?php echo $register_css .'?v='. filemtime( $register_css ); ?>">
    <style>
    </style>


</head>
<body>
<!---<form action="#" method="post" name="myform">---->

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="register_group">
    <ul id="register_group_title" class="nav nav-tabs ">
        <li class='active'><a id="library_user_register_title" href="#library_user" data-toggle='tab'>图书馆用户注册</a></li>
        <li><a id="gps_user_register_title" href="#gps_user" data-toggle='tab'>馆配商用户注册</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active fade in" id='library_user'>

            <div id="rgbgdiv">

                <!--<div id='top_title'><font size="4">会员注册</font></div>-->

                <div id="regshengdiv"><span><b>所属省份 </b></span><?php include('sheng_select.php'); ?>
                    <div id="shengdiv">工作单位所属省份</div>
                </div>
                <div id="reglibdiv">
                    <span><b>工作单位 </b></span>
                    <span id="libspan" width="200px;">
                <select id="lib" width="200px" name="lib">
                <option value='-1'>请先选择省份</option>
                </select>
                </span>
                    <div id="libdiv">工作单位全称</div>
                </div>

                <div id="regrealnamediv"><span><b>真实姓名 </b></span><span id="realname_span" name="realname_span"
                                                                        width="200px;">
                <select id="realname" name="realname" width="200px;"><option
                        value='-1'>请先选择工作单位</option></select></span>
                    <div id="realnamediv">用户的真实姓名</div>
                </div>


                <div id="regnamediv"><span><b>注册名称 </b></span><input id="regname" name="regname" type="text"/>
                    <div id="namediv">请输入用户名</div>
                </div>
                <div id="regpwddiv1"><span><b>注册密码 </b></span><input id="regpwd1" name="regpwd1"
                                                                     type="password"/>
                    <div id="pwddiv1">请输入密码</div>
                </div>
                <div id="regpwddiv2"><span><b>确认密码 </b></span><input id="regpwd2" name="regpwd2"
                                                                     type="password"/>
                    <div id="pwddiv2">请输入确认密码</div>
                </div>
                <div id="regemaildiv"><span><b>电子邮箱 </b></span><input id="email" name="email" type="text"/>
                    <div id="emaildiv">用户激活和找回密码使用</div>
                </div>


                <div id="regaddressdiv"><span><b>通讯地址 </b></span><input id="address" name="address"
                                                                        type="text"/>
                    <div id="addressdiv">工作单位通讯地址</div>
                </div>
                <div id="regpostcodediv"><span><b>邮政编码 </b></span><input id="postcode" name="postcode"
                                                                         type="text"/>
                    <div id="postcodediv">工作单位邮政编码</div>
                </div>
                <div id="regtelephonediv"><span><b>办公电话 </b></span><input id="telephone" name="telephone"
                                                                          type="text"/>
                    <div id="telephonediv">您的固定联系电话</div>
                </div>
                <div id="regmobilediv"><span><b>移动电话 </b></span><input id="mobile" name="mobile" type="text"/>
                    <div id="mobilediv">您的手机号码</div>
                </div>
                <div id="regquestiondiv"><span><b>密保问题 </b></span><input id="question" name="question"
                                                                         type="text"/>
                    <div id="questiondiv">用户激活和找回密码使用</div>
                </div>
                <div id="reganswerdiv"><span><b>密保答案 </b></span><input id="answer" name="answer" type="text"/>
                    <div id="answerdiv">用户激活和找回密码使用</div>
                </div>

                <div id="regsexdiv"><span><b>性别 </b></span><select id="sex" name="sex">
                    <option value="-1">请选择</option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
                    <div id="sexdiv">用户的性别</div>
                </div>
                <!--<div id="regzwdiv"><span><b>职务 </b></span><input id="zw" name="zw" type="text"/>-->
                <!--<div id="zwdiv">担任职务</div>-->
                <!--</div>-->
                <div id="regzwdiv"><span><b>职务 </b></span><?php include('zw_select.php'); ?>
                    <div id="zwdiv">担任职务</div>
                </div>
                <div id="regbirthdaydiv"><span><b>出生日期 </b></span><input id="birthday" name="birthday"
                                                                         type="text" onClick="WdatePicker()"/>
                    <div id="birthdaydiv">用户的出生日期。格式：YYYY-MM-DD</div>
                </div>
                <div id="regqqdiv"><span><b>QQ号码 </b></span><input id="qq" name="qq" type="text"/>
                    <div id="qqdiv">用户QQ号</div>
                </div>
                <div id="regdata_datediv"><span><b>发送频率 </b></span><select id="data_date" name="data_date">
                    <option value="-1">请选择</option>
                    <option value="每周">每周</option>
                    <option value="每月">每月</option>
                    <option value="每季度">每季度</option>
                    <option value="半年">半年</option>
                </select>
                    <div id="data_datediv">征订单数据发送频率</div>
                </div>
                <div id="regdata_formatdiv"><span><b>数据格式 </b></span><select id="data_format"
                                                                             name="data_format">
                    <option value="-1">请选择</option>
                    <option value="EXCEL">EXCEL</option>
                    <option value="MARC">MARC</option>
                    <option value="EXCEL+MARC">EXCEL+MARC</option>
                </select>
                    <div id="data_formatdiv">数据文件格式</div>
                </div>
                <div id="btndiv2">
                    <button id="regbtn" disabled="disabled"></button>
                    <button id="logbtn"></button>
                </div>
                <div id="imgdiv" style=" visibility: hidden;"></div>
            </div>

        </div>
        <div class="tab-pane fade" id='gps_user'>

            <div id="rgbgdiv_gps">
                <!--<div id='top_title'><font size="4">会员注册</font></div>-->
                <div id="regcompanydiv_gps"><span><b>工作单位 </b></span><?php include('company_select.php'); ?>
                    <div id="companydiv_gps">工作单位</div>
                </div>

                <div id="regnamediv_gps"><span><b>注册名称 </b></span><input id="regname_gps" name="regname_gps"
                                                                         type="text"/>
                    <div id="namediv_gps">请输入用户名</div>
                </div>
                <div id="regpwddiv1_gps"><span><b>注册密码 </b></span><input id="regpwd1_gps" name="regpwd1_gps"
                                                                         type="password"/>
                    <div id="pwddiv1_gps">请输入密码</div>
                </div>
                <div id="regpwddiv2_gps"><span><b>确认密码 </b></span><input id="regpwd2_gps" name="regpwd2_gps"
                                                                         type="password"/>
                    <div id="pwddiv2_gps">请输入确认密码</div>
                </div>
                <div id="regemaildiv_gps"><span><b>电子邮箱 </b></span><input id="email_gps" name="email_gps"
                                                                          type="text"/>
                    <div id="emaildiv_gps">用户激活和找回密码使用</div>
                </div>

                <div id="reglxrdiv_gps"><span><b>联系人 </b></span><input id="lxr_gps" name="lxr_gps" type="text"/>
                    <div id="lxrdiv_gps">联系人</div>
                </div>

                <div id="regqqdiv_gps"><span><b>QQ号码 </b></span><input id="qq_gps" name="qq_gps" type="text"/>
                    <div id="qqdiv_gps">用户QQ号</div>
                </div>

                <div id="regtelephonediv_gps"><span><b>办公电话 </b></span><input id="telephone_gps"
                                                                              name="telephone_gps"
                                                                              type="text"/>
                    <div id="telephonediv_gps">您的固定联系电话</div>
                </div>

                <div id="regmobilediv_gps"><span><b>移动电话 </b></span><input id="mobile_gps" name="mobile_gps"
                                                                           type="text"/>
                    <div id="mobilediv_gps">您的手机号码</div>
                </div>

                <div id="btndiv2_gps">
                    <button id="regbtn_gps" disabled="disabled"></button>
                    <button id="logbtn_gps"></button>
                </div>
                <div id="imgdiv_gps" style=" visibility: hidden;"></div>
            </div>

        </div>
    </div>
</div>
<!-----</form>----->
</body>
<?php echo '<script'; ?>
 src="../dist/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" src="../dist/js/xmlhttprequest.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" src="../dist/js/register.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="../My97DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    var xmlHttp;
    //取xmlhttprequest对象
    function GetXmlHttpObject() {

        var xmlHttp = null;
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
//        return xhr;
        return xmlHttp;
    }
    //处理省份，select_sheng是获取到的省份名称
    function selectCity(select_sheng) {
        var cObj = document.getElementById('libspan');//取网页中id为city的容器对象
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("您的浏览器不支持AJAX！");
            return false;
        }

        //判断确实选择到了省份值
        if (select_sheng != '' && select_sheng != null && select_sheng != 0 && select_sheng != -1) {
            //将省份名称值提交lib_select.php

            var fdata = new FormData();
            fdata.append("sheng", select_sheng);
            xmlHttp.open('POST', 'lib_select.php', true);

            xmlHttp.send(fdata);

            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState != 4) {
                    cObj.innerHTML = '<option value="loading">loading……</option>';
                }
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        //将从chkpc中获取到的输出值写入网页中id为city的对象容器
//                        alert(xmlHttp.responseText);
                        cObj.innerHTML = xmlHttp.responseText;
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

    //判断确实选择到了工作单位
    function selectLib(select_lib) {
        var rnObj = document.getElementById('realname_span');//取网页中id为city的容器对象
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("您的浏览器不支持AJAX！");
            return false;
        }
//        alert(select_lib);
        //判断确实选择到了省份值
        if (select_lib != '' && select_lib != null && select_lib != 0 && select_lib != -1) {
            //将工作单位名称值提交realname_select.php
            xmlHttp.open('GET', 'realname_select.php?lib=' + select_lib, true);
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState != 4) {
                    rnObj.innerHTML = '<option value="loading">loading……</option>';
                }
                if (xmlHttp.readyState == 4) {
                    if (xmlHttp.status == 200) {
                        //将从chkpc中获取到的输出值写入网页中id为city的对象容器
                        rnObj.innerHTML = xmlHttp.responseText;
                    }
                }
            }
            xmlHttp.send(null);
        }
        else {
            rnObj.innerHTML = '';
            //alert('请重新选择省份！');
            return false;
        }
    }

    function get_user_info() {
//        alert(1);

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("您的浏览器不支持AJAX！");
            return false;
        }

        realname = document.getElementById('realname_input').value;
        lib_no = document.getElementById('lib').value;
        xmlHttp.open('GET', 'get_user_info.php?realname=' + realname + '&lib_no=' + lib_no, true);
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    var user_info_obj = eval('(' + decodeURI(xmlHttp.responseText) + ')');
                    var str = user_info_obj.user_id;
                    var flag_check = user_info_obj.FlagCheck;
//                    alert(str);
//已通过网站注册且审核已通过的
                    if ((!(typeof(str) == "undefined" || (str == null) || (str == ''))) && (flag_check == 1)) {
//                    if (user_info_obj.FlagCheck == 1) {
                        document.getElementById('regname').disabled = true;
                        document.getElementById('regpwd1').disabled = true;
                        document.getElementById('regpwd2').disabled = true;
                        document.getElementById('email').disabled = true;
                        document.getElementById('address').disabled = true;
                        document.getElementById('zw').disabled = true;
                        document.getElementById('postcode').disabled = true;
                        document.getElementById('telephone').disabled = true;
                        document.getElementById('mobile').disabled = true;
                        document.getElementById('question').disabled = true;
                        document.getElementById('answer').disabled = true;
                        document.getElementById('sex').disabled = true;
                        document.getElementById('question').disabled = true;
                        document.getElementById('birthday').disabled = true;
                        document.getElementById('qq').disabled = true;
                        document.getElementById('data_date').disabled = true;
                        document.getElementById('data_format').disabled = true;

//                    }
//                        document.getElementById('regname').value = user_info_obj.user_id;
                        alert('用户已经注册');
                    } else {
                        document.getElementById('regname').value = '';
                        document.getElementById('regname').disabled = false;

                        document.getElementById('regpwd1').disabled = false;
                        document.getElementById('regpwd2').disabled = false;
                        document.getElementById('email').disabled = false;
                        document.getElementById('address').disabled = false;
                        document.getElementById('zw').disabled = false;
                        document.getElementById('postcode').disabled = false;
                        document.getElementById('telephone').disabled = false;
                        document.getElementById('mobile').disabled = false;
                        document.getElementById('question').disabled = false;
                        document.getElementById('answer').disabled = false;
                        document.getElementById('sex').disabled = false;
                        document.getElementById('question').disabled = false;
                        document.getElementById('birthday').disabled = false;
                        document.getElementById('qq').disabled = false;
                        document.getElementById('data_date').disabled = false;
                        document.getElementById('data_format').disabled = false;

                    }
                }
            }
        }
        xmlHttp.send(null);
    }

    function select_input() {
        document.getElementById('realname_input').value = document.getElementById('realname').value;
        get_user_info();
    }

<?php echo '</script'; ?>
>

<!--<?php echo '<script'; ?>
 language="javascript" src="../dist/js/register_gps.js"><?php echo '</script'; ?>
>-->

</html>
<?php }
}
