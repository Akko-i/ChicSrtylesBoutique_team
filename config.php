<?php
if (!defined('BASE_URL')) {
    // Determine the document root dynamically
    $documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    $currentDir = str_replace('\\', '/', __DIR__);

    // Calculate the relative path
    $relativePath = str_replace($documentRoot, '', $currentDir);
    $relativePath = trim($relativePath, '/');

    // Define the base URL with a leading slash to ensure root-relative paths
    if ($relativePath == "") {
        define('BASE_URL', '/');
    } else {
        define('BASE_URL', '/' . $relativePath . '/');
    }
}
?>
