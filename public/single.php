<?php
use app\SingleDB;
header("Content-Type: text/html; charset=UTF-8");
require_once("../vendor/autoload.php");
$db = new SingleDB("localhost", "root", "", "left.kz");
$ids = $db->selectId($_GET["post_id"]);
if (!isset($_GET["post_id"])) {
	header("Location: blog-compact.php");
	die;
} elseif (isset($_GET["post_id"]) and $_GET["post_id"] >= 0) {
	if (isset($ids)) {
		$data = $db->selectOnePost($_GET["post_id"]);
	} else {
		header("Location: blog-compact.php");
		die;
	}
}
$comments = $db->selectComments($_GET["post_id"]);
if (isset($_POST["send"])) {
	$result = $db->insertComment(
		"{$_GET["post_id"]}",
		"{$_POST["name"]}",
		"{$_POST["text"]}"
	);
	header("Location: single.php?post_id={$_GET["post_id"]}");
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
				<li class="current-menu-item"><a href="blog-compact.php">BLOG</a></li>
				<li><a href="gallery.php">GALLERY</a></li>
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
				<div id="page-title">The blog</div>
				<div id="breadcrumbs">
					You are here:
					<a title="Home" href="index.php">Home</a> &raquo;
					<a title="Features" href="blog-compact.php">Blog</a> &raquo;
					<a title="Features" href="single.php?post_id=<?= $_GET["post_id"] ?>">
						Post №
						<?= $_GET["post_id"]; ?>
					</a>
				</div>
			</div>

			<div id="content">
				<div id="page-content">

					<div class="post single">
						<h1>
							<?= htmlspecialchars($data["{$_GET["post_id"]}"]["header"]); ?>
						</h1>
						<ul class="meta">
							<li>By <a href="#">
									<?= $data["{$_GET["post_id"]}"]["login"]; ?>
								</a>&nbsp;</li>
							<li>on
								<?= $data["{$_GET["post_id"]}"]["date"]; ?> &nbsp;
							</li>
						</ul>
						<div class="feature-image">
							<img src="<?= $data["{$_GET["post_id"]}"]["img_600-300"]; ?>" alt="Feature image" />
						</div>
						<div class="the-content">
							<p>
								<?= nl2br(htmlspecialchars($data["{$_GET["post_id"]}"]["mini_description"])); ?>
							</p>
							<p>
								<?= nl2br(htmlspecialchars($data["{$_GET["post_id"]}"]["full_description"])); ?>
							</p>
						</div>
					</div>

					<div class="comments-header">
						<span class="n-comments">
							<? if (isset($comments)): ?>
								<?= count($comments); ?>
							<? else: ?>
								0
							<? endif; ?>
						</span>
						<h6 class="text">COMMENTS</h6>
					</div>

					<ol class="comments-list">
						<? if (isset($comments)): ?>
							<? foreach ($comments as $key => $comment): ?>
								<li>
									<div class="comment-wrap">
										<img alt='avatar' src='img/dummies/avatar.jpg' class='avatar' />
										<div class="comments-right">
											<div class="meta-date">
												<?= $comment["date"]; ?>
											</div>
											<div><a href='#' class='url'><strong>
														<?= $comment["name"] ?>
													</strong></a></div>
											<div class="brief">
												<p>
													<?= nl2br(htmlspecialchars($comment["text"])); ?>
												</p>
											</div>
										</div>
									</div>
								</li>
							<? endforeach; ?>
						<? endif; ?>
					</ol>

					<br><br>

					<div class="leave-comment">
						<h3>LEAVE A COMMENT</h3>

						<form action="#" method="post" id="commentform">
							<fieldset>
								<div>
									<label>Name</label>
									<input name="name" type="text" value="" tabindex="1" class="form-poshytip"
										title="Enter your name" required />
								</div>
								<div>
									<label for="comment">Comments</label>
									<textarea name="text" id="comment" cols="100" rows="10" tabindex="4"
										class="form-poshytip" title="Enter your comments" required></textarea>
								</div>
								<p><input type="submit" name="send" id="submit" tabindex="5" value="SEND" /></p>
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>

	</div>
</body>

</html>