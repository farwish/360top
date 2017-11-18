		<!-- 顶部登录条 开始 -->
        <div id="bg_top">
            <div class="bg_nav">
                <div class="bg_log">
                    <ul>
					<?php
						date_default_timezone_set('PRC');
						if(!empty($_SESSION['users']['username'])){
					?>
							<li class="bg_list">
							<?php
								$h = date(H);
								if($h < 5){
									echo '凌晨好';
								}else if($h < 9){
									echo '早上好';
								}else if($h < 13){
									echo '中午好';
								}else if($h < 17){
									echo '下午好';
								}else if($h < 19){
									echo '傍晚好';
								}else if($h < 22){
									echo '晚上好';
								}else{
									echo '夜里好';
								}
							?>，<?php echo $_SESSION['users']['username']; ?>！欢迎您来到360top！<span><a href='./action.php?act=logout'> [退出]</a></span>
							</li>
					
					<?php }else{ ?>
					
							<li class="bg_list">您好 , 欢迎来到360top!　<span><a href="./login.php">[请登录]</a> , 新用户?　<a href="./register.php">[免费注册]</a></span></li>
					
					<?php } ?>
                    </ul>
                    <dl>
                        <dd><a href="./personal.php">我的360top</a></dd>
                        <dd><a href="./cart.php">我的购物车 ( 
						<?php 
							//购物车商品数量显示
							$cartNum = "";
							if(!empty($_SESSION['cart'])){
								//遍历购物车内商品数量并相加
								foreach($_SESSION['cart'] as $cart){
									$cartNum += $cart['count'];
								}
								echo $cartNum;
							}else{
								echo 0;
							}
						?> 
						)</a></dd>
                    </dl>

                    <div class="logo"><a href="./index.php"><img src="./common/images/logo.jpg"></a></div>

                    <div class="search">
                        <form action="">
                            <input type="text" class="key" name="title" value="" placeholder="输入商品名"/>
                            <input type="submit" class="btm_search" value="搜索" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 顶部登录条 结束 -->
		
        <!-- 导航条 开始-->
        <div id="nav_header">
            <div class="nav_sum">
                <div class="nav_item"><span><a href="./index.php">首页</a></span></div>
                <div class="nav_item"><span><a href="#">新品</a></span></div>
                <div class="nav_item"><span><a href="#">品牌</a></span></div>
                <div class="nav_line"><span>|</span></div>

				<?php
					//导入数据库文件
					include "../public/dbConfig.php";
					include "../public/mysql_conn.php";
					//查询出所有根分类
					$sql = "SELECT id,cname,pid,path FROM channel where pid=0";
					$res = mysql_query($sql);
					if($res && mysql_num_rows($res)){
						while($channel = mysql_fetch_assoc($res)){
				?>
					<div class="nav_item2"><span><a href="./list.php?id=<?php echo $channel['id']; ?>"><?php echo $channel['cname']; ?></a></span></div>
                <?php
						}
					}
				?>
            </div>
        </div>
        <!-- 导航条 结束 -->
