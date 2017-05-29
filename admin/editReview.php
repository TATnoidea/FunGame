<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql = "select id,review_tit,review_pre,review_content,pic from reviews where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑测评</title>
</head>
<body>
<h3>编辑测评</h3>
<form action="doAdminAction.php?act=editReview&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">测评标题</td>
            <td><input type="text" name="review_tit" value="<?php echo $row['review_tit']; ?>" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">测评简介</td>
            <td><input type="text" name="review_pre" value="<?php echo $row['review_pre']; ?>" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">测评图片</td>
            <td>
                <input type="hidden"/>
                请选择上传文件：<input type="file" name="pic" ><br/>
            </td>
        </tr>
        <tr>
            <td align="right">测评内容</td>
            <td>
                <script id="review_content" name="review_content" type="text/plain">
                    <?php echo $row['review_content'];  ?>
                </script>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="编辑测评"/></td>
        </tr>
    </table>
</form>
<!-- 配置文件 -->
<script type="text/javascript" src="UEditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="UEditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('review_content');
</script>
</body>
</html>