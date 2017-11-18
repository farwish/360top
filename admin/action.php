<?php
	session_start();

	//导入验证登陆文件
    include('../public/dbConfig.php');
    include('../public/mysql_conn.php');

    //提交 且 登录操作时执行
    if($_POST['sub'] && $_GET['act'] == 'login'){
        
        //接收参数
        $username = $_POST['username'];
        $password = $_POST['password'];
		$repass = $_POST['repass'];
        $mycode = strtolower($_POST['mycode']);
        $vcode = strtolower($_SESSION['vcode']);
		//echo $vcode.'---'.$mycode;exit;
        //判断用户名格式是否正确
        $pattern = '/[^0-9]\w{5,16}/';
        if(preg_match($pattern,$username) == 0){
            echo '<script>alert("用户名格式不对!");</script>';
            echo '<script>window.location.href="./login.php"</script>';
            exit;
        }

        //判断两次密码是否一致
        if($password != $repass){
            echo '<script>alert("两次密码输入不一致!");</script>';
            echo '<script>window.location.href="./login.php";</script>';
            exit;
        }else{
			$password = md5($password);
		}

        //判断验证码是否匹配
	
        if($vcode != $mycode){
            echo '<script>alert("验证码不对!");</script>';
            echo '<script>window.location.href="./login.php"</script>';
            exit;
        }

		
        //查询数据库，如果用户名密码正确，则将用户信息存入session,并进入后台首页
        $sql = "SELECT * FROM users where username = '{$username}' and password = '{$password}' and status = 0";
        $res = mysql_query($sql);
        if(mysql_num_rows($res)){
			$users = mysql_fetch_assoc($res);
            $_SESSION['users'] = $users;
            echo '<script>window.location.href="./index.php"</script>';
        }else{
            echo '<script>alert("用户名或密码不对!");</script>';
            echo '<script>window.location.href="./login.php"</script>';
            exit;
        }
    }

    //退出登录操作时执行
    if($_GET['act'] == 'logout'){

        //1.删除所有session变量
        $_SESSION = array();

        //2.删除客户端cookie文件
        setcookie(session_name, '', time()-1, '/');

        //3.删除服务器端session文件
        session_destroy();

        header('Location:./login.php');
        //echo '<script>window.location.href="./login.php"</script>';
    }
	
	mysql_close();
?>
