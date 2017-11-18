<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 商品详情</title>
		<link rel="stylesheet" style="text/css" href="./common/css/header.css" />
		<link rel="stylesheet" style="text/css" href="./common/css/detail.css" />
		<link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
    </head>
    <body>
        <!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->
		
		<div class="w">
			<div class="crumb">
				<?php
					//接收商品id号
					$id = $_GET['id'];
					
					if(empty($id)){
						echo "<script>window.location.href='./index.php';</script>";
					}
					
					//查询出商品信息
					$sql = "SELECT * FROM goods where id = {$id}";
					$res = mysql_query($sql);
					if($res && mysql_num_rows($res)){
						$goods = mysql_fetch_assoc($res);
					}
					
						//浏览历史：载入商品详情页后，将此商品id存入当前session中，在其他页面遍历
					$_SESSION['notes'][$id] = $goods;
						//浏览历史大于5条时随机清空一条浏览历史
					if(count($_SESSION['notes'])>5){
						$key = array_rand($_SESSION['notes']);//随机返回一个键名
						unset($_SESSION['notes'][$key]);//销毁这个键名对应session
					}
					
					//通过cid查到当前分类，查询出根分类
					$psql = "SELECT * FROM channel where id = {$goods['cid']}";
					$pres = mysql_query($psql);
					if($pres && mysql_num_rows($pres)){
						$channel = mysql_fetch_assoc($pres);
					}
					
					$ppsql = "SELECT * FROM channel where id = {$channel['pid']}";
					$ppres = mysql_query($ppsql);
		
					if(!$ppres){
						echo "<script>alert('指定的分类不存在');</script>";
						echo "<script>window.location.href='./index.php';</script>";
					}else{
						$ppchan = mysql_fetch_assoc($ppres);
					}
					
					echo "<a href='./index.php' title='首页'>首页</a> > <a href='./list.php?id={$ppchan['id']}'>{$ppchan['cname']}</a> > <a href='./list.php?id={$channel['id']}'>{$channel['cname']}</a> > <a href='./detail.php?id={$goods['id']}'>{$goods['goods']}</a>";
				?>
			</div>
		</div>
		
		<div class="w">
			<div class="detail">
				<div class="preview">
					<div class="pp">
						<div class="icon_top"></div>
						<div class="icon_list">
							<ul>
								<li><img src="../public/uploads/<?php echo $goods['picname'];?>" /></li>
								<li><img src="../public/uploads/<?php echo $goods['picname'];?>" /></li>
								<li><img src="../public/uploads/<?php echo $goods['picname'];?>" /></li>
								<li><img src="../public/uploads/<?php echo $goods['picname'];?>" /></li>					
								<li><img src="../public/uploads/<?php echo $goods['picname'];?>" /></li>					
							</ul>
						</div>
						<div class="icon_bottom"></div>
					</div>
					<div class="b_pic">
						<img src="../public/uploads/<?php echo $goods['picname']; ?>" />
					</div>
				</div>
				
				<div class="summary">
					<div class="g_name"><span><?php echo $goods['goods']; ?></span></div>
					<div class="g_item">
						<ul><li class="i_1">商品编号 ：</li><li><?php echo $goods['id']; ?></li></ul>
					</div>
					<div class="g_item">
						<ul><li class="i_1">价　格 ：</li><li><strong>￥<?php echo $goods['price']; ?></strong></li></ul>
					</div>
					<div class="g_item">
						<ul><li class="i_1">库　存 ：</li><li><?php echo $goods['store']; ?></li></ul>
					</div>
					<div class="g_item">
						<ul><li class="i_1">产　地 ：</li><li><?php echo $goods['company']; ?></li></ul>
					</div>
					<div class="g_item">
						<ul><li class="i_1">查看数 ：</li>
							<li>
							<?php 
								//查询出已有点击次数
								$click = "SELECT clicknum FROM goods where id = {$id}";
								$clickRes = mysql_query($click);
								if($clickRes && mysql_num_rows($clickRes)){
									$clicknum = mysql_fetch_assoc($clickRes);
								}
								//刷新一次网页，值加1，并更新数据库
								$newNum = $clicknum['clicknum']+1;
								$cou = "UPDATE goods set clicknum = {$newNum} where id = {$id}";
								mysql_query($cou);
								if(mysql_affected_rows()){
									echo $newNum;
								}
								
								//数量加减操作(使用session存数值)
								if(empty($_SESSION['goods'][$id]['number'])){
									$_SESSION['goods'][$id]['number'] = 1;//如果不存在，则赋初值1
								}else{
									$_SESSION['goods'][$id]['number'] += $_GET['number'];
								}
								
							?>
							</li>
						</ul>
					</div>
					<div class="g_buy">
						<div class="buy_num">
						<form action="cartaction.php?act=add&id=<?php echo $goods['id']; ?>" method="post">
							<input type="hidden" name="id" value="<?php echo $id; ?>" />
							<ul><li class="i_1">数　量 ：</li>
								<li>
								<?php
									if($_SESSION['goods'][$id]['number'] > 1){
										echo "<a href='./detail.php?id={$id}&number=-1'>-</a>";
									}else{
										echo "<a href='javascript:voild(0);'>-</a>";
									}
								?>
									
									<input type="text" name="count" size="3" value="<?php echo $_SESSION['goods'][$id]['number']; ?>" />
									<a href="./detail.php?id=<?php echo $id; ?>&number=1">+</a>
								</li>
							</ul> 
						</div>
						<div class="buy_msg">
							<ul><li class="i_1">促销信息 ：</li><li>此商品尊享7天无忧退换货服务</li></ul>
						</div>
						<div class="buy_msg">
							<ul><li class="i_1">&nbsp;　　　　　</li><li>该商品参加满减活动，购买活动商品每满1000.0元，可减150.0元现金
