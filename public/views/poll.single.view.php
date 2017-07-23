<?php render("views/layouts/header.php", ["title" => $poll[0]->description]); ?>

<div class="jumbotron jumbo">
    <h2 class="headings text-center">Poll: <?php echo $poll[0]->description;?></h2>
</div>



