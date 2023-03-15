<?php require('includes/init.php'); ?>

<?php require('includes/header.php') ?>


<?php
$conn = require('includes/database.php');
?>

<?php $articles = Article::getAll($conn);


?>

<main>


    <?php foreach ($articles as $article): ?>
        <div>
            <h2>
                <?= $article['title'] ?>
            </h2>
            <p>
            <?= $article['content'] ?>
            </p>
        </div>
    <?php endforeach ?>

</main>






<?php require('includes/footer.php') ?>