<div class="jumbotron jumbo">

    <h1 class="headings text-center">Pools</h1>

</div>

<div class="container-fluid">
    <div class="row">
        <?php foreach($polls as $poll): ?>
            <div class="col-md-3 polls col-centered"><a href="<?php echo "http://localhost/voting-system/public/poll.php?id=" . $poll->id; ?>"><?php echo $poll->description; ?></a></div>
        <?php endforeach; ?>
    </div>
</div>
