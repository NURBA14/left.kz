<?php

use app\SingleDB;

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