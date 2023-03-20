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



<main class="container d-flex flex-column justify-content-center align-items-center">




    <?php foreach ($articles as $article): ?>
      


        <div class="card w-75 ">
  <div class="card-body d-flex flex-column justify-content-center align-items-center">
    <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
    <p class="card-text"> <?= htmlspecialchars($article['content']) ?></p>
    <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Czytaj</a>
  </div>
</div>


    <?php endforeach ?>

</main>

<?php require('includes/pagination.php') ?>


<?php require('includes/footer.php') ?>