<?php
// require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);
?>

<main class="container">



<h2>
        <?= htmlspecialchars($article->title)  ?>
    </h2>
    <img src="uploads/<?= htmlspecialchars($article->thumbnail)?>" alt="">
    <p>
        <?= htmlspecialchars($article->content) ?>
    </p>

   
</main>

<?php require('includes/footer.php') ?>