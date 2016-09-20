// JavaScript Document
function $(id){
	return document.getElementById(id);
}
window.onload = function(){

	// $('regname').focus();
	$('sheng').focus();

	var cname1,cname2,cpwd1,cpwd2,cemail;
	//设置激活按钮
	function chkreg(){
		if((cname1 == 'yes') && (cname2 == 'yes') && (cpwd1 == 'yes') && (cpwd2 == 'yes') && (cemail == 'yes')){
			$('regbtn').disabled = false;
		}else{
			$('regbtn').disabled = true;
		}
	}
	//验证用户名
	$('regname').onkeyup = function (){
		name = $('regname').value;
		cname2 = '';
		if(name.match(/^[a-zA-Z_]*/) == ''){
			$('namediv').innerHTML = '<font color=red>必须以字母或下划线开头</font>';
			cname1 = '';
		}else if(name.length < 2){
			$('namediv').innerHTML = '<font color=red>注册名称必须大于等于2位</font>';
			cname1 = '';
		}else{
			$('namediv').innerHTML = '<font color=green>注册名称符合标准</font>';
			cname1 = 'yes';
		}
		chkreg();
	}
	//验证是否存在该用户
	$('regname').onblur = function(){
		name = $('regname').value;
		if(cname1 == 'yes'){
			xmlhttp.open('get','chkname.php?name='+name,true);
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4){
					if(xmlhttp.status == 200){
						var msg = xmlhttp.responseText;
						if(msg == '1'){
							$('namediv').innerHTML="<font color=green>恭喜您，该用户名可以使用!</font>";
							cname2 = 'yes';
						}else if(msg == '2'){
							$('namediv').innerHTML="<font color=red>用户名被占用！</font>";
							cname2 = '';
						}else{
							$('namediv').innerHTML="<font color=red>"+msg+"</font>";
							cname2 = '';
						}
					}
				}
				chkreg();
			}
			xmlhttp.send(null);
		}
	}
	//验证密码
	$('regpwd1').onkeyup = function(){
		pwd = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if(pwd.length < 6){
			$('pwddiv1').innerHTML = '<font color=red>密码长度最少需要6位</font>';
			cpwd1 = '';
		}else if(pwd.length >= 6 && pwd.length < 12){
			$('pwddiv1').innerHTML = '<font color=green>密码符合要求。密码强度：弱</font>';
			cpwd1 = 'yes';
		}else if((pwd.match(/^[0-9]*$/)!=null) || (pwd.match(/^[a-zA-Z]*$/) != null )){
			$('pwddiv1').innerHTML = '<font color=green>密码符合要求。密码强度：中</font>';
			cpwd1 = 'yes';
		}else{
			$('pwddiv1').innerHTML = '<font color=green>密码符合要求。密码强度：高</font>';
			cpwd1 = 'yes';
		}
		if(pwd2 != '' && pwd != pwd2){
			$('pwddiv2').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2 = '';
		}else if(pwd2 != '' && pwd == pwd2){
			$('pwddiv2').innerHTML = '<font color=green>密码输入正确</font>';
			cpwd2 = 'yes';
		}
		chkreg();
	}
	//验证确认密码
	$('regpwd2').onkeyup = function(){
		pwd1 = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if(pwd1 != pwd2){
			$('pwddiv2').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2 = '';
		}else{
			$('pwddiv2').innerHTML = '<font color=green>密码输入正确</font>';
			cpwd2 = 'yes';
			chkreg();
		}
	}
	//验证email
	$('email').onkeyup = function(){
		emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		$('email').value.match(emailreg);
		if($('email').value.match(emailreg) == null){
			$('emaildiv').innerHTML = '<font color=red>错误的email格式</font>';
			cemail = '';
		}else{
			$('emaildiv').innerHTML = '<font color=green>输入正确</font>';
			cemail = 'yes';

		}
		chkreg();
	}
	//登录按钮
	$('logbtn').onclick = function(){
		window.open('login.php','_parent','',false);
	}
	//正式注册
	$('regbtn').onclick = function(){
		$('imgdiv').style.visibility = 'visible';
		url = 'register_check.php?name='+$('regname').value+'&pwd='+$('regpwd1').value+'&email='+$('email').value;
		url += '&question=' +$('question').value+'&answer='+$('answer').value;
		url += '&realname=' +$('realname_input').value+'&birthday='+$('birthday').value;
		url += '&telephone='+$('telephone').value+'&qq='+$('qq').value+'&zw='+$('zw').value;
		url += '&ddate='+$('data_date').value+'&dformat='+$('data_format').value;
		url += '&xb='+$('sex').value+'&lib_no='+$('lib').value;
		url += '&mobile='+$('mobile').value;
		alert(url);
		xmlhttp.open('get',url,true);
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4){
				if(xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if(msg == '1'){
						alert('注册成功，请联系科学出版社馆配业务代表将您的账号激活！');
						location='index.php';
					}else if(msg == '-1'){
						alert('您的服务器不支持Zend_mail，或者邮箱填写错误。请仔细检查！！');
					}else{
						alert(msg);
					}
					$('imgdiv').style.visibility = 'hidden';
				}
			}
		}
		xmlhttp.send(null);
	}

	//馆配商注册

	var cname1_gps,cname2_gps,cpwd1_gps,cpwd2_gps,cemail_gps;
	//设置激活按钮
	function chkreg_gps(){
		if((cname1_gps == 'yes') && (cname2_gps == 'yes') && (cpwd1_gps == 'yes') && (cpwd2_gps == 'yes') && (cemail_gps == 'yes')){
			$('regbtn_gps').disabled = false;
		}else{
			$('regbtn_gps').disabled = true;
		}
	}
	//验证用户名
	$('regname_gps').onkeyup = function (){
		name = $('regname_gps').value;
		cname2_gps = '';
		if(name.match(/^[a-zA-Z_]*/) == ''){
			$('namediv_gps').innerHTML = '<font color=red>必须以字母或下划线开头</font>';
			cname1_gps = '';
		}else if(name.length < 2){
			$('namediv_gps').innerHTML = '<font color=red>注册名称必须大于等于2位</font>';
			cname1_gps = '';
		}else{
			$('namediv_gps').innerHTML = '<font color=green>注册名称符合标准</font>';
			cname1_gps = 'yes';
		}
		chkreg_gps();
	}
	//验证是否存在该用户
	$('regname_gps').onblur = function(){
		name = $('regname_gps').value;
		if(cname1_gps == 'yes'){
			xmlhttp.open('get','chkname_gps.php?name='+name,true);
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4){
					if(xmlhttp.status == 200){
						var msg = xmlhttp.responseText;
						if(msg == '1'){
							$('namediv_gps').innerHTML="<font color=green>恭喜您，该用户名可以使用!</font>";
							cname2_gps = 'yes';
						}else if(msg == '2'){
							$('namediv_gps').innerHTML="<font color=red>用户名被占用！</font>";
							cname2_gps = '';
						}else{
							$('namediv_gps').innerHTML="<font color=red>"+msg+"</font>";
							cname2_gps = '';
						}
					}
				}
				chkreg_gps();
			}
			xmlhttp.send(null);
		}
	}
	//验证密码
	$('regpwd1_gps').onkeyup = function(){
		pwd = $('regpwd1_gps').value;
		pwd2 = $('regpwd2_gps').value;
		if(pwd.length < 6){
			$('pwddiv1_gps').innerHTML = '<font color=red>密码长度最少需要6位</font>';
			cpwd1_gps = '';
		}else if(pwd.length >= 6 && pwd.length < 12){
			$('pwddiv1_gps').innerHTML = '<font color=green>密码符合要求。密码强度：弱</font>';
			cpwd1_gps = 'yes';
		}else if((pwd.match(/^[0-9]*$/)!=null) || (pwd.match(/^[a-zA-Z]*$/) != null )){
			$('pwddiv1_gps').innerHTML = '<font color=green>密码符合要求。密码强度：中</font>';
			cpwd1_gps = 'yes';
		}else{
			$('pwddiv1_gps').innerHTML = '<font color=green>密码符合要求。密码强度：高</font>';
			cpwd1_gps = 'yes';
		}
		if(pwd2 != '' && pwd != pwd2){
			$('pwddiv2_gps').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2_gps = '';
		}else if(pwd2 != '' && pwd == pwd2){
			$('pwddiv2_gps').innerHTML = '<font color=green>密码输入正确</font>';
			cpwd2_gps = 'yes';
		}
		chkreg_gps();
	}
	//验证确认密码
	$('regpwd2_gps').onkeyup = function(){
		pwd1 = $('regpwd1_gps').value;
		pwd2 = $('regpwd2_gps').value;
		if(pwd1 != pwd2){
			$('pwddiv2_gps').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2_gps = '';
		}else{
			$('pwddiv2_gps').innerHTML = '<font color=green>密码输入正确</font>';
			cpwd2_gps = 'yes';
			chkreg_gps();
		}
	}
	//验证email
	$('email_gps').onkeyup = function(){
		emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		$('email_gps').value.match(emailreg);
		if($('email_gps').value.match(emailreg) == null){
			$('emaildiv_gps').innerHTML = '<font color=red>错误的email格式</font>';
			cemail_gps = '';
		}else{
			$('emaildiv_gps').innerHTML = '<font color=green>输入正确</font>';
			cemail_gps = 'yes';

		}
		chkreg_gps();
	}
	//登录按钮
	$('logbtn_gps').onclick = function(){
		window.open('login.php','_parent','',false);
	}
	//正式注册
	$('regbtn_gps').onclick = function(){

		alert(1);
		$('imgdiv_gps').style.visibility = 'visible';
		url = 'register_check_gps.php?name='+$('regname_gps').value+'&pwd='+$('regpwd1_gps').value+'&email='+$('email_gps').value;
		url += '&lxr=' +$('lxr_gps').value+'&company='+$('company_gps').value;
		url += '&telephone='+$('telephone_gps').value+'&qq='+$('qq_gps').value;
		url += '&mobile='+$('mobile_gps').value;
		alert(url);
		xmlhttp.open('get',url,true);
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4){
				if(xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if(msg == '1'){
						alert('注册成功，请联系科学出版社馆配业务代表将您的账号激活！');
						location='index.php';
					}else if(msg == '-1'){
						alert('您的服务器不支持Zend_mail，或者邮箱填写错误。请仔细检查！！');
					}else{
						alert(msg);
					}
					$('imgdiv_gps').style.visibility = 'hidden';
				}
			}
		}
		xmlhttp.send(null);
	}
}