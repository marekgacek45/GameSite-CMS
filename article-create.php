<?php
require('includes/init.php');
require('includes/header.php');
?>

<?php

$article = new Article();

var_dump($article);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = require('includes/database.php');

$article->title = $_POST['title'];
$article->content = $_POST['content'];

if($article->create($conn)){
    header('Location:index.php');
}

}

?>

<main>
    <h2>stwórz nowy artykuł</h2>
    <form method="post">
        <div>
            <label for="title">Tytuł:</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="content">Treść:</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Stwórz</button>
    </form>
</main>


<?php require('includes/footer.php') ?>