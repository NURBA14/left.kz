<?php
require_once("../vendor\autoload.php");
session_start();

// TODO Межстраничная проверка


if(!isset($_SESSION["user_data"])){
    header("Refresh: 2; url=../index.php"); 
    die("<h1 class='d-auto'>You are not logged in</h1>");
}