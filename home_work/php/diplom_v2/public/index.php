<?php

$routers =
    [
        "/" => __DIR__ . '/../controllers/Home.php',
        "/question" => __DIR__ . '/../controllers/AddQuestions.php',
        "/auth" => __DIR__ . '/../controllers/Auth.php',
        "/logout" => __DIR__ . '/../models/Logout.php',
    ];

$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routers)) {
        include $routers[$route];
    } else {
        header('HTTP/1.0 404 Not Found');
    }