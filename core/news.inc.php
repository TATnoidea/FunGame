<?php
/*是否有管理员*/
require_once '../lib/upload.func.php';
function checkNews($sql){
    return fetchOne($sql);
}

/*添加管理员*/
function addNews(){
    $arr=$_POST;
    $path="./images/news";
    $fileInfo=$_FILES['pic'];
    uploadFile($fileInfo,$path);
    $arr['pic']=$_FILES['pic']['name'];
    /* if(is_array($uploadFiles)&&$uploadFiles){
         foreach($uploadFiles as $key=>$uploadFile){
             thumb("../images".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
             thumb("../images".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
             thumb("../images".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
             thumb("../images".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
         }
     }*/
    //$sql=insert("news",$arr);
    if(!insert("news",$arr)){
        $mes="添加成功!<br/><a href='addNews.php'>继续添加</a>|<a href='listNews.php'>查看新闻列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addNews.php'>重新添加</a>";
    }
    return $mes;
}

/*获取所有游戏*/
function getAllNews(){
    $sql = "select id,news_tit,news_pre,pic,news_content from news";
    $rows=fetchAll($sql);
    return $rows;
}

function getNewsByPage($page,$pageSize=5){
    $sql="select * from news";
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
    $sql="select id,news_tit,news_pre,pic,news_content from news limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
/**编辑游戏*/
function editNews($id){
    $arr=$_POST;
    $path="./images/news";
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

    //$sql=update('news',$arr,"id={$id}");
    if(update('news',$arr,"id={$id}")){
        $mes="编辑成功！<a href='listNews.php'>查看新闻列表</a>";
    }else{
        $mes="编辑失败！";
    }
    return $mes;
}
/*删除游戏*/
function delNews($id){
    if(!delete("news","id={$id}")){
        $mes="删除成功！<a href='listNews.php'>查看新闻列表</a>";
    }else{
        $mes="删除失败！<a href='listNews.php'>请重新删除</a>";
    }
    return $mes;
}
function getIndexNews(){
    $sql = "select id,news_tit,news_pre,pic,news_content from news where id in(29,33,34,37,36)";
    $rows = fetchAll($sql);
    return $rows;
}
function getBigNews(){
    $sql= "select id,news_tit,news_pre,pic,news_content from news where id=35";
    $rows=fetchOne($sql);
    return $rows;
}
function getSmallNews1(){
    $sql = "select id,news_tit,news_pre,pic,news_content from news where id=32";
    $rows = fetchOne($sql);
    return $rows;
}
function getSmallNews2(){
    $sql = "select id,news_tit,news_pre,pic,news_content from news where id=38";
    $rows = fetchOne($sql);
    return $rows;
}