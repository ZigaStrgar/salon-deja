<?php

include_once "./core/session.php";

$id = (int) clearString($_GET["id"]);

if ( isset($_SESSION["user_id"]) ) {
    Db::query("DELETE FROM actions WHERE id = ?", $id);
    if(Db::query("SELECT * FROM actions WHERE id = ?", $id) == 0){
        $_SESSION["notify"] = "success|Akcija uspešno zbrisana!";
        header("Location: index.php");
    } else {
        $_SESSION["notify"] = "error|Napaka podatkovne baze!";
        header("Location: index.php");
    }
} else {
    $_SESSION["notify"] = "error|Prosim, prijavi se!";
    header("Location: index.php");
}