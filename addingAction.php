<?php

include_once "./core/session.php";

if ( isset($_SESSION["user_id"]) ) {
    $text = fullCheck($_POST["text"]);
    if ( ! empty($text) && ! empty($_POST["valid"]) ) {
        if ( Db::insert("actions", ["text" => $text, "valid" => date("y-m-d", strtotime($_POST["valid"]))]) == 1 ) {
            $_SESSION["notify"] = "success|Akcija uspešno dodana!";
            header("Location: index.php");
        } else {
            echo "error|Napaka podatkovne baze!";
        }
    } else {
        echo "error|Napaka poslanih podatkov!";
    }
} else {
    echo "error|Prosim, prijavi se!";
}
