<?php
	header('content-type:text/html;charset=utf-8');
	//载入数据库配置和连接文件
	include('../public/dbConfig.php');
	include('../public/mysql_conn.php');
	
	//接收参数
	$username = $_POST['username'];
	
	//准备sql语句
	$sql = "SELECT username FROM users where username = '{$username}'";
	
	//发送sql语句
	$res = mysql_query($sql);
	
	//处理结果集
	if($res && mysql_num_rows($res)){
		$row = mysql_fetch_assoc($res);
		echo '<font color="red">该用户名已被使用, 如果您是"'.$row['username'].'"请<a href="./login.php">登录</a>';
		exit;
	}else{
		echo '<font color="green">√</font>';
	}
?>