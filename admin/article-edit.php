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

    if ($article->edit($conn)) {
        header('Location:index.php');
    }
}
?>
<main class="container">

    <h2>Edytuj artykuł</h2>
    <?php require("includes/form.php") ?>

</main>

<?php require('../includes/footer.php') ?>