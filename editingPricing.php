<?php
include_once "./core/session.php";

if ( isset($_SESSION["user_id"]) ) {
    $categories = $_POST["categories"];
    $names = $_POST["names"];
    $prices = $_POST["prices"];
    $notes = $_POST["notes"];
    $error = 0;

    foreach ( $categories as $key => $value ) {
        Db::update("categories", ["name" => $value], "WHERE id = $key");
        if ( Db::query("SELECT * FROM categories WHERE name = ? AND id = ?", $value, $key) == 1 ) {

        } else {
            if ( ! empty($value) && Db::query("SELECT id FROM categories WHERE id = ?", $key) == 1 ) {
                $error = 2;
            }
        }
    }

    if ( $error == 2 ) {
        echo "error|Napka pri urejanju kategorije cenika!";
        die();
    }

    foreach ( $names as $index => $val ) {
        Db::update("pricelist", ["name" => $val, "price" => $prices[$index], "note" => $notes[$index]], "WHERE id = $index");
        if ( Db::query("SELECT * FROM pricelist WHERE name = ? AND price = ? AND note = ? AND id = ?", $val, $prices[$index], $notes[$index], $index) == 1 ) {

        } else {
            if ( (! empty($val) || ! empty($prices[$index])) && Db::query("SELECT * FROM pricelist WHERE id = ?", $index) == 1 ){
                $error = 1;
            }
        }
    }

    if ( $error != 1 ) {
        Db::query("UPDATE pricelist SET last_change = ?", date("y-m-d"));
        echo "success|Cenik uspešno urejen!";
    } else {
        echo "error|Napaka pri urejanju cenika!";
    }

}