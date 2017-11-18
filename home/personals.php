<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 账户安全</title>
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/personal_nav.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/personals.css" />
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
				<h2>账户安全</h2>
				</div>
				
				<div class="mpass">
					<form action="action.php?act=alter" method="post">
					<table width="500px" align="center">
						<tr>
							<td align="right">旧 密 码：</td>
							<td><input size="30px" type="text" name="oldpass" value=""></td>
						</tr>
						<tr>
							<td align="right">新 密 码：</td>
							<td><input size="30px" type="text" name="newpass" value=""></td>
						</tr>
						<tr>
							<td align="right">确认密码：</td>
							<td><input size="30px" type="text" name="repass" value=""></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="padding-left:40px;"><input type="submit" name="sub" value="修改密码	"></td>
						</tr>
					</table>
					</form>
				</div>
			</div>
		</div>
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>