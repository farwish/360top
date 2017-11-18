<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Mod</title>
	</head>
	<body background="../common/images/g_bg.jpg">
		<?php
			//载入数据库配置文件和连接文件
			include "../../public/dbConfig.php";
			include "../../public/mysql_conn.php";
			//载入目录树
			include "../../public/func/channelTree.php";
			
			//接收要修改分类的id
			$id = $_GET['id'];
			
			//根据id查询出pid等所有内容
			$sql = "SELECT cname,pid,path FROM channel where id = {$id}";
			$res = mysql_query($sql);
			if($res && mysql_num_rows($res)){
				$channel = mysql_fetch_assoc($res);
			}
			
		?>
		<center>
		<form action="action.php?act=mod" method="post">
			<!-- 隐藏域传一个id -->
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<?php 
				//目录树用来选择pid，select的name用于修改时接收参数$_POST['pid'];必须在表单里输出目录,pid才能传递
				echo '选择所属上级分类:'.channelTree($channel['pid']); 
			?>
			分类名称:<input type="text" name="cname" value="<?php echo $channel['cname']; ?>" /><br />
			<input type="submit" name="sub" value="保存修改" />
		</form>
		</center>
	</body>
</html>