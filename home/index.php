<?php session_start(); ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>360TOP - 商城演示 | 体验购物流程！</title>
		<meta name="keywords" content="360top,360奢饰品网,360奢饰品网站" />
		<meta name="description" content="这是360top奢侈品网站的演示站，可以注册账号轻松体验购物流程，当然，是没有真实付款和真实发货的。开发者：黑眼诗人，邮箱：farwish(a)live.com，主页：farwish.com"  />
	<link rel="icon" style="image/x-icon" href="./common/images/favicon.ico">
    <link rel="stylesheet" style="text/css" href="./common/css/header.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/global.css" />
    <link rel="stylesheet" style="text/css" href="./common/css/footer.css" />
	<script>
		function addBorder(str){
			var fir = document.getElementById(str);
			fir.style.border='1px solid #963';
		}
		function clearBorder(str){
			var fir = document.getElementById(str);
			fir.style.border='1px solid #ddd';
		}
	</script>
    </head>
    <body>
        <!-- 顶部公用部分 开始 -->
        <?php include('./common/header.php'); ?>
        <!-- 顶部公用部分 结束 -->

        <!-- 展示页 开始 -->
        <div id="goods_show">
            <div class="l_menu">
                <div class="lpart">
					<div class="part1">
						<ul>
						<?php
							$sq = "SELECT id,cname FROM channel where pid = '4' or pid = '5' limit 6";
							$re = mysql_query($sq);
							if($re && mysql_num_rows($re)){
								while($chann = mysql_fetch_assoc($re)){
									echo '<li><a href="./list.php?id='.$chann['id'].'">'.$chann['cname'].'</a></li>';
								}
							}
						?>
						</ul>
					</div>
					
					<div class="part2">
						 <ul>
						 <?php
							$s = "SELECT id,cname FROM channel where pid = '1' or pid = '2' or pid = '3' limit 6";
							$r = mysql_query($s);
							if($r && mysql_num_rows($r)){
								while($ch = mysql_fetch_assoc($r)){
									echo '<li><a href="./list.php?id='.$ch['id'].'">'.$ch['cname'].'</a></li>';
								}
							}
						 ?>
						</ul>
					</div>
                </div>                

                <div class="part3">
                    <ul>
                        <li class="c1">
                            <div style="display:none;">
                                <ul>
                                    <a></a>
                                    <a></a>
                                    <a></a>
                                </ul>
                            </div>
                        </li>

                        <li class="c2">
                            <div></div>
                        </li>

                        <li class="c3">
                            <div></div>
                        </li>

                        <li class="c4">
                            <div></div>
                        </li>

                        <li class="c5">
                            <div></div>
                        </li>
                     
                    </ul>
                </div>
            </div>

            <div class="r_pic">
                <img src="./common/images/360.jpg" />
            </div>

        </div>
        <!-- 展示页 结束 -->

        <!-- 新品 开始-->
        <div id="new_goods">
            <div class="l_menu2">
                <ul>
				<?php
					$sql = "SELECT id,cname,pid,path FROM channel where pid=0 or pid='6'";
					$res = mysql_query($sql);
					if($res && mysql_num_rows($res)){
						while($channel = mysql_fetch_assoc($res)){
						echo '<li><a href="./list.php?id='.$channel['id'].'">'.$channel['cname'].'</a></li>';
						}
					}
				?>
                </ul>
            </div>
            <div class="r_goods">
				<?php 
					//查询出根分类为2的子类（名贵腕表）
					$sql = "SELECT id FROM channel where pid='2'";
					$res = mysql_query($sql);
					if($res && mysql_num_rows($res)){
						while($channel = mysql_fetch_assoc($res)){
							//根据分类id查询出所有商品信息
							$s = "SELECT id,picname FROM goods where cid = {$channel['id']}";
							$r = mysql_query($s);
							if($r && mysql_num_rows($r)){
								while($goods = mysql_fetch_assoc($r)){
									echo '<div class="r_goods_list"><a href="./detail.php?id='.$goods['id'].'"><img width="178px" height="228px" src="../public/uploads/b_'.$goods['picname'].'"></a></div>';
								}
							}
						}
					}
				?>
            </div>
        </div>
        <!-- 新品 结束 -->

        <!-- 推荐商品 开始 -->
        <div id="mt">
            <div class="mt_sign">
                <ul>
                    <li>GUCCI</li>
                    <li>ARMANI</li>
                    <li>PRADA</li>
                    <li>FENDI</li>
                </ul>
            </div>
            <div class="mt_goods">
                <ul>
				<?php
					//查询出根分类为4的子类（配件配饰）
					$sql = "SELECT id FROM channel where pid='4'";
					$res = mysql_query($sql);
					if($res && mysql_num_rows($res)){
						while($channel = mysql_fetch_assoc($res)){
							//根据分类id查询出所有商品信息
							$s = "SELECT id,goods,picname,price FROM goods where cid = {$channel['id']}";
							$r = mysql_query($s);
							if($r && mysql_num_rows($r)){
								while($goods = mysql_fetch_assoc($r)){
									echo '<li>';
									echo '<div class="mt_item">';
									echo 	'<div class="p_img">';
									echo 	'<a href="./detail.php?id='.$goods['id'].'"><img width="210px" height="210px" src="../public/uploads/m_'.$goods['picname'].'" />';
									echo '</div>';
									echo '<div class="p_name"><a href="./detail.php?id='.$goods['id'].'">'.$goods['goods'].'</a></div>';
									echo '<div class="p_price"><strong>￥'.$goods['price'].'</strong></div>';
									echo '</div>';
									echo '</li>';
								}
							}
						}
					}
				?>
                </ul>
            </div>
        </div>

        <div id="ads">
            <ul>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
                <li class="fore1"></li>
            </ul>
        </div>
        <!-- 推荐商品 结束 -->

		<!-- 分类中部展示 结束 -->
		<div class="pitem">
			<?php
				//查询出所有根分类
				$sql = "SELECT id,cname FROM channel where pid = 0";
				$res = mysql_query($sql);
				if($res && mysql_num_rows($res)){
					while($channel = mysql_fetch_assoc($res)){
						$name = chunk_split($channel['cname'],6,'\n');
						$arr = explode('\n',$name);
						
						//有多少根分类就输出多少个ul
						echo '<ul id="fir'.$channel['id'].'" class="fir" onmouseover="addBorder(this.id);" onmouseout="clearBorder(this.id);">';
						echo 	'<li class="fir_fore">';
						echo 		'<div>';
						echo	 	'<h3>'.$arr[0].'<br />'.$arr[1].'</h3>';
						echo	 	'<a href="./list.php?id='.$channel['id'].'"> 查看全部 ></a>';
						echo	 	'</div>';
						echo 	'</li>';
						//查询出所有子分类
						$ch = "SELECT id FROM channel where path='0_{$channel['id']}'";
						$re = mysql_query($ch);
						if($re && mysql_num_rows($re)){
							while($son = mysql_fetch_assoc($re)){
								//查询出所有子分类下的商品
								$g = "SELECT * FROM goods where cid = {$son['id']}";
								$r = mysql_query($g);
								if($r && mysql_num_rows($r)){
									while($goods = mysql_fetch_assoc($r)){
										
										echo '<li class="l_fore">';
										echo '<div class="pp_img"><a href="./detail.php?id='.$goods['id'].'"><img src="../public/uploads/m_'.$goods['picname'].'" /></a></div>';
										echo '<div class="pp_name"><a href="./detail.php?id='.$goods['id'].'">'.$goods['goods'].'</a></div>';
										echo '<div class="pp_price"><strong>￥'.$goods['price'].'</strong></div>';
										echo '</li>';
									}
								}
							}
							
						}
						echo '</ul>';
					}
				}
			?>

			</ul>
		</div>
		
		<div class="mar"></div>
        <!-- 分类中部展示 结束 -->
		
        <!-- 底部公用部分 开始 -->
        <?php include('./common/footer.php'); ?>
        <!-- 底部公用部分 结束 -->
    </body>
</html>