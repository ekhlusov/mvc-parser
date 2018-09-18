<?php

namespace App;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


const BASE = __DIR__;
const VIEWS_PATH = __DIR__ . '/App/Views/';
const BASE_URI = 'http://parser.loc';
const ASSETS_URI = 'http://parser.loc/assets/';

spl_autoload_register(function ($class) {
    require_once BASE . '/' . str_replace(['\\App', '\\'], ['', '/'], $class) . '.php';
});

//include 'vendor/autoload.php';
include 'App/Helpers/Global.php';

$request = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];

// псевдороутер
if (!empty($query)) {
    $request = substr($request, 0, strpos($request, '?'));
}

switch ($request) {
    case ('/'):
        $buffer = new Controllers\HomeController([
            VIEWS_PATH . 'default.php'
        ]);
        break;
    default:
        $buffer = new Controllers\Controller([
            VIEWS_PATH . 'default.php'
        ]);
        break;
}

echo $buffer->out();

