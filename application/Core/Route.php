<?php

namespace application\Core;

class Route
{
    /**
     * @param $path
     * @param $handler
     * @return null
     */
    public static function get($path, $handler)
    {
        $server = $_SERVER;
        preg_match('/^[^?]+/', $server['REQUEST_URI'], $uri);

        if ($server['REQUEST_METHOD'] === 'GET' && $uri[0] === $path) {
            $explode = explode('@', $handler);

            $controller = '\application\Controllers\\' . $explode[0];
            $method = $explode[1];

            $controllerInstance = new $controller();

            return $controllerInstance->$method($_SERVER);
        }

        return null;
    }

    /**
     * @param $path
     * @param $handler
     */
    public static function post($path, $handler)
    {
        $server = $_SERVER;
        preg_match('/^[^?]+/', $server['REQUEST_URI'], $uri);

        preg_match('/\/([0-9]+)\/?/', $uri[0], $id);
        $id = isset($id[1]) ? +$id[1] : null;

        if ($id)
            $uri[0] = str_replace($id, '{id}', $uri[0]);

        if ($server['REQUEST_METHOD'] === 'POST' && $uri[0] === $path) {
            $explode = explode('@', $handler);


            $controller = 'application\Controllers\\' . $explode[0];
            $method = $explode[1];

            $controllerInstance = new $controller();

            $controllerInstance->$method($id);
            exit;
        }
    }

    /**
     *
     */
    public static function abort()
    {
        return self::pageNotFound();
    }

    /**
     * @param string $message
     * @param int $code
     * @return
     */
    public static function notAllowed($message = 'Method not allowed', $code = 403)
    {
        $view = new View();

        return $view->abort($message, $code);
    }

    /**
     * @param string $message
     * @param int $code
     */
    public static function pageNotFound($message = 'Page not found', $code = 404)
    {
        $view = new View();

        return $view->abort($message, $code);
    }
}