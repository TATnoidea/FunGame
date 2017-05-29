<?php
/*是否有管理员*/
require_once '../lib/upload.func.php';
function checkStrategy($sql){
    return fetchOne($sql);
}

/*添加管理员*/
function addStrategy(){
    $arr=$_POST;
    $path="./images/strategy";
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

    if(!insert("strategy",$arr)){
        $mes="添加成功!<br/><a href='addStrategy.php'>继续添加</a>|<a href='listStrategy.php'>查看攻略列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addStrategy.php'>重新添加</a>";
    }
    return $mes;
}

/*获取所有游戏*/
function getAllStrategy(){
    $sql = "select id,strategy_tit,strategy_pre,pic,strategy_content from strategy";
    $rows=fetchAll($sql);
    return $rows;
}

function getStrategyByPage($page,$pageSize=5){
    $sql="select * from strategy";
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
    $sql="select id,strategy_tit,strategy_pre,pic,strategy_content from strategy limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
/**编辑游戏*/
function editStrategy($id){
    $arr=$_POST;
    $path="./images/strategy";
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
    if(update('strategy',$arr,"id={$id}")){
        $mes="编辑成功！<a href='listStrategy.php'>查看攻略列表</a>";
    }else{
        $mes="编辑失败！";
    }
    return $mes;
}
/*删除游戏*/
function delStrategy($id){
    if(!delete("strategy","id={$id}")){
        $mes="删除成功！<a href='listStrategy.php'>查看攻略列表</a>";
    }else{
        $mes="删除失败！<a href='listStrategy.php'>请重新删除</a>";
    }
    return $mes;
}
function getIndexStrategy(){
    $sql = "select id,strategy_tit,strategy_pre,pic,strategy_content from strategy limit 3";
    $rows = fetchAll($sql);
    return $rows;
}