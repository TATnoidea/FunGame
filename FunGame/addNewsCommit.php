<?php
require_once '../include.php';
if($_SESSION['userName']){
$arr=$_POST;
$arr['u_id']=$_SESSION['userName'];
$arr['commit_time']=date("Y-m-d H:i");
$arr['n_id']=$_REQUEST['id'];
insert('news_commit',$arr);
    echo"<script>alert('评论成功');</script>";
    echo"<script>window.location.href=document.referrer;</script>";
}else{
    alertMes("请登录后再进行评论","login.php");
}
?>