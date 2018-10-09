<?php

include '../models/ParserQuery.php';
include "../models/QueryBuilder.php";

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

$obj = new QueryBuilder();

//Переменные
$queryString = $_SERVER['QUERY_STRING'];
$link = ltrim($_SERVER['REQUEST_URI'], '/');
$arrLink = explode('/', $link);
$nameClass = $arrLink[0];
empty($_SERVER['QUERY_STRING']) ?  $action = $arrLink[1] : $action = stristr($arrLink[1], '?', true);
$table = lcfirst($nameClass);
$param = parser($queryString);
$users = $obj->showAll('user');
$categories = $obj->showAll('category');
$statuses = $obj->showAll('status');

if (isset($_POST)) {
    $parserPost = new ParserQuery($_POST);
    $data = $parserPost->getData();
    $col = $parserPost->getCol();
    $queryUpdate = $parserPost->getUpdateQuery();
}


switch ($action){
    case 'showAll':
        $values = $obj->$action($table);
        break;
    case 'update':
        $editData = $obj->showOne($table, $param['id']);
        if (!empty($queryUpdate)) {
            $obj->update($table, $queryUpdate, $parserPost->id);
            header("Location: /{$nameClass}/showAll");
        }
        break;
    case 'delete':
        $obj->$action($table, $param['id']);
        header("Location: /{$nameClass}/showAll");
        break;
    case 'add':
        if (!empty($data)) {
            $obj->$action($table, $col, $data);
            header("Location: /{$nameClass}/showAll");
        }
        break;
}

include '../views/admin.php';
