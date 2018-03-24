<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([

    "driver" => "mysql",

    "host" => "127.0.0.1",

    "database" => "test",

    "username" => "root",
    'collation' => 'utf8_unicode_ci',

    "password" => ""

]);

$capsule->setAsGlobal();

$capsule->bootEloquent();


spl_autoload_register(function ($class) {
    $prefix = 'application\\';

    $base_dir = __DIR__ . '/application/';

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';


    if (file_exists($file)) {
        require_once $file;
    }
});