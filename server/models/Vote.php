<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/22/17
 * Time: 11:10 AM
 * To change this template use File | Settings | File Templates.
 */
require_once "/../Database.php";

class Vote extends Database{

    public function __construct() {
        parent::__construct();
    }

    private $table = 'votes';
    private $poll_id = 'poll_id';
    private $poll_candidate = "candidate_id";
    private $ip_adress = "ip_adress";

    public function index($id) {
        return $this->select_by_id($id, $this->table);
    }

    public function poll_votes($poll) {
        return $this->select_by_column($this->table, $this->poll_id, $poll);
    }

    public function candidate_votes($candidate, $poll) {

    }

    public function insert_vote($values) {
        return $this->insert($this->table, [$this->poll_id, $this->poll_candidate, $this->ip_adress], $values);
    }



}