<?php

include 'QueryBuilder.php';

/**
 * Class Admin
 */
class Admin extends QueryBuilder
{

}

/**
 * Class Auth
 */
class Auth extends QueryBuilder
{
    public $login;
    public $password;
    public $remember;

    /**
     * Auth constructor.
     *
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->login = $post['login'];
        $this->password = $post['password'];
        $this->remember = $post['remember'];
    }

    /**
     * @return mixed
     */
    public function checkLogin()
    {
        $this->connectDb();
        return $this->getId('admin', 'login', $this->login);
    }

    /**
     * @return mixed
     */
    public function verificationPassword()
    {
        $this->connectDb();
        return $this->getId('admin', 'password', $this->password);
    }
}





