<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link type="text/css" rel="stylesheet" href="style/style.css">
    <link type="text/css" rel="stylesheet" href="style/reset.css">
</head>
<body>
<div class="header">
    <div class="top-head">
        <div class="comWidth">
            <!--<div class="search">
                <input type="text" class="search-text" value="请输入关键字" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入关键字';}">
                <input type="submit" value="" class="search-btn">
            </div>-->
            <div class="rightArea">
                <span class="welcome">欢迎来到FunGame!&nbsp;&nbsp;&nbsp;</span>
                <?php
                if(isset($_SESSION['userName'])){
                    $username=$_SESSION['userName'];
                    echo  "<span style='color:#fff; margin-right:5px;' > $username</span>";
                    echo "<a href='doLogout.php'>退出</a>";

                }else{
                    echo  "<a href=\"login.php\" class=\"login\">登录</a><span style='color: #ffffff;'> &nbsp;/&nbsp;</span><a href=\"register.php\">注册</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="head-top">
            <div class="logo">
                <h1><a href="index.html"><span> F</span>un <span>G</span>ame</a></h1>
            </div>
            <div class="top-nav">
                <ul>
                    <li class="active"><a class="color1" href="index.html">首页</a></li>
                    <li><a class="color2" href="#">游戏</a></li>
                    <li><a class="color3" href="#">测评</a></li>
                    <li><a class="color4" href="#">新闻</a></li>
                    <li><a class="color5" href="#">攻略</a></li>
                    <li><a class="color6" href="#">视频</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="regBox">
    <div class="login-cont">
        <form action="doRegister.php" method="post">
        <ul class="login">
            <li><span class="reg-item"><i>*</i>账户名:</span><div class="input-item"><input type="text" class="login-input" name="username"></div></li>
            <li><span class="reg-item"><i>*</i>密码:</span><div class="input-item"><input type="password" class="login-input" name="password"></div></li>
            <li><span class="reg-item"><i>*</i>邮箱:</span><div class="input-item"><input type="text" class="login-input" name="email"></div></li>
            <li><span class="reg-item">&nbsp;</span><input type="submit" value="" class="reg-btn"></li>
        </ul>
        </form>
    </div>
</div>

<div class="footer">
    <div class="footer-middle">
        <div class="footerInfo">
            <h2>关于我们</h2>
            <p>FunGame!&nbsp;&nbsp;分享有趣的游戏。</p>
            <div class="logo">
                <h1><span> F</span>un <span>G</span>ame</a></h1>
            </div>
        </div>
        <div class="footer-middle-in">
            <h6>网站导航</h6>
            <ul>
                <li><a href="#">游戏新闻</a></li>
                <li><a href="#">游戏测评</a></li>
                <li><a href="#">游戏攻略</a></li>
                <li><a href="#">游戏视频</a></li>
            </ul>
        </div>
        <div class="footer-middle-in">
            <h6>联系合作</h6>
            <ul>
                <li><a href="#">加入我们</a></li>
                <li><a href="#">作者邮箱<br/>592292495@qq.com</a></li>
                <li><a href="#">玩家交流QQ群<br/>548275750</a></li>
            </ul>
        </div>
        <div class="footer-middle-in">
            <h6>友情链接</h6>
            <ul>
                <li><a target="_blank" href="http://www.ign.com/">IGN</a></li>
                <li><a target="_blank" href="http://www.gamespot.com/">GameSpot</a></li>
                <li><a target="_blank" href="http://new.vgtime.com/">VG Time</a></li>
            </ul>
        </div>
        <div class="footer-middle-in">
            <h6>支持本站</h6>
            <img src="images/sao.jpg">
        </div>
    </div>
    <div class="footer-class"><p>作者：程子超&nbsp;&nbsp;&nbsp;&nbsp;学号：13110100915&nbsp;&nbsp;&nbsp;&nbsp;班级：13008</p></div>
</div>
</body>
</html>