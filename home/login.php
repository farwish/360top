<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>360top - 会员登录</title>
        <link rel="stylesheet" type="text/css" href="./common/css/header.css" />
        <link rel="stylesheet" type="text/css" href="./common/css/login.css" />
        <link rel="stylesheet" type="text/css" href="./common/css/footer.css" />
    </head>
    <body>
        <!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
        
        <!-- 登录表单页 -->
        <div id="reg">
            <div class="reg_box">
                <div class="form_list">
                <form action="action.php?act=login" method="post">
                    <div class="reg_item">
                    <span class="label">* 会员名:</span>
                        <input type="text" name="username" value="" />
                    </div>

                    <div class="reg_item">
                    <span class="label">* 输入密码:</span>
						<input type="password" name="pwd" value=""/>
                    </div>

                    <div class="reg_item">
                    <span class="label">* 验证码:</span><input class="code" type="text" name="vcode" value="" />
                        <?php 
							include('../public/func/Vcode/vcode2.php'); 
						?>
						<a class="clic" href="javascript:void(0);" onclick="window.location.href='./login.php'">点击切换</a>
                    </div>                   

                    <div class="reg_item">
                    <span class="label"></span><input type="submit" class="sub" name="sub" value="立即登录" />
					<div class="free"><a href="./register.php">没有账号?免费注册</a></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
        <!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
    </body>
</html>
