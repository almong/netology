<?php

/**
 * Class ParserQuery
 */
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

    /**
     * ParserQuery constructor.
     *
     * @param array $post
     */
    public function __construct(array $post)
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

    /**
     * @return string
     */
    public function getCol()
    {
        if ($this->name) {return "`name`";}
        if ($this->login) {return "`login`, `password`";}
        if ($this->question) { return "`category_id`, `question`, `user_id`, `status`";}
    }

    /**
     * @return string
     */
    public function getData()
    {
        if ($this->name) {return "'$this->name'";}
        if ($this->login) {return "'$this->login', '$this->password'";}
        if ($this->question) {return "'$this->category_id', '$this->question', '$this->user_id'";}
    }

    /**
     * @return string
     */
    public function getUpdateQuery()
    {
        if ($this->name != null) {return "`name`='$this->name'";}
        if ($this->login != null) {return "`login`='$this->login',`password`='$this->password'";}
        if ($this->question != null) {return "`category_id`='$this->category',`question`='$this->question',`answer`='$this->answer',`user_id`='$this->user',`status`='$this->status'";}
    }
}