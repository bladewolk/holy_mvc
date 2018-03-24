<?php

namespace application\Core;


use PDO;

class DBConnection
{
    /**
     * DBConnection constructor.
     */
    public function __construct()
    {
        $this->config = new Config();

    }

    /**
     * @return PDO
     */
    function connect(): PDO
    {
        $user = $this->config->get('db.user');
        $pass = $this->config->get('db.pass');
        $host = $this->config->get('db.host');
        $dbname = $this->config->get('db.dbname');


        try {
            $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die;
        }

        return $pdo;
    }
}