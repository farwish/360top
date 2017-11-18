<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<style>
		a:hover{
			color:red;
		}
	</style>
	<body>
		<center>
		<p>
		按商品状态查看：
		<a href="./list.php?state=1">浏览新上架</a>
		<a href="./list.php?state=2">浏览在售</a>
		<a href="./list.php?state=3">浏览已下架</a>
		<a href="./list.php">全部</a>
		</p>
		<form action="" method="post">
			查找商品名称:<input type="text" name="keyword" value="" size="35px" />
			<input type="submit" name="sub" value="搜索" />
		</form>
		</center>
		<?php
			include "../../public/dbConfig.php";
			include "../../public/mysql_conn.php";
		
			include "../../public/func/myPage.php";
			
			$status = array(1=>'新上架',2=>'在售',3=>'下架');
			
			$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : $_GET['keyword'];
			if(!empty($keyword)){
				$where = "where goods like '%{$keyword}%'";
			}else{
				$where = "";
			}
			
			$state = $_GET['state'];
			if(array_key_exists($state, $status)){
				if(!empty($keyword)){
					$state = "and state = {$_GET['state']}";
				}else{
					$state = "where state = {$_GET['state']}";
				}
			}else{
				$state = "";
			}
			
			$page = $_GET['page'];
			$table = 'goods';
			$limit = 0;
			$pagesize = 4;
			$fpage = page($table, $limit, $pagesize, $page, $where, $state);
		?>
		
		<table border="0" width="90%" align="center">
			<tr bgcolor="#bbb">
				<th>选择</th>
				<th>ID</th>
				<th>分类[cid]</th>
				<th>商品名称</th>
				<th>商品图片</th>
				<th>单价</th>
				<th>库存量</th>
				<th>销售量</th>
				<th>点击量</th>
				<th>状态</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php
				date_default_timezone_set('PRC');
				
				
				$sql = "SELECT id,cid,goods,company,descr,price,picname,state,store,num,clicknum,addtime FROM goods {$where} {$state} order by addtime desc limit {$limit},{$pagesize}";
				
				$res = mysql_query($sql);
				if($res && mysql_num_rows($res)){
					echo '<form action="action.php?act=delAll" method="post">';
					while($row = mysql_fetch_assoc($res)){
						$s = "SELECT cname FROM channel where id={$row['cid']}";
						$r = mysql_query($s);
						if($r && mysql_num_rows($r)){
							$cname = mysql_fetch_assoc($r);
							$cname = $cname['cname'];
						}
						
						echo "<tr bgcolor='#eee' align='center'>
						<td><input type='checkbox' name='ids[]' value='{$row['id']}' /></td>
						<td>{$row['id']}</td>
						<td>{$cname}[{$row['cid']}]</td>
						<td>{$row['goods']}</td>
						<td><img src='../../public/uploads/s_{$row['picname']}' /></td>
						<td>{$row['price']}</td>
						<td>{$row['store']}</td>
						<td>{$row['num']}</td>
						<td>{$row['clicknum']}</td>
						<td>{$status[$row['state']]}</td>
						<td>".date('Y-m-d H:i:s',$row['addtime'])."</td>
						<td><a href='../../home/detail.php?id={$row['id']}' target='top'>详情</a> <a href='./mod.php?id={$row['id']}'>修改</a> <a href='action.php?act=del&id={$row['id']}' onclick='return delCheck();'>删除</a></td>
						</tr>";
					}
				
					echo '<tr bgcolor="#eee" align="center">
							<td><input type="submit" name="sub" value="删除所选" /></td>
						</form>
						
						<form action="list.php" method="get">
							<td colspan="11">'.$fpage.'
							<input type="hidden" name="keyword" value="'.$keyword.'" />
							<input type="text" name="page" value="" size="4" />
							<input type="submit" name="sub" value="GO" />
							</td>
						</form>
						</tr>';
				}
			?>
		</table>
		<script>
			function delCheck(){
				return confirm('您确认要删除吗?');
			}
		</script>
	</body>
</html>