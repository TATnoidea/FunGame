<?php
/*是否有管理员*/
function checkAdmin($sql){
   return fetchOne($sql);
}
/*检查是否有管理员登陆*/
function checkLogined(){
    if(@$_SESSION['adminId']=="" && $_COOKIE['adminId']==""){
        alertMes("请先登录","login.php");
    }
}
/*添加管理员*/
function addAdmin(){
    $arr=$_POST;
    if(!insert("admin",$arr)){
        $mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";    }
    return $mes;
}

/*获取所有管理员*/
function getAllAdmin(){
    $sql = "select id,username from admin";
    $rows=fetchAll($sql);
    return $rows;
}

function getAdminByPage($page,$pageSize=2){
    $sql="select * from admin";
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
    $sql="select id,username from admin limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
/**编辑管理员*/
function editAdmin($id){
    $arr=$_POST;
    if(update('admin',$arr,"id={$id}")){
        $mes="编辑成功！<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="编辑失败!";
    }
    return $mes;
}
/*删除管理员*/
function delAdmin($id){
    if(!delete("admin","id={$id}")){
        $mes="删除成功！<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="删除失败！<a href='listAdmin.php'>请重新删除</a>";
    }
    return $mes;
}
/*注销*/
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}
