<?php
define('KEY', "key");
$upload_path = "/var/www/html/w1z0.xyz/i/";
$identifier = "D-";
if (isset($_FILES['upload']['name']) && $_POST['key'] == KEY) {
    $filename = $identifier.bin2hex(openssl_random_pseudo_bytes(12));
    $upload_type = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $upload_path . $filename . '.' . $upload_type)) {
        echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'] . '/i/' . $filename . '.' . $upload_type;
    }
} else {
    echo 'invalid file or key';
}
