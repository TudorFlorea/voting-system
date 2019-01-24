<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 22:27
 */

namespace App\Core\Database;

use PDO;

class Handler
{
    private $conn;
    private $stmt;

    function __construct($pdo)
    {
        $this->conn = $pdo;
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
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    protected function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function rowcount() {
        return $this->stmt->rowCount();
    }

    public function table_select($table) {
        $this->query("SELECT * FROM " . $table);
        return $this->fetch_object();
    }

    public function select_by_id($table, $id) {
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

    public function insert($table, $columns, $values) {
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