<?php
use app\privacy\ProfileDB;

if (isset($_GET["do"]) and $_GET["do"] == "exit") {
    session_destroy();
    setcookie("login", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    setcookie("password", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    setcookie("email", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    setcookie("id", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
    header("Location: ../../controller/login.php");
    die;
} elseif (!isset($_SESSION["user_data"])) {
    header("Location: ../../controller/login.php");
    die;
}
$db = new ProfileDB("localhost", "root", "", "left.kz");
if (isset($_GET["delete"])) {
    $result = $db->deletePost($_GET["delete"]);
    header("Location: {$_SERVER["PHP_SELF"]}");
    die;
}

$post_count = $db->selectPostCount($_SESSION["user_data"]["id"]);
$data = $db->selectUserPosts($_SESSION["user_data"]["id"]);
$user_info = $db->selectUserInfo($_SESSION["user_data"]["id"]);