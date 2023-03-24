<?php
// require('includes/init.php');
require('../includes/header.php');
$conn = require('../includes/database.php'); ?>

<?php
$games = Game::getAll($conn);

?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">

    <?php foreach ($games as $game): ?>
        <div class='col-sm-12 col-md-4'>
            <div class="card p-4 border bg-light">
                <div class="card-body d-flex flex-column justify-content-center align-items-center border-bg-light">
                    <h5 class="card-title">
                        <?= htmlspecialchars($game['title']) ?>
                    </h5>
                    <div>
                        <?= htmlspecialchars($game['genre']) ?>
                    </div>
                    <p>
                        <?= htmlspecialchars($game['premiere']) ?>
                    </p>
                    <p>
                    <?= htmlspecialchars($game['description']) ?>
                    </p>


                </div>
            </div>
        </div>
    <?php endforeach ?>



</div>

<?php require('../includes/footer.php') ?>