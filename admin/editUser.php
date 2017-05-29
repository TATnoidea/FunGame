<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql = "select id,username,password,email from users where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑用户</title>
</head>
<body>
<h3>编辑用户</h3>
<form action="doAdminAction.php?act=editUser&id=<?php echo $id; ?>" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">用户名</td>
            <td><input type="text" name="username" placeholder="<?php echo $row['username']; ?>"/></td>
        </tr>
        <tr>
            <td align="right">密码</td>
            <td><input type="password" name="password" value="<?php echo $row['password']; ?>"/></td>
        </tr>
        <tr>
            <td align="right">邮箱</td>
            <td><input type="text" name="email" placeholder="<?php echo $row['email']; ?>"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="编辑用户"/></td>
        </tr>
    </table>
</form>
</body>
</html>