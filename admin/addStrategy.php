<?php
require_once '../include.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加攻略</title>
</head>
<body>
<h3>添加攻略</h3>
<form action="doAdminAction.php?act=addStrategy" method="post" enctype="multipart/form-data">
    <table width="90%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">攻略标题</td>
            <td><input type="text" name="strategy_tit" placeholder="请输入攻略标题" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">攻略简介</td>
            <td><input type="text" name="strategy_pre" placeholder="请输入攻略简介" style="width:400px;"/></td>
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

                </script>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="添加攻略"/></td>
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