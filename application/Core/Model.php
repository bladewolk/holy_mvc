<?php

namespace application\Core;

use Exception;
use PDO;

class Model
{
//    DEPRECATED

    private static $instance;

    protected $db;
    protected $query;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = new DBConnection();
    }

    /**
     * @return Model
     */
    static function getInstance()
    {
        if (self::$instance === NULL)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * @return mixed
     */
    function getQuery()
    {
        return $this->query;
    }

    /** Get db connection
     * @return PDO
     */
    private function db()
    {
        return $this->db->connect();
    }

    static function where($row, $del, $val)
    {
        $model = self::getInstance();

        if (!$model->query) {
            $model->query = 'SELECT * from ' . self::getTableName() . ' ' .
                'WHERE ' . $row . $del . $model->db()->quote($val) . ' ';

            return $model;
        }

        $model->query .= 'AND ' . $row . $del . $model->db()->quote($val) . ' ';

        return $model;
    }

    /**
     * @return array
     */
    public static function get(): array
    {
        $model = self::getInstance();

        if ($model->query) {
            $result = $model->db()
                ->query($model->query)
                ->fetchAll(PDO::FETCH_OBJ);
        } else
            $result = $model->db()
                ->query('SELECT * from ' . self::getTableName())
                ->fetchAll(PDO::FETCH_OBJ);

        return $result ? $result : [];
    }

    /**
     * Find row by ID in database
     * @param integer $id
     * @return array
     */
    static function find($id = null): array
    {
        if ($id === null) {
            echo 'Model find required ID!';
            die;
        }
        $model = self::getInstance();
        $result = $model->db()
            ->query('SELECT * from ' . self::getTableName() . ' WHERE id = ' . $model->db()->quote($id))
            ->fetch(PDO::FETCH_LAZY);

        return $result;
    }

    /**
     * @return string
     */
    static function getTableName(): string
    {
        $called = get_called_class();

        if (property_exists($called, 'table')) {
            $calledModel = new $called();
            $tableName = $calledModel->table;
        } else {
            preg_match('/[^\\\\]+$/', $called, $temp);
            $tableName = strtolower($temp[0]) . 's';
        }

        return $tableName;
    }

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    static function create(array $data)
    {
        $model = self::getInstance();
        $keys = implode(', ', array_keys($data));
        $resValues = '';

        $index = 0;
        foreach ($data as $value) {
            if ($index)
                $resValues .= ",'$value'";
            else
                $resValues .= "'$value'";

            ++$index;
        }

        $tableName = self::getTableName();
        $sql = "INSERT INTO " . $tableName . " (" . $keys . ") VALUES (" . $resValues . ")";

        try {
            $model->db()->query($sql);
        } catch (Exception $exception) {
            echo "Ooops!";
        }

        return true;
    }
}