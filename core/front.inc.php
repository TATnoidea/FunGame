<?php
function register(){
    $arr=$_POST;
    if(!insert("users",$arr)){
        $mes="注册成功";
    }else{
        $mes="注册失败";    }
    return $mes;
}

function checkUser($sql){
    return fetchOne($sql);
}
function checkUserLogined(){
    if(@$_SESSION['userId']=="" && $_COOKIE['userId']==""){
        alertMes("请先登录","login.php");
    }
}

function userLogout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['userId'])){
        setcookie("userId","",time()-1);
    }
    if(isset($_COOKIE['userName'])){
        setcookie("userName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}