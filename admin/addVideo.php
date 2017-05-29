<?php
require_once '../include.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加视频</title>
</head>
<body>
<h3>添加视频</h3>
<form action="doAdminAction.php?act=addVideo" method="post" enctype="multipart/form-data">
    <table width="90%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">视频标题</td>
            <td><input type="text" name="tit" placeholder="请输入视频标题" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">视频简介</td>
            <td><input type="text" name="pre" placeholder="请输入视频简介" style="width:400px;"/></td>
        </tr>
        <tr>
            <td align="right">视频图片</td>
            <td>
                <input type="hidden"/>
                请选择上传文件：<input type="file" name="pic" ><br/>
            </td>
        </tr>
        <tr>
            <td align="right">视频</td>
            <td>
                <script id="path" name="path" type="text/plain" style="width:1000px;height:240px;">

                </script>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="添加视频"/></td>
        </tr>
    </table>
</form>

<!-- 配置文件 -->
<script type="text/javascript" src="UEditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="UEditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('path');
</script>


</body>
</html>