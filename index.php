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



<main class="container px-1" style="margin-top:2em;margin-bottom:2em">

  <div class="row gx-5 justify-content-center align-items-center">


    <?php foreach ($articles as $article): ?>


      <div class='col-sm-12 col-md-4' >
        <div class="card p-4 border bg-light">
          <div class="card-body d-flex flex-column justify-content-center align-items-center border-bg-light">
            <h5 class="card-title">
              <?= htmlspecialchars($article['title']) ?>
            </h5>
            <img class="img-fluid" src="uploads/<?= htmlspecialchars($article['thumbnail']) ?>" alt="">
            <p class="card-text">
              <?= htmlspecialchars(substr($article['content'], 0, 200)) ?>...
            </p>
            <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">Czytaj</a>
          </div>
        </div>
      </div>


    <?php endforeach ?>
  </div>



</main>

<?php require('includes/pagination.php') ?>


<?php require('includes/footer.php') ?>