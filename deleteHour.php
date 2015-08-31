<?php
include_once './core/session.php';

$id = (int) $_GET["id"];

if(is_numeric($id)){
    if(isset($_SESSION["user_id"])){
        Db::query("DELETE FROM hours WHERE id = ?", $id);
        $_SESSION["notify"] = "success|Uspešno izbrisano!";
        header("Location: editHours.php");
    } else {
        $_SESSION["notify"] = "error|Pred brisanjem se prijavi!";
        header("Location: index.php");
    }
} else {
    $_SESSION["notify"] = "error|Napaka podatkov!";
    header("Location: editHours.php");
}