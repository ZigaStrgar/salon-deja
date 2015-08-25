<?php
include_once "./core/session.php";
error_reporting(E_ALL);
mb_internal_encoding("UTF-8");
$mail = clearString($_POST["email"]);
if ( ! empty($mail) ) {
    if ( is_email($mail) ) {
        if(Db::query("SELECT * FROM users WHERE email = ?", $mail) == 1) {
            $pass = randomPassword();
            $header = 'From: info@salon-deja.si';
            $header .= "\nMIME-Version: 1.0\n";
            $header .= "Content-Type: text/html; charset=\"utf-8\"\n";
            $address = $mail;
            $subject = "Novo geslo";
            $message = "Vaše novo geslo za spletno mesto www.salon-deja.si je: ".$pass;
            if(mb_send_mail($address, $subject, $message, $header)){
                Db::query("UPDATE users SET password_reseted = ?, password_reset = 1 WHERE email = ?",password_hash($pass, PASSWORD_DEFAULT), $mail);
                echo "success|Vaše novo geslo je bilo poslano na e-naslov!";
            } else {
                echo "error|Pošiljanje ni uspelo!";
            }
        } else {
            echo "error|Uporabnik s tem e-naslovom ne obstaja!";
        }
    } else {
        echo "error|Prosim, vnesite veljaven e-naslov!";
    }
} else {
    echo "error|Prosim, vnesite e-naslov!";
}