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

/**
 * It strips Not allowed tags and attributes
 *
 * @param $string
 *
 * @return string
 */
function fullCheck($string){
    return strip_tags($string, "<p><li><ol><ul><h1><h2><h3><h4><h5><h6><span><b><u><i><strong><img>");
}

/**
 * Strips all attributes from user given HTML
 *
 * @param $html
 *
 * @return string
 */
function stripAttributes($html){
    $dom = new DOMDocument;
    $contentPrefix = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body>';
    $contentSuffix = '</body></html>';

    $dom->loadHTML($contentPrefix . $html . $contentSuffix);

    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query('//@*');

    foreach ($nodes as $node) {
        $node->parentNode->removeAttribute($node->nodeName);
    }

    return $dom->saveHTML();
}

/**
 * Strips string
 *
 * @param $string
 *
 * @return string
 */
function clearString($string){
    return strip_tags(preg_replace('/[^a-zA-Z0-9ČĆŽŠĐčćžđš@!:;?=\'\,()*\/_|+\.-] /', '', $string));
}

/**
 * Generira novo geslo (8 mestno)
 *
 * @return string
 */
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

/**
 * Spremeni string v računlniku prijazno obliko
 *
 * @param $string
 * @return mixed
 */
function createAlias($string){
    return str_replace(" ", "-", str_replace("-", "", str_replace("ć", "c", str_replace("č", "c", str_replace("š", "s", str_replace("ž", "z", strtolower($string)))))));
}