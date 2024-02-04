<?php
use app\SingleDB;

header("Content-Type: text/html; charset=UTF-8");
require_once("../vendor/autoload.php");
require_once("skins/theme.php");
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
				<li class="current-menu-item"><a href="<?= $_SERVER["PHP_SELF"] ?>">BLOG</a></li>
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