<?php
use app\admin\ProfileDB;

header("Content-Type: text/html; charset=UTF-8");
require_once("../../vendor\autoload.php");
require_once("../skins/theme.php");
session_start();

if (isset($_GET["do"]) and $_GET["do"] == "exit") {
    session_destroy();
    setcookie("login", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    setcookie("password", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    setcookie("email", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    setcookie("id", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    header("Location: ../login.php");
    die;
} elseif (!isset($_SESSION["user_data"])) {
    header("Location: ../login.php");
    die;
}
$db = new ProfileDB("localhost", "root", "", "left.kz");
if (isset($_GET["delete"])) {
    $result = $db->deletePost($_GET["delete"]);
    header("Location: {$_SERVER["PHP_SELF"]}");
    die;
}

$post_count = $db->selectPostCount($_SESSION["user_data"]["id"]);
$data = $db->selectUserPosts($_SESSION["user_data"]["id"]);
$user_info = $db->selectUserInfo($_SESSION["user_data"]["id"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/social-icons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../skins/<?= $_COOKIE["theme"]; ?>/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" media="screen" href="../css/superfish.css" />
    <link rel="stylesheet" media="screen" href="../css/superfish-left.css" />
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/tabs.css" type="text/css" media="screen" />
    <link rel="icon" href="../img\icons\letter-32.ico" type="image/x-icon">
    <link rel="icon" href="../public\img\icons\letter-64.ico" type="image/x-icon">
</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <a href="../index.php"><img src="../img/logo.png" alt="Left template" id="logo" /></a>
            <ul id="nav" class="sf-menu sf-vertical">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../blog-compact.php">BLOG</a>
                <li><a href="main.php">NEW PUBLICATION</a></li>
                <li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"]; ?>"> PROFILE</a></li>
            </ul>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light"><button class="theme-btn" type="button">Light</button></a>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?theme=dark"><button class="theme-btn" type="button">dark</button></a>
        </div>
        <div id="main">
            <div id="header">
                <div id="page-title">PROFILE</div>
                <div id="breadcrumbs">
                    You are here:
                    <a title="Home" href="../index.php">Home</a> &raquo;
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
                                    <br>
                                    <a href="<?= $_SERVER["PHP_SELF"]; ?>?do=exit"><button class="delete"
                                            type="button">Logout</button></a>
                                </h1>
                                <br>
                                <h6>
                                    Posts:
                                    <?= $post_count["posts"]; ?>
                                </h6>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>

                    <? if (isset($data)): ?>
                        <? foreach ($data as $key => $item): ?>
                            <div class="post compact">
                                <div class="feature-image">
                                    <a href="../single.php?post_id=<?= $item["id"]; ?>"><img class="img-cover"
                                            src="../<?= $item["img_272-250"]; ?>" alt="Feature image" /></a>
                                </div>
                                <div class="the-excerpt">
                                    <h6><a href="../single.php?post_id=<?= $item["id"]; ?>">
                                            <?= $item["header"]; ?>
                                        </a></h6>
                                    <ul class="meta">
                                        <li> on
                                            <?= $item["date"]; ?>&nbsp;
                                        </li>
                                    </ul>
                                    <?= $item["mini_description"]; ?>
                                    <a href="../single.php?post_id=<?= $item["id"]; ?>" class="link-button"><span>Read
                                            more</span></a>
                                    <br>
                                    <a href="<?= $_SERVER["PHP_SELF"]; ?>?delete=<?= $item["id"]; ?>"><button class="delete"
                                            type="button">delete</button></a>
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