<?php
include '../models/QueryBuilder.php';
include '../models/AddQuestion.php';

$query = new QueryBuilder();

if (!empty($_POST['name'] && !empty($_POST['question']))){
    addQuestion($query, $_POST);
    header('Location: /');
}

$categorys = $query->showAll('category');

include '../views/question.php';

