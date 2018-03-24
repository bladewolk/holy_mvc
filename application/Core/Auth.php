<?php

namespace application\Core;


class Auth
{
    private static $instance;


    public function __construct()
    {
    }

    /**
     * @return Auth
     */
    static function getInstance()
    {
        if (self::$instance === NULL)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * @param mixed $instance
     */
    public static function setInstance($instance)
    {
        self::$instance = $instance;
    }

    /**
     * @return bool
     */
    public function guest()
    {
        return !session()->has('Authenticated');
    }

    public function user()
    {
        return session()->has('Authenticated');
    }

    /**
     * @param $user
     * @param $password
     * @param $hash
     * @return bool|null
     */
    public function attempt($user, $password, $hash)
    {
        if (password_verify($password, $hash)) {
            session()->set('Authenticated', $user);
            return true;
        }

        return null;
    }

    /**
     * logout user
     */
    public function logout()
    {
        session()->forgot('Authenticated');
    }
}