<?php
/*获取所有评论*/
function getAllCommit(){
    $sql = "select id,commit,u_id,commit_time from news_commit";
    $rows=fetchAll($sql);
    return $rows;
}

function getNewsCommitByPage($page,$pageSize=5){
    $sql="select * from news_commit";
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
    $sql="select id,commit,u_id,commit_time from news_commit limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
function getReviewCommitByPage($page,$pageSize=5){
$sql="select * from review_commit";
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
    $sql="select id,commit,u_id,commit_time from review_commit limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
function getVideoCommitByPage($page,$pageSize=5){
    $sql="select * from videos_commit";
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
    $sql="select id,commit,u_id,commit_time from videos_commit limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
function getStrategyCommitByPage($page,$pageSize=5){
    $sql="select * from strategy_commit";
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
    $sql="select id,commit,u_id,commit_time from strategy_commit limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}

/*删除用户*/
function delNewsCommit($id){
    if(!delete("news_commit","id={$id}")){
        $mes="删除成功！<a href='listNewsCommit.php'>查看新闻评论列表</a>";
    }else{
        $mes="删除失败！<a href='listNewsCommit.php'>请重新删除</a>";
    }
    return $mes;
}
function delReviewCommit($id){
    if(!delete("review_commit","id={$id}")){
        $mes="删除成功！<a href='listReviewCommit.php'>查看测评评论列表</a>";
    }else{
        $mes="删除失败！<a href='listReviewCommit.php'>请重新删除</a>";
    }
    return $mes;
}
function delStrategyCommit($id){
    if(!delete("strategy_commit","id={$id}")){
        $mes="删除成功！<a href='listStrategyCommit.php'>查看攻略评论列表</a>";
    }else{
        $mes="删除失败！<a href='listStrategyCommit.php'>请重新删除</a>";
    }
    return $mes;
}
function delVideoCommit($id){
    if(!delete("videos_commit","id={$id}")){
        $mes="删除成功！<a href='listVideoCommit.php'>查看视频评论列表</a>";
    }else{
        $mes="删除失败！<a href='listVideoCommit.php'>请重新删除</a>";
    }
    return $mes;
}
