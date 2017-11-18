<?php
	require('../common/session.php');
?>
<!doctype html>	
<html>
	<head>
		<meta charset="utf-8">
		<title>评论管理</title>
		<style>
			a:hover{
				color:red;
			}
		</style>
		<script>
			function delCheck(){
				return confirm("您确定要删除吗?");
			}
			function hideCheck(){
				return confirm("确定要隐藏吗?");
			}
			function displayCheck(){
				return confirm("确定要显示吗?");
			}
		</script>
	</head>
	<body>
		<center>
		<form action="" method="post">
			根据评论状态浏览:
			<select name="st">
				<option value="2" <?php echo $_POST['st'] == 2 ? "selected" : ""; ?>>全部</option>
				<option value="0" <?php echo $_POST['st'] == 0 ? "selected" : ""; ?>>显示</option>
				<option value="1" <?php echo $_POST['st'] == 1 ? "selected" : ""; ?>>隐藏</option>
			</select>
			<input type="submit" name="sub" value="搜索" />
		</form>
		</center>
		
		<table width="95%" align="center">
		<tr bgcolor="#bbb">
		<th>ID</th>
		<th>会员id</th>
		<th>商品id</th>
		<th>评论内容</th>
		<th>发表时间</th>
		<th>状态</th>
		<th>操作</th>
		</tr>
		<?php
		include('../../public/dbConfig.php');
		include('../../public/mysql_conn.php');
		
		
		/* $keyword = $_GET['keyword'];
	if(!empty($keyword)){
		$where = "where name like '%{$keyword}%'";//用于sql语句的查询条件
		$link = "&keyword=".$keyword;//用于分页链接的参数条件
	}else{
		$where = "";
		$link = "";
	} */
	
		$st = isset($_POST['st'])? $_POST['st']:$_GET['st'];
		
		
		if($st==0){
			$where = "where status = 0";
			$link = "&status=0";
		}else if($st==1){
			$where = "where status = 1";
			$link = "&status=1";
		}else if($st==2){
			$where = "";
			$link = "";
		}
	
		$status = array('显示','隐藏');
	
			//1.设置页大小(每页显示条数)
			$pagesize = 8;		
			//2.查询出总条数
			$sql = "SELECT count(*) as c FROM discuss {$where}";
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

		$sql = "SELECT * FROM discuss {$where} order by addtime desc {$limit}";
		$res = mysql_query($sql);
		if($res && mysql_num_rows($res)){
			while($discuss = mysql_fetch_assoc($res)){
				echo "<tr bgcolor='#eee'>";
				echo "<td>{$discuss['id']}</td>";
				echo "<td>[{$discuss['uid']}]";
					//根据uid查询出用户名
				$u = "SELECT username FROM users where id = {$discuss['uid']}";
				$r = mysql_query($u);
				if($r && mysql_num_rows($r)){
					$users = mysql_fetch_assoc($r);
					echo $users['username'];
				}
				
				echo "</td>";
				echo "<td>[{$discuss['gid']}]";
					
					//根据gid查询出商品名
				$g = "SELECT * FROM goods where id = {$discuss['gid']}";
				$gr = mysql_query($g);
				if($g && mysql_num_rows($gr)){
					$goods = mysql_fetch_assoc($gr);
					echo "<a href='../../home/detail.php?id={$discuss['gid']}' target='top'>{$goods['goods']}</a>";
				}
					
				echo "</td>";
				echo "<td>{$discuss['content']}</td>";
				echo "<td width='85px'>".date('Y-m-d H:i:s',$discuss['addtime'])."</td>";
				echo "<td width='40px'>{$status[$discuss['status']]}</td>";
				echo "<td width='75px'>";
				
					//如果评论状态为0则隐藏
				if($discuss['status'] == 0){
					echo "<a href='action.php?act=hide&id={$discuss['id']}' onclick='hideCheck();'>隐藏</a> ";
				}else{
					echo "<a href='action.php?act=display&id={$discuss['id']}' onclick='displayCheck();'>显示 </a>";
				}
				
				echo "<a href='action.php?act=del&id={$discuss['id']}' onclick='return delCheck();'>删除</a></td>";
				echo "</tr>";	
			}
			
			echo "<tr align='center'><td colspan='6'>当前第{$page}页/共{$total}页 本页{$num}条/共{$count}条 <a href='./list.php?page=1{$link}'>首页</a> <a href='./list.php?page={$pre}{$link}'>上一页</a> <a href='./list.php?page={$next}{$link}'>下一页</a> <a href='./list.php?page={$total}{$link}'>末页</a></td></tr>";
		}
		?>
		</table>
	</body>
</html>