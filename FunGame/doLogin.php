<?php
require_once '../include.php';
$username=$_POST['username'];
$password=$_POST['password'];
$autoFlag=$_POST['autoFlag'];
$sql="select*from users where username='{$username}'and password= '{$password}'";
$row=checkUser($sql);
    if($row){
        //如果选了自动登陆
        if($autoFlag){
            setcookie("userId",$row['id'],time()+7*24*3600);
            setcookie("userName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['userName']=$row['username'];
        $_SESSION['userId']=$row['id'];
        //header("location:index.php");
        alertMes("登陆成功","index.php");
    }else{
        alertMes("登录失败,重新登陆","login.php");
    }
