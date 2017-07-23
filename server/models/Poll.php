<?php

require_once '/../Database.php';

class Poll extends Database{

    public function __construct() {
        parent::__construct();
    }

    private $table = 'polls';

    public function all() {
        return $this->table_select($this->table);
    }

    public function index($id) {
        return $this->select_by_id($this->table, $id);
    }

}