<?php
// require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);
?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
<h2> <?= htmlspecialchars($article->title) ?> </h2>

    <img src="uploads/<?= htmlspecialchars($article->thumbnail) ?>" alt="" style="padding:2em">
    <p>
        <?= htmlspecialchars($article->content) ?>
    </p>


</div>

<?php require('includes/footer.php') ?>