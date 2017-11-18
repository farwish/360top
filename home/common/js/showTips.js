//输入用户名时提示
function tips(){
	var username_tip = document.getElementById('username_tip');
	username_tip.innerHTML = '<font color="#bbb">长度在4-20位之间的字符</font>';
}
//输入密码时提示
function tips2(){
	var pwd_tip = document.getElementById('pwd_tip');
	pwd_tip.innerHTML = '<font color="#bbb">长度在6-16位之间的字符</font>';
}
//输入确认密码时提示
function tips3(){
	var repwd_tip = document.getElementById('repwd_tip');
	repwd_tip.innerHTML = '<font color="#bbb">与密码保持一致</font>';
}

//密码格式验证提示
function checkPwd(str){
	var pattern = /\w{6,16}/;
	if(pattern.test(str)){
		pwd_tip.innerHTML = '<font color="green">√</font>';
	}else{
		pwd_tip.innerHTML = '<font color="red">长度在6-16位之间的字符</font>';
	}
}
//确认密码验证提示
function checkRepwd(str){
	var repwd_tip = document.getElementById('repwd_tip');
	var pwd_tip = document.getElementById('pwd_tip');
	if(str != pwd_tip.previousSibling.value){
		repwd_tip.innerHTML = '<font color="red">两次输入不一致</font>';
	}else{
		repwd_tip.innerHTML = '<font color="green">√</font>';
	}
}