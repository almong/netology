<?php
include '../models/QueryBuilder.php';

$query = new QueryBuilder();

$categorys = $query->showAll('category');
$questions = $query->showAll('question');

include '../views/index.php';