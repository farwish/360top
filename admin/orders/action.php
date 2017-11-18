<?php
	require('../common/session.php');
	
	include "../../public/dbConfig.php";
	include "../../public/mysql_conn.php";
	
	switch($_GET['act']){
		case 'send'://发货操作
			//只有未确认的订单才能发货
			$id = $_GET['id'];
			$sql = "UPDATE orders set status=1 where id = {$id}";
			$res = mysql_query($sql);
			if(mysql_affected_rows()){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else{
				header('location:./list.php');
			}
			break;
			
		case 'close'://关闭订单操作
			$id = $_GET['id'];
			$sql = "UPDATE orders set status=2 where id = {$id}";
			$res = mysql_query($sql);
			if(mysql_affected_rows()){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else{
				header('location:./list.php');
			}
			break;
			
		case 'del'://删除订单操作同时删除详情表
			$id = $_GET['id'];
			$sql = "DELETE FROM orders where id = {$id}";
			mysql_query($sql);
			$dsql = "DELETE FROM detail where oid = {$id}";
			mysql_query($dsql);
			if(mysql_affected_rows()){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
			break;
	}
	
	mysql_close();
?>