<?php

use app\BlogDB;

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