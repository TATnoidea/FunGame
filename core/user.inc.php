<?php
/*添加用户*/
function addUser(){
    $arr=$_POST;
    if(!insert("users",$arr)){
        $mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="添加失败!<br/><a href='addUser.php'>重新添加</a>";
    }
    return $mes;
}

/*获取所有用户*/
function getAllUser(){
    $sql = "select id,username,email from users";
    $rows=fetchAll($sql);
    return $rows;
}

function getUserByPage($page,$pageSize=2){
    $sql="select * from users";
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
    $sql="select id,username,email from users limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}
/**编辑用户*/
function editUser($id){
    $arr=$_POST;
    if(!update('users',$arr,"id={$id}")){
        $mes="编辑成功！<a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="编辑失败！";
    }
    return $mes;
}
/*删除用户*/
function delUser($id){
    if(!delete("users","id={$id}")){
        $mes="删除成功！<a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="删除失败！<a href='listUser.php'>请重新删除</a>";
    }
    return $mes;
}

