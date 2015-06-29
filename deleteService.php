<?php

include_once "./core/session.php";

if(isset($_SESSION["user_id"])){
    Db::query("DELETE FROM pricelist WHERE id = ?", $_POST["id"]);
    echo "success|Storitev uspešno izbrisana iz cenika!";
} else {
    echo "error|Nope!";
}