</li></ul>
						</div>
						<div class="buy_but">
							<input class="buy_but_icon" type="submit" name="sub" value=" "/>
						</div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 左边分类栏 开始 -->
		<div class="g_all">
			<div class="side_bar">
				
				<div class="last_view">
					<div class="title">
						<span>最近浏览的商品</span>
					</div>
					
					
				<?php
					if(empty($_SESSION['notes'])){
						echo "<div class='notice'>";
						echo 	"<span>暂无最近浏览历史</span>";
						echo "</div>";
					}else{
						//浏览历史session不为空时，遍历session历史信息
						foreach($_SESSION['notes'] as $values){
				?>
					
					<div class="g_notice">
						<div class="g_img"><a href="./detail.php?id=<?php echo $values['id']; ?>"><img src="../public/uploads/m_<?php echo $values['picname']; ?>"></a></div>
						<div class="g_name"><a href="./detail.php?id=<?php echo $values['id']; ?>"><?php echo $values['goods']; ?></a></div>
						<div class="g_price">￥<?php echo $values['price']; ?></div>
					</div>
				<?php	
						}
					}
				?>	
				</div>
			</div>
		
			<!-- 商品描述与评论 -->
			<div class="descr">
				<div class="des">
					<div class="descr_item">商品介绍</div>
				</div>
				<div class="descr_content"><?php echo $goods['descr']; ?></div>
				
				<div class="des">
					<a name="discuss">
					<div class="descr_item">商品评论</div>
					</a>
				</div>
				<?php
					//根据gid 和 评论的状态status 查询出评论内容
					$dis = "SELECT * FROM discuss where gid = {$goods['id']} order by addtime desc limit 10";
					$dres = mysql_query($dis);
					if($dres && mysql_num_rows($dres)){
						while($discuss = mysql_fetch_assoc($dres)){
							//根据uid查出会员名
							$u = "SELECT username FROM users where id = {$discuss['uid']}";
							$r = mysql_query($u);
							if($u && mysql_num_rows($r)){
								$users = mysql_fetch_assoc($r);
							}
							//如果状态为1,显示隐藏提示
							if($discuss['status']==1){
								echo "<div class='des_discuss'>";
								echo "<div class='dis_name'>网友：{$users['username']} <span>".date('Y-m-d H:i:s',$discuss['addtime'])."</span></div>";
								echo "<div class='dis_cont'>根据国家相关法律规定，该条评论不予显示。</div>";
								echo "</div>";			
							}else{//否则正常显示评论
								echo "<div class='des_discuss'>";
								echo "<div class='dis_name'>网友：{$users['username']} <span>".date('Y-m-d H:i:s',$discuss['addtime'])."</span></div>";
								echo "<div class='dis_cont'>{$discuss['content']}</div>";
								echo "</div>";
							}
						}
					}else{
						//没有评论内容显示默认提示
						echo "<div class='des_discuss'>";
						echo "<div class='dis_name' style='border:0;'>- 暂无顾客评论 -<span>商品评论均来自真实顾客，供您参考！</span></div>";
						echo "</div>";
					}
				?>
				<?php
					//1.根据用户id和接收的订单oid; 查询订单status是否为3
					$oid = $_GET['oid'];
					$osql = "SELECT * FROM orders where id = {$oid} and uid = {$_SESSION['users']['id']}";
					$ores = mysql_query($osql);
					if($ores && mysql_num_rows($ores)){
						$orders = mysql_fetch_assoc($ores);
						//如果订单状态为3,继续判断接收的商品id是否评论过
						if($orders['status'] == 3){
							$dsql = "SELECT * FROM discuss where gid = {$id} and uid = {$_SESSION['users']['id']}";
							$dres = mysql_query($dsql);
							if($dres && mysql_num_rows($dres)){
								$discuss = mysql_fetch_assoc($dres);
							}else{//没评论过才显示评论框
				?>
					
						<div class="des_discuss">
							<div class="dis_name">网友：<?php echo $_SESSION['users']['username']; ?></div>
							<form action="action.php?act=discuss" method="post">
								<input type="hidden" name="gid" value="<?php echo $goods['id']; ?>" />
								<input type="hidden" name="uid" value="<?php echo $_SESSION['users']['id']; ?>" />
								<textarea cols="55" rows="3" name="content"></textarea><br />
								<input type="submit" name="sub" value="发表评论" style="color:green;" />
							</form>
						</div>
					
				<?php
							}
						}
					}
				?>
			</div>
		</div>
		<!-- 左边分类栏 结束 -->
	
		 <!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
    </body>
</html>