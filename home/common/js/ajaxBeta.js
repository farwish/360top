function check(str){
	//1.新建一个XHR对象
	if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest;
	}else{
		var xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}

	//如果用户名为空，进行'不能为空'提示
	var tip = document.getElementById('username_tip');
	var pattern = /^\d{4,20}$/
	if(str.length < 4 || str.length > 20){
		tip.innerHTML = '<font color="red">长度在4-20位字符之间</font>';
		return;//必须返回
	}else if(pattern.test(str)){
		tip.innerHTML = '<font color="red">非纯数字(长度在4-20位字符之间)</font>';
		return;
	}
	
	//2.判断状态，接收数据
	xhr.onreadystatechange = function(){
		if(xhr.status == 200 && xhr.readyState == 4){
			var txt = xhr.responseText;//接收到的数据赋给变量
			tip.innerHTML = txt;
		}
	}

	//3.打开一个文件(请求php文件)
	xhr.open('POST','checkUsername.php',true);

	//设置header头
	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	
	//4.发送文件(post发送给php的数据写在这里)
	xhr.send('username='+str);
}