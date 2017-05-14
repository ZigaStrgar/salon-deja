<?php

include_once "./core/session.php";

if ( isset($_SESSION["user_id"]) ) {
    $title = fullCheck($_POST['title']);
    $text = fullCheck($_POST["text"]);
    if ( ! empty($text) && ! empty($title) ) {
        if ( Db::insert("news", ["text" => $text, 'title' => $title, "created_at" => date("y-m-d H:i:s")]) == 1 ) {
            $_SESSION["notify"] = "success|Novica uspešno dodana!";
            echo "redirect|index.php";
        } else {
            echo "error|Napaka podatkovne baze!";
        }
    } else {
        echo "error|Napaka poslanih podatkov!";
    }
} else {
    echo "error|Prosim, prijavi se!";
}
