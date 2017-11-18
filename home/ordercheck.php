<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 订单结算</title>
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/ordercheck.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
	</head>
    <body>
		<!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
		
		<?php
			if(empty($_SESSION['cart'])){
				echo "<script>window.location.href='./index.php';</script>";
			}
			
			if(empty($_SESSION['users'])){
				echo "<script>window.location.href='./login.php';</script>";
			}
		?>
		<div class="shop_tip">
			<div class="tip_pic">
				<ul>
					<li>1.我的购物车</li>
					<li>2.填写核对订单</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
		
		<?php
			$sql = "SELECT * FROM users where username = {$_SESSION['username']}";
			$res = mysql_query($sql);
			if($res && mysql_num_rows($res)){
				$users = mysql_fetch_assoc($res);
			}
		?>
		
		<div class="info">
			<h2>填写并核对订单信息</h2>
			<form action="orderend.php" method="post">
			<div class="bb">
			<div class="taker">
				<p><strong><font size="2">收货人信息</font></strong></p>
				<span>真实姓名:</span><input type="text" name="truename" value="<?php echo $_SESSION['users']['truename']; ?>" /><br />
				<span>移动电话:</span><input type="text" name="phone" value="<?php echo $_SESSION['users']['phone']; ?>" /><br />
				<span>当地邮编:</span><input type="text" name="code" value="<?php echo $_SESSION['users']['code']; ?>" /><br />
				<span>收货地址:</span><textarea name="address"><?php echo $_SESSION['users']['address']; ?></textarea><br />
			</div>
			
			<div class="pay">
				<p><strong><font size="2">支付及配送方式</font></strong></p>
				货到付款<br />中小件由360Top快递配送
			</div>
			</div>
		</div>
		
		<div class="my_cart">
			<span>商品清单</span>
			<div class="cart_list">
				<table border="0">
					<tr class="tr1">
						<td>&nbsp;</td>
						<td class="tit2">商品</td>
						<td class="tit3">库存</td>
						<td class="tit4">价格</td>
						<td class="tit5">数量</td>
						<td class="tit6">小计</td>
					</tr>
					<?php
						//购物车中有商品了，遍历出商品信息
						$total = "";//总价格
						$num = "";//总数量
						foreach($_SESSION['cart'] as $cart){
						
							echo "<tr class='tr2'>";
						
							echo "<td><a href='./detail.php?id={$cart['id']}' target='_blank'><img src='../public/uploads/s_{$cart['picname']}' /></a></td>";
							echo "<td align='left'><a href='./detail.php?id={$cart['id']}' target='_blank'>{$cart['goods']}</a></td>";
							echo "<td>{$cart['store']}</td>";
							echo "<td>￥{$cart['price']}</td>";
							echo "<td class='rnum'>";
							echo $cart['count'];
							echo "</td>";
							echo "<td>￥".$sub = ($cart['count']*$cart['price'])."</td>";
							
							echo "</tr>";
							
							$total += $sub;
							$_SESSION['total'] = $total;
							
							$num += $cart['count'];
							$_SESSION['num'] = $num;
						}
					?>
					<tr class="tr3">
						<td colspan="4"></td>
						<td align="center"><span color="red" size="5px">共 <?php echo $num; ?> 件商品</span></td>
						<td align="center"><span color="red" size="5px">应付总额: ￥<?php echo $total;?></span></td>
					</tr>
				</table>
				<div class="cart_sub">
					
					<ul>
						<li class="float1"><a href="javascript:void(0);" onclick="window.history.back();" ><div class="goon">返回</div></a></li>
						<li class="float2"><input class="account" type="submit" name="sub" value="保存信息" /></li>
					</ul>
			</form>
				</div>
				
			</div>
		</div>
	
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>