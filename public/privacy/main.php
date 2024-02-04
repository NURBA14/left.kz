<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
require_once("../../vendor\autoload.php");
require_once("../../controller/theme.php");
require_once("../../controller/privacy/main.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"]; ?>">NEW PUBLICATION</a></li>
                <li><a href="Profile.php"> PROFILE</a></li>
            </ul>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light"><button class="theme-btn" type="button">Light</button></a>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=dark"><button class="theme-btn" type="button">dark</button></a>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light-blue"><button class="theme-btn" type="button">light-blue</button></a>
        </div>
        
        <div id="main">
            
            <div id="header">
                <div id="page-title">NEW PUBLICATION</div>
                <div id="breadcrumbs">
                    You are here:
                    <a title="Home" href="../index.php">Home</a> &raquo;
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