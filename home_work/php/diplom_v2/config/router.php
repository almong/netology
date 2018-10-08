<?php

$paternID = "/^[0-9]+/";
$paternAdminPanel = "/Admin|User|Question|Category/";

$routers = [
    "/" => __DIR__ . '/../controllers/Home.php',
    "/question" => __DIR__ . '/../controllers/AddQuestions.php',
    "/auth" => __DIR__ . '/../controllers/Auth.php',
    "/logout" => __DIR__ . '/../models/Logout.php',
];