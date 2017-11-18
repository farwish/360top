<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 账户信息</title>
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/personal_nav.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/personalm.css" />
	<link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
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
		?>
		
		<div class="p_center">
			
			<!-- 个人中心 左导航开始 -->
			<?php include('./common/person_nav.php'); ?>
			<!-- 个人中心 左导航结束 -->
			
			<div class="p_wel">
				<div class='account'>
				<h2>账户信息</h2>
				</div>
				<form action="action.php?act=up" method="post">
				<table width="500px" align="center">
					<tr>
						<td align="right">账号：</td>
						<td><input size="30px" type="text" name="username" value="<?php echo $_SESSION['users']['username']; ?>"></td>
					</tr>
					<tr>
						<td align="right">姓名：</td>
						<td><input size="30px" type="text" name="truename" value="<?php echo $_SESSION['users']['truename'] ?>"></td>
					</tr><tr>
						<td align="right">性别：</td>
						<td>	
							<label><input type="radio" name="sex" value="0" <?php echo $_SESSION['users']['sex']==0 ? checked : ""; ?>>男</label>
							<label><input type="radio" name="sex" value="1" <?php echo $_SESSION['users']['sex']==1 ? checked : ""; ?>>女</label>
						</td>
					</tr>
					<tr>
						<td align="right">地址：</td>
						<td><input size="30px" type="text" name="address" value="<?php echo $_SESSION['users']['address']; ?>"></td>
					</tr><tr>
						<td align="right">邮编：</td>
						<td><input size="30px" type="text" name="code" value="<?php echo $_SESSION['users']['code']; ?>"></td>
					</tr>
					<tr>
						<td align="right">电话：</td>
						<td><input size="30px" type="text" name="phone" value="<?php echo $_SESSION['users']['phone']; ?>"></td>
					</tr>
					<tr>
						<td align="right">Email：</td>
						<td><input size="30px" type="text" name="email" value="<?php echo $_SESSION['users']['email']; ?>"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="padding-left:40px;"><input type="submit" name="sub" value="保存修改	"></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>