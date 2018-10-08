<?php
$routers = include '../config/router.php';

$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routers)) {
        include $routers[$route];
    } else {
        header('HTTP/1.0 404 Not Found');
    }