<?php
require_once "../server/database.php";
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/16/17
 * Time: 11:16 PM
 * To change this template use File | Settings | File Templates.
 */
$database = new Database();

$database->query('SELECT * FROM vote_subjects');
//$database->bind(':description', "Test Poll");

//$database->execute();

$row = $database->resultset();


?>

<!Doctype html>
<html>
<head>

    <title>Voting System</title>
<pre>

    <?php print_r($row); ?>

</pre>
    <h1>Candidates</h1>
    <?php foreach($row as $candidate): ?>

        <p><?php echo $candidate["description"]; ?></p>

    <?php endforeach; ?>


</head>

</html>