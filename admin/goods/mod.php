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
			
			$id = $_GET['id'];
			$sql = "SELECT id,cid,goods,company,price,store,picname,state,descr FROM goods where id = {$id}";
			$res = mysql_query($sql);
			if($res && mysql_num_rows($res)){
				$goods = mysql_fetch_assoc($res);
			}
			
		?>
		<table align="center">
		<form action="action.php?act=mod" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id ?>" />
			<input type="hidden" name="oldpicname" value="<?php echo $goods['picname'] ?>" />
			<tr><td align="right">商品分类:</td><td><?php echo channelTree($goods['cid']); ?></td></tr>
			<tr><td align="right">商品名称:</td><td><input type="text" name="goods" value="<?php echo $goods['goods']; ?>" /></td></tr>
			<tr><td align="right">生产地:</td><td><input type="text" name="company" value="<?php echo $goods['company']; ?>" /></td></tr>
			<tr><td align="right">商品单价:</td><td><input type="text" name="price" value="<?php echo $goods['price']; ?>" /></td></tr>
			<tr><td align="right">库存量:</td><td><input type="text" name="store" value="<?php echo $goods['store']; ?>" /></td></tr>
			<tr><td align="right">商品图片:</td><td><img src="../../public/uploads/m_<?php echo $goods['picname']?>" /><br /><input type="file" name="picname" /></td></tr>
			<tr><td align="right">状态</td>
				<td><label><input type="radio" name="state" value="1" <?php echo $goods['state']==1?'checked':''; ?>/>新上架</label>
					<label><input type="radio" name="state" value="2" <?php echo $goods['state']==2?'checked':''; ?>/>在售</label>
					<label><input type="radio" name="state" value="3" <?php echo $goods['state']==3?'checked':''; ?>/>下架</label>
				</td>
			</tr>
			<tr><td align="right">商品描述:</td><td><textarea rows="5" name="descr"><?php echo $goods['descr']; ?></textarea></td></tr>
			<tr><td>&nbsp;</td><td><input type="submit" name="sub" /><input type="reset" name="rese" /></td></tr>
		</form>
		</table>
	</body>
</html>