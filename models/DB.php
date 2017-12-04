<?php

class DB {

    private static $instance;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            try {
                self::$instance = new PDO(_DB_DSN_, _DB_USER_, _DB_PASSWORD_);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function getLatestId($tableName)
    {
        $db = self::getInstance();
        $request = $db->query("SELECT MAX(id) FROM {$tableName}");

        $request->execute();
        return current($request->fetchAll(PDO::FETCH_ASSOC)[0]);
    }
}
