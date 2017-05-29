<?php 
require_once 'string.func.php';
//通过GD库做验证码

function verifyImage($type=1,$length=4,$pixel=10,$line=2,$sess_name = "verify"){
    session_start();
	//创建画布
	$width = 80;
	$height = 28;
	$image = imagecreatetruecolor ($width,$height);
	$white = imagecolorallocate ($image,255,255,255);
	$black = imagecolorallocate ($image,0,0,0);
	//用填充矩形填充画布
	imagefilledrectangle ($image,1,1,$width-2,$height-2,$white);
	$chars = buildRandomString ($type,$length);
	$_SESSION [$sess_name] = $chars;
	$fontfiles = array ("msyh.ttc","msyhbd.ttc","msyhl.ttc","simhei.ttf","simkai.ttf","simsun.ttc");
	for($i = 0; $i <$length;$i ++) {
		$size = mt_rand (14,18);
		$angle = mt_rand (-15,15);
		$x = 5 + $i * $size;
		$y = mt_rand ( 10,26);
		$fontfile = "../fonts/" . $fontfiles [mt_rand ( 0,count($fontfiles)-1)];
		$color = imagecolorallocate ( $image, mt_rand (50,90), mt_rand (80,200), mt_rand (90,180));
		$text = substr ($chars,$i,1);
		imagettftext ($image,$size,$angle,$x,$y,$color,$fontfile,$text);
	}
	if ($pixel) {
		for($i=0;$i<$pixel;$i++){
			imagesetpixel ($image, mt_rand (0,$width-1),mt_rand(0,$height-1),$black);
		}
	}
	if ($line) {
		for($i=1;$i<$line;$i++) {
			$color = imagecolorallocate ($image,mt_rand (50,90),mt_rand (80,200),mt_rand (90,180));
			imageline ( $image, mt_rand (0,$width-1), mt_rand (0,$height-1),mt_rand (0,$width-1), mt_rand (0,$height-1),$color);
		}
	}
	header ("content-type:image/gif");
	imagegif ($image);
	imagedestroy ($image);
}
/*生成缩略图*/

function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	if(is_null($dst_w)||is_null($dst_h)){
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
	}
	$mime=image_type_to_mime_type($imagetype);
	$createFun=str_replace("/", "createfrom", $mime);
	$outFun=str_replace("/", null, $mime);
	$src_image=$createFun($filename);
	$dst_image=imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
	if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
	}
	$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
	$outFun($dst_image,$dstFilename);
	imagedestroy($src_image);
	imagedestroy($dst_image);
	if(!$isReservedSource){
		unlink($filename);
	}
	return $dstFilename;
}







