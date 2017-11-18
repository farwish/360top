<?php
	if(empty($_SERVER['HTTP_REFERER'])){
		echo '非法请求';
		exit;
	}

	header('content-type:text/html;charset=utf-8');
	session_start();
	
	//载入数据库配置和连接文件
	include('../public/dbConfig.php');
	include('../public/mysql_conn.php');
	
	//注册操作时执行
	if(isset($_POST['sub']) && $_GET['act']=='register'){
		//接收参数
		$addtime = $_POST['addtime'];
		$username = $_POST['username'];
		$password = $_POST['pwd'];
		$repass = $_POST['repwd'];
		$vcode = strtolower($_POST['vcode']);
		$scode = strtolower($_SESSION['vcode']);
		
		//判断验证码
		if($vcode != $scode){
			echo "<script>alert('验证码不正确或已过期!');</script>";
			echo "<script>window.location.href='./login.php';</script>";
			exit;
		}
			
		//判断用户名格式
		$pattern = '/^\d{4,20}$/';
		if(preg_match($pattern, $username)){
			echo "<script>alert('用户名不能为纯数字');</script>";
			echo "<script>window.location.href='./login.php';</script>";
			exit;
		}
		if(strlen($username) < 4 || strlen($username) > 20){
			echo "<script>alert('用户名长度不对!');</script>";
			echo "<script>window.location.href='./login.php';</script>";
			exit;
		}
		//判断密码格式
		$patt = '/\w{6,16}/';
		if(preg_match($patt, $password)){
			//两次输入是否一致
			if($password != $repass){
				echo "<script>alert('两次密码输入不一致!');</script>";
				echo "<script>window.history.back();</script>";
				exit;
			}else{
				$password = md5($password);
			}
		}else{
			echo "<script>alert('密码格式不对!');</script>";
			echo "<script>window.history.back();</script>";
			exit;
		}
		
		//准备sql语句
		$sql = "SELECT username FROM users where username = '{$username}'";
		
		//发送sql语句
		$res = mysql_query($sql);
		
		//处理结果集
		if($res && mysql_num_rows($res)){
			echo "<script>alert('用户名已存在！');</script>";
			echo "<script>window.history.back();</script>";
			exit;
		}else{
			//如果用户名不存在，则注册
			$sql = "INSERT into users(username,password,addtime) values('{$username}','{$password}','{$addtime}')";
			$res = mysql_query($sql);
			if(mysql_affected_rows()){
				$s = "SELECT * FROM users where username = '{$username}'";
				$r = mysql_query($s);
				if($r && mysql_num_rows($r)){
					$users = mysql_fetch_assoc($r);
					$_SESSION['users'] = $users;//将用户所有信息存入session
					unset($_SESSION['users']['password']);//去除session中保存的密码
					
					echo "<script>alert('恭喜,注册成功');</script>";
					echo "<script>window.location.href='./index.php'</script>";
				}
			}else{
				echo "<script>alert('未知错误,注册失败');</script>";
				echo "<script>window.history.back();</script>";
			}
		}	
		//关闭数据库连接
		mysql_close();
	}
	
	//登录操作时执行
	if(isset($_POST['sub']) && $_GET['act']=='login'){
		
		//判断验证码是否正确
		$vcode = strtolower($_POST['vcode']);
		$scode = strtolower($_SESSION['vcode']);
		
		if($vcode != $scode){
			echo "<script>alert('验证码不对');</script>";
			echo "<script>window.history.back();</script>";
			exit;
		}
		
		$username = $_POST['username'];
		$password = md5($_POST['pwd']);
		
		$sql = "SELECT * FROM users where username = '{$username}' and password = '{$password}'";
		
		$res = mysql_query($sql);
		
		if($res && mysql_num_rows($res)){
			$users = mysql_fetch_assoc($res);
			
			if($users['status'] == 2){
				echo "<script>alert('该账号已被禁用!');</script>";
				echo "<script>window.location.href='./index.php';</script>";
				exit;
			}
			
			$_SESSION['users'] = $users;//将用户所有信息存入session
			unset($_SESSION['users']['password']);//去除session中保存的密码
			
			header('location:./index.php');
		}else{
			echo "<script>alert('用户名或密码不对');</script>";
			echo "<script>window.history.back();</script>";
		}
		mysql_close();
	}
	
	//退出登录操作
	if($_GET['act'] == 'logout'){
		//开启session
		session_start();
		//清空session
		$_SESSION = array();
		//设置cookie过期
		setcookie(session_name,'',time()-1,'/');
		//销毁session
		session_destroy();
		
		header('location:./index.php');
	}

	
	//账户信息修改操作
	if(isset($_POST['sub']) && $_GET['act']=='up'){
		$username = $_POST['username'];
		$truename = $_POST['truename'];
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$code = $_POST['code'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		
		$sql = "UPDATE users set username = '{$username}',truename='{$truename}',sex='{$sex}',address='{$address}',code='{$code}',phone='{$phone}',email = '{$email}' where id = {$_SESSION['users']['id']}";
		$res = mysql_query($sql);
		if(mysql_affected_rows()){
			//更新信息后重新将信息存入用户session
			$s = "SELECT * FROM users where id = {$_SESSION['users']['id']}";
			$r = mysql_query($s);
			if($r && mysql_num_rows($r)){
				$users = mysql_fetch_assoc($r);
		
				$_SESSION['users'] = $users;	
				
				echo "<script>alert('保存成功!');</script>";
				echo "<script>window.location.href='./personalm.php';</script>";
			}
		}
		mysql_close();
	}
	
	//密码修改操作
	if(isset($_POST['sub']) && $_GET['act']=='alter'){
		$oldpass = md5($_POST['oldpass']);
		$newpass = $_POST['newpass'];
		$repass = $_POST['repass'];
		
		//查询旧密码是否正确
		$sql = "SELECT * FROM users where id = {$_SESSION['users']['id']}";
		$res = mysql_query($sql);
		if($res && mysql_num_rows($res)){
			$users = mysql_fetch_assoc($res);
		}
		if($oldpass == $users['password']){
			//判断两次输入是否一致
			if($newpass == $repass){
				//执行密码加密后修改
				$newpass = md5($_POST['newpass']);
				$sql = "UPDATE users set password = '{$newpass}' where id = {$_SESSION['users']['id']}";
				mysql_query($sql);
				if(mysql_affected_rows()){
					echo "<script>alert('密码修改成功!');</script>";
					echo "<script>window.location.href='./personal.php';</script>";
				}
			}else{
				echo "<script>alert('新密码输入不一致!');</script>";
				echo "<script>window.history.back();</script>";
			}
		}else{
			echo "<script>alert('旧密码输入错误!');</script>";
			echo "<script>window.history.back();</script>";
		}
		mysql_close();
	}
	
	//商品评论操作
	if(isset($_POST['sub']) && $_GET['act']=='discuss' && !empty($_POST['content'])){
		$gid = $_POST['gid'];//商品id
		$content = $_POST['content'];//内容
		$uid = $_POST['uid'];//用户id
		$addtime = time();//添加时间
		
		$sql = "INSERT INTO discuss(uid,gid,content,addtime) values({$uid},{$gid},'{$content}','{$addtime}')";
		mysql_query($sql);
		if(mysql_affected_rows()){
			header("location:./detail.php?id={$gid}");
		}
	}
	
	//上传头像操作
 	if(isset($_POST['sub']) && $_GET['act']=='uppic'){
		include "../public/func/functions.php";
		
		$upfile = $_FILES['mypic'];
		$path = "../public/uploadsPic";
		$info = fileUpload($upfile,$path,$typelist=array(),$filesize=-1);
		if($info['status'] == false){
			echo "图片上传失败!原因:{$info['info']}<a href='./personal.php'>返回</a>";
			exit;
		}
		
		$image = $path.'/'.$info['info'];
		imageChangeSize($image,"s_",68,68);
		
		$pic = $info['info'];//新图片名
		
		//如果图片上传成功则删除原图
		if($_FILES['mypic']['error'] == 0){
			@unlink("../public/uploadsPic/s_{$_SESSION['users']['pic']}");//先删除小图，再删除大图
			@unlink("../public/uploadsPic/{$_SESSION['users']['pic']}");
		}
		//然后更新数据库信息
		$sql = "UPDATE users set pic = '{$pic}' where id = '{$_SESSION['users']['id']}'";
		mysql_query($sql);
		if(mysql_affected_rows()){
				//将用户新大图片信息存入session
				$_SESSION['users']['pic'] = "{$pic}";
				echo "<script>alert('恭喜，头像更新成功.');</script>";
				echo "<script>window.location.href='./personal.php';</script>";
		}
	}