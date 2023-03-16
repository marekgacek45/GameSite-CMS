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

<div class="container">
    <?php if ($paginator->previous): ?>
        <a href="?page=<?= $paginator->previous ?>"><button>poprzednia</button></a>
    <?php else: ?>
        <button disabled>poprzednia</button>
    <?php endif ?>
    <?php if ($paginator->next): ?>
        <a href="?page=<?= $paginator->next ?>"><button>następna</button></a>
    <?php else: ?>
        <button disabled>następna</button>
    <?php endif ?>

    <?php for ($i = 1; $i <= $paginator->totalPages; $i++): ?>

        <a href="?page=<?= $i ?>"><button><?= $i ?></button></a>
    <?php endfor ?>


</div>


<?php require('includes/footer.php') ?>