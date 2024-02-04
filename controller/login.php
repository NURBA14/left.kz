<?php
use app\privacy\LoginDB;

require_once("..\\vendor\autoload.php");
session_start();

if (isset($_SESSION["user_data"])) {
    header("Location: ../public/privacy/main.php");
    die;
}

$db = new LoginDB("localhost", "root", "", "left.kz");
if (isset($_COOKIE["login"]) and isset($_COOKIE["password"]) and isset($_COOKIE["email"])) {
    $result = $db->selectUserData("{$_COOKIE["login"]}", "{$_COOKIE["email"]}", "{$_COOKIE["password"]}");
    if ($result->num_rows === 1) {
        $_SESSION["user_data"] = [
            "login" => "{$_COOKIE["login"]}",
            "email" => "{$_COOKIE["email"]}",
            "password" => "{$_COOKIE["password"]}",
            "id" => "{$_COOKIE["id"]}"
        ];
        header("Location: ../public/privacy/main.php");
        die;
    } else {
        session_destroy();
        setcookie("login", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
        setcookie("password", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
        setcookie("email", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
        setcookie("id", "", time() - 0, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
        header("Location: ../public/Authentication.php");
        die;
    }
} elseif (!empty($_POST["login"])) {
    $result = $db->selectUserData("{$_POST["login"]}", "{$_POST["email"]}", "{$_POST["password"]}");
    if ($result->num_rows === 1) {
        while ($row = $result->fetch_assoc()) {
            setcookie("login", "{$row["login"]}", time() + 3600 * 24 * 7, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
            setcookie("password", "{$row["password"]}", time() + 3600 * 24 * 7, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
            setcookie("email", "{$row["email"]}", time() + 3600 * 24 * 7, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
            setcookie("id", "{$row["id"]}", time() + 3600 * 24 * 7, "/", "{$_SERVER["HTTP_HOST"]}", false, true);
            $_SESSION["user_data"] = [
                "login" => "{$row["login"]}",
                "email" => "{$row["email"]}",
                "password" => "{$row["password"]}",
                "id" => "{$row["id"]}"
            ];
        }
        header("Location: ../public/privacy/main.php");
        die;
    } elseif ($result->num_rows === 0) {
        $_SESSION["res"] = "Incorect login";
        header("Location: ../public/Authentication.php");
        die;
    }
} else {
    header("Location: ../public/Authentication.php");
    die;
}