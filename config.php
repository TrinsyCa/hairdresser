<?php
    $DOMAIN = "https://sevalsirakaya.com/";
    $PATH = "/sevalguzellik"; // Localde klasör ismi
    $PUBLIC_HTML = "/sevalsirakaya"; // Hostta klasör ismi, eğer sitenin ana dizininde ise boş bırak

    $EMAIL_HOST = 'smtp.google.com';
    $EMAIL_FROM = 'noreply@email.com';
    $EMAIL_TO = 'email@email.com';
    $EMAIL_PASS = 'email_pass';
    $EMAIL_NAME = 'Seval Sırakaya Güzellik ve Saç Salonu';


    if ($_SERVER['HTTP_HOST'] === 'localhost') { 
        define('BASE_PATH', dirname(__DIR__) . $PATH);
    } else if (isset($PUBLIC_HTML) && $PUBLIC_HTML != "") {
        define('BASE_PATH', dirname(__DIR__) . $PUBLIC_HTML);
    } else { 
        define('BASE_PATH', dirname(__DIR__) . "/public_html");
    }

    echo "\n\n\t<!-- Created by TrinsyCa ~ https://trinsyca.com -->\n\n\n";

    require_once BASE_PATH . "/assets/php/minificate.php";
    ob_start('minify_html');

    include_once BASE_PATH . '/assets/layouts/static-meta.php';
?>
