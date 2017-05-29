<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql = "select id,strategy_tit,strategy_pre,strategy_content,pic from strategy where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑攻略</title>
</head>
<body>
<h3>编辑攻略</h3>
<form action="doAdminAction.php?act=editStrategy&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">攻略标题</td>
            <td><input type="text" name="strategy_tit" value="<?php echo $row['strategy_tit']; ?>" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">攻略简介</td>
            <td><input type="text" name="strategy_pre" value="<?php echo $row['strategy_pre']; ?>" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">攻略图片</td>
            <td>
                <input type="hidden"/>
                请选择上传文件：<input type="file" name="pic" ><br/>
            </td>
        </tr>
        <tr>
            <td align="right">攻略内容</td>
            <td>
                <script id="strategy_content" name="strategy_content" type="text/plain">
                    <?php echo $row['strategy_content'];  ?>
                </script>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="攻略新闻"/></td>
        </tr>
    </table>
</form>
<!-- 配置文件 -->
<script type="text/javascript" src="UEditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="UEditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('strategy_content');
</script>
</body>
</html>