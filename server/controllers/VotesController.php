<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/23/17
 * Time: 5:03 PM
 * To change this template use File | Settings | File Templates.
 */

require_once "/../models/Vote.php";

class VotesController {

    public function insert($poll_id, $candidate_id, $ip_adress) {
        $vote = new Vote();
        return $vote->insert_vote([$poll_id, $candidate_id, $ip_adress]);
    }

}