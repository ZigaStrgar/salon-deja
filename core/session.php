<?php
//header('Content-type: text/html; charset=utf-8');
session_start();
error_reporting(0);
include_once './core/database.php';
include_once './core/functions.php';
if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
    $user = user((int) $_SESSION["user_id"]);
}