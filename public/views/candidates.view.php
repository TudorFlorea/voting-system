
        <div id="candidates-wrapper" class="container">
            <h2>Candidates</h2>
            <div class="list-group">
                <?php foreach($candidates as $candidate): ?>

                    <div class="list-group-item">
                        <span class="list-group-item-heading candidate"><?php echo $candidate->description . " - " . count($votes[$candidate->id]); ?> votes</span>
                        <form class="form-horizontal vote-form" method="post" action="vote.php">
                            <button class="btn btn-success vote-btn pull-right">Vote</button>
                            <input type="hidden" name="poll-id" value="<?php echo $_GET["id"]; ?>">
                            <input type="hidden" name="candidate-id" value="<?php echo $candidate->id; ?>">
                        </form>
                    </div>

                <?php endforeach; ?>

            </div>  <!-- end .list-group -->
        </div> <!-- end #candidates-wrapper -->
        <div id="add-candidate" class="container">
            <button class="btn btn-lg btn-success">Add Candidate</button>
        </div> <!-- end #add-candidate -->
