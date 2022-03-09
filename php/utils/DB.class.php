<?php

namespace DB;

require_once(dirname(__FILE__) . "/../config/config.php");

class DB{

    private static $instance = null;
    private $connection = null;

    private function __construct(){

        $this->connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, 
            DB_USER,
            DB_PASSWORD
        );

    }

    public static function getInstance(){

        if(empty(self::$instance)){
            self::$instance = new DB();
        }

        return self::$instance;

    }

}