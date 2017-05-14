<?php
include_once "./core/session.php";

$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

echo "error|Registracija je trenutno onemogočena!";
die();

if (!empty($email) && !empty($password) && !empty($password2)) {
    if (is_email($email)) {
        if ($password == $password2) {
            if (Db::insert("users", array("email" => $email, "password" => sha1($password))) == 1) {
                echo "redirect|login.php";
            } else if (Db::insert("users", array("email" => $email, "password" => sha1($password))) == 23000) {
                echo "error|Uporabnik s tem e-poštnim naslovom že obstaja!";
            } else {
                echo "error|Napaka podatkovne baze!";
            }
        } else {
            echo "error|Gesli se ne ujemata!";
        }
    } else {
        echo "error|Napaka v e-naslovu";
    }
} else {
    echo "error|Izpolnite vsa polja!";
}