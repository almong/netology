<?php

$link = ltrim($_SERVER['REQUEST_URI'], '/');
$arrLink = explode('/', $link);
$nameClass = $arrLink[0];
$action = $arrLink[1];
$table = lcfirst($nameClass);

include "../models/{$nameClass}.php";
$obj = new $nameClass();

switch ($action){
    case 'showAll':
        $values = $obj->$action($table);
        break;
    case 'update':
        break;
    case 'delete':
        $obj->$action($table, 1);
        header("Location: /$nameClass/showAll");
        break;
    case 'add':
        break;
}

include '../views/admin.php';
