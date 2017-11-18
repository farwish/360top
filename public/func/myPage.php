<?php
	/*得到搜索的关键字或通过链接传过来的关键字
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
	*/
	
/**
*	自定义分页函数(适用于对数据库查询结果的分页,其它可自定义)
*	@param	$table	int		数据库表名
*	@param	&$limit int		limit第一个参数
*	@param	$pagesize	int 页大小，每页显示条数
*	@param	$page		int 当前页
*	@param	$where	string	where条件
* 	@param  $state  string	state条件，备用条件
*	return string 返回分页链接
*/

function page($table, &$limit, $pagesize, $page='', $where='', $state=''){
	
	//1.设置页大小
	
	//2.查询出总条数
	$sql = "SELECT COUNT(*) as c FROM {$table} {$where} {$state}";
	$res = mysql_query($sql);
	if(mysql_num_rows($res)){
		$row = mysql_fetch_assoc($res);
		$count = $row['c'];
	}
	
	//3.计算总页数(进一法取整)
	$pagenum = ceil($count/$pagesize);
	
	//4.获取当前页码
	//	(1)如果$page为空，自动为1
	$page = empty($_GET['page'])?1:$_GET['page'];
	
	//	(2)判断当前页码是否越界(注:链接传参数超出时，这样能显示边界的数据)
	if($page < 1){
		$page = 1;
	}else if($page > $pagenum){
		$page = $pagenum;
	}

	//注:上页和下页之前进行的判断可以让url中page参数显示正确
		//上一页:不是第一页，则显示上一页
	if($page == 1){
		$pre = $page;
	}else{
		$pre = $page - 1;
	}
		//下一页:当前页小于总页数，则显示下一页
	if($page < $pagenum){
		$next = $page + 1;
	}else{
		$next = $pagenum;
	}
	
	//5.获取当前页条数
		//如果是最后一页且取余不为0，则当前页条数为余数，其余为$pagesize
	$pagecount = ($page == $pagenum && $count % $pagesize != 0) ? $count % $pagesize : $pagesize;
	
/*	if($page < $pagenum){//如果不是最后一页
		$pagecount = $pagesize;//当前页条数就为页大小
	}else if($page == $pagenum){//如果是最后一页(上面已经进行过越界判断),整除时当前条数为页大小，不整除时 当前条数为余数
		$pagecount=($count % $pagesize == 0 ? $pagesize : $count % $pagesize);
	}
*/
	
	//limit的第一个参数为:($page - 1) * $pagesize
	$limit = ($page - 1) * $pagesize;
	
	//匹配出关键字
	preg_match('/%(.*?)%/',$where,$arr);
	$keyword = $arr[1];
	
	if(!empty($keyword)){
		$link = '&keyword='.$keyword;
	}else{
		$link = '';
	}

	if(!empty($state)){
		preg_match('/= (.*)/',$state,$array);
		$st = $array[1];
		if(!empty($st)){
			$stat = '&state='.$st;
		}else{
			$stat = '';
		}
	}else{
		$stat = '';
	}

	/*
	//判断当前页是否小于6
	if($_GET['page'] < 6){
		$begin = 1;//当前页小于6，设起始页为1
	}else{
		$begin = $_GET['page'] - 5;//否则起始页为-5
	}
	
	//遍历当前页前几个页面的链接
	for($i=$begin; $i<$_GET['page']; $i++){
		$strPre = "<a href='?page={$i}'>{$i}</a>";
	}
	
	if($_GET['page'] < $pagenum - 5){
		$end = $_GET['page'] + 5;
	}else{
		$end = $pagenum;
	}
	//遍历当前页的后几个页面的链接
	for($i=$_GET['page']+1; $i<$end; $i++){
		$strPre .= "<a href='?page={$i}'>{$i}</a>";
	}
	*/
	
	//6.组装分页的sql语句
	
/*	$sql = "SELECT id,username,password,email,addtime,status FROM users limit {$limit},{$pagesize}";
	
	//7.发送sql语句
	$res = mysql_query($sql);
	
	//8.遍历结果集
	if(mysql_num_rows($res)){
		while($row = mysql_fetch_assoc($res)){
			echo "{$row['id']}--{$row['username']}--{$row['password']}--{$row['email']}--{$row['addtime']}--{$status}.<br />";
		}
	}
*/
	//9.加分页链接
	$str = "第{$page}页/共{$pagenum}页 本页{$pagecount}条/共{$count}条 <a href='?page=1{$link}{$stat}'>首页</a> <a href='?page={$pre}{$link}{$stat}'>上一页</a> <a href='?page={$next}{$link}{$stat}'>下一页</a> <a href='?page={$pagenum}{$link}{$stat}'>尾页</a>";
	//链接的完整字符串,作为字符串返回: 共 条 共 页 本页 条 当前是第 页 首页 上一页 下一页 尾页
	return $str;
}

?>