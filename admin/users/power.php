<?php
	//导入验证登陆文件
	require('../common/session.php');
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Power</title>
    </head>
    <body>
        <form action="./action.php?act=power" method="post">
        <input type="hidden" name="powid" value="<?php echo $_GET['id'] ?>" >
        设为禁用<input type="radio" name="status" value="2" <?php echo $_GET['status']==2 ? checked : ""; ?> ><br />
        设为管理员<input type="radio" name="status" value="0" <?php echo $_GET['status']==0 ? checked : ""; ?>><br />
        设为普通会员<input type="radio" name="status" value="1" <?php echo $_GET['status']==1 ? checked : ""; ?> ><br />
        <input type="submit" name="sub" value="提交"><button><a href="javascript:voild(0);" onclick="getBack();" style="text-decoration:none;color:#333;">返回</a></button>
        </form>
		<script>
			function getBack(){
				window.location.href='./list.php';
			}
		</script>
    </body>
</html>
        
