<?php
use app\admin\NewPost;
header("Content-Type: text/html; charset=UTF-8");
require_once("../../vendor\autoload.php");
session_start();
if (!isset($_SESSION["user_data"])) {
    header("Location: ../index.php");
    die;
}
$db = new NewPost("localhost", "root", "", "left.kz");
if (isset($_POST["send"]) and isset($_FILES["img_600"]) and isset($_FILES["img_272"])) {
    $result = $db->insertPost(
        "{$_SESSION["user_data"]["id"]}",
        "{$_POST["header"]}",
        "{$_POST["mini_des"]}",
        "{$_POST["full_des"]}",
        "../data/img_600/{$_FILES["img_600"]["name"]}",
        "../data/img_272/{$_FILES["img_272"]["name"]}"
    );
    move_uploaded_file($_FILES["img_600"]["tmp_name"], "../../data/img_600/" . $_FILES["img_600"]["name"]);
    move_uploaded_file($_FILES["img_272"]["tmp_name"], "../../data/img_272/" . $_FILES["img_272"]["name"]);
    if ($result) {
        $_SESSION["res"] = "The post is published";
    } else {
        $_SESSION["res"] = "The post has not been published";
    }
    header("location: {$_SERVER["PHP_SELF"]}");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"]; ?>">NEW PUBLICATION</a></li>
                <li><a href="Profile.php"> PROFILE</a></li>
            </ul>
        </div>
        <div id="main">
            <div id="header">
                <div id="page-title">NEW PUBLICATION</div>
                <div id="breadcrumbs">
                    You are here:
                    <a title="Home" href="../../public/index.php">Home</a> &raquo;
                    <a title="Features" href="<?= $_SERVER["PHP_SELF"] ?>">NEW PUBLICATION</a>
                </div>
            </div>
            <br>

            <div id="content">
                <div id="page-content">

                    <h1>New publication</h1>
                    <?php if (isset($_SESSION["res"])): ?>
                        <h3 id="auto">
                            <?php echo $_SESSION["res"]; ?>
                            <?php unset($_SESSION["res"]); ?>
                        </h3>
                    <?php endif; ?>
                    <br>
                    <div class="form-panel">
                        <form id="contactForm" action="#" method="post" enctype="multipart/form-data">

                            <label for="header"><b>Header</b></label>
                            <textarea name="header" id="header" cols="30" rows="2" placeholder="HEADER" maxlength="100"
                                required></textarea>

                            <label for="mini_des"><b>Mini description</b></label>
                            <textarea name="mini_des" id="mini_des" cols="" rows="4" maxlength="200"
                                placeholder="Mini description"></textarea>
                            <br>

                            <label for="full_des"><b>Full description</b></label>
                            <textarea name="full_des" id="full_des" cols="30" rows="25" maxlength="2000"
                                placeholder="Full description"></textarea>
                            <br>

                            <label for="img_600"><b>IMG 600x300px</b></label>
                            <input type="file" name="img_600" id="img_600" required>

                            <label for="img_272"><b>IMG 272x250px</b></label>
                            <input type="file" name="img_272" id="img_272" required>

                            <br><br>
                            <button type="submit" name="send" value="true">
                                <h5>Publish a post</h5>
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>