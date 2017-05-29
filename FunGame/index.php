<?php
require_once '../include.php';
$games=getIndexGame();
$news=getIndexNews();
$bigNews=getBigNews();
$smallNews1=getSmallNews1();
$smallNews2=getSmallNews2();
$strategy=getIndexStrategy();
$videos=getIndexVideo();
$lastGames=getLastGame();
$recommondGames=getRecommondGame();
//print_r ($smallNews1);
if(!($games && is_array($games))){
    alertMes("不好意思，网站更新中", "www.vgtime.com");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunGame</title>
    <link type="text/css" rel="stylesheet" href="style/style.css">
    <link type="text/css" rel="stylesheet" href="style/reset.css">
</head>
<style type="text/css">
    .left-img a{
        display: block;
        height:100%;
        width:100%;
        background-image: url("../admin/images/news/<?php echo $bigNews['pic'];?>");
        background-size: 100% 100%;
        color:#ffffff;
    }
    .right-top a{
        display: block;
        height:100%;
        width:100%;
        background-image: url("../admin/images/news/<?php echo $smallNews1['pic'];?>");
        background-size: 100% 100%;
        color: #ffffff;
    }
    .right-bottom a{
        display: block;
        height:100%;
        width:100%;
        background-image: url("../admin/images/news/<?php echo $smallNews2['pic'];?>");
        background-size: 100% 100%;
        color: #ffffff;
    }
</style>
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
                $u_id=$_SESSION['userId'];
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
<div class="comWidth">
    <div class="top-img clearfix">
        <div class="left-img">
            <a  href="#" onclick="goNews(<?php echo $bigNews['id'];?>)"><h2><?php echo $bigNews['news_tit'] ?></h2><p><?php echo $bigNews['news_pre'] ?></p></a>
        </div>
        <div class="right-img">
            <div class="right-top">
                <a href="#" onclick="goNews(<?php echo $smallNews1['id'];?>)"><h2><?php echo $smallNews1['news_tit'] ?></h2></a>
            </div>
            <div class="right-bottom">
                <a href="#" onclick="goNews(<?php echo $smallNews2['id'];?>)"><h2><?php echo $smallNews2['news_tit'] ?></h2></a>
            </div>
        </div>
    </div>
    <div class="newsList clearfix">
        <?php foreach($news as $new): ?>
        <div class="newsItem">
            <a href="#" onclick="goNews(<?php echo $new['id']; ?>)">
                <div class="news-img">
                    <img src="../admin/images/news/<?php echo $new['pic'];?>">
                </div>
                <div class="news-text">
                    <h3><?php echo $new['news_tit']; ?></h3>
                </div>
            </a>
        </div>
        <?php endforeach; ?>



    </div>
    <div class="review">
        <div class="gameTit">
            <h3 class="new">&nbsp;游戏&nbsp;</h3>
        </div>

        <div class="gameList clearfix">
            <?php foreach($games as $game): ?>
            <div class="gameItem">
                <a href="#">
                    <div class="game-img">
                        <img src="../admin/images/games/<?php echo $game['pic']; ?>" alt="<?php echo $game['pic']; ?>">
                    </div>
                    <div class="gameInfo">
                        <ul class="gameTable">
                            <li><div class="tt">游戏名：</div><div class="txt"><?php echo $game['game_name']; ?></div></li>
                            <li><div class="tt">评分：</div><div class="txt"><?php echo $game['game_score']; ?></div></li>
                            <li><div class="tt">平台：</div><div class="txt"><?php echo $game['game_platform']; ?></div></li>
                            <li><div class="tt">发售日期：</div><div class="txt"><?php echo $game['game_sell_time']; ?></div></li>
                            <li><div class="tt">开发商：</div><div class="txt"><?php echo $game['game_devepoler']; ?></div></li>
                            <li><div class="tt">发行商：</div><div class="txt"><?php echo $game['game_publisher']; ?></div></li>
                        </ul>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>


        </div>
        <a href="games.php" class="more">更多&gt;&gt;</a>
    </div>
    <div class="gameTit">
        <h3 class="new">&nbsp;攻略&nbsp;</h3>
    </div>
    <div class="strategy clearfix">
        <?php foreach($strategy as $stra): ?>
        <div class="strategyItem">
            <a href="#" onclick="goStrategy(<?php echo $stra['id'];?>)">
                <h3 class="type">攻略</h3>
                <div class="strategyInfo">
                    <h2><?php echo $stra['strategy_tit']; ?></h2>
                    <p><?php echo $stra['strategy_pre']; ?></p>
                </div>
                <div class="strategyImg"><img src="../admin/images/strategy/<?php echo $stra['pic']; ?>" alt="<?php echo $stra['pic']; ?>"></div>
            </a>
        </div>
        <?php endforeach; ?>


        <a href="strategy.php" class="more">更多&gt;&gt;</a>
    </div>
    <div class="down">
        <div class="videos leftArea">
            <div class="videoTit">
                <h3>&nbsp;视频&nbsp;</h3>
                <a href="videos.php" class="videoMore">更多&gt;&gt;</a>
            </div>
            <?php foreach($videos as $video): ?>
            <div class="videoItem">
                <a href="#" onclick="goVideo(<?php echo $video['id'];?>)">
                    <div class="videoImg">
                        <img src="../admin/images/videos/<?php echo $video['pic']?>">
                        <span class="video-tab"></span>
                    </div>
                    <div class="videoInfo">
                        <h2><?php echo $video['tit'];?></h2>
                        <p><?php echo $video['pre'];?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
        <div class="bottomGames" id="bottomGames">
            <div class="bottomTit" id="bottomTit">
                <ul>
                    <li id="0" class="select"><a href="#">近期发售</a></li>
                    <li id="1"><a href="#">推荐游戏</a></li>
                </ul>
            </div>
            <div class="bottomCon" id="bottomCon">
                <div class="mod">
                    <ul>
                        <?php foreach($lastGames as $lastGame): ?>
                            <li class="f-li">
                                <a href="#">
                                    <img class="bottom-img" src="../admin/images/games/<?php echo $lastGame['pic']?>">
                                        <ul class="bottom-info">
                                            <li><h5>游戏名：</h5><span><?php echo $lastGame['game_name']?></span></li>
                                            <li><h5>发售日期：</h5><span><?php echo $lastGame['game_sell_time']?></span></li>
                                        </ul>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <div class="mod">
                    <ul>
                        <?php foreach($recommondGames as $recommondGame): ?>
                            <li class="f-li">
                                <a href="#">
                                    <img class="bottom-img" src="../admin/images/games/<?php echo $recommondGame['pic']?>">
                                    <ul class="bottom-info">
                                        <li><h5>游戏名：</h5><span></span><?php echo $recommondGame['game_name']?></li>
                                        <li><h5>评分：</h5><span><?php echo $recommondGame['game_score']?></span></li>
                                    </ul>
                                </a>
                            </li>
                        <?php endforeach; ?>



                    </ul>
                </div>

            </div>
        </div>
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

<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
    function goNews(id){
        window.location="des_news.php?id="+id;
    }
    function goStrategy(id){
        window.location="des_strategy.php?id="+id;
    }
    function goVideo(id){
        window.location="des_videos.php?id="+id;
    }
</script>
</body>
</html>