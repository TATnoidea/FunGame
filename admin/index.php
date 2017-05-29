<?php
require_once '../include.php';
checkLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="../style/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您
                <?php
                if(isset($_SESSION['adminName'])){
                    echo $_SESSION['adminName'];
                }elseif(isset($_COOKIE['adminName'])){
                    echo $_COOKIE['adminName'];
                }

                ?>
            </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
                <!-- 嵌套网页开始 -->
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span>-</span>管理员管理</h3>
                        <dl>
                            <dd><a href="listAdmin.php">管理员列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>-</span>游戏管理</h3>
                        <dl>
                            <dd><a href="listGame.php">游戏列表</a></dd>
                            <dd><a href="listNews.php">游戏新闻</a></dd>
                            <dd><a href="listReviews.php">游戏测评</a></dd>
                            <dd><a href="listStrategy.php">游戏攻略</a></dd>
                            <dd><a href="listVideo.php">游戏视屏</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>-</span>用户管理</h3>
                        <dl>
                            <dd><a href="listUser.php">用户列表</a></dd>
                            <dd><a href="listNewsCommit.php">新闻评论</a></dd>
                            <dd><a href="listReviewCommit.php">测评评论</a></dd>
                            <dd><a href="listStrategyCommit.php">攻略评论</a></dd>
                            <dd><a href="listVideoCommit.php">视屏评论</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</body>
</html>