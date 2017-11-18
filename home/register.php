<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>360top - 会员注册</title>
        <link rel="stylesheet" type="text/css" href="./common/css/header.css" />
        <link rel="stylesheet" type="text/css" href="./common/css/global.css" />
        <link rel="stylesheet" type="text/css" href="./common/css/register.css" />
        <link rel="stylesheet" type="text/css" href="./common/css/footer.css" />
		<script src="./common/js/ajaxBeta.js"></script>
		<script src="./common/js/showTips.js"></script>
    </head>
    <body>
        <!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
        
        <!-- 注册表单页 -->
        <div id="reg">
            <div class="reg_box">
                <div class="form_list">
                <form action="action.php?act=register" method="post">
					<input type="hidden" name="addtime" value="<?php echo time(); ?>" />
				
                    <div class="reg_item">
                    <span class="label">* 会员名:</span>
                        <input type="text" name="username" onfocus="tips();" onblur="check(this.value);" /><span id="username_tip" class="tip"></span>
                    </div>

                    <div class="reg_item">
                    <span class="label">* 设置密码:</span>
					<input type="password" name="pwd" value="" onfocus="tips2()" onblur="checkPwd(this.value);" /><span id="pwd_tip" class="tip"></span>
					</div>

                    <div class="reg_item">
                    <span class="label">* 确认密码:</span><input type="password" name="repwd" value="" onfocus="tips3()" onblur="checkRepwd(this.value);" /><span id="repwd_tip" class="tip"></span>
					</div>
					
                    <div class="reg_item">
                    <span class="label">* 验证码:</span><input id="myVcode" class="code" type="text" name="vcode" value="" />
                    
					<?php 
						include('../public/func/Vcode/vcode2.php'); 
					?>
				
					<a class="vcode" href="javascript:void(0);" onclick="window.location.href='./register.php'">点击切换</a><span id="vcode_tip" class="tip"></span>
					</div>
					
                    <div class="reg_item">
                    <span class="label"></span><input type="submit" class="sub" name="sub" value="同意协议并注册" />
                        <div class="agree">
                            <a href="./common/agree.html" target="_blank">《360top会员注册协议》</a>
                        </div>
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
