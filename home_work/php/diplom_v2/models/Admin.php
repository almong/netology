<?php

include 'QueryBuilder.php';

class Admin extends QueryBuilder
{
    public function addUser($post){
        {
            $query = $this->connectDb();
            $col = "`login`, `password`";
            $data = "'{$post['login']}', '{$post['password']}'";
            $query->add('admin', $col, $data);
        }
    }
}

class Auth extends QueryBuilder
{
    public $login;
    public $password;
    public $remember;


    public function __construct($post)
    {
        $this->login = $post['login'];
        $this->password = $post['password'];
        $this->remember = $post['remember'];
    }

    public function checkLogin()
    {
        $this->connectDb();
        return $this->getId('admin', 'login', $this->login);
    }

    public function verificationPassword()
    {
        $this->connectDb();
        return $this->getId('admin', 'password', $this->password);
    }
}





