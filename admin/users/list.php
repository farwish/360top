<?php
	require('../common/session.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			a:hover{
				color:red;
			}
		</style>
	</head>
	<body>
<?php
    //设置时区
    date_default_timezone_set('PRC');

    //载入数据库配置文件 和 数据库连接文件
    include('../../public/dbConfig.php');
    include('../../public/mysql_conn.php');

	//载入分页函数
	include('../../public/func/myPage.php');
	
	//得到搜索的关键字或通过链接传过来的关键字
	$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : $_GET['keyword'];
	if(!empty($keyword)){
		$where = "where username like '%{$keyword}%'";
	}else{
		$where = "";
	}
	$page = $_GET['page'];
	$pagesize = 5;
	$table = 'users';
	$limit = 0;
	//调用函数
	$fpage = page($table, $limit, $pagesize, $page, $where);
	
    //组合sql语句
    $sql = "SELECT id,username,password,email,addtime,status FROM users {$where} ORDER BY id limit {$limit},{$pagesize}";

    //执行sql语句
    $res = mysql_query($sql);
    
    //处理结果集，显示数据

        $status = array( 0 => '<font color="#f90">管理员</font>', 1 => '<font color="green">普通</font>', 2 => '<font color="red">禁用</font>');
        //声明一个数组,数据库中查询出的state值对应自定义的数组下标，显示出自定义的中文含义和颜色，$state[$row['state']]获取，;
?>
	<center>
	<form action="list.php" method="post">
		查找会员名:<input type="text" name="keyword" value="" />
		<input type="submit" value="搜索" />
	</form>
	</center>
    <table width="900px" align="center" border=0>
		<tr bgcolor="#bbb">
			<th>选择</th>
			<th>ID</th>
			<th>会员名</th>
			<th>密码</th>
			<th>注册时间</th>
			<th>状态</th>
			<th>操作</ht>
		</tr>
	
<?php
    if($res && mysql_num_rows($res)){
		echo '<form action="action.php?act=delAll" method="post">';
        while($row = mysql_fetch_assoc($res)){
            echo '<tr align="center" bgcolor="#eee">';
			echo '<td><input type="checkbox" name="ids[]" value='.$row['id'].' /></td>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['password'].'</td>';
            echo '<td>'.date('Y-m-d H:i:s',$row['addtime']).'</td>';
            echo '<td>'.$status[$row['status']].'</td>';
            echo '<td><a href="./detail.php?id='.$row['id'].'">详情</a> <a href="./power.php?id='.$row['id'].'&status='.$row['status'].'">权限</a> <a href="./mod.php?id='.$row['id'].'">修改</a> <a href="./action.php?act=del&id='.$row['id'].'" onclick="return del_confirm()">删除</a></td>';
            echo '</tr>';
        }
		echo "<tr bgcolor='#eee' align='center'>
				<td>
				<input type='submit' name='sub' value='删除所选' />
				</td>
			</form>
			
			<form action='list.php' method='get'>
				<td colspan='7'>{$fpage}	
				<input type='hidden' name='keyword' value={$keyword}>
				<input type='text' name='page' value='' size='4' /><input type='submit' name='sub' value='GO' />
				</td>
			</form>
			</tr>";
    }
?>
	</table>

<script>
    function del_confirm(){
        return confirm('确认删除吗?');
    }    
</script>

<?php
    //关闭数据库连接
    mysql_close();
?>
	</body>
</html>