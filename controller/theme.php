<?php
if(isset($_GET["theme"])){
	setcookie("theme", "{$_GET["theme"]}", time() + 3600 * 24 * 365, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
	header("Location: {$_SERVER["PHP_SELF"]}");
	die;
}elseif(!isset($_COOKIE["theme"])) {
	setcookie("theme", "light", time() + 3600 * 24 * 365, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
}
?>