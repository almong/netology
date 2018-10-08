<?php

$link = ltrim($_SERVER['REQUEST_URI'], '/');
$arrLink = explode('/', $link);
$nameClass = $arrLink[0];
empty($_SERVER['QUERY_STRING']) ?  $action = $arrLink[1] : $action = stristr($arrLink[1], '?', true);
$table = lcfirst($nameClass);

$queryString = $_SERVER['QUERY_STRING'];
function parser($queryString)
{
    $param = [];
    if ($values = explode('&', $queryString)){
        foreach ($values as $value){
            $arr = explode('=', $value);
            $param[$arr[0]] = $arr[1];
        }
    };
    return $param;
}

$param = parser($queryString);


include "../models/{$nameClass}.php";
$obj = new $nameClass();

switch ($action){
    case 'showAll':
        $values = $obj->$action($table);
        break;
    case 'update':
        break;
    case 'delete':
        $obj->$action($table, $param['id']);
        header("Location: /{$nameClass}/showAll");
        break;
    case 'add':
        break;
}

include '../views/admin.php';
