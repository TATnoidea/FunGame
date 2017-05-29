<?php
/*是否有管理员*/
require_once '../lib/upload.func.php';
function checkVideo($sql){
    return fetchOne($sql);
}

/*添加管理员*/
function addVideo(){
    $arr=$_POST;
    $path="./images/videos";
    $fileInfo=$_FILES['pic'];
    $arr['pic']=$_FILES['pic']['name'];
    uploadFile($fileInfo,$path);
    /* if(is_array($uploadFiles)&&$uploadFiles){
         foreach($uploadFiles as $key=>$uploadFile){
             thumb("../images".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
             thumb("../images".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
             thumb("../images".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
             thumb("../images".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
         }
     }*/
    //$sql=insert("videos",$arr);
    if(!insert("videos",$arr)){
        $mes="添加成功!<br/><a href='addVideo.php'>继续添加</a>|<a href='listVideo.php'>查看视频列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addVideo.php'>重新添加</a>";
    }
    return $mes;
}

/*获取所有游戏*/
function getAllVideo(){
    $sql = "select id,tit,pre,pic,path from videos";
    $rows=fetchAll($sql);
    return $rows;
}

function getVideoByPage($page,$pageSize=5){
    $sql="select * from videos";
    global  $page;
    global $totalRows;
    $totalRows=getResultNum($sql);
    global $totalPage;
    $totalPage=ceil($totalRows/$pageSize);
    if($page<1||$page==null||!is_numeric($page)){
        $page=1;
    }
    if($page>=$totalPage)$page=$totalPage;
    $offset=($page-1)*$pageSize;
    $sql="select id,tit,pre,pic,path from videos limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
/**编辑游戏*/
function editVideo($id){
    $arr=$_POST;
    $path="./images/videos";
    $fileInfo=$_FILES['pic'];
    uploadFile($fileInfo,$path);
    $arr['pic']=$_FILES['pic']['name'];
    /*if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $key=>$uploadFile){
            thumb("../images".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
            thumb("../images".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
            thumb("../images".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
            thumb("../images".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
        }
    }*/

    //$sql=update('videos',$arr,"id={$id}");
    if(update('videos',$arr,"id={$id}")){
        $mes="编辑成功！<a href='listVideo.php'>查看视频列表</a>";
    }else{
        $mes="编辑失败！";
    }
    return $mes;
}
/*删除游戏*/
function delVideo($id){
    if(!delete("videos","id={$id}")){
        $mes="删除成功！<a href='listVideo.php'>查看视频列表</a>";
    }else{
        $mes="删除失败！<a href='listVideo.php'>请重新删除</a>";
    }
    return $mes;
}
function getIndexVideo(){
    $sql = "select id,tit,pre,pic,path from videos limit 3";
    $rows = fetchAll($sql);
    return $rows;
}
function getVideoCommit($id){
    $sql = "select id,u_id,v_id,commit_time,commit from videos where v_id='{$id}'";
}