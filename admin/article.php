<?php
// require('includes/init.php');
require('../includes/header.php');
$conn = require('../includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);
?>

<main class="container">



    <h2>
        <?= htmlspecialchars($article->title)  ?>
    </h2>
    <img src="../uploads/<?= htmlspecialchars($article->thumbnail)?>" alt="">
    <p>
        <?= htmlspecialchars($article->content) ?>
    </p>

    <div>
        <a href="article-edit.php?id=<?= $id ?>"><button>edytuj</button></a>
        <a href="article-delete.php?id=<?= $id ?>"><button>usuń</button></a>
    </div>
</main>

<?php require('../includes/footer.php') ?>