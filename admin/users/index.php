<?php
	//导入验证登陆文件
	require('../common/session.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>会员管理菜单</title>
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
            <li><img src="../common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./list.php" target="main">会员列表</li>
            <li><img src="../common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./add.php" target="main">会员添加</li>
        </ul>
    </div>
</div>
</body>
</html>
