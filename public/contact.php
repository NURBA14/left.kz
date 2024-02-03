<?php
use app\ContactDB;

header("Content-Type: text/html; charset=UTF-8");
error_reporting(-1);
require_once("../vendor/autoload.php");
$db = new ContactDB("localhost", "root", "", "left.kz");
if (isset($_POST["send"])) {
	$result = $db->insertContact(
		"{$_POST["name"]}",
		"{$_POST["email"]}",
		"{$_POST["text"]}"
	);
	header("Location: contact.php");
	die;
}
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
				<li><a href="gallery.php">GALLERY</a></li>
				<li class="current-menu-item"><a href="contact.php">CONTACT</a></li>
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
				<div id="page-title">Contact</div>
				<div id="breadcrumbs">
					You are here:
					<a title="Home" href="index.php">Home</a> &raquo;
					<a title="Features" href="<?= $_SERVER["PHP_SELF"] ?>">Contact</a>
				</div>
			</div>

			<div id="content">
				<div id="page-content">
					<div class="the-content">
						<h1>GET IN TOUCH</h1>
						<p>Send your details and the reason for your request, and our team will contact you.</p>
						<p>Adres: 14-25-77<br />
							8-747-449-3847, 8-747-449-3847<br />
							<a href="mailto:muradnurbolat85@gmail.com">Email</a>
						</p>
					</div>

					<h5>CONTACT FORM</h5>
					<form id="contactForm" action="#" method="post">
						<fieldset>
							<div>
								<label>Name</label>
								<input name="name" id="name" type="text" class="form-poshytip"
									title="Enter your full name" required />
							</div>
							<div>
								<label>Email</label>
								<input name="email" id="email" type="text" class="form-poshytip"
									title="Enter your email address" required />
							</div>
							<div>
								<label>Comments</label>
								<textarea name="text" id="comments" rows="5" cols="20" class="form-poshytip"
									title="Enter your comments" required></textarea>
							</div>
							<p><input type="submit" value="SEND" name="send" id="submit" /></p>
						</fieldset>
					</form>

				</div>
			</div>
		</div>
	</div>
</body>

</html>