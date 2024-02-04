<?php

use app\privacy\NewPost;

if (!isset($_SESSION["user_data"])) {
    header("Location: ../../controller/login.php");
    die;
}
$db = new NewPost("localhost", "root", "", "left.kz");
if (isset($_POST["send"]) and isset($_FILES["img_600"]) and isset($_FILES["img_272"])) {
    $result = $db->insertPost(
        "{$_SESSION["user_data"]["id"]}",
        "{$_POST["header"]}",
        "{$_POST["mini_des"]}",
        "{$_POST["full_des"]}",
        "../data/img_600/{$_FILES["img_600"]["name"]}",
        "../data/img_272/{$_FILES["img_272"]["name"]}"
    );
    move_uploaded_file($_FILES["img_600"]["tmp_name"], "../../data/img_600/" . $_FILES["img_600"]["name"]);
    move_uploaded_file($_FILES["img_272"]["tmp_name"], "../../data/img_272/" . $_FILES["img_272"]["name"]);
    if ($result) {
        $_SESSION["res"] = "The post is published";
    } else {
        $_SESSION["res"] = "The post has not been published";
    }
    header("location: {$_SERVER["PHP_SELF"]}");
    die;
}