<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql = "select id,review_tit,review_pre,review_content,pic from reviews where id='{$id}'";
$sqli = "select id,u_id,r_id,commit_time,commit from review_commit where r_id='{$id}'";
$row=fetchOne($sql);
$commits=fetchAll($sqli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="style/style.css">
    <link type="text/css" rel="stylesheet" href="style/reset.css">
</head>
<body>
<div class="header">
    <div class="top-head">
        <div class="comWidth">
           <!-- <div class="search">
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
                <h1><a href="index.php"><span> F</span>un <span>G</span>ame</a></h1>
            </div>
            <div class="top-nav">
                <ul>
                    <li class="active"><a class="color1" href="index.php">首页</a></li>
                    <li><a class="color2" href="games.php">游戏</a></li>
                    <li><a class="color3" href="reviews.php">测评</a></li>
                    <li><a class="color4" href="news.php">新闻</a></li>
                    <li><a class="color5" href="strategy.php">攻略</a></li>
                    <li><a class="color6" href="videos.php">视频</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="des-info">
    <div class="des-tit">
        <h1><?php echo $row['review_tit']?></h1>
    </div>
    <div class="des-summary">
        <h5><?php echo $row['review_pre']?></h5>
    </div>
    <?php echo $row['review_content']?>

</div>
<div class="commit">
    <form id="addCommentForm" method="post" action="addReviewCommit.php?id=<?php echo $_REQUEST['id'];?>">
        <div class="send_commit">
            <textarea name="commit" id="content" required='required' placeholder='请输入您的评论...' maxlength="300" rows="5" cols="100"></textarea>
            <button type="submit" id="submit" value="发布评论">发表评论</button>
        </div>
    </form>
    <h3>评论区</h3>
    <?php foreach($commits as $commit): ?>
        <div class="commit-item">
            <h4><?php echo $commit['u_id']?></h4>
            <p><?php echo $commit['commit']?></p>
            <span><?php echo $commit['commit_time']?></span>
        </div>
    <?php endforeach; ?>
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
</body>
</html>