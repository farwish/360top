<?php
	//导入验证登陆文件
	require('../common/session.php');
	
	//如果上级请求来源路径为空，则不执行以下操作
	if(empty($_SERVER['HTTP_REFERER'])){
		echo '<script>alert("非法请求")</script>';
		echo '<script>window.location.href="../login.php"</script>';
		exit;
	}
	
    //载入数据库配置文件 和 连接文件
    include('../../public/dbConfig.php');
    include('../../public/mysql_conn.php');
	
    /* 提交且是添加操作时执行 */
    if(isset($_POST['sub']) && $_GET['act'] == 'add'){
        //接收参数
        $username = $_POST['username'];
        $password = $_POST['password'];
		$repass = $_POST['repass'];
        $email = $_POST['email'];
        $addtime = $_POST['addtime'];
        $status = isset($_POST['status'])? $_POST['status']:1;
		
		//必填项为空时不执行
        if(empty($username) || empty($_POST['password']) || empty($email)){
            echo '<script>alert("必填项不能为空！")</script>';
            echo '<script>window.location.href="./add.php"</script>';
			exit;
        }
		
		$pattern = '/^\d{4,20}$/';
		if(preg_match($pattern, $username)){
			echo '<script>alert("用户名长度不对！")</script>';
            echo '<script>window.location.href="./add.php"</script>';
			exit;
		}
		
		//两次密码不一致时不执行
		if($password != $repass){
			echo '<script>alert("两次密码不一致！")</script>';
            echo '<script>window.location.href="./add.php"</script>';
			exit;
		}
		//判断密码格式
		$patt = '/\w{6,16}/';
		if(preg_match($patt, $password)){
			$password = md5($password);
		}else{
			echo '<script>alert("密码格式不对！")</script>';
            echo '<script>window.location.href="./add.php"</script>';
			exit;
		}
		
		//判断邮箱格式
		$p = '/[\w]+@[0-9a-zA-Z]+\.[0-9a-zA-Z]{1,10}/';
		if(preg_match($p, $email) == 0){
			echo '<script>alert("邮箱格式不对！")</script>';
            echo '<script>window.location.href="./add.php"</script>';
			exit;
		}
		
        //查询并判断用户名是否存在，不存在时进行添加
        $sql = "SELECT username,email FROM users WHERE username = '{$username}' or email = '{$email}'";
        $res = mysql_query($sql);

        if(mysql_num_rows($res)){
            $row = mysql_fetch_assoc($res);
            if($username == $row['username']){
                echo '<script>alert("该用户名已存在！请更换！")</script>';
                echo '<script>window.location.href="./add.php"</script>';
				exit;
            }else if($email == $row['email']){
                echo '<script>alert("该邮箱已存在！请更换！")</script>';
                echo '<script>window.location.href="./add.php"</script>';
				exit;
            }
        }else{
            $sql = "INSERT INTO users(username,password,email,addtime,status) VALUES('{$username}','{$password}','{$email}','{$addtime}','{$status}')";
            $res = mysql_query($sql);
            if(mysql_affected_rows()){
                echo '<script>alert("添加成功")</script>';
                echo '<script>window.location.href="./list.php"</script>';
            }else{
				echo '<script>alert("添加失败")</script>';
                echo '<script>window.location.href="./list.php"</script>';
			}
        }
    }

    /* 权限修改时执行 */
    if($_POST['sub'] && $_GET['act'] == 'power'){
        $powid = $_POST['powid'];
        $status = $_POST['status'];
        $sql = "UPDATE users set status = '{$status}' where id = ".$powid;
        $res = mysql_query($sql);
        if(mysql_affected_rows()){
            echo '<script>alert("权限修改成功");</script>';
            echo '<script>window.location.href="./list.php";</script>';
        }
    }

    /* 修改用户信息时执行 */
    if(isset($_POST['sub']) && $_GET['act'] == 'mod'){
        $modid = $_POST['modid'];
		$password = $_POST['password'];
		$repass = $_POST['repass'];
        $username = $_POST['username'];
        $email = $_POST['email'];
   
		//不能为空
        if(empty($username) || empty($password) || empty($email)){
            echo '<script>alert("必填项不能为空！")</script>';
            echo '<script>window.location.href="./list.php"</script>';
			exit;
        }
		//判断用户名格式
		$pattern = '/^\d{4,20}$/';
		if(preg_match($pattern, $username)){
			echo '<script>alert("用户名长度不对！")</script>';
            echo '<script>window.location.href="./list.php"</script>';
			exit;
		}
		
		//判断两次密码一致
		if($password != $repass){
			echo '<script>alert("两次密码不一致！")</script>';
            echo '<script>window.location.href="./list.php"</script>';
			exit;
		}
		//如果是加密过的，则不更改,否则进行格式判断并加密
		if(strlen($password) != 32){
			$patt = '/\w{6,16}/';
			if(preg_match($patt, $password)){
				$password = md5($password);
			}else{
				echo '<script>alert("密码格式不对！")</script>';
				echo '<script>window.location.href="./list.php"</script>';
				exit;
			}
		}
		
		//修改基本信息（注:username是唯一索引，不更改时会提示修改失败）
        $sql = "UPDATE users set username='{$username}',password='{$password}',email='{$email}' where id = ".$modid;

		$res = mysql_query($sql);
        if($res && mysql_affected_rows()){
            echo '<script>alert("修改成功");</script>';
            echo '<script>window.location.href="./list.php"</script>';
        }else{
			echo '<script>alert("修改失败");</script>';
            echo '<script>window.location.href="./list.php"</script>';
		}
    }
    
    /* 删除用户操作时执行 */
    if($_GET['act'] == 'del'){
        $id = $_GET['id'];
        $sql = "DELETE FROM users where id = ".$id;
        $res = mysql_query($sql);
        if(mysql_affected_rows()){
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
  
	/* checkbox全选/单选 删除时执行 */
	if(isset($_POST['sub']) && $_GET['act'] == 'delAll'){
		if(empty($_POST['ids'])){
			echo '<script>alert("请至少选择一个!");</script>';
			echo '<script>window.location.href="./list.php"</script>';
		}else{
			$ids = $_POST['ids'];
			$ids = implode(',',$ids);
			$sql = "DELETE FROM users where id in(".$ids.")";
			$res = mysql_query($sql);
			if(mysql_affected_rows()){
				echo '<script>alert("删除成功!");</script>';
				echo '<script>window.location.href="./list.php"</script>';
			}
		}
	}
  
    //关闭数据库连接
    mysql_close();