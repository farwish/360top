<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>订单浏览</title>
		<style>
			a:hover{
				color:red;
			}
		</style>
		<script>
			function sendCheck(){
				return confirm('确认发货吗?');
			}
			function closeCheck(){
				return confirm('确认关闭订单吗?');
			}
			
			function delCheck(){
				return confirm('确认删除此订单记录吗?');
			}
		</script>
	</head>
    <body>
		<center>
		<p>
		找订单状态：
		<a href="./list.php?status=0<?php echo $linkman; ?>">浏览未确认</a>
		<a href="./list.php?status=1<?php echo $linkman; ?>">浏览已发货</a>
		<a href="./list.php?status=2<?php echo $linkman; ?>">浏览已取消</a>
		<a href="./list.php?status=3<?php echo $linkman; ?>">浏览已完成</a>
		<a href="./list.php">全部</a>
		</p>
		<form action="" method="post">
			查找联系人：<input type="text" name="linkman" value="" size="50px"/>
			<input type="submit" name="sub" value="搜索" />
		</form>
		</center>
		
		<table align="center" width="90%">
			<tr bgcolor="#bbb">
				<th>订单ID</th>
				<th>会员id</th>
				<th>联系人</th>
				<th>地址</th>
				<th>邮编</th>
				<th>电话</th>
				<th>下单时间</th>
				<th>金额</th>
				<th>状态</th>
				<th>详情</th>
				<th>操作</th>
			</tr>
		<?php
			date_default_timezone_set('PRC');
			
			include "../../public/dbConfig.php";
			include "../../public/mysql_conn.php";
			include "../../public/func/myPage.php";
		
			$st = array('<font color="#f90">未确认</font>','<font color="green">已发货</font>','已取消','<font color="#963">已完成</font>');
		
			$status = $_GET['status'];//接收url参数值
			if(array_key_exists($status, $st)){//判断是否是有效参数
				$where = "where status = ".$status;//组装where条件
				$status = "&status=".$status;
			}else{
				$where = "";
				$status = "";
			}
			
			$linkman = isset($_POST['linkman']) ? $_POST['linkman'] : $_GET['linkman'];
			if(!empty($linkman)){
				if(isset($_GET['status'])){
					$wherelinkman = " and linkman like '%{$linkman}%'";
				}else{
					$wherelinkman = "where linkman like '%{$linkman}%'";
				}
				$linkman = "&linkman = ".$linkman;
			}else{
				$wherelinkman = "";
				$linkman = "";
			}
			
			//1.设置页大小(每页显示条数)
			$pagesize = 10;		
			//2.查询出总条数
			$sql = "SELECT count(*) as c FROM orders {$where}";
			$res = mysql_query($sql);
			if(mysql_num_rows($res)){
				$count = mysql_fetch_assoc($res);
				$count = $count['c'];
			}				
			//3.计算总页数
			$total = empty($count)?1:ceil($count/$pagesize);					
			//4.获取当前页码
			$page = $_GET['page'];
			//5.防止越界
			if($page <= 0){		
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
			$num = ($page==$total && $count%$pagesize!=0) ? $count%$pagesize : $pagesize;
			
			//6.组装分页sql语句(limit条件)limit的第一个参数是($page-1)*$pagesize,第二个是$pagesize
			$lim = ($page-1)*$pagesize;
			$limit = "limit {$lim},{$pagesize}";
			//7.执行sql语句
			//8.遍历结果集
			
			$sql = "SELECT * FROM orders {$where}{$wherelinkman} order by addtime desc {$limit}";
			
			$res = mysql_query($sql);
			
			$st = array('<font color="#f90">未确认</font>','<font color="green">已发货</font>','已取消','<font color="#963">已完成</font>');
			
			if($res && mysql_num_rows($res)){
				while($orders = mysql_fetch_assoc($res)){
					echo "<tr bgcolor='#eee' align='center'>";
					echo "<td>{$orders['id']}</td>";
					echo "<td>{$orders['uid']}</td>";
					echo "<td>{$orders['linkman']}</td>";
					echo "<td>{$orders['address']}</td>";
					echo "<td>{$orders['code']}</td>";
					echo "<td>{$orders['phone']}</td>";
					echo "<td>".date('Y-m-d H:i:s',$orders['addtime'])."</td>";
					echo "<td>{$orders['total']}</td>";
					echo "<td>".$st[$orders['status']]."</td>";
					echo "<td><a href='detail.php?id={$orders['id']}'>查看</a></td>";
					echo "<td align='left'>";
					
					if($orders['status'] == 0){
						echo "<a href='./action.php?act=send&id={$orders['id']}' onclick='return sendCheck();'>发货</a> <a href='action.php?act=close&id={$orders['id']}' onclick='return closeCheck();'>取消</a>";
					}
					
					if($orders['status'] == 1){
						echo "待收 <a href='./action.php?act=close&id={$orders['id']}' onclick='return closeCheck();'>取消</a>";
					}
					
					if($orders['status'] == 2){
						echo "<a href='./action.php?act=del&id={$orders['id']}' onclick='return delCheck();'>删除</a>";
					}
					
					if($orders['status'] == 3){
						echo "<a href='./action.php?act=del&id={$orders['id']}' inclick='return delCheck();'>删除</a>";
					}
					echo "</td>";
					echo "</tr>";
				}
				echo "<tr align='center' bgcolor='#eee'><td colspan='11'>当前第{$page}页/共{$total}页 当前{$num}条/共{$count}条 <a href='./list.php?page=1{$status}{$linkman}'>首页</a> <a href='./list.php?page={$pre}{$status}{$linkman}'>上一页</a> <a href='./list.php?page={$next}{$status}{$linkman}'>下一页</a> <a href='./list.php?page={$total}{$status}{$linkman}'>末页</a></td></tr>";
			}
		?>
		</table>
	</body>
</html>