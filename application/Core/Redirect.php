<?php

namespace application\Core;


class Redirect
{
    /**
     * Redirect constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $path
     */
    public static function to($path = '/')
    {
        header('Location: ' . $path);
        exit;
    }
}