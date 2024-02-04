<?php
use app\BlogDB;

header("Content-Type: text/html; charser=UTF-8");
require("../vendor/autoload.php");
require_once("skins/theme.php");

$db = new BlogDB("localhost", "root", "", "left.kz");
$num_rows = $db->selectNumRows("posts");
$off = 0;
if (isset($_GET["page"]) and $_GET["page"] > 1) {
	for ($i = 1; $i < $_GET["page"]; $i++) {
		$off += 4;
	}
} elseif (isset($_GET["page"]) and $_GET["page"] == 1) {
	$off = 0;
}
$page_count = ceil(($num_rows["rows"]) / 4);
$data = $db->selectBlog($off);

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
				<li><a href="index.php">HOME</a></li>
				<li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"]; ?>">BLOG</a></li>
				<li><a href="privacy\main.php">NEW PUBLICATION</a></li>
				<li><a href="privacy\Profile.php"> PROFILE</a></li>
			</ul>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light"><button class="theme-btn" type="button">Light</button></a>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=dark"><button class="theme-btn" type="button">dark</button></a>
			<a href="<?= $_SERVER["PHP_SELF"] ?>?theme=light-blue"><button class="theme-btn" type="button">light-blue</button></a>
		</div>

		<div id="main">
			<div id="header">
				<div id="page-title">The blog</div>
				<div id="breadcrumbs">
					You are here:
					<a title="Home" href="index.php">Home</a> &raquo;
					<a title="Features" href="<?= $_SERVER["PHP_SELF"] ?>">Blog</a>
				</div>
			</div>
			<div id="content">
				<div id="page-content">

					<? if (isset($data)): ?>
						<? foreach ($data as $key => $item): ?>
							<div class="post compact">
								<div class="feature-image">
									<a href="single.php?post_id=<?= $item["id"]; ?>"><img class="img-cover"
											src="<?= $item["img_272-250"]; ?>" alt="Feature image" /></a>
								</div>
								<div class="the-excerpt">
									<h6><a href="single.php?post_id=<?= $item["id"]; ?>">
											<?= htmlspecialchars($item["header"]); ?>
										</a></h6>
									<ul class="meta">
										<li>By <a href="#">
												<?= htmlspecialchars($item["login"]); ?>
											</a>&nbsp;</li>
										<li> on
											<?= $item["date"]; ?>&nbsp;
										</li>
									</ul>
									<?= nl2br(htmlspecialchars($item["mini_description"])); ?>
									<a href="single.php?post_id=<?= $item["id"] ?>" class="link-button"><span>Read
											more</span></a>
								</div>
								<div class="clear"></div>
							</div>
						<? endforeach; ?>
					<? endif; ?>

					<? if (isset($data)): ?>
						<ul class='pager'>
							<? for ($p = 1; $p <= $page_count; $p++): ?>
								<li><a href="blog-compact.php?page=<?= $p ?>">
										<?= $p ?>
									</a></li>
							<? endfor; ?>
						</ul>
					<? endif; ?>

				</div>
			</div>
		</div>
	</div>
</body>

</html>