<?php
use app\HomeDB;

header("Content-Type: text/html; charset=UTF-8");
require("../vendor/autoload.php");
require_once("skins/theme.php");
$db = new HomeDB("localhost", "root", "", "left.kz");
$data = $db->selectPost();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LEFT</title>
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
				<li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"] ?>">HOME</a></li>
				<li><a href="blog-compact.php">BLOG</a></li>
				<li><a href="privacy\main.php">NEW PUBLICATION</a></li>
				<li><a href="privacy\Profile.php"> PROFILE</a></li>
			</ul>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light"><button class="theme-btn" type="button">Light</button></a>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=dark"><button class="theme-btn" type="button">dark</button></a>
		</div>

		<div id="main">
			<div id="content">
				<div id="page-content">
					<br>
					<h1 class="header-line">RECENT PUBLICATION</h1>
					<ul class="feature-blocks">
						<? if (isset($data)): ?>
							<? foreach ($data as $key => $item): ?>
								<li>
									<div class="block"><a href="single.php?post_id=<?= $item["id"] ?>"><img class="cover"
												src="<?= $item["img_272-250"] ?>" /></a></div>
									<div class="the-excerpt">
										<?= htmlspecialchars($item["header"]); ?>
									</div>
									<a href="single.php?post_id=<?= $item['id']; ?>" class="link-button"><span>Read
											more</span></a>
								</li>
							<? endforeach; ?>
						<? endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>

</html>