<?php
require_once '../include.php';
@$act=$_REQUEST['act'];
@$id=$_REQUEST['id'];
$mes=register();
if(!$mes){
    alertMes($mes,'register.php');
}else{
    alertMes($mes,'login.php');
}
?>


