<?php

namespace {

    use application\Core\Auth;
    use application\Core\Redirect;
    use application\Core\Request;
    use application\Core\Session;
    use application\Core\View;

    if (!function_exists('view')) {
        /**
         * @param string $view
         * @param array $data
         * @return void
         */
        function view($view, array $data = [])
        {
            $obj = new View();
            return $obj->render($view, $data);
        }
    }

    if (!function_exists('redirect')) {
        /**
         * @param $path
         */
        function redirect($path)
        {
            $instance = new Redirect();

            return $instance->to($path);
        }
    }

    if (!function_exists('redirectBack')) {
        /**
         * redirect
         */
        function redirectBack()
        {
            $instance = new Redirect();
            $prevUrl = $_SERVER['HTTP_REFERER'];

            if ($prevUrl)
                return $instance->to($prevUrl);

            return $instance->to('/');
        }
    }

    if (!function_exists('isActiveLink')) {
        /**
         * @param $link
         * @return bool
         */
        function isActiveLink($link)
        {
            preg_match('/^[^?]+/', $_SERVER['REQUEST_URI'], $uri);

            if ($uri && isset($uri[0]))
                return $uri[0] === $link;

            return false;
        }
    }

    if (!function_exists('session')) {
        /**
         * @return Session
         */
        function session()
        {
            $instance = Session::getInstance();

            return $instance;
        }
    }

    if (!function_exists('auth')) {
        /**
         * @return Auth
         */
        function auth()
        {
            $instance = Auth::getInstance();

            return $instance;
        }
    }

    if (!function_exists('request')) {

        /**
         * @return Request
         */
        function request()
        {
            return new Request();
        }
    }

    if (!function_exists('e')) {

        /**
         * @param $val
         * @return string
         */
        function e($val)
        {
            return htmlspecialchars($val);
        }
    }
}