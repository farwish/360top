<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360top - 后台登陆页</title>
        
        <link rel="stylesheet" type="text/css" href="./common/css/login.css" />
    </head>
    <body>
        <!-- 后台登陆表单页 -->
        <div id="reg">
            <div class="reg_box">
                <div class="title"><h2>后台登录</h2></div>
                <div class="form_list">
                <form action="action.php?act=login" method="post">
                    <div class="reg_item">
                    <span class="label">* 账号:</span>
                        <input type="text" name="username" value="" />
                        <div class="msg_box"></div>
                    </div>

                    <div class="reg_item">
                    <span class="label">* 输入密码:</span><input type="password" name="password" value=""/>
                    </div>

                    <div class="reg_item">
                    <span class="label">* 确认密码:</span><input type="password" name="repass" value="" />
                    </div>

                    <div class="reg_item">
                    <span class="label">* 验证码:</span><input class="code" type="text" name="mycode" value="">
                        
						<?php include('../public/func/Vcode/vcode2.php'); ?>
						
						<a class="clic" href="javascript:void(0);" onclick="window.location.href='./login.php'">点击切换</a>
                    </div>
					
                    <div class="reg_item">
                    <span class="label"></span><input type="submit" class="sub" name="sub" value="登录" />
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </body>
</html>
