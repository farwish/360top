<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 浏览历史</title>
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/personal_nav.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/myorder.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
	<script>
		function closeOrder(){
			return confirm('您确认取消订单吗?');
		}
		
		function accept(){
			return confirm('是否确认收货?');
		}
		
		function delCheck(){
			return confirm('您确认删除此订单记录吗?');
		}
	</script>
    </head>
    <body>
		<!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
		
		<?php
			//进入个人中心，未登录时进入登录界面
			if(empty($_SESSION['users']['username'])){
				echo "<script>window.location.href='./login.php';</script>";
			}
		?>
		
		<div class="p_center">
			
			<!-- 个人中心 左导航开始 -->
			<?php include('./common/person_nav.php'); ?>
			<!-- 个人中心 左导航结束 -->

			<div class="p_wel">
				<div class="myorder_tit">
					<h2>浏览历史</h2>
				</div>
				<?php
/* 					if(isset($_GET['status'])){
						$where = 'and status = '.$_GET['status'];
						$status = '&status='.$_GET['status'];
					}else{
						$where = '';
						$status = '';
					}
				
				//1.设置页大小
				$pagesize = 9;
				//2.查询出总条数
				$sql = "SELECT count(*) as c FROM orders where uid = {$_SESSION['users']['id']} {$where}";
				$res = mysql_query($sql);
				if($res && mysql_num_rows($res)){
					$count = mysql_fetch_assoc($res);
					$count = $count['c'];
				}
				//3.计算总页数
				$total = ceil($count/$pagesize);
				//4.获取当前页码
				$page = empty($_GET['page']) ? 1 : $_GET['page'];
					
					if($count !=0){
						//本页条数
						$num = ($page == $total && $count%$pagesize != 0) ? $count%$pagesize : $pagesize;
					}else{
						$num = 0;
					}
					
				//5.防止页面越界
				if($page < 1){
					$page = 1;
				}else if($page > $total){
					$page = $total;
				}
				//6.组装limit条件子句
				$lim = ($page-1)*$pagesize;
				$limit = "limit {$lim},{$pagesize}";
				//7.准备sql语句
				//8.发送sql语句
				//9.设置链接
				
				//下一页
				$next = $page + 1;
				if($next > $total){
					$next = $total;
				}
				
				//上一页
				$pre = $page - 1;
				if($pre < 1){
					$pre = 1;
				} */
			
		?>					
					
		<?php	//如果有商品浏览历史
				if(isset($_SESSION['notes'])){
					echo '<table width="830px">';
					echo '<tr class="tr1" bgcolor="#ddd" align="center">';
					echo '<td>商品编号</td>';
					echo '<td>分类</td>';
					echo '<td>商品图片</td>';
					echo '<td>商品名称</td>';
					echo '<td>单价</td>';
					echo '<td>库存量</td>';
					echo '<td>点击量</td>';
					echo '</tr>';
					//遍历session商品信息
					foreach($_SESSION['notes'] as $values){
						echo "<tr align='center'>";
						echo "<td>{$values['id']}</td>";
						echo "<td>";
						
						$psql = "SELECT * FROM channel where id = {$values['cid']}";
						$pres = mysql_query($psql);
						if($pres && mysql_num_rows($pres)){
							$pchannel = mysql_fetch_assoc($pres);
							echo $pchannel['cname'];
						}
					
						echo "</td>";
						echo "<td><a href='./detail.php?id={$values['id']}' target='_blank'><img src='../public/uploads/s_{$values['picname']}' /></a></td>";
						echo "<td><a style='color:#963' href='./detail.php?id={$values['id']}' target='_blank'>{$values['goods']}</a></td>";
						echo "<td>{$values['price']}</td>";
						echo "<td>{$values['store']}</td>";
						echo "<td>{$values['clicknum']}</td>";
						echo "</tr>";
					}
					echo "<tr bgcolor='#ddd' align='center'><td colspan='7'><a href='javascript:void(0);' onclick='window.history.back();'>返回</a></td></tr>";
					echo "</table>";
				}else{
					echo '<table width="830px">';
					echo '<tr class="tr1" bgcolor="#ddd" align="center">';
					echo '<td>- 暂无浏览历史 -</td>';
					echo '</tr>';
					echo '</table>';
				}
		?>	
			</div>
		</div>
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>