<?php

    require_once("config.php");

/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/17/17
 * Time: 12:31 AM
 * To change this template use File | Settings | File Templates.
 */

class Database extends PDO{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $conn;
    private $error;
    private $stmt;

    public function __construct() {
        //set connection string
        $connstr = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        //set options
        $options = [
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        ];

        //create pdo istance
        try {
            $this->conn = new PDO($connstr, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query) {
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind($param, $value, $type = null) {

        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultset() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowcount() {
        return $this->stmt->rowCount();
    }
}
