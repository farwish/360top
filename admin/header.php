<?php
    //导入验证登陆文件
	require('session.php');
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Header</title>
<style type="text/css">
body {background: #686868; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin:0px; margin-bottom:2px;border-bottom: 1px #ccc solid;}
h1 {color: #FFF;}
a {color: #FFF; text-decoration: none;position:relative;}
ul { list-style:none;}
#all {width: 100%;}
#banner {margin-top: 8px; margin-left: 32px;}
#main {width: 100%; margin-bottom: 2px; background:#eeeeee; margin-left: 0px; margin-right:0px; height: 30px; color: #000; line-height: 2.4;overflow: auto;}
#main a {color:#000;}
#welcome { float:left; width: 40%; font-weight: 800; padding-left: 8px; position:relative;}
#adminop { float:left; width: 59%; position:relative; text-align:right; line-height:1; *line-height:2.2;}
#adminop ul li {float: right; width: 80px;}
#nav {width: 100%; clear: both;}
#nav ul li {float: right; width:82px; height:25px; line-height: 2.1; text-align: center;}
.inactive { background-image:url(./common/images/admin/nav_bg_inactive2.png) !important;background: none; margin-left: 2px; margin-right:2px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=./common/images/admin/nav_bg_inactive2.png);}
.inactive a {color: #000;}
.active {background:url(./common/images/admin/nav_bg_active2.png) !important;background: none; margin-left: 2px; margin-right:2px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=./common/images/admin/nav_bg_active2.png);}
.active a {color:#fff;}
.blankgray {background:#bbb; height:2px; width:100%; margin:0; padding:0; clear:both; font-size:2px;}
</style>
<script type="text/javascript" language="javascript" src="./common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
var oplist = new Array('channel', 'goods', 'orders', 'news', 'score', 'amount', 'config', 'users');
$(document).ready(function() {
	$('#nav').find("a").click(function() {
		var id = $(this).attr('id');
		$.each(oplist, function(i, n) {
			$('#'+n).attr('class', 'inactive');
		});
		$(this).parents("li").attr('class', 'active');
	});
});
</script>
</head>

<body>
<div id="all">
	<div id="banner"><h1>360TOP后台管理面板</h1></div>
    <div id="nav">
    	<ul>	
			<li class="active" id="config"><a href="./config/index.php" target="menu">站点设置</a></li>
   
            <li class="inactive" id="amount"><a href="./amount/index.php" target="menu">统计管理</a></li>
			
			<li class="inactive" id="score"><a href="./score/index.php" target="menu">积分管理</a></li>
			
			<li class="inactive" id="news"><a href="./news/index.php" target="menu">评论管理</a></li>
			
			<li class="inactive" id="orders"><a href="./orders/index.php" target="menu">订单管理</a></li>
			
			<li class="inactive" id="goods"><a href="./goods/index.php" target="menu">商品管理</a></li>
			
			<li class="inactive" id="channel"><a href="./channel/index.php" target="menu">分类管理</a></li>
			
			<li class="inactive" id="users"><a href="./users/index.php" target="menu">会员管理</a></li>

        </ul>
    </div>
    <div id="main">
    	<div id="welcome">欢迎您回来
			<?php 
				date_default_timezone_set('PRC');
				if(isset($_SESSION['users']['username'])){
					echo $_SESSION['users']['username'];
				}
				echo ', 现在时间是:'.date('Y-m-d H:i:s'); ?>
		</div>
        <div id="adminop">
            <ul>
				<li><a href="./action.php?act=logout" target="top" >退出管理</a></li>
                <li><a href="javascript:parent.location.reload();">管理首页</a></li>
                <li><a href="../home/" target="_top">站点首页</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
