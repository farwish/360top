<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 我的360Top</title>
    <link rel="stylesheet" type="text/css" href="./common/css/header.css" />
	<link rel="stylesheet" type="text/css" href="./common/css/personal_nav.css" />
    <link rel="stylesheet" type="text/css" href="./common/css/personal.css" />
    <link rel="stylesheet" type="text/css" href="./common/css/footer.css" />
	<script>
		function changePic(){
			var headPic = document.getElementById('headPic');
			headPic.src="./common/images/on-img.gif";
		}
		function backPic(){
			var headPic = document.getElementById('headPic');
			headPic.src="./common/images/no-img.gif";
		}
		function upFile(){
			var mypic = document.getElementById('mypic');
			mypic.click();
		}
	</script>
    </head>
    <body>
		<!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
		
		<?php
			//进入个人中心，未登录时进入登录界面
			if(empty($_SESSION['users']['username'])){
				echo "<script>window.location.href='./login.php';</script>";
			}
			
			$status = array('管理员','普通会员','禁用');
		?>
		
		<div class="p_center">
			
			<!-- 个人中心 左导航开始 -->
			<?php include('./common/person_nav.php'); ?>
			<!-- 个人中心 左导航结束 -->
			
			<div class="p_wel" style="background:url(./common/images/person_bg.jpg) -690px -445px no-repeat">
				<div class="p_info">
					<div class="head_img">
						<a href="javascript:void(0);" onclick="upFile();"><img src="<?php 
							//判断用户session中图片是否存在
							if(empty($_SESSION['users']['pic'])){
								//不存在则显示默认图片
								echo "./common/images/no-img.gif";
							}else{
								//否则显示小头像
								echo "../public/uploadsPic/s_{$_SESSION['users']['pic']}"; //显示小头像
							}			
							
						?>" id="headPic" <?php 
							//如果没有用户信息中没有图片，则显示默认图片js效果
							if(empty($_SESSION['users']['pic'])){
								echo "onmouseover='changePic();' onmouseout='backPic();'";
							}
							
							?> /></a>
					</div>
					
					<div class="p_form">
						<form action="action.php?act=uppic" method="post" enctype="multipart/form-data">
							<input id="mypic" class="mypic" type="file" name="mypic" />
							<input class="subimg" type="submit" name="sub" value="更新" />
						</form>
					</div>
				</div>
				
				<div class="tab">
					<table>
				
						<tr><td><span><strong><?php echo $_SESSION['users']['username']; ?></strong></span>，欢迎您！</td></tr>
						<tr><td>当前状态：<?php echo $status[$_SESSION['users']['status']]; ?></td></tr>
						<tr><td>北京时间：<?php echo date('Y-m-d H:i:s',time()); ?></td></tr>
						
					</table>
				</div>
			</div>
		</div>
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>