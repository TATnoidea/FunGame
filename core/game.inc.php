<?php
/*是否有管理员*/
require_once '../lib/upload.func.php';
function checkGame($sql){
    return fetchOne($sql);
}

/*添加管理员*/
function addGame(){
    $arr=$_POST;
    $arr['game_click']=0;
    $path="./images/games";
    $fileInfo=$_FILES['pic'];
    $arr['pic']=$_FILES['pic']['name'];
    uploadFile($fileInfo,$path);
   /*if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $key=>$uploadFile){
            thumb("../images".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
            thumb("../images".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
            thumb("../images".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
            thumb("../images".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
        }
    }*/


    if(!insert("games",$arr)){
        $mes="添加成功!<br/><a href='addGame.php'>继续添加</a>|<a href='listGame.php'>查看游戏列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addGame.php'>重新添加</a>";
    }
   return $mes;
}

/*获取所有游戏*/
function getAllGame(){
    $sql = "select id,game_name,game_type,game_devepoler,game_publisher,game_platform,game_sell_time,pic,game_score,game_click from games";
    $rows=fetchAll($sql);
    return $rows;
}

function getGameByPage($page,$pageSize=5){
    $sql="select * from games";
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
    $sql="select id,game_name,game_type,game_devepoler,game_publisher,game_platform,game_sell_time,pic,game_score,game_click from games limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
/**编辑游戏*/
function editGame($id){
    $arr=$_POST;
    $path="./images/games";
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
    if(update('games',$arr,"id={$id}")){
        $mes="编辑成功！<a href='listGame.php'>查看游戏列表</a>";
    }else{
        $mes="编辑失败！<a href='editGame.php'>请重新修改</a>";
    }
    return $mes;
}
/*删除游戏*/
function delGame($id){
    if(!delete("games","id={$id}")){
        $mes="删除成功！<a href='listGame.php'>查看游戏列表</a>";
    }else{
        $mes="删除失败！<a href='listGame.php'>请重新删除</a>";
    }
    return $mes;
}
function getIndexGame(){
    $sql = "select id,game_name,game_type,game_devepoler,game_publisher,game_platform,game_sell_time,pic,game_score,game_click from games limit 3";
    $rows = fetchAll($sql);
    return $rows;
}
function getLastGame(){
    $sql = "select id,game_name,game_sell_time,pic from games order by game_sell_time desc limit 5";
    $rows = fetchAll($sql);
    return $rows;
}
function getRecommondGame(){
    $sql = "select id,game_name,game_score,pic from games order by game_score desc limit 5";
    $rows = fetchAll($sql);
    return $rows;
}

