<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("..\\vendor\autoload.php");
session_start();

if (isset($_SESSION["user_data"])) {
    header("Location: public/main.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="stylesheet" href="../public/css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../public/css/social-icons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../public/skins/carbon/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../public/js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="../public/js/jqueryui.js"></script>
    <script type="text/javascript" src="../public/js/easing.js"></script>
    <script type="text/javascript" src="../public/js/jquery.scrollTo-1.4.2-min.js"></script>
    <script type="text/javascript" src="../public/js/quicksand.js"></script>
    <script type="text/javascript" src="../public/js/custom.js"></script>
    <link rel="stylesheet" media="screen" href="../public/css/superfish.css" />
    <link rel="stylesheet" media="screen" href="../public/css/superfish-left.css" />
    <script type="text/javascript" src="../public/js/superfish-1.4.8/js/hoverIntent.js"></script>
    <script type="text/javascript" src="../public/js/superfish-1.4.8/js/superfish.js"></script>
    <script type="text/javascript" src="../public/js/superfish-1.4.8/js/supersubs.js"></script>
    <link rel="stylesheet" href="../public/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
    <link rel="stylesheet" href="../public/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
    <script type="text/javascript" src="../public/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
    <link rel="stylesheet" href="../public/css/jquery.tweet.css" media="all" type="text/css" />
    <script src="../public/js/tweet/jquery.tweet.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../public/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css"
        media="screen" />
    <script type="text/javascript"
        src="../public/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link href="../public/css/jflickrfeed.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="../public/js/jflickrfeed/jflickrfeed.js"></script>
    <link href="../public/js/jflickrfeed/colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="../public/js/jflickrfeed/colorbox/jquery.colorbox.js"></script>
    <script type="text/javascript" src="../public/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
    <link rel="stylesheet" href="../public/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../public/css/nivo-slider.css" type="text/css" media="screen" />
    <script src="../public/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../public/css/tabs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../public/js/tabs.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <a href="../public/index.php"><img src="../public/img/logo.png" alt="Left template" id="logo" /></a>
            <ul id="nav" class="sf-menu sf-vertical">
                <li><a href="../public/index.php">HOME</a></li>
                <li><a href="../public/blog-compact.php">BLOG</a>
                <li class="current-menu-item"><a href="public/main.php">NEW PUBLICATION</a></li>
                <li><a href="public/Profile.php"> PROFILE</a></li>
            </ul>
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div id="main">
            <div id="header">
                <div id="page-title">Login</div>
                <div id="breadcrumbs">
                    You are here:
                    <a title="Home" href="<?= $_SERVER["PHP_SELF"] ?>">LOGIN</a>
                </div>
            </div>
            <br>
            <div id="content">
                <div id="page-content">
                    <h1>Authentication</h1>
                    <br>
                    <div class="form-panel">
                        <form id="contactForm" action="index.php" method="post">
                            <input type="text" name="login" placeholder="login" required>
                            <br><br>
                            <input type="password" name="password" placeholder="password" required>
                            <br><br>
                            <input type="email" name="email" pattern=".+@gmail\.com" size="30" placeholder="email"
                                required />
                            <br><br>
                            <button type="submit" name="send" value="true">
                                <h5>LOGIN</h5>
                            </button>
                            <a href="Registration.php"><button class="btn-reg" type="button">
                                    <h5>REGISTRATION</h5>
                                </button></a>
                        </form>
                    </div>

                    <?php if (isset($_SESSION["res"])): ?>
                        <h3 id="auto">
                            <?php echo $_SESSION["res"]; ?>
                            <?php unset($_SESSION["res"]); ?>
                        </h3>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</body>

</html>