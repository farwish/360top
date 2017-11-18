<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 我的订单</title>
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/personal_nav.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/myorder.css" />
	<link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
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
						$mysql = "SELECT count(*) as c FROM orders where uid = {$_SESSION['users']['id']} and status = 1";
						$myres = mysql_query($mysql);
						if($myres && mysql_num_rows($myres)){
							$count = mysql_fetch_assoc($myres);
						}
					?>
					<p>便利提醒：<a href="./myorder.php">全部订单</a> / <a href="./myorder.php?status=1">待确认收货（<?php echo $count['c']; ?>）</a></p>
					
				</div>
				
				<table width="830px">
					<tr class="tr1" bgcolor="#ddd" align="center">
						<td>id</td>
						<td>订单id号</td>
						<td>商品id号</td>
						<td>&nbsp;</td>
						<td>商品名称</td>
						<td>单价</td>
						<td>数量</td>
					<?php
						//已完成的订单，在订单详情页显示可以去评论
						$st = "SELECT status FROM orders where id = {$_GET['id']}";
						$str = mysql_query($st);
						if($str && mysql_num_rows($str)){
							$status = mysql_fetch_assoc($str);
						}
						if($status['status'] == 3){
							echo "<td>评论</td>";
						}
					?>
					</tr>
				<?php 
					//接收订单id
					$oid = $_GET['id'];
					//查询出订单详情
					$sql = "SELECT * FROM detail where oid = {$oid}";
					
					$res = mysql_query($sql);
					
					if($res && mysql_num_rows($res)){
						//遍历订单下所有商品
						while($detail = mysql_fetch_assoc($res)){
						
							//查询出商品图片
							$gs = "SELECT * FROM goods where id = {$detail['gid']}";
							$gr = mysql_query($gs);
							if($gs && mysql_num_rows($gr)){
								$goods = mysql_fetch_assoc($gr);
							}
						
							echo "<tr align='center'>";
							echo "<td>{$detail['id']}</td>";
							echo "<td>{$detail['oid']}</td>";
							echo "<td>{$detail['gid']}</td>";
							echo "<td><a href='./detail.php?id={$detail['gid']}'><img src='../public/uploads/s_{$goods['picname']}' /></td>";
							echo "<td><a href='./detail.php?id={$detail['gid']}' style='color:#963;'>{$detail['name']}</a></td>";
							echo "<td>￥{$detail['price']}</td>";
							echo "<td>{$detail['num']}</td>";
								
							if($status['status'] == 3){
								echo "<td>";
								//把商品id和订单id同时传递过去，在商品详情页可以准确判断该用户下的订单里的商品是否评论过
								echo "<a href='./detail.php?id={$detail['gid']}&oid={$oid}#discuss' target='_blank'>去评论</a>";
								echo "</td>";
							}
							
							echo "</tr>";
						}
						
						if($status['status'] == 3){
							echo "<tr align='center' bgcolor='#ddd'><td colspan='8'><a href='javascript:volid(0);' onclick='window.history.back();'>返回</a></td></tr>";
						}else{
							echo "<tr align='center' bgcolor='#ddd'><td colspan='7'><a href='javascript:volid(0);' onclick='window.history.back();'>返回</a></td></tr>";
						}
					}
				?>
				</table>
				
			</div>
		</div>
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>