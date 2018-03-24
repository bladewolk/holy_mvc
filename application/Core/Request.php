<?php

namespace application\Core;


class Request
{
    protected $data;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->data = $_REQUEST;
        foreach ($_FILES as $key => $file) {
            if ($file['size'])
                $this->data[$key] = $file['name'];
        }
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key, $default = null)
    {
        return key_exists($key, $this->data)
            ? $this->data[$key]
            : $default;
    }

    /**
     * @param $key
     * @param $val
     */
    public function set($key, $val)
    {
        $this->data[$key] = $val;
    }

    /**
     * @param array $keys
     * @return array
     */
    public function only(array $keys)
    {
        $request = $this->data;

        return array_reduce(array_keys($this->data), function ($carry, $item) use ($keys, $request) {
            if (in_array($item, $keys))
                $carry[$item] = $request[$item];

            return $carry;
        }, []);
    }

    /**
     * Get file from request if exist
     * @param $name
     * @return null
     */
    public function file($name)
    {
        return isset($_FILES[$name]) ? (object)$_FILES[$name] : null;
    }

    /**
     * @param $key
     * @return null
     */
    public function __get($key)
    {
        return key_exists($key, $this->data)
            ? $this->data[$key]
            : null;
    }

    /**
     * @param $key
     * @param $val
     */
    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }
}