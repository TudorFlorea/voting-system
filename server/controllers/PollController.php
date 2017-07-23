<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/23/17
 * Time: 2:24 AM
 * To change this template use File | Settings | File Templates.
 */

class PollController {

    public function all() {
        $polls_obj = new Poll();

        $polls = $polls_obj->all();

        render("views/polls.view.php", ['polls' => $polls]);
    }

    public function index($poll_id) {
        $polls_obj = new Poll();

        $poll = $polls_obj->index($poll_id);

        render("views/poll.single.view.php", ['poll' => $poll]);
    }
}