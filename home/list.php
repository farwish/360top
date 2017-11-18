<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 商品列表</title>
    <link rel="stylesheet" style="text/css" href="./common/css/list.css" />
    </head>
    <body>
        <!-- 顶部公用部分 开始 -->
        <?php 
		
			include('./common/header.php'); 
			
			include('../public/func/myPage.php');
		?>
        <!-- 顶部公用部分 结束 -->
		
		<!-- 分类 开始 -->
		<div id="w">
			<div class="crumb">
				<a href="./index.php" title="首页">首页</a>
				<?php
					//接收分类的id
					$id = $_GET['id'];
					
					if(empty($id)){
						echo "<script>window.location.href='./index.php';</script>";
					}
					
					//查询数据库，判断是否pid>0，是否有子类
					$sql = "SELECT id,pid,path,cname FROM channel where id = {$id}";
					$res = mysql_query($sql);
					if($res && mysql_num_rows($res)){
						$channel = mysql_fetch_assoc($res);
					}else{
						echo "<script>alert('指定的分类不存在');</script>";
						echo "<script>window.location.href='./index.php';</script>";
					}
					
					//如果有子类则获取path信息
					if($channel['pid'] > 0){
						//查询出父类信息
						$ssql = "SELECT * FROM channel where id = {$channel['pid']}";
						$rres = mysql_query($ssql);
						if($rres && mysql_num_rows($rres)){
							$scha = mysql_fetch_assoc($rres);
							//输出父类导航
							echo " > <a href='./list.php?id={$scha['id']}'>{$scha['cname']}</a>";
							
							//输出当前分类导航
							echo " > <a href='./list.php?id={$channel['id']}'>{$channel['cname']}</a>";
						}	
					}else{
						//没有子类直接输出导航
						echo " > <a href='./list.php?id={$channel['id']}' title='{$channel['cname']}'>{$channel['cname']}</a>";
					}
				?>
			</div>
			
			<div class="g_all">
				<!-- 左边分类栏 开始 -->
				<div class="side_bar">
					<div class="part">
						<div class="title">
							<span>所有分类</span>
						</div>
						<div class="item">
							<dl>
								<?php
									if($channel['pid'] > 0){
										//查询出父类信息
										$ssql = "SELECT * FROM channel where id = {$channel['pid']}";
										$rres = mysql_query($ssql);
										if($rres && mysql_num_rows($rres)){
											$scha = mysql_fetch_assoc($rres);
											//输出当前所属父类名称
											echo "<dt><a href='./list.php?id={$scha['id']}'>{$scha['cname']}</a>";
											
											//再查询出该父类下所有子分类信息，循环遍历
											$son = "SELECT * FROM channel where pid = {$scha['id']}";
											$sonRes = mysql_query($son);
											if($sonRes && mysql_num_rows($sonRes)){
												while($sonChannel = mysql_fetch_assoc($sonRes)){
													echo "<dd><span></span><a href='./list.php?id={$sonChannel['id']}'>{$sonChannel['cname']}</a></dd>";
												}
											}
											echo "</dt>";
											
											//查询出其他根分类，遍历输出
											$psql = "SELECT * FROM channel where pid = 0 and id !={$channel['id']}";
											$pres = mysql_query($psql);
											if($pres && mysql_num_rows($pres)){
												while($pChannel = mysql_fetch_assoc($pres)){
													echo "<dt><a href='./list.php?id={$pChannel['id']}'>{$pChannel['cname']}</a></dt>";
												}
											}
										}
										
									}else{
										echo "<dt><a href='./list.php?id={$channel['id']}'>{$channel['cname']}</a>";
										//直接查询出该父类下所有子分类信息，循环输出
										$son = "SELECT * FROM channel where pid = {$id}";
											$sonRes = mysql_query($son);
											if($sonRes && mysql_num_rows($sonRes)){
												while($sonChannel = mysql_fetch_assoc($sonRes)){
													echo "<dd><span></span><a href='./list.php?id={$sonChannel['id']}'>{$sonChannel['cname']}</a></dd>";
												}
											}
										echo "</dt>";
										
										//查询出其他根分类，遍历输出
										$psql = "SELECT * FROM channel where pid = 0 and id !={$channel['id']}";
										$pres = mysql_query($psql);
										if($pres && mysql_num_rows($pres)){
											while($pChannel = mysql_fetch_assoc($pres)){
												echo "<dt><a href='./list.php?id={$pChannel['id']}'>{$pChannel['cname']}</a></dt>";
											}
										}
									}
								?>
							</dl>
						</div>
					</div>
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
							<div class="g_img"><a href="./list.php?id=<?php echo $values['id']; ?>"><img src="../public/uploads/m_<?php echo $values['picname']; ?>"></div>
							<div class="g_name"><a href="./list.php?id=<?php echo $values['id']; ?>"><?php echo $values['goods']; ?></a></div>
							<div class="g_price">￥<?php echo $values['price']; ?></div>
						</div>
					<?php	
							}
						}	
					?>	
					</div>
				</div>
				<!-- 左边分类栏 结束 -->
				
				<!-- 右边选择列表 开始 -->
				<div class="right_bar">
					<div class="select">
						<div class="num">
						<?php
							if($channel['pid'] > 0){//不是根分类，则查询出当前分类下所有商品数量（嵌套模糊查询）★
								
								$countSql = "SELECT count(*) as c FROM goods where cid in (SELECT id FROM channel where path like '0_{$id}_%' or id = {$id})";
					
								$countRes = mysql_query($countSql);
								if(mysql_num_rows($countRes)){
									$count = mysql_fetch_assoc($countRes);
									echo "共找到<span> {$count['c']} </span>件商品";
								}
							}else{//是根分类，则查询出根分类下所有商品
								
								$countSql = "SELECT count(*) as c FROM goods where cid in (SELECT id FROM channel where path like '0_{$id}%')";
								$countRes = mysql_query($countSql);
								if(mysql_num_rows($countRes)){
									$count = mysql_fetch_assoc($countRes);
									echo "共找到<span> {$count['c']} </span>件商品";
								}
							}
							
						?>
						</div>
						<!--
						<div class="num_list">
							<div class="trademark">
								<div class="tit">品牌：</div>
								<div class="tit_name">
									<ul>
										<li><a href="#" style="background:#d9c682;">不限</a></li>
										<li><a href="#">ARMANI</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
										<li><a href="#">BALENCIAGA</a></li>
									</ul>
								</div>
							</div>
							<div class="item_list">
								<div class="tit">质地：</div>
								<div class="item_name">
									<ul>
										<li><a href="#" style="background:#d9c682;">不限</a></li>
										<li><a href="#">皮质</a></li>
										<li><a href="#">PVC</a></li>
										<li><a href="#">织物</a></li>
										<li><a href="#">其他</a></li>
									</ul>
								</div>
							</div>
							<div class="item_list">
								<div class="tit">性别：</div>
								<div class="item_name">
									<ul>
										<li><a href="#" style="background:#d9c682;">不限</a></li>
										<li><a href="#">男</a></li>
										<li><a href="#">女</a></li>
									</ul>
								</div>
							</div>
							<div class="item_list">
								<div class="tit">价位：</div>
								<div class="item_name">
									<ul>
										<li><a href="#" style="background:#d9c682;">不限</a></li>
										<li><a href="#">1-1999</a></li>
										<li href="#">2000-3999</a></li>
										<li><a href="#">4000-7999</a></li>
										<li><a href="#">8000-10000</a></li>
										<li><a href="#">10000以上</a></li>
									</ul>
								</div>
							</div>
						</div>
						-->
					</div>
					
					<?php
						//1.设置页大小(每页显示条数)
						$pagesize = 12;		
						//2.查询出总条数(上面查出过)
						$count = $count['c'];				
						//3.计算总页数
						$total = empty($count)?1:ceil($count/$pagesize);					
						//4.获取当前页码
						$page = empty($_GET['page']) ? 1 : $_GET['page'];
						//5.防止越界
						if($page < 1){		
							$page = 1;
						}else if($page > $total){
							$page = $total;
						}
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
						
						//获取当前页条数
					
						//6.组装分页sql语句(limit条件)limit的第一个参数是($page-1)*$pagesize,第二个是$pagesize
						$lim = ($page-1)*$pagesize;
						$limit = "limit {$lim},{$pagesize}";
						//7.执行sql语句
						//8.遍历结果集
			
					?>
					
					<!-- 商品排序 开始 -->
					<div class="g_list">
						<div class="sort">
							<span>排序：</span>
							<div class="new"><a href="./list.php?id=<?php echo $_GET['id']; ?>" style="background:<?php echo $_GET['mysort']==''?'#d9c682':''; ?>;">全部</a></div>
							<div class="new"><a href="./list.php?id=<?php echo $_GET['id']; ?>&mysort=new" style="background:<?php echo $_GET['mysort']=='new'?'#d9c682':''; ?>;">最新到货</a></div>
							<div class="high"><a href="./list.php?id=<?php echo $_GET['id']; ?>&mysort=high" style="background:<?php echo $_GET['mysort']=='high'?'#d9c682':''; ?>;">价格从高到低</a></div>
							<div class="low"><a href="./list.php?id=<?php echo $_GET['id']; ?>&mysort=low" style="background:<?php echo $_GET['mysort']=='low'?'#d9c682':''; ?>;">价格从低到高</a></div>
							<div class="page">
					<?php	echo "<span>{$page}/{$total} <a href='./list.php?id={$id}&page={$next}'>下一页</a></span>"; ?>
							</div>
						</div>

						<div class="g_m">
							<ul>
								<?php
									if($_GET['mysort'] == 'high'){
										$orderby = "order by price desc";
										$mysort = "&mysort=high";
									}else if($_GET['mysort'] == 'low'){
										$orderby = "order by price";
										$mysort = "&mysort=low";
									}else if($_GET['mysort'] == 'new'){
										$orderby = "order by addtime desc";
										$mysort = "&mysort=1";
									}else{
										$orderby = "";
										$mysort = "";
									}
									
									if($channel['pid'] > 0){
										//如果不是跟分类，查询出当前分类和子分类的商品（嵌套模糊查询）★
										$gsql = "SELECT * FROM goods where cid in (SELECT id FROM channel where path like '0_{$id}_%' or id = {$id}) {$orderby} {$limit}";
										$gres = mysql_query($gsql);
										if($gres && mysql_num_rows($gres)){
											while($goods = mysql_fetch_assoc($gres)){
												echo "<li>";
												echo "<div class='g_m_img'><a href='./detail.php?id={$goods['id']}'><img src='../public/uploads/b_{$goods['picname']}'></a></div>";
												echo "<div class='g_m_name'><a href='./detail.php?id={$goods['id']}'>{$goods['goods']}</a></div>";
												echo "<div class='g_m_price'><strong>￥{$goods['price']}</strong></div>";
												echo "</li>";
											}
										}
									}else{
										//如果是根分类，查询出根分类下所有子分类及子子分类（嵌套模糊查询）★
										//$sql = "SELECT id FROM channel where path like '%_{$id}'";嵌套查询时作为条件
										$gsql = "SELECT * FROM goods where cid in (SELECT id FROM channel where path like '0_{$id}%') {$orderby} {$limit}";
										$gres = mysql_query($gsql);
										if($gres && mysql_num_rows($gres)){
											while($goods = mysql_fetch_assoc($gres)){
												echo "<li>";
												echo "<div class='g_m_img'><a href='./detail.php?id={$goods['id']}'><img src='../public/uploads/b_{$goods['picname']}'></a></div>";
												echo "<div class='g_m_name'><a href='./detail.php?id={$goods['id']}'>{$goods['goods']}</a></div>";
												echo "<div class='g_m_price'><strong>￥{$goods['price']}</strong></div>";
												echo "</li>";
											}
										}
									}
								?>
								
							</ul>
							
							<div class="extra">
								<div class="page_num">
								<?php
								
								if($page < 3){
									$start = 1;
								}else{
									$start = $page-2;
								}
								
								if($page < $total-3){
									$end = $page+3;
								}else{
									$end = $total;
								}
								
								echo "<a href='./list.php?id={$id}&page={$pre}{$mysort}' style='margin-right:2px';>上一页</a>";
								
								for($i=$start; $i < $page; $i++){
									echo "<a href='./list.php?id={$id}&page={$i}' style='margin:0 2px;'>{$i}</a>";
								}
								
								echo "<a href='./list.php?id={$id}&page={$i}' style='background:#d9c682;' margin:0 2px;>{$i}</a>";
									
								for($i=$page+1; $i<$end; $i++){
									echo "<a href='./list.php?id={$id}&page={$i}' style='margin:0 2px;'>{$i}</a>";
								}	
									
								echo "<a href='./list.php?id={$id}&page={$next}{$mysort}' style='margin-left:2px;'>下一页</a>";
								?>
								</div>
							</div>
						
						</div>
					</div>
					<!-- 商品排序 结束 -->
					
				</div>
				<!-- 右边选择列表 结束 -->
			</div>
		</div>
		<!-- 分类 结束 -->
		
		<!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
    </body>
</html>