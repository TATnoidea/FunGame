<?php
require_once '../include.php';
$pageSize=2;
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getAdminByPage($page,$pageSize);
//$rows=getAllAdmin();

if(!$rows){
    alertMes("Sorry,没有管理员，请添加！","addAdmin.php");
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
            <div class="title">管理员列表</div>
            <div class="details">
                <div class="details_operation clearfix">
                    <div class="bui_select">
                        <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addAdmin()">
                    </div>
                </div>
                <!--表格-->
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="20%">编号</th>
                        <th width="40%">管理员姓名</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($rows as $row): ?>
                    <tr>
                        <!--这里的id和for里面的c1 需要循环出来-->
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn" onclick="delAdmin(<?php echo $row['id']; ?>)"></td>
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
    function addAdmin(){
        window.location="addAdmin.php";
    }
    function editAdmin(id){
        window.location="editAdmin.php?id="+id;
    }
    function delAdmin(id){
        if(window.confirm("您是否确定需要删除")){
            window.location="doAdminAction.php?act=delAdmin&id="+id;
        }
    }
</script>
</html>