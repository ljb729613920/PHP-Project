<?php
namespace frame\core;

class Thumb{
	/**
	 * /封装缩略图
	 * @param  string $src 图片的路径
	 * @param  array $img_width图布的宽度/$img_height图布的宽度/$path 保存的路径/$prefix文件名的前缀
	 * @return       返回一个图片
	 */
	public function thumb($src,$arr){
		extract($arr);
		$imgDest=imagecreatetruecolor($img_width,$img_height);
		$bg=imagecolorallocate($imgDest,250,250,250);
		imagefill($imgDest,0,0,$bg);

		$info=getimagesize($src);
		$s_w=$info[0];
		$s_h=$info[1];
		$imgSrc=self::img($src);

	 	$f_h=$s_h*min($img_width/$s_w,$img_height/$s_h);
	 	$f_w=$s_w/$s_h*$f_h;

		$dst_x=($img_width-$f_w)/2;
		$dst_y=($img_height-$f_h)/2;

		imagecopyresampled($imgDest,$imgSrc, $dst_x, $dst_y, 0, 0,$f_w,$f_h, $s_w, $s_h);
		// 编写缩略图保存位置
		$filename=$path.'/'.$prefix.pathinfo($src,PATHINFO_BASENAME);
		if(imagejpeg($imgDest,$filename)){
			return $prefix.pathinfo($src,PATHINFO_BASENAME);
			exit;
		}else{
			return false;
		}
	}

	private static function img($filename){
		$info=getimagesize($filename);
		switch ($info['mime']) {
			case 'image/png':
				$img=imagecreatefrompng($filename);
				break;
			case 'image/gif':
				$img=imagecreatefromgif($filename);
				break;
			default:
				$img=imagecreatefromjpeg($filename);
				break;
		}
		return $img;
	}

}
