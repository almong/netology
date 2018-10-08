<?php

function addQuestion($query, $post)
{

    if (empty($query->getId('user', 'name', $post['name'])) ||
        $query->getId('user', 'name', $post['name']) == null) {
        $data = "'{$post['name']}'";
        $query->add('user', '`name`', $data);
    }

    $category_id = $query->getId('category', 'name', $post['category']);
    $user_id = $query->getId('user', 'name', $post['name']);
    $data = "'$category_id', '{$post['question']}', '$user_id', 'new'";
    $col = "`category_id`, `question`, `user_id`, `status`";
    $query->add('question', $col, $data);
}