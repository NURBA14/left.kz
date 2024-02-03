<?php
use app\GalleryDB;

header("Content-Type: text/html; cherset=UTF-8");
require("../vendor/autoload.php");
$db = new GalleryDB("localhost", "root", "", "left.kz");
$num_rows = $db->selectNumRows("gallery");
$off = 0;
if (isset($_GET["page"]) and $_GET["page"] > 1) {
	for ($i = 1; $i < $_GET["page"]; $i++) {
		$off += 4;
	}
} elseif (isset($_GET["page"]) and $_GET["page"] == 1) {
	$off = 0;
}
$data = $db->selectGallery($off);
$page_count = ceil(($num_rows["rows"]) / 4);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>LEFT</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="skins/paper-brown/style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="js/jqueryui.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
	<script type="text/javascript" src="js/quicksand.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<link rel="stylesheet" media="screen" href="css/superfish.css" />
	<link rel="stylesheet" media="screen" href="css/superfish-left.css" />
	<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
	<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
	<script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
	<link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
	<link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
	<script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
	<link rel="stylesheet" href="css/jquery.tweet.css" media="all" type="text/css" />
	<script src="js/tweet/jquery.tweet.js" type="text/javascript"></script>
	<link rel="stylesheet" href="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css"
		media="screen" />
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link href="css/jflickrfeed.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="js/jflickrfeed/jflickrfeed.js"></script>
	<link href="js/jflickrfeed/colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="js/jflickrfeed/colorbox/jquery.colorbox.js"></script>
	<script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
	<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<script src="js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/tabs.js"></script>
	<link rel="icon" href="img\icons\letter-32.ico" type="image/x-icon">
	<link rel="icon" href="public\img\icons\letter-64.ico" type="image/x-icon">
</head>

<body>
	<div id="wrapper">
		<div id="sidebar">
			<a href="index.php"><img src="img/logo.png" alt="Left template" id="logo" /></a>
			<ul id="nav" class="sf-menu sf-vertical">
				<li><a href="index.php">HOME</a></li>
				<li><a href="blog-compact.php">BLOG</a></li>
				<li class="current-menu-item"><a href="gallery.php">GALLERY</a></li>
				<li><a href="contact.php">CONTACT</a></li>
			</ul>
			<br><br><br><br><br><br><br><br><br><br><br>
			<ul class="social">
				<li>
					<h6>Follow me</h6>
				<li><a href="http://www.facebook.com" class="facebook" title="Become a fan"></a></li>
				<li><a href="http://www.twitter.com" class="twitter" title="Follow our tweets"></a></li>
				<li><a href="http://www.dribbble.com" class="dribbble" title="View our work"></a></li>
				<li><a href="http://www.addthis.com" class="addthis" title="Tell everybody"></a></li>
				<li><a href="http://www.vimeo.com" class="vimeo" title="View our videos"></a></li>
				<li><a href="http://www.youtube.com" class="youtube" title="View our videos"></a></li>
			</ul>
		</div>

		<div id="main">
			<div id="header">
				<div id="page-title">The gallery</div>
				<div id="breadcrumbs">
					You are here:
					<a title="Home" href="index.php">Home</a> &raquo;
					<a title="Features" href="<?= $_SERVER["PHP_SELF"] ?>">Gallery</a>
				</div>
			</div>
			<div id="content">
				<div id="page-content">
					<ul id="portfolio-list" class="gallery-thumbs">
						<? if (isset($data)): ?>
							<? foreach ($data as $key => $item): ?>
								<li class="web">
									<span></span>
									<a class="boxgrid  fancybox" href="<?= $item["img_600-300"] ?>">
										<img class="cover" src="<?= $item["img_600-300"] ?>" />
										<div class="box-content">
											<br><br><br>
											<h6>
												<?= htmlspecialchars($item["header"]); ?>
											</h6>
											<p>
												<?= nl2br(htmlspecialchars($item["mini_description"])); ?>
											</p>
										</div>
									</a>
								</li>
							<? endforeach; ?>
						<? endif; ?>
					</ul>
					<? if (isset($data)): ?>
						<ul class='pager'>
							<? for ($p = 1; $p <= $page_count; $p++): ?>
								<li><a href="gallery.php?page=<?= $p ?>">
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