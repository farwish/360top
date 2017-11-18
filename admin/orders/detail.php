<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>订单详情</title>
	</head>
	<style>
		a:hover{
			color:red;
		}
	</style>
    <body>
		<table align="center" width="90%">
			<tr bgcolor="#bbb">
				<th>ID</th>
				<th>订单id号</th>
				<th>商品id号</th>
				<th>&nbsp;</th>
				<th>商品名称</th>
				<th>单价</th>
				<th>数量</th>
			</tr>
		<?php
			date_default_timezone_set('PRC');
			
			include "../../public/dbConfig.php";
			include "../../public/mysql_conn.php";
		
			$sql = "SELECT * FROM detail where oid = {$_GET['id']}";
			
			$res = mysql_query($sql);
			
			if($res && mysql_num_rows($res)){
				while($detail = mysql_fetch_assoc($res)){
					$gsql = "SELECT * FROM goods where id = {$detail['gid']}";
					$gres = mysql_query($gsql);
					if($gsql && mysql_num_rows($gres)){
						$goods = mysql_fetch_assoc($gres);
					}
				
					echo "<tr bgcolor='#eee' align='center'>";
					echo "<td>{$detail['id']}</td>";
					echo "<td>{$detail['oid']}</td>";
					echo "<td>{$detail['gid']}</td>";
					echo "<td><a href='../../home/detail.php?id={$detail['gid']}' target='_blank'><img src='../../public/uploads/s_{$goods['picname']}'></a></td>";
					echo "<td><a href='../../home/detail.php?id={$detail['gid']}' style='color:#963;' target='_blank'>{$detail['name']}</td>";
					echo "<td>{$detail['price']}</td>";
					echo "<td>{$detail['num']}</td>";
					echo "</tr>";
				}
			}
		?>
		<tr bgcolor="#ddd"><td colspan="7" align="center"><a href="javascript:void(0);" onclick="window.history.back();">返回</td></tr>
		</table>
	</body>
</html>