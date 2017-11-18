<?php	
	header('content-type:text/html;charset=utf-8');
	session_start();
	
	if(empty($_SESSION['users']) || $_SESSION['users']['status'] != 0){
		echo '<script>alert("请先登录!");</script>';
		echo '<script>window.location.href="../login.php"</script>';
		exit;
	}
?>