<?php

include 'QueryBuilder.php';

class Admin extends QueryBuilder
{

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





