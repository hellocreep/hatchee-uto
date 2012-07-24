<?php
class Imagecompression{
	function makePhotoThumb($srcFile,$photo_small)
	{  
		$data = @getimagesize($srcFile);  	
		if($data[0]<$data[1]){
			$out=($data[1]*175)/$data[0];
			$dstW = 175;
			$dstH = $out;
		}else{
			$out=($data[0]*175)/$data[1];	
			$dstW = $out;
			$dstH = 175;
		}
		switch($data[2])
		{  
			case 1: //图片类型，1是GIF图  
			$im = @ImageCreateFromGIF($srcFile);  
			break;  
			case 2: //图片类型，2是JPG图  
			$im = @imagecreatefromjpeg($srcFile);  
			break;  
			case 3: //图片类型，3是PNG图  
			$im = @ImageCreateFromPNG($srcFile);  
			break;  
		 }  

		 $srcW=ImageSX($im);  
		 $srcH=ImageSY($im);  
		 $ni=imagecreatetruecolor($dstW,$dstH);  
		 imagecopyresized($ni,$im,0,0,0,0,$dstW,$dstH,$srcW,$srcH);  
		 ImageJpeg($ni,$photo_small,100);  
		return $photo_small;
	 } 
}
?>