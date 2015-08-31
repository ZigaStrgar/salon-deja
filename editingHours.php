<?php

include_once './core/session.php';

if(isset($_SESSION["user_id"])){
    $names = $_POST["name"];
    $text = $_POST["text"];
    
    Db::query("DELETE FROM hours");

    foreach($names as $index => $name){
        Db::insert("hours", array("name" => $name, "text" => $text[$index]));
    }

    $_SESSION["notify"] = "success|Delovni čas urejen!";
    header("Location: editHours.php");
} else {
    $_SESSION["notify"] = "error|Prosim prijavi se!";
    header("Location: editHours.php");
}