<?php

class ParserQuery
{
    public $id;
    public $user;
    public $name;
    public $login;
    public $password;
    public $question;
    public $status;
    public $category;
    public $answer;

    public function __construct($post)
    {
        $this->id = $post['id'];
        $this->user = $post['user'];
        $this->name = $post['name'];
        $this->login = $post['login'];
        $this->password = $post['password'];
        $this->question = $post['question'];
        $this->status = $post['status'];
        $this->category = $post['category'];
        $this->answer = $post['answer'];
    }

    public function getCol()
    {
        if ($this->name != null) {return "`name`";}
        if ($this->login != null) {return "`login`, `password`";}
        if ($this->question != null) { return "`category_id`, `question`, `user_id`, `status`";}
    }

    public function getData()
    {
        if ($this->name != null) {return "'$this->name'";}
        if ($this->login != null) {return "'$this->login', '$this->password'";}
        if ($this->question != null) {return "'$this->category_id', '$this->question', '$this->user_id'";}
    }

    public function getUpdateQuery()
    {
        if ($this->name != null) {return "`name`='$this->name'";}
        if ($this->login != null) {return "`login`='$this->login',`password`='$this->password'";}
        if ($this->question != null) {return "`category_id`='$this->category',`question`='$this->question',`answer`='$this->answer',`user_id`='$this->user',`status`='$this->status'";}
    }
}