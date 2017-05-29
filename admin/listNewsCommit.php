<?php
require_once '../include.php';
$pageSize=5;
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getNewsCommitByPage($page,$pageSize);
//$rows=getAllAdmin();
if(!$rows){
    alertMes("Sorry,没有评论");
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
            <div class="title">评论列表</div>
            <div class="details">
                <div class="details_operation clearfix">
                </div>
                <!--表格-->
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="10%">编号</th>
                        <th width="10%">用户名</th>
                        <th width="20%">评论时间</th>
                        <th width="30%">评论内容</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($rows as $row): ?>
                        <tr>
                            <!--这里的id和for里面的c1 需要循环出来-->
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['u_id']; ?></td>
                            <td><?php echo $row['commit_time']; ?></td>
                            <td><?php echo $row['commit']; ?></td>
                            <td align="center"><input type="button" value="删除" class="btn" onclick="delNewsCommit(<?php echo $row['id']; ?>)"></td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    <?php if($totalRows>$pageSize):?>
                        <tr>
                            <td colspan="5" align="center"><?php echo showPage($page, $totalPage);?></td>
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
    function delNewsCommit(id){
        if(window.confirm("您是否确定需要删除")){
            window.location="doAdminAction.php?act=delNewsCommit&id="+id;
        }
    }
</script>
</html>