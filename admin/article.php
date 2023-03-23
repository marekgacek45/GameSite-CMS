<?php
// require('includes/init.php');
require('../includes/header.php');
$conn = require('../includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);
?>



<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
<h2> <?= htmlspecialchars($article->title) ?> </h2>

    <img class="img-fluid" src="../uploads/<?= htmlspecialchars($article->thumbnail) ?>" alt="" style="padding:2em; max-width:750px">
    <p>
        <?= htmlspecialchars($article->content) ?>
    </p>
    <div style="padding:2em">
        <a href="article-edit.php?id=<?= $id ?>"><button class="btn btn-secondary">edytuj</button></a>
        <a href="article-delete.php?id=<?= $id ?>"><button class="btn btn-secondary">usuń</button></a>
    </div>

</div>


<?php require('../includes/footer.php') ?>