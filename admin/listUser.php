<?php
require_once '../include.php';
$pageSize=2;
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getUserByPage($page,$pageSize);
//$rows=getAllAdmin();

if(!$rows){
    alertMes("Sorry,没有用户，请添加！","addUser.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link rel="stylesheet" href="../style/backstage.css">
</head>

<body>

<div class="content clearfix">
    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <div class="title">用户列表</div>
            <div class="details">
                <div class="details_operation clearfix">
                    <div class="bui_select">
                        <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addUser()">
                    </div>
                </div>
                <!--表格-->
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="10%">编号</th>
                        <th width="30%">用户名</th>
                        <th width="30%">邮箱</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($rows as $row): ?>
                        <tr>
                            <!--这里的id和for里面的c1 需要循环出来-->
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td align="center"><input type="button" value="修改" class="btn" onclick="editUser(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn" onclick="delUser(<?php echo $row['id']; ?>)"></td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    <?php if($totalRows>$pageSize):?>
                        <tr>
                            <td colspan="4" align="center"><?php echo showPage($page, $totalPage);?></td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
</body>
<script type="text/javascript">
    function addUser(){
        window.location="addUser.php";
    }
    function editUser(id){
        window.location="editUser.php?id="+id;
    }
    function delUser(id){
        if(window.confirm("您是否确定需要删除")){
            window.location="doAdminAction.php?act=delUser&id="+id;
        }
    }
</script>
</html>