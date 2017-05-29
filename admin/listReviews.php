<?php
require_once '../include.php';
$pageSize=2;
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getReviewsByPage($page,$pageSize);
//$rows=getAllAdmin();

if(!$rows){
    alertMes("Sorry,没有测评，请添加！","addReview.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link rel="stylesheet" href="style/backstage.css">
</head>

<body>

<div class="content clearfix">
    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <div class="title">测评列表</div>
            <div class="details">
                <div class="details_operation clearfix">
                    <div class="bui_select">
                        <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addReview()">
                    </div>
                </div>
                <!--表格-->
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="10%">测评标题</th>
                        <th width="10%">测评简介</th>
                        <th width="15%">测评图片</th>
                        <th width="50%">测评内容</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($rows as $row): ?>
                        <tr>
                            <!--这里的id和for里面的c1 需要循环出来-->
                            <td><?php echo $row['id'];  ?></td>
                            <td><?php echo $row['review_tit']; ?></td>
                            <td><?php echo $row['review_pre']; ?></td>
                            <td><image src="images/reviews/<?php echo $row['pic']; ?>" height="100px" width="200px" alt="<?php echo $row['pic']; ?>"></td>
                            <td><?php echo $row['review_content']; ?></td>
                            <td align="center"><input type="button" value="修改" class="btn" onclick="editReview(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn" onclick="delReview(<?php echo $row['id']; ?>)"></td>
                        </tr>
                    <?php  endforeach; ?>
                    <?php if($totalRows>$pageSize):?>
                        <tr>
                            <td colspan="6" align="center"><?php echo showPage($page, $totalPage);?></td>
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
    function addReview(){
        window.location="addReview.php";
    }
    function editReview(id){
        window.location="editReview.php?id="+id;
    }
    function delReview(id){
        if(window.confirm("您是否确定需要删除")){
            window.location="doAdminAction.php?act=delReview&id="+id;
        }
    }
</script>
</html>