<?php
    $DOMAIN = "https://sevalsirakaya.trinsyca.com/";
    $PATH = "/sevalguzellik"; // Localde klasör ismi
    $PUBLIC_HTML = "/sevalsirakaya"; // Hostta klasör ismi, eğer sitenin ana dizininde ise boş bırak
    $EMAIL = "noreply@trinsyca.com";

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
