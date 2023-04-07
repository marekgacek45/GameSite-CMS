<?php
// require('includes/init.php');
require('../includes/header.php');
$conn = require('../includes/database.php');


$user = $_SESSION['user']
    ?>


<h2>Profil</h2>

<div>
    <p>Imie:
        <?= $user->first_name ?>
    </p>
</div>

<?php require('../includes/footer.php') ?>