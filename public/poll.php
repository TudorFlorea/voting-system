<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/22/17
 * Time: 1:37 PM
 * To change this template use File | Settings | File Templates.
 */

require_once "../server/database.php";
require_once "../server/models/Poll.php";
require_once "../server/models/Vote.php";
require_once "../server/models/Candidate.php";
require_once "../server/controllers/CandidatesController.php";
require_once "../server/controllers/LayoutsController.php";
require_once "../server/controllers/PollController.php";
require_once "../server/functions.php";


?>



<?php

    $poll = new PollController();
    $poll->index($_GET["id"]);
    $candidates = new CandidatesController();
    $candidates->poll_candidates($_GET["id"]);

    $layout_obj = new LayoutsController();
    $layout_obj->footer();

?>


