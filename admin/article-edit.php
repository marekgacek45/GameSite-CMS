<?php
// require('includes/init.php');
require('../includes/header.php');
$conn = require('../includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];


    if (isset($_POST['thumbnail'])) {
        $article->thumbnail = $_POST['thumbnail'];
    }





    if ($article->edit($conn)) {
        header('Location:admin/index.php');
    }
}
?>
<main class="container d-flex flex-column justify-content-center align-items-center" style="margin-bottom:2em">

    <h2>Edytuj artykuł:</h2>

    <?php require("includes/form.php") ?>

    <div class="container d-flex  justify-content-center align-items-center">

<button form="article" type="submit" class="btn btn-primary" style="margin-right:1em">Zapisz</button>

<a href="includes/add-image.php?id=<?= $id ?>"><button class="btn btn-primary">Edytuj miniaturkę</button></a>
</div>
</main>

<?php require('../includes/footer.php') ?>