<?php
include "core/session.php";

if ( isset($_SESSION['user_id']) ) {
    $id          = (int)clearString($_GET['id']);
    $name        = clearString($_POST['name']);
    $price       = clearString($_POST['price']);
    $description = fullCheck($_POST['description']);
    $image       = $_FILES['image'];
    if ( !empty($name) & !empty($price) && !empty($description) ) {
        $image_link = Db::querySingle('SELECT image FROM products WHERE id = ?', $id);
        if ( isset($image['tmp_name']) ) {
            $url           = 'http://imageshack.us/upload_api.php';
            $max_file_size = '5242880';
            $temp          = $image['tmp_name'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_URL, $url);

            $post = [
                "fileupload"    => '@' . $temp,
                "key"           => "0CZP1V27ec32dd0853cb5c88724741caed91b984",
                "album"         => "carparts",
                "format"        => 'json',
                "max_file_size" => $max_file_size,
                "Content-type"  => "multipart/form-data",
                "public"        => "no",
                "tags"          => ""
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $response   = curl_exec($ch);
            $img        = json_decode($response, true);
            $image_link = $img["links"]["image_link"];
        }
        Db::update('products', [
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
            'image'       => $image_link,
        ], ' WHERE id = ' . $id);
        if ( Db::query("SELECT * FROM products WHERE name = ? AND description = ? AND image = ? AND price = ? and id = ?", $name, $description, $image_link, $price, $id) == 1 ) {
            $_SESSION["notify"] = "success|Izdelek uspešno dodan!";
            header("Location: products.php");
        } else {
            $_SESSION["notify"] = "error|Napaka podatkovne baze!";
            header("Location: editProduct.php?id=$id");
        }
    } else {
        $_SESSION["notify"] = "error|Napaka poslanih podatkov!";
        header("Location: editProduct.php?id=$id");
    }
}