<?php
// require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php');
?>

<?php
// $articles = Article::getAll($conn);

$totalArticle = Article::getTotal($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 3, $totalArticle);

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);



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

<?php require('includes/pagination.php') ?>


<?php require('includes/footer.php') ?>