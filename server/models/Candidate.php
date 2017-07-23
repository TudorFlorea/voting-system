<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/22/17
 * Time: 2:44 PM
 * To change this template use File | Settings | File Templates.
 */

require_once '/../Database.php';

class Candidate extends Database{
    private $table = 'vote_subjects';
    private $poll_id = 'poll_id';
    private $candidate_id = 'candidate_id';
    private $votes_table = 'votes';

    public function __construct() {
        parent::__construct();
    }

    public function all() {
        return $this->table_select($$this->table);
    }

    public function index($id) {
        return $this->select_by_id($this->table, $id);
    }

    public function poll_candidates($poll) {
        return $this->select_by_column($this->table, $this->poll_id, $poll);
    }

    public function get_votes($poll, $id) {
        return $this->select_by_columns($this->votes_table, [$this->poll_id => $poll, $this->candidate_id => $id]);
    }



}