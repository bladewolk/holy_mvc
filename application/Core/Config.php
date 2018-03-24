<?php

namespace application\Core;


class Config
{
    protected $config;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->config = require_once __DIR__ . '/../config.php';
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $keys = explode('.', $key);
        $temp = $this->config;

        foreach ($keys as $val) {
            $temp = $temp[$val];
        }

        return $temp;
    }
}