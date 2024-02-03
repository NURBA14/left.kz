<?php
use app\admin\ProfileDB;
header("Content-Type: text/html; charset=UTF-8");
require_once("../../vendor\autoload.php");
session_start();
if (!isset($_SESSION["user_data"])) {
    header("Location: ../index.php");
    die;
}
$db = new ProfileDB("localhost", "root", "", "left.kz");
$data = $db->selectUserPosts($_SESSION["user_data"]["id"]);
$user_info = $db->selectUserInfo($_SESSION["user_data"]["id"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../public/css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../public/css/social-icons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../public/skins/carbon/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../../public/js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="../../public/js/jqueryui.js"></script>
    <script type="text/javascript" src="../../public/js/easing.js"></script>
    <script type="text/javascript" src="../../public/js/jquery.scrollTo-1.4.2-min.js"></script>
    <script type="text/javascript" src="../../public/js/quicksand.js"></script>
    <script type="text/javascript" src="../../public/js/custom.js"></script>
    <link rel="stylesheet" media="screen" href="../../public/css/superfish.css" />
    <link rel="stylesheet" media="screen" href="../../public/css/superfish-left.css" />
    <script type="text/javascript" src="../../public/js/superfish-1.4.8/js/hoverIntent.js"></script>
    <script type="text/javascript" src="../../public/js/superfish-1.4.8/js/superfish.js"></script>
    <script type="text/javascript" src="../../public/js/superfish-1.4.8/js/supersubs.js"></script>
    <link rel="stylesheet" href="../../public/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
    <link rel="stylesheet" href="../../public/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css"
        type="text/css" />
    <script type="text/javascript" src="../../public/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
    <link rel="stylesheet" href="../../public/css/jquery.tweet.css" media="all" type="text/css" />
    <script src="../../public/js/tweet/jquery.tweet.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../public/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css"
        type="text/css" media="screen" />
    <script type="text/javascript"
        src="../../public/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link href="../../public/css/jflickrfeed.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="../../public/js/jflickrfeed/jflickrfeed.js"></script>
    <link href="../../public/js/jflickrfeed/colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="../../public/js/jflickrfeed/colorbox/jquery.colorbox.js"></script>
    <script type="text/javascript" src="../../public/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
    <link rel="stylesheet" href="../../public/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../public/css/nivo-slider.css" type="text/css" media="screen" />
    <script src="../../public/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../public/css/tabs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../../public/js/tabs.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <a href="../../public/index.php"><img src="../../public/img/logo.png" alt="Left template" id="logo" /></a>
            <ul id="nav" class="sf-menu sf-vertical">
                <li><a href="../../public/index.php">HOME</a></li>
                <li><a href="../../public/blog-compact.php">BLOG</a>
                <li><a href="main.php">NEW PUBLICATION</a></li>
                <li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"]; ?>"> PROFILE</a></li>
            </ul>
        </div>
        <div id="main">
            <div id="header">
                <div id="page-title">PROFILE</div>
                <div id="breadcrumbs">
                    You are here:
                    <a title="Home" href="../../public/index.php">Home</a> &raquo;
                    <a title="Features" href="<?= $_SERVER["PHP_SELF"] ?>">PROFILE</a>
                </div>
            </div>
            <br>

            <div id="content">
                <div id="page-content">

                    <div class="profil-info">
                        <? if (isset($user_info)): ?>
                            <? foreach ($user_info as $key => $item): ?>
                                <h1>
                                    <?= $item["login"]; ?>
                                </h1>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>

                    <? if (isset($data)): ?>
                        <? foreach ($data as $key => $item): ?>
                            <div class="post compact">
                                <div class="feature-image">
                                    <a href="single.php?post_id=<?= $item["id"]; ?>"><img class="img-cover"
                                            src="../<?= $item["img_272-250"]; ?>" alt="Feature image" /></a>
                                </div>
                                <div class="the-excerpt">
                                    <h6><a href="single.php?post_id=<?= $item["id"]; ?>">
                                            <?= $item["header"]; ?>
                                        </a></h6>
                                    <ul class="meta">
                                        <li> on
                                            <?= $item["date"]; ?>&nbsp;
                                        </li>
                                    </ul>
                                    <?= $item["mini_description"]; ?>
                                    <a href="../../public/single.php?post_id=<?= $item["id"] ?>" class="link-button"><span>Read
                                            more</span></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <? endforeach; ?>
                    <? endif; ?>

                </div>
            </div>

        </div>
    </div>
</body>

</html>