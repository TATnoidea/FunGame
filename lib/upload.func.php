<?php
require_once '../include.php';

//$filename=$_FILES['myFile']['name'];
//$type=$_FILES['myFile']['type'];
//$tmp_name=$_FILES['myFile']['tmp_name'];
//$error=$_FILES['myFile']['error'];
//$size=$_FILES['myFile']['size'];


function uploadFile($fileInfo,$path,$allowExt=array("gif","jpeg","jpg","png"),$maxSize=51200000, $imgFlag=true){
    //$allowExt=array("gif","jpeg","jpg","png");
    $ext=getExt($fileInfo['name']);
    if($fileInfo['error']===UPLOAD_ERR_OK){
        //检测文件的扩展名
        if(!in_array($ext,$allowExt)){
            exit("非法文件类型");
        }
        //校验是否是一个真正的图片类型
        if($imgFlag){
            if(!getimagesize($fileInfo['tmp_name'])){
                exit("不是真正的图片类型");
            }
        }
        //上传文件的大小
        if($fileInfo['size']>$maxSize){
            exit("上传文件过大");
        }
        if(!is_uploaded_file($fileInfo['tmp_name'])){
            exit("不是通过HTTP POST方式上传上来的");
        }
        //$filename=getUniName().".".$ext;
        $filename=$_FILES['pic']['name'];
        if(!file_exists($path)){
            mkdir($path,0777,ture);
        }
        $destination=$path."/".$filename;
        if(is_uploaded_file($fileInfo['tmp_name'])){
            if(move_uploaded_file($fileInfo['tmp_name'],$destination)){
                $mes="文件上传成功";
            }else{
                exit("文件移动失败");
            }
        }
    }else{
        switch($fileInfo['error']){
            case 1:
                $mes="超过了配置文件上传文件的大小";
                break;
            case 2:
                $mes="超过了表单设置的上传文件的大小";
                break;
            case 3:
                $mes="文件部分被上传";
                break;
            case 4:
                $mes="没有文件被上传";
                break;
            case 6:
                $mes="没有找到临时目录";
                break;
            case 7:
                $mes="文件不可写";
                break;
            case 8:
                $mes="由于PHP扩展程序中断文件上传";
                break;
        }
        echo $mes;
    }
}
/*function uploadVideoFile($videoInfo,$path,$allowExt=array("mp4","avi","rmvb","flv"),$maxSize=51200000, $imgFlag=true){
    $ext=getExt($videoInfo['name']);
    if($videoInfo['error']===UPLOAD_ERR_OK){
        //检测文件的扩展名
        if(!in_array($ext,$allowExt)){
            exit("非法文件类型");
        }
        //校验是否是一个真正的图片类型
        if($imgFlag){
            if(!getimagesize($videoInfo['tmp_name'])){
                exit("不是真正的视频类型");
            }
        }
        //上传文件的大小
        if($videoInfo['size']>$maxSize){
            exit("上传文件过大");
        }
        if(!is_uploaded_file($videoInfo['tmp_name'])){
            exit("不是通过HTTP POST方式上传上来的");
        }
        //$filename=getUniName().".".$ext;
        $filename=$_FILES['path']['name'];
        if(!file_exists($path)){
            mkdir($path,0777,ture);
        }
        $destination=$path."/".$filename;
        if(is_uploaded_file($videoInfo['tmp_name'])){
            if(move_uploaded_file($videoInfo['tmp_name'],$destination)){
                $mes="文件上传成功";
            }else{
                $mes="文件移动失败";
            }
        }
    }else{
        switch($videoInfo['error']){
            case 1:
                $MES="超过了配置文件上传文件的大小";
                break;
            case 2:
                $mes="超过了表单设置的上传文件的大小";
                break;
            case 3:
                $mes="文件部分被上传";
                break;
            case 4:
                $mes="没有文件被上传";
                break;
            case 6:
                $mes="没有找到临时目录";
                break;
            case 7:
                $mes="文件不可写";
                break;
            case 8:
                $mes="由于PHP扩展程序中断文件上传";
                break;
        }
    }

}
*/
