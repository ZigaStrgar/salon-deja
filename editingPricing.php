<?php
include_once "./core/session.php";

if(isset($_SESSION["user_id"])){
    $categories = $_POST["categories"];
    $names = $_POST["names"];
    $prices = $_POST["prices"];
    $notes = $_POST["notes"];
    $error = 0;

    foreach ($categories as $key => $value){
        Db::update("categories", ["name" => $value], "WHERE id = $key");
    }

    foreach($names as $index => $val) {
        if(Db::update("pricelist", ["name" => $val, "price" => $prices[$index], "note" => $notes[$index]], "WHERE id = $index") == 1){
            $error = 1;
        }
    }

    if($error != 1){
        echo "success|Cenik uspešno urejen!";
    } else {
        echo "error|Napaka pri urejanju cenika!";
    }

}