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


    if(isset($_POST['thumbnail'])){
        $article->thumbnail = $_POST['thumbnail'];
    }



    

    if ($article->edit($conn)) {
        header('Location:admin/index.php');
    }
}
?>
<main class="container">

    <h2>Edytuj artykuł</h2>
    
    <?php require("includes/form.php") ?>

    <a href="includes/add-image.php?id=<?= $id?>"><button>edytuj zdjęcie</button></a>
</main>

<?php require('../includes/footer.php') ?>