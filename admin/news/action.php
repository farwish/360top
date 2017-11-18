<?php
	require('../common/session.php');
	
	include "../../public/dbConfig.php";
	include "../../public/mysql_conn.php";
	
	switch($_GET['act']){
		case 'del'://删除商品评论操作
			$id = $_GET['id'];
			$sql = "DELETE FROM discuss where id = {$id}";
			mysql_query($sql);
			if(mysql_affected_rows()){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
			break;
		
		case 'hide'://隐藏商品评论操作
			$id = $_GET['id'];
			$sql = "UPDATE discuss set status='1' where id = {$id}";
			mysql_query($sql);
			if(mysql_affected_rows()){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else{
				echo "操作失败";
			}
			break;
			
		case 'display'://显示商品评论操作
			$id = $_GET['id'];
			$sql = "UPDATE discuss set status = '0' where id = {$id}";
			mysql_query($sql);
			if(mysql_affected_rows()){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else{
				echo "操作失败";
			}
			break;
	}
	
	mysql_close();