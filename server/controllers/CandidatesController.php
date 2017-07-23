<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/23/17
 * Time: 3:31 AM
 * To change this template use File | Settings | File Templates.
 */

class CandidatesController {

    public function poll_candidates($poll_id) {

        $candidates_votes = [];

        $candidate_obj = new Candidate();

        $candidates = $candidate_obj->poll_candidates($poll_id);

        foreach($candidates as $candidate) {

            $candidates_votes[$candidate->id] = $candidate_obj->get_votes($poll_id, $candidate->id);
        }


        render("views/candidates.view.php", ['candidates' => $candidates, 'votes' => $candidates_votes]);
    }

    public function poll_votes($poll_id, $candidate_id) {

    }

}