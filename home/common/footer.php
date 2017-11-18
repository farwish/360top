        <!-- 快速链接 开始 -->
        <div id="links">
			<?php
				//查询出所有根分类
				$sql = "SELECT id,cname,pid,path FROM channel where pid=0";
				$res = mysql_query($sql);
				if($res && mysql_num_rows($res)){
					while($channel = mysql_fetch_assoc($res)){
						echo '<dl>';
						echo '<dt><a href="./list.php?id='.$channel['id'].'">'.$channel['cname'].'</a></dt>';
						//查询出根分类下的子分类
						$s = "SELECT id,cname FROM channel where path = '0_{$channel['id']}'";
						$r = mysql_query($s);
						if($r && mysql_num_rows($r)){
							while($son = mysql_fetch_assoc($r)){
								echo '<dd><a href="./list.php?id='.$son['id'].'">'.$son['cname'].'</a></dd>';
							}
						}
						echo '</dl>';
					}
				}
			?>
        </div>
        <!-- 快速链接 结束 -->

        <!-- 服务信息 开始 -->
        <div id="nav_end">
            <div class="nav_mess">
                <div class="mess">
                    <a class='one' href="#">专柜新款</a>
                    <a class="two" href="#">7天无忧退换货</a>
                </div>
                <div class="mess">
                    <a class="one" href="#">欧美同步</a>
                    <a class="two" href="#">211限时送达</a>
                </div>
                <div class="mess">
                    <a class="one" href="#">分享时尚</a>
                    <a class="two" href="#">售后100</a>
                </div>
                <div class="mess">
                    <a class="one" href="#">360top</a>
                    <a class="two" href="#">分期付款</a>
                </div>
            </div>
        </div>
    
        <div id="service">
            <div class="serv">
                <dl class="dl_one">
                    <div class="serv_pic"></div>
                    <dt class="one"><a href="#">新手指引</a></dt>
                    <dt><a href="#">购物流程</a></dt>
                    <dt><a href="#">联系客服</a></dt>
                    <dt><a href="#">会员制度</a></dt>
                    <dt><a href="#">优惠劵使用</a></dt>
                    <dt><a href="#">常见问题</a></dt>
                </dl>
                <dl class="dl_two">
                    <div class="serv_pic"></div>
                    <dt class="one"><a href="#">支付方式</a></dt>
                    <dt><a href="#">在线支付</a></dt>
                    <dt><a href="#">分期付款</a></dt>
                    <dt><a href="#">邮局汇款</a></dt>
                    <dt><a href="#">公司转账</a></dt>
                    <dt><a href="#">发票制度</a></dt>
                </dl>
                <dl class="dl_three">
                    <div class="serv_pic"></div>
                    <dt class="one"><a href="#">配送方式</a></dt>
                    <dt><a href="#">上门自提</a></dt>
                    <dt><a href="#">快递运输</a></dt>
                    <dt><a href="#">商品验货与签收</a></dt>
                </dl>
                <dl class="dl_four">
                    <div class="serv_pic"></div>
                    <dt class="one"><a href="#">售后服务</a></dt>
                    <dt><a href="#">售后政策</a></dt>
                    <dt><a href="#">价格保护</a></dt>
                    <dt><a href="#">退款说明</a></dt>
                </dl>
            </div>
        </div>

        <div id="footer">
            <div class="foot">
                <div class="flinks">
                    <a href="./index.php" target="_blank">首页</a> | <a href="./common/history.php" target="_blank">更新历史</a> | <a href="http://farwish.cnblogs.com" target="_blank">技术博客</a> | <a href="http://farwish.com" target="_blank">官方主页</a> | <a href="http://weibo.com/farwish" target="_blank" >官方微博</a>
                </div>

                <div class="copyright">
                Copyright © <a href="http://www.farwish.com" target="_blank">黑眼诗人</a> <a href="http://php.net" target="_blank"><img style="width:34px;height:17px;" src="./common/images/phplogo.gif" /></a>
                </div>
            </div>
        </div>
	<?php mysql_close(); //关闭数据库连接 ?>