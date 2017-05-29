<?php
header("content-type:text/html;charset=utf-8");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
require_once 'user.inc.php';
require_once 'game.inc.php';
require_once 'upload.func.php';
require_once 'commit.inc.php';
require_once 'news.inc.php';
require_once 'reviews.inc.php';
require_once 'strategy.inc.php';
require_once 'video.inc.php';
require_once 'front.inc.php';
connect();