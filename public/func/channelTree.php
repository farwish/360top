<?php
	/**
	*	无限分类使用，分层显示栏目树
	*	@param $pid int	上级分类栏目的id
	*	@param	return $str string 返回值
	*/

	function channelTree($pid=''){
		//根据path连接id后的信息,查询出分类信息并保持对应关系(关键点)
		$sql = "SELECT id,cname,pid,path FROM channel ORDER BY concat(path,'_',id)";
		$res = mysql_query($sql);
		$str = "";
		$str .= "<select name='pid'>";
		$str .= "<option value='0'>-- 根分类 --</option>";
		if($res && mysql_num_rows($res)){
			while($row = mysql_fetch_assoc($res)){
				$format = "";
				$nbsp = "";
				$count = substr_count($row['path'],'_');//根据path判断是几级分类
				if($count != 0){//默认根分类path为0，没有缩进标示
					$format = str_repeat("|--",$count);//是几级分类就在前面重复出现几次缩进标示
					$nbsp = "&nbsp;&nbsp;";//子类前都加个空格
				}
				
				if($pid == $row['id']){//如果上级分类与当前分类id相等，则选中
					$selected = 'selected';
				}else{
					$selected = '';
				}
				
				$str .= "<option value='{$row['id']}' {$selected} >{$nbsp}{$format}{$row['cname']}</option>";
			}
		}
		$str .= "</select></br />";
		return $str;
	}