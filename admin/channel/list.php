<?php
	require('../common/session.php');
?>
<style>
	a:hover{
		color:red;
	}
</style>
<table width="500" border="0" align="center">
	<tr bgcolor="#bbb">
	<th>ID</th>
	<th>分类名称</th>
	<th>pid</th>
	<th>path</th>
	<th>操作</th>
	</tr>
<?php
	include('../../public/dbConfig.php');
	include('../../public/mysql_conn.php');

 	$sql = "SELECT id,cname,pid,path FROM channel ORDER BY concat(path,'_',id)";
	
	$res = mysql_query($sql);
	
	if($res && mysql_num_rows($res)){
		while($row=mysql_fetch_assoc($res)){
			$format = "";
			$nbsp = "";
			$count = substr_count($row['path'],'_');//根据path判断是几级分类
			if($count != 0){//默认根分类path为0，没有缩进标示
				$format = str_repeat("|--",$count);//是几级分类就在前面重复出现几次缩进标示
				$nbsp = "&nbsp;&nbsp;";//子类前都加个空格
			}
			echo "<tr bgcolor='#eee'>";
			echo "<td align='center'>{$row['id']}</td>";
			echo "<td>{$nbsp}{$format}{$row['cname']}</td>";
			echo "<td align='center'>{$row['pid']}</td>";
			echo "<td align='center'>{$row['path']}</td>";
			echo "<td align='center'><a href='mod.php?&id={$row['id']}'>修改</a> <a href='action.php?act=del&id={$row['id']}' onclick='return delCheck();'>删除</a></td>";
			echo "</tr>";
		}
	}
	
	
/*  $sql = "SELECT id,cname,pid,path FROM channel ORDER BY concat(path,id)";
	
	$res = mysql_query($sql);

	if($res && mysql_num_rows($res)){
		while($row=mysql_fetch_assoc($res)){
			$disabled = "";
			if($row['pid']==0){
				//如果是跟类别，则选项为disabled
				$disabled = 'disabled';
			}
			
			$m = substr_count($row['path'],"_");//统计path字段中_出现的次数
			$nbsp = str_repeat("&nbsp",$m*2);//重复字符串出现指定次数
			
			echo "<option value='{$row['id']}' {$disabled}>{$nbsp}{$row['cname']}</option>";
		}
	} */

	mysql_free_result($res);
	
	mysql_close();
?>
</table>
<script>
	function delCheck(){
		return confirm('确认删除吗?');
	}
</script>
<?php
/* 	//分层浏览商品类别信息（面包屑导航）
	
	//获取当前位置:
	if($pid > 0){//如果有子分类，获取path信息; 如果等于0就代表根目录，直接输出信息
		$sql = "SELECT path FROM channel where id={$pid}";
		
		$res = mysql_query($sql, $link);
		if(mysql_num_rows($res)){
			$row = mysql_fetch_assoc($res);
			$path = $row['path'].$pid;//将解析出的路径拼装pid组成完整位置，为对应的类别信息
		}
		
	} */
?>