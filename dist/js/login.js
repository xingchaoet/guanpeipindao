function $(id){
	return document.getElementById(id);
}
window.onload = function(){
	showval();
	$('lgname').focus();
	
	$('lgname').onkeydown = function(){
		if(event.keyCode == 13){
			$('lgpwd').select();
		}
	}
	$('lgpwd').onkeydown = function(){
		if(event.keyCode == 13){
			$('lgchk').select();
		}
	}
	$('lgchk').onkeydown = function(){
		if(event.keyCode == 13){
			 chklg();
		}
	}
	$('lgbtn').onclick = chklg;
	function chklg(){
		if($('lgname').value.match(/^[a-zA-Z_]\w*$/) == null){
			alert('请输入合法名称');
			$('lgname').select();
			return false;
		}
		if($('lgname').value == ''){
			alert('请输入用户名!');
			$('lgname').focus();
			return false;
		}
		if($('lgpwd').value == ''){
			alert('请输入密码!');
			$('lgpwd').focus();
			return false;
		}
		if($('lgchk').value == ''){
			alert('请输入验证码');
			$('lgchk').select();
			return false;
		}
		if($('lgchk').value != $('chknm').value){
			alert('验证码输入错误');
			$('lgchk').select();
			return false;
		}
		count = document.cookie.split(';')[0];
		if(count.split('=')[1] >= 3){
			alert('因为您的非法操作，您将无法再执行登录操作');
			return false;
		}
		$('regimg').style.visibility = "visible";
		url = 'login_chk.php?act='+(Math.random())+'&name='+$('lgname').value+'&pwd='+$('lgpwd').value;
		xmlhttp.open('get',url,true);
		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4){
				if(xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if(msg == '0'){
						alert('您还没有激活，请先登录邮箱进行激活操作。');
					}else if(msg == '1'){
						alert('用户名或密码输入错误，您还有2次机会');
						$('lgpwd').select();
					}else if(msg == '2'){
						alert('用户名或密码输入错误，您还有1次机会');
						$('lgpwd').select();
					}else if(msg == '3'){
						alert('因为登录次数过多，您的帐号已被冻结，请联系管理员');
						$('lgname').select();
					}else if(msg == '4'){
						alert('用户名输入错误');
						$('lgname').select();
					}else if(msg == '-1'){
						alert('登录成功');
						// location = 'main.php';
						//这里跳转
						location = '../guanpeipindao.php';

					}else{
						alert(msg);
					}
					$('regimg').style.visibility = "hidden";
				}
			}
		}
		xmlhttp.send(null);
	}
	$('changea').onclick = showval;
	function showval(){
		num = '';
		for(i=0;i<4;i++){
			tmp =  Math.ceil((Math.random() * 15));
			if(tmp > 9){
				switch(tmp){
					case(10):
						num += 'a';
						break;
					case(11):
						num += 'b';
						break;
					case(12):
						num += 'c';
						break;
					case(13):
						num += 'd';
						break;
					case(14):
						num += 'e';
						break;
					case(15):
						num += 'f';
						break;
				}
			}else{
				num += tmp;
			}
		}
		$('chkid').src='valcode.php?num='+num;
		$('chknm').value = num;
	}
	$('fdbtn').onclick = function(){
		fd  = window.open('found.php','found','width=300,height=200');
		fd.moveTo(screen.width/2,200);
	}
	$('rgbtn').onclick = function(){
		open('register.php','_parent','',false);
	}




//	login_gps
	showval_gps();
	$('lgname_gps').focus();

	$('lgname_gps').onkeydown = function(){
		if(event.keyCode == 13){
			$('lgpwd_gps').select();
		}
	}
	$('lgpwd_gps').onkeydown = function(){
		if(event.keyCode == 13){
			$('lgchk_gps').select();
		}
	}
	$('lgchk_gps').onkeydown = function(){
		if(event.keyCode == 13){
			chklg_gps();
		}
	}
	$('lgbtn_gps').onclick = chklg_gps;
	function chklg_gps(){
		if($('lgname_gps').value.match(/^[a-zA-Z_]\w*$/) == null){
			alert('请输入合法名称');
			$('lgname_gps').select();
			return false;
		}
		if($('lgname_gps').value == ''){
			alert('请输入用户名!');
			$('lgname_gps').focus();
			return false;
		}
		if($('lgpwd_gps').value == ''){
			alert('请输入密码!');
			$('lgpwd_gps').focus();
			return false;
		}
		if($('lgchk_gps').value == ''){
			alert('请输入验证码');
			$('lgchk_gps').select();
			return false;
		}
		if($('lgchk_gps').value != $('chknm_gps').value){
			alert('验证码输入错误');
			$('lgchk_gps').select();
			return false;
		}
		count = document.cookie.split(';')[0];
		if(count.split('=')[1] >= 3){
			alert('因为您的非法操作，您将无法再执行登录操作');
			return false;
		}
		$('regimg_gps').style.visibility = "visible";
		url = 'login_chk_gps.php?act='+(Math.random())+'&name='+$('lgname_gps').value+'&pwd='+$('lgpwd_gps').value;
		xmlhttp.open('get',url,true);

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4){
				if(xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if(msg == '0'){
						alert('您还没有激活，请先登录邮箱进行激活操作。');
					}else if(msg == '1'){
						alert('用户名或密码输入错误，您还有2次机会');
						$('lgpwd_gps').select();
					}else if(msg == '2'){
						alert('用户名或密码输入错误，您还有1次机会');
						$('lgpwd_gps').select();
					}else if(msg == '3'){
						alert('因为登录次数过多，您的帐号已被冻结，请联系管理员');
						$('lgname_gps').select();
					}else if(msg == '4'){
						alert('用户名输入错误');
						$('lgname_gps').select();
					}else if(msg == '-1'){
						alert('登录成功');
						// location = 'main.php';
						//这里跳转
						location = '../guanpeipindao.php';

					}else{
						alert(msg);
					}
					$('regimg_gps').style.visibility = "hidden";
				}
			}
		}
		xmlhttp.send(null);
	}
	$('changea_gps').onclick = showval_gps;
	function showval_gps(){
		num = '';
		for(i=0;i<4;i++){
			tmp =  Math.ceil((Math.random() * 15));
			if(tmp > 9){
				switch(tmp){
					case(10):
						num += 'a';
						break;
					case(11):
						num += 'b';
						break;
					case(12):
						num += 'c';
						break;
					case(13):
						num += 'd';
						break;
					case(14):
						num += 'e';
						break;
					case(15):
						num += 'f';
						break;
				}
			}else{
				num += tmp;
			}
		}
		$('chkid_gps').src='valcode_gps.php?num='+num;
		$('chknm_gps').value = num;
	}
	$('fdbtn_gps').onclick = function(){
		fd  = window.open('found.php','found','width=300,height=200');
		fd.moveTo(screen.width/2,200);
	}
	$('rgbtn_gps').onclick = function(){
		open('register.php','_parent','',false);
	}
}