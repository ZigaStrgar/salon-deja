<?php

include_once "./core/session.php";

if(isset($_SESSION["user_id"])){
    Db::query("DELETE FROM pricelist WHERE category_id = ?", $_POST["id"]);
    Db::query("DELETE FROM categories WHERE id = ?", $_POST["id"]);
    echo "success|Kategorija uspešno izbrisana!";
} else {
    echo "error|Nope!";
}