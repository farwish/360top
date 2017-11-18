<? 
	session_start();
	/** 
	*		自定义验证码函数myVcode();
	*	@param  int $width	传入一个验证码的宽度
	*	@param	int $height	传入一个验证码的高度
	*	@param	int	$len	传入一个验证码的字符数
	*	@param	int	$size	传入一个验证码的字符大小值
	*	以上参数不传，默认依次为100,30,4,20
	*/
	function myVcode($width=100, $height=30, $len=4, $size=20){
		//给出验证码随机的字符串范围
		$str = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';

		//1.创建画布
		$img = imagecreatetruecolor($width, $height);

		//2.分配颜色
		for($i=0; $i<10; $i++){
			$color[] = imagecolorallocate($img, mt_rand(150, 255), mt_rand(150, 255), mt_rand(150, 255));
		}
		for($i=0; $i<5; $i++){
			$darkColor[] = imagecolorallocate($img, mt_rand(0, 10), mt_rand(0, 10), mt_rand(0, 10));
		}

		$bg = imagecolorallocate($img, 255, 255, 255);
		//$bg = imagecolorallocate($img, mt_rand(180, 255), mt_rand(180, 255), mt_rand(180, 255));

		//3.绘制图像

		//填充背景颜色
		imagefill($img, 0, 0, $bg);

		//画一矩形
		//imagerectangle($img, 0, 0, $width-1, $height-1, $darkColor);

		//添加随机干扰元素点
		for($i=0; $i<100; $i++){
			imagesetpixel($img, mt_rand(1, $width-1), mt_rand(1, $height-1), $darkColor);
		}
		//添加随机干扰线
		for($i=0; $i<5; $i++){
			imageline($img, mt_rand(2, $width-1), mt_rand(2, $height-1), mt_rand(2, $width-1), mt_rand(2, $height-1), $color[mt_rand(0,9)]);
		}
		//添加随机干扰圆弧
		for($i=0; $i<3; $i++){
			imagearc($img, mt_rand(1, $width-1), mt_rand(1, $height-1), mt_rand(1, $width/2), mt_rand(1, $height/2), mt_rand(0, 365), mt_rand(0, 365), $color[mt_rand(0,9)]);
		}
		//写字，随机抽取四个拼接成字符串
			//注：先画一个水平的字符，然后计算合适的高度位置，和间距位置，调整完位置后，随机字符的角度
        for($i=0; $i<$len; $i++){
            $code = $str[mt_rand(0,strlen($str)-1)];//循环一次，随机生成一个字符
            $vcode .= $code;                        //循环四次，将生成的四个字符连成四位字符
            imagettftext($img, $size, mt_rand(-30,30), 5+$i*($width/$len), ($height/2)+$size/2, $darkColor[mt_rand(0,2)], 'SIMLI.ttf', $code);
		}
		//imagettftext($img, size, angle, x, y, color, fontfile, text)
            
        //将验证码字符存入session
        $_SESSION['vcode'] = $vcode;

		//4.设置header头
		header('content-type:image/png');

		//5.输出图象
		imagepng($img);

		//6.销毁资源
		imagedestroy($img);
	}
myVcode(85, 28, 4, 15);

?>
