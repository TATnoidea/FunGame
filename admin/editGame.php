<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql = "select id,game_name,game_type,game_devepoler,game_publisher,game_platform,game_sell_time,pic,game_score,game_click from games where id='{$id}'";
$row=fetchOne($sql);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />

</head>
<body>
<h3>修改游戏</h3>
<form action="doAdminAction.php?act=editGame&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">游戏名</td>
            <td><input type="text" value="<?php echo $row['game_name']; ?>"  /></td>
        </tr>
        <tr>
            <td align="right">类型</td>
            <td><input type="text" name="game_type"  value="<?php echo $row['game_type']; ?>"/></td>
        </tr>

        <tr>
            <td align="right">评分</td>
            <td><input type="text" name="game_score"  value="<?php echo $row['game_score']; ?>"/></td>
        </tr>
        <tr>
            <td align="right">平台</td>
            <td><input type="text" name="game_platform"  value="<?php echo $row['game_platform']; ?>"/></td>
        </tr>
        <tr>
            <td align="right">开发商</td>
            <td><input type="text" name="game_devepoler"  value="<?php echo $row['game_devepoler']; ?>"/></td>
        </tr>
        <tr>
            <td align="right">发行商</td>
            <td><input type="text" name="game_publisher"  value="<?php echo $row['game_publisher']; ?>"/></td>
        </tr>
        <tr>
            <td align="right">发售时间</td>
            <td>
                <input type="date" name="game_sell_time" />
            </td>
        </tr>
        <tr>
            <td align="right">游戏图片</td>
            <td>
                <input type="hidden"/>
                请选择上传文件：<input type="file" name="pic" ><br/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="提交"/></td>
        </tr>
    </table>
</form>
</body>
</html>