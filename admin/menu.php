<?php
	require('session.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理菜单</title>
<style type="text/css">
html, body {height:100%;overflow:hidden;}
body {font-family:Arial, Helvetica, sans-serif; font-size:12px; margin:0px; text-align:center; border-right:1px #ccc solid;}
a {color: #000; text-decoration: none;}
#menu img {_margin-top: 12px;}
#all {width: 100%;height:100%;}
#menu {width: 96%;}
#menu ul {padding:0; margin: 0; list-style: none;}
#menu ul li {background-repeat: repeat-x; background-position:center; height: 32px;;margin-top: 2px; margin-bottom: 2px; border:1px #ccc solid; line-height: 2.8;}
</style>
</head>

<body>
<div id="all">
    <div id="menu">
        <ul>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./users/index.php">会员管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./channel/index.php">分类管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./goods/index.php">商品管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./orders/index.php">订单管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./news/index.php">评论管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./score/index.php">积分管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./amount/index.php">统计管理</a></li>
            <li><img src="./common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./config/index.php">站点设置</a></li>
        </ul>
    </div>
</div>
</body>
</html>
