<?php

    require_once("config.php");

/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/17/17
 * Time: 12:31 AM
 * To change this template use File | Settings | File Templates.
 */

abstract class Database extends PDO{

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

    protected function bind($param, $value, $type = null) {

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

    protected function execute() {
        return $this->stmt->execute();
    }

    protected function fetch_object() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_CLASS);
    }


    protected function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_CLASS);
    }

    protected function rowcount() {
        return $this->stmt->rowCount();
    }

    protected function table_select($table) {
        $this->query("SELECT * FROM " . $table);
        return $this->fetch_object();
    }

    protected function select_by_id($table, $id) {
        $this->query("SELECT * FROM " . $table . " WHERE id=" . $id);
        return $this->fetch_object();
    }

    protected function select_by_column($table, $column, $value) {
        $this->query("SELECT * FROM " . $table . " WHERE " . $column . "=" . $value);
        return $this->fetch_object();
    }

    protected function select_by_columns($table, $columns) {
        $query = 'SELECT * FROM ' . $table . ' WHERE ';
        $coumns_count = count($columns);
        $counter = 0;
        foreach($columns as $column => $value) {
            $counter++;
            $counter == $coumns_count ? $query .= $column . '=' . $value : $query .= $column . '=' . $value . ' AND ';
        }
        $this->query($query);
        return $this->fetch_object();
    }

    protected function select_by_column_join() {
        $this->query("SELECT * FROM vote_subjects JOIN votes ON vote_subjects.id = votes.candidate_id");
        return $this->fetch_object();
    }

    protected function insert($table, $columns, $values) {
        $query = "INSERT INTO " . $table . " (";
        $column_count = count($columns);
        $column_counter = 0;
        foreach($columns as $column) {
            $column_counter++;
            $column_count == $column_counter ? $query .= $column . ") VALUES (" : $query .= $column . ", ";
        }

        $values_count = count($values);
        $values_counter = 0;

        foreach ($columns as $column) {
            $values_counter++;
            $values_count == $values_counter ? $query .=  ":" . $column . ")" : $query .= ":" . $column . ", ";
        }

        $this->query($query);

        for($i = 0; $i < count($columns); $i++) {
           $this->bind(":" . $columns[$i], $values[$i]);
        }

        return $this->execute();

    }
}
