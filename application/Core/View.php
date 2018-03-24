<?php

namespace application\Core;

class View
{
    public function render($file = null, $data = null)
    {
//      Generate variabled from input array
//      Destruct array
        if ($data)
            foreach ($data as $key => $val) {
                $$key = $val;
            }

        require_once __DIR__ . '/../../resources/views/layout.php';

        exit;
    }

    /**
     * @param $message
     * @param $code
     */
    public function abort($message, $code)
    {
        require_once __DIR__ . '/../../resources/views/404.php';
    }
}