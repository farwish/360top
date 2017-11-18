<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Add</title>
	</head>
	<body background="../common/images/g_bg.jpg">
		<center>
			<form action="action.php?act=add" method="post">
			
		<?php
			include "../../public/dbConfig.php";
			include "../../public/mysql_conn.php";
			
			//根据path连接id后的信息,查询出分类信息并保持对应关系(关键点)
			$sql = "SELECT id,cname,pid,path FROM channel ORDER BY concat(path,'_',id)";
			$res = mysql_query($sql);
			echo "选择所属上级分类:<select name='pid'>";
			echo "<option value='0'>-- 根分类 --</option>";
			if($res && mysql_num_rows($res)){
				while($row = mysql_fetch_assoc($res)){
					$format = "";
					$nbsp = "";
					$count = substr_count($row['path'],'_');//根据path判断是几级分类
					if($count != 0){//默认根分类path为0，没有缩进标示
						$format = str_repeat("|--",$count);//是几级分类就在前面重复出现几次缩进标示
						$nbsp = "&nbsp;&nbsp;";
					}
					echo "<option value='{$row['id']}'>{$nbsp}{$format}{$row['cname']}</option>";
				}
			}
			echo "</select></br />";
		?>
			分类名称:<input type="text" name="cname" value="" /><br />
			<input type="submit" name="sub" value="添加" />
			</form>
		
		<?php
			mysql_free_result($res);
			mysql_close();
		?>
		</center>
	</body>
</html>