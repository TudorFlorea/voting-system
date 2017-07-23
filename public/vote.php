<?php

require_once "../server/functions.php";
require_once "../server/controllers/VotesController.php";

if(is_numeric($_POST["poll-id"])) $poll_id = $_POST["poll-id"];
if(is_numeric($_POST["candidate-id"])) $candidate_id = $_POST["candidate-id"];

if(isset($poll_id) && isset($candidate_id)) {
    $ip_adress = $_SERVER['REMOTE_ADDR'];
    $vote = new VotesController();
    $vote->insert($poll_id, $candidate_id, $ip_adress);
    redirect("./poll.php?id=" . $poll_id);
} else {
    redirect("./index.php");
}
