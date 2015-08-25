<?php

include_once "./core/session.php";

$id = (int) clearString($_GET["id"]);
$text = fullCheck($_POST["text"]);
$valid = date("y-m-d", strtotime(clearString($_POST["valid"])));

if ( isset($_SESSION["user_id"]) ) {
    if ( ! empty($text) && ! empty($valid) ) {
        Db::query("UPDATE actions SET text = ?, valid = ? WHERE id = ?", $text, $valid, $id);
        if ( Db::query("SELECT * FROM actions WHERE text = ? AND valid = ? AND id = ?", $text, $valid, $id) == 1 ) {
            echo "success|Sprememba uspešna!";
        } else {
            echo "error|Napaka podatkovne baze!";
        }
    } else {
        echo "error|Prosim, izpolnite vsa polja!";
    }
} else {
    echo "error|Prosim, prijavi se!";
}