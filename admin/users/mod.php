<?php
	//导入验证登陆文件
	require('../common/session.php');
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Mod</title>
    </head>
    <body>
        <?php
            //载入数据库配置 和 连接文件
            include('../../public/dbConfig.php');        
            include('../../public/mysql_conn.php'); 

            //准备查询语句
            $sql = "SELECT username,password,email,status FROM users where id = ".$_GET['id'];
            //执行语句
            $res = mysql_query($sql);
            //处理结果集
            if(mysql_num_rows($res)){
                $row = mysql_fetch_assoc($res);
            }
        ?>

        <form action="./action.php?act=mod" method="post">
            <input type="hidden" name="modid" value="<?php echo $_GET['id']; ?>" />
            <table border=0 width="700" align="center">
            <tr bgcolor="#eee">
            <td align="right">* 用户名:</td><td align="left"><input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" /><span>[5-16位,非数字开头,字母,数字,下划线 或 组合]</span></td>
            </tr>

            <tr bgcolor="#eee">
            <td align="right">* 密码:</td><td align="left"><input type="password" id="pass" name="password" value="<?php echo $row['password']; ?>" /><span>[6-16位,字母,数字,下划线 或 组合]</span></td>
            </tr>

            <tr bgcolor="#eee">
            <td align="right">* 确认密码:</td><td align="left"><input type="password" id="repass" name="repass" value="<?php echo $row['password'] ?>" /><span>[与上面输入的密码保持一致]</span></td>
            </tr>

            <tr bgcolor="#eee">
            <td align="right">* 邮箱:</td><td align="left"><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" /><span>[格式如:123456@163.com]</span></td>
            </tr>

            <tr bgcolor="#eee">
            <td colspan=2 align="center"><input type="button" name="back" value="返回" onclick="window.history.back();" /><input id="sub" type="submit" name="sub" value="修改" /></td>
            </tr>
            </table>
        </form>
    
        <script>
            //获取节点
            var username = document.getElementById('username');
            //事件:表单失去焦点时进行正则验证，用test()方法，如果username的值中含有与pattern匹配的文本则返回true,否则返回false
            username.onblur = function(){
                var pattern = /^\d{4,20}$/;
				if(username.value.length < 4 || username.value.length > 20){
					this.nextSibling.innerHTML = '× 长度不对[4-20位,字母,数字,下划线组合]';
					this.nextSibling.style.color = 'red';
                }else if(pattern.test(username.value)){
					this.nextSibling.innerHTML = '× 不能纯数字[4-20位,字母,数字,下划线组合]';
                    this.nextSibling.style.color = 'red';
                    sub.disabled = true;//按钮不可用
                }else{
                    this.nextSibling.innerHTML = '√ 格式正确';
                    this.nextSibling.style.color = 'green';
                    sub.disabled = false;
                }
            }

            //判断密码格式
            var pass = document.getElementById('pass');
            pass.onblur = function(){
                var pattern = /\w{6,16}/;
                if(pattern.test(pass.value)){
                    this.nextSibling.innerHTML = '√ 格式正确';
                    this.nextSibling.style.color = 'green';
                }else{
                    this.nextSibling.innerHTML = '× 格式错误[6-16位,字母,数字,下划线 或 组合]';
                    this.nextSibling.style.color = 'red';
                }
            }
            
            //判断两次密码输入是否一致
            var repass = document.getElementById('repass');
            repass.onblur = function(){
                if(repass.value == pass.value){
                    this.nextSibling.innerHTML = '√ 输入一致';
                    this.nextSibling.style.color = 'green';
                }else{
                    this.nextSibling.innerHTML = '× 两次输入不一致';
                    this.nextSibling.style.color = 'red';
                }
            }

            //判断邮箱格式
            var email = document.getElementById('email');
            email.onblur = function(){
                var pattern = /[\w]+@[0-9a-zA-Z]+\.[0-9a-zA-Z]{1,10}/;
                if(pattern.test(email.value)){
                    this.nextSibling.innerHTML = '√ 格式正确';
                    this.nextSibling.style.color = 'green';
                }else{
                    this.nextSibling.innerHTML = '× 格式错误[格式如:123456@163.com]';
                    this.nextSibling.style.color = 'red';
                }
            }
        </script>

    </body>
</html>
