<?php
$image = $_FILES["image"]["tmp_name"];
$url = 'http://imageshack.us/upload_api.php';
$max_file_size = '5242880';
$temp = $image;

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_URL, $url);

$post = array(
    "fileupload" => '@' . $temp,
    "key" => "0CZP1V27ec32dd0853cb5c88724741caed91b984",
    "album" => "carparts",
    "format" => 'json',
    "max_file_size" => $max_file_size,
    "Content-type" => "multipart/form-data",
    "public" => "no",
    "tags" => ""
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$response = curl_exec($ch);
$img = json_decode($response, true);
$image = $img["links"]["image_link"];

echo $image;
