<?php
// require('includes/init.php');
require('../includes/header.php');
?>

<?php

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = require('../includes/database.php');

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];

    if ($article->create($conn)) {
        header('Location:index.php');
    }
}

var_dump($_POST)
?>
<main class="container d-flex flex-column justify-content-center align-items-center" style="margin-bottom:2em">
    <h2>stwórz nowy artykuł</h2>

    <?php require('includes/form.php') ?>
    <div class="container d-flex  justify-content-center align-items-center">

        <button form="article" type="submit" class="btn btn-primary" style="margin-right:1em">Zapisz</button>

    </div>
</main>


<?php require('../includes/footer.php') ?>