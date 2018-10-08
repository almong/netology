<?php

$link = ucfirst(ltrim($_SERVER['REQUEST_URI'], '/'));
$arrLink = explode('/', $link);
$nameClass = $arrLink[0];
$action = $arrLink[1];

include "../models/{$nameClass}.php";
$obj = new $nameClass();

$values = $obj->$action(lcfirst($nameClass));

include '../views/admin.php';
