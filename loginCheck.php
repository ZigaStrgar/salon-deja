<?php
include_once "./core/session.php";

$email = clearString($_POST["email"]);
$pass = clearString($_POST["password"]);
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (!empty($email) && !empty($pass)) {
        if (is_email($email)) {
            if (Db::query("SELECT email FROM users WHERE email = ?", $email) == 1) {
                $user = Db::queryOne("SELECT * FROM users WHERE email = ?", $email);
                if ($user["password_reset"] == 1) {
                    //RESETIRAL GESLO
                    if (sha1($pass) == $user["password_reseted"]) {
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["email"] = $user["email"];
                        echo "redirect|index.php";
                    } else {
                        echo "error|Napačno geslo! Prosim preverite na e-naslov za pozabljeno geslo";
                    }
                } else {
                    //NI RESETIRAL GESLO
                    if (sha1($pass) == $user["password"]) {
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["email"] = $user["email"];
                        echo "redirect|index.php";
                    } else {
                        echo "error|Napačno geslo!";
                    }
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
} else {
    if (!empty($email) && !empty($pass)) {
        if (is_email($email)) {
            if (Db::query("SELECT email FROM users WHERE email = ?", $email) == 1) {
                $user = Db::queryOne("SELECT * FROM users WHERE email = ?", $email);
                if ($user["password_reset"] == 1) {
                    //RESETIRAL GESLO
                    if (sha1($pass) == $user["password_reseted"]) {
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["email"] = $user["email"];
                        header("Location: index.php");
                    } else {
                        $_SESSION["notify"] = "error|Napačno geslo! Prosim preverite na e-naslov za pozabljeno geslo";
                        header("Location: login.php");
                    }
                } else {
                    //NI RESETIRAL GESLO
                    if (sha1($pass) == $user["password"]) {
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["email"] = $user["email"];
                        header("Location: index.php");
                    } else {
                        $_SESSION["notify"] = "error|Napačno geslo!";
                        header("Location: login.php");
                    }
                }
            } else {
                $_SESSION["notify"] = "error|Uporabnik s takšnim e-naslovm ne obstaja!";
                header("Location: login.php");
            }
        } else {
            $_SESSION["notify"] = "error|Napaka e-naslova!";
            header("Location: login.php");
        }
    } else {
        $_SESSION["notify"] = "error|Prosim izpolnite vsa polja!";
        header("Location: login.php");
    }
}