<?php

/**
 * Check if argument is an email
 *
 * @param $email
 *
 * @return bool
 */
function is_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}

/**
 * It crypt's the password to enchant password security
 *
 * @param $password
 *
 * @return string
 */
function hash_password($password){
    return crypt($password);
}

/**
 * Put's price in correct format for echo
 *
 * @param $price
 *
 * @return string
 */
function formatPrice($price){
    return htmlspecialchars(number_format($price,2,',','.') . " €");
}