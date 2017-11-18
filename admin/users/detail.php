<?php
	//导入验证登陆文件
	require('../common/session.php');
?>
<style>
	th,td{
		background-color:#eee;
		text-align:center;
		padding-top:5px;
		padding-bottom:5px;
	}
	th{
		width:100px;
	}
</style>
<?php
	//载入数据库配置文件和连接文件
	include('../../public/dbConfig.php');
	
	include('../../public/mysql_conn.php');
	
	//接收参数
	$id = $_GET['id'];
	//准备sql语句

	$sql = "SELECT id,username,truename,sex,address,code,phone,email FROM users where id = ".$id;
	//执行sql语句
	$res = mysql_query($sql);
	//处理结果集
	if($res && mysql_num_rows($res)){
		echo "<table border='0' width='600' align='center'>";
		while(list($id,$username,$truename,$sex,$address,$code,$phone,$email) = mysql_fetch_row($res)){
			echo "<tr>";
			echo "<th>会员ID:</th><td>{$id}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>会员名:</th><td>{$username}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>姓名:</th><td>{$truename}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>性别:</th><td>{$sex}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>地址:</th><td>{$address}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>邮编:</th><td>{$code}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>电话:</th><td>{$phone}</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>邮箱:</th><td>{$email}</td>";
			echo "</tr>";
			echo "<tr><td colspan=2><input type='button' value='返回' onclick='window.history.back();'></td></tr>";
		echo "</table>";
		}
	}
	//释放资源
	mysql_free_result($res);
	//关闭数据库连接
	mysql_close();
?>