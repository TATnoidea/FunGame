<?php 
require_once '../include.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />

</head>
<body>
<h3>添加游戏</h3>
<form action="doAdminAction.php?act=addGame" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">游戏名</td>
		<td><input type="text" name="game_name"  placeholder="请输入游戏名称"/></td>
	</tr>
    <tr>
        <td align="right">类型</td>
        <td><input type="text" name="game_type"  placeholder="请输入游戏类型"/></td>
    </tr>

	<tr>
		<td align="right">评分</td>
		<td><input type="text" name="game_score"  placeholder="请输入游戏评分"/></td>
	</tr>
	<tr>
		<td align="right">平台</td>
		<td><input type="text" name="game_platform"  placeholder="请输入游戏登录的平台"/></td>
	</tr>
	<tr>
		<td align="right">开发商</td>
		<td><input type="text" name="game_devepoler"  placeholder="请输入游戏开发商"/></td>
	</tr>
	<tr>
		<td align="right">发行商</td>
		<td><input type="text" name="game_publisher"  placeholder="请输入游戏发行商"/></td>
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