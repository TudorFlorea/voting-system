<?php
require_once "../server/database.php";
require_once "../server/models/Poll.php";
require_once "../server/models/Vote.php";
require_once "../server/functions.php";
require_once "../server/controllers/PollController.php";
require_once "../server/controllers/LayoutsController.php";

/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/16/17
 * Time: 11:16 PM
 * To change this template use File | Settings | File Templates.
 */

    $layouts = new LayoutsController();
    $polls = new PollController();


    $layouts->header(['title' => 'Voting System']);
    $polls->all();

    $vote = new Vote();

    var_dump($vote->insert_vote([1, 3, $_SERVER["REMOTE_ADDR"]]));

    $layouts->footer();
?>



