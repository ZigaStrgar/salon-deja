<?php
include_once "./core/session.php";

$email = $_POST["email"];
$pass = $_POST["password"];

if(!empty($email) && !empty($pass)){
    if(is_email($email)){
        if(Db::query("SELECT email FROM users WHERE email = ?", $email) == 1){
            $user = Db::queryOne("SELECT * FROM users WHERE email = ?", $email);
            if(password_verify($pass, $user["password"])){
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["email"] = $user["email"];
                echo "redirect|index.php";
            } else {
                echo "error|Napačno geslo!";
            }
        } else {
            echo "error|Uporabnik s takšnim e-naslovm ne obstaja!";
        }
    } else {
        echo "error|Napaka e-naslova!";
    }
} else {
    echo "error|Izpolnite vsa polja!";
}