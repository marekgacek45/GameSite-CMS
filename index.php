<?php
// require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php');
?>

<?php
$articles = Article::getAll($conn);


?>



<main class="container">




    <?php foreach ($articles as $article): ?>
        <div class="container">
            <h2>
            <a href="article.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a>
            </h2>
            <p>
                <?= htmlspecialchars($article['content']) ?>
            </p>
        </div>
    <?php endforeach ?>

</main>

<?php require('includes/footer.php') ?>