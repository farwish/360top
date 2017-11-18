<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 购物车</title>
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/cart.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
    <script>
		function delCheck(){
			return confirm('您确定删除此商品吗?');
		}
	</script>
	</head>
    <body>
		<!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
		
		
		<div class="shop_tip">
			<div class="tip_pic">
				<ul>
					<li>1.我的购物车</li>
					<li>2.填写核对订单</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
		
		<div class="my_cart">
			<span>我的购物车</span>
			<?php
				if(empty($_SESSION['cart'])){
			?>
				<div class="empty_list">
				Oh, Its empty ! 购物车内暂时没有商品，您可以<a href="./index.php">去首页</a>挑选喜欢的商品
				</div>
			<?php
				}else{
					
				
			?>
			<div class="cart_list">
				<form action="./cartaction.php?act=del" method="post">
				<table border="0">
					<tr class="tr1">
						<td class="tit0">选择</td>
						<td class="tit1">&nbsp;</td>
						<td class="tit2">商品</td>
						<td class="tit3">库存</td>
						<td class="tit4">价格</td>
						<td class="tit5">数量</td>
						<td class="tit6">小计</td>
						<td class="tit7">操作</td>
					</tr>
					<?php
						//购物车中有商品了，遍历出商品信息
						$total = "";//总价格
						$num = "";//总数量
						foreach($_SESSION['cart'] as $cart){
						
							echo "<tr class='tr2'>";
							echo "<td><input type='checkbox' name='ids[]' value='{$cart['id']}'/></td>";
							echo "<td><a href='./detail.php?id={$cart['id']}' target='_blank'><img src='../public/uploads/s_{$cart['picname']}' /></a></td>
							<td align='left'><a href='./detail.php?id={$cart['id']}' target='_blank'>{$cart['goods']}</a></td>";
							echo "<td>{$cart['store']}</td>";
							echo "<td>￥{$cart['price']}</td>";
							echo "<td class='rnum'>";
								if($cart['count'] > 1){//购物车中数据修改在其他页面，与详情页的不同，传动作、id、加减的值
									echo "<a href='./cartaction.php?act=mod&id={$cart['id']}&num=-1'>-</a>";
								}else{
									echo "<a href='javascript:void(0);'>-</a>";
								}
								echo $cart['count'];
								echo "<a href='./cartaction.php?act=mod&id={$cart['id']}&num=1'>+</a>";
							echo "</td>";
							echo "<td>￥".$sub = ($cart['count']*$cart['price'])."</td>";
							echo "<td><a href='./cartaction.php?act=del&id={$cart['id']}' onclick='return delCheck();'>删除</a></td>";
							echo "</tr>";
							
							$total += $sub;
							$_SESSION['total'] = $total;
							
							$num += $cart['count'];
							$_SESSION['num'] = $num;
						}
					?>
					<tr class="tr3">
						<td colspan="5"><input type="image" name="sub" value="删除所选商品" onclick="return delCheck();"/></td>
						<td align="center"><span color="red" size="5px">共 <?php echo $num; ?> 件商品</span></td>
						<td align="center"><span color="red" size="5px">总计: ￥<?php echo $total;?></span></td>
						<td>&nbsp;</td>
					</tr>
					
				</table>
				</form>
				<div class="cart_sub">
					<form action="ordercheck.php">
					<ul>
						<li class="float1"><a href="javascript:void(0);" onclick="window.history.back();" ><div class="goon">继续购物</div></a></li>
						<li class="float2"><input class="account" type="submit" name="sub" value="去结算" /></li>
					</ul>
					</form>
				</div>
				
			</div>
			<?php
				}
			?>
		</div>
	
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
	</body>
</html>