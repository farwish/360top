<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 我的订单</title>
    <link rel="stylesheet" type="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" type="text/css" href="./common/css/footer.css" />
	<link rel="stylesheet" type="text/css" href="./common/css/personal_nav.css" />
    <link rel="stylesheet" type="text/css" href="./common/css/myorder.css" />
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
					<h2>我的订单</h2>
					<?php
						
						$mysql = "SELECT count(*) as c FROM orders where uid = {$_SESSION['users']['id']} and status = 0";
						$mysql1 = "SELECT count(*) as c FROM orders where uid = {$_SESSION['users']['id']} and status = 1";
						$mysql2 = "SELECT count(*) as c FROM orders where uid = {$_SESSION['users']['id']} and status = 2";
						$mysql3 = "SELECT count(*) as c FROM orders where uid = {$_SESSION['users']['id']} and status = 3";
						$myres = mysql_query($mysql);
						if($myres && mysql_num_rows($myres)){
							$count = mysql_fetch_assoc($myres);
						}
						
						$myres1 = mysql_query($mysql1);
						if($myres1 && mysql_num_rows($myres1)){
							$count1 = mysql_fetch_assoc($myres1);
						}
						
						$myres2 = mysql_query($mysql2);
						if($myres2 && mysql_num_rows($myres2)){
							$count2 = mysql_fetch_assoc($myres2);
						}
						
						$myres3 = mysql_query($mysql3);
						if($myres3 && mysql_num_rows($myres3)){
							$count3 = mysql_fetch_assoc($myres3);
						}
					?>
					<p>便利提醒：[<a href="./myorder.php">全部订单</a>] <a href="./myorder.php?status=0">未确认订单（<?php echo $count['c']; ?>）</a> / <a href="./myorder.php?status=1">待确认收货（<?php echo $count1['c']; ?>）</a> / <a href="./myorder.php?status=2">已取消订单（<?php echo $count2['c']; ?>）</a> / <a href="./myorder.php?status=3">已完成（<?php echo $count3['c']; ?>）</a></p>
					
				</div>
				<?php
					if(isset($_GET['status'])){
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
				}
			
		?>
					
				<table width="830px">
					<tr class="tr1" bgcolor="#ddd" align="center">
						<td>订单信息</td>
						<td>收货人</td>
						<td>订单金额</td>
						<td>下单时间</td>
						<td>状态</td>
						<td>操作</td>
					</tr>
				<?php 
					//$status = array('<font color="#f90">未确认</font>','<font color="green">已发货</font>','已取消','<font color="#963">已完成</font>');
				
					$stat = array('<font color="#f90">未确认</font>','<font color="green">待收货</font>','已取消','<font color="#963">已完成</font>');
				
					if(isset($_GET['status'])){
						$st = "and status = ".$_GET['status'];
					}
				
					$mysql = "SELECT * FROM orders where uid = {$_SESSION['users']['id']} {$st} order by addtime desc {$limit}";
					$myres = mysql_query($mysql);
					if($myres && mysql_num_rows($myres)){
						while($orders = mysql_fetch_assoc($myres)){
						
							echo "<tr align='center'>";
							echo "<td>订单编号：{$orders['id']}</td>";
							echo "<td>{$orders['linkman']}</td>";
							echo "<td>￥{$orders['total']}</td>";
							echo "<td>".date('Y-m-d H:i:s',$orders['addtime'])."</td>";
							echo "<td>".$stat[$orders['status']]."</td>";
							echo "<td align='left'>";
							echo "<a href='./mydetail.php?id={$orders['id']}'>查看 | </a>";
			
							if($orders['status'] == 0){
								//状态为未确认，显示可以取消订单
								echo "<a href='./orderaction.php?act=close&id={$orders['id']}' onclick='return closeOrder();'>取消订单</a>";
							}else if($orders['status'] == 1){
								//状态为待收货，显示可以收货
								echo "<a href='./orderaction.php?act=mod&id={$orders['id']}' onclick='return accept();'>确认收货</a>";
							}else if($orders['status'] == 2){
								//状态为已取消，显示可以删除订单
								echo "<a href='./orderaction.php?act=del&id={$orders['id']}' onclick='return delCheck();'>删除</a>";
							}else if($orders['status'] == 3){
								//状态为已完成，显示可以去评论或删除订单
								$dsql = "select gid from detail where oid = {$orders['id']}";
								$dres = mysql_query($dsql);
								if($dres && mysql_num_rows($dres)){
									$detail = mysql_fetch_assoc($dres);
								}
									//去评论引导到商品详情，通过详情里的评论把具体商品的id传过去，做到准确评论单个商品
								echo "<a href='./orderaction.php?act=del&id={$orders['id']}' onclick='return delCheck();'>删除</a> | <a href='./mydetail.php?id={$orders['id']}'>评论</a>";
							}
							
							echo "</td>";
							echo "</tr>";		
						}
					}
					
					echo "<tr bgcolor='#ddd' align='center'><td colspan='6'>当前第{$page}页/共{$total}页 本页{$num}条/共{$count}条 <a href='./myorder.php?page=1{$status}'>首页</a> <a href='./myorder.php?page={$pre}{$status}'>上一页</a> <a href='./myorder.php?page={$next}{$status}'>下一页</a> <a href='./myorder.php?page={$total}{$status}'>末页</a></td></tr>";
				?>
				</table>
				
			</div>
		</div>
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>