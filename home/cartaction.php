<?php
	//开启会话
	session_start();
	
	setCookie(session_name(),session_id(),time()+1440,'/');
	
	header("content-type:text/html;charset=utf-8");

	//判断购物车操作
	switch($_GET['act']){
		case 'add':
			//接收商品id,购买数量等参数
			$id = $_POST['id'];
			$count = $_POST['count'];
			
			if($count < 1){
				$count = 1;
			}else{
				$count = $_POST['count'];
			}
			
			//连接数据库，查询出商品的所有信息
			include "../public/dbConfig.php";
			include "../public/mysql_conn.php";
			
			$gsql = "SELECT * FROM goods where id = {$id}";
			$gres = mysql_query($gsql);
			if($gres && mysql_num_rows($gres)){
				$goods = mysql_fetch_assoc($gres);//一维关联数组
			}

			//加入购物车（判断购物车中是否存在该商品）,存三维数组，$id为对应的值是$goods数组信息
			if(isset($_SESSION['cart'][$id])){
				//session购物车中存在，则数量加1
				$_SESSION['cart'][$id]['count'] += $count;
			}else{
				//将商品信息存入session购物车
				$_SESSION['cart'][$id] = $goods;
				//赋初始数量1
				$_SESSION['cart'][$id]['count'] = $count;
			}
			
			echo "<script>alert('成功加入购物车');</script>";
			echo "<script>window.location.href='./cart.php';</script>";
			break;
			
		case 'del'://删除购物车商品操作
			$id = $_GET['id'];
			if(!empty($id)){
				unset($_SESSION['cart'][$id]);
				echo "<script>window.location.href='./cart.php';</script>";
			}
			//多件商品删除
			if(isset($_POST['sub'])){
				$ids = $_POST['ids'];
				for($i=0;$i<count($ids);$i++){
					unset($_SESSION['cart'][$ids[$i]]);
				}
				echo "<script>window.location.href='./cart.php';</script>";
			}
			break;
		case 'mod':
			//接收商品id、加减值
			$id = $_GET['id'];
			$num = $_GET['num'];
			//判断商品数量，限制能否再进行加减
			if($_SESSION['cart'][$id]['count'] > 0){
				$_SESSION['cart'][$id]['count'] += $num;
			}else{
				$_SESSION['cart'][$id]['count'] = 1;
			}
			header('location:./cart.php');
			break;
	}