<?php

$src = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR;


$config_path = $src . 'config.php';
$vendor_path = $src . 'dist' . DIRECTORY_SEPARATOR . 'vendor.php';
$functions_path = $src . 'library' . DIRECTORY_SEPARATOR . 'functions.php';
$index_path = $src . 'index.php';


$final = "<?php\r\nnamespace {\r\n" . substr(file_get_contents($config_path), 7) . "\r\n}"
    . "?>\r\n"
    . "<?php\r\nnamespace {\r\n" . substr(file_get_contents($functions_path), 7) . "\r\n}"
    . "?>\r\n"
    . file_get_contents($vendor_path)
    . "?>\r\n"
    . "<?php\r\nnamespace {\r\n" . substr(file_get_contents($index_path), 50) . "\r\n}";

unlink($vendor_path);

file_put_contents($src . 'dist' . DIRECTORY_SEPARATOR . 'index.php', $final);
