<?php

include_once "./core/session.php";

$id = (int) clearString($_GET["id"]);
$text = fullCheck($_POST["text"]);
$title = fullCheck($_POST["title"]);

if ( isset($_SESSION["user_id"]) ) {
    if ( ! empty($text) && ! empty($title) ) {
        Db::query("UPDATE news SET text = ?, title = ? WHERE id = ?", $text, $title, $id);
        if ( Db::query("SELECT * FROM news WHERE text = ? AND title = ? AND id = ?", $text, $title, $id) == 1 ) {
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