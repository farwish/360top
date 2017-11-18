<?php
	require('../common/session.php');

	//导入图片处理函数库文件
	include "../../public/func/functions.php";

	//导入数据库配置文件和连接文件
	include "../../public/dbConfig.php";
	include "../../public/mysql_conn.php";
	
	$path = "../../public/uploads/";//指定图片的上传目录
	
	//判断操作
	switch($_GET['act']){
		case 'add'://添加操作
		
			//执行图片上传处理
			$info = fileUpload($_FILES['picname'],$path);
			if($info['status']===false){
				die('图片上传失败!原因:'.$info['info']);
			}
			//对图片等比缩放:购物车/后台80*80;首页160*160;列表页240*240;详情页350*350
			@imageChangeSize($path.'/'.$info['info'],'s_',80,80);
			@imageChangeSize($path.'/'.$info['info'],'m_',160,160);
			@imageChangeSize($path.'/'.$info['info'],'b_',240,240);
			@imageChangeSize($path.'/'.$info['info'],'',350,350);

			//获取商品添加信息				
			$pid = $_POST['pid'];
			$goods = $_POST['goods'];
			$company = $_POST['company'];
			$price = $_POST['price'];
			$store = $_POST['store'];
			$picname = $info['info'];
			$descr = $_POST['descr'];
			$addtime = time();
			
			$sql = "INSERT into goods VALUES(null,'{$pid}','{$goods}','{$company}','{$descr}','{$price}','{$picname}',1,'{$store}',0,0,'{$addtime}')";
			
			mysql_query($sql);
			
			if(mysql_affected_rows()){
				header('location:./list.php');
			}
			break;
		case 'mod'://修改操作
			$id = $_POST['id'];
			$cid = $_POST['pid'];
			$goods = $_POST['goods'];
			$company = $_POST['company'];
			$price = $_POST['price'];
			$store = $_POST['store'];
			$picname = $_POST['oldpicname'];
			$state = $_POST['state'];
			$descr = $_POST['descr'];
		
			//判断是否有图片上传
			if($_FILES['picname']['error'] != 4){
				//有则执行图片上传
				$info = fileUpload($_FILES['picname'],$path);
				if($info['status']===false){
					die('图片上传失败,原因:'.$info['info']);
				}
				//对图片等比缩放
				@imageChangeSize($path.'/'.$info['info'],'s_',80,80);
				@imageChangeSize($path.'/'.$info['info'],'m_',160,160);
				@imageChangeSize($path.'/'.$info['info'],'b_',240,240);
				@imageChangeSize($path.'/'.$info['info'],'',350,350);
				
				$picname = $info['info'];//新图片名
			}
			
			//没有图片上传则进行数据修改
			$sql = "UPDATE goods set cid={$cid},goods='{$goods}',company='{$company}',descr='{$descr}',price='{$price}',picname='{$picname}',state='{$state}',store='{$store}' where id={$id}";
			
			mysql_query($sql);	
			
			if(mysql_affected_rows()){
				echo '<script>alert("修改成功");</script>';
				echo '<script>window.location.href="./list.php";</script>';
			
				//如果上传图片成功，则删除原图片
				if($_FILES['picname']['error']==0){
					@unlink("../../public/uploads/s_{$_POST['oldpicname']}");
					@unlink("../../public/uploads/m_{$_POST['oldpicname']}");
					@unlink("../../public/uploads/b_{$_POST['oldpicname']}");
					@unlink("../../public/uploads/{$_POST['oldpicname']}");
				}
			}else{
				echo '修改失败！<a href="./list.php">返回<a>';
				
				//上传图片成功，但是数据没修改成功,将新图删除
				if($_FILES['picname']['error']==0){
					@unlink("../../public/uploads/s_{$info['info']}");
					@unlink("../../public/uploads/m_{$info['info']}");
					@unlink("../../public/uploads/b_{$info['info']}");
					@unlink("../../public/uploads/{$info['info']}");
				}
			}
			
			break;
		case 'del'://删除操作
			$id = $_GET['id'];
			
			//查询出要删除的图片名(在删除数据库数据之前)
			//★注:简便的方法是列表页url传picname,不用再查询,直接删数据与图片文件
			$s = "SELECT picname FROM goods where id = {$id}";
			$r = mysql_query($s);
			if($r && mysql_num_rows($r)){
				$picname = mysql_fetch_assoc($r);
				$picname = $picname['picname'];
				//删除数据库数据
				$sql = "DELETE FROM goods where id = {$id}";
				mysql_query($sql);
				if(mysql_affected_rows()){
					//删除图片文件
					@unlink("../../public/uploads/s_{$picname}");
					@unlink("../../public/uploads/m_{$picname}");
					@unlink("../../public/uploads/b_{$picname}");
					@unlink("../../public/uploads/{$picname}");
					
					echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
				}
			}
			break;
		case 'delAll'://删除所选操作
			$ids = $_POST['ids'];
	
			if(empty($ids)){
				echo "<script>alert('请至少选择一个！');</script>";
				echo "<script>window.location.href='./list.php'</script>";
				exit;
			}
	
			$ids = implode(',',$ids);
			
			//查询出要删除的图片名(在删除数据库数据之前)
			//★注:简便的方法是列表页url传picname,不用再查询,直接删数据与图片文件
			$s = "SELECT picname FROM goods where id in ({$ids})";
			$r = mysql_query($s);
			if($r && mysql_num_rows($r)){
				while($picname = mysql_fetch_assoc($r)){
					$picname = $picname['picname'];
					//删除数据库数据
					$sql = "DELETE FROM goods where id in ({$ids})";
					mysql_query($sql);
					if(mysql_affected_rows()){
						//删除图片文件
						@unlink("../../public/uploads/s_{$picname}");
						@unlink("../../public/uploads/m_{$picname}");
						@unlink("../../public/uploads/b_{$picname}");
						@unlink("../../public/uploads/{$picname}");
						
						echo "<script>alert('删除成功');</script>";
						echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
					}	
				}
			}
			break;
	}
	
	mysql_close();
?>