<?php
// require('includes/init.php');
require('../includes/header.php');
?>

<?php

$article = new Article();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = require('includes/database.php');

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];

    if ($article->create($conn)) {
        header('Location:index.php');
    }
}


?>
<main class="container">
    <h2>stwórz nowy artykuł</h2>

    <?php require('includes/form.php') ?>

</main>


<?php require('../includes/footer.php') ?>