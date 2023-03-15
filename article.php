<?php
require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);
?>

<main class="container">

    <h2>
        <?= $article->title ?>
    </h2>
    <p>
        <?= $article->content ?>
    </p>

   <a href="article-edit.php?id=<?= $id ?>"><button>edit</button></a>

</main>

<?php require('includes/footer.php') ?>