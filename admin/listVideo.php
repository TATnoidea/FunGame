<?php
require_once '../include.php';
$pageSize=2;
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getVideoByPage($page,$pageSize);
//$rows=getAllAdmin();

if(!$rows){
    alertMes("Sorry,没有视频，请添加！","addVideo.php");
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
            <div class="title">视频列表</div>
            <div class="details">
                <div class="details_operation clearfix">
                    <div class="bui_select">
                        <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addVideo()">
                    </div>
                </div>
                <!--表格-->
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="10%">视频标题</th>
                        <th width="10%">视频简介</th>
                        <th width="30%">视频图片</th>
                        <th width="30%">视频内容</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($rows as $row): ?>
                        <tr>
                            <!--这里的id和for里面的c1 需要循环出来-->
                            <td><?php echo $row['id'];  ?></td>
                            <td><?php echo $row['tit']; ?></td>
                            <td><?php echo $row['pre']; ?></td>
                            <td><image src="images/videos/<?php echo $row['pic'];?>" height="100px" width="180px" alt="<?php echo $row['pic']; ?>"></td>
                            <td><?php echo $row['path']?></td>
                            <td align="center"><input type="button" value="修改" class="btn" onclick="editVideo(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn" onclick="delVideo(<?php echo $row['id']; ?>)"></td>
                        </tr>
                    <?php  endforeach; ?>
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
    function addVideo(){
        window.location="addVideo.php";
    }
    function editVideo(id){
        window.location="editVideo.php?id="+id;
    }
    function delVideo(id){
        if(window.confirm("您是否确定需要删除")){
            window.location="doAdminAction.php?act=delVideo&id="+id;
        }
    }
</script>
</html>