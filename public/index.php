<?php
use app\HomeDB;

header("Content-Type: text/html; charset=UTF-8");
require("../vendor/autoload.php");
$db = new HomeDB("localhost", "root", "", "left.kz");
$data = $db->selectPost();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>LEFT</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="skins/carbon/style.css" type="text/css" media="screen" />
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
				<li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"]?>">HOME</a></li>
				<li><a href="blog-compact.php">BLOG</a></li>
				<li><a href="..\admin\public\main.php">NEW PUBLICATION</a></li>
                <li><a href="..\admin\public\Profile.php"> PROFILE</a></li>
			</ul>
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