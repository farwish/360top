<?php
	require('../common/session.php');
?>
<!DOCTYPE html>
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
#menu ul li {background-image:url(/match/public/images/menu_bg.gif); background-repeat: repeat-x; background-position:center; height: 32px;;margin-top: 2px; margin-bottom: 2px; border:1px #ccc solid; line-height: 2.8;}
</style>
</head>

<body>
<div id="all">
    <div id="menu">
        <ul>
            <li><img src="../common/images/li.jpg" />&nbsp;&nbsp;&nbsp;<a href="./list.php" target="main">评论管理</li>
        </ul>
    </div>
</div>
</body>
</html>
