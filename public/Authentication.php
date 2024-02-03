<?php
header("Content-Type: text/html; charset=UTF-8");
require_once("..\\vendor\autoload.php");
require_once("skins/theme.php");
session_start();


if (isset($_SESSION["user_data"])) {
    header("Location: privacy/main.php");
    die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="skins/<?= $_COOKIE["theme"]; ?>/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" media="screen" href="css/superfish.css" />
	<link rel="stylesheet" media="screen" href="css/superfish-left.css" />
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen" />
	<link rel="icon" href="img\icons\letter-32.ico" type="image/x-icon">
	<link rel="icon" href="public\img\icons\letter-64.ico" type="image/x-icon">
</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <a href="index.php"><img src="img/logo.png" alt="Left template" id="logo" /></a>
            <ul id="nav" class="sf-menu sf-vertical">
                <li><a href="index.php">HOME</a></li>
                <li><a href="blog-compact.php">BLOG</a>
                <li class="current-menu-item"><a href="privacy/main.php">NEW PUBLICATION</a></li>
                <li><a href="privacy/Profile.php"> PROFILE</a></li>
            </ul>
            <a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light"><button class="theme-btn" type="button">Light</button></a>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=dark"><button class="theme-btn" type="button">dark</button></a>
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
                        <form id="contactForm" action="login.php" method="post">
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