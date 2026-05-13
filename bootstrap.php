<?php
date_default_timezone_set("Europe/Rome");
error_reporting(E_ALL);

ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '512M');
ini_set('error_log', 'php_errors.log');

DEFINE('ROOT', sprintf('%s/', __DIR__));
DEFINE('DEBUG', true);
DEFINE('DEBUG_LEVEL', 2);

spl_autoload_register(function($className) {
    foreach(['core', 'controller/admin', 'controller/frontend', 'controller/rest', 'controller/cli', 'controller/var', 'controller/website', 'classes', 'model', 'model/list', 'middleware'] as $path) {
        $fileName = sprintf('%s/%s/%s.php', __DIR__, $path, $className);
        (is_file($fileName) && (require $fileName));
    }
});

require ROOT.'/classes/vendor/autoload.php';