<?php
header("Content-Type: text/html; charset=utf-8");
require_once '../include.php';
$pageSize=5;
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getGameByPage($page,$pageSize);

if(!$rows){
    alertMes("Sorry,没有游戏，请添加！","addGame.php");
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
            <div class="title">游戏列表</div>
            <div class="details">
                <div class="details_operation clearfix">
                    <div class="bui_select">
                        <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addGame()">
                    </div>
                </div>
                <!--表格-->
                <table class="table" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="10%">图片</th>
                        <th width="10%">游戏名</th>
                        <th width="10%">类型</th>
                        <th width="5%">评分</th>
                        <th width="7%">平台</th>
                        <th width="10%">开发商</th>
                        <th width="10%">发行商</th>
                        <th width="10%">发售时间</th>
                        <th width="10%">热度</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($rows as $row): ?>
                        <tr>
                            <!--这里的id和for里面的c1 需要循环出来-->
                            <td><?php echo $row['id'] ; ?></td>
                            <td><image src="images/games/<?php echo $row['pic']; ?>" height="110px" width="90px" alt="<?php echo $row['pic']; ?>"></td>
                            <td><?php echo $row['game_name']; ?></td>
                            <td><?php echo $row['game_type']; ?></td>
                            <td><?php echo $row['game_score']; ?></td>
                            <td><?php echo $row['game_platform']; ?></td>
                            <td><?php echo $row['game_devepoler']; ?></td>
                            <td><?php echo $row['game_publisher']; ?></td>
                            <td><?php echo $row['game_sell_time']; ?></td>
                            <td><?php echo $row['game_click']; ?></td>
                            <td align="center"><input type="button" value="修改" class="btn" onclick="editGame(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn" onclick="delGame(<?php echo $row['id']; ?>)"></td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    <?php if($totalRows>$pageSize):?>
                        <tr>
                            <td colspan="11" align="center"><?php echo showPage($page, $totalPage);?></td>
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
    function addGame(){
        window.location="addGame.php";
    }
    function editGame(id){
        window.location="editGame.php?id="+id;
    }
    function delGame(id){
        if(window.confirm("您是否确定需要删除")){
            window.location="doAdminAction.php?act=delGame&id="+id;
        }
    }
</script>
</html>