<?php
//自定义函数库文件

/**
 * 自定义文件上传处理函数
 * @param array $upfile 获取要上传文件值,如$_FILES['mypic'];
 * @param string $path 指定上传文件的保存目录路径名
 * @param array $typelist 允许的上传文件类型：如array("image/jpeg","image/gif","image/png","image/pjpeg",); 默认空数组表示不受限制
 * @param int $filesize 允许上传文件的大小，默认值-1表示不受限制
 * @return array 返回结果是个数组，其中有两个数组元素
 *		第一个下标是status： 值（布尔类型）为true表示成功，false表示失败
 * 		第二个下标是info：	值为字串类型，成功表示文件名，失败表示原因。
 */
function fileUpload($upfile,$path,$typelist=array(),$filesize=-1){
	//1. 获取上传文件信息，初始化上传信息变量
		//$upfile = $_FILES['mypic'];
		$path = rtrim($path,"/"); //去除右侧多余"/"斜线
		//定义允许的上传文件类型，若为空数组，则表示允许所有
		$typelist = array("image/jpeg","image/gif","image/png","image/pjpeg",); 
		
		//$filesize=-1; //允许上传文件的大小（字节），-1表示不受限制（针对于当前文件上传的约束）
		
		//初始化上传的返回信息
		$res["status"]=false; //表示是否成功
		$res['info']="";	 //表示上传后的信息
		
	//2. 通过错误号,判断上传是否成功
		if($upfile['error']>0){
			switch($upfile['error']){
				case 1:
					$info = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
					break;
				case 2:
					$info = "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";
					break;
				case 3:
					$info = "文件只有部分被上传。";
					break;
				case 4:
					$info = "没有文件被上传。";
					break;
				case 6:
					$info = "找不到临时文件夹。";
					break;
				case 7:
					$info = "文件写入失败。";
					break;
				default:
					$info = "未知错误！";
					break;
			}
			$res['info']=$info;
			return $res;
		}

	//3. 可选：是否过滤上传文件类型
		if(count($typelist)>0){
			if(!in_array($upfile['type'],$typelist)){
				$res['info']="上传文件类型错误！".$upfile['type'];
				return $res;
			}
		}
		
	//4. 可选：是否过滤上传文件大小
		if($filesize>0 && ($upfile['size']>$filesize)){
			$res['info']="文件大小超出[{$filesize}]!";
			return $res;
		}
		
	//5. 随机上传文件名称
		do{
			//随机一个文件名：【时间戳+随机4位数字+"."+源文件后缀名】
			$newname = time().rand(1000,9999).".".pathinfo($upfile['name'],PATHINFO_EXTENSION);
		}while(file_exists($path."/".$newname)); //若存在再次随机
		
	//6. 执行文件上传移动
		//判断是否是一个有效的上传文件
		if(is_uploaded_file($upfile['tmp_name'])){
			//执行移动上传文件
			if(move_uploaded_file($upfile['tmp_name'],$path."/".$newname)){
				$res['info']=$newname;
				$res['status']=true;
			}else{
				$res['info']="移动上传文件失败！";
			}
		}else{
			$res['info']="无效的上传文件！";
		}
		
		return $res;
}


/**
 * 给指定图片进行等比缩放处理，并生成新图片。
 * @param string $image 被处理的原图片名+路径
 * @param string $pre  生成新图片的前缀名，默认为"s_" 若为""（空字串）则覆盖原图
 * @param int $maxwidth 指定缩放后图片最大宽度
 * @param int $maxheight 指定缩放后图片最大高度
 * @return boolean true表示缩放成功
 */
function imageChangeSize($image,$pre="s_",$maxwidth,$maxheight){

	//1. 获取被处理的图片信息
	$info = getimagesize($image);
	
	$width = $info[0];//获取图片的宽600
	$height= $info[1];//高	300
	
	//2.计算缩放后的尺寸
	if($maxwidth/$width <$maxheight/$height){
		$w=$maxwidth;
		$h=$height*($maxwidth/$width);
	}else{
		$h=$maxheight;
		$w=$width*($maxheight/$height);
	}
	
	//3. 创建图片所需的画布
	switch($info[2]){
		case 1: //gif
			$srcim = imagecreatefromgif($image);
			break;
		case 2: //jpg
			$srcim = imagecreatefromjpeg($image);
			break;
		case 3: //png
			$srcim = imagecreatefrompng($image);
			break;
		default:
			die("无效的图片格式");
	}
	$resim = imagecreatetruecolor($w,$h); //创建新图片资源（用于存放缩放后的图片）
	
	//4. 执行缩放
	imagecopyresampled($resim,$srcim,0,0,0,0,$w,$h,$width,$height);
	
	//5.输出图片
	//定义缩放后的新图片名
	$newimage=pathinfo($image,PATHINFO_DIRNAME)."/".$pre.pathinfo($image,PATHINFO_BASENAME);
	switch($info[2]){
		case 1: //gif
			imagegif($resim,$newimage);//图片$resim保存在$newimage
			break;
		case 2: //jpg
			imagejpeg($resim,$newimage);
			break;
		case 3: //png
			imagepng($resim,$newimage);
			break;
	}
	//6 销毁图片资源
	imagedestroy($resim);
	imagedestroy($srcim);
	
	return true;
}