<?php
	require('../common/session.php');

	if(empty($_SERVER['HTTP_REFERER'])){
		die('非法请求');
	}
	
	/* 判断是否为添加操作 */
	if(isset($_POST['sub']) && $_GET['act']=='add'){
		$pid = $_POST['pid'];//select的name值
		$cname = $_POST['cname'];
		
		if(empty($cname)){
			echo '<center>分类名称不能为空! <a href="./add.php">返回</a></center>';
			exit;
		}
		
		include "../../public/dbConfig.php";
		include "../../public/mysql_conn.php";
		
		//如果上级分类id即pid为0,则路径为0即根分类
		if($pid == 0){
			$path = 0;
		}else{
			//查询出上级分类的路径，上级分类的id为当前分类的pid
			$sql = "SELECT path FROM channel where id = {$pid}";
			$res = mysql_query($sql);
			if($res && mysql_num_rows($res)){
				$row = mysql_fetch_assoc($res);
				//拼接成当前分类的路径
				$path = $row['path'].'_'.$pid;
			}
		}
		$sql = "INSERT INTO channel(cname,pid,path) VALUES('{$cname}','{$pid}','{$path}')";
		$res = mysql_query($sql);
		if($res && mysql_affected_rows()){
			echo "<script>window.location.href='./list.php'</script>";
		}
	}

	
	/* 判断是否为修改操作 */
    /* if($_GET['act'] == 'mod' && isset($_POST['sub'])){
 		//接收当前分类的参数
		$id = $_POST['id'];
		$pid = $_POST['pid'];
		$cname = $_POST['cname'];
		
		//载入数据库配置和连接文件
		include "../../public/dbConfig.php";
		include "../../public/mysql_conn.php";
		
		$s = "SELECT path FROM channel where id = {$id}";
		$r = mysql_query($s);
		if($s && mysql_num_rows($r)){
			$path = mysql_fetch_assoc($r);
			//当前分类下的子类的path
			$spath = $path.'_'.$id;
		}
		
		//查询出移动至的上级分类的path
		$sql = "SELECT path FROM channel where id = {$pid}";
		$res = mysql_query($sql);
		if($res && mysql_num_rows($res)){
			$ppath = mysql_fetch_assoc($res);
		}
		
		if($pid == 0){
			$xpath = '0';
		}else{
			$xpath = $ppath['path'].'_'.$pid;
		}
		
		//先更改当前分类的信息
		$up = "UPDATE channel set cname='{$cname}',pid={$pid},path={$xpath} where id={$id}";
		
		$result = mysql_query($up);
		
		if($result && mysql_affected_rows()){
			$xpath = $ppath['path'].'_'.$pid;
			$ppath = $xpath['path'].'_'.$id;//连接成path需要的格式
			$up2 = "UPDATE channel set path=replace(path,'{$spath}','{$ppath}') where path like '{$spath}%'";
			
			echo $up2;exit;
			$result2 = mysql_query($up2);
			if(mysql_affected_rows()){
				header('location:./list.php;');
			}
		}else{
			echo '没有改数据!<a href="./list.php">返回</a>';
		}
	} */
	
	if($_GET['act'] == 'mod' && isset($_POST['sub'])){
		//载入数据库配置和连接文件
		include "../../public/dbConfig.php";
		include "../../public/mysql_conn.php";
	
	    $sql = "SELECT pid,path FROM channel WHERE id = {$_POST['id']}";//查询出要移动的分类path
        $res = mysql_query($sql);
        $spath = mysql_fetch_assoc($res);	
		
		$spath = $spath['path'].'_'.$_POST['id'];
	
		

	    $psql = "SELECT id,path FROM channel WHERE id = {$_POST['pid']}";//查询出父栏目的id和path
        $pres = mysql_query($psql);
		$ppath = mysql_fetch_assoc($pres);

		if($_POST['pid'] == 0){
			$xpath = '0';
		}else{
			$xpath = $ppath['path'].'_'.$_POST['pid'];
		}

        $sql = "UPDATE channel SET cname='{$_POST['cname']}',pid={$_POST['pid']},path='{$xpath}' WHERE id = {$_POST['id']}";    //更新栏目的标题和pid

		mysql_query($sql);

        if(mysql_affected_rows()){
			$xpath = $ppath['path'].'_'.$_POST['pid'];
			$ppath = $xpath['path'].'_'.$_POST['id'];//连接成path需要的格式
            $up = "UPDATE channel SET path = replace(path,'{$spath}','{$ppath}') WHERE path like '{$spath}%'";//直接使用mysql的替换函数进行path字段的替换,把所有的子分类也同时替换
			mysql_query($up);
            if(mysql_affected_rows()){
                header('Location:./list.php');
            }
			header('location:./list.php');
        }else{
			header('location:./list.php');
		}
    }
	
	if($_GET['act']=='del'){
		include "../../public/dbConfig.php";
		include "../../public/mysql_conn.php";
		$sql = "delete from channel where id = {$_GET['id']}";
		mysql_query($sql);
		if(mysql_affected_rows()){
			header('location:./list.php');
		}else{
			echo '失败';
		}
	}