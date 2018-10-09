<?php

class ParserQuery
{
    public $user;
    public $name;
    public $login;
    public $password;
    public $question;
    public $status;
    public $category;



    public function __construct($post)
    {
        $this->user = $post['user'];
        $this->name = $post['name'];
        $this->login = $post['login'];
        $this->password = $post['password'];
        $this->question = $post['question'];
        $this->status = $post['status'];
        $this->category = $post['category'];
    }

    public function getCol()
    {
        if (isset($this->user)) {return "`name`";}
        if (isset($this->login)) {return "`login`, `password`";}
        if (isset($this->question)) { return "`category_id`, `question`, `user_id`, `status`";}
    }

    public function getData()
    {
        if (isset($this->user)) {return "`name`";}
        if (isset($this->login)) {return "`login`, `password`";}
        if (isset($this->question)) {"'$this->category_id', '$this->question', '$this->user_id', '$this->status'";}
    }
}