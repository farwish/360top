<?php
	//导入验证登陆文件
	require('session.php');
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台默认显示页</title>
<style type="text/css">
body {font-family: Arial, Helvetica, sans-serif; font-size:12px; text-align:center;}
a {text-decoration:none;}
#all {width: 100%; text-align:center; margin:auto;}
#all .main {width:96%; line-height:1.8; margin:auto; border:1px solid #ccc; text-align:center; text-indent:2em; padding:130px 0;}
</style>
</head>

<body>
<div id="all">
	<div class="main">
		<?php
		
			echo '<p>当前系统PHP版本是: ' .PHP_VERSION.'</p>';
			echo '<p>所在服务器地址为: ' .$_SERVER['SERVER_ADDR'].'</p>';
			echo '<p>您登录的IP地址是: ' .$_SERVER['REMOTE_ADDR'].'</p>';
			echo '<p>----------------------------------------------------------</p>';
			echo '<p>当前管理系统为360Top Beta版 , 欢迎使用!</p>';
			echo '<p>技术支持来自 : <a href="http://weibo.com/farwish" target="top">黑眼诗人</a></p>';
			
		?>
    </div>
</div>
</body>
</html>
