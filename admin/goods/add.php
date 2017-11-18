<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body background="../common/images/g_bg.jpg">
		<?php
			include "../../public/dbConfig.php";
			include "../../public/mysql_conn.php";
			include "../../public/func/channelTree.php";
		?>
		<table align="center">
		<form action="action.php?act=add" method="post" enctype="multipart/form-data">
			<tr><td align="right">商品分类:</td><td><?php echo channelTree($pid); ?></td></tr>
			<tr><td align="right">商品名称:</td><td><input type="text" name="goods" value="" /></td></tr>
			<tr><td align="right">生产地:</td><td><input type="text" name="company" value="" /></td></tr>
			<tr><td align="right">商品单价:</td><td><input type="text" name="price" value="" /></td></tr>
			<tr><td align="right">库存量:</td><td><input type="text" name="store" value="" /></td></tr>
			<tr><td align="right">商品图片:</td><td><input type="file" name="picname" value="" /></td></tr>
			<tr><td align="right">商品描述:</td><td><textarea rows="5" name="descr"></textarea></td></tr>
			<tr><td>&nbsp;</td><td><input type="submit" name="sub" /><input type="reset" name="rese" /></td></tr>
		</form>
		</table>
	</body>
</html>