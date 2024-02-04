<?php

use app\privacy\RegistrationDB;

session_start();

if (isset($_SESSION["user_data"])) {
    header("Location: privacy/main.php");
    die;
}
$db = new RegistrationDB("localhost", "root", "", "left.kz");
if (isset($_POST["send"]) and isset($_POST["login"]) and isset($_POST["email"]) and isset($_POST["password"])) {
    $result = $db->selectUserData("{$_POST["login"]}", "{$_POST["email"]}", "{$_POST["password"]}");
    if ($result) {
        $result = $db->insertUserData($_POST["login"], $_POST["email"], $_POST["password"]);
        $_SESSION["res"] = "Вы зарегестрировались";
        header("Location: Registration.php");
        die;
    } else {
        $_SESSION["res"] = "Такой пользователь уже зарегестрирован";
        header("Location: Registration.php");
        die;
    }
}