<?php
	//开启session会话
	session_start();
	
	header('content-type:text/html;charset=utf-8');
	
	include('../public/dbConfig.php');
	include('../public/mysql_conn.php');
	
	
	switch($_GET['act']){
		case 'add'://订单提交操作
			
			//接收参数
			$uid = $_SESSION['users']['id'];
			$linkman = $_POST['linkman'];
			$address = $_POST['address'];
			$code = $_POST['code'];
			$phone = $_POST['phone'];
			$addtime = time();
			$total = $_POST['total'];
			$status = 0;//未确认发货
			
			//判断收货人信息格式
			if(empty($linkman) || empty($address) || empty($code) || empty($phone)){
				echo "<script>alert('收货人信息不全!');</script>";
				echo "<script>window.location.href='./ordercheck.php';</script>";
				exit;
			}
			//验证手机
			$pattern = '/^1\d{10}/';
			if(preg_match($pattern,$phone)==0){
				echo "<script>alert('移动电话格式不对!');</script>";
				echo "<script>window.location.href='./ordercheck.php';</script>";
				exit;
			}
			//验证邮箱
			$patt = '/^\d{4,8}$/';
			if(preg_match($patt,$code)==0){
				echo "<script>alert('邮编格式不对!');</script>";
				echo "<script>window.location.href='./ordercheck.php';</script>";
				exit;
			}
			//验证收货地址
			$pat = '/(^\d{1,}$)/';$pat2='/(^\w{1,}$)/';
			if(preg_match($pat,$address) || preg_match($pat2,$address)){
				echo "<script>alert('请认真填写收货地址!');</script>";
				echo "<script>window.location.href='./ordercheck.php';</script>";
				exit;
			}
			
			$rand = time().rand(1000,9999);//随机订单号
			
			$sql = "INSERT into orders values(null,'{$uid}','{$linkman}','{$address}','{$code}','{$phone}','{$addtime}','{$total}',{$status})";
			//执行sql语句插入
			$res = mysql_query($sql);
			
			//如果订单生成成功，则生成订单详情表
			if($oid = mysql_insert_id()){
				//遍历购物车，获取每个商品信息,并添加订单详情表
				foreach($_SESSION['cart'] as $goods){
					$dsql = "INSERT into detail values(null,'{$oid}','{$goods['id']}','{$goods['goods']}','{$goods['price']}','{$goods['count']}')";
					mysql_query($dsql);
				}
				
				echo "<script>alert('下单成功!您的订单号是: {$oid}');</script>";
				echo "<script>window.location.href='./personal.php';</script>";
				
				//清空购物车★
				unset($_SESSION['cart']);
				unset($_SESSION['total']);
	
			}else{
				die("订单添加失败了!");
			}
			mysql_close();
			break;
		case 'mod'://收货操作
			$id = $_GET['id'];
			//只有状态是已发货，才能进行收货
			$s = "SELECT * FROM orders where id = {$id}";
			$r = mysql_query($s);
			if($s && mysql_num_rows($r)){
				$status = mysql_fetch_assoc($r);
				//如果已发货，进行收货,完成交易
				if($status['status'] == 1){
					$sql = "UPDATE orders set status=3 where id = {$id}";
					$res = mysql_query($sql);
					if(mysql_affected_rows()){
						header('location:./myorder.php');
					}
				}
			}
			break;
			
		case 'del'://删除订单记录操作
			$id = $_GET['id'];
			//只有已取消和已完成才可以删除订单记录
			$s = "SELECT * FROM orders where id ={$id}";
			$r = mysql_query($s);
			if($r && mysql_num_rows($r)){
				$status = mysql_fetch_assoc($r);
				//已取消或已完成可以进行删除
				if($status['status'] == 2 || $status['status'] == 3){
					$sql = "DELETE FROM orders where id = {$id}";
					mysql_query($sql);
					$dsql = "DELETE FROM detail where oid = {$id}";
					mysql_query($dsql);
					if(mysql_affected_rows()){
						header('location:./myorder.php');
					}
				}
			}
			break;
		
		case 'close'://取消订单操作
			$id = $_GET['id'];
			//只有未确认状态才可以取消订单（后方的处理程序必须严格判断操作）
			$s = "SELECT * FROM orders where id = {$id}";
			$r = mysql_query($s);
			if($s && mysql_num_rows($r)){
				$status = mysql_fetch_assoc($r);
				//如果未确认，进行取消订单,更新数据库
				if($status['status'] == 0){
					$sql = "UPDATE orders set status=2 where id = {$id}";
					$res = mysql_query($sql);
					if(mysql_affected_rows()){
						header('location:./myorder.php');
					}
				}
			}
			break;
	}