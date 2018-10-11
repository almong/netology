<?php
include '../models/QueryBuilder.php';
include '../models/AddQuestion.php';

$query = new QueryBuilder();

if (!empty($_POST['name'] && !empty($_POST['question']))){
    $question = new AddQuestion($_POST);
    $question->addNewQuestion();
    header('Location: /');
}

$categorys = $query->showAll('category');

include '../views/question.php';

