<?php
include '../config/router.php';
$paternID = "/^[0-9]+/";
$paternAdminPanel = "/Admin|User|Question|Category/";
$route = $_SERVER['REQUEST_URI'];

if (preg_match($paternAdminPanel, $_SERVER['REQUEST_URI'])) {
    include __DIR__ . '/../controllers/AdminPanel.php';
}
if (array_key_exists($route, $routers)) {
        include $routers[$route];
    } else {
//        header('HTTP/1.0 404 Not Found');
    }