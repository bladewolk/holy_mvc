<?php

namespace application\Core;


class Session
{
    private static $instance;
    private $session;

    /**
     * Session constructor.
     */
    public function __construct()
    {
//        session_start();
        $this->session = &$_SESSION;
    }

    /**
     * @return Session instance
     */
    static function getInstance()
    {
        if (self::$instance === NULL)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * @param array $data
     * @return array
     */
    static function flashErrors(array $data = [])
    {
        $instance = self::getInstance();

        return $instance->session['flash']['errors'] = $data;
    }

    static function hasError($key)
    {
        $instance = self::getInstance();

        return isset($instance->session['flash']['errors'][$key]);
    }

    /**
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        $instance = self::getInstance();

        if (isset($instance->session[$key]))
            return true;

        return false;
    }


    /**
     * @param string $key
     * @return null
     */
    public static function get($key = null)
    {
        $insance = self::getInstance();

        if ($key) {
            if (isset($insance->session[$key]))
                return $insance->session[$key];

            if (isset($insance->session['flash']['errors'][$key])) {
                $res = $insance->session['flash']['errors'][$key];
                unset($insance->session['flash']['errors'][$key]);

                return $res;
            }

            return null;
        }

        return $insance->session;
    }

    /**
     * @param $key
     * @param $val
     * @return bool
     */
    public static function set($key, $val)
    {
        $insance = self::getInstance();

        $insance->session[$key] = $val;

        return true;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function forgot($key)
    {
        $instance = self::getInstance();

        if ($instance->has($key)) {
            unset($instance->session[$key]);
            return true;
        }

        return false;
    }
}