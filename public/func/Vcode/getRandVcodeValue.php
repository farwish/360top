<?php
	/**
	*	自定义获取随机验证码值的函数getRandCodeValue();
	*	@param	int	$len	需传入一个验证码的字符长度
	*	@param	int	$type	传入一个类型值，1代表数字，2代表数字加小写字母，3代表数字加小写字母加大写字母，默认1
	*
	*/
	function getRandCodeValue($len, $type=1){
		$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		//1.定义随机索引的范围
		$pos = 9;
		//2.判断验证码类型
		if($type == 2){
			$pos = 32;
		}else if($type == 3){
			$pos = 57;
		}
		//3.随机获取每个验证码值
		$val = '';
		for($pos=0; $pos<$len; $pos++){
			$val .= $str[rand(0,$pos)];
		}
		//4.返回验证码值
		return $val;
	}
	getRandCodeValue(4);
?>