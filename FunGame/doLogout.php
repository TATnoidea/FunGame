<?php
require_once '../include.php';
$act=$_REQUEST['act'];
@$id=$_REQUEST['id'];
$mes=userLogout();
alertMes($mes,'login.php');
?>